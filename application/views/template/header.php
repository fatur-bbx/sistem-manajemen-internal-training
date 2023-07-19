<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $halaman ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('/assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('/assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-briefcase"></i>
				</div>
				<div class="sidebar-brand-text mx-3">SisMIT</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item <?= ($halaman == 'Dashboard') ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('/') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<li class="nav-item <?= ($halaman == 'Training') ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('/index.php/training') ?>">
					<i class="fas fa-fw fa-briefcase"></i>
					<span>Training</span></a>
			</li>

			<?php if ($akunku['isAdmin'] == 1) { ?>
				<li class="nav-item <?= ($halaman == 'Sertifikat') ? 'active' : '' ?>">
					<a class="nav-link" href="<?= base_url('/index.php/Dokumentasi') ?>">
						<i class="fas fa-fw fa-file"></i>
						<span>Sertifikat</span></a>
				</li>
			<?php } else { ?>
				<li class="nav-item <?= ($halaman == 'Sertifikat') ? 'active' : '' ?>">
					<a class="nav-link" href="<?= base_url('/index.php/Dokumentasi/dokumentasi_user') ?>">
						<i class="fas fa-fw fa-file"></i>
						<span>Sertifikat</span></a>
				</li>
			<?php } ?>

			<li class="nav-item <?= ($halaman == 'Riwayat') ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('/index.php/Riwayat') ?>">
					<i class="fas fa-fw fa-history"></i>
					<span>Riwayat</span></a>
			</li>
			<?php if ($akunku['isAdmin'] == 1) { ?>
				<li class="nav-item <?= ($halaman == 'Akun') ? 'active' : '' ?>">
					<a class="nav-link" href="<?= base_url('/index.php/Dosen') ?>">
						<i class="fas fa-fw fa-users"></i>
						<span>Akun</span></a>
				</li>
			<?php } ?>
			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $akunku['nama_dosen'] ?></span>
								<img class="img-profile rounded-circle" src="<?= base_url('/assets/') ?>img/undraw_profile.svg">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="<?= base_url('/index.php/Index/Akun') ?>">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profile
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<div class="container-fluid">
