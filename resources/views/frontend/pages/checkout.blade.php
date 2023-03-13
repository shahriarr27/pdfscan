@extends('frontend.app')
@section('content')
<main>
  <section class="checkout">
    <div class="container">
      <div class="py-5 text-center">

        <h2>{{ __('product.confirm_pre_order_heading') }}</h2>
        <p class="lead">{{ __('product.description_after_confirm_form_hading') }}</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-dark">{{ __('product.cart_label') }}</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{ __('product.product_name_label') }}</h6>
              </div>
              <span class="text-muted">{{ __('product.product_name') }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>{{ __('product.total_label') }}</span>
              <strong>{{ strtoupper(app_setting('currency')) }} {{ app_setting('product_price') }}</strong>
            </li>
          </ul>

          <hr class="mb-4">

          <h4 class="mb-3">{{ __('product.payment_label') }}</h4>
          <div>
            <div id="paypal-button-container"></div>
          </div>
        </div>
        <div class="col-md-8 order-md-1 mb-5">
          <h4 class="mb-4">{{ __('product.billing_details_label') }}</h4>
          <form class="needs-validation order-form" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="fname" name="fname" autocomplete="off" required>
                  <label for="fname">{{ __('product.first_name_label') }}</label>
                </div>
                <div class="invalid-feedback">
                  {{ __('product.first_name_error_message') }}
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="lname" name="lname" autocomplete="off" required>
                  <label for="lname">{{ __('product.last_name_label') }}</label>
                </div>
                <div class="invalid-feedback">
                  {{ __('product.last_name_error_message') }}
                </div>
              </div>
            </div>

            <div class="mb-3">
                <div class="form-group">
                  <input type="text" class="form-control" id="company" name="company" autocomplete="off" required>
                  <label for="company">{{ __('product.company_label') }}</label>
                </div>
                <div class="invalid-feedback" style="width: 100%;">
                  {{ __('product.company_error_message') }}
                </div>
            </div>

            <div class="mb-3">

              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                <label for="email">{{ __('product.email_label') }}</label>
              </div>
              <div class="invalid-feedback">
                {{ __('product.email_error_message') }}
              </div>
            </div>
            <div class="mb-3">

              <div class="form-group">
                <input type="text" class="form-control" id="address" name="address" autocomplete="off" required>
                <label for="address">{{ __('product.address_label') }}</label>
              </div>
              <div class="invalid-feedback">
                {{ __('product.address_error_message') }}
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">

                <div class="form-group">
                  <input type="text" class="form-control" id="phone" name="phone" autocomplete="off" required>
                  <label for="phone">{{ __('product.phone_label') }}</label>
                </div>
                  <div class="invalid-feedback">
                    {{ __('product.phone_error_message') }}
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="vatnumber" name="vat" autocomplete="off" required>
                  <label for="vatnumber">{{ __('product.vat_label') }}</label>
                </div>
              </div>
            </div>
            {{-- <hr class="mb-4">
            <button class="btn btn-primary float-end" type="submit">Confirm Payment</button> --}}
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
@push('script')
<script src="//paypal.com/sdk/js?client-id={{ app_setting('PAYPAL_LIVE_CLIENT_ID') }}&currency={{ strtoupper(app_setting('currency')) }}&disable-funding=venmo,paylater"></script>

<script>
paypal.Buttons({
    style: {
      layout: 'horizontal',
    },
    createOrder: (data, actions) => {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: parseFloat("{{app_setting('product_price')}}")
                }
            }]
        });
    },
    onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
            const transaction = orderData.purchase_units[0].payments.captures[0];
            $.ajax({
                url: "{{ route('payment') }}",
                type: "POST",
                data: $(".order-form").serialize()
            })
            var alert = `
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            <div>
                Payment successful
            </div>
        </div>
        `;
            $("#paypal-button-container").html(alert);
            setTimeout(function() {
              window.location.href = "/";
            }, 5000);
        });
    }
}).render('#paypal-button-container');
</script>
@endpush
