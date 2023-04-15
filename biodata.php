<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Biodata Diri</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .card {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php 
        $nama = "Aldi Arya Winata";
        $tempat_lahir = "Kulon Progo, Yogyakarta";
        $tanggal_lahir = "14 Januari 2002";
        $jenis_kelamin = "Laki-laki";
        $alamat = "Citra Raya, Tangerang";
        $riwayat_pendidikan = array("SD Tarakanita", "SMP Tarakanita", "SMA Tarakanita", "Universitas Gunadarma");
        $hobby = "Design, Main Game";
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow border-0">
                    <div class="card-header text-center">
                        <h3>Biodata Diri</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="Asset/Aldi Pas Poto (2).png" alt="Foto" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <h4>Nama: <?php echo $nama; ?></h4>
                                <p>TTL: <?php echo $tempat_lahir.', '.$tanggal_lahir; ?></p>
                                <p>Jenis Kelamin: <?php echo $jenis_kelamin; ?></p>
                                <p>Alamat: <?php echo $alamat; ?></p>
                                <p>Riwayat Pendidikan:</p>
                                <ul>
                                    <?php foreach ($riwayat_pendidikan as $pendidikan) { ?>
                                        <li><?php echo $pendidikan; ?></li>
                                    <?php } ?>
                                </ul>
                                <p>Hobby: <?php echo $hobby; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
