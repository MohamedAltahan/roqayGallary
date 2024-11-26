{{-- <div class="container-xxl position-relative p-0">
    <nav class="navbar navbar_color sticky-top shadow-sm navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{ url('/') }}" class="navbar-brand p-0">
            <img class="mb-3" src="{{ asset('uploads/' . $logo->main_logo) }}" alt="Logo">
            <h1 class="m-0 text-warning" style="display: inline-block;font-family: 'Varela Round', sans-serif;">
                {{ $setting->site_name }}</h1>
        </a>
        <button class="navbar-toggler text_color" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="{{ route('about') }}" class="nav-item nav-link text_color {{ setActive(['about']) }}">About</a>
                <a href="{{ route('contact.index') }}"
                    class="nav-item nav-link text_color {{ setActive(['contact.*']) }}">Contact</a>
                @foreach ($categories as $category)
                    <a href="{{ route('category.show', ['id' => $category->id]) }}"
                        class="nav-item nav-link text_color @if (request()->is("category/$category->id")) active @endif ">
                        {{ $category->name }}</a>
                @endforeach
            </div>

        </div>
    </nav>
    @if (Route::is('home') && $homePageSetting->banner_at_home == 'active')
        @include('frontend.layout.head')
    @endif
</div> --}}


<section id="" class="" style="position: absolute;">
    <div class="container menu-container">
        <a class="logo" href="{{ url('/') }}"><img alt="Logo" width="80"
                src="{{ asset('uploads/' . $logo->main_logo) }}" />
            <h1 class=" text-warning" style="display: inline-block;">
                {{ $setting->site_name }}</h1>
        </a>
        <a href="javascript:;" class="total-overlay-trigger"></a>
    </div>

</section>
<div class="total-overlay-sticky">
    <nav id="navigation">
        <ul class="menu type2">
            <li class="logo">
                <a href="#"><img width="100" alt="Logo"
                        src="{{ asset('uploads/' . $logo->main_logo) }}" /></a>
            </li>

            <li class="menu-item-simple-parent">
                <a title="About" href="{{ route('about') }}">About Us</a>
            </li>

            <li class="menu-item-simple-parent">
                <a title="Contact" href="{{ route('contact.index') }}">Contact</a>
            </li>

        </ul>
    </nav>
    <a href="javascript:;" class="total-overlay-sticky-close"></a>
</div>
