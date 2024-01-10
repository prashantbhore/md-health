<!-- Sidebar -->
<main data-simplebar>
    <div class="flex-shrink-0 p-3 md-sidebar">
        <p class="mb-0 link-dark text-decoration-none">
            <span class="sidebar-title">Super Admin Panel</span>
        </p>

        <ul class="nav nav-pills flex-column mb-auto mt-3">
            <li class="dashboardLi">
                <a href="{{URL::asset('admin/dashboard')}}" class="nav-link link-dark dashboard" aria-current="page">
                    Dashboard
                </a>
            </li>
            <li class="salesLi">
                <a href="{{URL::asset('admin/sales')}}" class="nav-link link-dark sales">
                    Sales
                </a>
            </li>
            <li class="manageCustomersLi">
                <a href="{{URL::asset('admin/customers')}}" class="nav-link link-dark manageCustomers">
                    Manage Customers
                </a>
            </li>
            <li class="manageVendorsLi">
                <a href="{{URL::asset('admin/vendors')}}" class="nav-link link-dark manageVendors">
                    Manage Vendors
                </a>
            </li>
            <li class="medicalTourismLi">
                <a href="{{URL::asset('admin/service-provider')}}" class="nav-link link-dark medicalTourism">
                    Manage Medical Tourism
                </a>
            </li>
            <li class="manageMDfoodsLi"> 
                <a href="{{URL::asset('admin/food-suppliers')}}" class="nav-link link-dark manageMDfoods">
                    Manage MDFoods
                </a>
            </li>
            <li class="citiesLi">
                <a href="{{URL::asset('admin/add-cities')}}" class="nav-link link-dark cities">
                    Manage Cities
                </a>
            </li>
           
            <li class="mlmLi">
                <a href="{{URL::asset('admin/multi-level-marketing')}}" class="nav-link link-dark mlm">
                    MLM
                </a>
            </li>
            <li class="brandsLi">
                <a href="{{URL::asset('admin/brands')}}" class="nav-link link-dark brands">
                    Manage Brands
                </a>
            </li>
            <li class="productsNcategoriesLi">
                <a href="{{URL::asset('admin/products-and-categories')}}" class="nav-link link-dark productsNcategories"> 
                    Manage Products & Catagories
                </a>
            </li>
            <li class="paymentsLi">
                <a href="{{URL::asset('admin/payments')}}" class="nav-link link-dark payments">
                    Payments
                </a>
            </li>
            <li class="reviewsLi">
                <a href="{{URL::asset('admin/pending-reviews')}}" class="nav-link link-dark reviews">
                    Reviews
                </a>
            </li>
         
            <li class="adsLi">
                <a href="{{URL::asset('admin/ads')}}" class="nav-link link-dark ads">
                    Ads & Promo
                </a>
            </li>
            <li class="manageRequestLi">
                <a href="{{URL::asset('admin/manage-request')}}" class="nav-link link-dark manageRequest">
                    Manage Request
                </a>
            </li>

            <li class="notificationsLi">
                <a href="{{URL::asset('admin/notifications')}}" class="nav-link link-dark notifications">
                    Notifications
                </a>
            </li>

            <li class="adminsLi">
                <a href="{{URL::asset('admin/add-admins')}}" class="nav-link link-dark admins">
                    Manage Admins
                </a>
            </li>
            
        </ul>
    </div>
</main>
