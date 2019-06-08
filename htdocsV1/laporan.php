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
		
<center><h1>Submit Laporan Akhir Setelah Revisi</h1></center>   
        <br>

<form action="laporan.php" method="POST" enctype="multipart/form-data">
    Pilih File yang akan diunggah :
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Unggah Laporan" name="submit">
</form>   
 <br>

  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.2.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.0.0.js"></script>
                                       
<?php
 $user=$_SESSION["sess_user"]; 
 $cen=mysqli_connect('localhost','root','') or die(mysqli_error());
 mysqli_select_db($cen, 'kp') or die("cannot select DB");
 $sql = "SELECT kelompok FROM mahasiswa where username = '".$user."'";
 $result = mysqli_query($cen,$sql);
 while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
    $klpk = $row['kelompok'];
}       
if(isset($_POST["submit"]) && !empty($_FILES["fileToUpload"]["name"])){ 
   
    $file = basename($_FILES['fileToUpload']["name"]);
    $dir = "laporan/";
    $path = $dir . $file;
    $uploadOk = 1;
    $filetype = strtolower(pathinfo($file,PATHINFO_EXTENSION));
    $allowTypes = array('docx','pdf');  
    
    $con=mysqli_connect('localhost','root','') or die(mysqli_error());
   
    mysqli_select_db($con, 'laporan') or die("cannot select DB");
 
    
    
    
    
    if(in_array($filetype, $allowTypes)){
        
         if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $path)){
             
            $insert = $con->query("INSERT into laporan (kelompok, file_name, waktu_upload)  VALUES ($klpk,'".$file."', NOW())");
            #$update = $con->query("UPDATE laporan SET") 
             if($insert){
                $statusMsg = "File ".$file. " berhasil diunggah.";
             }
             else{
                $statusMsg = "Proses mengunggah gagal";
             }        
         }
        
         else{
            $statusMsg = "Terjadi Kesalahan!";
         }
    }
    else{
        $statusMsg = 'Masukkan file dengan ekstensi PDF boi!';
    }
}
else{
    $statusMsg = 'Penamaan File = KELOMPOK_NPM_PERUSAHAAN dengan ekstensi .pdf';
}
echo $statusMsg;
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
  </body>
</html>
<?php
       }?>