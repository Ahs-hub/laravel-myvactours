<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoyageHub Mauritius</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Boxicons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- Google Font comic -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Google Fonts poppins,lato,Open_sans,Roboto-->
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Open+Sans&family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

     <!-- Swiper CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
     <!-- <link rel="stylesheet" href="{{ secure_asset('css/main.css') }}">
     <link rel="stylesheet" href="{{ secure_asset('css/home.css') }}"> -->

    @if (app()->environment('production'))
        <link rel="stylesheet" href="{{ secure_asset('css/main.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @endif

</head>
<body>
    <!-- Header Info -->
    <div class="header navbars-links">
        <div class="header-info">
            <div class="header-left">
                <div class="header-item">
                     <i class='bx bx-map'></i>
                     <span>Tour Operator in Mauritius</span>
                </div>
                <div class="header-item">
                    <i class='bx bx-phone'></i>
                    <span>
                        <a href="https://wa.me/23055040167" target="_blank" class="whatsapp-link" style="text-decoration:none; color:white;">
                            +230 55040167
                        </a>
                    </span>
                </div>
                <div class="header-item">
                    <i class='bx bx-time'></i>
                    <span>24/7</span>
                </div>
            </div>

            <div class="header-right" style="display:flex; gap:40px;">
                <div class="header-item">
                        <i class='bx bx-heart'></i> 
                        <a class="nav-link " href="{{ route('wishlist') }}">Wishlist</a>
                </div>
                <!-- <div class="header-item">
                        <i class='bx bx-book'></i>
                        <span>Tour Catalog 2025</span>
                </div> -->
            </div>
        </div>
     </div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="padding:0px; ">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <!-- <i class='bx bx-car'></i> -->
                <img src="{{ asset('images/logo/logo3.png') }}" alt="Logo">
            </a>
            <div class="header-item phone-appear" style="color:white;">
                <i class='bx bx-phone'></i>
                <span>
                     <a href="https://wa.me/23055040167" target="_blank" class="whatsapp-link" style="text-decoration:none; color:white;">
                        +230 55040167
                     </a>
                </span>
            </div>
            <!-- Toggler Button -->
            <button class="navbar-toggler no-border" style="color:white;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class='bx bx-menu icon-toggler'></i>
            </button>

            <div class="collapse navbar-collapse navbars-links" id="navbarNav" >
                <ul class="navbar-nav ms-auto" >
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}" style="font-size:17px;"><i class='bx bxs-home'></i> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('service') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cars.home') }}">Our Fleet</a>
                    </li>

                    <li class="nav-item dropdown " >
                        <a class="nav-link" href="{{ route('taxi') }}">Taxi</a>
                    </li>
                    
                    <!-- <li class="nav-item dropdown custom-hover-dropdown" >
                        <a class="nav-link" href="{{ route('taxi') }}">Taxi</a>
                        <div class="dropdown-box">
                                <a href="#" class="dropdown-item">Airport Transfer</a>
                                <a href="#" class="dropdown-item">Luxury Airport Transfer</a>
                        </div>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tours.index') }}">Tours</a>
                    </li>  

                    <li class="nav-item">
                        <a class="nav-link phone-appear" href="{{ route('wishlist') }}">Wishlist</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#event_planner">EN/EUR</a>
                    </li> -->   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact', ['type' => 'tour']) }}">Contact</a>
                    </li>      
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#langCurrencyModal">
                          <i class='bx bx-globe'></i> EN/EUR(€)
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#event_planner">Event Planner</a>
                    </li> --> 
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#contact">Language</a>
                    </li> -->
           
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                          <i class='bx bx-user'></i> Profile
                        </a>
                      </li> -->

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#contact">Profile</a>
                    </li> -->
                    <!-- <li class="nav-item" style="display: flex;  align-items: center;">
                       <button class="btn btn-outline-primary">Profile</button>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

     @yield('content')
   

    <!-- Profile Modal -->
  <div class="modal fade " id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content custom-modal ">
        <div class="modal-body">
          <h5 class="modal-title mb-4" id="profileModalLabel">Profile</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item profile-item">
              <i class='bx bx-log-in-circle'></i> Log In or Sign In
            </li>
            <li class="list-group-item profile-item">
              <i class='bx bx-support'></i> Support
            </li>
            <li class="list-group-item profile-item">
              <i class='bx bx-mobile'></i> Download our App
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

   <!-- Language & Currency Modal -->
    <div class="modal fade" id="langCurrencyModal" tabindex="-1" aria-labelledby="langCurrencyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content lang-modal">

                <!-- Modal Header with Tabs -->
                <div class="modal-header border-0">
                    <ul class="nav nav-tabs nav-fill w-100" id="langCurrencyTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="language-tab" data-bs-toggle="tab" data-bs-target="#language" type="button" role="tab">
                                <i class='bx bx-globe'></i> Language
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="currency-tab" data-bs-toggle="tab" data-bs-target="#currency" type="button" role="tab">
                                <i class='bx bx-dollar-circle'></i> Currency
                            </button>
                        </li>
                    </ul>
                    <button type="button" class="btn-close ms-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body with Tab Content -->
                <div class="modal-body tab-content">
                    <!-- Language Tab -->
                    <div class="tab-pane fade show active" id="language" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled lang-list">
                                    <li class="active">English (United States) <i class='bx bx-check'></i></li>
                                    <!-- <li>Russie</li>
                                    <li>English (Australia)</li>
                                    <li>Español (España)</li>
                                    <li>Français</li>
                                    <li>Chinese</li>
                                    <li>Germany</li> -->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Currency Tab -->
                    <div class="tab-pane fade" id="currency" role="tabpanel">
                        <div class="row gx-5">
                            <div class="col-md-4">
                                <ul class="list-unstyled currency-list">
                                    <li class="active">Euro <span>€</span> <i class='bx bx-check'></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.modal-body -->

            </div> <!-- ✅ closing .modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->


    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row g-4">
                    <!-- Company Info -->
                    <div class="col-lg-4 col-md-6">
                        
                        <a href="#" class="footer-logo">
                            <img style="width:250px; " src="{{ asset('images/logo/logo3.png') }}" alt="Logo">
                            <!-- <i class='bx bx-car'></i>
                            VoyageHub -->
                        </a>
                        <!-- <p class="mb-4" style="color: var(--light-color); line-height: 1.6;">
                            Your trusted partner for exploring the beautiful island of Mauritius. We provide premium car rentals, professional drivers, and unforgettable tours to make your vacation extraordinary.
                        </p> -->
                       
                        <div class="social-links">
                            <a href="#" class="social-link" title="Facebook">
                                <i class='bx bxl-facebook'></i>
                            </a>
                            <a href="#" class="social-link" title="Instagram">
                                <i class='bx bxl-instagram'></i>
                            </a>
                            <a href="#" class="social-link" title="WhatsApp">
                                <i class='bx bxl-whatsapp'></i>
                            </a>
                            <a href="#" class="social-link" title="TripAdvisor">
                                <i class='bx bx-map'></i>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-section">
                            <h5>Quick Links</h5>
                            <ul class="footer-links">
                                <li><a href="{{ route('home') }}"><i class='bx bx-chevron-right'></i>Home</a></li>
                                <li><a href="{{ route('service') }}"><i class='bx bx-chevron-right'></i>Services</a></li>
                                <li><a href="{{ route('cars.home') }}"><i class='bx bx-chevron-right'></i>Our Fleet</a></li>
                                <li><a href="{{ route('taxi') }}"><i class='bx bx-chevron-right'></i>Taxi</a></li>
                                <li><a href="{{ route('tours.index') }}"><i class='bx bx-chevron-right'></i>Tours</a></li>
                                <li><a href="{{ route('contact', ['type' => 'tour']) }}"><i class='bx bx-chevron-right'></i>Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Services -->
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-section">
                            <h5>Services</h5>
                            <ul class="footer-links">
                                <li><a href="{{ route('cars.home') }}"><i class='bx bx-car'></i>Car Rental</a></li>
                                <li><a href="{{ route('taxi') }}"><i class='bx bx-car'></i>Taxi Transfer</a></li>
                                <li><a href="{{ route('customizeTour') }}"><i class='bx bx-calendar'></i>Custom Packages</a></li>
                                <li><a href=""><i class='bx bx-support'></i>24/7 Support</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contact & Newsletter -->
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-section">
                            <h5>Contact Info</h5>
                            <div class="contact-info">
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class='bx bx-phone'></i>
                                    </div>
                                    <div class="contact-text">
                                        <strong>Phone</strong>
                                        <span>
                                            <a href="https://wa.me/23055040167" target="_blank" class="whatsapp-link" style="text-decoration:none; color:white;">
                                                    +230 55040167
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class='bx bx-envelope'></i>
                                    </div>
                                    <div class="contact-text">
                                        <strong>Email</strong>
                                        <span>info@voyagehub.mu</span>
                                    </div>
                                </div>
                                
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class='bx bx-map'></i>
                                    </div>
                                    <div class="contact-text">
                                        <strong>Location</strong>
                                        <span>Mauritius Island</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Newsletter -->
                            <!-- <div class="newsletter-form">
                                <h6><i class='bx bx-envelope'></i> Stay Updated</h6>
                                <p>Get the latest deals and travel tips delivered to your inbox.</p>
                                <div class="newsletter-input">
                                    <input type="email" placeholder="Enter your email" required>
                                    <button type="submit" class="newsletter-btn">
                                        <i class='bx bx-send'></i>
                                    </button>
                                </div>
                                <small style="color: var(--light-color); opacity: 0.8;">
                                    We respect your privacy. Unsubscribe anytime.
                                </small>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content">
                    <div class="copyright">
                        <p>&copy; 2025 GoMauris Travel & Tours Mauritius. All rights reserved. | Designed with <i class='bx bx-heart' style="color: var(--accent-color);"></i> for travelers</p>
                    </div>
                    <div class="footer-bottom-links">
                        <a href="{{ route('privacypolicy', ['type' => 'tour']) }}">Privacy Policy</a>
                        <!-- <a href="#">Cookie</a> -->
                        <a href="{{ route('refundpolicy') }}">Refund</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  
    <!-- Bootstrap link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    @if (app()->environment('production'))
        <script src="{{ secure_asset('js/style.js') }}"></script>
    @else
        <script src="{{ asset('js/style.js') }}"></script>
    @endif

</body>
</html>