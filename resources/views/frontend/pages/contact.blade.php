@extends('frontend.layout.master')
@section('title')
    {{ __('Contact') }}
@endsection
@section('content')
    <style>
        /* CSS Animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 2s ease-in-out;
        }

        /* Slide-in from left */
        @keyframes slideIn {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .slide-in {
            animation: slideIn .5s ease-out;
        }
    </style>
    <div class="breadcrumb"><!-- *BreadCrumb Starts here** -->

    </div><!-- *BreadCrumb Ends here** -->
    <section id="primary" class="content-full-width"><!-- **Primary Starts Here** -->
        <div class="fullwidth-section"><!-- Full-width section Starts Here -->
            <div class="container">
                <div class="main-title " data-delay="100">
                    <h3> {{ __('Contact us') }} </h3>
                </div>
            </div>

            <div class="dt-sc-hr-invisible-toosmall"></div>

            <div class="container">
                <div class=" first slide-in">
                    <h3>{{ __('Get in Touch') }}</h3>
                    <form class="enquiry-form" action="{{ route('contact.store') }}" method="post" id="contactForm">
                        @csrf
                        <div class="column dt-sc-one-third first">
                            <p class="input-text">
                                <x-form.input name="name" label="Name" class="form-control" />
                            </p>
                        </div>

                        <div class="column dt-sc-one-third">
                            <p class="input-text">
                                <x-form.input type="email" name="email" label="Email" class="form-control" />
                            </p>
                        </div>

                        <div class="column dt-sc-one-third">
                            <p class="input-text">
                                <x-form.input name="phone" label="Phone" class="form-control" />
                            </p>
                        </div>
                        <div>

                            <p class="input-text">
                                <label for="message">{{ __('Message') }}</label>
                                <textarea class=" form-control" rows="3" cols="5" name="message" style="color: gray;"
                                    title="{{ __('Enter your Message') }}" placeholder="{{ __('Your message') }}"></textarea>
                                @error('message')
                                <div class="text-danger ">{{ $message }}</div>
                            @enderror
                            </p>
                        </div>

                        <div class="row">
                            <div class="mb-3 form-check col-md-6 ">
                                <input type="checkbox" class="form-check-input mx-1" id="agreeTerms">
                                <label class="form-check-label" for="agreeTerms">
                                    {{ __('Agree') }}
                                </label>
                            </div>

                            <div class="col-md-6">
                                <p class="submit">
                                    <input type="submit" value="{{ __('Send') }}" name="submit"
                                        class="type1 dt-sc-button small btn_color" />
                                </p>
                            </div>
                        </div>

                    </form>
                    <div id="ajax_contactform_msg"></div>
                </div>

            </div>
        </div><!-- Full-width section Ends Here -->
    </section><!-- **Primary Ends Here** -->
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            const checkbox = document.getElementById('agreeTerms');
            const errorMessage = document.getElementById('error-message');

            form.addEventListener('submit', function(e) {
                if (!checkbox.checked) {
                    e.preventDefault();
                    alert("{{ __('you must select agree to continue') }}");
                } else {

                }
            });
        });
    </script>
@endpush
