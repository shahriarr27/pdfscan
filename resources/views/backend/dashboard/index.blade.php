
@extends('layouts/layoutMaster')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
      <!-- Referral Chart-->
      <div class="col-sm-3 col-6 mb-4">
        <div class="card">
          <div class="card-body text-center">
            <h2 class="mb-1">Dashboard</h2>
            {{-- <span class="text-muted">Product : </span> --}}
            <div id="referralLineChart"></div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('page-script')
{{-- <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script> --}}
<script>

</script>
@endsection

@section('vendor-style')
@endsection

@section('vendor-script')
@endsection
