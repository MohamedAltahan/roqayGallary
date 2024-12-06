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

      /* Fade-in Effect for h2 */
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

      /* Responsive Heading Styles Using rem */
      .slider-container h1 {
          font-size: 4.5rem !important;
          /* Base font size for h1 */
          font-weight: 700;
          /* Bold font */
          line-height: 1.2;
          /* Adjust line spacing */
          margin: 0;
          /* Remove extra margin */
      }

      .slider-container h2 {
          font-size: 2.5rem !important;
          /* Base font size for h2 */
          font-weight: 400;
          /* Regular weight */
          line-height: 1.4;
          /* Add readability */
          margin: 0.5rem 0 0;
          /* Add separation from h1 */
      }

      /* Media Queries for Smaller Screens */
      @media (max-width: 900px) {
          .slider-container h1 {
              font-size: 3.5rem !important;
              /* Smaller h1 size */
          }

          .slider-container h2 {
              font-size: 2.5rem !important;
              /* Smaller h2 size */
          }
      }

      /* Media Queries for Smaller Screens */
      @media (max-width: 768px) {
          .slider-container h1 {
              font-size: 2.7rem !important;
              /* Smaller h1 size */
          }

          .slider-container h2 {
              font-size: 1.9rem !important;
              /* Smaller h2 size */
          }
      }

      @media (max-width: 480px) {
          .slider-container h1 {
              font-size: 1.9rem !important;
              /* Even smaller h1 for very small screens */
          }

          .slider-container h2 {
              font-size: 1.6rem !important;
              /* Adjusted h2 size */
          }
      }

      [lang="en"] {
          .slider-container h1 {
              text-transform: capitalize;
              font-size: 3.7rem !important;
              /* Base font size for h1 */
              font-weight: 700;
              /* Bold font */
              line-height: 1.2;
              /* Adjust line spacing */
              margin: 0;
              /* Remove extra margin */
          }

          .slider-container h2 {
              text-transform: capitalize;
              font-size: 1.8rem !important;
              /* Base font size for h2 */
              font-weight: 400;
              /* Regular weight */
              line-height: 1.4;
              /* Add readability */
              margin: 0.5rem 0 0;
              /* Add separation from h1 */
          }

          /* Media Queries for Smaller Screens */
          @media (max-width: 900px) {
              .slider-container h1 {
                  font-size: 3.5rem !important;
                  /* Smaller h1 size */
              }

              .slider-container h2 {
                  font-size: 1.6rem !important;
                  /* Smaller h2 size */
              }
          }

          /* Media Queries for Smaller Screens */
          @media (max-width: 768px) {
              .slider-container h1 {
                  font-size: 2.4rem !important;
                  /* Smaller h1 size */
              }

              .slider-container h2 {
                  font-size: 1.5rem !important;
                  /* Smaller h2 size */
              }
          }

          @media (max-width: 480px) {
              .slider-container h1 {
                  font-size: 1.7rem !important;
                  /* Even smaller h1 for very small screens */
              }

              .slider-container h2 {
                  font-size: 1.3rem !important;
                  /* Adjusted h2 size */
              }
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
