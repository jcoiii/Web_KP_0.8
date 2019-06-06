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
      <h1 class="h3 mb-3 font-weight-normal">Mahasiswa Bimbingan</h1>
      <label for="inputEmail" class="sr-only">NRP Mahasiswa Bimbingan</label>
            <input type="text" id="user" class="form-control" placeholder="NRP Mahasiswa Bimbingan" name="user" required="" autofocus="">

     
<br>
     
		<button class="btn btn-lg btn-primary btn-block" type="submit"  value="Login" name="submit" >Masuk</button> 
  </form>  
    
<!--Pakai Untuk Login Admin Local  -->     
<?php  
if(isset($_POST["submit"])){  
  
if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
  
    $con=mysqli_connect('localhost','root','') or die(mysqli_error());  
    mysqli_select_db($con, 'login') or die("cannot select DB");  
  
    $query=mysqli_query($con, "SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbusername=$row['username'];  
    $dbpassword=$row['password'];  
    }  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
  
    /* Redirect browser */  
    header("Location: home.php");  
    }  
    } else {  
    echo "<p align=center>User tidak ditemukan </p> ";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>    
</body>  
</html>   