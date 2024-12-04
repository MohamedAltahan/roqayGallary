<!DOCTYPE html>

<html lang="en-gb" class="no-js">
    <!--<![endif]-->

    <head>
        @php
            $setting = \App\Models\Setting::first();
            $categories = \App\Models\Category::where('status', 'active')->get();
            $socials = \App\Models\Social::where('status', 'active')->get();
            $logo = \App\Models\LogoSetting::first();
            $color = \App\Models\WebsiteColor::first() ?? new \App\Models\WebsiteColor();

        @endphp
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>@yield('title', $setting->site_name)</title>

        <meta name="description" content="" />
        <meta name="author" content="" />



        <link rel="shortcut icon" href="{{ asset('uploads/' . $logo->icon) }}" type="image/x-icon" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- **CSS - stylesheets** -->
        <link id="default-css" rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css"
            media="all" />

        <!-- **Additional - stylesheets** -->

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <link href="{{ asset('frontend/css/animations.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link id="shortcodes-css" href="{{ asset('frontend/css/shortcodes.css') }}" rel="stylesheet" type="text/css"
            media="all" />
        <link id="skin-css" href="{{ asset('frontend/skins/red/style.css') }}" rel="stylesheet" media="all" />
        <link href="{{ asset('frontend/css/isotope.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/css/pace.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('backend/assets/css/toastr.min.css') }}">

        <link id="light-dark-css" href="{{ asset('frontend/dark/dark.css') }}" rel="stylesheet" media="all" />

        <!-- **Font Awesome** -->
        <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css" />

        <!-- Modernizr -->
        <script src="{{ asset('frontend/js/modernizr.js') }}"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Rakkas&display=swap"
            rel="stylesheet">
        <style>
            body,
            html {
                margin: 0;
                padding: 0;
                background-image: url("{{ asset('frontend/images/background.jpg') }}") !important;
                background-size: cover;
                background-position: center;

                font-family: "Rakkas", sans-serif !important;
                font-weight: 400;
                font-style: normal;
                /* Changes the font color for all text */
            }

            /* .main_header {
                background-color: {{ $color->main_banner }} !important;
            }

            .navbar_color {
                background-color: {{ $color->navbar }} !important;
            }

            .big_container_color {
                background-color: {{ $color->secondary_background }} !important;
            }


            .text_color {
                color: {{ $color->text }} !important;
                }*/
            /*
            .text_coloryellow {
                color: "{{ $color->text }}" !important;
            } */

            .btn_color {
                background-color: {{ $color->btn }} !important;
                border-radius: 3px !important;
            }
        </style>


    </head>

    <body>
        <!-- **Wrapper** -->
        <div class="wrapper">
            <div class="inner-wrapper" style="position: relative">
                <div id="header-wrapper" class="" style="position: absolute; ">
                    <!-- **header-wrapper Starts** -->
                    @include('frontend.layout.navbar')
                </div>
                @if (Route::is('home'))
                    @include('frontend.layout.head')
                @endif
                <div id="main">
                    <section id="primary" class="content-full-width">

                        @yield('content')

                        {{-- @include('frontend.layout.about-me') --}}
                        @include('frontend.layout.footer')
                        <div class="dt-sc-hr-invisible-small"></div>

                    </section>
                    <!-- **Primary Ends Here** -->

                </div>
                <!-- Main Ends Here-->
            </div>
            <!-- **inner-wrapper - End** -->
        </div>
        <!-- **Wrapper Ends** -->

        <!-- **jQuery** -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="{{ asset('frontend/js/jquery-1.11.2.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('frontend/js/jquery.inview.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/js/jquery.viewport.js') }}" type="text/javascript"></script>

        <script type="text/javascript" src="{{ asset('frontend/js/jquery.isotope.min.js') }}"></script>

        <script src="{{ asset('frontend/js/jsplugins.js') }}" type="text/javascript"></script>

        <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}" type="text/javascript"></script>

        <script src="{{ asset('frontend/js/jquery.validate.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('frontend/js/jquery.tipTip.minified.js') }}" type="text/javascript"></script>

        <script type="text/javascript" src="{{ asset('frontend/js/jquery.bxslider.min.js') }}"></script>

        <script src="{{ asset('backend/assets/js/toastr.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/jquery.menu-2.js') }}"></script>

        <script src="{{ asset('frontend/js/custom.js') }}"></script>
        @stack('scripts')
    </body>

</html>
