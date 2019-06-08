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
    
textarea {
width: 300px;
height: 10em;
}
    
</style>
</head>
    
    <body class="text-center" style="background-color:powderblue;">
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark "> 
 <a class="navbar-brand" href="homeadmin.php">Beranda</a>		

	 	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       	<span class="navbar-toggler-icon"></span>
       	</button>
       		<div class="collapse navbar-collapse" id="navbarSupportedContent">
          		<ul class="navbar-nav mr-auto">
        
					
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Permohonan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                   <a class="dropdown-item" href="permohonanadmin.php">Proposal Perusahaan</a>
                   <a class="dropdown-item" href="pembatalanadmin.php">Proposal Pembatalan</a>
                </div>
             </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Input Data
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                   <a class="dropdown-item" href="inputdosen.php">Dosen</a>
                   <a class="dropdown-item" href="inputpersh.php">Perusahaan</a>
                   <a class="dropdown-item" href="inputkelpk.php">Kelompok</a>
                </div>
             </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Kelengkapan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                   <a class="dropdown-item" href="inputdosen.php">Logbook</a>
                   <a class="dropdown-item" href="inputpersh.php">Bimbingan</a>
                   <a class="dropdown-item" href="inputkelpk.php">Penilaian Dosen</a>
                   <a class="dropdown-item" href="daftrnlipers.php">Penilaian Perusahaan</a>    
                </div>
             </li>                 		  
             <li class="nav-item">
                 <a class="nav-link" href="showlaporan.php">Laporan</a>
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
<div class="container">
<form action="" method="POST" class="form-signin">
      <h1 class="h3 mb-3 font-weight-normal">Masukan Data Logbook</h1>
     
      <label for="inputuser" class="sr-only">NIK Dosen Pembimbing</label>
            <input type="text" id="tgl" class="form-control" placeholder="NIK Dosen Pembimbing" name="user" required="" autofocus="">
     <br>
      <label for="inputemail" class="sr-only">Kelompok yang dibimibng</label>
            <input type="text" id="kgt" class="form-control" placeholder="Nomor Kelompok yang dibimibing" name="klpk" required="" autofocus="">
     <br>
		<button class="btn btn-lg btn-danger btn-block" type="submit"  value="inputkelompok" name="submit" >Masukkan</button> 
    </form> 
</div>
        
<br>
<div class="container">
  <a class="btn btn-lg btn-primary btn-block" href="tabelkelpk.php" role="button">Daftar Kelompok Kerja Praktek</a>
</div>        
 
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
        
        
        <!-- EDIT DATABASE BUAT LOGBOOK-->                               
<?php 
if(isset($_POST["submit"])){  
    if(!empty($_POST['user']) && !empty($_POST['klpk'])){  
        $user       =   $_POST['user'];  
        $klpk       =   $_POST['klpk'];

        $con    =   mysqli_connect('localhost','root','') or die(mysqli_error()); 
                    mysqli_select_db($con, 'kp') or die("cannot select DB");  
        
     
        $sql    =   "INSERT INTO kelompok_kp(username,kelompok) VALUES('$user','$klpk')";  
        $result =   mysqli_query($con, $sql);

            
    } 
    else {  
        echo "Isi Semua Borang!";  
    }  
}  
?>
  </body>
</html>
<?php
       }?>

