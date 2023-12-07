<div class="container-fluid my-auto">
	<!-- <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="row">
        <div class="col-md-6"><a href="<?= base_url(); ?>Barista/tambah" class="btn btn-info mb-2">Tambah Barista</a></div>
        
		<div class="col-md-12"> -->
	<?= $this->session->flashdata('message');
	?>
	<div class="clearfix">
		<div class="float-left">
			<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
		</div>
		<div class="float-right">
			<a href="<?= base_url('Barista/tambah') ?>" class="btn btn-light"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Admin</a>
		</div>
	</div>
	<div class="card shadow mb-4 bg-dark text-gray-100">
		<div class="card-body text-gray-100">
			<div class="table-responsive text-gray-100">
				<table class="table table-bordered text-gray-100" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td>No</td>
							<td>Gambar</td>
							<td>Nama</td>
							<td>Posisi</td>
							<td>Shift</td>
							<td>Email</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($barista as $us) : ?>
							<tr>
								<td> <?= $i; ?>.</td>
								<td><img src="<?= base_url('assets/img/barista/') . $us['gambar']; ?>" style="width:100px" class="img-thumbnail"></td>
								<td><?= $us['nama']; ?></td>
								<td><?= $us['posisi']; ?></td>
								<td><?= $us['shift']; ?></td>
								<td><?= $us['email']; ?></td>
								<td>
									<a href="<?= base_url('Barista/hapus/') . $us['id']; ?>" class="badge badge-danger">Hapus</a>
									<a href="<?= base_url('Barista/edit/') . $us['id']; ?>" class="badge badge-warning">Edit</a>
								</td>
							</tr>
							<?php $i++; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>

</div>