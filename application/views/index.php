<?php
session_start();
// include 'connect.php';
?>
<!DOCTYPE html>
<html>

<?php
	// include 'head.php';
	echo "<title>GoHub</title>";
?>
<body>
	<div>
		<header>
			<div class="homepage_header">
						<img class="logo" src="templates/logo.png" alt="Hompe page" width="170" height="70">
						<a class="home" href="index.php">
                        <p class="home_page">
                                GoHub
                        </p>
							</a>
					<?php
					$hide ="";
						if(isset($_SESSION['login']))
						{
							echo "<button class='logined_user' id='toggle'>";
							echo '<img src="templates/loggedin.png" alt="user_pic" width="20" height="20">';
							echo $_SESSION['login_user_name'];
							echo "</button>";
							$hide = "hidden='hidden'";
						} 
					?>
					<div class="right-side" <?php echo $hide;?>>
						<a href="index.php/login">
							<button name="Login / Signup" class="login_button" ><img class="login" src="templates/login.png" alt="Login" width="25.41" height="25.41">  Login / Signup
							</button>
						</a>
					</div>
					
			</div>
		</header>
		<div class="user_info_box" id="user_box" hidden="hidden">
						<ul class="listing">
						<li>
								<a href="#">
								<span class="user_id">
								<img src="templates/loggedin.png" alt="user_pic" width="20" height="20">
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
								<a href="index.php/login">
									<button class="logout">LOGOUT</button>
								</a>
							</li>
						</ul>
					</div>
		<div class="hero">
			<div>
				<div class="hero_branding">
					<img class="hero_logo" src="templates/demoicon.jpg" alt="brand hero" width="170" height="100">
				</div>
				<div class="information-box">
					<form autocomplete="off" method="POST" action="index.php/search">
						<div class="autocomplete" style="width:300px;">
							<input id="cities" name="places" class="Location" type="text" placeholder="Enter palce or destination place" required>
						</div>
						<input name="init_date" class="init_date" type="date" required>
						<input name="final_date" class="final_date" type="date" required >
						<select class="room" name="room" required>
							<option class="single_room" value="single room">Single Room</option>
							<option class="double_room" value="double room">Double Room</option>
							<option class="family_room" value="family room">Family Room</option>
							<option class="multiple_room" value="multiple room">Multiple Room</option>
						</select>
						<button class="search" type="submit" name="submit" value="submit">
							<img class="" src="templates/search.png" alt="search" width="24" height="24">
						</button>	
					</form>
				</div>
			</div>
			<?php
			if(isset($_SESSION['login']))
			{
				$today = date('Y-m-d');
					$name =  $_SESSION['login_user_name'];
					$query = "SELECT * FROM booking WHERE user_name = '$name'";
					$result = mysqli_query($conn, $query);
					while($row = mysqli_fetch_array($result))
					{
						$hotel = $row[4];
						$init_date = $row[5];
						$final_date = $row[6];
						$room = $row[7];
						$price = $row[8];
						$pic = $row[9];
						if($today >= $final_date)
						{
							continue;
						}
						else
						{
							echo '
							<article class="booking-confirm">
								<div class="booking-area">
									<div class="booking-images">
										<img class="booking-places" src="places/'.$pic.'.jpg"  draggable="false">
									</div>
									<div class="booking-discrip">
										<h3 class="booking-hotel-name">'.$hotel.'</h3>
										<div class="book-date"><span>From: '.$init_date.'</span></div>
										<div class="book-date"><span>Till: '.$final_date.'</span></div>
									</div>

									<div class="booking-status">
										<div class="book-room"><span>'.$room.'</span></div>
										<div class="booking-price">
											<span class="rokda"><img src="templates/rupiyaa.png" height="15" width="15"> '.$price.'</span>
										</div>
										<button class="status-button" disabled="disabled">Booked </button>
									</div>
								</div>
							</article>
							';
						}
						
					}
			}
			?>
			
		</div>
		
	</div>
	<footer class="index_login">
		<div class= "news-letter">
			<form class ="form_foot"  method="POST" action="subscribe.php">
				<p class="news-letter-text">Want to receive exclusive hotel offers? Subscribe to our newsletter!</p>
				<input type="email" class="news-letter-box" placeholder="Email Address" name="email" required ><button class="email_submit" name="subscribe" value="subscribe" type="submit">Subscribe</button>
			</form>
		</div>
	</footer>

			<script>
	function autocomplete(inp, arr) {
	  /*the autocomplete function takes two arguments,
	  the text field element and an array of possible autocompleted values:*/
	  var currentFocus;
	  /*execute a function when someone writes in the text field:*/
	  inp.addEventListener("input", function(e) {
		  var a, b, i, val = this.value;
		  /*close any already open lists of autocompleted values*/
		  closeAllLists();
		  if (!val) { return false;}
		  currentFocus = -1;
		  /*create a DIV element that will contain the items (values):*/
		  a = document.createElement("DIV");
		  a.setAttribute("id", this.id + "autocomplete-list");
		  a.setAttribute("class", "autocomplete-items");
		  /*append the DIV element as a child of the autocomplete container:*/
		  this.parentNode.appendChild(a);
		  /*for each item in the array...*/
		  for (i = 0; i < arr.length; i++) {
			/*check if the item starts with the same letters as the text field value:*/
			if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
			  /*create a DIV element for each matching element:*/
			  b = document.createElement("DIV");
			  /*make the matching letters bold:*/
			  b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
			  b.innerHTML += arr[i].substr(val.length);
			  /*insert a input field that will hold the current array item's value:*/
			  b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
			  /*execute a function when someone clicks on the item value (DIV element):*/
			  b.addEventListener("click", function(e) {
				  /*insert the value for the autocomplete text field:*/
				  inp.value = this.getElementsByTagName("input")[0].value;
				  /*close the list of autocompleted values,
				  (or any other open lists of autocompleted values:*/
				  closeAllLists();
			  });
			  a.appendChild(b);
			}
		  }
	  });
	  /*execute a function presses a key on the keyboard:*/
	  inp.addEventListener("keydown", function(e) {
		  var x = document.getElementById(this.id + "autocomplete-list");
		  if (x) x = x.getElementsByTagName("div");
		  if (e.keyCode == 40) {
			/*If the arrow DOWN key is pressed,
			increase the currentFocus variable:*/
			currentFocus++;
			/*and and make the current item more visible:*/
			addActive(x);
		  } else if (e.keyCode == 38) { //up
			/*If the arrow UP key is pressed,
			decrease the currentFocus variable:*/
			currentFocus--;
			/*and and make the current item more visible:*/
			addActive(x);
		  } else if (e.keyCode == 13) {
			/*If the ENTER key is pressed, prevent the form from being submitted,*/
			e.preventDefault();
			if (currentFocus > -1) {
			  /*and simulate a click on the "active" item:*/
			  if (x) x[currentFocus].click();
			}
		  }
	  });
	  function addActive(x) {
		/*a function to classify an item as "active":*/
		if (!x) return false;
		/*start by removing the "active" class on all items:*/
		removeActive(x);
		if (currentFocus >= x.length) currentFocus = 0;
		if (currentFocus < 0) currentFocus = (x.length - 1);
		/*add class "autocomplete-active":*/
		x[currentFocus].classList.add("autocomplete-active");
	  }
	  function removeActive(x) {
		/*a function to remove the "active" class from all autocomplete items:*/
		for (var i = 0; i < x.length; i++) {
		  x[i].classList.remove("autocomplete-active");
		}
	  }
	  function closeAllLists(elmnt) {
		/*close all autocomplete lists in the document,
		except the one passed as an argument:*/
		var x = document.getElementsByClassName("autocomplete-items");
		for (var i = 0; i < x.length; i++) {
		  if (elmnt != x[i] && elmnt != inp) {
			x[i].parentNode.removeChild(x[i]);
		  }
		}
	  }
	  /*execute a function when someone clicks in the document:*/
	  document.addEventListener("click", function (e) {
		  closeAllLists(e.target);
	  });
	}
	
	/*An array containing all the country names in the world:*/
	var place= ["Hampi","Haridwar","Kerala Backwaters","Lakshadeep Island","Pushkar Fair","Varanasi Ghats","Cheraman Juma Masjid","Jama Mosque","Mecca Masjid","Old Juma Masjid","Ziarat Shareef","Adina Masjid","Charminar","Ajanta Ellora","Charminar","Fatehpur Sikri","Gateway of India","Humayun\'s Tomb","India Gate","Qutub Minar","Taj Mahal","Basilica of Bom Jesus","Chapel of St. Catherine","Gundala Church","Holy Trinity Church","Our Lady of the Rosary\'s Church","Reis Magos Church","St. Joseph\'s Cathedral","St. Francis of Assissi\'s Church","St. Mary\'s Church","he Cross of Miracles\'s Church","The Sacred Heart\'s Church","Adventure Islands","Entertainment City","Essel World","Fun n Food Village","Gujarat Science City","Kingdom of Dreams","Nicco Park","Ocean Park","Veega Land","Wonder La","Baba Amarnath Temple","Golden Temple","Lord Jagannath Temple","Kashi Vishwanath Temple","Khajuraho Temples","Konark Sun Temple","Ranakpur Jain Temples","Shri Meenakshi - Sundareshwarar Temple","Siddhivinayak Temple","Somnath Temple","Thanjavur Temple","Venkataswara Tirupati Balaji Templ","Brindavan Garden","Chambal Garden","Chashme Shahi Garden","Indian Botanical Garden","Lal Bagh Gardens","Lodhi Garden Mughal Gardens","Pinjore Garden","Rock Garden","Shalimar Bag","Alisagar Deer Park","Bandhavgarh National Park","Bori Wildlife Sanctuary","Hazaribagh Sanctuary","Gir National Park and Sanctuary","Hazaribagh Sanctuary","Kaziranga National Park","Manas Wildlife Sanctuary","Lonavala","Keoladeo National Park","Nanda Devi National Park","Sundarbans National Par","Barehipani Waterfalls","Dudhsagar Waterfalls","Jog Waterfalls","Jonha Waterfalls","Kunchikal Waterfalls","Kune Waterfalls","Langshiang Waterfalls","Meenmutty Waterfalls","Nohkalikai Waterfalls","Shivanasamudra Waterfalls","Chandratal Lake","Dal Lake","Hussain Sagar Lake","Loktak Lake","Osman Sagar Lake","Pushkar Lake","Roopkund Lake","Vembanad Lake","Wular Lake","Bhimtal Lake","Chilka Lake","Dal Lake","Darjeeling","Dehradun","Gangtok","Gangtok","Gangtok","Kodaikanal","Kullu and Manali","Mount Abu","Mussoorie","Ooty","Shillong","Shimla","Srinagar","Agra Fort","Amber Fort","Chittorgarh Fort","Fort William","Golconda Fort","Jaisalmer Fort","Kangra Fort","Red Fort or Lal Qila","Qila Mubarak","Ranthambhore Fort","Bir Singh Palace","Chail Palace","Jaipur City Palace","Jaivilas Palace","Jal Mahal","Lake Palace","Lalgarh Palace","Salim Singh ki Haveli","Udaipur City Palace","Umaid Bhawan Palace"];
	
	
	/*initiate the autocomplete function on the "cities" element, and pass along the place array as possible autocomplete values:*/
	autocomplete(document.getElementById("cities"), place);
	
	</script>
</body>

</html>