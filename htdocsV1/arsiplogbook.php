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
                                <a class="nav-link" href="arsiplogbook.php">Logbook</a>
                             </li>              

                             <li class="nav-item">
                                <a class="nav-link" href="laporan.php">Laporan</a>
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
 <h1 class="h3 mb-3 font-weight-normal">Riwayat Logbook</h1>     
<br>

<?php		
 $user=$_SESSION["sess_user"]; 
 $con=mysqli_connect('localhost','root','') or die(mysqli_error());
      mysqli_select_db($con, 'logbook') or die("cannot select DB"); 
        $sql = "SELECT tanggal, kegiatan, hasil, status FROM l$user";
        $result = $con->query($sql);
        
    if ($result->num_rows > 0) {
    echo "<table><tr><th>Tanggal</th><th>Kegiatan</th><th>Hasil</th><th>Status</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["tanggal"]. "</td><td>" . $row["kegiatan"]. "</td><td>" . $row["hasil"]."</td><td>" . $row["status"]. "</td></tr>";
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
  <a class="btn btn-danger" href="logbookmhs.php" role="button">Input Data Logbook</a>
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