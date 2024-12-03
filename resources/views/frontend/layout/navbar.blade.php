 <style>
     .navbar {
         padding: 1rem 1rem;
         background: transparent !important;
         /* Adjust padding for aesthetic spacing */
     }

     .navbar-brand {
         font-size: 1.5rem;
         /* Adjust font size for logo and site name */
         font-weight: bold;
     }

     .navbar-nav .nav-link {
         text-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3);
         background: transparent !important;
         font-size: 1.6rem;
         /* Suitable font size for menu items */
         padding: 0.5rem 1rem;
         color: #311803;
         /* Adjust padding for better spacing */
     }

     .navbar-toggler {
         background: transparent !important;
         color: white;
         border: none;
         /* Remove border from the toggler button */
     }

     .navbar-collapse {
         background: transparent !important;
         justify-content: flex-end;
         /* Align menu items to the right */
     }

     .navbar-light .navbar-toggler-icon {

         width: 1.5rem;
         height: 1.5rem;
         background-size: cover;
         background-image: url('data:image/svg+xml,%3Csvg xmlns%3D%22http://www.w3.org/2000/svg%22 viewBox%3D%220 0 30 30%22 fill%3D%22%23ffffff%22%3E%3Cpath stroke%3D%22rgba(255%2C 255%2C 255%2C 1)%22 stroke-linecap%3D%22round%22 stroke-miterlimit%3D%2210%22 stroke-width%3D%222%22 d%3D%22M4 7h22M4 15h22M4 23h22%22/%3E%3C/svg%3E');
         text-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3);
     }

     .dropdown-menu {
         background: transparent !important;
         border: none;
     }
 </style>

 <nav class="navbar navbar-expand-lg navbar-light">
     <div class="container menu-container " style="border-bottom: 1px solid rgba(255, 255, 255, 0.2);">

         <!-- Logo and Site Name -->
         <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
             <img alt="Logo" width="50" class="m-2" src="{{ asset('uploads/' . $logo->main_logo) }}" />
             <h1 class=" m-2">
                 {{ $setting->site_name }}</h1>
         </a>

         <!-- Toggler for mobile -->
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
             aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <!-- Menu items -->
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav">

                 <li class="nav-item">
                     @if (App::getLocale() == 'en')
                         <a class="nav-link" href="{{ route('set-locale', 'ar') }}">{{ __('العربية') }}</a>
                     @elseif (App::getLocale() == 'ar')
                         <a class="nav-link" href="{{ route('set-locale', 'en') }}">{{ __('English') }}</a>
                     @endif
                 </li>

                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('about') }}">{{ __('About') }}</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('services') }}">{{ __('Services') }}</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('contact.index') }}">{{ __('Contact') }}</a>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
