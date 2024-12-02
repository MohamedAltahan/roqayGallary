@extends('frontend.layout.master')
@section('title')
    {{ __('About') }}
@endsection
@section('content')
    <div class="breadcrumb"><!-- *BreadCrumb Starts here** -->

    </div><!-- *BreadCrumb Ends here** -->
    <section id="primary" class="content-full-width" style="min-height: 50vh "> <!-- **Primary Starts Here** -->
        <div class="container">

            <div class="main-title " data-animation="pullDown" data-delay="1">
                <h3> {{ __('About us') }} </h3>
            </div>

            <div class="dt-sc-service-content">
                <h4>
                    {!! $about->content !!}
                </h4>
            </div>

        </div>
    </section><!-- **Primary Ends Here** -->
@endsection
