<!DOCTYPE html>
<meta charset="utf-8">

<?php 
	session_start();
?>
<html>
<head>
	<title>Order Jamba Online</title>
	<link rel="icon" type="image/ico" href="pic/favicon.ico">
	<link href="../../bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Lily+Script+One|Walter+Turncoat|Indie+Flower|Chango' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type='text/css' href="font\webfontkit-meta\stylesheet.css" charset="utf-8"> <!-- brings in webfonts -->
	<script type="text/javascript" src='http://code.jquery.com/jquery-1.9.1.js'></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<script src="../../bootstrap/docs/assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type='html/css' href="jambaDraft_1.css">
	<!-- JQuery Guts --> 
	<script type="text/javascript">
		function Carousel()
		{
			var number = 0;
			var show = 1;
			
			$('.slide').hide();
			$('.slide').first().show();
			// $('.slide').animate({width: 'toggle'});
			
			this.spin = function()
			{				
				// $('#slide'+show).animate({width: 'toggle'}).hide();
				$('#slide'+show).hide();
				number++;
				show= number%3 + 1;
				// $('#slide'+show).animate({width: 'toggle'});
				$('#slide'+show).show();
			}
			this.reverseSpin = function()
			{				
				// $('#slide'+show).animate({width: 'toggle'}).hide();
				$('#slide'+show).hide();
				number--;
				show= number%3 + 1;
				// $('#slide'+show).animate({width: 'toggle'});
				$('#slide'+show).show();
			}
		}

		$(document).ready(function(){
			var carousel = new Carousel();
			var isSpin = 0;

			$('#left').click(function(){
				carousel.reverseSpin();
			});

			$('#right').click(function(){
				carousel.spin();
			});

			$('#drinkhold').click(function(){
				$('#AllModals').show();
			});

			// setting modal elements to hide by default so as to not interrupt hover functions
			$('#AllModals').hide();
			//line below: sets popup descriptions to hide by default
			$('.item_wrapper').children(".popup").hide();
			//line below: handles toggling the pop-up, and changes background color to white during hover
			$('.item_wrapper').hover(function(){$(this).children('.popup').slideToggle();$(this).css('background-color', 'white');$(this).css("color", "black"); isSpin=1;}, function(){$(this).children('.popup').hide();$(this).css("background-color", "transparent");$(this).css("color", "white");isSpin=0;});
								
			// true/ if spin false
			
			// setInterval(function(){carousel.spin()},6000);

			// if(isSpin==1)
			// {
			// 	setInterval(function(){carousel.spin()},10000);				
			// }

		});
	</script>
	<script>
		<?php 
			function printOrderRow($lineArray)
			{
				foreach ($lineArray as $key => $l)
				{
					echo "<td>   ".$l."... </td>";
				}
			}

			function printDeleteButton($drinkname)
			{
				echo "<button name='deleteItem' value='".$drinkname."' action='process.php' method='post' type='button' class='btn btn-warning btn-xs'>&times;</button>      ";
			}
		 ?>
	</script>

</head>

<body>
<div id="body_wrapper">
	<div id='top_bar'> 
		<div id='logo'></div>
		<div id='jamba_text'>
			<img src="pic/jambajuice_text_wide.jpg" alt="jamba juice">
		</div>
