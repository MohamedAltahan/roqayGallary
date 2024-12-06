<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>{{ __('Get connected with us on social networks:') }}</span>
        </div>
        <!-- Left -->
        <!-- Right -->
        <div style="font-size: 22px">
            @foreach ($socials as $social)
                <a target="_blank" class="me-3 text-reset" href="{{ $social->link }}">
                    <i class="{{ $social->icon }}"></i></a>
            @endforeach
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4" style="color: #000000">
                        <i class="fas fa-gem me-3"></i>{{ @$setting->site_name }}
                    </h6>
                    <p>{{ @$setting->site_description[App::getLocale()] }}</p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4" style="color: #000000">
                        {{ __('Company') }}
                    </h6>
                    <p>
                        <a href="{{ route('contact.index') }}" class="text-reset">{{ __('Contact us') }}</a>
                    </p>
                    <p>
                        <a href="{{ route('about') }}" class="text-reset">{{ __('About us') }}</a>

                    </p>

                </div>
                <!-- Grid column -->


                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4" style="color: #000000">{{ __('Contact') }}</h6>
                    <p><i class="fas fa-home me-3"></i> {{ @$setting->contact_address[App::getLocale()] }}</p>
                    <p> <i class="fas fa-envelope me-3"></i> {{ @$setting->contact_email }} </p>
                    <p><i class="fas fa-phone me-3"></i>{{ @$setting->contact_phone }}</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        <p>© 2025 <a href="#" class="text-uppercase fw-bold mb-4"
                style="color: #000000">{{ $setting->site_name }}</a>. All rights reserved.</p>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
