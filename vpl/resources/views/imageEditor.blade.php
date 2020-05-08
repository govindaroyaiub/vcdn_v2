<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VCDN - Image editor</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
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

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/image-editor.js') }}"></script>
</body>
</html>
