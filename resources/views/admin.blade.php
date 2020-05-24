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
<div class="main-page-charts">
<div class="main-page-chart-layer1">
<div class="col-md-6 chart-layer1-left"> 
	<div class="glocy-chart">
	<div class="span-2c">  
				<h3 class="tlt">Sales Analytics</h3>
				<canvas id="bar" height="300" width="400" style="width: 400px; height: 300px;"></canvas>
				<script>
					var barChartData = {
					labels : ["Jan","Feb","Mar","Apr","May","Jun","jul"],
					datasets : [
						{
							fillColor : "#FC8213",
							data : [65,59,90,81,56,55,40]
						},
						{
							fillColor : "#337AB7",
							data : [28,48,40,19,96,27,100]
						}
					]

				};
					new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);

				</script>
			</div> 			  		   			
	</div>
</div>
<div class="clearfix"> </div>
</div>
</div>
@endsection