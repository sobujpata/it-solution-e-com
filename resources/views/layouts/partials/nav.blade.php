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
                       <img src="{{ asset('images/logo/it-logo2.jpg') }}" alt="It Solution logo"
                           style="width: 200px; height:90px;">
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
                           <a href="{{ '/' }}" class="menu-title">Home</a>
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
                                           <img src="{{ asset('images/apple.jpg') }}" alt="headphone collection"
                                               width="250" height="119">
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
                                           <img src="{{ asset('images/havit.jpg') }}" alt="men's fashion" width="250"
                                               height="119">
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
                                           <img src="{{ asset('images/gedget.jpg') }}" alt="women's fashion"
                                               width="250" height="119">
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
                                           <img src="{{ asset('images/electronics-banner-2.jpg') }}"
                                               alt="mouse collection" width="250" height="119">
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
                           <a href="#HotOffers" class="menu-title">Hot Offers</a>
                       </li>

                       @if (Cookie::get('token') !== null)
                           <li class="menu-category"><a href="{{ url('/invoices') }}" class="menu-title">Orders</a>
                           </li>
                           <li class="menu-category"><a href="{{ url('/profile') }}" class="menu-title">Account</a>
                           </li>
                           <li class="menu-category"><a href="{{ url('/logout') }}" class="menu-title">Logout</a>
                           </li>
                       @else
                           <li class="menu-category"><a href="{{ url('/login') }}" class="menu-title">Login</a></li>
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
                   padding-top: 15px;
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
                   right: 0;
                   font-size: 36px;
                   margin-left: 50px;
               }

               .mobile-hover-menu:hover {
                   background-color: #A0C1B9;
               }

               @media screen and (max-height: 450px) {
                   .sidenav {
                       padding-top: 15px;
                   }

                   .sidenav a {
                       font-size: 18px;
                   }
               }
           </style>
           {{-- mobile side main menu bar --}}
           <div id="mySidenav" class="sidenav">
               <div class="row">
                   <div class="col-10">
                       <img src="{{ asset('images/logo/it-logo2.jpg') }}" alt="It Solution logo"
                           style="width: 150px; height:40px;">
                   </div>
                   <div class="col-2">
                       <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                   </div>
               </div>
               <p class="mb-2 mobile-hover-menu ">
                   <a href="/" class="text-dark">Home</a>
               </p>
               <p class="mb-2 mobile-hover-menu ">
                   <a data-bs-toggle="collapse" href="#collapse-category" role="button" aria-expanded="false"
                       aria-controls="collapse-category" class="text-dark">
                       Categories <span style="float:right;" class="text-bold">+</span>
                   </a>
               </p>
               <div class="collapse" id="collapse-category">
                   <ul>
                       <li><a class="text-dark" href="">Category</a></li>
                   </ul>
               </div>
               <p class="mb-2 mobile-hover-menu ">
                   <a data-bs-toggle="collapse" href="#collapse-macbook" role="button" aria-expanded="false"
                       aria-controls="collapse-macbook" class="text-dark">
                       Macbook <span style="float:right;" class="text-bold">+</span>
                   </a>
               </p>
               <div class="collapse" id="collapse-macbook">
                   <ul>
                       <li><a class="text-dark" href="">Macbook</a></li>
                   </ul>
               </div>
               <p class="mb-2 mobile-hover-menu ">
                   <a data-bs-toggle="collapse" href="#collapse-headphone" role="button" aria-expanded="false"
                       aria-controls="collapse-headphone" class="text-dark">
                       headphone <span style="float:right;" class="text-bold">+</span>
                   </a>
               </p>
               <div class="collapse" id="collapse-headphone">
                   <ul>
                       <li><a class="text-dark" href="">Headphone</a></li>
                   </ul>
               </div>
               <p class="mb-2 mobile-hover-menu ">
                   <a data-bs-toggle="collapse" href="#collapse-gadget" role="button" aria-expanded="false"
                       aria-controls="collapse-gadget" class="text-dark">
                       Gadget <span style="float:right;" class="text-bold">+</span>
                   </a>
               </p>
               <div class="collapse" id="collapse-gadget">
                   <ul>
                       <li><a class="text-dark" href="">Gadget</a></li>
                   </ul>
               </div>
               <p class="mb-2 mobile-hover-menu ">
                   <a href="/" class="text-dark">Blogs</a>

               </p>
               <p class="mb-2 mobile-hover-menu ">
                   <a href="/" class="text-dark">Hot Offers</a>
               </p>

               @if (Cookie::get('token') !== null)
                   <p class="mb-2 mobile-hover-menu ">
                       <a href="{{ url('profile') }}" class="text-dark">Account</a>

                   </p>
                   <p class="mb-2 mobile-hover-menu ">
                       <a href="{{ url('/logout') }}" class="text-dark">Logout</a>

                   </p>
               @else
                   <p class="mb-2 mobile-hover-menu ">
                       <a href="{{ url('/login') }}" class="text-dark">Login</a>

                   </p>
               @endif
           </div>
           {{-- mobile side category menu bar --}}
           <div id="categoryManu" class="sidenav">
               <div class="row">
                   <div class="col-10">
                       <img src="{{ asset('images/logo/it-logo2.jpg') }}" alt="It Solution logo"
                           style="width: 150px; height:40px;">
                   </div>
                   <div class="col-2">
                       <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                   </div>
               </div>
               <!--- SIDEBAR-->

                <div class="sidebar-category">

                    <div class="sidebar-top">
                        <h2 class="mt-4 mx-4">Product Categories</h2>
                    </div>

                    <ul class="sidebar-menu-category-list" id="category-list">
                        @foreach ($mainCategories as $item)
                            <p>
                                <a data-bs-toggle="collapse" href="#collapse-{{ $item->id }}" role="button" aria-expanded="false"
                                    aria-controls="collapse-{{ $item->id }}" class="text-dark">
                                    <span><img src="{{ asset($item->categoryImg) }}" alt="clothes" width="20" height="20"
                                            class="menu-title-img"></span> {{ $item->categoryName }} <span style="float:right;"
                                        class="text-bold">+</span>
                                </a>
                            </p>
                            <div class="collapse" id="collapse-{{ $item->id }}">
                                @if ($item->categories->isNotEmpty())
                                    <ul>
                                        @foreach ($item->categories as $subcategory)
                                            <li><a class="text-dark" href="{{ url('/product-category/' . urlencode($subcategory->categoryName)) }}">{{ $subcategory->categoryName }} <span style="float:right">300</span></a></li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No subcategories available.</p>
                                @endif
                            </div>
                        @endforeach


                    </ul>

                </div>

                <div class="product-showcase">

                    <h3 class="showcase-heading">best sellers</h3>

                    <div class="showcase-wrapper">

                        <div class="showcase-container" id="BestSale">
                            {{-- @dd($bestSale) --}}
                            @foreach ($bestSale as $item)
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#" class="">
                                                <img src="{{ asset($item->image) }}" alt="baby fabric shoes" width="75" height="75" class="showcase-img">
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <div class="row">
                                                <div class="col-12 text-left">
                                                    <a href="#" class="p-0">
                                                        {{ $item->title }}
                                                    </a>
                                                </div>
                                                <div class="col-12">
                                                    <div class="price-box">
                                                        <del>{{ $item->price }}</del>
                                                        <p class="price">{{ $item->discount_price }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                        <a href="#" style="text-align: right">See All</a>
                    </div>

                </div>


               
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

               <button class="action-btn" onclick="categorynNavOpen()">
                   <ion-icon name="grid-outline"></ion-icon>
               </button>

           </div>



   </header>

   <script>
       function openNav() {
           document.getElementById("mySidenav").style.width = "330px";
       }
       function categorynNavOpen() {
           document.getElementById("categoryManu").style.width = "330px";
       }

       function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
           document.getElementById("categoryManu").style.width = "0";
       }
   </script>
