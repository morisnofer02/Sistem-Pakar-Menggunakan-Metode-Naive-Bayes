<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?>
        <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahAturan">Tambah Aturan</a>
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
                            <th style="width: 3px; text-align: center;">No</th>
                            <th style="text-align: center;">Nama Kerusakan</th>
                            <th style="text-align: center;">Nama Gejala</th>
                            <th style="text-align: center;">Probabilitas</th>
                            <th style="width: 115px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($aturan as $A) : ?>
                            <tr>
                                <td style="text-align: center"><?= $i; ?></td>
                                <td><?= $A['kode_kerusakan']; ?> - <?= $A['nama_kerusakan']; ?></td>
                                <td><?= $A['kode_gejala']; ?> - <?= $A['nama_gejala']; ?></td>
                                <td><?= $A['probabilitas']; ?></td>
                                <td>
                                    <a href="" class="btn btn-outline-warning" data-toggle="modal" data-target=".ubahAturan<?= $A['id']; ?>">Edit</a>
                                    <a href="<?= base_url('aturan/hapus/') . $A['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Anda Yakin Menghapus?');">Delete</a>
                                </td>
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