  <style>
      .banner-content {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          text-align: center;
          color: rgb(100, 73, 0);
          text-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3);

      }

      .typing {
          display: inline-block;
          white-space: nowrap;
          overflow: hidden;
          border-right: 3px solid rgb(5, 0, 0);
          animation: typing 2s steps(30, end), blink 0.75s step-end infinite;
          padding-top: 30px;
          padding-bottom: 10px
      }

      @keyframes typing {
          from {
              width: 0;
          }

          to {
              width: 100%;
          }
      }

      @keyframes blink {
          from {
              border-color: rgb(148, 67, 2);
          }

          to {
              border-color: transparent;
          }
      }

      .description {
          margin-top: 1rem;
          opacity: 0;
          animation: fadeIn 1s ease-in-out 2s forwards;
      }

      @keyframes fadeIn {
          to {
              opacity: 1;
          }
      }

      .slider {
          background-size: cover;
          /* Ensures the image covers the entire element */
          background-position: center;
          /* Centers the image */
          background-repeat: no-repeat;
          /* Prevents the image from repeating */
          width: 100%;
          /* Ensures it spans the full width */
          /* height: auto; */
          /* Adjust height proportionally */
          min-height: 400px;
          /* Optional: set a minimum height */
      }
  </style>


  <div class="slider-container">
      <div class="slider fullwidth-section parallax"
          style=" background-image:
         url({{ asset('uploads/' . @$homePageHeader['main_image']) }});">
          <div class="main-banner">
              <div class="banner-content">
                  <h1 class="display-2 fw-bold">
                      <span class="typing">{{ $homePageHeader['main_title'][App::getLocale()] }}</span>
                  </h1>
                  <h4 class="lead description" style="font-size: 30px">
                      {{ $homePageHeader['main_description'][App::getLocale()] }}</h4>
              </div>
          </div>


      </div>
  </div>
