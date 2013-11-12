<!DOCTYPE html>

<?php 
	session_start();
?>
<html>
<head>
	<title>JAMBA!</title>
	<link href="../../bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet" media="screen">

	<link href='http://fonts.googleapis.com/css?family=Lily+Script+One|Walter+Turncoat|Indie+Flower|Chango' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type='text/css' href="font\webfontkit-meta\stylesheet.css" charset="utf-8"> <!-- brings in webfonts -->
	<link rel="stylesheet" type='html/css' href="jambaDraft_1.css">
	<script type="text/javascript" src='http://code.jquery.com/jquery-1.9.1.js'></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<script src="../../bootstrap/docs/assets/js/bootstrap.min.js"></script>
	<!-- JQuery Guts --> 
	<script>
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

			$('#left').click(function(){
				carousel.reverseSpin();
			});

			$('#right').click(function(){
				carousel.spin();
			});

			setInterval(function(){carousel.spin()},3000);

		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			//line below: sets popup descriptions to hide by default
			$('.item_wrapper').children(".popup").hide();
			//line below: handles toggling the pop-up, and changes background color to white during hover
			$('.item_wrapper').hover(function(){$(this).children('.popup').slideToggle();$(this).css('background-color', 'white');$(this).css("color", "black");}, function(){$(this).children('.popup').hide();$(this).css("background-color", "transparent");$(this).css("color", "white");});
						
			});
	
	</script>
</head>

<body>
<div id="body_wrapper">
	<div id='top_bar'> 
		<div id='logo'></div>
		<div id='jamba_text'>
			<img src="pic/jambajuice_text_wide.jpg" alt="jamba juice">
		</div>
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

			 	?>" alt="holder">
			<div id='testcupholderdata'>

				<?php 
					if (isset($_SESSION['total_drinks'])) 
					{
						echo $_SESSION['total_drinks'];
					
					}
				?>

			</div>
		</div>
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

								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/PeachPleasure.jpg" alt="peachpls">
							<p>Peach Pleasure Smoothie Let’s give you some cold fuzzies.  Lounge beneath a shady tree with this blend of peaches, bananas and orange sherbet and while away your carefree afternoon wondering who will accompany you to the ball.</p>
						</div>
					</div>	
				
					
					<div class='item_wrapper'>
						<h3> Strawberry Surf Rider</h3>
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
						<h3></h3>
						<h4>
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

								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/name.jpg" alt="">
							<p>desc</p>
						</div>
					</div>
					<div class='item_wrapper'>
						<h3> Chocolate Moo'd</h3>
						<h4>chocolate moo'd base, nonfat frozen yogurt</h4>
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

								<input type="hidden" name="action" value="add_to_cart">
								<input type="submit" value="Add to Order">
							</form>

							<img src="pic/OrangeDream.jpg" alt="">
							<p>Feed your dreams. Thoughts of this amazing smoothie occupy your every waking moment and invade your slumber. Visions of orange juice, orange sherbet and nonfat vanilla frozen yogurt dancing together fill your nights. Isn’t it time you made this dream come true?</p>
						</div>
					</div>					
				</div>
				<div id='column2' class='column'>					
				</div>				
			</div>
		</div>
<!-- ABOVE IS CAROUSEL -->



<!-- CHECKOUT MODAL BELOW -->
<!-- 
clear button -->

	<form value="add_to_cart" name="clear_cart" action="process.php" method="post">		
		<input type="hidden" name="action" value="clear_cart">
		<input type="submit" value="clear cart">
	</form>

	<div class='clear'></div>

		<!-- Button trigger modal -->

	<div id='specialbutton'><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
		  Launch demo modal
		</button>
	</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



		<!-- <div class='checkout'> 
				<h1>Review My Order</h1>

				<div id='enter_address'>
					<h3> Enter current address to find nearest store</h3>
					<input type="text" placeholder='your address'> <!-- make this tie into google API -->
				<!-- </div>

					<h4>Approximate time for pickup: </h4>
					<div id='ToD'> <h2>1:15pm</h2></div>
					<input type="submit" value='change'>		
			</div> -->

	</div>
</div>
</body>
</html>