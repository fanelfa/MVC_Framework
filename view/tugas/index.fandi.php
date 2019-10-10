<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Pengumpulan Tugas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="<?php self::asset('bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_URL.'view/asset/css/style.css' ?>">
</head>

<body>
<div id="pcoded" class="pcoded">
    <div class="pcoded-container navbar-wrapper"
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page body start -->
                                <div class="page-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                          <legend>Tampilan Tugas</legend>
                                                          <a href="<?php self::url('/tugas/showadd'); ?>" class="btn btn-success btn-sm">Tambah</a>
                                                    </div>
                                                    <div class="card-block">
                                                        <!-- tempat table -->
                                                        <table class="table table-hover">
                                                          <thead>
                                                            <tr>
                                                              <th scope="col">#</th>
                                                              <th scope="col">NIM</th>
                                                              <th scope="col">Nama</th>
                                                              <th scope="col">Judul</th>
                                                              <th scope="col">Jenis</th>
                                                              <th scope="col">Deskripsi</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            <?php                  
                                                            foreach ($data as $key => $value) {
                                                              echo '<tr>';
                                                                echo '<th scope="row">'.(intval($key)+1).'</th>';
                                                                echo '<td>'.$value['nim'].'</td>';
                                                                echo '<td>'.$value['nama'].'</td>';
                                                                echo '<td>'.$value['judul'].'</td>';
                                                                echo '<td>'.$value['jenis'].'</td>';
                                                                echo '<td>'.$value['deskripsi'].'</td>';
                                                              echo '</tr>';

                                                             } 
                                                            ?>
                                                          </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- Basic Form Inputs card end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Page body end -->
                        </div>
                    </div>
                    <!-- Main-body end -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>

<?php 
if(isset($_SESSION)){
  session_destroy(); 
}
?>
