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
#customBtn:hover {cursor: pointer;
    }

table {
  margin: 0 auto;
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
</head>

    <body class="text-center" style="background-color:white;">
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
 <h1 class="h3 mb-3 font-weight-normal">Daftar Perusahaan Kerja Praktek</h1>     
<br>

<?php		
 $user=$_SESSION["sess_user"]; 
 $con=mysqli_connect('localhost','root','') or die(mysqli_error());
      mysqli_select_db($con, 'kp') or die("cannot select DB"); 
        $sql = "SELECT * FROM perusahaan";
        $result = $con->query($sql);
        
    if ($result->num_rows > 0) {
    echo "<table><tr><th>Nama Perusahaan</th><th>Nama Pengguna</th><th>Email Perusahaan</th><th>Kelompok</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["namaperusahaan"]. "</td><td>" . $row["username"]."</td><td>" . $row["email"]."</td><td>" . $row["kelompok"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada riwayat terdaftar";
}

$con->close();
?>
 <br>   
<br>    
<div class="container">
  <a class="btn btn-primary" href="logbookmhs.php" role="button">Input Data Perusahaan</a>
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

  </body>
</html>
<?php
       }?>