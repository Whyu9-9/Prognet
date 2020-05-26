<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>
<link rel="shortcut icon" href="{{asset('assets/User/images/shirt.png')}}" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="{{ asset('assets/Admin/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="{{ asset('assets/Admin/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="{{ asset('assets/Admin/js/jquery-3.2.1.min.js')}}"></script> 
<!--icons-css-->
<link href="{{ asset('assets/Admin/css/font-awesome.css')}}" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
<script src="{{ asset('assets/Admin/js/Chart.min.js')}}"></script>
<!--//charts-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<!--skycons-icons-->
<script src="{{ asset('assets/Admin/js/skycons.js')}}"></script>
<!--//skycons-icons-->
</head>
<body>	
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
			<!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
									 <a href="index.html"> <h1>Admin Dashboard</h1> 
									<!--<img id="logo" src="" alt="Logo"/>--> 
								  </a> 								
							</div>
							<!--search-box-->
								<div class="search-box" style="left:70px;">
									<form>
										<input type="text" placeholder="Search..." required="">	
										<input type="submit" value="">					
									</form>
								</div><!--//end-search-box-->
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
							<div class="profile_details_left"><!--notifications of menu start -->
								<ul class="nofitications-dropdown">
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">3</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 3 new messages</h3>
												</div>
											</li>
											<li><a href="#">
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>	
											</a></li>
											<li>
												<div class="notification_bottom">
													<a href="#">See all messages</a>
												</div> 
											</li>
										</ul>
									</li>
									<li class="dropdown head-dpdn">
										<?php 
                  								$id = 1;
                  								$admin = App\Admin::find(1);
                  								$notif_count = $admin->unreadNotifications->count();
                  								$notifications = DB::table('admin_notifications')->where('notifiable_id',$id)->where('read_at',NULL)->orderBy('created_at','desc')->get();
                						?>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">{{$notif_count}}</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have {{$notif_count}} new notification</h3>
												</div>
											</li>
											<li>
												@foreach($notifications as $notif)
													{!!$notif->data!!}
											  	@endforeach
											</li>
											 <li>
												<div class="notification_bottom">
													<a class="btn btn-block" href="/admin/marknotifadmin">Mark as Read</a>
												</div> 
											</li>
										</ul>
									</li>	
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1">9</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 8 pending task</h3>
												</div>
											</li>
											<li><a href="#">
												<div class="task-info">
													<span class="task-desc">Database update</span><span class="percentage">40%</span>
													<div class="clearfix"></div>	
												</div>
												<div class="progress progress-striped active">
													<div class="bar yellow" style="width:40%;"></div>
												</div>
											</a></li>
											<li><a href="#">
												<div class="task-info">
													<span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
												   <div class="clearfix"></div>	
												</div>
												<div class="progress progress-striped active">
													 <div class="bar green" style="width:90%;"></div>
												</div>
											</a></li>
											<li><a href="#">
												<div class="task-info">
													<span class="task-desc">Mobile App</span><span class="percentage">33%</span>
													<div class="clearfix"></div>	
												</div>
											   <div class="progress progress-striped active">
													 <div class="bar red" style="width: 33%;"></div>
												</div>
											</a></li>
											<li><a href="#">
												<div class="task-info">
													<span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
												   <div class="clearfix"></div>	
												</div>
												<div class="progress progress-striped active">
													 <div class="bar  blue" style="width: 80%;"></div>
												</div>
											</a></li>
											<li>
												<div class="notification_bottom">
													<a href="#">See all pending tasks</a>
												</div> 
											</li>
										</ul>
									</li>	
								</ul>
								<div class="clearfix"> </div>
							</div>
							<!--notification menu end -->
							<div class="profile_details">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="/uploads/avatars/{{ Auth::user()->profile_image }}" style="width:50px; height:50px; position:absolute; top:1px; left:-30px; border-radius:50%" alt=""> </span> 
												<div class="user-name">
													<p>{{ Auth::user()->name }}</p>
													<span>Administrator</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
											<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
                                            <li> <a href="{{ url('/admin/logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Logout</a>
                                            <form id="logout-form" action="{{ url('/admin/logout') }}" method="GET" style="display: none;">
                                                @csrf
                                            </form> 
                                            </li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>				
						</div>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="chit-chat-layer1"></div>
<div class="inner-block">
<!--market updates updates-->
	
<main class="py-4">
	@yield('content')
</main>
</div>
<!--market updates end here-->
<!--mainpage chit-chating-->
<div class="chit-chat-layer1"></div>
<!--main page chit chating end here-->
<!--main page chart start here-->
</div>
<!--inner block end here-->
<!--copy rights start here-->
<!--COPY rights end here-->
</div>
@extends('layouts.sidebaradmin')
<!--scrolling js-->
<script src="{{ asset('assets/Admin/js/jquery.nicescroll.js')}}"></script>
<script src="{{ asset('assets/Admin/js/scripts.js')}}"></script>
<!--//scrolling js-->
<script src="{{ asset('assets/Admin/js/bootstrap.js')}}"> </script>
<script>
$('#tombol').click(function(e){
    e.preventDefault();
    $('#modalContactForm').modal();
});
</script>
<script>
	$(document).ready(function(e){
		$(".status").click(function(e){
			var index = $(".status").index(this);
			var myStatus = '';
			console.log(index);
			switch(index){
			  case 0:
				  myStatus = 'all';
				  break;
			  case 1:
				  myStatus = 'unverified';
				  break;
			  case 2:
				  myStatus = 'waiting';
				  break;
			  case 3:
				  myStatus = 'verified';
				  break;
			  case 4:
				  myStatus = 'delivered';
				  break;
			  case 5:
				  myStatus = 'success';
				  break;
			  case 6:
				  myStatus = 'canceled';
				  break;
  
			}
  
			console.log(myStatus);
		  jQuery.ajax({
				url: "{{url('/admin/transaksi/sort')}}",
				method: 'post',
				data: {
					_token: $('#signup-token').val(),
					status: myStatus,
				},
				success: function(result){
				  $('.ganti').html(result.hasil);
				}
			});
		});
	  });
  </script>
  <script>
    window.onload = function () {
    
    var options = {
        axisX: {
            interval:1,
            labelMaxWidth: 180,           
            labelAngle: -45,
            labelFontFamily:"Times New Roman"
        },
        title: {
            text: "Grafik Jumlah Transaksi Perbulan {{date('Y')}}"              
        },
        data: [              
        {
            type: "column",
            dataPoints: [
                { label: "Januari",  y: parseInt($('#bulan1').val())},
                { label: "Februari", y: parseInt($('#bulan2').val())},
                { label: "Maret", y: parseInt($('#bulan3').val())},
                { label: "April", y: parseInt($('#bulan4').val())},
                { label: "Mei",  y: parseInt($('#bulan5').val())},
                { label: "Juni",  y: parseInt($('#bulan6').val())},
                { label: "Juli",  y: parseInt($('#bulan7').val())},
                { label: "Agustus", y: parseInt($('#bulan8').val())},
                { label: "September", y: parseInt($('#bulan9').val())},
                { label: "Oktober",  y: parseInt($('#bulan10').val())},
                { label: "November",  y: parseInt($('#bulan11').val())},
                { label: "Desember",  y: parseInt($('#bulan12').val())},
            ]
        }
        ]
    };
    
    $("#chartContainer").CanvasJSChart(options);
    }
</script>    


    <script>
    function formatRupiah(angka, prefix){
			var number_string = angka.toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
	}

    function creteChart(tahun, ttlTahun, judul = ''){
        var options = {
                            axisX: {
                                interval:1,
                                labelMaxWidth: 180,           
                                labelAngle: -45,
                                labelFontFamily:"Times New Roman"
                            },
                            title: {
                                text: "Grafik Jumlah Transaksi "+judul+" Perbulan "+ttlTahun              
                            },
                            data: [              
                            {
                                type: "column",
                                dataPoints: [
                                    { label: "Januari",  y: tahun[1]},
                                    { label: "Februari", y: tahun[2]},
                                    { label: "Maret", y: tahun[3]},
                                    { label: "April", y: tahun[4]},
                                    { label: "Mei",  y: tahun[5]},
                                    { label: "Juni",  y: tahun[6]},
                                    { label: "Juli",  y: tahun[7]},
                                    { label: "Agustus", y: tahun[8]},
                                    { label: "September", y: tahun[9]},
                                    { label: "Oktober",  y: tahun[10]},
                                    { label: "November",  y: tahun[11]},
                                    { label: "Desember",  y: tahun[12]},
                                    
                                ]
                            }
                            ]
                        };
                        
                        $("#chartContainer").CanvasJSChart(options);
    }
      jQuery(document).ready(function(e){
          console.log($('#bulan1').val())
          jQuery('#bulan').change(function(e){
                jQuery.ajax({
                    url: "{{url('/report-bulan')}}",
                    method: 'post',
                    data: {
                        _token: $('#signup-token').val(),
                        bulan: $('#bulan').val(),
                        tahun: $('#tahun').val(),
                    },
                    success: function(result){
                        $('#total').text(result.data['total']);
                        $('#unverified').text(result.data['unverified']);
                        $('#expired').text(result.data['expired']);
                        $('#canceled').text(result.data['canceled']);
                        $('#verified').text(result.data['verified']);
                        $('#delivered').text(result.data['delivered']);
                        $('#success').text(result.data['success']);
                        var uang = formatRupiah(result.data['harga'],'Rp ');
                        $('#harga').text(uang);
                    }
                });
          });

          jQuery('#tahun').change(function(e){
                jQuery.ajax({
                    url: "{{url('/report-tahun')}}",
                    method: 'post',
                    data: {
                        _token: $('#signup-token').val(),
                        bulan: $('#bulan').val(),
                        tahun: $('#tahun').val(),
                    },
                    success: function(result){
                        $('#total').text(result.data_bulan['total']);
                        $('#unverified').text(result.data_bulan['unverified']);
                        $('#expired').text(result.data_bulan['expired']);
                        $('#canceled').text(result.data_bulan['canceled']);
                        $('#verified').text(result.data_bulan['verified']);
                        $('#delivered').text(result.data_bulan['delivered']);
                        $('#success').text(result.data_bulan['success']);
                        var uang = formatRupiah(result.data_bulan['harga'],'Rp ');
                        $('#harga').text(uang);

                        $('#total-tahun').text(result.data['total']);
                        $('#unverified-tahun').text(result.data['unverified']);
                        $('#expired-tahun').text(result.data['expired']);
                        $('#canceled-tahun').text(result.data['canceled']);
                        $('#verified-tahun').text(result.data['verified']);
                        $('#delivered-tahun').text(result.data['delivered']);
                        $('#success-tahun').text(result.data['success']);
                        var uang_tahun = formatRupiah(result.data['harga'],'Rp ');
                        $('#harga-tahun').text(uang_tahun);
                        
                        creteChart(result.tahun, $('#tahun').val());
                    }

                });
          });

          $(".status").click(function(e){
            var index = $(".status").index(this);
            var myStatus = '';
            switch(index){
                case 0:
                    myStatus = 'all';
                    break;
                case 1:
                    myStatus = 'unverified';
                    break;
                case 2:
                    myStatus = 'expired';
                    break;
                case 3:
                    myStatus = 'verified';
                    break;
                case 4:
                    myStatus = 'delivered';
                    break;
                case 5:
                    myStatus = 'success';
                    break;
                case 6:
                    myStatus = 'canceled';
                    break;

            }
            jQuery.ajax({
                url: "{{url('/grafik')}}",
                method: 'post',
                data: {
                    _token: $('#signup-token').val(),
                    status: myStatus,
                    tahun: $('#tahun').val(),
                },
                success: function(result){
                    creteChart(result.grafik, $('#tahun').val(), myStatus);
                }
            });
        });

      });
    </script>
<!-- mother grid end here-->
</body>
</html>                     