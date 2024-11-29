  <style>
      .main-banner {
          position: relative;
          height: 100vh;
          background: url('your-banner-image.jpg') no-repeat center center/cover;
      }

      .banner-content {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          text-align: center;
          color: white;
      }

      .typing {
          display: inline-block;
          white-space: nowrap;
          overflow: hidden;
          border-right: 3px solid white;
          animation: typing 2s steps(30, end), blink 0.75s step-end infinite;
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
              border-color: white;
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
  </style>


  <div class="slider-container">
      <div class="slider fullwidth-section parallax"
          style=" background-image:
         url({{ asset('uploads/' . @$homePageHeader['main_image']) }});">


          <div class="main-banner">
              <div class="banner-content">
                  <h1 class="display-4 fw-bold">

                      <span class="typing">{{ $homePageHeader['main_title'][App::getLocale()] }}</span>
                  </h1>
                  <p class="lead description">{{ $homePageHeader['main_description'][App::getLocale()] }}</p>
              </div>
          </div>


      </div>
  </div>
