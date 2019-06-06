<!doctype html>  
<html>  
<head>  
<title>Register</title>  
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login User KP</title>
		
		<link href="./css/bootstrap.min.css" rel="stylesheet">
		<link href="./css/signin.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
		
		<style>
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
			  cursor: pointer;
		</style>	
		
</head>  
<body class="text-center" style="background-color:powderblue;"  >
	   <div class="row">
		   </div>
 <form action="" method="POST" class="form-signin">
		<br>
		<br>
		<br>
      <img class="mb-4 img-fluid" src="./css/logo_unpar_only.png" alt="" width="100">
      <h1 class="h3 mb-3 font-weight-normal">MSO Kerja Praktek</h1>
     
      <label for="inputuser" class="sr-only">NRP</label>
            <input type="text" id="user" class="form-control" placeholder="ID Pengguna" name="user" required="" autofocus="">
      <label for="inputEmail" class="sr-only">Email address</label>
            <input type="text" id="emailadd" class="form-control" placeholder="Alamat Email" name="emailadd" required="" autofocus="">
      <label for="inputnama" class="sr-only">Nama</label>
            <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap" name="nama" required="" autofocus="">
      <label for="inputKelompok" class="sr-only">Kelompok</label>
            <input type="text" id="kelompok" class="form-control" placeholder="Nomor Kelompok" name="klpk" required="">
      <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="password" class="form-control" placeholder="Kata Sandi" name="pass" required="">

     <br>
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="Login" name="submit" >Daftar</button> 
     	<br>
	  <p1>Universitas Katolik Parahyangan</p1>
	  <br>
 	  <p2>Copyright &copy; 2019 </p2>
  </form>  
<?php 
if(isset($_POST["submit"])){  
if(!empty($_POST['user']) && !empty($_POST['emailadd']) && !empty($_POST['nama']) && !empty($_POST['pass']) && !empty($_POST['klpk'])) 
{  
    $user=$_POST['user'];  
    $emailadd=$_POST['emailadd'];
    $pass=$_POST['pass'];
    $passhash=password_hash($pass, PASSWORD_DEFAULT);
    $nama=$_POST['nama'];
    $klpk=$_POST['klpk'];
    
    $con=mysqli_connect('localhost','root','') or die(mysqli_error()); 
    $cen=mysqli_connect('localhost','root','') or die(mysqli_error());  
    $can=mysqli_connect('localhost','root','') or die(mysqli_error());  
    mysqli_select_db($con, 'kp') or die("cannot select DB");  
    mysqli_select_db($cen, 'logbook') or die("cannot select DB");
    mysqli_select_db($can, 'bimbingan') or die("cannot select DB");
    $query=mysqli_query($con, "SELECT * FROM mahasiswa WHERE username='".$user."'"); 
    
    $numrows=mysqli_num_rows($query);  
    if($numrows==0)  
    {  
    $sql="INSERT INTO mahasiswa(username,email,nama,password,kelompok) VALUES('$user','$emailadd','$nama','$passhash','$klpk')";  
    $sql1 = "CREATE TABLE logbook.l$user( 
        tanggal VARCHAR(20) NOT NULL PRIMARY KEY,
        kegiatan VARCHAR(200) NOT NULL,
        hasil VARCHAR(200) NOT NULL,
        status VARCHAR(200) NOT NULL
        )";
    
    $sql2 = "CREATE TABLE bimbingan.b$user( 
        tanggal VARCHAR(20) NOT NULL PRIMARY KEY,
        kegiatan VARCHAR(200) NOT NULL,
        status VARCHAR(200) NOT NULL
        )";
    
        $result=mysqli_query($con, $sql);
        $result1=mysqli_query($cen, $sql1);
        $result2=mysqli_query($can, $sql2); 
        
        if($result){  
                header("Location: index.html");   
                } else {  
                echo "Failure!";  
                }  

                } else {  
                echo "That username already exists! Please try again with another.";  
        }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  
</body>  
</html>
