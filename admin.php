<!-- panggil file header -->
<?php include"header.php";?>

<?php

// Uji jika tombol simpan jika diklik
if(isset($_POST[ 'babsen'])){
    $tgl = date('Y-m-d');

    //htmlspecialchars agar inputan lebih aman dari injection
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $absen = htmlspecialchars($_POST['absen'], ENT_QUOTES);
    $kelas = htmlspecialchars($_POST['kelas'], ENT_QUOTES);   

    //Persiapan query simpan data
    $simpan = mysqli_query($koneksi, "INSERT INTO ssiswa VALUES('','$tgl','$nama','$absen','$kelas')");

    // UJi jika simpan data sukses
    if($simpan){
        echo "<script>alert('Absen Berhasil, Terima Kasih..!');
        document.location='?'</script>";
    }else{
        echo "<script>alert('Absen gagal coba lagi..!');
        document.location='?'</script>";
    }
}

?>



<!-- Head -->
<div class="head text-center">
    <img src="assets/img/logo.png" width="100">
    <h2 class="text-white">Absensi Kelas XII</h2>
</div>
<!-- End Head -->

<!-- Awal Row -->
<div class="row mt-2">
    <!-- col-lg-7 -->
    <div class="col-lg-7 mb-3">
        <div class="card shadow bg-gradient-light">
            <!--card body-->
            <div class="card-body">

                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Identitas Siswa</h1>
                </div>
                <form class="user" method="POST" action="">
                    <div class="form-group">
                        <input type="text" class="form-control
                                    form-control-user" name="nama" placeholder="Nama Siswa" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control
                                    form-control-user" name="absen" placeholder="Absen Siswa" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control
                                    form-control-user" name="kelas" placeholder="Kelas Siswa" required>
                    </div>

                    <button type="sumbit" name="babsen" class="btn btn-primary btn-user btn-block"> Absen
                    </button>


                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="#">By : Bintang Rayhan | 2021 - <?= date('Y')?>
                    </a>
                </div>

            </div>
            <!-- end card body -->
        </div>
    </div>
    <!-- end col-lg-7 -->

    <!-- col-lg-5 -->
    <div class="col-lg-5 mb-3">
        <!-- card -->
        <div class="card shadow">
            <!--card body-->
            <div class="card-body">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Statistik Absensi Siswa</h1>
                </div>
                <?php
                    //deklarasi tanggal

                    //menampilkan tanggal sekarang
                    $tgl_sekarang = date('Y-m-d');

                    //menampilkan tgl kemarin
                    $kemarin = date('Y-m-d', strtotime('-1 day',strtotime(date('Y-m-d'))));

                    //mendapatkan 6 hari sebelum tgl skrng
                    $seminggu = date('Y-m-d h:i:s',strtotime('-1 week +1 day',strtotime($tgl_sekarang)));

                    $sekarang = date('Y-m-d h:i:s');

                   //persiapan query tampilkan data jumlah pengunjung
                   
                    $tgl_sekarang = mysqli_fetch_array(mysqli_query(
                       $koneksi, 
                       "SELECT count(*) FROM ssiswa where tanggal like '%$tgl_sekarang%'"
                    ));

                    $kemarin = mysqli_fetch_array(mysqli_query(
                       $koneksi, 
                       "SELECT count(*) FROM ssiswa where tanggal like '%$kemarin%'"
                    ));
                    
                     $seminggu = mysqli_fetch_array(mysqli_query(
                       $koneksi, 
                       "SELECT count(*) FROM ssiswa where tanggal BETWEEN '$seminggu' and
                       '$sekarang'"
                    ));
                    
                    $bulan_ini = date('m');   

                    $sebulan = mysqli_fetch_array(mysqli_query(
                       $koneksi, 
                       "SELECT count(*) FROM ssiswa where month(tanggal) = '$bulan_ini'"
                    ));

                    $keseluruhan = mysqli_fetch_array(mysqli_query(
                       $koneksi, 
                       "SELECT count(*) FROM ssiswa"
                    ));

                ?>
                <table class="table table-bordered">
                    <tr>
                        <td>Hari ini</td>
                        <td>: <?=  $tgl_sekarang[0] ?></td>
                    </tr>
                    <tr>
                        <td>Kemarin</td>
                        <td>: <?=  $kemarin[0] ?></td>
                    </tr>
                    <tr>
                        <td>Minggu ini</td>
                        <td>: <?=  $seminggu[0] ?></td>
                    </tr>
                    <tr>
                        <td>Bulan ini</td>
                        <td>: <?=  $sebulan[0] ?></td>
                    </tr>
                    <tr>
                        <td>Keseluruhan</td>
                        <td>: <?=  $keseluruhan[0] ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col-lg-5 -->

</div>
<!-- end row -->

<!-- card -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Absensi Hari ini [<?=date
        ('d-m-Y')?>]</h6>
    </div>
    <div class="card-body">
        <a href="rekapitulasi.php" class="btn btn-primary mb-3"><i class="fa
        fa-table"></i> Rekapitulasi Siswa </a>

        <a href="logout.php" class="btn btn-danger mb-3"><i class="fa
        fa-sign-out-alt"></i> Logout </a>


        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Absen</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tangal</th>
                        <th>Nama</th>
                        <th>Absen</th>
                        <th>Kelas</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        $tgl = date('Y-m-d'); //2021-12-28
                        $tampil = mysqli_query($koneksi, "SELECT * FROM ssiswa where tanggal like '%$tgl%'
                        order by id desc");
                        $no = 1;

                        while($data = mysqli_fetch_array($tampil)) { 
                    ?>
                    <tr>

                        <td><?= $no++ ?></td>
                        <td><?= $data['tanggal']?></td>
                        <td><?= $data['nama']?></td>
                        <td><?= $data['absen']?></td>
                        <td><?= $data['kelas']?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- panggil file footer -->
<?php include"footer.php";?>