<!-- 	Below: wrapped drinkholder in generic bootstrap button so that it can open up modals -->
		<a data-toggle="modal" href="#myModal">
			<div id='drinkhold'>
			<img src="pic/
				<?php 
					if (!isset($_SESSION['total_drinks'])) {
						echo "empty_carrier.jpg";
					}
					elseif ($_SESSION['total_drinks']==0) {
						echo "empty_carrier.jpg";
					}
					elseif ($_SESSION['total_drinks']==1) {
						echo "one_carrier.jpg";
					}
					elseif ($_SESSION['total_drinks']==2) {
						echo "two_carrier.jpg";
					}
					elseif ($_SESSION['total_drinks']==3) {
						echo "three_carrier.jpg";
					}

					elseif ($_SESSION['total_drinks']==4) {
						echo "three_carrier.jpg style='height:20px;width:100px;'";
					}

			 	?>" href='google.com' alt="holder">
			<div id='testcupholderdata'>

				<?php 
					if (isset($_SESSION['total_drinks'])) 
					{
						echo $_SESSION['total_drinks'];
					
					}
				?>

			</div>
			</div>
		</a>
		<h1> order for pick-up with three clicks</h1>
	</div>

	<div class='clear'></div>

	<div id='carousel'>
  		<button id='left' class='btn btn-inverse btn-large' value=""> <i class='icon-chevron-left icon-white'> </i></button>
		<button id='right' class='btn btn-inverse btn-large'> <i class='icon-chevron-right icon-white'> </i> </button>
		<div id='slide1' class='slide' >
			<div class='bigslide'>
				<div class='smoothie_type'>
					<h2>Classic Smoothies</h2>
				</div>

				<div id='column1' class='column'>
				
					<div class='item_wrapper'>
						<h3>Peach Pleasure</h3>
						<h4>peaches, bananas, peach juice, orange sherbet</h4>
						<div class='popup'> 
							<form name="drink_form" action="process.php" method="post">
								<select name='number_drinks'>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>

								<select name="size">
								  <option value="16oz">16 oz - $2.50</option>
								  <option value="22oz">22 oz - $3.50</option>
								  <option value="30oz">30 oz - $3.99</option>
								</select>

								<input type="hidden" name='drinkname' value='Peach Pleasure'>
								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/PeachPleasure.jpg" alt="peachpls">
							<p>Peach Pleasure Smoothie Let’s give you some cold fuzzies.  Lounge beneath a shady tree with this blend of peaches, bananas and orange sherbet and while away your carefree afternoon wondering who will accompany you to the ball.</p>
						</div>
					</div>	
				
					
					<div class='item_wrapper'>
						<h3>Strawberry Surf Rider</h3>
						<h4>strawberries, peaches, lemonade, lime sherbet</h4>
						<div class='popup'> 
							<form name="drink_form" action="process.php" method="post">
								<select name='number_drinks'>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>

								<select name="size">
								  <option value="16oz">16 oz - $2.50</option>
								  <option value="22oz">22 oz - $3.50</option>
								  <option value="30oz">30 oz - $3.99</option>
								</select>

								<input type="hidden" name='drinkname' value='Strawberry Surf Rider'>
								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/StrawberrySurfrider.jpg" alt="strawsurf">
							<p>Hang ten and all that. Let’s be honest: Strawberries can’t surf. That’s what the peaches are for. Enjoy some peaches teaching strawberries how to surf on an ocean of lemonade next to beaches made of lime sherbet. It’s radical.</p>
						</div>
					</div>

					<div class='item_wrapper'>
						<h3>Mango-A-Go-Go</h3>

						<h4>mangos, passionfruit-mango juice, pineapple sherbet</h4>
					
						<div class='popup'> 
							<form name="drink_form" action="process.php" method="post">
								<select name='number_drinks'>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>

								<select name="size">
								  <option value="16oz">16 oz - $2.50</option>
								  <option value="22oz">22 oz - $3.50</option>
								  <option value="30oz">30 oz - $3.99</option>
								</select>

								<input type="hidden" name='drinkname' value='Mango-A-Go-Go'>
								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/MangoAgogo.jpg" alt="mango">
							<p>These mangos will get you movin’! Are you the president of the Mango Appreciation Society? Do you count mangos to fall asleep? Then welcome to paradise. We blend heaps of mangos and passion fruit-mango juice topped off with pineapple sherbet to make your dreams come true.</p>
						</div>
					</div>
				
					<div class='item_wrapper'>
						<h3>Razzmatazz</h3>
						<h4>mixed berry juice, strawberries, bananas, orange sherbet
						</h4>
						<div class='popup'> 
							<form value="add_to_cart" name="add_to_cart" action="process.php" method="post">
								<select name='number_drinks'>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>

								<select name="size">
								  <option value="16oz">16 oz - $2.50</option>
								  <option value="22oz">22 oz - $3.50</option>
								  <option value="30oz">30 oz - $3.99</option>
								</select>

								<input type="hidden" name='drinkname' value='Razzmatazz'>
								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/Razzamatazz.jpg" alt="">
							<p>Razzamatazz
								Dazzling you with the power of berries.
								Your mouth won’t know which way to say “yummers!” with this super blend. Strawberries, bananas and mixed berry juice all jump in this sea of goodness to create the magnum opus of berrydom.</p>
						</div>
					</div>

					<div class='item_wrapper'>
						<h3>Strawberries Wild</h3>

						<h4>strawberries, bananas, apple-strawberry juice, nonfat frozen yogurt
						</h4>
						<div class='popup'> 
							<form name="drink_form" action="process.php" method="post">
								<select name='number_drinks'>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>

								<select name="size">
								  <option value="16oz">16 oz - $2.50</option>
								  <option value="22oz">22 oz - $3.50</option>
								  <option value="30oz">30 oz - $3.99</option>
								</select>
								
								<input type="hidden" name='drinkname' value='Strawberries Wild'>
								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/StrawberryWild.jpg" alt="strawwild">
							<p>Strawberries Wild
								Free-range strawberry goodness.
								It’s a little known fact that, in the wild, strawberries are drawn to bananas and frozen yogurt. If you’re really lucky you’ll get a glimpse of them making juice with some apples. Good thing we know this; the results are delicious.</p>
						</div>
					</div>
				</div>
				<div id='column2' class='column'>
				
						<div class='item_wrapper'>
							<h3>Caribbean Passion</h3>												
							<h4> passionfruit-mango juice, strawberries, peaches, orange sherbet
							</h4>
							<div class='popup'> 
								<form name="drink_form" action="process.php" method="post">
									<select name='number_drinks'>
									  <option value="1">1</option>
									  <option value="2">2</option>
									  <option value="3">3</option>
									  <option value="4">4</option>
									</select>

									<select name="size">
									  <option value="16oz">16 oz - $2.50</option>
									  <option value="22oz">22 oz - $3.50</option>
									  <option value="30oz">30 oz - $3.99</option>
									</select>

									<input type="hidden" name='drinkname' value='Caribbean Passion'>
									<input type="hidden" name="action" value="add_to_cart">
									<input type="submit" value="Add to Order">
								</form>

								<img src="pic/CarribeanPassion.jpg" alt="carpas">
								<p>Caribbean Passion Smoothie
									Beat the heat, the island way.
									Get whisked away to a lush tropical island by a blend of strawberries, peaches, passion fruit-mango juice and orange sherbet. Are you being serenaded by birds of paradise? No, that’s a car horn; you’re daydreaming in the parking lot again.</p>
							</div>
						</div>
				
						<div class='item_wrapper'>
							<h3>Banana Berry</h3>							
							<h4>bananas, blueberries, apple-strawberry juice, raspberry sherbet, nonfat frozen yogurt
							</h4>
							<div class='popup'> 
								<form name="drink_form" action="process.php" method="post">
									<select name='number_drinks'>
									  <option value="1">1</option>
									  <option value="2">2</option>
									  <option value="3">3</option>
									  <option value="4">4</option>
									</select>

									<select name="size">
									  <option value="16oz">16 oz - $2.50</option>
									  <option value="22oz">22 oz - $3.50</option>
									  <option value="30oz">30 oz - $3.99</option>
									</select>

									<input type="hidden" name='drinkname' value='Banana Berry'>
									<input type="hidden" name="action" value="Add to Cart">
									<input type="submit" value="Add to Order">
								</form>

								<img src="pic/BananaBerry.jpg" alt="banber">
								<p>Banana Berry Smoothie
									Bursting at the seams with berries!
									These bananas came to party and they brought all of their friends. Strawberries, blueberries and raspberry sherbet take this smoothie to the next level. Maximum volume isn’t good enough; this smoothie turns it up to 11. </p>
							</div>
						</div>
				
						<div class='item_wrapper'>
							<h3>Orange-A-Peel</h3>
							<h4>orange juice, strawberries, bananas, frozen yogurt
							</h4>
							<div class='popup'> 
								<form name="drink_form" action="process.php" method="post">
									<select name='number_drinks'>
									  <option value="1">1</option>
									  <option value="2">2</option>
									  <option value="3">3</option>
									  <option value="4">4</option>
									</select>

									<select name="size">
									  <option value="16oz">16 oz - $2.50</option>
									  <option value="22oz">22 oz - $3.50</option>
									  <option value="30oz">30 oz - $3.99</option>
									</select>
							
									<input type="hidden" name='drinkname' value='Orange-A-Peel'>
									<input type="hidden" name="action" value="add_to_cart">
									<input type="submit" value="Add to Order">
								</form>

								<img src="pic/Orangeapeel.jpg" alt="orgpl">
								<p>Orange-A-Peel Smoothie
									The best of both worlds.
									Is it possible that we’ve struck a balance between sweet and tart, ending that conflict for good? Will combining strawberries, bananas, orange juice, and frozen yogurt create smoothie nirvana? We do believe so.</p>
							</div>
						</div>
							
						<div class='item_wrapper'>
							<h3>Pomegranate Pick-Up</h3>
							<h4>pomegranate juice, strawberries, blueberries, raspberry sherbet
							</h4>
							<div class='popup'> 
								<form value="add_to_cart" name="add_to_cart" action="process.php" method="post">
									<select name='number_drinks'>
									  <option value="1">1</option>
									  <option value="2">2</option>
									  <option value="3">3</option>
									  <option value="4">4</option>
									</select>

									<select name="size">
									  <option value="16oz">16 oz - $2.50</option>
									  <option value="22oz">22 oz - $3.50</option>
									  <option value="30oz">30 oz - $3.99</option>
									</select>

									<input type="hidden" name='drinkname' value='Pomegranate Pick-Up'>
									<input type="hidden" name="action" value="add_to_cart">
									<input type="submit" value="Add to Order">
								</form>

								<img src="pic/PomegranatePickmeup.jpg" alt="">
								<p>A unique way to lift your day. Pomegranates are the shy but sincerely cool kids of the fruit world. But give this ruby-gemmed wonder some strawberries, blueberries and raspberry sherbet and she comes out of her shell. Here’s to the new life of the party.</p>
							</div>
						</div>
				
						<div class='item_wrapper'>
							<h3>Aloha Pineapple</h3>
							<h4>pineapple juice, strawberries, bananas, pineapple sherbet, nonfat plain yogurt
							</h4>
							<div class='popup'> 
								<form name="drink_form" action="process.php" method="post">
									<select name='number_drinks'>
									  <option value="1">1</option>
									  <option value="2">2</option>
									  <option value="3">3</option>
									  <option value="4">4</option>
									</select>

									<select name="size">
									  <option value="16oz">16 oz - $2.50</option>
									  <option value="22oz">22 oz - $3.50</option>
									  <option value="30oz">30 oz - $3.99</option>
									</select>

									<input type="hidden" name='drinkname' value='Aloha Pineapple'>
									<input type="hidden" name="action" value="add_to_cart">
									<input type="submit" value="Add to Order">
								</form>

								<img src="pic/PineappleAloha.jpg" alt="pinealoha">
								<p>Aloha Pineapple Smoothie
									It’s a luau for your mouth!
									Dream of relaxing on black sand beaches beneath waving palm trees and cooling off with this blend of strawberries, bananas, and pineapple sherbet. Gigantic sunbrella and tiki bar not included.</p>
							</div>
						</div>
				</div>
			</div>
		</div>

		<div id='slide2' class='slide'>
			<div class='bigslide'>
				<div class='smoothie_type'>
					<h2>All Fruit Smoothies</h2>
				</div>					
					
				<div id='column1' class='column'>
					<div class='item_wrapper'>
						<h3>Strawberry Whirl</h3>
						<h4>strawberries, bananas, apple-strawberry juice</h4>	
						<div class='popup'> 
							<form value="add_to_cart" name="add_to_cart" action="process.php" method="post">
								<select name='number_drinks'>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>

								<select name="size">
								  <option value="16oz">16 oz - $2.50</option>
								  <option value="22oz">22 oz - $3.50</option>
								  <option value="30oz">30 oz - $3.99</option>
								</select>

								<input type="hidden" name='drinkname' value='Strawberry Whirl'>
								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/StrawberryWhirl.jpg" alt="">
							<p>desc</p>
						</div>						
					</div>	
				
					<div class='item_wrapper'>
						<h3>Mega Mango</h3>
						<h4>mangos, strawberries, orange juice, pineapple juice</h4>
						<div class='popup'> 
							<form value="add_to_cart" name="add_to_cart" action="process.php" method="post">
								<select name='number_drinks'>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>

								<select name="size">
								  <option value="16oz">16 oz - $2.50</option>
								  <option value="22oz">22 oz - $3.50</option>
								  <option value="30oz">30 oz - $3.99</option>
								</select>

								<input type="hidden" name='drinkname' value='Mega Mango'>								
								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/MegaMango.jpg" alt="">
							<p>Whoa, that’s one big mango.
								Gaze upon our towering monolith to the mango. We offer up strawberries, exotic juices and of course piles of mangos in order to appease our mighty lord of the fruits. It is good, and he is pleased.</p>
						</div>
					</div>
				
					<div class='item_wrapper'>
						<h3>Pomegranate Paradise</h3>
						<h4>pomegranate juice, strawberries, mangos, peaches</h4>
						<div class='popup'> 
							<form value="add_to_cart" name="add_to_cart" action="process.php" method="post">
								<select name='number_drinks'>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>

								<select name="size">
								  <option value="16oz">16 oz - $2.50</option>
								  <option value="22oz">22 oz - $3.50</option>
								  <option value="30oz">30 oz - $3.99</option>
								</select>
								
								<input type="hidden" name='drinkname' value='Pomegranate Paradise'>								
								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/PomegranateParadise.jpg" alt="">
							<p>desc</p>
						</div>
					</div>
				</div>
				<div id='column2' class='column'>

					<div class='item_wrapper'>
						<h3>Peach Perfection</h3>
						<h4>peaches, mangos, strawberries, peach and apple-strawberry juice</h4>
						<div class='popup'> 
							<form value="add_to_cart" name="add_to_cart" action="process.php" method="post">
								<select name='number_drinks'>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>

								<select name="size">
								  <option value="16oz">16 oz - $2.50</option>
								  <option value="22oz">22 oz - $3.50</option>
								  <option value="30oz">30 oz - $3.99</option>
								</select>
								
								<input type="hidden" name='drinkname' value='Peach Perfection'>								
								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/PeachPerfection.jpg" alt="">
							<p>No fruit is more fastidious. The peach is very particular about her associates. Mangos, strawberries and two kinds of fruit juice ensure that she’s always seen with the right people. After all, she has a reputation to maintain.</p>
						</div>
					</div>
					
					<div class='item_wrapper'>
						<h3>Five Fruit Frenzy</h3>
						<h4>strawberries, bananas, peaches, mango, blueberries, peach juice, berry juice</h4>
						<div class='popup'> 
							<form value="add_to_cart" name="add_to_cart" action="process.php" method="post">
								<select name='number_drinks'>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>

								<select name="size">
								  <option value="16oz">16 oz - $2.50</option>
								  <option value="22oz">22 oz - $3.50</option>
								  <option value="30oz">30 oz - $3.99</option>
								</select>

								<input type="hidden" name='drinkname' value='Five Fruit Frenzy'>
								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/FiveFruitFrenzy.jpg" alt="">
							<p>desc</p>
						</div>
					</div>	
				</div>
			</div>
		</div>

		<div id='slide3' class='slide'>
			<div class='bigslide'>
				<div class='smoothie_type'>
					<h2>Creamy Treats</h2>
				</div>
				<div id='column1' class='column'>
					<div class='item_wrapper'>
						<h3>Peanut Butter Moo'd Smoothie</h3>
						<h4>Peanut butter, bananas, nonfat vanilla frozen yogurt and milk chocolate</h4>
						<div class='popup'> 
							<form value="add_to_cart" name="add_to_cart" action="process.php" method="post">
								<select name='number_drinks'>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>

								<select name="size">
								  <option value="16oz">16 oz - $2.50</option>
								  <option value="22oz">22 oz - $3.50</option>
								  <option value="30oz">30 oz - $3.99</option>
								</select>

								<input type="hidden" name='drinkname' value='Peanut Butter Mood Smoothie'>
								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/PeanutbutterMood.jpg" alt="">
							<p>Almost too delicious.These cows sure know what we like. Peanut butter, bananas, nonfat vanilla frozen yogurt and our chocolate moo’d milk chocolate are the perfect combination to lure us in. Why are they keeping us happy and docile? We’re on to you, cows!</p>
						</div>
					</div>
					<div class='item_wrapper'>
						<h3>Chocolate Moo'd</h3>
						<h4>nonfat vanilla frozen yogurt and milk chocolate</h4>
						<div class='popup'> 
							<form value="add_to_cart" name="add_to_cart" action="process.php" method="post">
								<select name='number_drinks'>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>

								<select name="size">
								  <option value="16oz">16 oz - $2.50</option>
								  <option value="22oz">22 oz - $3.50</option>
								  <option value="30oz">30 oz - $3.99</option>
								</select>

								<input type="hidden" name='drinkname' value='Chocolate Mood'>
								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/ChocolateMood.jpg" alt="">
							<p>Because you’re always in the mood. Chocolate has been engineered to creep into your innermost thoughts, sabotaging productivity and creating maddening distractions. Fight back with this blend of nonfat vanilla frozen yogurt and creamy chocolate blend. Take back your mind!</p>
						</div>
					</div>
					<div class='item_wrapper'>
						<h3>Orange Dream Machine</h3>
						<h4>orange juice, orange sherbet, soymilk, nonfat frozen yogurt</h4>
						<div class='popup'> 
							<form value="add_to_cart" name="add_to_cart" action="process.php" method="post">
								<select name='number_drinks'>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>

								<select name="size">
								  <option value="16oz">16 oz - $2.50</option>
								  <option value="22oz">22 oz - $3.50</option>
								  <option value="30oz">30 oz - $3.99</option>
								</select>

								<input type="hidden" name='drinkname' value='Orange Dream Machine'>
								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/OrangeDream.jpg" alt="">
							<p>Feed your dreams. Thoughts of this amazing smoothie occupy your every waking moment and invade your slumber. Visions of orange juice, orange sherbet and nonfat vanilla frozen yogurt dancing together fill your nights. Isn’t it time you made this dream come true?</p>
						</div>
					</div>					
				</div>
				<div id='column2' class='column'>

					<div class='item_wrapper'>
						<h3>Pumpkin Smash</h3>
						<h4>real pumpkin blended with frozen yogurt and a hint of cinnamon and nutmeg</h4>
						<div class='popup'> 
							<form value="add_to_cart" name="add_to_cart" action="process.php" method="post">
								<select name='number_drinks'>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>

								<select name="size">
								  <option value="16oz">16 oz - $2.50</option>
								  <option value="22oz">22 oz - $3.50</option>
								  <option value="30oz">30 oz - $3.99</option>
								</select>

								<input type="hidden" name='drinkname' value='Pumpkin Smash'>
								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/pumpkinsmash.jpg" alt="">
							<p>Pumpkin Pie’s Fitter, Cooler Cousin. This deliciously creamy treat celebrates autumn’s most iconic fruit! This Fall classic of real pumpkin blended with frozen yogurt and a hint of cinnamon and nutmeg will have you dreaming of Grammy’s homemade pumpkin pie.</p>
						</div>
					</div>						
		
					<div class='item_wrapper'>
						<h3>Matcha Green Tea Blast</h3>
						<h4>nonfat vanilla frozen yogurt, sorbet and Matcha Green Tea</h4>
						<div class='popup'> 
							<form value="add_to_cart" name="add_to_cart" action="process.php" method="post">
								<select name='number_drinks'>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>

								<select name="size">
								  <option value="16oz">16 oz - $2.50</option>
								  <option value="22oz">22 oz - $3.50</option>
								  <option value="30oz">30 oz - $3.99</option>
								</select>

								<input type="hidden" name='drinkname' value='Matcha Green Tea Blast'>
								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/Greenteamatcha.jpg" alt="">
							<p>Stay calm, have a smoothie. Find your center with this blend of nonfat vanilla frozen yogurt, sorbet and Matcha Green Tea. Banish all negative thoughts, reach for your toes and take a sip of your smoothie. Now look to the sun; you’ve found your center.</p>
						</div>
					</div>						
				</div>				
			</div>
		</div>
