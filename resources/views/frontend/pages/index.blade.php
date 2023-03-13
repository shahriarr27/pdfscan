@extends('frontend.app')
@section('content')

<main>
  <section class="product_image">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <div class="left-side">
            <img src="assets/images/product_image.png" alt="img" class="img-fluid">
          </div>
        </div>
        <div class="col-lg-5">
          <div class="right-side">
            <h2 class="product-title">{!! __('product.product_name') !!}</h2>
            <h4 class="subtitle">{!! __('product.subtitle') !!}</h4>
            <a href="{{ route('checkout') }}" class="buyBtn">{!! __('product.pre_order_btn') !!}</a>
          </div>
        </div>
      </div>
      <p>{!! __('product.description_1') !!}</p>
    </div>
  </section>
  <section class="video">
    <div class="container">
      <div class="video-wrapper">
        <video src="assets/videos/A.mp4" class="img-fluid" autoplay loop></video>
      </div>
    </div>
    <div class="description">
      <div class="container">
        <p>{!! __('product.description_2')!!}</p>
      </div>
    </div>
  </section>
  <section class="col-layout" id="video-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 left-side" id="shrink-video">
          <div class="video-wrapper">
            <video src="assets/videos/B.mp4" class="img-fluid" autoplay loop></video>
          </div>
        </div>
        <div class="col-lg-4 middle" id="middle">
          <div class="video-wrapper">
            <video id="my-video" src="assets/videos/C.mp4" class="img-fluid" autoplay loop></video>
          </div>
        </div>
        <div class="col-lg-4 right-side" id="right-side">
          <h2 class="mb-4">{!! __('product.product_heading_right') !!}</h2>
          <p>{!! __('product.product_description_right') !!}</p>
        </div>
      </div>
    </div>
  </section>
  <section class="last-video">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-side">
            <h2 class="mb-4">{!! __('product.product_heading_left') !!}</h2>
            <p>{!! __('product.product_description_left')!!}</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-side">
            <div class="video-wrapper">
              <video src="assets/videos/D.mp4" class="img-fluid" autoplay loop></video>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="summary">
    <div class="container">
      <p class="mt-5">{!! __('product.summary') !!}</p>
    </div>
  </section>

</main>

@endsection

