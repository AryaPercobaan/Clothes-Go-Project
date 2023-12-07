<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Ubah Data Shift

                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $shift['id']; ?>">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" name="type" value="<?= $shift['type']; ?>" class="form-control" id="type" placeholder="type">
                            <?= form_error('type', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <input type="text" name="salary" value="<?= $shift['salary']; ?>" class="form-control" id="salary" placeholder="type">
                            <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <a href="<?= base_url('Shift') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Edit Shift</button>

                    </form>
                </div>
            </div>
        </div>



        <!-- Page Heading -->

    </div>
    <!-- /.container-fluid -->

</div>