<!-- Begin Page Content -->
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-header">
					Form Tambah Data Barista
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $barista['id']; ?>">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input value="<?= $barista['nama']; ?>" name="nama" type="text" class="form-control" id="nama" placeholder="Nama">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="prodi">Posisi</label>
							<input value="<?= $barista['posisi']; ?>" name="posisi" type="text" class="form-control" id="posisi" placeholder="Posisi">
							<?= form_error('posisi', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
                            <label for="Shift">Shift</label>
                            <select name="shift" id="menu_id" class="form-control">
                                <?php foreach ($shift as $s) : ?>
                                    <option value="<?= $s['id']; ?>" <?php if ($barista['shift'] == $s['id']) {
                                                                            echo "selected";
                                                                        } ?>><?= $s['type']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('shift', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
						<div class="form-group">
							<label for="email">Email</label>
							<input value="<?= $barista['email']; ?>" name="email" type="text" class="form-control" id="email" placeholder="Email">
							<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<img src="<?= base_url('assets/img/barista/') . $barista['gambar']; ?>" style="width:100px" class="img-thumbnail">

							<div class="custom-file">
								<input type="file" class="custom-file-input" name="gambar" id="gambar">
								<label for="gambar" class="custom-file-label">Choose File</label>
							</div>
						</div>
						<a href="<?= base_url('barista') ?>" class="btn btn-danger">Tutup</a>
						<button type="submit" name="tambah" class="btn btn-dark float-right">Ubah Barista</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
