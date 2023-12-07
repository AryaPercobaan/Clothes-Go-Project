<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
	<div class="row">
		<div class="col-md-12">
			<?= $this->session->flashdata('message');
			?>
		</div>
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<td>Tanggal</td>
						<td>Nama Baju</td>
						<td>Harga</td>
						<td>Jumlah</td>
						<td>Sub Total</td>
						<td>Aksi</td>
					</tr>
				</thead>
				<tbody>
					<form action="<?= base_url('Profil/pesanan'); ?>" method="POST" enctype="multipart/form-data">
						<?php
						function rupiah($angka)
						{
							$hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
							return $hasil_rupiah;
						}
						$i = 1;
						$total_bayar = 0;
						$total_p = 0; ?>
						<?php foreach ($keranjang as $us) :
							$total_bayar += $us['total'];
						?>
							<tr>
								<td><?= $us['tanggal']; ?></td>
								<td><?= $us['nama']; ?></td>
								<td><?= $us['harga']; ?></td>
								<td><?= $us['jumlah']; ?></td>
								<td><?= $us['total']; ?></td>
								<td><a href="<?= base_url('profil/delkeranjang/') . $us['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></a></td>
							</tr>
							<input type="hidden" name="baju[]" value="<?= $us['id_baju']; ?>">
							<input type="hidden" name="tanggal" value="<?= date('d/m/Y') ?>">
							<input type="hidden" name="harga" value="<?= $us['harga']; ?>">
							<input type="hidden" name="jumlah_p[]" value="<?= $us['jumlah']; ?>">
							<input type="hidden" name="total_p[]" value="<?= $us['total']; ?>">
							<?php $i++; ?>
						<?php endforeach; ?>
						<tr>
							<td>Alamat Pengiriman</td>
							<td colspan="5"><input name="alamat" type="text" class="form-control" id="alamat"></td>
						</tr>
						<tr>
							<td>Pembayaran</td>
							<td colspan="5">
								<select name="pembayaran" id="pembayaran" class="form-control">
									<option value="">Pilih Bank</option>
									<option value="BARISTA PAY">ADMIN PAY - 081211111111</option>
									<option value="COD">COD - 081222222222</option>
									<option value="GOPAY">GOPAY - 081233333333</option>
									<option value="DANA">DANA - 081234444444</option>
									<option value="OVO">OVO - 081234555555</option>
									<option value="RIAU">RIAU - 1111-1111-1111-1111</option>
									<option value="BRI">BRI - 2222-2222-2222-2222</option>
									<option value="BNI">BNI - 3333-3333-3333-3333</option>
									<option value="BCA">BCA - 4444-4444-4444-4444</option>
									<option value="MANDIRI">MANDIRI - 5555-5555-5555</option>
									<option value="MUAMALAT">MUAMALAT - 6666-6666-6666-6666</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Bukti Transfer</td>
							<td colspan="5">
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="gambar" id="gambar">
									<label for="gambar" class="custom-file-label">Choose File</label>
								</div>
							</td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td colspan="5"><input name="keterangan" type="text" class="form-control" id="keterangan"></td>
						</tr>
						<tr>
							<td colspan="4" align="right"><strong>Total : </strong></td>
							<td><?= rupiah($total_bayar); ?></td>
							<td>
								<input type="hidden" name="no_penjualan" value="PJ<?= time() ?>" readonly class="form-control">
								<input type="hidden" name="bayar" value="<?= $total_bayar; ?>">
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Order Baju</button>
								<a href="<?= base_url('Profil/baju') ?>" class="btn btn-secondary">
									<i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali
								</a>
							</td>
						</tr>
					</form>
				</tbody>

			</table>
		</div>
	</div>
</div>
