@extends('layouts.parent')

@section('title','Edit Profile')

@section('content')
    <div class="col-12">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="col-12">
        <form action="{{route('dashboard.profile.update',$admin->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                      <label for="name">Name </label>
                      <input type="text" name="name" id="name" class="form-control" value="{{$admin->name}}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" id="phone" class="form-control" value="{{$admin->phone}}">
                    </div>
                </div>

                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$admin->email}}">
                    </div>
                </div>
            </div>
            </div>

            <div class="form-row">
                <div class="col-12">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <div class="col-4  my-3">
                    <img src="{{asset('images/admins/'.$admin->image)}}" class="w-100" alt="">
                </div>
                <div class="col-2 my-3">
                    <button class="btn btn-warning"> Update </button>
                </div>
            </div>
        </form>
    </div>
@endsection
