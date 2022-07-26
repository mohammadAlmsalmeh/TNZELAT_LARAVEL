<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <title>Admin Control</title>
    <link rel="stylesheet" href="{{url("css/w3.css")}}">
    <link rel="stylesheet" href="{{url("css/bootstrap.css")}}">
    <link rel="stylesheet" type="text/css" href="{{url("codes/jquery.dataTables.css")}}">
    <link rel="stylesheet" type="text/css" href="{{url("codes/shCore.css")}}">
    <link rel="stylesheet" type="text/css" href="{{url("codes/demo.css")}}">
    <link rel="stylesheet" href="{{url("css/bootstrap-select-country.min.css")}}">
    <style type="text/css" class="init">

    </style>
    <style>select {height: 40px;} .hideit{display:none;}
        a {color:black;}
        a:hover {          text-decoration: none;}
        .animate{animation-name: fade;
            animation-duration: 0.8s;}
        @keyframes fade {
            0%{
                transform: translateY(20px);
                opacity: 0;
            }
            100%{}
        }
    </style>
    <script type="text/javascript" language="javascript" src="{{url("js/jquery-3.2.1.slim.min.js")}}">
    </script>
    <script type="text/javascript" language="javascript" src="{{url("codes/jquery.dataTables.js")}}">
    </script>
    <script type="text/javascript" language="javascript" src="{{url("codes/shCore.js")}}">
    </script>
    <script type="text/javascript" language="javascript" src="{{url("codes/demo.js")}}">
    </script>
</head>
<body>
<!-- side bar code -->
@include("sideBar")
<!-- end of side bar code -->
<div class="w3-main" style="margin-left:200px">
    @yield("content")
</div>
<script src="{{url("js/popper.min.js")}}"> </script>
<script src="{{url("js/bootstrap.min.js")}}"> </script>
<script src="{{url("js/bootstrap-select-country.min.js")}}"> </script>
</body>
</html>
