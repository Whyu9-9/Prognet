<!DOCTYPE html>
<html lang="en">
<head>
<title>Checkout</title>
<link rel="shortcut icon" href="{{asset('assets/User/images/shirt.png')}}" type="image/x-icon">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link href="{{asset('assets/css/mdb.min.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('assets/User/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/styles/checkout.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/styles/checkout_responsive.css')}}">
</head>
<body>

<div class="super_container">

	@extends('layouts.navbar')
	
	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(assets/User/images/cart.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="index.html">Home</a></li>
										<li><a href="cart.html">Shopping Cart</a></li>
										<li>Checkout</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Checkout -->
	
	<div class="checkout">
		<div class="container">
      <form action="/beli" method="post" id="checkout_form" class="checkout_form">
        @csrf
			<div class="row">

				<!-- Billing Info -->
				<div class="col-lg-6">
					<div class="billing checkout_section">
						<div class="section_title">Billing Address</div>
						<div class="section_subtitle">Enter your address info</div>
						<div class="checkout_form_container">
								<div>
									<!-- Name -->
									<label for="checkout_name">Name*</label>
									<input type="text" value="{{Auth::user()->name}}" id="nama" class="checkout_input" disabled>
								</div>
								<div>
									<!-- Email -->
									<label for="checkout_email">Email Address*</label>
									<input type="email" value="{{Auth::user()->email}}" id="email" class="checkout_input" disabled>
								</div>
								<div>
									<!-- Phone no -->
									<label for="checkout_phone">Phone no*</label>
									<input name="no_telp" type="text" id="nomor-telp" class="checkout_input" required="required">
								</div>
								<div>
									<!-- Province -->
									<label for="checkout_province">Province*</label>
									<select name="province" id="provinsi" class="dropdown_item_select checkout_input cekongkir" require="required">
										<option>Provinsi*</option>
                      @foreach ($provinsi as $prov)
                        <option value="{{$prov->id}}">{{$prov->title}}</option>
                      @endforeach
									</select>
								</div>
								<div>
									<!-- City / Town -->
									<label for="checkout_city">City/Town*</label>
									<select name="regency" id="kota" class="dropdown_item_select checkout_input cekongkir" require="required">
										<option value=""></option>
									</select>
								</div>
								<div>
									<!-- Address -->
									<label for="checkout_address">Address*</label>
									<input type="text" id="alamat" name="address" class="checkout_input" required="required">
								</div>
								<div>
									<label for="checkout_province">Courier*</label>
									<select name="courier" id="kurir" class="dropdown_item_select checkout_input cekongkir">
                                        <option>Kurir*</option>
                                        @foreach ($kurir as $k)
                                            <option value="{{$k->id}}">{{$k->courier}}</option>
                                        @endforeach
                                    </select>
								</div>
						</div>
					</div>
				</div>

				<!-- Order Info -->

				<div class="col-lg-6">
					<div class="order checkout_section">
						<div class="section_title">Your order</div>
						<div class="section_subtitle">Order details</div>

						<!-- Order details -->
						<div class="order_list_container">
							<ul class="order_list">
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Subtotal</div>
									<div class="order_list_value ml-auto">Rp.{{$subtotal}}</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
                  <div class="order_list_title">Shipping</div>
                  <div class="order_list_value ml-auto" id="biaya-ongkir"></div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Total</div>
									<div class="order_list_value ml-auto">Rp.<span id="total-biaya"></span></div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<input type="hidden" name="sub_total" value="{{$subtotal}}">
                  <input type="hidden" name="total" id="totalbiaya">
                  <input type="hidden" name="shipping_cost" id="ongkir">
                  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                  <input type="hidden" name="product_id" value="{{$product_id}}">
									<input type="hidden" name="qty" value="{{$qty}}">
									
									<button type="submit" class="btn btn-primary btn-rounded" id="beli">Proceed</button>
								</li>
							</ul>
						</div>
					</div>
				</div>
      </div>
    </form>
    </div>
	</div>
	<div class="container ganti">
        <section class="section my-5 pb-5">
  
          <!-- Shopping Cart table -->
          <div style="color:#333333;" class="table-responsive">
            <h1 align="center">Rincian Produk</h1>

            <table class="table product-table">
  
              <!-- Table head -->
              <thead>
  
                <tr>
  
                  <th></th>
  
                  <th class="font-weight-bold">
  
                    <strong>Product</strong>
  
                  </th>
  
                  <th></th>
  
                  <th class="font-weight-bold">
  
                    <strong>Price</strong>
  
                  </th>
  
                  <th class="font-weight-bold">
  
                    <strong>QTY</strong>
  
                  </th>  
                  <th></th>
  
                </tr>
  
              </thead>
              <!-- Table head -->
  
              <!-- Table body -->
              <tbody>
  
                <!-- First row -->
                @foreach ($cart as $item)
                <tr>
                  @if (is_null($item->product))
                  <th scope="row">
                    <input type="hidden" class="id_cart{{$loop->iteration-1}}" value="{{$item->id}}">
                    <input type="hidden" id="user_id" value="{{$item->user_id}}">
                    <input type="hidden" class="stock{{$loop->iteration-1}}" value="{{$item->stock}}">
                      @foreach ($item->product_image as $image)
                          <img style="width:50px; height:50px;" src="{{asset('/uploads/product_images/'.$image->image_name)}}" alt=""
                          class="img-fluid z-depth-0">
                          @break
                      @endforeach
                  </th>
  
                  <td>
                    <h5 class="mt-3">
                      <strong>{{$item->product_name}}</strong>
                    </h5>
                  </td>
                  <td></td>
                  @php
                      $home = new Home;
                      $hasil = $home->diskon($item->discount,$item->price);
                  @endphp
                  @if ($hasil != 0)
                         <td> Rp<span class="float-lef grey-text price{{$loop->iteration-1}}">{{$hasil}}</li>
                          Rp.<span class="float-lef grey-text"><small><s>{{$item->price}}</s></small></span>
                        </td>
                  @else
                          <td>Rp.<span class="float-lef grey-text price{{$loop->iteration-1}}">{{$item->price}}</li></td>
                  @endif
                  <td class="text-center text-md-left">
  
                    <span class="qty{{$loop->iteration-1}}">{{$qty}} </span>
  
                  </td>    

                  @else
                  <th scope="row">
                    <input type="hidden" class="id_cart{{$loop->iteration-1}}" value="{{$item->id}}">
                    <input type="hidden" id="user_id" value="{{$item->user_id}}">
                    <input type="hidden" class="stock{{$loop->iteration-1}}" value="{{$item->product->stock}}">
                      @foreach ($item->product->product_image as $image)
                          <img style="width:50px; height:50px;" src="{{asset('/uploads/product_images/'.$image->image_name)}}" alt="" class="img-fluid z-depth-0">
                          @break
                      @endforeach
                  </th>
  
                  <td>
                    <h5 class="mt-3">
                      <strong>{{$item->product->product_name}}</strong>
                    </h5>
                  </td>
                  <td></td>
                  @php
                      $home = new Home;
                      $hasil = $home->diskon($item->product->discount,$item->product->price);
                  @endphp
                  @if ($hasil != 0)
                         <td> Rp<span class="float-lef grey-text price{{$loop->iteration-1}}">{{$hasil}}</li>
                          Rp<span class="float-lef grey-text"><small><s>{{$item->product->price}}</s></small></span></td>
                  @else
                          <td>Rp<span class="float-lef grey-text price{{$loop->iteration-1}}">{{$item->product->price}}</li></td>
                  @endif
                  <td class="text-center text-md-left">
                    <p class="text-danger" style="display:none" id="notif{{$loop->iteration-1}}"></p>
  
                    <span class="qty{{$loop->iteration-1}}">{{$item->qty}} </span>
  
                  </td>    

                  @endif
  
                </tr>
                @endforeach
  
              </tbody>
              <!-- Table body -->
  
            </table>
  
          </div>
          <!-- Shopping Cart table -->
  
        </section>
        <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
        <input type="hidden" value="{{$weight}}" id="weight">
      </div>
</div>
<script src="{{ asset ('assets/User/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset ('assets/User/styles/bootstrap4/popper.js')}}"></script>
<script src="{{ asset ('assets/User/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{ asset ('assets/User/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{ asset ('assets/User/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{ asset ('assets/User/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{ asset ('assets/User/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{ asset ('assets/User/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{ asset ('assets/User/plugins/easing/easing.js')}}"></script>
<script src="{{ asset ('assets/User/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{ asset ('assets/User/js/checkout.js')}}"></script>
<script>
    $(document).ready(function(e){
        $('#provinsi').change(function(e){
            var id_provinsi = $('#provinsi').val()
            if(id_provinsi){
                jQuery.ajax({
                    url: '/kota/'+id_provinsi,
                    type: "GET",
                    dataType: "json",
                    success:function(data){
                        $('#kota').empty();
                        $.each(data, function(key,value){
                            $('#kota').append('<option value="'+key+'">'+value+'</option>');
                        });
                    },
                });
            }else{
                $('#kota').empty();
            }
        });

        $('.cekongkir').change(function(e){
            var kurir = $('#kurir').val();
            var provinsi = $('#provinsi').val();
            var kota = $('#kota').val();
            var berat = parseInt($('#weight').val());
            if(provinsi>0 && kurir>0){
                jQuery.ajax({
                    url: "{{url('/ongkir')}}",
                    method: 'POST',
                    data: {
                        _token: $('#signup-token').val(),
                        destination: kota,
                        weight: berat,
                        courier: kurir,
                        prov: provinsi, 
                    },
                    success: function(result){
                        console.log(result.success);
                        console.log(result.hasil["etd"]);
                        $('#biaya-ongkir').text('Biaya Pengiriman: Rp.'+result.hasil["value"]);
                        $('#ongkir').val(result.hasil["value"]);
                        $('#biaya-ongkir').append('<input type="hidden" id="biaya-ongkir" value="'+result.hasil["value"]+'">');
                        $('#biaya-ongkir').append('<li>Estimasi sampai: '+result.hasil["etd"]+'Hari</li>');
                        $('#total-biaya').text({{$subtotal}}+result.hasil["value"]);
                        $('#totalbiaya').val({{$subtotal}}+result.hasil["value"]);
                    }
                });
                // console.log('wrong');
                // console.log('kota: '+kota+' provinsi: '+provinsi+' Kurir: '+kurir)
            }else{
                console.log('wrong');
                console.log('provinsi: '+provinsi+' Kurir: '+kurir)
            }

        });

        $('#beli').click(function(e){
          var kurir = $('#kurir').val();
          var provinsi = $('#provinsi').val();
          var kota = $('#kota').val();
          var alamat = $('#alamat').val();
          var totals = parseInt($('#total-biaya').text());
          var subtotal = parseInt('{{$subtotal}}');
          var ongkir = $('#biaya-ongkir').val();
          var user = $('#user_id').val();
          console.log(totals)
          if(totals==0){
            alert('Tolong Lengkapi Masukan Data');
            return false;
          }
        });
    });
</script>
</body>
</html>