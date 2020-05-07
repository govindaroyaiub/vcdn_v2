  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>VCDN</title>

  <!-- Custom fonts for this template-->
  <link href="{{ URL::to('/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ URL::to('/css/sb-admin-2.min.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" />

  <link rel="icon" href="{{ URL::to('/logo/Favicon.png')}}">

  <style>
      .select2-container .select2-selection--single {
          height: 35px;
          margin: 2px;
      }

      .select2-container--default .select2-selection--single {
          font-size: .8rem;
          background-color: #fff;
          background-clip: padding-box;
          border: 1px solid #d1d3e2;
      }

      .dataTables_wrapper .dataTables_filter {
          float: right;
          text-align: left;
      }

      .dataTables_filter input {
          width: 250px;
      }
  </style>