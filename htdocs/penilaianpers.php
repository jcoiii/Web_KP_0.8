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
		<meta name="google-signin-client_id" content="873471051525-44jnradjc9frd5s13f52vm27ctlefb6u.apps.googleusercontent.com"> 
		<title>Halaman Utama</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
		<script src="https://apis.google.com/js/platform.js" async defer></script>
	
	  <style>
		
		
   			.center{
     			 margin-top: 10%;
     			 text-align:center;
  }
		    
          .container{
              width: 800px;
              margin: auto;
          }
			.container-bg {
   				 background: #00bffe;
				 padding:250px 50px 100px 50px;
}
          
           .brand{ 
                  color: #ffffff
          }
          
	   </style>
	  
  </head>
	
<body>
			
<nav class="navbar navbar-expand-lg navbar-dark bg-dark "> 
 <a class="navbar-brand" href="homepersh.php">Beranda</a>		

	 	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       	<span class="navbar-toggler-icon"></span>
       	</button>
       		<div class="collapse navbar-collapse" id="navbarSupportedContent">
          		<ul class="navbar-nav mr-auto">
			  
             <li class="nav-item">
                <a class="nav-link" href="logbookprs.php">Logbook</a> 
             </li>
            
             <li class="nav-item">
                <a class="nav-link" href="penilaianpers.php">Penilaian</a> 
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
    
<div class="container">
<form action="" method="POST" class="form-signin">
     <center><h1 class="h3 mb-3 font-weight-normal">Nilai dan Komentar Peserta Kerja Praktek</h1></center>
     
      <label for="inputnilai" class="sr-only">Nilai</label>
            <input type="text" id="tgl" class="form-control" placeholder="100" name="tgl" required="" autofocus="">
     <br>
      <label for="inputkegiatan" class="sr-only">Komentar</label>
            <input type="text" id="kgt" class="form-control" placeholder="Jelek Sekali" name="kgt" required="" autofocus="">
     <br>
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="logbook" name="submit" >Masukkan</button>       
    </form> 
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

$user=$_SESSION["sess_user"]; 


if(isset($_POST["submit"])){  
if(!empty($_POST['tgl']) && !empty($_POST['kgt'])) 
{  
    $tgl=$_POST['tgl'];  
    $kgt=$_POST['kgt'];
    $con=mysqli_connect('localhost','root','') or die(mysqli_error()); 
    mysqli_select_db($con, 'nilai') or die("cannot select DB"); 
    
     $cen=mysqli_connect('localhost','root','') or die(mysqli_error());
         mysqli_select_db($cen, 'kp') or die("cannot select DB");
         $sql = "SELECT kelompok FROM perusahaan where username = '".$user."'";
         $result = mysqli_query($cen,$sql);
         while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
            $klpk = $row['kelompok'];
         }
    $sql="INSERT INTO n_perusahaan(kelompok,nilai,komentar) VALUES('$klpk','$tgl','$kgt')";  
    
    $result=mysqli_query($con, $sql);
  

                
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  
    
  </body>
</html>
<?php   
}?>  