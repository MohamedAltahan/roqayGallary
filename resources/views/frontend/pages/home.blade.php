@extends('frontend.layout.master')

@section('content')
    <div class="dt-sc-hr-invisible-small"></div>
    <div class="fullwidth-section">
        <!-- **Full-width-section Starts Here** -->
        <div class="container">
            <div class="main-title animate" data-animation="pullDown" data-delay="100">
                <h2 class="aligncenter">{!! @$homePageHeader['sub_title'][App::getLocale()] !!}</h2>
                <p style="font-size: 22px">
                    {!! @$homePageHeader['sub_description'][App::getLocale()] !!}
                </p>
            </div>
        </div>
    </div>
    <!-- **Full-width-section Ends Here** -->
    <div class="clear"></div>

    <div class="fullwidth-section">
        @foreach ($categories as $category)
            <div class="blog-section">
                <article class="blog-entry @if ($loop->index % 2 == 0) type2 @endif">
                    <div class="entry-details">
                        <div class="entry-title">
                            <h3>{{ $category['name'][App::getLocale()] }}</h3>
                        </div>
                        <div class="entry-body">
                            <p style="font-size: 22px">
                                {{ @$category->design['description'][App::getLocale()] }}
                            </p>
                        </div>
                        <a class="type1 dt-sc-button small" href="gallery-detail-with-lhs.html">{{ __('View Gallery') }}<i
                                class="fa fa-angle-right"></i></a>
                    </div>
                    <div class="entry-thumb">
                        <ul class="blog-slider">
                            {{-- @dd($category->design->images) --}}
                            @foreach ($category->design->images as $image)
                                <li>
                                    <img src="{{ asset('uploads/' . $image->name) }}" alt="" title="" />
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
