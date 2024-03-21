<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";

// $stories = Story::findAll($options = array('limit' => 2, 'offset' => 2));

// $authorId = 7;
// $stories = Story::findByAuthor($authorId, $options = array('limit' => 3, 'offset' => 2));

// $categoryId = 4;
// $stories = Story::findByCategory($categoryId, $options = array('limit' => 3, 'offset' => 2));

//Mainpage
// $headStory = Story::findAll($options = array('limit' => 1, 'offset' => 0));
// $leftstory = Story::findAll($options = array('limit' => 3, 'offset' => 1));
$categoryId = 1;
$stories = Story::findByCategory($categoryId, $options = array('limit' => 4, 'offset' => 0));

//News
// $categoryId = 1;
$mainStory = Story::findAll($options = array('limit' => 1, 'offset' => 0));

$categoryId = 1;
$sideStories = Story::findByCategory($categoryId, $options = array('limit' => 3, 'offset' => 2));


?>

<!DOCTYPE html>
<html lang="en">

<head>
<!--Bebas Neue-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<!--Oswald-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
<!--Styles-->
	<link rel="stylesheet" href="CSS/reset.css" />
	<link rel="stylesheet" href="CSS/grid.css" />
	<link rel="stylesheet" href="CSS/style.css" />

	<title>The Loop</title>
