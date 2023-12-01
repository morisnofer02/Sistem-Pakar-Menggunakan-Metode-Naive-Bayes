<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Gejala</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Kode Gejala</th>
            <th>Nama Gejala</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($gejala as $gjl) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $gjl['kode_gejala']; ?></td>
                <td><?= $gjl['nama_gejala']; ?></td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>