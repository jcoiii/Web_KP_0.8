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
    <title>Laman Permohonan Mahasiswa</title>
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

    <form action="" method="POST" class="form-signin">
        <h1 align="center">Proposal Permohonan Perusahaan</h1> 
        <br>
        <br>
        <div class="form-signin mx-sm-5 mb-2">
          <label for="inputperus">Nama Perusahaan</label><br>
          <input type="text" class="col-4" id="perush" placeholder="AeroTerraScan" name="perushdb">
        </div>
        <br>
        <button class="btn btn-danger" type="submit" class="btn" name="submit">Submit</button> 
    </form> 
        
 <?php   
     $user      =   $_SESSION["sess_user"]; 
     $perushdbt =   false;
     $perushdbs =   false;
     $statusdby =   false;
     $statusfl  =   "Diterbitkan";
     $cen   =   mysqli_connect('localhost','root','') or die(mysqli_error());
                mysqli_select_db($cen, 'kp') or die("cannot select DB");

     $sql   =   "SELECT kelompok FROM mahasiswa where username = '".$user."'";

     $result    = mysqli_query($cen,$sql);
 
        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
              $klpk = $row['kelompok'];
        }
        
        if(isset($_POST["submit"])){    
            if(!empty($_POST['perushdb'])) {  

                $perushdb=$_POST['perushdb']; 

                $con    =   mysqli_connect('localhost','root','') or die(mysqli_error());
                            mysqli_select_db($con, 'permohonan') or die("cannot select DB");
                $csn    =   mysqli_connect('localhost','root','') or die(mysqli_error());  
                            mysqli_select_db($csn, 'permohonan') or die("cannot select DB");
                $cpn    =   mysqli_connect('localhost','root','') or die(mysqli_error());  
                            mysqli_select_db($cpn, 'permohonan') or die("cannot select DB");
                $uts    =   mysqli_connect('localhost','root','') or die(mysqli_error());  
                            mysqli_select_db($uts, 'permohonan') or die("cannot select DB");
                
                $psn        =   "SELECT perusahaan FROM proposal WHERE perusahaan = '".$perushdb."'";
                $npc        =   "SELECT kelompok FROM proposal WHERE kelompok ='".$klpk."'";
                $stu        =   "SELECT status FROM proposal WHERE status = '".$statusfl."'";
                $resultpsn  =   mysqli_query($csn,$psn);
                $resultnpc  =   mysqli_query($cpn,$npc);
                $resultstu  =   mysqli_query($uts,$stu);
                while($rows = mysqli_fetch_array($resultpsn, MYSQLI_BOTH)){
                    $perushdbt = $rows['perusahaan'];                       #Mengambil variabel perusahaan pada tabel proposal
                }
                while($rowx = mysqli_fetch_array($resultnpc, MYSQLI_BOTH)){
                    $perushdbs = $rowx['kelompok'];                         #Mengambil variabel kelompok pada tabel proposal
                }
                while($rowd = mysqli_fetch_array($resultstu, MYSQLI_BOTH)){
                    $statusdby = $rowd['status'];                           #Mengambil variabel status pada tabel proposal
                }
                if($perushdbs == null){
                        $sql="INSERT INTO proposal(kelompok, perusahaan,tanggal) VALUES('$klpk','$perushdb',NOW())";    
                        $result=mysqli_query($con, $sql);
                }
                else{
                     if($statusdby == $statusfl){
                        if(($perushdb != $perushdbt) && ($perushdbs == $klpk)){
                            $sql="INSERT INTO proposal(kelompok, perusahaan,tanggal) VALUES('$klpk','$perushdb',NOW())";    
                            $result=mysqli_query($con, $sql);
                        }    
                     }
                }
            } 
            else {  
                echo "Isi Borang diatas!";  
            }  
        }      
?> 
        
<br>
 <h3 align="center">Riwayat Proposal Permohonan Perusahaan</h3>     
<br>

<?php		
    $con    =   mysqli_connect('localhost','root','') or die(mysqli_error());
                mysqli_select_db($con, 'permohonan') or die("cannot select DB"); 
    
    $query  =   "SELECT kelompok, perusahaan, tanggal, status FROM proposal WHERE kelompok = '".$klpk."'";
    $result2=   mysqli_query($con, $query);
        
    if ($result2->num_rows > 0) {
        echo "<table><tr><th>Perusahaan</th><th>Tanggal Pengajuan</th><th>Status</th></tr>";

        while($row = $result2->fetch_assoc()) {
            echo "<tr><td>" . $row["perusahaan"]. "</td><td>" . $row["tanggal"]. "</td><td>" . $row["status"]. "</td></tr>";
        }
        echo "</table>";
    } 
    else {
        echo "Tidak ada riwayat terdaftar";
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
       }?>