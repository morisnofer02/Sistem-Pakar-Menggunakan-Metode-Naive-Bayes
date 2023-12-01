                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
                            </div>

                            <div class="row">

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        <a href="<?= base_url('gejala'); ?>" style="text-decoration: none;">
                                                            <h4>Gejala</h4>
                                                        </a>
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalGejala; ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-edit fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Annual) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        <a href="<?= base_url('kerusakan'); ?>" style="text-decoration: none;">
                                                            <h4>Kerusakan</h4>
                                                        </a>
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalKerusakan; ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-mobile-alt fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tasks Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="<?= base_url('aturan'); ?>" style="text-decoration: none;">
                                                            <h4>Aturan</h4>
                                                        </a>
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalAturan; ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-table fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pending Requests Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        <a href="<?= base_url('laporan'); ?>" style="text-decoration: none;">
                                                            <h4>Laporan</h4>
                                                        </a>
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalLaporan; ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>