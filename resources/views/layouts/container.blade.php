<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<div class="super_container">

	<!-- Header -->

	@extends('layouts.navbar')
	
	<!-- Home -->

	<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(assets/User/images/home_slider_1.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">A new Online Shop experience.</div>
										<div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
										<div class="button button_light home_button"><a href="#">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(assets/User/images/home_slider_1.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">A new Online Shop experience.</div>
										<div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
										<div class="button button_light home_button"><a href="#">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(assets/User/images/home_slider_1.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">A new Online Shop experience.</div>
										<div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
										<div class="button button_light home_button"><a href="#">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- Home Slider Dots -->
			
			<div class="home_slider_dots_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_slider_dots">
								<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
									<li class="home_slider_custom_dot active">01.</li>
									<li class="home_slider_custom_dot">02.</li>
									<li class="home_slider_custom_dot">03.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>	
			</div>

		</div>
	</div>

	<!-- Ads -->

	<div class="avds">
		<div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
			<div class="avds_small">
				<div class="avds_background" style="background-image:url(assets/User/images/avds_small.jpg)"></div>
				<div class="avds_small_inner">
					<div class="avds_discount_container">
						<img src="{{ asset('assets/User/images/discount.png')}}" alt="">
						<div>
							<div class="avds_discount">
								<div>20<span>%</span></div>
								<div>Discount</div>
							</div>
						</div>
					</div>
					<div class="avds_small_content">
						<div class="avds_title">Smart Phones</div>
						<div class="avds_link"><a href="categories.html">See More</a></div>
					</div>
				</div>
			</div>
			<div class="avds_large">
				<div class="avds_background" style="background-image:url(assets/User/images/avds_large.jpg)"></div>
				<div class="avds_large_container">
					<div class="avds_large_content">
						<div class="avds_title">Professional Cameras</div>
						<div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viver ra velit venenatis fermentum luctus.</div>
						<div class="avds_link avds_link_large"><a href="categories.html">See More</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->
@auth
	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="product_grid">
						@foreach ($product as $products)
						<!-- Product -->
						<div class="product">
							@foreach ($products->product_image as $image)
							<div class="product_image"><img style="width:250px;height:250px;" src="/uploads/product_images/{{$image->image_name}}" alt=""></div>
								@break
							@endforeach
							@php
								$home = new Home;
                            	$disc = $home->tampildiskon($products->discount);
							@endphp
							@if($disc!=0)
								<div style="background-color:red;"class="product_extra product_new"><a href="categories.html">-{{$disc}}%</a></div>
							@endif
								<div class="product_content">
								<div class="product_title"><a href="/product/{{$products->id}}">{{$products->product_name}}</a></div>
							@php
								$home = new Home;
                            	$harga = $home->diskon($products->discount,$products->price);
							@endphp
							@if ($harga != 0)	   
								<div style="text-decoration:line-through;" class="product_price">Rp.{{number_format($products->price)}}</div>
								<div style="font-weight:bold;color:black;" class="product_price">Rp.{{number_format($harga)}}</div>
							@else
							<div class="product_price">Rp.{{number_format($products->price)}}</div>
							@endif
						</div>
						</div>
						@endforeach
				</div>
		</div>
	</div>
@endauth
	<!-- Ad -->
@auth
	<div class="avds_xl">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="avds_xl_container clearfix">
						<div class="avds_xl_background" style="background-image:url(assets/User/images/avds_xl.jpg)"></div>
						<div class="avds_xl_content">
							<div class="avds_title">Amazing Devices</div>
							<div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus.</div>
							<div class="avds_link avds_xl_link"><a href="categories.html">See More</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endauth
	<!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">
				
				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="assets/User/images/icon_1.svg" alt=""></div>
						<div class="icon_box_title">Free Shipping Worldwide</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="assets/User/images/icon_2.svg" alt=""></div>
						<div class="icon_box_title">Free Returns</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="assets/User/images/icon_3.svg" alt=""></div>
						<div class="icon_box_title">24h Fast Support</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_border"></div>
				</div>
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
