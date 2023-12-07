<div class="container-fluid">
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">
            <?= $this->session->flashdata('message'); ?>
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>No Pembelian</td>
                        <td>Tanggal</td>
                        <td>Total</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pembelian as $us) : ?>
                        <tr>
                            <td><?= $i; ?>.</td>
                            <td><?= $us['no_penjualan']; ?></td>
                            <td><?= $us['tanggal']; ?></td>
                            <td><?= $us['total_bayar']; ?></td>
                            <td><?= $us['status']; ?></td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
        </div>
        <form action="" method="POST">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>No Pembelian</td>
                            <td>Baju</td>
                            <td>Jumlah</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detailbeli as $us) : ?>
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td><?= $us['no_penjualan']; ?></td>
                                <td><?= $us['nama_baju']; ?></td>
                                <td><?= $us['jumlah']; ?></td>
                                <td><?= $us['total']; ?></td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <input type="hidden" name="no_penjualan" value="<?= $us['no_penjualan']; ?>">
                <table class="table">
                    <tr>
                        <td>Apakah pesanan sudah anda terima ?</td>
                        <td>
                            <select name="status" id="status" class="form-control">
                                <option value="">Pilih Status</option>
                                <option value="Diterima">Sudah</option>
                                <option value="Gagal">Belum</option>
                            </select>
                            <?= form_error('status', '<small class="text-danger pi-3>', '</small>'); ?>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Ubah Status</button>
                            <a href="<?= base_url('Profil/pembelian') ?>" class="btn btn-secondary">
                                <i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>