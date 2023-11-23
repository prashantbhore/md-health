<!-- Sidebar -->
<main data-simplebar>
    <div class="flex-shrink-0 p-3 md-sidebar">

        <p class="mb-0 link-dark text-decoration-none">
            <span class="sidebar-title">Super Admin Panel</span>
        </p>

        <ul class="nav nav-pills flex-column mb-auto mt-3 ">
            <li class="dashboardLi">
                <a href="{{URL::asset('/dashboard')}}" class="nav-link link-dark dashboard" aria-current="page">
                    Dashboard
                </a>
            </li>
            <li class="salesLi">
                <a href="{{URL::asset('/sales')}}" class="nav-link link-dark sales">
                    Sales
                </a>
            </li>
            <li class="manageCustomersLi">
                <a href="{{URL::asset('/customers')}}" class="nav-link link-dark manageCustomers">
                    Manage Customers
                </a>
            </li>
            <li class="manageVendorsLi">
                <a href="{{URL::asset('/vendors')}}" class="nav-link link-dark manageVendors">
                    Manage Vendors
                </a>
            </li>
            <li class="medicalTourismLi">
                <a href="{{URL::asset('/service-provider')}}" class="nav-link link-dark medicalTourism">
                    Manage Medical Tourism
                </a>
            </li>
            <li class="citiesLi">
                <a href="{{URL::asset('/add-cities')}}" class="nav-link link-dark cities">
                    Manage Cities
                </a>
            </li>
            <li class="adminsLi">
                <a href="{{URL::asset('/add-admins')}}" class="nav-link link-dark admins">
                    Manage Admins
                </a>
            </li>
            <li class="mlmLi">
                <a href="{{URL::asset('/multi-level-marketing')}}" class="nav-link link-dark mlm">
                    MLM
                </a>
            </li>
            <li class="brandsLi">
                <a href="{{URL::asset('/brands')}}" class="nav-link link-dark brands">
                    Manage Brands
                </a>
            </li>
            <li class="productsNcategoriesLi">
                <a href="{{URL::asset('/products-and-categories')}}" class="nav-link link-dark productsNcategories"> 
                    Manage Products & Catagories
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    Payments
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    Reviews
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    Notifications
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    Ads & Promo
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    Manage Request
                </a>
            </li>

        </ul>
    </div>
</main>