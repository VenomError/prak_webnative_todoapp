<a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
    <span class="account-user-avatar">
        <img src="assets/images/users/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle">
    </span>
    <span class="d-lg-flex flex-column gap-1 d-none">
        <h5 class="my-0"><?= ucwords(auth()->name ?? '') ?></h5>
        <h6 class="my-0 fw-normal"><?= auth()->role ?? '' ?></h6>
    </span>
</a>
<div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
    <!-- item-->
    <div class=" dropdown-header noti-title">
        <h6 class="text-overflow m-0">Welcome !</h6>
    </div>


    <!-- item-->
    <a href="/logout" class="dropdown-item">
        <i class="mdi mdi-logout me-1"></i>
        <span>Logout</span>
    </a>
</div>