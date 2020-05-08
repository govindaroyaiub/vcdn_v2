<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        img {
            max-width: 100%;
        }

        .component {
            position: relative;
            overflow: hidden;
            padding: 2rem;
            border-radius: 2px;
            height: 500px;
            border: 2px solid rgba(222, 60, 80, 1);
        }

        .resize-container {
            position: relative;
            display: inline-block;
            cursor: move;
            margin: 0 auto;
        }

        .resize-container img {
            display: block
        }

        .resize-container:hover img,
        .resize-container:active img {
            outline: 2px dashed rgba(222, 60, 80, .9);
        }

        .resize-handle-ne,
        .resize-handle-se,
        .resize-handle-nw,
        .resize-handle-sw {
            position: absolute;
            display: block;
            width: 10px;
            height: 10px;
            background: rgba(222, 60, 80, .9);
            z-index: 999;
        }

        .resize-handle-nw {
            top: -5px;
            left: -5px;
            cursor: nw-resize;
        }

        .resize-handle-sw {
            bottom: -5px;
            left: -5px;
            cursor: sw-resize;
        }

        .resize-handle-ne {
            top: -5px;
            right: -5px;
            cursor: ne-resize;
        }

        .resize-handle-se {
            bottom: -5px;
            right: -5px;
            cursor: se-resize;
        }

        .overlay {
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -100px;
            margin-top: -100px;
            z-index: 999;
            width: 200px;
            height: 200px;
            border: solid 2px rgba(222, 60, 80, .9);
            box-sizing: content-box;
            pointer-events: none;
        }


        .btn-crop {
            position: absolute;
            vertical-align: bottom;
            right: 5px;
            bottom: 5px;
            padding: 6px 10px;
            z-index: 999;
            background-color: rgb(222, 60, 80);
            border: none;
            border-radius: 5px;
            color: #FFF;
        }

        .btn-crop img {
            vertical-align: middle;
            margin-left: 8px;
        }

        .tip code {
            background: #f7f7f7;
            color: #222;
            font-size: 13px;
        }

        #resize-preview {
            overflow-y: scroll;
            position: relative;
            height: 500px;
        }

        #resize-preview img {
            margin-bottom: 5px;
        }

        .iframe-css {
            border: 0;
            top: 0px;
            left: 0px;
            bottom: 0px;
            right: 0px;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center my-3">Image Resizing &amp; Cropping</h4>

            <div class="row">
                <div class="col-md-9">
                    <div class="component">
                        <div class="overlay">
                            <div class="overlay-inner"></div>
                        </div>

                        <img class="resize-image" src="{{ asset('baby-girl.jpg') }}" alt="image for resizing">


                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p class="tip">Tip: Hold <code>shift</code> while resizing to keep the original aspect ratio.
                        </p>
                        <button class="btn-crop js-crop">Crop<img class="icon-crop"
                                                                  src="{{ asset('crop.svg') }}">
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="resize-preview"></div>

{{--                    <p class="text-sm-left text-muted mt-1">scroll to see images</p>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    if (window.location.protocol == 'file:') {
        alert('To test this demo properly please use a local server such as XAMPP or WAMP. See README.md for more details.');
    }

    var resizeableImage = function (image_target) {
        // Some variable and settings
        var $container,
            orig_src = new Image(),
            image_target = $(image_target).get(0),
            event_state = {},
            constrain = false,
            min_width = 60, // Change as required
            min_height = 60,
            max_width = 800, // Change as required
            max_height = 900,
            resize_canvas = document.createElement('canvas');

        init = function () {

            // When resizing, we will always use this copy of the original as the base
            orig_src.src = image_target.src;

            // Wrap the image with the container and add resize handles
            $(image_target).wrap('<div class="resize-container"></div>')
                .before('<span class="resize-handle resize-handle-nw"></span>')
                .before('<span class="resize-handle resize-handle-ne"></span>')
                .after('<span class="resize-handle resize-handle-se"></span>')
                .after('<span class="resize-handle resize-handle-sw"></span>');

            // Assign the container to a variable
            $container = $(image_target).parent('.resize-container');

            // Add events
            $container.on('mousedown touchstart', '.resize-handle', startResize);
            $container.on('mousedown touchstart', 'img', startMoving);
            $('.js-crop').on('click', crop);
        };

        startResize = function (e) {
            e.preventDefault();
            e.stopPropagation();
            saveEventState(e);
            $(document).on('mousemove touchmove', resizing);
            $(document).on('mouseup touchend', endResize);
        };

        endResize = function (e) {
            e.preventDefault();
            $(document).off('mouseup touchend', endResize);
            $(document).off('mousemove touchmove', resizing);
        };

        saveEventState = function (e) {
            // Save the initial event details and container state
            event_state.container_width = $container.width();
            event_state.container_height = $container.height();
            event_state.container_left = $container.offset().left;
            event_state.container_top = $container.offset().top;
            event_state.mouse_x = (e.clientX || e.pageX || e.originalEvent.touches[0].clientX) + $(window).scrollLeft();
            event_state.mouse_y = (e.clientY || e.pageY || e.originalEvent.touches[0].clientY) + $(window).scrollTop();

            // This is a fix for mobile safari
            // For some reason it does not allow a direct copy of the touches property
            if (typeof e.originalEvent.touches !== 'undefined') {
                event_state.touches = [];
                $.each(e.originalEvent.touches, function (i, ob) {
                    event_state.touches[i] = {};
                    event_state.touches[i].clientX = 0 + ob.clientX;
                    event_state.touches[i].clientY = 0 + ob.clientY;
                });
            }
            event_state.evnt = e;
        };

        resizing = function (e) {
            var mouse = {}, width, height, left, top, offset = $container.offset();
            mouse.x = (e.clientX || e.pageX || e.originalEvent.touches[0].clientX) + $(window).scrollLeft();
            mouse.y = (e.clientY || e.pageY || e.originalEvent.touches[0].clientY) + $(window).scrollTop();

            // Position image differently depending on the corner dragged and constraints
            if ($(event_state.evnt.target).hasClass('resize-handle-se')) {
                width = mouse.x - event_state.container_left;
                height = mouse.y - event_state.container_top;
                left = event_state.container_left;
                top = event_state.container_top;
            } else if ($(event_state.evnt.target).hasClass('resize-handle-sw')) {
                width = event_state.container_width - (mouse.x - event_state.container_left);
                height = mouse.y - event_state.container_top;
                left = mouse.x;
                top = event_state.container_top;
            } else if ($(event_state.evnt.target).hasClass('resize-handle-nw')) {
                width = event_state.container_width - (mouse.x - event_state.container_left);
                height = event_state.container_height - (mouse.y - event_state.container_top);
                left = mouse.x;
                top = mouse.y;
                if (constrain || e.shiftKey) {
                    top = mouse.y - ((width / orig_src.width * orig_src.height) - height);
                }
            } else if ($(event_state.evnt.target).hasClass('resize-handle-ne')) {
                width = mouse.x - event_state.container_left;
                height = event_state.container_height - (mouse.y - event_state.container_top);
                left = event_state.container_left;
                top = mouse.y;
                if (constrain || e.shiftKey) {
                    top = mouse.y - ((width / orig_src.width * orig_src.height) - height);
                }
            }

            // Optionally maintain aspect ratio
            if (constrain || e.shiftKey) {
                height = width / orig_src.width * orig_src.height;
            }

            if (width > min_width && height > min_height && width < max_width && height < max_height) {
                // To improve performance you might limit how often resizeImage() is called
                resizeImage(width, height);
                // Without this Firefox will not re-calculate the the image dimensions until drag end
                $container.offset({'left': left, 'top': top});
            }
        }

        resizeImage = function (width, height) {
            resize_canvas.width = width;
            resize_canvas.height = height;
            resize_canvas.getContext('2d').drawImage(orig_src, 0, 0, width, height);
            $(image_target).attr('src', resize_canvas.toDataURL("image/png"));
        };

        startMoving = function (e) {
            e.preventDefault();
            e.stopPropagation();
            saveEventState(e);
            $(document).on('mousemove touchmove', moving);
            $(document).on('mouseup touchend', endMoving);
        };

        endMoving = function (e) {
            e.preventDefault();
            $(document).off('mouseup touchend', endMoving);
            $(document).off('mousemove touchmove', moving);
        };

        moving = function (e) {
            var mouse = {}, touches;
            e.preventDefault();
            e.stopPropagation();

            touches = e.originalEvent.touches;

            mouse.x = (e.clientX || e.pageX || touches[0].clientX) + $(window).scrollLeft();
            mouse.y = (e.clientY || e.pageY || touches[0].clientY) + $(window).scrollTop();
            $container.offset({
                'left': mouse.x - (event_state.mouse_x - event_state.container_left),
                'top': mouse.y - (event_state.mouse_y - event_state.container_top)
            });
            // Watch for pinch zoom gesture while moving
            if (event_state.touches && event_state.touches.length > 1 && touches.length > 1) {
                var width = event_state.container_width, height = event_state.container_height;
                var a = event_state.touches[0].clientX - event_state.touches[1].clientX;
                a = a * a;
                var b = event_state.touches[0].clientY - event_state.touches[1].clientY;
                b = b * b;
                var dist1 = Math.sqrt(a + b);

                a = e.originalEvent.touches[0].clientX - touches[1].clientX;
                a = a * a;
                b = e.originalEvent.touches[0].clientY - touches[1].clientY;
                b = b * b;
                var dist2 = Math.sqrt(a + b);

                var ratio = dist2 / dist1;

                width = width * ratio;
                height = height * ratio;
                // To improve performance you might limit how often resizeImage() is called
                resizeImage(width, height);
            }
        };

        crop = function () {
            //Find the part of the image that is inside the crop box
            var crop_canvas,
                left = $('.overlay').offset().left - $container.offset().left,
                top = $('.overlay').offset().top - $container.offset().top,
                width = $('.overlay').width(),
                height = $('.overlay').height();

            crop_canvas = document.createElement('canvas');
            crop_canvas.width = width;
            crop_canvas.height = height;

            crop_canvas.getContext('2d').drawImage(image_target, left, top, width, height, 0, 0, width, height);
            // window.open(crop_canvas.toDataURL("image/png"));

            // var win = window.open(crop_canvas.toDataURL("image/png"));
            // win.document.write('<iframe src="' + crop_canvas.toDataURL("image/png") + '" frameborder="0" style="border:0; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%;" allowfullscreen></iframe>');

            // $("#resize-preview").append(`<!--<iframe src=${crop_canvas.toDataURL("image/png")} frameborder='0' style='border:0; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%;' allowfullscreen></iframe>-->`);

            $("#resize-preview").append(`<img class="final-resize" src=${crop_canvas.toDataURL("image/png")} />`);
        }

        init();
    };

    resizeableImage($('.resize-image'));
</script>
</body>
</html>
