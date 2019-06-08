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
		<meta name="google-signin-client_id" content="873471051525-44jnradjc9frd5s13f52vm27ctlefb6u.apps.googleusercontent.com"> 
		<title>Halaman Utama</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
		<script src="https://apis.google.com/js/platform.js" async defer></script>
	
	  <style>
		
			.jumbotron {
				background-color: #173f5f;
   				color: #fff;
			    font-family: Montserrat, sans-serif;
				padding:70px 100px 70px 100px;
  }
		
   			.center{
     			 margin-top: 10%;
     			 text-align:center;
  }
		
			.container-bg {
   				 background: #173f5f;
				 padding:250px 50px 100px 50px;
}
		  
		  .blockquote-footer{
			  color: #13144f;
     
		  }
          
           .brand{ 
                  color: #ffffff
          }
          
	   </style>
	  
  </head>
	
<body>
			
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

				
				

			<div class="jumbotron jumbotron-fluid">

						  <h1 class="display-3">Sistem Informasi Kerja Praktek </h1>
						  
						  <p class="h3">Teknik Elektro Konsentrasi Mekatronika </p>
						  
						<!-- <blockquote class="blockquote text-right">
  							<p class="mb-0">Kunci Sukses adalah Key of Success</p>
 							<footer class="blockquote-footer">Anonymous</footer>
						  </blockquote>
					    -->
								<div class="container-bg">	
								</div>   
						 </div>
 

       <div class="row">
          <div class="text-center col-lg-6 offset-lg-3">
			<hr class="my-2">
             <p>Universitas Katolik Parahyangan</p>
			 <p>Copyright &copy; 2019</p>
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