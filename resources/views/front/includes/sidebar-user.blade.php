<div class="card panel-left">
    <h5 class="card-header">User Panel</h5>
    <div class="card-body">
        <ul class="nav flex-column nav-stuff" style="min-height: 350px;">
            <li class="nav-item upProfileLi">
                <a class="nav-link upProfile" aria-current="page" href="{{ url('my-profile') }}">Profile</a>
            </li>
            <li class="nav-item upPackageLi">
                <a class="nav-link upPackage" href="{{ url('my-packages-list') }}">Packages</a>
            </li>
            <li class="nav-item upReservationsLi">
                <a class="nav-link upReservations" href="{{ url('user-reservation') }}">Reservations</a>
            </li>
            <li class="nav-item upMessagesLi">
                <a class="nav-link upMessages" href="{{ url('user-message') }}">Messages</a>
            </li>
            <li class="nav-item upOrdersLi ">
                <a class="nav-link upOrders" href="{{ url('user-orders') }}">Orders</a>
            </li>
            <li class="nav-item upWalletLi">
                <a class="nav-link upWallet" href="{{ url('user-wallet') }}">Wallets</a>
            </li>
            <li class="nav-item upReportsLi">
                <a class="nav-link upReports" href="{{ url('user-all-reports') }}">My Reports</a>
            </li>
            <li class="nav-item upFavLi">
                <a class="nav-link upFav" href="{{ url('user-favorites') }}">Favorites</a>
            </li>

            <li class="nav-item mt-auto">
                <a class="nav-link disabled text-black fw-bold verNo" href="#" tabindex="-1" aria-disabled="true">Version 1.0</a>
            </li>

        </ul>
    </div>
</div>