<!-- ABOVE IS CAROUSEL -->

	<div class='clear'></div>
			
	<div id='AllModals'>
		<!-- First Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss='modal' aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel"> Confirm your order</h4>
		      </div>
		      <div class="modal-body">
		        <?php
		        	// var_dump($_SESSION['order_array']);
		        	$a=$_SESSION['order_array'];

		        	echo "<table class='table table-hover'>";

		        	foreach ($a as $key => $order_row)
		        	{
		        		echo "<tr class = 'grey'>".printDeleteButton($order_row['drink_name']).printOrderRow($order_row).'</tr>';
		        	}

		        	echo "</table>";
		        ?>
	        	<form name="clear_cart" action="process.php" method="post">		
					<input type="hidden" name="action" value="clear_cart">
					<input type="submit" value="clear cart">
				</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss='modal'>Back</button>
		        <button type="button" class="btn btn-primary" data-dismiss='modal' data-toggle="modal" href="#myModal2"> Proceed to checkout</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<!-- Modal -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss='modal' aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Enter Payment</h4>
		      </div>
		      <div class="modal-body">
					<button type="button" class="close" data-dismiss='modal' aria-hidden="true">&times;</button>
				<div class='checkout'> 

						<h1>Review My Order</h1>

						<div id='enter_address'>
							<h3> Enter current address to find nearest store</h3>
							<input type="text" placeholder='your address'> make this tie into google API
						</div>

							<h4>Approximate time for pickup: </h4>
							<div id='ToD'> <h2>1:15pm</h2></div>
							<input type="submit" value='change'>		
				</div>
		        ...
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" href="#myModal">Back</button>
		        <button type="button" class="btn btn-primary" data-dismiss='modal' data-toggle="modal" href="#myModal3"> Order</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<!-- Modal -->
		<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Thank you</h4>
		      </div>
		      <div class="modal-body">
		        Your order will be ready for pickup at the bellevue location, in approximately 30 minutes
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div>

	</div>


	</div>
</div>
</body>
</html>