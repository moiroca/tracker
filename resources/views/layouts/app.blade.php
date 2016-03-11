<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ env('APP_NAME') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  {!! Html::style('bootstrap/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
  {!! Html::style('bower_components/font-awesome/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
  {!! Html::style('bower_components/Ionicons/2.0.1/css/ionicons.min.css') !!}
  <!-- Theme style -->

  <!-- JM Homepage Design -->
  {!! Html::style('css/home.css') !!}
</head>
<body>
    @yield('content') 
</body>
</html>