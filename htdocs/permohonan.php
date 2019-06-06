<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
} else { 
?>  
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Kerja Praktek TM</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap-4.0.0.css" rel="stylesheet">
<style type="text/css">
div.form-group {
  text-align: center;
}
    
#customBtn {
			  display: inline-block;
			  background: white;
			  color: #444;
			  width: 170px;
			  border-radius: 3px;
			  border: thin solid #888;
			  box-shadow: 1px 1px 1px grey;
			  white-space: nowrap;
			}	
			#customBtn:hover {
                cursor: pointer;}   
</style>
</head>

    <body class="text-center" style="background-color:white;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
                <a class="navbar-brand" href="home.php">Beranda</a>		

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">

                             <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Panduan</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="DP_B2.docx">Kelompok Kerja Praktek</a>
                                        <a class="dropdown-item" href="Panduan.pdf" target="_blank">Buku Panduan</a>
                                        <a class="dropdown-item" href="Template.zip">Format Laporan</a>
                                        <a class="dropdown-item" href="DP_B1.docx">Daftar Perusahaan</a>
                                     </div>
                             </li>

                             <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Permohonan</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                   <a class="dropdown-item" href="permohonan.php">Proposal Perusahaan</a>
                                   <a class="dropdown-item" href="pembatalan.php">Proposal Pembatalan</a>
                                </div>
                             </li>

                             <li class="nav-item">
                                <a class="nav-link" href="logbookmhs.php">Logbook</a>
                             </li>              

                             <li class="nav-item">
                                <a class="nav-link disabled" href="#">Laporan</a>
                             </li>

                             <li class="nav-item">
                                <a class="nav-link disabled" href="#">Pengumuman</a>
                             </li>                   

                        </ul>

                    </div>
                    <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">

                                <ul class="navbar-nav">
                                     <li class="nav-item">
                                         <font color="darkgray"> <?=$_SESSION['sess_user'];?> </font>
                                     </li>
                                </ul>

                                <ul class="navbar-nav">
                                     <li class="nav-item">
                                         <a class="nav-link" href="logout.php" style="color: #ffffff">Keluar</a> 
                                     </li>
                                </ul>
                    </div>
        </nav>
      
      
<br>
<br>
		
 
  <form action="" method="POST" class="form-signin">
      <h2 align="center">Proposal Permohonan Perusahaan</h2> 
    <div class="form-signin mx-sm-5 mb-2">
      <label for="inputnama">Nama Mahasiswa</label><br>
      <input type="text" class="col-4" id="namamhs" placeholder="Satria William" name="namamhsdb">
    </div>
      
    <div class="form-signin mx-sm-5 mb-2">
      <label for="inputnpm">NPM Mahasiswa</label><br>
      <input type="text" class="col-4" id="npmmhs" placeholder="2015630002" name="npmmhsdb">
    </div>
      
    <div class="form-signin mx-sm-5 mb-2">
      <label for="inputnpm">Nama Kelompok</label><br>
      <input type="text" class="col-4" id="namaklp" placeholder="Bunga" name="namaklp">
    </div>  
      
    <div class="form-signin mx-sm-5 mb-2">
      <label for="inputperus">Nama Perusahaan</label><br>
      <input type="text" class="col-4" id="perush" placeholder="AeroTerraScan" name="perushdb">
    </div>
  
  <br>
  <button type="submit" class="btn">Submit</button> 
	
</form> 
   
 
    <div class="container">

    
       <hr>
        <div class="row">
          <div class="text-center col-lg-6 offset-lg-3">
			  <br>
              
             <p>Universitas Katolik Parahyangan</p>
			 <p>Copyright &copy; 2019</p>
          </div>
       </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.2.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.0.0.js"></script>
                                       
<?php  
if(isset($_POST["submit"])){    
if(!empty($_POST['namamhsdb']) && !empty($_POST['npmmhsdb']) && !empty($_POST['perushdb'])) {  
    $namamhsdb=$_POST['namamhsdb']; 
    $npmmhsdb=$_POST['npmmhsdb']; 
    $perushdb=$_POST['perushdb'];
    
  
    $con=mysqli_connect('localhost','root','') or die(mysqli_error());  
    mysqli_select_db($con, 'permohonan') or die("cannot select DB");  
  
    $query=mysqli_query($con, "SELECT * FROM permohonan WHERE namamhs='".$namamhsdb."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    $sql="INSERT INTO permohonan(namamhs,npmmhs,perush) VALUES('$namamhsdb','$npmmhsdb','$perushdb')";    
  
    $result=mysqli_query($con, $sql);  
        if($result){  
    header("Location: permohonan.php");   
    } else {  
    echo "Failure!";  
    }  
  
    } else {  
    echo "Nama Anda Sudah masuk kedalam permohonan";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}      
?>    
  </body>
</html>
<?php
       }?>