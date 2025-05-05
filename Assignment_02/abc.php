<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadhav Hospital</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Internal CSS */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #007bff !important;
        }
        .navbar-brand img {
            display: none;
        }
        .navbar-brand {
            padding-left: 0;
        }
        .navbar-collapse {
            padding-left: 0;
        }

        .contact-info {
            background-color: #f9f9f9;
            border: 2px solid #007BFF;
            padding: 15px;
            margin-top: 20px;
        }

        /* Doctor's Information */
        .doctor-info {
            display: flex;
            padding: 20px;
            margin-top: 20px;
            background-color: #f2c4a6; /* Light pink background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            align-items: center;
            justify-content: center;
            flex-direction: column; /* Change to column for vertical centering */
        }

        .doctor-img-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            text-align: center;
            margin-bottom: 20px; /* Space between image and text */
        }

        .doctor-img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover; /* Ensure the image is centered and circular */
        }

        .doctor-details-container {
            width: 100%;
            text-align: center;
        }

        .doctor-details h3 {
            margin-top: 0;
        }

        .doctor-details p {
            margin: 20px 0;
        }

        /* Services Section */
        .services-title {
            text-align: center;
            margin: 20px 0;
            font-size: 24px;
            font-weight: bold;
        }

        .services-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
        }

        .service-card {
            width: calc(33.33% - 20px);
            background-color: blue;
            padding: 20px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .service-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        /* Info Boxes */
        .container {
            margin-top: 20px;
        }

        .big-info-box {
            text-align: center;
            border: 2px solid #007BFF;
            padding: 15px;
            margin-top: 20px;
            background-color: #f9f9f9;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            margin: 0 -15px;
        }

        .col-md-4 {
            flex: 0 0 33.33%;
            max-width: 33.33%;
            padding: 0 15px;
            box-sizing: border-box;
            margin-top: 15px;
        }

        .small-info-box {
            padding: 20px;
            background-color: #e0e0e0;
            border-radius: 5px;
            font-size: 18px;
        }

        .container {
            padding: 20px;
        }

        .carousel-item img {
            height: 300px;
            object-fit: cover;
        }

        .map-container {
            background-color: #f9f9f9;
            padding: 20px;
            border: 2px solid #007BFF;
            margin-top: 20px;
        }

        .map-container h2 {
            margin-top: 0;
        }

        .mobile-number {
            display: none;
        }

        /* Media Queries for Responsive Design */
        @media (max-width: 768px) {
            .doctor-info {
                flex-direction: column;
            }

            .doctor-img-container,
            .doctor-details-container {
                width: 100%;
            }

            .services-container {
                flex-direction: column;
                align-items: center;
            }

            .service-card {
                width: 80%;
            }

            .col-md-4 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .mobile-number {
                display: block;
            }

        }

        /* Fixed Position Buttons */
        .fixed-buttons {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
        }

        
        .footer {
            background-color: #000;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            width: 100%; /* Ensure footer spans the full width */
        }
        .carousel-item img {
            height: 600px; /* Adjust the height of the slider */
        }
        .info-box-row {
            text-align: center; /* Center align the title */
        }
        .carousel-control-prev:focus, .carousel-control-prev:hover,
        .carousel-control-next:focus, .carousel-control-next:hover {
            color: yellow !important;
        }
        .carousel-control-prev:not(:disabled):not(.disabled),
        .carousel-control-next:not(:disabled):not(.disabled) {
            opacity: 1 !important;
        }
        @media (min-width: 768px) {
            .booking-form .col-md-6 {
                /* Remove height property */
                display: flex;
                flex-direction: row; /* Change direction to row */
                justify-content: space-between;
            }
            .booking-form .col-md-6 img {
                height: auto; /* Make the height of the image dynamic */
                max-height: 100%; /* Ensure the image does not exceed the height of the container */
            }
            .booking-form .col-md-6 form {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
        }
        
        @media (max-width: 767px) {
            .booking-form .col-md-6 {
                margin-top: 10px; /* Add a margin between image and input on mobile */
            }
        }
        .footer .social-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px; /* Add margin if needed */
        }
        
        .footer .social-icons a {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            width: 40px; /* Adjust the size for better spacing */
            height: 40px; /* Adjust the size for better spacing */
            border-radius: 50%;
            overflow: hidden;
        }
        
        .footer .social-icons img {
            width: 40px; /* Set the desired size */
            height: 40px; /* Set the desired size */
            object-fit: cover;
            border-radius: 50%;
        }
        
        .footer {
            background-color: #000;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            width: 100%;
        }
        .fixed-buttons {
            position: fixed;
            bottom: 0;
            width: 100%;
            display: flex;
            z-index: 999;
        }
        

        .fixed-buttons .btn {
            flex: 1;
            border-radius: 0;
        }

        .btn-book {
            background-color: brown;
            color: white;
        }

        .btn-call {
            background-color: green;
            color: white;
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">Jadhav Hospital</a>
        <!-- Navbar toggler button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">123456788</a>
                </li>
                <!-- Navigation links -->
                <li class="nav-item">
                    <a class="nav-link" href="#Services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Location</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#booking-form">Book Now</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Bootstrap Carousel for Slider -->
    <!-- Bootstrap Carousel for Slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="a10.jpeg" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="a20.jpeg" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="a30.jpeg" class="d-block w-100" alt="Slide 3">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


    <!-- Doctor's Information Section -->
    <div class="doctor-info">
        <div class="doctor-img-container">
            <img src="a99.jpeg" alt="Doctor Photo" class="doctor-img">
        </div>
        <div class="doctor-details-container">
            <div class="doctor-details">
                <h3>Dr. John Doe, BHMS</h3>
                <p>Specialist in Homeopathy, Allergies, and Asthma. Graduated from ABC University.</p>
                <button onclick="toggleReadMore()">Read More</button>
                <div id="moreInfo" style="display: none;">
                    <p>Dr. John Doe has over 17 years        <p>Dr. John Doe has over 17 years of experience in the field of homeopathy. He has successfully treated numerous cases of allergies and asthma, helping patients improve their quality of life with natural remedies.</p>
                  </div>
              </div>
          </div>
      </div>
  
      <!-- Big Info Box Section -->
      <div class="container">
          <div class="big-info-box text-center border border-primary p-3 mt-4">
              <div class="row align-items-center justify-content-center">
                  <div class="col-md-4">
                      <div class="small-info-box">10000+ Happy Patients</div>
                  </div>
                  <div class="col-md-4">
                      <div class="small-info-box">17+ Years of Experience</div>
                  </div>
                  <div class="col-md-4">
                      <div class="small-info-box">98% Success Ratio</div>
                  </div>
              </div>
          </div>
      </div>
  
      <!-- Services Section -->
      <div class="services-title" id="Services">Our Services</div>
      <div class="services-container">
          <div class="service-card">
              <img src="service1.jpg" alt="Service 1">
              <h3>Service 1</h3>
              <p>Description of Service 1</p>
          </div>
          <div class="service-card">
              <img src="service2.jpg" alt="Service 2">
              <h3>Service 2</h3>
              <p>Description of Service 2</p>
          </div>
          <div class="service-card">
              <img src="service3.jpg" alt="Service 3">
              <h3>Service 3</h3>
              <p>Description of Service 3</p>
          </div>
      </div>
      
      <!-- Before and After Section -->
      <div class="container before-after">
          <h2 class="text-center">Before and After</h2>
          <div id="beforeAfterCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
              <div class="carousel-inner">
                  <div class="carousel-item active">
                      <img src="ab33.jpg" alt="Before and After Treatment" class="d-block mx-auto" style="height: 150px; width: 300px; border: 1px solid #000;">
                  </div>
                  <div class="carousel-item">
                      <img src="ab44.jpg" alt="Before and After Treatment" class="d-block mx-auto" style="height: 150px; width: 300px; border: 1px solid #000;">
                  </div>
                  <div class="carousel-item">
                      <img src="ab22.jpg" alt="Before and After Treatment" class="d-block mx-auto" style="height: 150px; width: 300px; border: 1px solid #000;">
                  </div>
                  <!-- Add more carousel items as needed -->
              </div>
              <a class="carousel-control-prev" href="#beforeAfterCarousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#beforeAfterCarousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div>
      </div>
  
      <!-- Booking Form Section -->
      <div class="container booking-form" id="booking-form">
          <h2 class="text-center">Book an Appointment</h2>
          <div class="row">
              <div class="col-md-6">
                  <form>
                      <div class="form-row">
                          <div class="form-group col-12">
                              <label for="name">Full Name</label>
                              <input type="text" class="form-control" id="name" placeholder="Enter your full name">
                          </div>
                          <div class="form-group col-12">
                              <label for="age">Age</label>
                              <input type="number" class="form-control" id="age" placeholder="Enter your age">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-12">
                              <label for="email">Email address</label>
                              <input type="email" class="form-control" id="email" placeholder="Enter your email">
                          </div>
                          <div class="form-group col-12">
                              <label for="phone">Phone Number</label>
                              <input type="text" class="form-control" id="phone" placeholder="Enter your phone number">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="message">Message</label>
                          <textarea class="form-control" id="message" rows="3" placeholder="Enter your message"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary btn-block">Submit</button>
                  </form>
              </div>
              <div class="col-md-6">
                  <img src="11.jpeg" class="img-fluid" alt="Booking Image" style="width: 100%; height: auto;">
              </div>
          </div>
      </div>
      <div class="fixed-buttons">
        <button class="btn btn-book" onclick="scrollToBookingForm()">Book Now</button>
        <a href="tel:123456789" class="btn btn-call">Call Now</a>
    </div>

  
      <!-- Contact Section -->
      <div class="map-container" id="contact">
          <h2 class="text-center">Contact Information</h2>
          <div class="row">
              <div class="col-md-6">
                  <p>Address: 123 Main Street, City, Country</p>
                  <p>Phone: +123 456 7890</p>
                  <p>Email: info@jadhavhospital.com</p>
              </div>
              <div class="col-md-6">
                  <!-- Google Maps Embed -->
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.41874860425!2d-0.24168195814455102!3d51.52877184146124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604eaf758e623%3A0x422a9b1bc39eb8c5!2sBuckingham%20Palace%2C%20London%2C%20UK!5e0!3m2!1sen!2suk!4v1618500188199!5m2!1sen!2suk" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
          </div>
      </div>
  
      <!-- Fixed position buttons -->
      
  
      <!-- Footer -->
      <footer class="footer">
        <div class="social-icons">
            <a href="#"><img src="i.jpg" alt="Instagram"></a>
            <a href="#"><img src="w.jpg" alt="WhatsApp"></a>
            <a href="#"><img src="t.png" alt="Twitter"></a>
            <a href="#"><img src="f.jpg" alt="Facebook"></a>
            <a href="#"><img src="e.jpg" alt="Email"></a>
        </div>
        <p>&copy; 2024 BHMS Hospital. All rights reserved.</p>
    </footer>
  
      <!-- JavaScript for Bootstrap and Read More Function -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script>
          function toggleReadMore() {
              let moreInfo = document.getElementById('moreInfo');
              if (moreInfo.style.display === 'none') {
                  moreInfo.style.display = 'block';
              } else {
                  moreInfo.style.display = 'none';
              }
          }
          function scrollToBookingForm() {
            document.getElementById('booking-form').scrollIntoView({ behavior: 'smooth' });
        }
      </script>
      
  </body>
  </html>
  
