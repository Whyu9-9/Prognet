@extends('layouts.main')
@section('content')
<div class="market-updates">
	<div class="col-md-4 market-update-gd">
		<div class="market-update-block clr-block-1">
			<div class="col-md-8 market-update-left">
				<h3>{{ \App\User::all()->count() }}</h3>
				<h4>Registered User</h4>
				<a href="#" style="color:white; text-decoration: underline">See detail</a>
			</div>
			<div class="col-md-4 market-update-right">
				<i class="fa fa-file-text-o"> </i>
			</div>
		  <div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-4 market-update-gd">
		<div class="market-update-block clr-block-2">
		 <div class="col-md-8 market-update-left">
			<h3>{{ \App\Transaction::all()->count() }}</h3>
			<h4>Transaction</h4>
			<p>Other hand, we denounce</p>
		  </div>
			<div class="col-md-4 market-update-right">
				<i class="fa fa-eye"> </i>
			</div>
		  <div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-4 market-update-gd">
		<div class="market-update-block clr-block-3">
			<div class="col-md-8 market-update-left">
				<h3>{{ \App\Product::all()->count() }}</h3>
				<h4>Active Product</h4>
				<p>Other hand, we denounce</p>
			</div>
			<div class="col-md-4 market-update-right">
				<i class="fa fa-envelope-o"> </i>
			</div>
		  <div class="clearfix"> </div>
		</div>
	</div>
   <div class="clearfix"> </div>
