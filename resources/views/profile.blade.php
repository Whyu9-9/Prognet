<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<title>Dagangbaju.com</title>
<link rel="shortcut icon" href="{{asset('assets/User/images/shirt.png')}}" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{ asset('assets/User/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/styles/responsive.css')}}">	
</head>

<body>
    @extends('layouts.navbar')
    
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <img style="width:150px; height:150px; margin-top:150px; border-radius:100px;" src="/uploads/avatars/{{ $user->profile_image }}">
                <h1>{{ $user->name }}'s Profile</h1>
                <form enctype="multipart/form-data" action="/profile" method="POST">
                <div class="form-group">
                    <h5>Update Profile Image</h5>
                </div>
                <div class="form-group">
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="form-group">
                    <input type="submit" style="margin-right:832px;" class="pull-right btn btn-sm btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>
    
</body>

</html>
