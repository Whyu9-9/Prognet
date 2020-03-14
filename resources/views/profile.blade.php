@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatars/{{ $user->profile_image }}" style="width:170px; height:170px; float:left; border-radius:50%; margin-right:25px;">
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
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
