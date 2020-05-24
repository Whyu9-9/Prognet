<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<title>DagangElektronik.com</title>
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
     <!-- The Modal -->
     <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Edit Foto Profile</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
                <div class="col-md-10 col-md-offset-1">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
          	                <strong>{{ $message }}</strong>
                        </div>
                    @endif
                        <img style="width:150px; height:150px; border-radius:100px;" src="/uploads/avatars/{{ $user->profile_image }}">
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
                        <input type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Anda yakin ingin mengganti foto profile?')">
                    </div>
                    <div class="form-group">
                    </div>
                </form>
                </div>
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      
          </div>
        </div>
      </div>
<div class="super_container">
    @extends('layouts.navbar')
    <div class="home">
    <div class="home_slider_container">
        <div class="container">
            <table class="table table-bordered">	
            <div class="row" style="width:100px;">
                <td>
                <div class="col-md-10 col-md-offset-1" style="width:500px;margin-left:350px;">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
          	                <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="form-group" style="width:500px;margin-left:150px;">
                        <img style="width:150px; height:150px; border-radius:100px;" src="/uploads/avatars/{{ $user->profile_image }}">
                    </div>
                    <div class="form-grup" style="width:500px;margin-left:67px;">
                        <h1>{{ $user->name }}'s Profile</h1>
                    </div>
                    <div class="form-group">
                        <table class="table table-striped table-bordered " align='center' >
                            <tbody>
                              <tr>
                                <th>Nama</th>
                                <td>{{ $user->name }}</td>
                              </tr>
                              <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                              </tr>
                              <tr>
                                <th style="padding-top:20px;">Status</th>
                                <td>
                                    <img style="width:40px; height:40px;margin-bottom:3px;margin-left:-12px;" src="https://cdn.clipart.email/0638765a3f2a64a229becd27379510f8_facebook-verified-logo-logodix_1024-1024.png" alt="">Verified</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-warning btn-icon-text" style="margin-left:157px;">
                            <i class="mdi mdi-file-restore btn-icon-prepend "></i>     
                            <a href="" style="color: white;" data-toggle="modal" data-target="#myModal">Edit Foto Profile</a>
                      </button>
                    </div>
                </div>
            </td>
            </div>
            <table>
        </div>
    </div>
    </div>
</div>
<footer>
<script src="{{ asset('assets/User/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset('assets/User/styles/bootstrap4/popper.js')}}"></script>
<script src="{{ asset('assets/User/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/User/plugins/greensock/TweenMax.min.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/greensock/TimelineMax.min.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/scrollmagic/ScrollMagic.min.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/greensock/animation.gsap.min.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/greensock/ScrollToPlugin.min.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/OwlCarousel2-2.2.1/owl.carousel.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/Isotope/isotope.pkgd.min.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/easing/easing.js')  }}"></script>
<script src="{{ asset('assets/User/plugins/parallax-js-master/parallax.min.js')  }}"></script>
<script src="{{ asset('assets/User/js/custom.js')  }}"></script>
</footer>    
</body>

</html>
