<h1 class="h3 mb-2 text-gray-800">Halaman <?= $halaman ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><?= $halaman ?></h6>
	</div>
	<div class="card-body">
		<?php if($dataRiwayat)  { ?>
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>#</th>
						<th>Riwayat Training</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>#</th>
						<th>Riwayat Training</th>
						<th>Tanggal</th>
					</tr>
				</tfoot>
				<tbody>
					<?php $nomor = 1?>
					<?php foreach($dataRiwayat as $riwayat) : ?>
					<tr>
						<td><?= $nomor++ ?></td>
						<td><?= $riwayat['nama_training'] ?></td>
						<td><?= $riwayat['tanggal'] ?></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
		<?php } else { ?>
		Data tidak ditemukan!
		<?php } ?>
	</div>
</div>
