<?php   
session_start();    
?>  
<!DOCTYPE html>
<html lang="id">
  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Halaman Utama</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
		<script src="https://apis.google.com/js/platform.js" async defer></script>
	
	  <style>
		
			.jumbotron {
				background-color: #24303c;
                background-image: url(bghome.jpg);
                background-size: cover;
   				color: #fff;
			    font-family: Montserrat, sans-serif;
				padding:150px 100px 300px 100px;
  }
		
   			.center{
     			 margin-top: 10%;
     			 text-align:center;
  }
		
			.container-bg {
   				 background: #24303c;
				 padding:100px 10px 100px 10px;
}
		  
		  .blockquote-footer{
			  color: #13144f;
              
			  
		  }
          
           .brand{ 
                  color: #ffffff
          }

          * {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}

/* Slideshow container */
.slideshow-container {
  position: relative;
  background: #f1f1f1f1;
}

/* Slides */
.mySlides {
  display: none;
  padding: 80px;
  text-align: center;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -30px;
  padding: 16px;
  color: #888;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  position: absolute;
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
  color: white;
}

/* The dot/bullet/indicator container */
.dot-container {
    text-align: center;
    padding: 20px;
    background: #ddd;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Add a background color to the active dot/circle */
.active, .dot:hover {
  background-color: #717171;
}

/* Add an italic font style to all quotes */
q {font-style: italic;}

/* Add a blue color to the author */
.author {color: cornflowerblue;}
          
	   </style>
	  
  </head>
	
<body>
			
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Permohonan
                </a>
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

							
<div class="jumbotron jumbotron-fluid">
    <h1 class="display-3">Sistem Informasi Kerja Praktek </h1>
    <p class="h3">Teknik Elektro Konsentrasi Mekatronika </p>
						  
						
</div>
    
<center><h4>Pengumuman</h4></center>  
<br>
<div class="slideshow-container">

<div class="mySlides">
  <q>Jadwal Sidang akan diberitahu setelah anda lulus.</q>
  <p class="author">- Bang Sat</p>
</div>

<div class="mySlides">
  <q>Robot adalah literaly sebuah robot</q>
  <p class="author">- Bang Jon</p>
</div>

<div class="mySlides">
  <q>Kok Hilang Anjay</q>
  <p class="author">- Bang Dom</p>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>

<div class="dot-container">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script> 

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
