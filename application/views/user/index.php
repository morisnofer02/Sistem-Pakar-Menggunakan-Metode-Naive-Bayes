<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo"><a href="<?= base_url('home_user'); ?>">Dini Cell</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('user'); ?>">Profile</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('user/hasil_diagnosa'); ?>">Hasil Diagnosa</a></li>
                <li><a class="getstarted scrollto" href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Yakin Keluar?');">Logout</a></li>
            </ul>
            <i class=" bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1>Sistem Pakar Dengan Metode Naive Bayes</h1>
                <h2>Selamat Datang, <?= $user['nama_user']; ?></h2>
                <div><a href="<?= base_url('user/diagnosa'); ?>" class="btn-get-started scrollto">Diagnosa</a></div>
            </div>
            <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
                <img src="<?= base_url('assets2/'); ?>img/hero-img.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->