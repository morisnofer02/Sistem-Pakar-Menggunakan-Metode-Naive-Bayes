<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?>
        <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahKerusakan">Tambah Kerusakan</a>
    </h1>

    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <?= $this->session->flashdata('pesan'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $tabel; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive table-hover">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5%; text-align: center;">No</th>
                            <th style="width: 5%">Kode Kerusakan</th>
                            <th style="width: 15%">Nama Kerusakan</th>
                            <th style="width: 5%; text-align: center;">Probabilitas</th>
                            <th style="width: 10%; text-align: center;">Gambar</th>
                            <th style="width: 44%; text-align: center;">Solusi</th>
                            <th style="width: 16%; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tbl_kerusakan as $rusak) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $rusak['kode_kerusakan']; ?></td>
                                <td><?= $rusak['nama_kerusakan']; ?></td>
                                <td><?= $rusak['probabilitas']; ?></td>
                                <td><img src="<?= base_url('assets3/img/kerusakan/') . $rusak['gambar']; ?>" width="150"></td>
                                <td><?= $rusak['solusi']; ?></td>
                                <td>
                                    <a href="" class="btn btn-outline-warning" data-toggle="modal" data-target=".ubahKerusakan<?= $rusak['id_kerusakan']; ?>">Edit</a>
                                    <a href="<?= base_url('kerusakan/hapus/') . $rusak['id_kerusakan']; ?>" class="btn btn-outline-danger" onclick="return confirm('Anda Yakin Menghapus?');">Delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->