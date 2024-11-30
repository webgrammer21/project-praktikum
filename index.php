<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> SIGMA </title>
		<link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/styles.css">
	</head>
	<body>
		<header id="go_to_top">
			<div class="gradient">
				<div class="container">
					<h2 id="logo"><a href=" "> SIGMA LATTE </a></h2>
					<img id="open_menu" class="menu_icon show" src="../assets/img/menu.png" >
					<img id="close_menu" class="menu_icon" src="../assets/img/x.png" >
					<nav>
						<a href="#go_to_top" class="menu_link active"> Welcome </a>
						<a href="#about" class="menu_link"> About </a>
						<a href="#menu" class="menu_link"> Menu </a>
						<a href="#info" class="menu_link"> Info </a>
						<a href="formLogin/index.php">
							<button class="btn btn-warning" type="button">LOGIN</button></a>
					</nav>
				</div>
			</div>
			<div class="welcome_container">
				<h1 class="highlight">Welcome</h1>
				<h1 class="brand"> The Sigma Latte </h1>
				<span class="symbol"> &#10059; </span>
				<h2> Cafe and Eatry </h2>
			</div>
			<div>

			</div>
		</header>
		
		<main>
			<section id="about" class="breakpoint">
				<div class="content">
					<h1 class="highlight"> Discover </h1>
					<h1 class="topic"> our story </h1>
					<p class="symbol"> &#10059; </p>
					<p> Sigma Café adalah tempat sempurna untuk menikmati beragam pilihan makanan lezat dan kopi berkualitas. 
						Dengan suasana nyaman dan pelayanan hangat, Sigma Café juga memberikan kenyamanan setiap pengunjung, 
						sehingga dapat menyegarkan tiap hari Anda. 
						Nikmati momen terbaik bersama teman dan keluarga di Sigma Café. </p>
				</div>
				<div class="img_container">
					<img src="./assets/img/ruangan.jpg"  alt="ruangan"> 
				</div>
			</section>
			
			<section class="divider"> 
					<h1 class="highlight"> Tasteful </h1>
					<h1 class="topic"> recipes </h1>
			</section>
			
			<section id="menu" class="breakpoint"> 
				<div class="img_container">
					<img class="align_end" src="./assets/img/breakfast.jpg" title="Fresh salad" alt="Fresh salad image"> 
					<img class="align_end" src="./assets/img/menu5.jpg" title="Fresh fancy salad" alt="Fresh fancy salad image">
					<img class="align_start" src="./assets/img/menu6.jpg" title="Mushroom dish with legumes" alt="Mushroom dish with legumes image">
					<img class="align_start" src="./assets/img/menu7.jpg" title="Dessert with lemon" alt="Dessert with lemon image">
				</div>
				<div class="content">
					<h1 class="highlight"> Discover </h1>
					<h1 class="topic"> our menu </h1>
					<p class="symbol"> &#10059; </p>
					<p>Nikmati beragam menu pilihan yang menggugah selera, mulai dari hidangan klasik hingga kreasi unik.
					Setiap hidangan kami dirancang untuk memberi pengalaman kuliner istimewa, dipadu dengan racikan kopi terbaik yang membuat momen santai Anda semakin berkesan. </p>
					<h2><a href="public/listmenu.php"> View the full menu </a></h2>
				</div>
			</section>
			
			<section class="divider">
					<h1 class="highlight"> The perfect </h1>
					<h1 class="topic"> blend </h1>			
			</section>
			
			<section id="reservation" class="breakpoint"> 
				<div class="content">
					<h1 class="highlight"> Culinary </h1>
					<h1 class="topic"> delight </h1>
					<p class="symbol"> &#10059; </p>
					<p> Setiap hidangan yang disajikan adalah seni yang diracik untuk memberikan kelezatan maksimal, 
						menjadikan setiap momen makan sebagai perjalanan rasa yang penuh kenikmatan. </p>
				</div>
				<div class="img_container">
					<img src="./assets/img/meat.jpg"   alt="Sandwiches image"> 
					<img src="./assets/img/sandwiches.jpg" alt="Sandwiches image">
				</div>			
			</section>
						
		</main>
		
		<footer>

			<div id="info" class="breakpoint">
				<div id="locations">
					<h2> Lokasi </h2>
					<div  class="address_container">
						<div class="address1">
							<p> Jl. Padjajaran Jl. Ring Road Utara No.104 </p>
							<p> Daerah Istimewa Yogyakarta 55283 </p>
						</div>
						<div class="address2">
							<p> JL. Babarsari 2 </p>
							<p>  Sleman, Yogyakarta 55281 </p>
						</div>
					</div>
				</div>
				
				<div id="hours">
					<h2> Jam Operasi </h2>
					<div class="open_container">
						<div class="open">
							<p> Senin - Jum'at </p>
							<p> 9:30am - 11:00pm </p>
						</div>	
						<div class="open">
							<p> Sabtu & Minggu </p>
							<p> 9:30am - 00:00pm </p>
						</div>
						<div class="open">
							<p> Rasakan Enaknya  </p>
							<p> Sampai Jadi Sigma </p>
						</div>
					</div>
				</div>
			</div>
			<div class=" copyright_container">
				<div id="copyright">
						<div> 
							<p> Copyright 2024 &copy; Dibuat Dengan Tulus(anjay) by Imam Khusain & Salman Faris </p>
							<p> Editor By Informatics23 &copy; </p>
						</div>			
				</div>
			</div>	
		</footer>
		
		<script src="./assets/js/scripts.js"> </script>
	</body>
</html>