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
						<th>Nama Training</th>
						<th>Jumlah Peserta</th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>#</th>
						<th>Nama Training</th>
						<th>Jumlah Peserta</th>
						<th></th>
					</tr>
				</tfoot>
				<tbody>
					<?php $nomor = 1 ?>
					<?php foreach ($dataTraining as $training) : ?>
						<tr>
							<?php $dkm = $this->Dokumentasi->get_dokumentasi_training($training['id_training']); ?>
							<td><?= $nomor++ ?></td>
							<?php $nomor1 = 0 ?>
							<?php $countPeserta = $this->Peserta->count_peserta($training['id_training']); ?>
							<td><?= $training['nama_training'] ?></td>
							<td><?= ($countPeserta != 0) ? $countPeserta . ' Orang' : 'Tidak ada Peserta' ?></td>
							<td>
								<div class="row">
									<div class="col">
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#info<?= $training['id_training'] ?>">
											Info
										</button>

										<!-- Modal -->
										<div class="modal fade" id="info<?= $training['id_training'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLongTitle">Informasi Dokumentasi</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="row">
															<!-- Button trigger modal -->
															<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahSertifikat<?= $training['id_training'] ?>">
																Tambah Sertifikat Acara
															</button>
															<!-- Modal -->
															<div class="modal fade" id="tambahSertifikat<?= $training['id_training'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLabel">Tambah Sertifikat</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<form action="<?= base_url('index.php/dokumentasi/tambah') ?>" method="POST" enctype="multipart/form-data">
																			<div class="modal-body">
																				<?php $datad = $this->Peserta->notIn($training['id_training']); ?>
																				<label for="fk_dosen">Nama Dosen</label>
																				<select name="fk_dosen" id="fk_dosen" class="form-control mb-3" required>
																					<option value="">Pilih dosen</option>
																					<?php foreach ($datad as $d) : ?>
																						<option value="<?= $d['id_dosen'] ?>"><?= $d['nama_dosen'] ?></option>
																					<?php endforeach; ?>
																				</select>
																				<label for="file">Masukkan Sertifikat</label>
																				<input type="file" name="file" id="file" class="form-control mb-3">
																				<input type="hidden" name="fk_training" id="fk_training" value="<?= $training['id_training'] ?>">
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																				<button type="submit" class="btn btn-primary" name="tambah">Save changes</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
														</div>
														<?php if ($dkm) { ?>
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
																		<?php $nomor1 = 1 ?>
																		<?php foreach ($dkm as $dokumen) : ?>
																			<?php $dosenNama = $this->Dosen->get_dosen($dokumen['fk_dosen']); ?>

																			<tr>
																				<td><?= $nomor1++ ?></td>
																				<td><?= $dosenNama[0]['nama_dosen']?></td>
																				<td>
																					<div class="row mb-2">
																						<div class="col">
																							<a href="<?= base_url('/assets/upload/' . $dokumen['nama_dokumentasi']) ?>" target="_blank"><button class="btn btn-primary w-100">Pratinjau</button></a>
																						</div>

																					</div>
																					<div class="row">
																						<div class="col">
																							<form action="<?= base_url('/index.php/Dokumentasi/hapus') ?>" method="POST">
																								<input type="hidden" name="id_dokumentasi" value="<?= $dokumen['id_dokumentasi'] ?>">
																								<button type="submit" name="hapus" class="btn btn-danger w-100">Hapus</button>
																							</form>
																						</div>
																					</div>
																				</td>
																			</tr>
																		<?php endforeach; ?>
																	</tbody>
																</table>
															</div>
														<?php } else {
															echo "Data tidak ditemukan!";
														} ?>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
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
