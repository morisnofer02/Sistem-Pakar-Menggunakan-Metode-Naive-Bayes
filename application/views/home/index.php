<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
	<div class="container d-flex align-items-center justify-content-between">
		<h1 class="logo"><a href="index.html">Dini Cell</a></h1>
		<!-- Uncomment below if you prefer to use an image logo -->
		<!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

		<nav id="navbar" class="navbar">
			<ul>
				<li><a class="nav-link scrollto active" href="#hero">Home</a></li>
				<li><a class="nav-link scrollto" href="#about">About</a></li>
				<li><a class="nav-link scrollto" href="#contact">Contact</a></li>
				<li><a class="getstarted scrollto" href="<?= base_url('auth'); ?>">Login</a></li>
			</ul>
			<i class="bi bi-list mobile-nav-toggle"></i>
		</nav><!-- .navbar -->

	</div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

	<div class="container-fluid" data-aos="fade-up">
		<div class="row justify-content-center">
			<div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
				<h1>Sistem Pakar Dengan Metode Naive Bayes</h1>
				<h2>Aplikasi Untuk Mendeteksi Kerusakan Pada Smartphone</h2>
				<div><a href="<?= base_url('auth'); ?>" class="btn-get-started scrollto">Get Started</a></div>
			</div>
			<div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
				<img src="<?= base_url('assets2/'); ?>img/hero-img.png" class="img-fluid animated" alt="">
			</div>
		</div>
	</div>

</section><!-- End Hero -->

<!-- ======= About Section ======= -->
<section id="about" class="about">
	<div class="container">

		<div class="row">
			<div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
				<img src="<?= base_url('assets2/'); ?>img/about.jpg" class="img-fluid" alt="">
			</div>
			<div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
				<h3>About Us</h3>
				<p class="fst-italic">
					Dini Cell merupakan jasa yang menerima :
				</p>
				<ul>
					<li><i class="bi bi-check-circle"></i> Service Handphone</li>
					<li><i class="bi bi-check-circle"></i> Jual beli Handphone baru dan bekas</li>
					<li><i class="bi bi-check-circle"></i> Aksesoris Hanphone</li>
				</ul>
			</div>
		</div>

	</div>
</section><!-- End About Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg">
	<div class="container" data-aos="fade-up">

		<div class="section-title">
			<h2>Contact</h2>
		</div>

		<div class="row">
			<div class="col-lg-6">
				<div class="info-box mb-4">
					<i class="bx bx-map"></i>
					<h3>Our Address</h3>
					<p>Jorong balai tangah cupak, Kecamatan Gunung Talang, Kabupaten
						solok</p>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="info-box  mb-4">
					<i class="bx bx-envelope"></i>
					<h3>Email Us</h3>
					<p>dinicell01@gmail.com</p>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="info-box  mb-4">
					<i class="bx bx-phone-call"></i>
					<h3>Call Us</h3>
					<p>+62 812 2386 7468</p>
				</div>
			</div>

		</div>

	</div>
</section><!-- End Contact Section -->

</main><!-- End #main -->