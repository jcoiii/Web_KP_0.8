<!doctype html>  
<html>  
<head>  
<title>Login</title>  

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
    
<body class="text-center" style="background-color:powderblue;">
	   <div class="row">
		   </div>
     
  

 <form action="" method="POST" class="form-signin">
		<br>
		<br>
		<br>
      <img class="mb-4 img-fluid" src="./css/logo_unpar_only.png" alt="" width="100">
      <h1 class="h3 mb-3 font-weight-normal">MSO Kerja Praktek</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
            <input type="text" id="email" class="form-control" placeholder="Alamat Email" name="emailadd" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="password" class="form-control" placeholder="Kata Sandi" name="pass" required="">
     
	  <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
     
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="Login" name="submit" >Masuk</button> 
  </form>  
    
<!--Pakai Untuk Login Admin Local  -->     
<?php  
$mhs="mahas";
$adm="admin";
$prs="perus";
$dos="dosen";
if(isset($_POST["submit"])){  
  
if(!empty($_POST['emailadd']) && !empty($_POST['pass'])) {  
    $emailadd=$_POST['emailadd']; 
    $pass=$_POST['pass']; 
    
  
    $con=mysqli_connect('localhost','root','') or die(mysqli_error());  
    mysqli_select_db($con, 'kp') or die("cannot select DB");  
    $cen=mysqli_connect('localhost','root','') or die(mysqli_error());  
    mysqli_select_db($cen, 'kp') or die("cannot select DB");
    
    $query=mysqli_query($con, "SELECT pengguna,username,email,password FROM dosen WHERE email='".$emailadd."' UNION SELECT pengguna,username,email,password FROM mahasiswa WHERE email='".$emailadd."' UNION SELECT pengguna,username,email,password FROM admin WHERE email='".$emailadd."' UNION SELECT pengguna,username,email,password FROM perusahaan WHERE email='".$emailadd."'");
    
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0){
        
        while($row=mysqli_fetch_assoc($query))  
        { 
        $dbuser=$row['username'];        
        $dbemailadd=$row['email'];      
        $dbpassword=$row['password'];
        $dbpengguna=$row['pengguna'];
        }  
        
        if(password_verify($pass, $dbpassword)){  
            if(strpos($dbpengguna,$mhs) !== false){
                session_start();  
                $_SESSION['sess_user']=$dbuser;  
                header("Location: home.php");  
            }
            else if(strpos($dbpengguna,$adm) !== false){
                session_start();  
                $_SESSION['sess_user']=$dbuser;  
                header("Location: homeadmin.php");  
            }
            else if(strpos($dbpengguna,$prs) !== false){
                session_start();  
                $_SESSION['sess_user']=$dbuser;  
                header("Location: homepersh.php");  
            }
            elseif(strpos($dbpengguna,$dos) !== false){
                session_start();  
                $_SESSION['sess_user']=$dbuser;  
                header("Location: homedosbing.php"); 
            }
            else{
                echo 'Anda Siapa?'; 
            } 
        }  
    } 
    else {  
    echo "<p align=center> User tidak ditemukan</p> ";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>    
</body>  
</html>   