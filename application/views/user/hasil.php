<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <div class="container">
                        <a class="navbar-brand font-weight-bold" href="#">DiniCell</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link mr-5" href="<?= base_url('home_user') ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mr-5" href="<?= base_url('user/hasil_diagnosa'); ?>">Hasil Diagnosa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('user/diagnosa'); ?>">Kembali</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="container mt-4">
            <center>
                <h3 class="font-weight-bold">Hasil Perhitungan dengan metode Naive Bayes</h3>
            </center>
        </div>

        <div class="container mt-4">
            <h5 class="mb-3">Biodata Pendiagnosa</h5>
            <table>
                <tr>
                    <td>Nama</td>
                    <td> : </td>
                    <td> <?= $nama_pendiagnosa; ?></td>
                </tr>
                <tr>
                    <td>Nomor Handphone</td>
                    <td> : </td>
                    <td> <?= $no_hp; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> : </td>
                    <td> <?= $alamat; ?></td>
                </tr>
            </table>
        </div>

        <div class="container mt-4">
            <h5 class="">Perhitungan dengan metode Naive Bayes</h5>
        </div>

        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Kerusakan</th>
                        <th scope="col">Nama Kerusakan</th>
                        <th scope="col">Nilai Probabilitas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($getAllKerusakan != null) : ?>
                        <?php foreach ($getAllKerusakan as $key => $item) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $item['kode_kerusakan']; ?></td>
                                <td><?= $item['nama_kerusakan']; ?></td>
                                <td><?= $item['nilai_probabilitas']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <br>
            <h5 class="font-weight-bold">Berdasarkan Gejala - Gejala yang dipilih, maka handphone anda menggalami : </h5>
            <br>
            <?php if ($getHasilKerusakan != null) : ?>

                <h3 class="font-weight-bold">Rusak pada <?= $getHasilKerusakan['nama_kerusakan'] ?>
                </h3> <br>

                <img class="img-thumbnail" src="<?= base_url('assets3/img/kerusakan/') . $getHasilKerusakan['gambar'] ?>" width="400"><br>

                <br>
                <h4 class="font-weight-bold">Solusi </h4>
                <p><?= $getHasilKerusakan['solusi'] ?></p>

            <?php endif; ?>
        </div>
    </div>
    </div>