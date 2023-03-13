@extends('layouts/layoutMaster')

@section('title', 'Dashboard')

@section('content')
    <div class="row"><!-- Referral Chart-->
        <div class="col-sm-6 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('settings_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="PAYPAL_LIVE_CLIENT_ID">Paypal Live Client ID</label>
                            <input type="hidden" name="type[]" value="PAYPAL_LIVE_CLIENT_ID">
                            <input type="text" name="PAYPAL_LIVE_CLIENT_ID"
                                value="{{ app_setting('PAYPAL_LIVE_CLIENT_ID') }}" class="form-control"
                                id="PAYPAL_LIVE_CLIENT_ID" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="currency">Currency</label>
                            <input type="hidden" name="type[]" value="currency">
                            <input type="text" name="currency" value="{{ app_setting('currency') }}" class="form-control"
                                id="currency" placeholder="">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-6 mb-4">
          <div class="card">
              <div class="card-body">
                  <form action="{{ route('settings_store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                          <label class="form-label" for="product_price">Product Price</label>
                          <input type="hidden" name="type[]" value="product_price">
                          <input type="text" name="product_price"
                              value="{{ app_setting('product_price') }}" class="form-control"
                              id="product_price" placeholder="" value="100">
                      </div>
                      <div class="mb-3">
                          <input type="submit" class="btn btn-primary" value="Update">
                      </div>
                  </form>
              </div>
          </div>
      </div>
        {{-- <div class="col-sm-6 col-6 mb-4">
            <form action="{{ route('envSettingStore') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card">
                  <div class="card-header h3">
                      Email Settings
                  </div>
                  <div class="card-body">
                      <div class="row mt-1">
                          <label for="" class="">Email Host</label>
                          <div class="">
                              <input type="hidden" name="type[]" value="MAIL_HOST">
                              <input type="text" name="MAIL_HOST" class="form-control" placeholder="Email Host" value="{{ env('MAIL_HOST') }}">
                          </div>
                      </div>
                      <div class="row mt-3">
                          <label for="" class="">Email Port</label>
                          <div class="">
                              <input type="hidden" name="type[]" value="MAIL_PORT">
                              <input type="number" name="MAIL_PORT" class="form-control" placeholder="Outgoing Email Port" value="{{ env('MAIL_PORT') }}">
                          </div>
                      </div>
                      <div class="row mt-3">
                          <label for="" class="">Email Username (email)</label>
                          <div class="">
                              <input type="hidden" name="type[]" value="MAIL_USERNAME">
                              <input type="text" name="MAIL_USERNAME" class="form-control" placeholder="Email username" value="{{ env('MAIL_USERNAME') }}">
                          </div>
                      </div>
                      <div class="row mt-3">
                          <label for="" class="">Email Password</label>
                          <div class="">
                              <input type="hidden" name="type[]" value="MAIL_PASSWORD">
                              <input type="text" name="MAIL_PASSWORD" class="form-control" placeholder="Email Password" value="{{ env('MAIL_PASSWORD') }}">
                          </div>
                      </div>
                      <div class="row mt-3">
                          <label for="" class="">Sending From Email</label>
                          <div class="">
                              <input type="hidden" name="type[]" value="MAIL_FROM_ADDRESS">
                              <input type="email" name="MAIL_FROM_ADDRESS" class="form-control" placeholder="Email From Address" value="{{ env('MAIL_FROM_ADDRESS') }}">
                          </div>
                      </div>

                      <div class="row mt-3">
                          <div class="col text-right">
                              <input type="submit" class="btn btn-primary" value="Update">
                          </div>
                      </div>
                  </div>
              </div>
          </form>
      </div> --}}
    </div>
@endsection

@section('page-script')
    <script></script>
@endsection

@section('vendor-style')
@endsection

@section('vendor-script')
@endsection
