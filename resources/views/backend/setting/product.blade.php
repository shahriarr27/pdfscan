@extends('layouts/layoutMaster')

@section('title', 'Dashboard')

@section('content')
    <div class="row"><!-- Referral Chart-->
      <div class="col-12 mb-4">
          <div class="card">
              <div class="card-header pb-0">
                <h3>Product</h3>
              </div>
              <div class="card-body">
                  <form action="{{ route('settings_store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                          <label class="form-label" for="product_name">Product Name</label>
                          <input type="hidden" name="type[]" value="product_name">
                          <input type="text" name="product_name"
                              value="{{ app_setting('product_name') }}" class="form-control"
                              id="product_name" placeholder="">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="product_name_italian">Product Name (Italian Language 🇮🇹)</label>
                        <input type="hidden" name="type[]" value="product_name_italian">
                        <input type="text" name="product_name_italian"
                            value="{{ app_setting('product_name_italian') }}" class="form-control"
                            id="product_name_italian" placeholder="">
                      </div>
                      <hr>
                      <div class="mb-3">
                        <label class="form-label" for="product_description_01">Product Description 01</label>
                        <input type="hidden" name="type[]" value="product_description_01">
                        <textarea type="text" name="product_description_01" rows="5" class="form-control"
                            id="product_description_01" placeholder="">{{ app_setting('product_description_01') }}</textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="product_description_01_itailan">Product Description 01(Italian 🇮🇹)</label>
                        <input type="hidden" name="type[]" value="product_description_01_itailan">
                        <textarea type="text" name="product_description_01_itailan" rows="5" class="form-control"
                            id="product_description_01_itailan" placeholder="">{{ app_setting('product_description_01_itailan') }}</textarea>
                      </div>
                      <hr>
                      <div class="mb-3">
                        <label class="form-label" for="product_description_02">Product Description 02</label>
                        <input type="hidden" name="type[]" value="product_description_02">
                        <textarea type="text" name="product_description_02" rows="5" class="form-control"
                            id="product_description_02" placeholder="">{{ app_setting('product_description_02') }}</textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="product_description_02_itailan">Product Description 02(Italian 🇮🇹)</label>
                        <input type="hidden" name="type[]" value="product_description_02_itailan">
                        <textarea type="text" name="product_description_02_itailan" rows="5" class="form-control"
                            id="product_description_02_itailan" placeholder="">{{ app_setting('product_description_02_itailan') }}</textarea>
                      </div>
                      <div class="mb-3">
                          <input type="submit" class="btn btn-primary" value="Update">
                      </div>
                  </form>
              </div>
          </div>
      </div>

      <div class="col-12 mb-4">
        <div class="card">
            <div class="card-header pb-0">
              <h3>Checkout Page</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('settings_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="description_checkout_page_after_title">Checkout page after title description</label>
                        <input type="hidden" name="type[]" value="description_checkout_page_after_title">
                        <textarea type="text" name="description_checkout_page_after_title" class="form-control"
                            id="description_checkout_page_after_title" placeholder="">{{ app_setting('description_checkout_page_after_title') }}</textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="description_checkout_page_after_title_italian">Checkout page after title description(Italian)</label>
                      <input type="hidden" name="type[]" value="description_checkout_page_after_title_italian">
                      <textarea type="text" name="description_checkout_page_after_title_italian" class="form-control"
                          id="description_checkout_page_after_title_italian" placeholder="">{{ app_setting('description_checkout_page_after_title_italian') }}</textarea>
                  </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('page-script')
    <script></script>
@endsection

@section('vendor-style')
@endsection

@section('vendor-script')
@endsection
