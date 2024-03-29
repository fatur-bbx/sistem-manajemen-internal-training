<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><?= $halaman ?></h1>
</div>

<!-- Content Row -->
<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl col-md mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
							Training</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $training ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-briefcase fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl col-md mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
							Sertifikat</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dokumentasi ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-file fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	<div class="col-xl col-md mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
							Riwayat</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $riwayat ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-history fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
