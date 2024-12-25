<div class="navigation">
    <ul>
        <!-- <li style="position: fixed; border-color: black;"> -->
        <li>
            <a href="{{url('/dashboard')}}">
                <span class="icon">
                    <ion-icon name="logo-apple"></ion-icon>
                </span>
                <span class="title">The it Solution Bd</span>
            </a>
        </li>

        <li>
            <a href="{{url('/dashboard')}}">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{ url('/dashboard/orders') }}">
                <span class="icon">
                    <ion-icon name="gift-outline"></ion-icon>
                </span>
                <span class="title">Orders</span>
            </a>
        </li>

        <li>
            <a href="{{ url('/customers') }}">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Customers</span>
            </a>
        </li>

        <li>
            <a href="{{ url('/products-list') }}">
                <span class="icon">
                    <ion-icon name="cube-outline"></ion-icon>
                </span>
                <span class="title">Products</span>
            </a>
        </li>

        <li>
            <a href="{{ url('/dashboard/product-add') }}">
                <span class="icon">
                    <ion-icon name="add-circle-outline"></ion-icon>
                </span>
                <span class="title">Add Product</span>
            </a>
        </li>

        <li>
            <a href="{{url('/main-category')}}">
                <span class="icon">
                    <ion-icon name="add-circle-outline"></ion-icon>
                </span>
                <span class="title">Main Category</span>
            </a>
        </li> 
        <li>
            <a href="{{url('/sub-category')}}">
                <span class="icon">
                    <ion-icon name="add-circle-outline"></ion-icon>
                </span>
                <span class="title">Sub Category</span>
            </a>
        </li> 
        <li>
            <a href="{{url('/brand-list')}}">
                <span class="icon">
                    <ion-icon name="add-circle-outline"></ion-icon>
                </span>
                <span class="title">Brand</span>
            </a>
        </li> 

        <li>
            <a href="{{ url('/dashboard/setting') }}">
                <span class="icon">
                    <ion-icon name="settings-outline"></ion-icon>
                </span>
                <span class="title">Settings</span>
            </a>
        </li>

        <!-- <li>
            <a href="./profile.html">
                <span class="icon">
                    <ion-icon name="person-circle-outline"></ion-icon>
                </span>
                <span class="title">Profile</span>
            </a>
        </li> -->

        <li>
            <a href="{{ url('/logout') }}">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Sign Out</span>
            </a>
        </li>
    </ul>
</div>