<?php
	session_start();
	// include 'connect.php';

	$place1 ='';
	if(isset($_POST['submit']) == true)
	{
		$place1 = $_POST['places'];
		$init_date =$_POST['init_date'];
		$_SESSION['init_date']= $init_date;
		$final_date =$_POST['final_date'];
		$_SESSION['final_date']= $final_date;
		$room = $_POST['room'];
		$_SESSION['room']= $room;
		$start_date = date_create($init_date);
		$end_date = date_create($final_date);
		$diff = date_diff($start_date, $end_date);
		$new = $diff->format('%a');
		$new = $new+1;
		$_SESSION['nodays']= $new;
	}

	
	
?>
<!DOCTYPE html>
<html>

<?php
	include 'head.php';
?>
	<title><?php echo $place1;?> Hotels| Find or Compare on GoHub</title>
<body class="search_body">
	<div>
		<header>
			<div class="home_page_header">
			<img class="search_page_logo" src="<?php echo base_url('templates/Search_Page_Logo.PNG');?>" alt="Hompe page" width="170" height="63">
				
                <?php
					$hide ="";
						if(isset($_SESSION['login']))
						{
							echo "<button class='logined_user_search' id='toggle'>";
							echo '<img src="'.base_url('templates/loggedin.png').'" alt="user_pic" width="20" height="20">';
							echo $_SESSION['login_user_name'];
							echo "</button>";
							$hide = "hidden='hidden'";
						} 
					?>
					<a href="login.php">
						<button name="Login / Signup" class="login_button_search" <?php echo $hide;?>><img class="login" src="<?php echo base_url('templates/login.png');?>" alt="Login" width="25.41" height="25.41">  Login / Signup
						</button>
					</a>
			</div>
        </header>
        <div class="user_info_box" id="user_box" hidden="hidden">
						<ul class="listing">
						<li>
								<a href="#">
								<span class="user_id">
								<img src="<?php echo base_url('templates/loggedin.png');?>" alt="user_pic" width="20" height="20">
									<?php
										if(isset($_SESSION['login']))
										{
											echo $_SESSION['login_user'];
										} 
									?>
								</span>
							</a>
							</li>
							<li>
								<a href="test2.php">
									<button  class="logout">LOGOUT</button>
									
								</a>
							</li>
						</ul>
					</div>
		<div class="hero">
		<div class="item-list">
				
				
							<?php
							$place ='';
							$hotel = '';
							$today= date('Y-m-d');
							$new= strtotime($today);
							$new_date = date('d-m-y', $new);
							// echo '<span class ="info">'.$new_date.'</span>';
							// echo '<span class ="info">'.$init_date.'</span>';
							// echo '<span class ="info">'.$final_date.'</span>';
							// echo '<span class ="info">'.$room.'</span>';
							if($init_date == $today)
							{
								// echo 'its a match ';
							}
							
							echo'
							<h1 class="banner-of-place">
									Your Ideal place in  '.$place1.', India 
							</h1>
							';
							echo'
							<ul class="item-insider">
								<li class="list-insider">
							
							
							';

							if(isset($_POST['submit']) == true)
							{
								$place = $_POST['places'];
								$query = "select * from hotels where trip_place = '$place'";
								$result =  mysqli_query($conn, $query);
								while($row = mysqli_fetch_array($result))
								{
									$id = $row[0];
									$pic = $row[2];
									$hotel = $row[3]; 
									$rating = $row[4];
									$accomo = $row[5];
									$deal = $row[6];
									$rokda = $row[7];
									echo '<article class="article-class">';
									echo '<form method ="POST" action ="confirmation.php">';
									echo'<div class="text-area">';
									echo '
									<div class="lazy-image">
										<img class="lazy-places" src="places/'.$pic.'.jpg" height=222 widht=222  draggable="false">
									</div>
									';
									echo'<div class="hotel-details">';
									echo'
										<div class="hotel-discrip">
										<h3 class="hotel-name">'.$hotel.'</h3>
											<div class="rating">';
											for($i = 1; $i <= $rating; $i++)
											{
												echo'
												<span class="star-icon">
													<img src="templates/star.png" height="11" width="11" tabindex="1">
												</span>
												';
											}
											
												
									echo '<p class="accomodation-type">'.$accomo.'</p>
											</div>
											<div class="popularity">
												<button type="button" class="flairs" disabled><img src="templates/fire.png" height="24" width="24" tabindex="1"> Hot Property</button>
											</div>
										</div>
									</div>
									';
									echo'
									<div class="hotel-price">
										<section>
											<h3>Recommended Deal</h3>
											<p>'.$deal.'</p>
										</section>
									';
									echo'
									<div class="accomodation-price">
									<span class="rokda" name = "price" id = "price" value = "'.$rokda.'"><img src="templates/rupiyaa.png" height="15" width="15" > '.$rokda.'</span>
									<button id="'.$id.'" class="view-deals" type = "submit" name ="BOOKING" >View Deal  <img src="templates/white-chevron.png" height="13" width="13"></button>
									<input type="hidden" name="pid" value="'.$id.'">
									</div>
									';
									echo'</div>';
									echo'</div>';
									echo '</form>';
									echo '</article>';
								
									
								}	
							}
							
							?>
						
					</li>
				</ul>
			</div>
		</div>
		
	</div>
	
</body>
</html>