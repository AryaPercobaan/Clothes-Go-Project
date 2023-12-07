<!-- Begin Page Content -->
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-header">
					Form Ubah Data Baju
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $coffee['id']; ?>">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input value="<?= $coffee['nama']; ?>" name="nama" type="text" class="form-control" id="nama" placeholder="Nama">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
                            <label for="Barista">Admin</label>
                            <select name="barista" id="menu_id" class="form-control">
                                <?php foreach ($barista as $b) : ?>
                                    <option value="<?= $b['id']; ?>" <?php if ($coffee['barista'] == $b['id']) {
                                                                            echo "selected";
                                                                        } ?>><?= $b['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('barista', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
						<div class="form-group">
							<label for="stok">Stok</label>
							<input value="<?= $coffee['stok']; ?>" name="stok" type="text" class="form-control" id="stok" placeholder="Stok">
							<?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="harga">Harga</label>
							<input value="<?= $coffee['harga']; ?>" name="harga" type="text" class="form-control" id="harga" placeholder="Harga">
							<?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<img src="<?= base_url('assets/img/coffee/') . $coffee['gambar']; ?>" style="width:100px" class="img-thumbnail">

							<div class="custom-file">
								<input type="file" class="custom-file-input" name="gambar" id="gambar">
								<label for="gambar" class="custom-file-label">Choose File</label>
							</div>
						</div>
						<a href="<?= base_url('Coffee') ?>" class="btn btn-danger">Tutup</a>
						<button type="submit" name="tambah" class="btn btn-dark float-right">Ubah Baju</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
