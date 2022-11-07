<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Absen Masuk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/absen">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Home
                </a>
            </li>
        </ul>
    </div>
</nav>
