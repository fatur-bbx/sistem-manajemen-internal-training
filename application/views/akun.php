<h1 class="h3 mb-2 text-gray-800">Halaman <?= $halaman ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><?= $halaman ?></h6>
	</div>
	<div class="card-body">
		<form action="<?= base_url('index.php/Index/ubah')?>" method="POST">
			<input type="hidden" name="id_dosen" value="<?= $akunku['id_dosen'] ?>">
			<div class="row">
				<div class="col-3">
					<label for="nama_dosen">Nama</label>
				</div>
				<div class="col">
					<input type="text" name="nama_dosen" id="nama_dosen" value="<?= $akunku['nama_dosen'] ?>" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<label for="">NIP</label>
				</div>
				<div class="col">
					<input type="number" name="nip" id="nip" value="<?= $akunku['nip'] ?>" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<label for="">Email</label>
				</div>
				<div class="col">
					<input type="email" name="email_dosen" id="email_dosen" value="<?= $akunku['email_dosen'] ?>" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<label for="">Password</label>
				</div>
				<div class="col">
					<input type="password" name="password_dosen" id="password_dosen" value="<?= $akunku['password_dosen'] ?>" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="col">
					<button type="submit" name="ubah" class="btn btn-primary mt-3">Ubah</button>
				</div>
			</div>
		</form>
	</div>
</div>
