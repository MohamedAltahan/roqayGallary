<footer id="footer" class="animate" data-animation="fadeIn" data-delay="100">
    <div class="container">
        <div class="copyright">
            <ul class="footer-links">
                <li><a href="#">{{ __('Contact us') }}</a></li>
                <li><a href="#">{{ __('About us') }}</a></li>
            </ul>
            <div>
                <div class="container-fluid main_header text-light rounded-top">
                    <div class="container  ">
                        <div class="row py-3">
                            <div class="col-md-12  d-flex justify-content-center">
                                <div class="d-flex py-2">
                                    @foreach ($socials as $social)
                                        <a target="_blank" class="btn btn-outline-light btn-social mx-1"
                                            href="{{ $social->link }}"><i class="{{ $social->icon }}"></i></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p>© 2025 <a href="#">Roqay Gallary</a>. All rights reserved.</p>
        </div>
    </div>
</footer>
