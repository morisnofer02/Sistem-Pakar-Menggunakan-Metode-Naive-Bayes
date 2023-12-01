<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 mt-4 text-gray-800"><?= $judul; ?>
        <a href="<?= base_url('home_user') ?>" class="btn btn-sm btn-secondary btn-icon-split float-right">
            <span class="icon">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">
                Back
            </span>
        </a>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="font-weight-bold text-primary float-left">Data Hasil Diagnosa</h5>
            <!-- <center>
                <a class="btn btn-info mr-5" href="<?= base_url('laporan/printlaporan'); ?>"><i class="fa fa-print"></i>Print</a>
            </center> -->
        </div>
        <div class="card-body">
            <div class="table-responsive table-hover">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 3%;  text-align: center;">No</th>
                            <th style="width: 10%;  text-align: center;">Tanggal</th>
                            <th style="width: 15%;  text-align: center;">Nama</th>
                            <th style="width: 10%;  text-align: center;">Nomor Hp</th>
                            <th style="width: 12%;  text-align: center;">Alamat</th>
                            <th style="width: 10%;  text-align: center;">Nama Kerusakan</th>
                            <th style="width: 10%; text-align: center;">Hasil Probabilitas</th>
                            <th style="width: 30%; text-align: center;">Solusi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($laporan as $l) : ?>
                            <tr>
                                <td style="text-align: center;"><?= $i; ?></td>
                                <td><?= date('d F Y', $l['waktu']); ?></td>
                                <td><?= $l['nama']; ?></td>
                                <td><?= $l['nomor_hp']; ?></td>
                                <td><?= $l['alamat']; ?></td>
                                <td><?= $l['nama_kerusakan']; ?></td>
                                <td><?= $l['hasil_probabilitas']; ?></td>
                                <td><?= $l['solusi']; ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->