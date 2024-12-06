@extends('frontend.layout.master')

@section('content')
    <div class="dt-sc-hr-invisible-small"></div>
    <div class="fullwidth-section">
        <!-- **Full-width-section Starts Here** -->
        <div class="container">
            <div class="main-title animate" data-animation="pullDown" data-delay="100">
                <h3 class="aligncenter">{!! @$homePageHeader['sub_title'][App::getLocale()] !!}</h3>
                <p style="">
                    {!! @$homePageHeader['sub_description'][App::getLocale()] !!}
                </p>
            </div>
        </div>
    </div>
    <!-- **Full-width-section Ends Here** -->
    <div class="clear"></div>

    <div class="fullwidth-section">
        @foreach ($designs as $design)
            <div class="blog-section">
                <article class="blog-entry @if ($loop->index % 2 == 0) type2 @endif">
                    <div class="entry-details">
                        <div class="">
                            <h1 style="text-shadow: 1px 1px 2px #000">{{ @$design['name'][App::getLocale()] }}</h1>
                        </div>
                        <div class="entry-body">
                            <p>
                                {{ @$design['description'][App::getLocale()] }}
                            </p>
                        </div>
                        <a class="type1 dt-sc-button small btn_color"
                            href="{{ route('design-details.index', $design->id) }}">{{ __('View Gallery') }}<i
                                class="fa fa-angle-right"></i></a>
                    </div>
                    <div class="entry-thumb ">
                        <ul class="blog-slider">
                            @foreach ($design->images as $image)
                                <li>
                                    <img class=" rounded" src="{{ asset('uploads/' . $image->name) }}" alt=""
                                        title="" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
    <!-- **Full-width-section Ends Here** -->
    <div class="clear"></div>

    <div class="dt-sc-hr-invisible-small"></div>

    <div class="clear"></div>
@endsection
@push('styles')
    <style>
        @media screen and (max-width: 400px) {
            .bx-wrapper ul li {
                height: 350px !important;
                /* Height for mobile screens */
            }
        }
    </style>
@endpush
