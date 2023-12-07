<div class="container-fluid my-auto">
	<!-- <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="row">
        <div class="col-md-6"><a href="<?= base_url(); ?>Baju/tambah" class="btn btn-info mb-2">Tambah Baju</a></div>
        
		<div class="col-md-12"> -->
	<?= $this->session->flashdata('message');
	?>
	<div class="clearfix">
		<div class="float-left">
			<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
		</div>
		
	</div>
	<div class="card shadow mb-4 bg-warning text-gray-100">
		<div class="card-body text-gray-100">
			<div class="table-responsive text-gray-100">
				<table class="table table-bordered text-gray-100" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td>No</td>
							<td>Type</td>
							<td>Salary</td>
							<td></td> 
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($shift as $us) : ?>
							<tr>
								<td> <?= $i; ?>.</td>

								<td><?= $us['type']; ?></td>
								<td><?= $us['salary']; ?></td>
								<td>
									<!-- <a href="<?= base_url('Shift/hapus/') . $us['id']; ?>" class="badge badge-danger">Hapus</a>
									<a href="<?= base_url('Shift/edit/') . $us['id']; ?>" class="badge badge-warning">Edit</a> -->
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