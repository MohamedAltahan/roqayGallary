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


      /* General styling for all devices */
      .banner-content h2 {
          font-size: 2rem;
          /* Default size */
          line-height: 1.2;
          /* Adjust line height for readability */
      }

      .banner-content h4 {
          font-size: 1.5rem;
          /* Default size */
          line-height: 1.5;
          /* Adjust line height for readability */
      }

      /* Media queries for responsive design */

      /* Small screens (up to 768px wide) */
      @media (min-width: 768px) {
          .banner-content h2 {
              font-size: 4.2rem;
              /* Smaller font size for h2 on smaller screens */
              line-height: 1.3;
              /* Adjust line height */
          }

          .banner-content h4 {
              font-size: 2.5rem !important;
              /* Smaller font size for h4 on smaller screens */
              line-height: 1.3;
              /* Adjust line height */
          }
      }

      @media (max-width: 768px) {
          .banner-content h2 {
              font-size: 1.7rem;
              /* Smaller font size for h2 on smaller screens */
              line-height: 1.1;
              /* Adjust line height */
          }

          .banner-content h4 {
              font-size: 1.2rem;
              /* Smaller font size for h4 on smaller screens */
              line-height: 1.3;
              /* Adjust line height */
          }
      }

      /* Extra small screens (up to 480px wide) */
      @media (max-width: 480px) {
          .banner-content h2 {
              font-size: 1.5rem;
              /* Even smaller for extra small screens */
              line-height: 1.1;
              /* Keep readable spacing */
          }

          .banner-content h4 {
              font-size: 1rem;
              /* Reduce size for h4 */
              line-height: 1.2;
              /* Adjust line height */
          }
      }
  </style>


  <div class="slider-container">
      <div class="slider fullwidth-section parallax"
          style=" background-image:
         url({{ asset('uploads/' . @$homePageHeader['main_image']) }});">
          <div class="main-banner">
              <div class="banner-content mb-5">
                  <h2 class="display-2 fw-bold">
                      <span class="typing">{{ $homePageHeader['main_title'][App::getLocale()] }}</span>
                  </h2>
                  <h4 class="lead description" style="font-size: 30px">
                      {{ $homePageHeader['main_description'][App::getLocale()] }}</h4>
              </div>
          </div>

      </div>
  </div>
