@extends('layouts.parent')

@section('title', 'Show Post')
@section('css')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
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
                <h3 class="card-title">Post</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h3>Title</h3>
                <div>
                    {{$post->title}}
                </div>
                <br>
                <h3>Image</h3>
                <div>
                    <img style="height: 100px; width: 100px;" src="{{asset('images/posts/' . $post->image)}}" alt="">
                </div>
                <br>
                <h3>Details</h3>
                <div>
                    {{$post->details}}
                </div>
                <br>
                <h3>Video</h3>
                <div>
                    <?php $link=explode('/',$post->link)?>
                    <iframe src="http://www.youtube.com/embed/{{$link[3]}}"
                    width="560" height="315" frameborder="0" ></iframe>
                </div>
                <br>
                <div>
                    <h2>Author: {{ Auth::user()->name }} </h2>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
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
