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
      }

      .banner-content h1 {
          font-size: 4vw;
          /* Responsive font size relative to viewport width */
          line-height: 1.2;
          margin: 0;
          word-wrap: break-word;
      }

      .banner-content h2 {
          font-size: 2.5vw;
          /* Adjust for smaller size */
          line-height: 1.5;
          margin-top: 1rem;
      }

      @media (max-width: 1024px) {
          .banner-content h1 {
              font-size: 6vw;
              /* Slightly smaller for tablets */
          }

          .banner-content h2 {
              font-size: 3.5vw;
          }
      }

      @media (max-width: 768px) {
          .banner-content h1 {
              font-size: 5vw;
              /* Even smaller for smaller screens */
          }

          .banner-content h2 {
              font-size: 3vw;
          }
      }

      @media (max-width: 480px) {
          .banner-content h1 {
              font-size: 4vw;
              /* Adjust for mobile devices */
          }

          .banner-content h2 {
              font-size: 2.5vw;
          }
      }
  </style>


  <div class="slider-container ">
      <div class="slider fullwidth-section parallax"
          style=" background-image:
         url({{ asset('uploads/' . @$homePageHeader['main_image']) }});">
          <div class="main-banner mb">
              <div class="banner-content mb-5">
                  <h1 class="display-2 fw-bold">
                      <span class="typing">{{ $homePageHeader['main_title'][App::getLocale()] }}</span>
                  </h1>
                  <h2 class=" description" style="">
                      {{ $homePageHeader['main_description'][App::getLocale()] }}</h2>
              </div>
          </div>

      </div>
  </div>
