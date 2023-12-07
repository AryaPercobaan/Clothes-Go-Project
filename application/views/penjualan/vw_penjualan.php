<div class="container-fluid">
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
        </div>
        <div class="float-right">
            <a href="<?= base_url('Penjualan/export') ?>" class="btn btn-danger text-white btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
        </div>
    </div>
    <div class="card shadow mb-4 bg-warning text-gray-100">
        <div class="card-body text-gray-100">
            <div class="table-responsive text-gray-100">
                <?= $this->session->flashdata('message'); ?>
                <table class="table table-bordered text-gray-100" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>No Pembelian</td>
                            <td>Tanggal</td>
                            <td>Customer</td>
                            <td>Total</td>
                            <td>Status</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($penjualan as $us) : ?>
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td><?= $us['no_penjualan']; ?></td>
                                <td><?= $us['tanggal']; ?></td>
                                <td><?= $us['nama']; ?></td>
                                <td><?= $us['total_bayar']; ?></td>
                                <td><?= $us['status']; ?></td>
                                <td>
                                    <a href="<?= base_url('Penjualan/detail/' . $us['no_penjualan']); ?>" class="btn btn-primary">Detail</a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>