<!DOCTYPE html>

<?php
include "connection/koneksi.php";
session_start();
ob_start();

$id = $_SESSION['id_user'];

if(isset ($_SESSION['username'])){
  
  $query = "select * from tb_user natural join tb_level where id_user = $id";

  mysqli_query($conn, $query);
  $sql = mysqli_query($conn, $query);

  //Jumlah Administrator
  $query_jml_adm = "select count(*) AS jumlah_adm from tb_user natural join tb_level where id_level = 1 and status = 'aktif'";
  $sql_jml_adm = mysqli_query($conn, $query_jml_adm);
  $result_adm = mysqli_fetch_array($sql_jml_adm);

  //Jumlah Waiter
  $query_jml_wtr = "select count(*) AS jumlah_wtr from tb_user natural join tb_level where id_level = 2 and status = 'aktif'";
  $sql_jml_wtr = mysqli_query($conn, $query_jml_wtr);
  $result_wtr = mysqli_fetch_array($sql_jml_wtr);

  //Jumlah Kasir
  $query_jml_ksr = "select count(*) AS jumlah_ksr from tb_user natural join tb_level where id_level = 3 and status = 'aktif'";
  $sql_jml_ksr = mysqli_query($conn, $query_jml_ksr);
  $result_ksr = mysqli_fetch_array($sql_jml_ksr);

  //Jumlah Owner
  $query_jml_own = "select count(*) AS jumlah_own from tb_user natural join tb_level where id_level = 4 and status = 'aktif'";
  $sql_jml_own = mysqli_query($conn, $query_jml_own);
  $result_own = mysqli_fetch_array($sql_jml_own);

  //Jumlah Pelanggan
  $query_jml_plg = "select count(*) AS jumlah_plg from tb_user natural join tb_level where id_level = 5 and status = 'aktif'";
  $sql_jml_plg = mysqli_query($conn, $query_jml_plg);
  $result_plg = mysqli_fetch_array($sql_jml_plg);

  while($r = mysqli_fetch_array($sql)){
    
    $nama_user = $r['nama_user'];
    //$id_level = $r['id_level'];

?>

<html lang="en">
<head>
<title>Beranda</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="template/dashboard/css/bootstrap.min.css" />
<link rel="stylesheet" href="template/dashboard/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="template/dashboard/css/fullcalendar.css" />
<link rel="stylesheet" href="template/dashboard/css/matrix-style.css" />
<link rel="stylesheet" href="template/dashboard/css/matrix-media.css" />
<link href="template/dashboard/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="template/dashboard/css/jquery.gritter.css" />
<!-- font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500&family=Kablammo&family=Kalam&family=Patrick+Hand&family=Poppins&family=Signika:wght@500&family=Volkhov&family=Yeseva+One&display=swap" rel="stylesheet">

</head>
<body style="background-color: whitesmoke">

<!--Header-part-->
<div id="header">
  <a href="entri_referensi.php"> <img src="gambar/logoo.png" style="margin-top: 1.5rem; margin-left: 2rem;" alt=""> </a>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo $r['nama_user'];?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i><?php echo "&nbsp;&nbsp;".$r['nama_level'];?></a></li>
        <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>

    <?php
    if($r['id_level'] == 1){
  ?>
    <li class="active"><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
    <li> <a href="entri_referensi.php"><i class="icon icon-tasks"></i> <span>Entri Referensi</span></a> </li>
    <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Entri Order</span></a> </li>
    <li> <a href="entri_transaksi.php"><i class="icon icon-inbox"></i> <span>Entri Transaksi</span></a> </li>
    <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
    <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
  <?php
    } else if($r['id_level'] == 2){
  ?>
    <li class="active"><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
    <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Entri Order</span></a> </li>
    <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
    <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
  <?php
    } else if($r['id_level'] == 3){
  ?>
    <li class="active"><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
    <li> <a href="entri_transaksi.php"><i class="icon icon-inbox"></i> <span>Entri Transaksi</span></a> </li>
    <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
    <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
  <?php
    } else if($r['id_level'] == 4){
  ?>
    <li class="active"><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
    <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
    <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
  <?php
    } else if($r['id_level'] == 5){
  ?>
    <li class="active"><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
    <li> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Entri Order</span></a> </li>
    
  <?php
    }
  ?>

  </ul>
</div>


  
<!--Action boxes-->
  
    <div class="row-fluid">
    <?php
      if($r['id_level'] == 1 || $r['id_level'] == 2 || $r['id_level'] == 3){
    ?>
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>Data Pengguna</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span3">
              <div class="widget-box">
                <div class="widget-content nopadding">
                  <ul class="site-stats quick-actions">
                    <li class="bg_lb"><i class="icon-user"></i> <strong><?php echo $result_adm['jumlah_adm']; ?></strong> <small>Administrator</small></li>
                    <li class="bg_ly"><i class="icon-user"></i> <strong><?php echo $result_wtr['jumlah_wtr']; ?></strong> <small>Total Waiter</small></li>
                    <li class="bg_lg"><i class="icon-user"></i> <strong><?php echo $result_ksr['jumlah_ksr']; ?></strong> <small>Total Kasir</small></li>
                    <li class="bg_ls"><i class="icon-user"></i> <strong><?php echo $result_own['jumlah_own']; ?></strong> <small>Total Owner</small></li>
                    <li class="bg_lo"><i class="icon-user"></i> <strong><?php echo $result_plg['jumlah_plg']; ?></strong> <small>Total Pelanggan</small></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="span9">

              <!--DATA WAITER-->
              <div class="widget-box">
                <?php
                  $query_data_wtr = "select * from tb_user where id_level = 2";
                  $sql_data_wtr = mysqli_query($conn, $query_data_wtr);
                  $no = 1;
                ?>

                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                  <h5>Data Waiter</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered" style="width: 100%">
                    <thead>
                      <tr>
                        <th style="width:5%">No.</th>
                        <th style="width:25%">Nama</th>
                        <th style="width:30%">Username</th>
                        <th style="width:20%">Status</th>
                        <th style="width:20%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        while($r_dt_wtr = mysqli_fetch_array($sql_data_wtr)){
                      ?>
                        <tr class="odd gradeX">
                          <td><center><?php echo $no++; ?>.</center></td>
                          <td><?php echo $r_dt_wtr['nama_user']; ?></td>
                          <td><?php echo $r_dt_wtr['username']; ?></td>
                          <td><?php echo $r_dt_wtr['status']; ?></td>
                          <td>
                            <form action="" method="post">
                            <?php 
                              if($r_dt_wtr['status'] == 'aktif'){
                            ?>
                                <button name="unvalidasi" value="<?php echo $r_dt_wtr['id_user']; ?>" class="btn btn-warning btn-mini">
                                  <i class='icon icon-remove'></i>
                                </button>
                            <?php 
                              }
                            ?>

                            <?php 
                              if($r_dt_wtr['status'] == 'nonaktif'){
                            ?>
                                <button name="validasi" value="<?php echo $r_dt_wtr['id_user']; ?>" class="btn btn-info btn-mini"><i class='icon icon-ok'></i></button>
                                <button name="hapus_user" value="<?php echo $r_dt_wtr['id_user']; ?>" class="btn btn-danger btn-mini"><i class='icon icon-trash'></i></button>
                            <?php 
                              }
                            ?>
                            </form>
                          </td>
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <!--DATA KASIR-->
              <div class="widget-box">
                <?php
                  $query_data_ksr = "select * from tb_user where id_level = 3";
                  $sql_data_ksr = mysqli_query($conn, $query_data_ksr);
                  $no_ksr = 1;
                ?>

                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                  <h5>Data Kasir</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered table-striped " style="width: 100%">
                    <thead>
                      <tr>
                        <th style="width:5%">No.</th>
                        <th style="width:25%">Nama</th>
                        <th style="width:30%">Username</th>
                        <th style="width:20%">Status</th>
                        <th style="width:20%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        while($r_dt_ksr = mysqli_fetch_array($sql_data_ksr)){
                      ?>
                        <tr class="odd gradeX">
                          <td><center><?php echo $no_ksr++; ?>.</center></td>
                          <td><?php echo $r_dt_ksr['nama_user']; ?></td>
                          <td><?php echo $r_dt_ksr['username']; ?></td>
                          <td><?php echo $r_dt_ksr['status']; ?></td>
                          <td>
                            <form action="" method="post">
                            <?php 
                              if($r_dt_ksr['status'] == 'aktif'){
                            ?>
                                <button name="unvalidasi" value="<?php echo $r_dt_ksr['id_user']; ?>" class="btn btn-warning btn-mini">
                                  <i class='icon icon-remove'></i>
                                </button>
                            <?php 
                              }
                            ?>

                            <?php 
                              if($r_dt_ksr['status'] == 'nonaktif'){
                            ?>
                                <button name="validasi" value="<?php echo $r_dt_ksr['id_user']; ?>" class="btn btn-info btn-mini"><i class='icon icon-ok'></i></button>
                                <button name="hapus_user" value="<?php echo $r_dt_ksr['id_user']; ?>" class="btn btn-danger btn-mini"><i class='icon icon-trash'></i></button>
                            <?php 
                              }
                            ?>
                            </form>
                          </td>
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <!--DATA OWNER-->
              <div class="widget-box">
                <?php
                  $query_data_own = "select * from tb_user where id_level = 4";
                  $sql_data_own = mysqli_query($conn, $query_data_own);
                  $no_own = 1;
                ?>

                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                  <h5>Data Owner</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered table-striped" style="width: 100%">
                    <thead>
                      <tr>
                        <th style="width:5%">No.</th>
                        <th style="width:25%">Nama</th>
                        <th style="width:30%">Username</th>
                        <th style="width:20%">Status</th>
                        <th style="width:20%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        while($r_dt_own = mysqli_fetch_array($sql_data_own)){
                      ?>
                        <tr class="odd gradeX">
                          <td><center><?php echo $no_own++; ?>.</center></td>
                          <td><?php echo $r_dt_own['nama_user']; ?></td>
                          <td><?php echo $r_dt_own['username']; ?></td>
                          <td><?php echo $r_dt_own['status']; ?></td>
                          <td>
                            <form action="" method="post">
                            <?php 
                              if($r_dt_own['status'] == 'aktif'){
                            ?>
                                <button name="unvalidasi" value="<?php echo $r_dt_own['id_user']; ?>" class="btn btn-warning btn-mini">
                                  <i class='icon icon-remove'></i>
                                </button>
                            <?php 
                              }
                            ?>

                            <?php 
                              if($r_dt_own['status'] == 'nonaktif'){
                            ?>
                                <button name="validasi" value="<?php echo $r_dt_own['id_user']; ?>" class="btn btn-info btn-mini"><i class='icon icon-ok'></i></button>
                                <button name="hapus_user" value="<?php echo $r_dt_own['id_user']; ?>" class="btn btn-danger btn-mini"><i class='icon icon-trash'></i></button>
                            <?php 
                              }
                            ?>
                            </form>
                          </td>
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <!--DATA PELANGGAN-->
              <div class="widget-box">
                <?php
                  $query_data_plg = "select * from tb_user where id_level = 5";
                  $sql_data_plg = mysqli_query($conn, $query_data_plg);
                  $no_plg = 1;
                ?>

                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                  <h5>Data Pelanggan</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered table-striped" style="width: 100%">
                    <thead>
                      <tr>
                        <th style="width:5%">No.</th>
                        <th style="width:25%">Nama</th>
                        <th style="width:30%">Username</th>
                        <th style="width:20%">Status</th>
                        <th style="width:20%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        while($r_dt_plg = mysqli_fetch_array($sql_data_plg)){
                      ?>
                        <tr class="odd gradeX">
                          <td><center><?php echo $no_plg++; ?>.</center></td>
                          <td><?php echo $r_dt_plg['nama_user']; ?></td>
                          <td><?php echo $r_dt_plg['username']; ?></td>
                          <td><?php echo $r_dt_plg['status']; ?></td>
                          <td>
                            <form action="" method="post">
                            <?php 
                              if($r_dt_plg['status'] == 'aktif'){
                            ?>
                                <button name="unvalidasi" value="<?php echo $r_dt_plg['id_user']; ?>" class="btn btn-warning btn-mini">
                                  <i class='icon icon-remove'></i>
                                </button>
                            <?php 
                              }
                            ?>

                            <?php 
                              if($r_dt_plg['status'] == 'nonaktif'){
                            ?>
                                <button name="validasi" value="<?php echo $r_dt_plg['id_user']; ?>" class="btn btn-info btn-mini"><i class='icon icon-ok'></i></button>
                                <button name="hapus_user" value="<?php echo $r_dt_plg['id_user']; ?>" class="btn btn-danger btn-mini"><i class='icon icon-trash'></i></button>
                            <?php 
                              }
                            ?>
                            </form>
                          </td>
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                <?php
                  if(isset($_POST['hapus_user'])){
                    $id_user = $_POST['hapus_user'];
                    //echo $id_user;
                    $query_hapus_user = "delete from tb_user where id_user = $id_user";
                    $sql_hapus_user = mysqli_query($conn, $query_hapus_user);
                    if($sql_hapus_user){
                      header('location: beranda.php');
                      //$_SESSION['daftar'] = 'sukses';
                    }
                  }

                  if(isset($_POST['validasi'])){
                    $id_user = $_POST['validasi'];
                    //echo $id_user;
                    $query_validasi = "update tb_user set status = 'aktif' where id_user = $id_user";
                    $sql_validasi = mysqli_query($conn, $query_validasi);
                    if($sql_validasi){
                      header('location: beranda.php');
                      //$_SESSION['daftar'] = 'sukses';
                    }
                  }

                  if(isset($_POST['unvalidasi'])){
                    $id_user = $_POST['unvalidasi'];
                    //echo $id_user;
                    $query_unvalidasi = "update tb_user set status = 'nonaktif' where id_user = $id_user";
                    $sql_unvalidasi = mysqli_query($conn, $query_unvalidasi);
                    if($sql_unvalidasi){
                      header('location: beranda.php');
                      //$_SESSION['daftar'] = 'sukses';
                    }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        } else {
      ?>
      
     
  

  
      <!-- Content halaman user -->
        <img src="gambar/src/22.jpg" alt="">
            <div class="container-fluid" style="margin-top: 5rem; margin-bottom: 1rem; font-family: 'Kablammo', cursive;">
              <h2 class="text-center">SPACES</h2>
              <h5 class="text-center" style="margin-bottom: 2rem;"> Indoor, Outdoor, Meeting Room, Rooftop</h5>
                <div class="row-fluid">
                  <div class="span3">
                    <img class="img-fluid" src="gambar/src/p1.jpg" alt="..." style="border-radius: 10px; margin-bottom: 2rem;"/>
                  </div>
                  <div class="span3">
                    <img class="img-fluid" src="gambar/src/p2.jpg" alt="..." style="border-radius: 10px; margin-bottom: 2rem;"/>
                  </div>
                  <div class="span3">
                    <img class="img-fluid" src="gambar/src/p3.jpg" alt="..." style="border-radius: 10px; margin-bottom: 2rem;"/>
                  </div>
                  <div class="span3">
                    <img class="img-fluid" src="gambar/src/p4.jpg" alt="..." style="border-radius: 10px; margin-bottom: 2rem;"/>
                  </div>
                </div>
            </div>

          <!-- live music -->
            <div class="container-fluid" style="margin-bottom: 4rem; font-family: 'Kablammo', cursive;">
              <h2 class="text-center" >LIVE MUSIC</h2>
              <h5 class="text-center" style="margin-bottom: 2rem;"> Live Music Senin & Kamis 20:00 - 22:00</h5>
                <div class="row-fluid">
                  <div class="span4">
                    <img class="img-fluid" src="gambar/src/e1.jpg" alt="..." style="border-radius: 10px; margin-bottom: 4px;"/>
                  </div>
                  <div class="span4">
                    <img class="img-fluid" src="gambar/src/e5.jpg" alt="..." style="border-radius: 10px; margin-bottom: 4px;"/>
                  </div>
                  <div class="span4">
                    <img class="img-fluid" src="gambar/src/e7.jpg" alt="..." style="border-radius: 10px; margin-bottom: 4px;"/>
                  </div>
                </div>
            </div>

            <!-- creative community -->
            <div class="container-fluid" style="margin-bottom: 4rem; font-family: 'Heebo', sans-serif;">
              <h2 class="text-center" style="font-family: 'Kablammo', cursive;">CREATIVE COMMUNITY</h2>
              <h5 class="text-center" style="margin-bottom: 2rem; font-family: 'Kablammo', cursive;"> Komunitas Kreatif & Seniman</h5>

                <div class="row-fluid" style="margin-bottom: 4rem;">
                  <div class="span6">
                    <img class="img-fluid" src="gambar/src/c2.png" alt="..." style="border-radius: 10px;"/>
                  </div>
                  <div class="span6" style="text-align: justify;">
                    <h5>Seni Lintas Dimensi Pseudo Retrograde (2022)</h5>
                    <p>Seni sejati tercermin seperti Pseudo Retrograde, seolah bergerak mundur namun sebenarnya maju dan selalu dinamis. “Seni Lintas Dimensi” merupakan karya kontemporer yang menyatu dengan tradisi, bertujuan untuk mengajak penonton melihat sejarah atau peradaban Banyumas yang dinamis dan terus berkembang, tanpa menghilangkan kekuatan budaya yang ada. Kesenian dan tradisi di zaman modern ini masih bisa eksis karena seni lahir dari masyarakat. Ebeg dan Lengger, sebagai bagian dari kesenian rakyat, mengingatkan dan mengungkapkan rasa terima kasih kepada sang pencipta. Dibalut unsur wuru dan mistis, Ebeg dan Lengger membawa era modern ke dalam bayang-bayang Pseudo Retrograde. Seni yang seolah bergerak mundur, pada kenyataannya terus bergerak dinamis menuju kemajuan.</p>
                  </div>
                </div>
                

                <div class="row-fluid" style="margin-bottom: 4rem;">
                <div class="span6" style="text-align: justify;">
                    <h5>Thraft and Thrift (2022)</h5>
                    <p>Remac Shoes, toko sepatu di Kafe kami, sedang merayakan ulang tahun pertama dan meluncurkan logo barunya. Sebagai bagian dari komitmennya untuk memberikan pengalaman berbelanja sepatu yang lebih baik dan menyenangkan, Remac Shoes memperbarui situs webnya untuk menampilkan semua konten dan produknya secara kohesif dan efisien. Situs web baru ini akan mencerminkan dedikasi Remac Shoes terhadap keunggulan dalam desain dan kualitas sepatu, menyediakan platform bagi pelanggan untuk menelusuri dan membeli gaya favorit mereka dengan mudah. Saat kami merayakan tonggak sejarah ini dengan Remac Shoes, kami mengundang komunitas lokal untuk merasakan pengalaman terbaru dalam mode dan teknologi sepatu. Baik Anda seorang sneakerhead, fashionista, atau sekadar mencari alas kaki yang nyaman dan tahan lama, Remac Shoes memiliki sesuatu untuk Anda. </p>
                  </div>
                <div class="span6">
                    <img class="img-fluid" src="gambar/src/c4.png" alt="..." style="border-radius: 10px; width:"/>
                  </div>
                </div>


                <div class="row-fluid" style="margin-bottom: 4rem;">
                  <div class="span6">
                    <img class="img-fluid" src="gambar/src/c3.png" alt="..." style="border-radius: 10px; width:"/>
                  </div>
                  <div class="span6" style="text-align: justify;">
                    <h5>Thraft and Thrift (2022)</h5>
                    <p>Isu fast-fashion telah menjadi peringatan bagi kita semua. Dan itu membuat 3 desainer berbakat ini, Gilang, Rini dan Yasnia muncul dengan langkah kecil untuk mendaur ulang limbah fesyen menjadi pakaian yang bagus. Kampanye telah dimulai karena pelanggan yang membawa pakaian bekas mereka dapat menukarnya dengan es kopi. Dan semua kain yang dirancang telah dipamerkan saat acara akbar dimulai.</p>
                  </div>
                </div>

                
            
              </div>
          

      <?php
        }
      ?>
   
  
  </div>
<!--End-Action boxes-->    

<!--Footer-part-->

<div class="row-fluid" style="background-color: #212529;">
  <div id="footer" class="span12"> &copy; <?php echo date('Y'); ?>  Alashouse All right reserved.</div>
</div>

<!--end-Footer-part-->

<script src="template/dashboard/js/excanvas.min.js"></script> 
<script src="template/dashboard/js/jquery.min.js"></script> 
<script src="template/dashboard/js/jquery.ui.custom.js"></script> 
<script src="template/dashboard/js/bootstrap.min.js"></script> 
<script src="template/dashboard/js/jquery.flot.min.js"></script> 
<script src="template/dashboard/js/jquery.flot.resize.min.js"></script> 
<script src="template/dashboard/js/jquery.peity.min.js"></script> 
<script src="template/dashboard/js/fullcalendar.min.js"></script> 
<script src="template/dashboard/js/matrix.js"></script> 
<script src="template/dashboard/js/matrix.dashboard.js"></script> 
<script src="template/dashboard/js/jquery.gritter.min.js"></script> 
<script src="template/dashboard/js/matrix.interface.js"></script> 
<script src="template/dashboard/js/matrix.chat.js"></script> 
<script src="template/dashboard/js/jquery.validate.js"></script> 
<script src="template/dashboard/js/matrix.form_validation.js"></script> 
<script src="template/dashboard/js/jquery.wizard.js"></script> 
<script src="template/dashboard/js/jquery.uniform.js"></script> 
<script src="template/dashboard/js/select2.min.js"></script> 
<script src="template/dashboard/js/matrix.popover.js"></script> 
<script src="template/dashboard/js/jquery.dataTables.min.js"></script> 
<script src="template/dashboard/js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
<?php
  }
} else {
  header('location: logout.php');
}
ob_flush();
?>