</head>
<body>


	<!--Header-->
	<div class="main-header" id="news1">
		<div class="logo1">
			<img src="imagesED/the_loop_logo-removebg-preview.png" alt="Logo">
		</div>
		<div class="nav-menu">
			<ul>
				<li>
					<h2><a href="#news2">News</a></h2>
				</li>
				<li>
					<h2><a href="#news3">Reviews</a></h2>
				</li>
				<li>
					<h2><a href="#news4">Top Artists</a></h2>
				</li>
				<li>
					<h2><a href="#news5">Other</a></h2>
				</li>
			</ul>
		</div>

		<div class="extra-info">
			<div class="login-container">
				<div class="log1 login-box">
					<h3>Sign Up</h3>
				</div>
				<div class="log2 login-box">
					<h3>Log In</h3>
				</div>
			</div>

			<div class="ourplaylist">
				<h2>Our Playlist</h2>
				<a href="#"><img class="spotify" src="imagesED/playlist.png"></a>
			</div>
		</div>
	</div>

	<!--Main_story-->
	<section>
	<div class="first_news">
		<div class="container">
		
		<!-- Your stories on the left -->
		
		<div class="newsleftstories width-3">
            <?php
                for($i=1; $i<count($stories); $i++) {
                    ?>
                    <div class="small-article">
                <img src="<?= $stories[$i]->img_url ?>" />
                <div class="content">
                
                <h3><a href="#"><?= $stories[$i]->headline ?></a></h3>
                <p class="author">By <?= Author::findById($stories[$i]->author_id)->first_name . " " . Author::findById($stories[$i]->author_id)->last_name ?></p>
                </div>
                </div>
 
                <?php }
                ?>  
            </div>
				

			<div class="Left_Panel width-9">
				<!-- Each one of these is your individual story content -->
                <?php
                $firstStory = $stories[0]
                ?>  
               
                <div class="main-article">
                <img src="<?= $firstStory->img_url ?>" />
				<h1><a href="#"><?= $firstStory->headline ?></a></h1>
                <div class="content">
                
                <p class="author">By <?= Author::findById($firstStory->author_id)->first_name . " " . Author::findById($firstStory->author_id)->last_name ?></p>
                </div>
                </div>
            </div>  
			<div class="width-12">
				<hr>
			</div>
	</div>
	</section>

	<!--News-->
	<div class="news" id="news2">
		<div class="container">

			<div class="width-12  title">
				<h1>News</h1>
			</div>

		<?php
			// Counter to keep track of iterations
			$iterationCount = 0;

			foreach ($sideStories as $s) {
   			 	// Check if it's every second iteration
    			$class = ($iterationCount % 2 === 1) ? "width-6" : "newsSides width-3";
			?>

			<div class="<?= $class ?>" >
    			<img src="<?= $s->img_url ?>" />
   			 <h3><?= Category::findById($s->category_id)->name ?></h3>
    			<h1><?= $s->headline ?></h1>
   			 <h3><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></h3>
   			 <div class="article"><?= substr($s->article, 0, 190) ?></div>
    			<p><?= date('d/m/Y', strtotime($s->updated_at)) ?></p>
			</div>

		<?php
 	 	  // Increment the iteration count
  	 	 $iterationCount++;
		}
		?>

			<div class="width-12 divider">
				<hr>
			</div>
		</div>
	</div>

	<!--Reviews-->
	<div class="reviews" id="news3">
		<div class="container">
			<div class="width-12 title">
				<h1>Reviews</h1>
			</div>

			<div class="width-8 Top_Panel">
				<div class="Top_Panel_Content">
					<img class="image1" src="imagesED/image15.png">
					<div class="text_panel">
						<h5>27/02/2024</h5>
						<h3>If Alien Life is Artificially Intelligent, it May be Stran...</h3>
						<p>Everything from Ozempic to Covid vaccines is tested on long-tailed macaques. Experts believe many are illegally trafficked from the wild.</p>
						<h5>Adam Pandey</h5>
					</div>
				</div>

				<div class="Top_Panel_Content">
					<img class="image1" src="imagesED/yeat-2093.png">
					<div class="text_panel">
						<h5>27/02/2024</h5>
						<h3>If Alien Life is Artificially Intelligent, it May be Stran...</h3>
						<p>Everything from Ozempic to Covid vaccines is tested on long-tailed macaques. Experts believe many are illegally trafficked from the wild.</p>
						<h5>Adam Pandey</h5>
					</div>
				</div>
			</div>
			

			<div class="width-4">
				<div class="Right_Panel">
					<div class="Right_Panel_Content">
						<img class="image2" src="imagesED/dontoliver.png">
						<div class="text_panel">
							<h5>27/02/2024</h5>
							<h3>If Alien Life is Artificially Intelligent, it May be Stran...</h3>
							<h5>Adam Pandey</h5>
						</div>
					</div>
					<div class="Right_Panel_Content">
						<img class="image2" src="imagesED/folk.png">
						<div class="text_panel">
							<h5>27/02/2024</h5>
							<h3>If Alien Life is Artificially Intelligent, it May be Stran...</h3>
							<h5>Adam Pandey</h5>
						</div>
					</div>
					<div class="Right_Panel_Content">
						<img class="image2" src="imagesED/fatherjohn.png">
						<div class="text_panel">
							<h5>27/02/2024</h5>
							<h3>If Alien Life is Artificially Intelligent, it May be Stran...</h3>
							<h5>Adam Pandey</h5>
						</div>
					</div>
				</div>

				<div class="width-12">
					<hr>
				</div>

			</div>
		</div>
	</div>

	<!--Top Artists-->
	<div class="top_artists" id="news4">
		<div class="container">
			<div class="width-12 top-title">
				<h1>Top Artists</h1>
			</div>
			<div class="width-1 circle">
				<img src="imagesED/artists/weekend2.png">
			</div>
			<div class="width-2 topart-text">
				<h2>1.The Weeknd</h2>
			</div>
			<div class="width-1 circle">
				<img src="imagesED/artists/TS.png">
			</div>
			<div class="width-2 topart-text">
				<h2>2.Taylor Swift</h2>
			</div>
			<div class="width-1 circle">
				<img src="imagesED/artists/kanye.png">
			</div>
			<div class="width-2 topart-text">
				<h2>3.Kanye West</h2>
			</div>
			<div class="width-1 circle">
				<img src="imagesED/artists/yeat.png">
			</div>
			<div class="width-2 topart-text">
				<h2>4.Yeat</h2>
			</div>
			<div class="width-1 circle">
				<img src="imagesED/artists/arianag.png">
			</div>
			<div class="width-2 topart-text">
				<h2>5.Ariana Grande</h2>
			</div>
			<div class="width-1 circle">
				<img src="imagesED/artists/carti.png">
			</div>
			<div class="width-2 topart-text">
				<h2>6.Playboi Carti</h2>
			</div>
			<div class="width-1 circle">
				<img src="imagesED/artists/Ed.png">
			</div>
			<div class="width-2 topart-text">
				<h2>7.Ed Sheeran</h2>
			</div>
			<div class="width-1 circle">
				<img src="imagesED/artists/scott.png">
			</div>
			<div class="width-2 topart-text">
				<h2>8.Travis Scott</h2>
			</div>
			<div class="width-1 circle">
				<img src="imagesED/artists/postmalone.png">
			</div>
			<div class="width-2 topart-text">
				<h2>9.Post Malone</h2>
			</div>
			<div class="width-1 circle">
				<img src="imagesED/artists/kidlaroi.png">
			</div>
			<div class="width-2 topart-text">
				<h2>10.The Kid LAROI</h2>
			</div>
			<div class="width-1 circle">
				<img src="imagesED/artists/Aries.png">
			</div>
			<div class="width-2 topart-text">
				<h2>11.Aries</h2>
			</div>
			<div class="width-1 circle">
				<img src="imagesED/artists/icespice.png">
			</div>
			<div class="width-2 topart-text">
				<h2>12.Ice Spice</h2>
			</div>
		</div>
	</div>

	<!--The Latest-->
	<div class="recents" id="news5">
		<div class="container">
			<div class="width-12 title">
				<h1>The Latest</h1>
			</div>

			<?php foreach ($sideStories as $s) { ?>
			<div class="width-6 image">
				<img src="<?= $s->img_url ?>" />
			</div>
			<div class="width-6 latest-text">
				<div>
					<h2><?= $s->headline ?></h2>
					<p>
					<h4><?= substr($s->article, 0, 200) ?></h4>
					</p>
					<h4>By Milana Raizensona</h4>
					<h4><?= date('d/m/Y', strtotime($s->updated_at)) ?></h4>
				</div>
			</div>
			<?php } ?>

		</div>	
	</div>

	<!--Footer-->
	<div class="footer">
		<div class="logo-and-search">
			<div class="logo2">
				<img class="logo2" src="imagesED/the_loop_logo-removebg-preview.png">
			</div>

			<div class="width-4 search">
				<h2>Subscribe to our newsletter</h2>
				<input type="text" placeholder="Search for news, brands, or products">
			</div>
		</div>
	

		<div class="infoftr container">
		
			<div class="width-12">
				<hr>
			</div>
			<div class="width-3 lists">
				<h2>Our Community</h2>
				<ul>
					<li>
						<a href="#">
							<h4>About Us</h4>
						</a>
					</li>
					<li>
						<a href="#">
							<h4>Events & Concerts</h4>
						</a>
					</li>
					<li>
						<a href="#">
							<h4>Merchandise</h4>
						</a>
					</li>
					<li>
						<a href="#">
							<h4>Contacts & Social Media</h4>
						</a>
					</li>
				</ul>
			</div>
			<div class="width-3 lists">
				<h2>Terms & Conditions</h2>
				</ul>
				<li><a href="#">
						<h4>Privacy Policy</h4>
					</a></li>
				<li>
					<a href="#">
						<h4>Cookie Notice</h4>
					</a>
				</li>
				<li>
					<a href="#">
						<h4>Terms of Use</h4>
					</a>
				</li>
				<li>
					<a href="#">
						<h4>Discount Codes</h4>
					</a>
				</li>
				</ul>
			</div>
			<div class="width-3 lists">
				<h2>Careers</h2>
				</ul>
				<li>
					<a href="#">
						<h4>Sponsorships</h4>
					</a>
				</li>
				<li>
					<a href="#">
						<h4>Careers For You</h4>
					</a>
				</li>
				</ul>
			</div>
			<div class="playlist-footer width-3">
				<h2>Our Playlist</h2>
				<a href="#"><img src="imagesED/playlist.png"></a>
			</div>
			<div class="width-12">
				<hr>
			</div>
		</div>
	</div>

</body>

</html>