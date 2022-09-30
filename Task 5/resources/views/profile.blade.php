@extends('layouts.parent')

@section('title', 'My Profile')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Admin Profile</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Created At</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$admin->id}}</td>
                        <td>{{$admin->name }} </td>
                        <td>{{$admin->phone}}</td>
                        <td>{{$admin->email}}</td>
                        <td><img style="height: 100px; width: 100px;" src="{{asset('images/admins/' . $admin->image)}}" alt=""></td>
                        <td>{{$admin->created_at}}</td>
                        <td><a href="{{route('dashboard.profile.edit',$admin->id)}}" class="btn btn-outline-warning">Edit</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
