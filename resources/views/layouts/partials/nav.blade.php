   <!--- HEADER-->

   <header>
       <div class="header-top">

           <div class="container">

               <ul class="header-social-container">

                   <li>
                       <a href="https://www.facebook.com/theitsolutionbd" class="social-link" target="_blank">
                           <ion-icon name="logo-facebook"></ion-icon>
                       </a>
                   </li>

                   <li>
                       <a href="#" class="social-link">
                           <ion-icon name="logo-twitter"></ion-icon>
                       </a>
                   </li>

                   <li>
                       <a href="#" class="social-link">
                           <ion-icon name="logo-instagram"></ion-icon>
                       </a>
                   </li>

                   <li>
                       <a href="#" class="social-link">
                           <ion-icon name="logo-linkedin"></ion-icon>
                       </a>
                   </li>

               </ul>

               <div class="header-alert-news">
                   <p>
                       <b>Free Shipping</b>
                       This Week Order Over - 5,000.00৳
                   </p>
               </div>

               <div class="header-top-actions">

                   <select name="currency">

                       {{-- <option value="usd">USD &dollar;</option> --}}
                       <option value="eur">Taka ৳</option>

                   </select>

                   <select name="language">

                       <option value="en-US">English</option>
                       {{-- <option value="es-ES">Bangla</option> --}}

                   </select>

               </div>

           </div>
           <div class="header-main">

               <div class="container">

                   <a class='header-logo' href='/'>
                       <img src="{{ asset('images/logo/it-logo2.jpg') }}" alt="It Solution logo" style="width: 200px; height:90px;" >
                   </a>

                   <div class="header-search-container">

                       <input type="search" name="search" class="search-field"
                           placeholder="Enter your product name...">

                       <button class="search-btn">
                           <ion-icon name="search-outline"></ion-icon>
                       </button>

                   </div>

                   <div class="header-user-actions">

                       <button class="action-btn">
                           <ion-icon name="person-outline"></ion-icon>
                       </button>

                       <button class="action-btn">
                           <ion-icon name="heart-outline"></ion-icon>
                           <span class="count">0</span>
                       </button>
                      <a href="/cart">
                       <button class="action-btn">
                           <ion-icon name="bag-handle-outline"></ion-icon>
                           <span class="count">0</span>
                       </button>
                      </a>
                   </div>

               </div>

           </div>

          <nav class="desktop-navigation-menu">

            <div class="container">
      
              <ul class="desktop-menu-category-list">
      
                <li class="menu-category">
                  <a href="{{"/"}}" class="menu-title">Home</a>
                </li>
      
                <li class="menu-category">
                  <a href="#" class="menu-title">Categories</a>
      
                  <div class="dropdown-panel">
      
                    <ul class="dropdown-panel-list">
      
                      <li class="menu-title">
                        <a href="#">APPLE</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">MACBOOK</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">iPad</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Apple Watch</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">AirPods Pro</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Apple Vision Pro</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">
                          <img src="{{ asset('images/apple.jpg') }}" alt="headphone collection" width="250"
                            height="119">
                        </a>
                      </li>
      
                    </ul>
      
                    <ul class="dropdown-panel-list">
      
                      <li class="menu-title">
                        <a href="#">HAVIT</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#"> USB CABLE</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Gaming MOUSE</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">KEYBOARD</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#"> Microphone</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Gamepad</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">
                          <img src="{{ asset('images/havit.jpg') }}" alt="men's fashion" width="250" height="119">
                        </a>
                      </li>
      
                    </ul>
      
                    <ul class="dropdown-panel-list">
      
                      <li class="menu-title">
                        <a href="#">Gedget</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Computer</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Laptop</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Gamepad</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Earbuds</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Watch</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">
                          <img src="{{asset('images/gedget.jpg')}}" alt="women's fashion" width="250" height="119">
                        </a>
                      </li>
      
                    </ul>
      
                    <ul class="dropdown-panel-list">
      
                      <li class="menu-title">
                        <a href="#">Electronics</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Smart Watch</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">𝗪𝗶𝗿𝗲𝗹𝗲𝘀𝘀 𝗦𝗽𝗲𝗮𝗸𝗲𝗿</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Keyboard</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Mouse</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Microphone</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">
                          <img src="{{ asset('images/electronics-banner-2.jpg') }}" alt="mouse collection" width="250" height="119">
                        </a>
                      </li>
      
                    </ul>
      
                  </div>
                </li>
      
                <li class="menu-category">
                  <a href="#" class="menu-title">MACBOOK</a>
      
                  <ul class="dropdown-list">
      
                    <li class="dropdown-item">
                      <a href="#">Macbook Air M1</a>
                    </li>
      
                    <li class="dropdown-item">
                      <a href="#">Macbook Air M2</a>
                    </li>
      
                    <li class="dropdown-item">
                      <a href="#">Macbook Air M3</a>
                    </li>
      
                    <li class="dropdown-item">
                      <a href="#">Macbook Air M4</a>
                    </li>
      
                  </ul>
                </li>
      
                <li class="menu-category">
                  <a href="#" class="menu-title">Headphone</a>
      
                  <ul class="dropdown-list">
      
                    <li class="dropdown-item">
                      <a href="#">Wear</a>
                    </li>
      
                    <li class="dropdown-item">
                      <a href="#">Wearless</a>
                    </li>
      
                    <li class="dropdown-item">
                      <a href="#">EarBuds</a>
                    </li>
      
                    <li class="dropdown-item">
                      <a href="#">Earphone</a>
                    </li>
      
                  </ul>
                </li>
      
                <li class="menu-category">
                  <a href="#" class="menu-title">Gedget</a>
      
                  <ul class="dropdown-list">
      
                    <li class="dropdown-item">
                      <a href="#">Gamepad</a>
                    </li>
      
                    <li class="dropdown-item">
                      <a href="#">Watch</a>
                    </li>
      
                    <li class="dropdown-item">
                      <a href="#">Speakers</a>
                    </li>
      
                    <li class="dropdown-item">
                      <a href="#">Charger</a>
                    </li>
      
                  </ul>
                </li>
      
                <li class="menu-category">
                  <a href="#" class="menu-title">Computer</a>
      
                  <ul class="dropdown-list">
      
                    <li class="dropdown-item">
                      <a href="#">Keyboard</a>
                    </li>
      
                    <li class="dropdown-item">
                      <a href="#">Mouse</a>
                    </li>
      
                    <li class="dropdown-item">
                      <a href="#">Monitor</a>
                    </li>
      
                    <li class="dropdown-item">
                      <a href="#">SSD</a>
                    </li>
      
                  </ul>
                </li>
      
                <li class="menu-category">
                  <a href="#" class="menu-title">Blog</a>
                </li>
      
                <li class="menu-category">
                  <a href="#HotOffers" class="menu-title" >Hot Offers</a>
                </li>

                @if(Cookie::get('token') !== null)
                    <li><a href="{{url("/profile")}}"> <i class="linearicons-user"></i> Account</a></li>
                    <li><a class="btn btn-danger btn-sm" href="{{url("/logout")}}"> Logout</a></li>
                @else
                    <li><a class="btn btn-danger btn-sm" href="{{url("/login")}}">Login</a></li>
                @endif
      
              </ul>
      
            </div>
      
          </nav>
          <style>
            body {
              font-family: "Lato", sans-serif;
            }
            
            .sidenav {
              height: 100%;
              width: 0;
              position: fixed;
              z-index: 1;
              top: 0;
              left: 0;
              background-color: #fcfcfc;
              overflow-x: hidden;
              transition: 0.5s;
              padding-top: 60px;
            }
            
            .sidenav a {
              padding: 2px 8px 2px 32px;
              text-decoration: none;
              font-size: 25px;
              color: #0e0d0d;
              display: block;
              transition: 0.3s;
            }
            
            .sidenav a:hover {
              color: #b7f0b0;
            }
            
            .sidenav .closebtn {
              position: absolute;
              top: 0;
              right: 25px;
              font-size: 36px;
              margin-left: 50px;
            }
            
            @media screen and (max-height: 450px) {
              .sidenav {padding-top: 15px;}
              .sidenav a {font-size: 18px;}
            }
            </style>
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
            @if(Cookie::get('token') !== null)
                    <a href="{{url("/profile")}}"> <i class="linearicons-user"></i> Account</a>
                    <a class="btn btn-danger btn-sm" href="{{url("/logout")}}"> Logout</a>
                @else
                    <a class="btn btn-danger btn-sm" href="{{url("/login")}}">Login</a>
                @endif
          </div>

           <div class="mobile-bottom-navigation">

               <button class="action-btn" onclick="openNav()">
                   <ion-icon name="menu-outline"></ion-icon>
               </button>
               <a href="{{ url('/cart') }}">
               <button class="action-btn">
                   <ion-icon name="bag-handle-outline"></ion-icon>

                   <span class="count">10</span>
               </button>
              </a>
               <a href='/'>
                   <button class="action-btn">
                       <ion-icon name="home-outline">
                       </ion-icon>
                   </button>
               </a>

               <button class="action-btn">
                   <ion-icon name="heart-outline"></ion-icon>

                   <span class="count">0</span>
               </button>

               <button class="action-btn" data-mobile-menu-open-btn>
                   <ion-icon name="grid-outline"></ion-icon>
               </button>

           </div>

           

   </header>

  <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "330px";
      }
      
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }
  </script>