</div>
<!--market updates end here-->
<!--mainpage chit-chating-->
<div class="chit-chat-layer1"></div>
<!--main page chit chating end here-->
<!--main page chart start here-->
<input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
<div class="row">
    <div class="col-md-6 market-update-gd">
      <div class="market-update-block clr-block-3">
        <div class="card-body">
		  <h4 class="font-weight-normal mb-3">Transaksi Bulan 
			  <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
		  <select name="bulan" id="bulan" style="
            margin-bottom: 1em;
            padding: .25em;
            border: 0;
            font-weight: bold;
            letter-spacing: .15em;
            color: white;
            background-color: rgba(255,255,255,0.1);
            border-radius: 0;
            &:focus, &:active {
              outline: 0;
              border-bottom-color: red;
              color: black;
            }
          ">
              <option value="1" style="color:black" @if (date('m') == 1)
                  selected
              @endif>Januari</option>
              <option value="2" style="color:black"  @if (date('m') == 2)
              selected
          @endif>Februari</option>
              <option value="3" style="color:black"  @if (date('m') == 3)
              selected
          @endif>Maret</option>
              <option value="4" style="color:black"  @if (date('m') == 4)
              selected
          @endif>April</option>
              <option value="5" style="color:black"  @if (date('m') == 5)
              selected
          @endif>Mei</option>
              <option value="6" style="color:black"  @if (date('m') == 6)
              selected
          @endif>Juni</option>
              <option value="7" style="color:black"  @if (date('m') == 7)
              selected
          @endif>Juli</option>
              <option value="8" style="color:black"  @if (date('m') == 8)
              selected
          @endif>Agustus</option>
              <option value="9" style="color:black"  @if (date('m') == 9)
              selected
          @endif>September</option>
              <option value="10" style="color:black"  @if (date('m') == 10)
              selected
          @endif>Oktober</option>
              <option value="11" style="color:black"  @if (date('m') == 11)
              selected
          @endif>November</option>
              <option value="12" style="color:black"  @if (date('m') == 12)
              selected
          @endif>Desember</option>
          </select>
          </h4>
          @php
              setlocale(LC_MONETARY,"id_ID");
          @endphp
          <h2 class="mb-2">Jumlah Transaksi: <span><strong id="total">{{$status['total']}}</strong></span></h2>
          <p>Unverified Transaction <span> <strong id="unverified">{{$status['unverified']}}</strong></span></p>
          <p>Expired Transaction <span><strong id="expired">{{$status['expired']}}</strong></span></p>
          <p>Canceled Transaction <span><strong id="canceled">{{$status['canceled']}}</strong></span></p>
          <p>Verified Transaction <span><strong id="verified">{{$status['verified']}}</strong></span></p>
          <p>Delivered Transaction <span><strong id="delivered">{{$status['delivered']}}</strong></span></p>
          <p>Success Transaction <span><strong id="success">{{$status['success']}}</strong></span></p>
          <h4>Total Penghasilan <span><strong id="harga">Rp {{number_format($status['harga'],0,',','.')}}</strong></span></h4>
        </div>
      </div>
	</div>
	<div class="col-md-6 market-update-gd">
		<div class="market-update-block clr-block-3">
		  <div class="card-body">
			<h4 class="font-weight-normal mb-3">Transaksi Tahun <select name="tahun" id="tahun" style="
			  margin-bottom: 1em;
			  padding: .25em;
			  border: 0;
			  font-weight: bold;
			  letter-spacing: .15em;
			  color: white;
			  background-color: rgba(255,255,255,0.1);
			  border-radius: 0;
			  &:focus, &:active {
				outline: 0;
				border-bottom-color: red;
				color: black;
			  }
			">

			@for ($i = 2019; $i <= date('Y'); $i++)
				<option value="{{$i}}" @if ($i == date('Y'))
					selected
				@endif style="color:black">{{$i}}</option>
			@endfor
			</select> <i class="mdi mdi-diamond mdi-24px float-right"></i>
			</h4>
			
			<h2 class="mb-2">Jumlah Transaksi: <span><strong id="total-tahun">{{$transaksi_tahun->count()}}</strong></span></h2>
			<p>Unverified Transaction <span> <strong id="unverified-tahun">{{$status_tahun['unverified']}}</strong></span></p>
			<p>Expired Transaction <span><strong id="expired-tahun">{{$status_tahun['expired']}}</strong></span></p>
			<p>Canceled Transaction <span><strong id="canceled-tahun">{{$status_tahun['canceled']}}</strong></span></p>
			<p>Verified Transaction <span><strong id="verified-tahun">{{$status_tahun['verified']}}</strong></span></p>
			<p>Delivered Transaction <span><strong id="delivered-tahun">{{$status_tahun['delivered']}}</strong></span></p>
			<p>Success Transaction <span><strong id="success-tahun">{{$status_tahun['success']}}</strong></span></p>
			<h4>Total Penghasilan <span><strong id="harga-tahun">Rp {{number_format($status_tahun['harga'],0,',','.')}}</strong></span></h4>
		  </div>
		</div>
	  </div>
	</div>
	@for ($i = 1; $i <= 12; $i++)
		<input type="hidden" id='bulan{{$i}}' value="{{$bulan[$i]}}">
	@endfor
	<br><br>
	  <div class="d-flex flex-row bd-highlight mb-3">
		  <div class="col-md-3 grid-margin stretch-card">
			  <div class="card">
				  <div class="card-body">
						  <h4 class="card-title">Transaction Type</h4>
						  <br>
						  <div class="btn-group-vertical">
							  <button class="btn btn-primary status" id="all">All</button>
							  <button class="btn btn-primary status" id="unverified">Unverivied</button>
							  <button class="btn btn-primary status" id="expired">Expired</button>
							  <button class="btn btn-primary status" id="verified">Verified</button>
							  <button class="btn btn-primary status" id="delivered">Delivered</button>
							  <button class="btn btn-primary status" id="success">Success</button>
							  <button class="btn btn-primary status" id="canceled">Canceled</button>
						  </div>
				  </div> 
			  </div>
		   </div>   
		   <div class="col-md-9 grid-margin stretch-card"> 
			<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
			<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
			   <div class="card">
				  <div class="card-body">
					  <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
				  </div>
			  </div> 
		  </div> 
	  </div>
@endsection