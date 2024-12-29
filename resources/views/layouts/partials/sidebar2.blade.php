<!--- SIDEBAR-->

<div class="sidebar  has-scrollbar" data-mobile-menu>

    <div class="sidebar-category">

        <div class="sidebar-top">
            <h2 class="sidebar-title">Category</h2>

            <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>

        <ul class="sidebar-menu-category-list" id="category-list">
            @foreach ($mainCategories as $item)
                <p>

                    <a data-bs-toggle="collapse" href="#collapse-{{ $item->id }}" role="button" aria-expanded="false"
                        aria-controls="collapse-{{ $item->id }}">
                        <span><img src="{{ asset($item->categoryImg) }}" alt="clothes" width="20" height="20"
                                class="menu-title-img"></span> {{ $item->categoryName }} <span style="float:right;"
                            class="text-bold">+</span>
                    </a>
                </p>
                <div class="collapse" id="collapse-{{ $item->id }}">
                    @if ($item->categories->isNotEmpty())
                        <ul>
                            @foreach ($item->categories as $subcategory)
                                <li>{{ $subcategory->categoryName }}</li>
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
                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="{{ asset($item->image) }}" alt="baby fabric shoes" width="75" height="75"
                            class="showcase-img">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">{{ $item->title }}</h4>
                        </a>

                        <div class="showcase-rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                        </div>

                        <div class="price-box">
                            <del>{{ $item->price }}</del>
                            <p class="price">{{ $item->discount_price }}</p>
                        </div>

                    </div>

                </div>
                @endforeach
                
            </div>
            <a href="#" style="text-align: right">See All</a>
        </div>

    </div>

</div>
