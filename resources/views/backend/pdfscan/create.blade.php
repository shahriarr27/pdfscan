@extends('layouts/layoutMaster')

@section('title', 'File upload - Forms')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/dropzone/dropzone.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/forms-file-upload.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 breadcrumb-wrapper mb-4">
  <span class="text-muted fw-light">Forms /</span> File upload
</h4>

<div class="row">
  <!-- Basic  -->
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Upload your PDF</h5>
      <div class="card-body">
        <form action="{{ route('pdf.create') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <input type="file" name="pdf" id="" class="form-control">
          </div>
          <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Basic  -->
</div>
@endsection
