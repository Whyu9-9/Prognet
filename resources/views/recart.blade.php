@php
	$total = 0;
@endphp
<div class="container">
    <div class="row">
        <div class="col">
            <!-- Column Titles -->
            <div class="cart_info_columns clearfix">
                <div class="cart_info_col cart_info_col_product">Product</div>
                <div class="cart_info_col cart_info_col_price">Price</div>
                <div class="cart_info_col cart_info_col_quantity">Quantity</div>
                <div class="cart_info_col cart_info_col_total">Sub-Total</div>
            </div>
        </div>
    </div>
    @forelse ($carts as $isi)
    <div class="row cart_items_row">
        <div class="col">
            <!-- Cart Item -->
            <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                <!-- Name -->
                <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                    <input type="hidden" class="id_cart{{$loop->iteration-1}}" value="{{$isi->id}}">
                      <input type="hidden" id="user_id" value="{{$isi->user_id}}">
                      <input type="hidden" class="stock{{$loop->iteration-1}}" value="{{$isi->product->stock}}">
                    @foreach ($isi->product->product_image as $image)
                    <div class="cart_item_image">
                        <div><img src="/uploads/product_images/{{$image->image_name}}" alt=""></div>
                    </div>
                    @break
                    @endforeach
                    <div class="cart_item_name_container">
                        <div class="cart_item_name"><a href="#">{{$isi->product->product_name}}</a></div>
                        <div class="cart_item_edit"><a href="#">Edit Product</a></div>
                    </div>
                </div>
                <!-- Price -->
                @php
                    $home = new Home;
                    $harga = $home->diskon($isi->product->discount,$isi->product->price);
                @endphp
                @if ($harga != 0)
                <div class="cart_item_price">
                    Rp.<span class="float-lef grey-text price{{$loop->iteration-1}}">{{$harga}}</li>
                    Rp.<span class="float-lef grey-text"><small><s>{{$isi->product->price}}</s></small></span>
                </div>
                @else
                    <div class="cart_item_price">
                        Rp.<span class="float-lef grey-text price{{$loop->iteration-1}}">{{$isi->product->price}}</li>
                    </div>
                @endif
                <!-- Quantity -->
                <div class="cart_item_quantity">
                    <p class="text-danger" style="display:none" id="notif{{$loop->iteration-1}}"></p>
                    <span class="qty{{$loop->iteration-1}}">{{$isi->qty}} </span>
                    <div class="btn-group radio-group ml-2" data-toggle="buttons">
                        <label class="btn btn-sm btn-primary btn-rounded tombol-kurang">
                          <input type="radio" name="options" id="option1">-
                        </label>
    
                        <label class="btn btn-sm btn-success btn-rounded tombol-tambah" >
                          <input type="radio" name="options" id="option2">+
                        </label>

                        <button type="button" class="fa fa-trash btn btn-sm btn-danger tombolhapus" data-toggle="tooltip" data-placement="top" title="Remove item">
                    </div>
                </div>
                <!-- Total -->
                @if ($harga != 0)
                    <strong class="cart_item_total sub-total{{$loop->iteration-1}}">{{$harga*$isi->qty}}</strong>
                    @php
                        $total = $total + ($harga*$isi->qty);
                    @endphp
                @else
                    <strong class="cart_item_total sub-total{{$loop->iteration-1}}">{{$isi->product->price*$isi->qty}}</strong>
                    @php
                        $total = $total + ($isi->product->price*$isi->qty);
                    @endphp
                @endif
            </div>

        </div>
    </div>
    @empty
        <p class="fa fa-shopping-cart" style="font-size:50px;margin-left:495px;" align="center"><br><br>Cart Kosong!</p>
    @endforelse
    <div class="row row_cart_buttons">
        <div class="col">
            <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                <div class="button continue_shopping_button"><a href="/home">Continue shopping</a></div>
            </div>
        </div>
    </div>
    <div class="row row_extra">
        <div class="col-lg-4">
            
        </div>

        <div class="col-lg-6 offset-lg-2">
            <div class="cart_total">
                <div class="section_title">Cart total</div>
                <div class="section_subtitle">Final info</div>
                <div class="cart_total_container">
                    <ul>
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_total_title">Total</div>
                            <div class="cart_total_value ml-auto total">{{$total}}</div>
                        </li>
                    </ul>
                </div>
                <br>
                <div align="center">
                  <form action="/checkout" method="POST">
                		@csrf
                    	<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    	<input type="hidden" name="sub_total" value="{{$total}}">
                	<button type="submit" class="btn btn-dark">Complete purchase
						<i class="fa fa-angle-right right"></i>
                  	</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>		
