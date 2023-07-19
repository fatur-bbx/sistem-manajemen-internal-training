<h1 class="h3 mb-2 text-gray-800">Halaman <?= $halaman ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><?= $halaman ?></h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Dosen</th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>#</th>
						<th>Nama Dosen</th>
						<th></th>
					</tr>
				</tfoot>
				<tbody>
					<?php $nomor = 1 ?>
					<?php foreach ($dataDosen as $dosen) : ?>
						<tr>
							<td><?= $nomor++ ?></td>
							<td><?= $dosen['nama_dosen'] ?></td>
							<td>
								<div class="row">
									<?php if (!$dosen['isAdmin']) { ?>
										<div class="col">
											<button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#make<?= $dosen['id_dosen'] ?>">
												Jadikan Admin
											</button>

											<!-- Modal -->
											<div class="modal fade" id="make<?= $dosen['id_dosen'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLongTitle">Jadikan Admin</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="<?= base_url('/index.php/Dosen/makeAdmin') ?>" method="POST">
															<div class="modal-body">
																<input type="hidden" name="id_dosen" value="<?= $dosen['id_dosen'] ?>">
																<label for="">Apakah kamu yakin ingin mengubah role akun ini menjadi 'Admin'?</label>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary" name="makeAdmin" id="makeAdmin">Ya, Saya yakin!</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									<?php } else { ?>
										<div class="col">
											<button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#notmake<?= $dosen['id_dosen'] ?>">
												Batalkan akses Admin
											</button>

											<!-- Modal -->
											<div class="modal fade" id="notmake<?= $dosen['id_dosen'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLongTitle">Batalkan akses Admin</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="<?= base_url('/index.php/Dosen/makeBiasa') ?>" method="POST">
															<div class="modal-body">
																<input type="hidden" name="id_dosen" value="<?= $dosen['id_dosen'] ?>">
																<label for="">Apakah kamu yakin ingin mengubah role akun ini menjadi 'Akun biasa'?</label>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary" name="makeBiasa" id="makeBiasa">Ya, Saya yakin!</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
									<?php if (!$dosen['isAccept']) { ?>
										<div class="col">
											<button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#konfirmasi<?= $dosen['id_dosen'] ?>">
												Konfirmasi Pendaftaran
											</button>

											<!-- Modal -->
											<div class="modal fade" id="konfirmasi<?= $dosen['id_dosen'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Akun</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="<?= base_url('/index.php/Dosen/konfirmasi') ?>" method="POST">
															<div class="modal-body">
																<input type="hidden" name="id_dosen" value="<?= $dosen['id_dosen'] ?>">
																<label for="">Apakah kamu yakin ingin mengkonfirmasi akun ini?</label>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary" name="konfirmasi" id="konfirmasi">Ya, Saya yakin!</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									<?php } else { ?>
										<div class="col">
											<button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#notmake<?= $dosen['id_dosen'] ?>">
												Batalkan Konfirmasi
											</button>

											<!-- Modal -->
											<div class="modal fade" id="notmake<?= $dosen['id_dosen'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLongTitle">Batalkan Konfirmasi Akun</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="<?= base_url('/index.php/Dosen/batalkonfirmasi') ?>" method="POST">
															<div class="modal-body">
																<input type="hidden" name="id_dosen" value="<?= $dosen['id_dosen'] ?>">
																<label for="">Apakah kamu yakin ingin membatalkan konfirmasi akun ini?</label>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary" name="batalkonfirmasi" id="batalkonfirmasi">Ya, Saya yakin!</button>
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
