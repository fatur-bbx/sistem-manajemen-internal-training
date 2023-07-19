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
						<th>Jadwal Training</th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>#</th>
						<th>Nama Training</th>
						<th>Jadwal Training</th>
						<th></th>
					</tr>
				</tfoot>
				<tbody>
					<?php $nomor = 1 ?>
					<?php foreach ($dataTraining as $training) : ?>
						<tr>
							<td><?= $nomor++ ?></td>
							<td><?= $training['nama_training'] ?></td>
							<td><?= $training['jadwal_training'] ?></td>
							<td>
								<div class="row">
									<div class="col">
										<button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#info<?= $training['id_training'] ?>">
											Info
										</button>

										<!-- Modal -->
										<div class="modal fade" id="info<?= $training['id_training'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLongTitle">Info data Training</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<label for="nama_training">Nama : </label>
														<input type="text" class="form-control mb-2" name="nama_training" id="nama_training" value="<?= $training['nama_training'] ?>" readonly>
														<label for="deskripsi_training">Deskripsi : </label>
														<textarea name="deskripsi_training" id="deskripsi_training" cols="30" rows="10" class="form-control mb-2" readonly><?= $training['deskripsi_training'] ?></textarea>
														<label for="jadwal_training">Tanggal : </label>
														<input type="date" name="jadwal_training" id="jadwal_training" class="form-control mb-2" value="<?= $training['jadwal_training'] ?>" readonly>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php $isIkut = $this->Peserta->isIkut($akunku['id_dosen'], $training['id_training']) ?>
									<?php if (!$isIkut) : ?>
										<div class="col">
											<button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#ikuti<?= $training['id_training'] ?>">
												Ikuti
											</button>

											<!-- Modal -->
											<div class="modal fade" id="ikuti<?= $training['id_training'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLongTitle">Ikuti Training</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="<?= base_url('/index.php/training/ikuti') ?>" method="POST">
															<div class="modal-body">
																<input type="hidden" name="id_training" value="<?= $training['id_training'] ?>">
																<input type="hidden" name="id_dosen" value="<?= $akunku['id_dosen'] ?>">
																<label for="">Apakah kamu yakin ingin mengikuti Training ini?</label>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary" name="ikuti" id="ikuti">Ya, Saya yakin!</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									<?php endif; ?>
									<?php if ($akunku['isAdmin'] == 1) { ?>
										<div class="col">
											<button type="button" class="btn btn-warning w-100" data-toggle="modal" data-target="#edit<?= $training['id_training'] ?>">
												Edit
											</button>

											<!-- Modal -->
											<div class="modal fade" id="edit<?= $training['id_training'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLongTitle">Edit data Training</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="<?= base_url('/index.php/training/edit') ?>" method="POST">
															<div class="modal-body">
																<input type="hidden" name="id_training" value="<?= $training['id_training'] ?>">
																<label for="nama_training">Nama : </label>
																<input type="text" class="form-control mb-2" name="nama_training" id="nama_training" placeholder="Masukkan nama training..." value="<?= $training['nama_training'] ?>" required>
																<label for="deskripsi_training">Deskripsi : </label>
																<textarea name="deskripsi_training" id="deskripsi_training" cols="30" rows="10" class="form-control mb-2" placeholder="Masukkan deskripsi training..." required><?= $training['deskripsi_training'] ?></textarea>
																<label for="jadwal_training">Tanggal : </label>
																<input type="date" name="jadwal_training" id="jadwal_training" class="form-control mb-2" value="<?= $training['jadwal_training'] ?>" required>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary" name="edit" id="edit">Save changes</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<div class="col">
											<button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#hapus<?= $training['id_training'] ?>">
												Hapus
											</button>

											<!-- Modal -->
											<div class="modal fade" id="hapus<?= $training['id_training'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLongTitle">Hapus data Training</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="<?= base_url('/index.php/training/hapus') ?>" method="POST">
															<div class="modal-body">
																<input type="hidden" name="id_training" value="<?= $training['id_training'] ?>">
																<label for="">Apakah kamu yakin ingin menghapus Training ini?</label>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary" name="hapus" id="hapus">Ya, Saya yakin!</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
