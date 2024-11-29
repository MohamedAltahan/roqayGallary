@extends('frontend.layout.master')
@section('title')
    {{ $design->name[App::getLocale()] }}
@endsection
@section('content')
    <div class="breadcrumb"><!-- *BreadCrumb Starts here** -->

    </div><!-- *BreadCrumb Ends here** -->
    <section id="primary" class="content-full-width" style="min-height: 50vh "> <!-- **Primary Starts Here** -->
        <div class="container">

            <div class="main-title " data-animation="pullDown" data-delay="1">
                <h3> {{ @$design->name[App::getLocale()] }} </h3>
            </div>

            <div class="dt-sc-service-content">
                <h4>
                    {!! @$design->long_description[App::getLocale()] !!}
                </h4>
            </div>


            <div class=" py-5 text-center">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    {{-- <p class="section-title text-secondary justify-content-center">{{ $design->name[App::getLocale()] }}</p> --}}

                    @foreach ($design->images as $image)
                        <img class="col-12 rounded" src="{{ asset('uploads/' . @$image->name) }}">
                    @endforeach
                    <a href="{{ route('contact.index') }}"
                        class="btn btn_color text-black mt-5 text-dark ">{{ __('Send us a message') }}</a>
                </div>
            </div>
        </div>
    </section><!-- **Primary Ends Here** -->







    <!-- Service Start -->

    <!-- Service End -->
@endsection
