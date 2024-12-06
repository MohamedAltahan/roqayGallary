@extends('frontend.layout.master')
@section('title')
    {{ $design->name[App::getLocale()] }}
@endsection
@section('content')
    <div class="breadcrumb"></div>
    <section id="primary" class="content-full-width" style="min-height: 50vh "> <!-- **Primary Starts Here** -->
        <div class="container">

            <div class="main-title " data-animation="pullDown" data-delay="1">
                <h3 style="text-transform: capitalize;"> {{ @$design->name[App::getLocale()] }} </h3>
            </div>

            <div class="dt-sc-service-content">
                <p>
                    {!! @$design->long_description[App::getLocale()] !!}
                </p>
            </div>

            <div class=" py-5 text-center">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    {{-- <p class="section-title text-secondary justify-content-center">{{ $design->name[App::getLocale()] }}</p> --}}
                    @foreach ($design->images as $image)
                        <img class="col-12 rounded" src="{{ asset('uploads/' . @$image->name) }}">
                    @endforeach
                    <a href="{{ route('contact.index') }}"
                        class="type1 dt-sc-button small btn_color">{{ __('Send us a message') }}</a>
                </div>
            </div>
        </div>
    </section><!-- **Primary Ends Here** -->
@endsection
