<!-- Begin Page Content -->
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-header">
					Form Tambah Data Baju
				</div>
				<div class="card-body">
					<form action="" method="POST">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input name="nama" type="text" value="<?= set_value('nama'); ?>" class="form-control" id="nama" placeholder="Nama">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="admin">Admin</label>
							<select name="admin" id="admin" value="<?= set_value('admin'); ?>" class="form-control">
								<option value="">Pilih Admin</option>
								<?php foreach ($admin as $b) : ?>
									<option value="<?= $b['id']; ?>"><?= $b['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
			
						<div class="form-group">
							<label for="stok">Stok</label>
							<input name="stok" value="<?= set_value('stok'); ?>" type="text" class="form-control" id="stok" placeholder="Stok">
							<?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="harga">Harga</label>
							<input name="harga" value="<?= set_value('harga'); ?>" type="text" class="form-control" id="harga" placeholder="Harga">
							<?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label for="kompetensi">Gambar</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="gambar" id="gambar">
								<label for="gambar" class="custom-file-label">Choose File</label>
							</div>
						</div>
						<a href="<?= base_url('Baju') ?>" class="btn btn-danger">Tutup</a>
						<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Baju</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
