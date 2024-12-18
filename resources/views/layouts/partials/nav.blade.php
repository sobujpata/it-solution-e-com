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

                       <button class="action-btn">
                           <ion-icon name="bag-handle-outline"></ion-icon>
                           <span class="count">0</span>
                       </button>

                   </div>

               </div>

           </div>

           <nav class="desktop-navigation-menu">

               <div class="container">

                   <ul class="desktop-menu-category-list">

                       <li class="menu-category">
                           <a class='menu-title' href='/'>Home</a>
                       </li>

                       <li class="menu-category">
                           <a href="#" class="menu-title">Categories</a>

                           <div class="dropdown-panel">

                               <ul class="dropdown-panel-list">

                                   <li class="menu-title">
                                       <a href="#">Electronics</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">Desktop</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">Laptop</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">Camera</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">Tablet</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">Headphone</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">
                                           <img src="{{ asset('images/electronics-banner-1.jpg') }}"
                                               alt="headphone collection" width="250" height="119">
                                       </a>
                                   </li>

                               </ul>

                               <ul class="dropdown-panel-list">

                                   <li class="menu-title">
                                       <a href="#">Men's</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">Formal</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">Casual</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">Sports</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">Jacket</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">Sunglasses</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">
                                           <img src="{{ asset('images/mens-banner.jpg') }}" alt="men's fashion"
                                               width="250" height="119">
                                       </a>
                                   </li>

                               </ul>

                               <ul class="dropdown-panel-list">

                                   <li class="menu-title">
                                       <a href="#">Phone</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">Computer</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">Casual</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">Perfume</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">Cosmetics</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">Bags</a>
                                   </li>

                                   <li class="panel-list-item">
                                       <a href="#">
                                           <img src="{{ asset('images/womens-banner.jpg') }}" alt="women's fashion"
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
                                       <a href="#">Smart TV</a>
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
                                   <a href="#">Shirt</a>
                               </li>

                               <li class="dropdown-item">
                                   <a href="#">Shorts & Jeans</a>
                               </li>

                               <li class="dropdown-item">
                                   <a href="#">Safety Shoes</a>
                               </li>

                               <li class="dropdown-item">
                                   <a href="#">Wallet</a>
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
                           <a href="#" class="menu-title">Phone</a>

                           <ul class="dropdown-list">

                               <li class="dropdown-item">
                                   <a href="#">Apple</a>
                               </li>

                               <li class="dropdown-item">
                                   <a href="#">Samsung</a>
                               </li>

                               <li class="dropdown-item">
                                   <a href="#">Asus</a>
                               </li>

                               <li class="dropdown-item">
                                   <a href="#">Nokia</a>
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
                           <a href="#" class="menu-title">Hot Offers</a>
                       </li>

                   </ul>

               </div>

           </nav>

           <div class="mobile-bottom-navigation">

               <button class="action-btn" data-mobile-menu-open-btn>
                   <ion-icon name="menu-outline"></ion-icon>
               </button>

               <button class="action-btn">
                   <ion-icon name="bag-handle-outline"></ion-icon>

                   <span class="count">10</span>
               </button>

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

           <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

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

                               <li class="submenu-category">
                                   <a href="#" class="submenu-title">Espa&ntilde;ol</a>
                               </li>

                               <li class="submenu-category">
                                   <a href="#" class="submenu-title">Fren&ccedil;h</a>
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
                                   <a href="#" class="submenu-title">USD &dollar;</a>
                               </li>

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

           </nav>

   </header>
