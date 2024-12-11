<div>
    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg py-lg-3 navbar-dark">
        <div class="container">

            <!-- logo -->
            <a href="index.html" class="navbar-brand me-lg-5">
                <img src="assets/images/logo.png" alt="logo" class="logo-dark" height="22" />
            </a>

            <!-- menus -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                <!-- left menu -->
                <ul class="navbar-nav me-auto align-items-center">

                </ul>

                <!-- right menu -->
                <ul class="navbar-nav ms-auto align-items-center gap-2">
                    <?php if (empty(session('auth'))) { ?>
                        <li class="nav-item me-0">
                            <a href="/register" class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex">
                                Register
                            </a>
                        </li>
                        <li class="nav-item me-0">
                            <a href="/login" class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex">
                                Login
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item me-0">
                            <a href="/dashboard" class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex">
                                Dashboard
                            </a>
                        </li>
                    <?php } ?>
                </ul>

            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <!-- START HERO -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="mt-md-4">
                        <div>
                            <span class="text-white-50 ms-1">Selamat datang di Pemrograman Web Native</span>
                        </div>
                        <h2 class="text-white fw-normal mb-4 mt-3 lh-base">
                            Hyper - Atur dan Kelola Daftar Aktivitas Anda dengan Mudah
                        </h2>

                        <p class="mb-4 font-16 text-white-50">Hyper is a fully featured dashboard and admin template
                            comes with tones of well designed UI elements, components, widgets and pages.</p>

                        <a href="/register" class="btn btn-lg font-16 btn-success">Register <i class="mdi mdi-arrow-right ms-1"></i></a>
                        <a href="/login" class="btn btn-lg font-16 btn-info">Login</a>
                    </div>
                </div>
                <div class="col-md-5 offset-md-2">
                    <div class="text-md-end mt-3 mt-md-0">
                        <img src="assets/images/svg/startup.svg" alt="" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END HERO -->

</div>