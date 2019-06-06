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
 <a class="navbar-brand" href="homedosbing.php">Beranda</a>		

	 	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       	<span class="navbar-toggler-icon"></span>
       	</button>
       		<div class="collapse navbar-collapse" id="navbarSupportedContent">
          		<ul class="navbar-nav mr-auto">
			  
             <li class="nav-item">
                <a class="nav-link" href="bimbingan.php">Bimbingan</a>  <!-- Masuk ke Halaman yang berisi data mahasiswa yang dibimbing (logbook) dan progress bimbingan  -->
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
<h1 class="h3 mb-3 font-weight-normal">Data Kelompok Bimbingan</h1>     
<br>

<?php
 $user=$_SESSION["sess_user"]; 
 $con=mysqli_connect('localhost','root','') or die(mysqli_error());
 $cen=mysqli_connect('localhost','root','') or die(mysqli_error());
      mysqli_select_db($con, 'bimbingan') or die("cannot select DB"); 
      mysqli_select_db($cen, 'kp') or die("cannot select DB"); 
    
 $table = "<table><tr><th>Kelompok</th><th>Nama Perusahaan</th><th>Nama Mahasiswa</th><th>NRP</th><th>Pilihan</th></tr>";
       
 $query=mysqli_query($cen, "SELECT kelompok_kp.kelompok AS klpk, mahasiswa.username AS nrpm, perusahaan.namaperusahaan AS pers, mahasiswa.nama AS mhss
 FROM ((kelompok_kp INNER JOIN perusahaan ON kelompok_kp.kelompok = perusahaan.kelompok)
 INNER JOIN mahasiswa ON kelompok_kp.kelompok = mahasiswa.kelompok) WHERE kelompok_kp.username='".$user."'");  

        #$sql = "SELECT kelompok_kp.kelompok, mahasiswa.nama FROM kelompok_kp";
        #$result = $con->query($query);
while ($row = $query->fetch_assoc())
{
    $table .= "<tr>";
    $table .= "<td>{$row['klpk']}</td>";
    $table .= "<td>{$row['pers']}</td>";
    $table .= "<td>{$row['mhss']}</td>";
    $table .= "<td>{$row['nrpm']}</td>";
    $submit1=   $row['nrpm'];
    $table .= '<td><form action="" method="POST" class="form-signin"><button class="btn btn-danger" type="$submit1" name="$submit1" value="Borang Bimbingan">Borang Bimbingan</button></form></td>';
    $table .= "</tr>";
}

$table .= "</table>";
print $table;

if(isset($_POST['$submit1'])){  
   print_r ('Felix Broken Bucin');
}
    
$con->close();
?>
<br>   
<br>    
        
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