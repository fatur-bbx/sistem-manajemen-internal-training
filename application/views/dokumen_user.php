<?php $doc = $this->Dokumentasi->userDok($akunku['id_dosen'])?>
<h1 class="h3 mb-2 text-gray-800">Halaman <?= $halaman ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><?= $halaman ?></h6>
	</div>
	<div class="card-body">
		<?php if ($akunku['isAdmin'] == 1) { ?>
			<div class="col mb-3">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahTraining">
					Tambah
				</button>

				<!-- Modal -->
				<div class="modal fade" id="tambahTraining" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Tambah data Training</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="<?= base_url('/index.php/training/tambah') ?>" method="POST">
								<div class="modal-body">
									<label for="nama_training">Nama : </label>
									<input type="text" class="form-control mb-2" name="nama_training" id="nama_training" placeholder="Masukkan nama training..." required>
									<label for="deskripsi_training">Deskripsi : </label>
									<textarea name="deskripsi_training" id="deskripsi_training" cols="30" rows="10" class="form-control mb-2" placeholder="Masukkan deskripsi training..." required></textarea>
									<label for="jadwal_training">Tanggal : </label>
									<input type="date" name="jadwal_training" id="jadwal_training" class="form-control mb-2" required>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary" name="tambah" id="tambah">Save changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Training</th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>#</th>
						<th>Nama Training</th>
						<th></th>
					</tr>
				</tfoot>
				<tbody>
					<?php $nomor = 1 ?>
					<?php foreach ($doc as $dokumen) : ?>
						<tr>
							<?php $dtTraining = $this->Training->get_training($dokumen['fk_training']);?>
							<td><?= $nomor++ ?></td>
							<td><?= $dtTraining['nama_training'] ?></td>
							<td>
								<div class="row">
									<div class="col">
										<a href="<?= base_url('/assets/upload/'.$dokumen['nama_dokumentasi'])?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Pratinjau</a>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
