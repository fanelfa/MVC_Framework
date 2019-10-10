<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Pengumpulan Tugas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="<?php self::asset('bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php self::asset('css/style.css') ?>">


    
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
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-horizontal" action="tambah" method="post" id="form-tugas">
                                                            <fieldset>

                                                            <!-- Form Name -->
                                                            <legend>Form Upload Tugas</legend>
                                                            <div class="row">
                                                                <div class="col">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                  <label class="col-md-4 control-label" for="nama">Nama</label>  
                                                                  <div class="col-md-12">
                                                                  <input id="nama" name="nama" type="text" placeholder="Input Nama" class="form-control input-md" required="">
                                                                    
                                                                  </div>
                                                                </div>
                                                                </div>
                                                                <div class="col">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                  <label class="col-md-4 control-label" for="nim">NIM</label>  
                                                                  <div class="col-md-12">
                                                                  <input id="nim" name="nim" type="text" placeholder="Input NIM" class="form-control input-md" required="">
                                                                    
                                                                  </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                            <!-- Text input-->
                                                            <div class="form-group">
                                                              <label class="col-md-4 control-label" for="judul">Judul Tugas</label>  
                                                              <div class="col-md-12">
                                                              <input id="judul" name="judul" type="text" placeholder="judul tugas" class="form-control input-md" required="">
                                                                
                                                              </div>
                                                            </div>
                                                            </div>
                                                            <div class="col">
                                                            <!-- Select Basic -->
                                                            <div class="form-group">
                                                              <label class="col-md-4 control-label" for="jenis">Jenis Tugas</label>
                                                              <div class="col-md-12">
                                                                <select id="jenis" name="jenis" class="form-control">
                                                                  <option value="tugas1">Tugas 1</option>
                                                                  <option value="tugas2">Tugas 2</option>
                                                                  <option value="tugas3">Tugas 3</option>
                                                                  <option value="uts">UTS</option>
                                                                  <option value="uas">UAS</option>
                                                                </select>
                                                              </div>
                                                            </div>
                                                            </div>
                                                            </div>

                                                            <!-- Textarea -->
                                                            <div class="form-group">
                                                              <label class="col-md-4 control-label" for="deskripsi">Deskripsi</label>
                                                              <div class="col-md-12">                     
                                                                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                                                              </div>
                                                            </div>

                                                            

                                                            <!-- Button -->
                                                            <div class="form-group">
                                                              <label class="col-md-4 control-label" for="submit"></label>
                                                              <div class="col-md-4">
                                                                <input type="submit" name="submit" id="btn-submit" class="btn btn-success">
                                                              </div>
                                                            </div>

                                                            </fieldset>
                                                            </form>

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

  <script type="text/javascript" src="<?php self::asset('jquery.min.js') ?>"></script>
  <script type="text/javascript" src="<?php self::asset('jquery_validate/jquery.validate.js') ?>"></script>
  <script type="text/javascript" src="<?php self::asset('jquery_validate/additional_methods.min.js') ?>"></script>
  <script type="text/javascript" src="<?php self::asset('cek_data_tugas.js') ?>"></script>
</body>

</html>

<?php 
if(isset($_SESSION)){
  session_destroy(); 
}
?>
