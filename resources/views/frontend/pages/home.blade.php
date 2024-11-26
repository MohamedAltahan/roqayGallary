@extends('frontend.layout.master')

@section('content')
    <div class="dt-sc-hr-invisible-small"></div>
    @dd($categories)
    <div class="fullwidth-section">
        <!-- **Full-width-section Starts Here** -->
        <div class="container">
            <div class="main-title animate" data-animation="pullDown" data-delay="100">
                <h2 class="aligncenter">Portfolio</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do
                </p>
            </div>
        </div>
    </div>
    <!-- **Full-width-section Ends Here** -->
    <div class="clear"></div>

    <div class="fullwidth-section">
        <div class="blog-section">
            <article class="blog-entry type2">
                <div class="entry-details">
                    <div class="entry-title">
                        <h3><a href="blog-detail.html">Encaustic</a></h3>
                    </div>
                    <div class="entry-body">
                        <p style="font-size: 22px">
                            Encaustic painting technique in which pigments
                            are mixed with hot, liquid wax. After all of the colours
                            have been applied to the painting surface, a heating
                            element is passed over them until the individual brush
                            or spatula marks fuse into a uniform film.
                        </p>
                    </div>
                    <a class="type1 dt-sc-button small" href="gallery-detail-with-lhs.html">View
                        Gallery<i class="fa fa-angle-right"></i></a>
                </div>
                <div class="entry-thumb">
                    <ul class="blog-slider">
                        <li>
                            <img src="http://via.placeholder.com/955x470&text=Blog+Slider5" alt="" title="" />
                        </li>
                    </ul>
                </div>
            </article>
        </div>
    </div>
    <!-- **Full-width-section Ends Here** -->
    <div class="clear"></div>

    <div class="dt-sc-hr-invisible-small"></div>

    <div class="clear"></div>
@endsection
