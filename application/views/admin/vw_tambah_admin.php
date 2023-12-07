<!-- Begin Page Content -->
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-header">
					Form Tambah Data Admin
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input name="nama" type="text" value="<?= set_value('nama'); ?>" class="form-control" id="nama" placeholder="Nama">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="posisi">Posisi</label>
							<input name="posisi" value="<?= set_value('posisi'); ?>" type="text" class="form-control" id="posisi" placeholder="Posisi">
							<?= form_error('posisi', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="shift">Shift</label>
							<select name="shift" id="shift" value="<?= set_value('shift'); ?>" class="form-control">
								<option value="">Pilih Shift</option>
								<?php foreach ($shift as $s) : ?>
									<option value="<?= $s['id']; ?>"><?= $s['type']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input name="email" value="<?= set_value('email'); ?>" type="text" class="form-control" id="email" placeholder="Email">
							<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					
						<div class="form-group">
							<label for="kompetensi">Gambar</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="gambar" id="gambar">
								<label for="gambar" class="custom-file-label">Choose File</label>
							</div>
						</div>
						<a href="<?= base_url('Admin') ?>" class="btn btn-danger">Tutup</a>
						<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Admin</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
