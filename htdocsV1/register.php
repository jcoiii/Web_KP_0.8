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
<body class="text-center">
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
      <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="password" class="form-control" placeholder="Kata Sandi" name="pass" required="">
     
	  <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
     
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="Login" name="submit" >Masuk</button> 
  </form>  
    
<?php 
if(isset($_POST["submit"])){  
if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass']; 
    $emailadd=$_POST['email'];  
    $con=mysqli_connect('localhost','root','') or die(mysqli_error());  
    mysqli_select_db($con, 'login') or die("cannot select DB");  
  
    $query=mysqli_query($con, "SELECT * FROM login WHERE username='".$user."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows==0)  
    {  
    $sql="INSERT INTO login(username,password) VALUES('$user','$pass')";  
  
    $result=mysqli_query($con, $sql);  
        if($result){  
    echo "Account Successfully Created";  
    } else {  
    echo "Failure!";  
    }  
  
    } else {  
    echo "User Telah Terdaftar";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  
</body>  
</html>   