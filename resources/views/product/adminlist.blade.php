<head>
   <link rel="shortcut icon" href="{{asset('assets/User/images/shirt.png')}}" type="image/x-icon">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <link href="{{ asset('assets/Admin/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
   <!-- Custom Theme files -->
   <link href="{{ asset('assets/Admin/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
   <!--js-->
   <script src="{{ asset('assets/Admin/js/jquery-2.1.1.min.js')}}"></script> 
   <!--icons-css-->
   <link href="{{ asset('assets/Admin/css/font-awesome.css')}}" rel="stylesheet"> 
   <!--Google Fonts-->
   <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
   <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
   <!--static chart-->
   <script src="{{ asset('assets/Admin/js/Chart.min.js')}}"></script>
   <!--//charts-->
</head>

<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
@extends('layouts.adminnavbar')

@section('content')
  <div class="container">
   <div class="row">
      <a href="{{ route('products.create') }}" class="btn btn-success">Add</a>
      <br><br>
        <div class="col-12">
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Product Name</th>
                 <th>Product Price</th>
                 <th>Description</th>
                 <th>Stock</th>
                 <th>Created at</th>
                 <th>Updated at</th>
                 <td colspan="2" style="text-align:center;">Action</td>
              </tr>
           </thead>
           <tbody>
              @foreach($products as $product)
              <tr>
                 <td>{{ $product->id }}</td>
                 <td>{{ $product->product_name }}</td>
                 <td>{{ $product->price }}</td>
                 <td>{{ $product->description }}</td>
                 <td>{{ $product->stock }}</td>
                 <td>{{ date('Y-m-d', strtotime($product->created_at)) }}</td>
                 <td>{{ date('Y-m-d', strtotime($product->updated_at)) }}</td>
                 <td><a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
                 <td>
                 <form action="{{ route('products.destroy', $product->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $products->links() !!}
       </div> 
   </div>
</div>
   @extends('layouts.sidebaradmin')
   <script src="{{ asset('assets/Admin/js/bootstrap.js')}}"> </script>
 @endsection
 