<script src="{{ asset ('assets/User/js/jquery-3.2.1.min.js')}}"></script>
<script>
	jQuery(document).ready(function(e){
		jQuery('.tombol-tambah').click(function(e){
		  var index = $(".tombol-tambah").index(this);
		  var jumlah = $(".qty"+index).text();
		  var jumlah = parseInt(jumlah)+1
		  $(".qty"+index).text(jumlah);
		  var price = $('.price'+index).text();
		  console.log('price: '+price);
  
		  if(parseInt(jumlah) > parseInt($(".stock"+index).val())){
			  $("#notif"+index).css('display','inline');
			  $("#notif"+index).text('Jumlah stock melebihi stock produk');
			  $("#notif"+index).append('<br>');
			  $(".qty"+index).text(jumlah-1);
		  }else{
			var subtotal = parseInt(jumlah)*parseInt(price);
			console.log('subtotal: ', + subtotal)
			$(".sub-total"+index).text(subtotal);
			var total = parseInt($(".total").text());
			total = total + parseInt(price);
			$(".total").text(total);
			$("#notif"+index).css('display','none');
  
			jQuery.ajax({
				url: "{{url('/update_qty')}}",
				method: 'post',
				data: {
					_token: $('#signup-token').val(),
					id: $('.id_cart'+index).val(),
					qty: 1
				},
				success: function(result){
					console.log(result.success);
				}
			});
		  }
		});
  
		jQuery('.tombol-kurang').click(function(e){
		  var index = $(".tombol-kurang").index(this);
		  var jumlah = $(".qty"+index).text();
		  var jumlah = parseInt(jumlah)-1
		  $(".qty"+index).text(jumlah);
		  var price = $('.price'+index).text();
		  console.log('price: '+price);
  
		  if(parseInt(jumlah) == 0){
			  $("#notif"+index).css('display','inline');
			  $("#notif"+index).text('Tolong stock tidak boleh 0');
			  $("#notif"+index).append('<br>');
			  $(".qty"+index).text(1);
		  }else{
			var subtotal = parseInt(jumlah)*parseInt(price);
			console.log('subtotal: ', + subtotal)
			$(".sub-total"+index).text(subtotal);   
			var total = parseInt($(".total").text());
			total = total - parseInt(price);
			$(".total").text(total);
			$("#notif"+index).css('display','none');
			jQuery.ajax({
				url: "{{url('/update_qty')}}",
				method: 'post',
				data: {
					_token: $('#signup-token').val(),
					id: $('.id_cart'+index).val(),
					qty: -1
				},
				success: function(result){
					console.log(result.success);
				}
			});
		  }
		});
  
		jQuery('.tombolhapus').click(function(e){
		  var index = $(".tombolhapus").index(this);
		 var konfirmasi = confirm('Apakah anda yakin ingin menghapus produk dari keranjang?');
		  if(konfirmasi == true){
			jQuery.ajax({
				url: "{{url('/update_qty')}}",
				method: 'post',
				data: {
					_token: $('#signup-token').val(),
					id: $('.id_cart'+index).val(),
					user_id: $('#user_id').val(),
					qty: 0
				},
				success: function(result){
					$('.ganti').html(result.hasil);
					jQuery('#jumlahcart').text(result.jumlah);
					// console.log(result.success);
				}
			});
		  }
		});
	});
  </script>