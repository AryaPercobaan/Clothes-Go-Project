<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-primary text-uppercase mb-1">Jumlah Baju</div>
                            <div class="h5 mb-0 font-weight-bold text-warning"><?= $baju ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-700"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-primary text-uppercase mb-1">Total Penjualan</div>
                            <div class="h5 mb-0 font-weight-bold text-warning"><?= $penjualan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-700"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-primary text-uppercase mb-1">Total Admin & Pelanggan</div>
                            <div class="h5 mb-0 font-weight-bold text-warning"><?= $us ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-700"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4 bg-warning">
        <div class="card-body">
            <div class="chart-bar">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>