{{-- <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

               <div class="menu-top">
                   <h2 class="menu-title">Menu</h2>

                   <button class="menu-close-btn" data-mobile-menu-close-btn>
                       <ion-icon name="close-outline"></ion-icon>
                   </button>
               </div>

               <ul class="mobile-menu-category-list">

                   <li class="menu-category">
                       <a class='menu-title' href='/'>Home</a>
                   </li>

                   <li class="menu-category">

                       <button class="accordion-menu" data-accordion-btn>
                           <p class="menu-title">Men's</p>

                           <div>
                               <ion-icon name="add-outline" class="add-icon"></ion-icon>
                               <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                           </div>
                       </button>

                       <ul class="submenu-category-list" data-accordion>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Shirt</a>
                           </li>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Shorts & Jeans</a>
                           </li>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Safety Shoes</a>
                           </li>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Wallet</a>
                           </li>

                       </ul>

                   </li>

                   <li class="menu-category">

                       <button class="accordion-menu" data-accordion-btn>
                           <p class="menu-title">Women's</p>

                           <div>
                               <ion-icon name="add-outline" class="add-icon"></ion-icon>
                               <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                           </div>
                       </button>

                       <ul class="submenu-category-list" data-accordion>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Dress & Frock</a>
                           </li>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Earrings</a>
                           </li>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Necklace</a>
                           </li>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Makeup Kit</a>
                           </li>

                       </ul>

                   </li>

                   <li class="menu-category">

                       <button class="accordion-menu" data-accordion-btn>
                           <p class="menu-title">Jewelry</p>

                           <div>
                               <ion-icon name="add-outline" class="add-icon"></ion-icon>
                               <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                           </div>
                       </button>

                       <ul class="submenu-category-list" data-accordion>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Earrings</a>
                           </li>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Couple Rings</a>
                           </li>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Necklace</a>
                           </li>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Bracelets</a>
                           </li>

                       </ul>

                   </li>

                   <li class="menu-category">

                       <button class="accordion-menu" data-accordion-btn>
                           <p class="menu-title">Perfume</p>

                           <div>
                               <ion-icon name="add-outline" class="add-icon"></ion-icon>
                               <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                           </div>
                       </button>

                       <ul class="submenu-category-list" data-accordion>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Clothes Perfume</a>
                           </li>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Deodorant</a>
                           </li>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Flower Fragrance</a>
                           </li>

                           <li class="submenu-category">
                               <a href="#" class="submenu-title">Air Freshener</a>
                           </li>

                       </ul>

                   </li>

                   <li class="menu-category">
                       <a href="#" class="menu-title">Blog</a>
                   </li>

                   <li class="menu-category">
                       <a href="#" class="menu-title">Hot Offers</a>
                   </li>

                   @if(Cookie::get('token') !== null)
                          <li><a href="{{url("/profile")}}"> <i class="linearicons-user"></i> Profile</a></li>
                          <li><a class="btn btn-danger btn-sm" href="{{url("/logout")}}"> Logout</a></li>
                      @else
                          <li><a class="btn btn-danger btn-sm" href="{{url("/login")}}">Login</a></li>
                    @endif

               </ul>

               <div class="menu-bottom">

                   <ul class="menu-category-list">

                       <li class="menu-category">

                           <button class="accordion-menu" data-accordion-btn>
                               <p class="menu-title">Language</p>

                               <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                           </button>

                           <ul class="submenu-category-list" data-accordion>

                               <li class="submenu-category">
                                   <a href="#" class="submenu-title">English</a>
                               </li>

                               

                              </ul>

                            </li>
     
                            <li class="menu-category">
                                <button class="accordion-menu" data-accordion-btn>
                                    <p class="menu-title">Currency</p>
                                    <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                                </button>
     
                                <ul class="submenu-category-list" data-accordion>
                                    
     
                                    <li class="submenu-category">
                                        <a href="#" class="submenu-title">BDT &LeftAngleBracket;;</a>
                                    </li>
                                </ul>
                            </li>
     
                        </ul>
     
                        <ul class="menu-social-container">
     
                            <li>
                                <a href="#" class="social-link">
                                    <ion-icon name="logo-facebook"></ion-icon>
                                </a>
                            </li>
     
                            <li>
                                <a href="#" class="social-link">
                                    <ion-icon name="logo-twitter"></ion-icon>
                                </a>
                            </li>
     
                            <li>
                                <a href="#" class="social-link">
                                    <ion-icon name="logo-instag"></ion-icon>
                                </a>
                            </li>
     
                            <li>
                                <a href="#" class="social-link">
                                    <ion-icon name="logo-linkedin"></ion-icon>
                                </a>
                            </li>
     
                        </ul>
     
                    </div>
     
                </nav> --}}