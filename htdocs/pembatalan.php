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
	  
    <title>Pembatalan</title>

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
<body class="text-center" style="background-color:white";>
    <div class="row">
		   </div>
      <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark "> 
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
		
  <h2 align="center">Surat Pembatalan Perusahaan</h2>
  <form action="" method="POST" class="form-signin">
      
      
    <div class="form-group mx-sm-5 mb-2">
      <label for="perus">Nama Perusahaan</label><br>
      <input type="text" class="col-4" id="perushdb" placeholder="AeroTerraScan" name="perushdb">
    </div>
                                                                                           
    <div class="form-group mx-sm-5 mb-2">
      <label for="perusal">Alasan Pembatalan</label><br>
      <input type="text" class="col-4" id="alasan" placeholder="Karena saya tidak kuat KP" name="alasan">
    </div>                                                                          

<br>
  <br>
  <button type="submit" class="btn" name="submit">Submit</button> 
	
</form> 
<?php  
 $perushdba=false;
 $perushdbc=false;
 $perushdbd=false;
 $perushdbf=false;
 $user=$_SESSION["sess_user"];
        $cen=mysqli_connect('localhost','root','') or die(mysqli_error());
        mysqli_select_db($cen, 'kp') or die("cannot select DB");
        $sql="SELECT kelompok FROM mahasiswa WHERE username = '".$user."'";
        $result = mysqli_query($cen,$sql);
        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
            $klpk = $row['kelompok'];
        }
        
if(isset($_POST["submit"])){    
    if(!empty($_POST['perushdb'])) {  
        $perushdb=$_POST['perushdb'];
        $alasan=$_POST['alasan'];
        $con=mysqli_connect('localhost','root','') or die(mysqli_error());
             mysqli_select_db($con, 'permohonan') or die("cannot select DB");
        $ctn=mysqli_connect('localhost','root','') or die(mysqli_error());  
             mysqli_select_db($ctn, 'permohonan') or die("cannot select DB");
        $csn=mysqli_connect('localhost','root','') or die(mysqli_error());  
             mysqli_select_db($csn, 'permohonan') or die("cannot select DB");
        $dsn=mysqli_connect('localhost','root','') or die(mysqli_error());  
             mysqli_select_db($dsn, 'permohonan') or die("cannot select DB");
        $abc=mysqli_connect('localhost','root','') or die(mysqli_error());  
             mysqli_select_db($abc, 'permohonan') or die("cannot select DB");
        $sol="SELECT perusahaan FROM proposal WHERE perusahaan = '".$perushdb."' AND status = 'Diterbitkan'";
        $psn="SELECT perusahaan FROM pembatalan WHERE perusahaan = '".$perushdb."'";
        $sns="SELECT kelompok FROM pembatalan WHERE kelompok ='".$klpk."'";
        $cba="SELECT status FROM pembatalan WHERE status = 'Diterbitkan' AND kelompok ='".$klpk."'";
        $resultsol = mysqli_query($ctn,$sol);
        $resultpsn = mysqli_query($csn,$psn);
        $resultsns = mysqli_query($dsn,$sns);
        $resultcba = mysqli_query($abc,$cba);
        while($rows = mysqli_fetch_array($resultsol, MYSQLI_BOTH)){
            $perushdba = $rows['perusahaan'];
        }
        while($rowd = mysqli_fetch_array($resultpsn, MYSQLI_BOTH)){
            $perushdbc = $rowd['perusahaan'];
        }
        while($rowx = mysqli_fetch_array($resultsns, MYSQLI_BOTH)){
            $perushdbd = $rowx['kelompok'];
        }
        while($rowz = mysqli_fetch_array($resultcba, MYSQLI_BOTH)){
            $perushdbf = $rowz['status'];
        }
       # echo $perushdba;
       echo $perushdb;
        echo $perushdbd;
        echo $perushdbc;
        echo $perushdbf;
            if($perushdbd == NULL){#NULL untuk tabel yang kosong = pertama kali mengisi tabel
                if($perushdba == $perushdb){ #Syarat Jika Perusahaan yang diinput $perushdb ada di dalam tabel permohonan
                    if(($perushdb !== $perushdbc) ){ #Syarat jika perusahaan yang diinput belum pernah dibatalkan 
                        $sql="INSERT INTO pembatalan(kelompok,perusahaan,tanggal,alasan) VALUES('$klpk','$perushdb',NOW(),'$alasan  ')"; $result=mysqli_query($con, $sql);    
                    }
                } 

                else {  
                     echo "Terjadi Kesalahan!";  
                }   
            }
            else{
                 if($perushdba == $perushdb){ #Syarat Jika Perusahaan yang diinput $perushdb ada di dalam tabel permohonan
                    if(($perushdbc != $perushdb) AND ($klpk == $perushdbd) AND ($perushdbf == "Diterbitkan")){ #Syarat jika perusahaan yang diinput belum pernah dibatalkan dan anggota kelompok yang sama belum penah membatalkan
                        $sql="INSERT INTO pembatalan(kelompok,perusahaan,tanggal,alasan) VALUES('$klpk','$perushdb',NOW(),'$alasan  ')"; $result=mysqli_query($con, $sql);    
                    }
                } 

                
            }
              
    }
}
    
?>
<br>
<br>
 <h3 align="center">Riwayat Proposal Permohonan Perusahaan</h3>     
<br>
<?php		
 $con=mysqli_connect('localhost','root','') or die(mysqli_error());
      mysqli_select_db($con, 'permohonan') or die("cannot select DB"); 
        $query = "SELECT kelompok, perusahaan, tanggal, status FROM proposal WHERE kelompok = '".$klpk."'";
        $result2= mysqli_query($con, $query);
        
    if ($result2->num_rows > 0) {
    echo "<table><tr><th>Perusahaan</th><th>Tanggal Pengajuan</th><th>Status</th></tr>";

    while($row = $result2->fetch_assoc()) {
        echo "<tr><td>" . $row["perusahaan"]. "</td><td>" . $row["tanggal"]. "</td><td>" . $row["status"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada riwayat terdaftar";
}

$con->close();
?> 
<br>
<br>
<h3 align="center">Riwayat Proposal Pembatalan Perusahaan</h3>     
<br>
<?php		
 $con=mysqli_connect('localhost','root','') or die(mysqli_error());
      mysqli_select_db($con, 'permohonan') or die("cannot select DB"); 
        $query = "SELECT kelompok, perusahaan, tanggal, status FROM pembatalan WHERE kelompok = '".$klpk."'";
        $result2= mysqli_query($con, $query);
        
    if ($result2->num_rows > 0) {
    echo "<table><tr><th>Perusahaan</th><th>Tanggal Pengajuan</th><th>Status</th></tr>";

    while($row = $result2->fetch_assoc()) {
        echo "<tr><td>" . $row["perusahaan"]. "</td><td>" . $row["tanggal"]. "</td><td>" . $row["status"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada riwayat pembatalan";
}

$con->close();
?>     

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
  </body>
</html>
<?php   
}  
?>  