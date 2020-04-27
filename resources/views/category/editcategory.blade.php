@extends('layouts.main')
@section('content')
@if ($message = Session::get('success'))
      		<div class="alert alert-success alert-block">
        		<button type="button" class="close" data-dismiss="alert">×</button> 
          		<strong>{{ $message }}</strong>
      		</div>
@endif
<div style="margin-top:50px ">
    <div class="container">
        <div class="row align-items-centre">
            <div class="col-lg-2">
            </div>
            <div class="col-md-8">
                <div class="component">
                    <div class="card">
                        <form class="form-signin" action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="card-header">
                                <center>
                                    <h2>Edit Kategori Produk</h2>
                                    <br>
                                </center>
                            </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" class="form-control" placeholder="Nama Kategori" value="{{ $category->category_name }}" aria-label="Nama Kurir" aria-describedby="basic-addon1" name="category_name">
                        </div>
                    </div>
                    <div class="card-footer" align="center">
                        <button class="btn btn-success fa fa-pencil" type="submit" onclick="return confirm('Apa yakin ingin mengubah data ini?')"> Edit</button>
                    </div>
                        </form>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
	<br><br><br><br><br><br>
@endsection