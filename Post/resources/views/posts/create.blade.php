@extends('layouts.parent')

@section('title', 'Create Post')

@section('content')
    <div class="col-12">
        <form action="{{ route('dashboard.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                    </div>
                    @error('title')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea name="details" id="details" cols="30" rows="10" class="form-control">{{old('details')}}</textarea>
                    </div>
                    @error('details_en')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="link">Youtube Link</label>
                        <textarea name="link" id="link" cols="30" rows="10" class="form-control">{{old('link')}}</textarea>
                    </div>
                    @error('link')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-2 my-3">
                    <button class="btn btn-primary"> Store </button>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div class="col-12">
        {{-- @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif --}}
    </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td><a href="{{route('dashboard.posts.show',$post->id)}}">{{$post->title}}</a></td>
                                <td>{{$post->image}})</td>
                                <td>
                                    <form action="{{route('dashboard.posts.delete',$post->id)}}" method="post" class="d-inline">
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
                <!-- /.card-body -->
            </div>
        </div>

@endsection


@section('css')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
@endsection

