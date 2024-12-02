@extends('frontend.layout.master')
@section('title')
    {{ __('services') }}
@endsection
@section('content')
    <div class="breadcrumb"></div>
    <section id="primary" class="content-full-width" style="min-height: 50vh "> <!-- **Primary Starts Here** -->
        <div class="container">

            <div class="main-title " data-animation="pullDown" data-delay="1">
                <h3> {{ __('Services') }} </h3>
            </div>
            <div class="blog-items apply-isotope clear">
                @foreach ($services as $service)
                    <div class="dt-sc-one-fourth column ">
                        <article class="blog-entry rounded">
                            <div class="entry-thumb">
                                <a href="#"><img src="{{ asset('uploads') . '/' . $service->image }}" alt=""
                                        title=""></a>
                            </div>
                            <div class="entry-details">
                                <div class="entry-title">
                                    <h4> <a href="blog-detail.html">{{ $service->name[App::getLocale()] }}</a> </h4>
                                </div>
                                <div class="entry-body">
                                    <p>{{ $service->description[App::getLocale()] }} </p>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
