<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Kerusakan</title>
</head>

<body>
    <center class="m-1" style="width:100%;margin:0 auto;text-align:center;">
        <!-- <h4>DINI CELL <br>
            SISTEM PAKAR MENDETEKSI KERUSAKAN HARDWARE PADA SMARTPHONE
        </h4>
        <h5 style="margin-top: -30 ;"> Jorong Balai Tangah Cupak, Kecamatan Gunung Talang, Kabupaten Solok, Sumatera Barat</h5> -->
        <h4>DINI CELL<br> <br>
            SISTEM PAKAR MENDETEKSI KERUSAKAN HARDWARE PADA SMARTPHONE</h4>
        <h5 style="margin-top: -15; margin-bottom: -40;"> Jorong Balai Tangah Cupak, Kecamatan Gunung Talang, Kabupaten Solok, Provinsi Sumatera Barat</h5>
    </center>
    <table border=" 1">
        <tr>
            <th style="width: 3%;  text-align: center;">No</th>
            <th style="width: 15%;  text-align: center;">Tanggal</th>
            <th style="width: 15%;  text-align: center;">Nama</th>
            <th style="width: 12%;  text-align: center;">Nomor Hp</th>
            <th style="width: 12%;  text-align: center;">Alamat</th>
            <th style="width: 10%;  text-align: center;">Nama Kerusakan</th>
            <th style="width: 8%; text-align: center;">Hasil Probabilitas</th>
            <th style="width: 25%; text-align: center;">Solusi</th>
        </tr>
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
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>