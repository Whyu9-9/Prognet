@extends('layouts.main')
@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
          	<strong>{{ $message }}</strong>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
    	<button type="button" class="close" data-dismiss="alert">×</button> 
        	<strong>{{ $message }}</strong>
    </div>
@endif
<div class="table">
		<h2 class="card-title" align="center">List Produk</h2 >
		<br>
		<span>
		<button type="button" class="btn-sm btn-success btn-icon-text" onclick="">
			<i class="mdi mdi-upload btn-icon-prepend fa fa-plus"></i>     
			<a href="{{ route('products.create') }}" style="color: white;">Tambah Produk</a>
		</button>
		<button type="button" class="btn-sm btn-danger btn-icon-text" onclick="">
			<i class="mdi  mdi-delete btn-icon-prepend fa fa-trash"></i>
			<a href="/products-trash" style="color: white">Trash</a>
		</button>
		</span>
		  <table class="table table-striped table-hover" style="width:1100px;">
			<thead>
			  <tr>
				<th >
					No.
			 	</th>
				<th >
			   		Nama Produk
				</th>
				<th >
				  Kategori
				</th>
				<th style="text-align: center;">
					Diskon
				</th>
				<th colspan="3" style="text-align: center;">
				  Action
				</th>
			  </tr>
			</thead>
			<tbody>
			  @foreach($products as $product)
			  <tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $product->product_name }}</td>
				<td>
				@foreach($categories as $category)
					@if($product->id == $category->product_id)
					  <li>{{ $category->category_name }}</li>
					@endif
				@endforeach
				</td>
				<td align="center"><a 
					@foreach($discount as $discounts)
						@if($product->id == $discounts->id_product)
							class="btn btn-primary fa fa-percent"
						@endif
					@endforeach
						class="btn btn-danger fa fa-percent"
					href="{{ route('discounts.show',$product->id) }}"></a></td>
				<td align="center">
					<a class="btn-sm btn-info fa fa-eye" href="{{ route('products.show',$product->id) }}"></a>
				
					<a class="btn-sm btn-warning fa fa-pencil" href="{{ route('products.edit',$product->id)}}"></a>
				
					<a class="btn-sm btn-danger fa fa-trash" href="/products/delete/{{ $product->id }}" onclick="return confirm('Apa yakin ingin menghapus data ini?')"></a>
				</td>
			  </tr>
			  @endforeach
			</tbody>
		  </table>
		  {!! $products->links() !!}
  </div>
@endsection