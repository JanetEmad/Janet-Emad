@extends('layouts.parent')


@section('title', 'Dashboard')


@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Price (EGP)</th>
                        <th>Qauantity</th>
                        <th>Created At</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name_en }} - {{$product->name_ar}}</td>
                        <td>{{$product->code}})</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>
                            <a href="{{route('dashboard.products.edit',$product->id)}}" class="btn btn-outline-warning">Edit</a>
                            <form action="{{route('dashboard.products.delete',$product->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
