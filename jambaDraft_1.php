<!DOCTYPE html>

<?php 
	session_start();
?>
<html>
<head>
	<title>Jamba Juice Menu</title>
	<link href='http://fonts.googleapis.com/css?family=Lily+Script+One|Walter+Turncoat|Indie+Flower|Chango' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type='html/css' href="jambaDraft_1.css">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<!-- JQuery Guts --> 
	<script type="text/javascript">
		$(document).ready(function(){
			$('.default').siblings().hide();

			
		// JEREMY"S CODE for TOGGLE
		//function attachEventListeners(selector) 
		// {
		// 	$('#'+selector).hover(function(){
		// 		// console.log($(this).children('.stats'));
		// 		$(this).children('div.stats').slideToggle();
		// 	});
		// }


			//functioning hide/show 
			// $('.default').hover(
			// 	function(){$(this).siblings().show(); $(this).style.display= 'none'; $(this).siblings().z-index(0);},
			// 	function(){} 
			// 	);

			$('.default').hover(function(){$(this).siblings().slideToggle();}, function(){$(this).siblings().slideToggle();});




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
			<img src="pic/twocup_carrier.jpg" alt="holder">
		</div>
		<h1> order for pick-up with three clicks</h1>
	</div>

	<div class='clear'></div>

<div id='main_menu'>

<div><div class='smoothie_type'>
		<h2>Classic Smoothies</h2>
	</div>
	
	
	
		<div class='item_wrapper'>
			<div class='default'>
				<h3>Peach Pleasure</h3>
				<h4>peaches, bananas, peach juice, orange sherbet 
				</h4>
			</div>
		</div>	
	
		<div class='item_wrapper'>
			<div class='default'>
				<h3> Strawberry Surf Rider</h3>
				<h4>strawberries, peaches, lemonade, lime sherbet
				</h4>
			</div>
		</div>
	
		<div class='item_wrapper'>
			<div class='default'>
				<h3>Mango-A-Go-Go</h3>
				<h4>mangos, passionfruit-mango juice, pineapple sherbet 
				</h4>
			
			<div class='popup'> 
				<img src="pic/MangoAgogo.jpg" alt="mango">
				<p>Mango-A-Go-Go <br>These mangos will get you movin’! Are you the president of the Mango Appreciation Society? Do you count mangos to fall asleep? Then welcome to paradise. We blend heaps of mangos and passion fruit-mango juice topped off with pineapple sherbet to make your dreams come true.</p>
								<form name="add_to_cart" action="">
									<br>
									<select>
									  <option value="1">1</option>
									  <option value="2">2</option>
									  <option value="3">3</option>
									  <option value="4">4</option>
									</select>
	
									<select>
									  <option value="volvo">16 oz - $2.50</option>
									  <option value="saab">22 oz - $3.50</option>
									  <option value="mercedes">30 oz - $3.99</option>
									</select>
									<input type="submit" value="Add to Cart">
								</form>
			</div>

			</div>
		</div>
	
		<div class='item_wrapper'>
			<div class='default'>
				<h3>Razzmatazz</h3>
				<h4>mixed berry juice, strawberries, bananas, orange sherbet
				</h4>
			</div>
		</div>	
	
		<div class='item_wrapper'>
			<div class='default'>
				<h3>Strawberries Wild</h3>
				<h4>strawberries, bananas, apple-strawberry juice, nonfat frozen yogurt
				</h4>
			</div>
		</div>
	
		<div class='item_wrapper'>
			<div class='default'>
				<h3>Caribbean Passion</h3>
				<h4> passionfruit-mango juice, strawberries, peaches, orange sherbet
				</h4>
			</div>
		</div>	
	
		<div class='item_wrapper'>
			<div class='default'>
				<h3>Banana Berry</h3>
				<h4>bananas, blueberries, apple-strawberry juice, raspberry sherbet, nonfat frozen yogurt
				</h4>
			</div>
		</div>
	
		<div class='item_wrapper'>
			<div class='default'>
				<h3>Orange-A-Peel</h3>
				<h4>orange juice, strawberries, bananas, frozen yogurt
				</h4>
			</div>
		</div>	
	
	
		<div class='item_wrapper'>
			<!-- EMPTY PLACEHOLDER DIV -->
			<div class='default'>
				<h3></h3>
				<h4>
				</h4>
			</div>
		</div>	
	
		<div class='item_wrapper'>
			<div class='default'>
				<h3>Pomegranate Pick-Up</h3>
				<h4>pomegranate juice, strawberries, blueberries, raspberry sherbet
				</h4>
			</div>
		</div>
	
		<div class='item_wrapper'>
			<div class='default'>
				<h3>Aloha Pineapple</h3>
				<h4>pineapple juice, strawberries, bananas, pineapple sherbet, nonfat plain yogurt
				</h4>
			</div>
		</div>
		

<div class="clear"></div>

<div class='smoothie_type'>
	<h2>All Fruit Smoothies</h2>
</div>
	
	
		<div class='item_wrapper'>
			<div class='default'>
				<h3>Strawberry Whirl</h3>
				<h4>strawberries, bananas, apple-strawberry juice
				</h4>
			</div>
		</div>	
	
		<div class='item_wrapper'>
			<div class='default'>
				<h3>Mega Mango</h3>
				<h4>mangos, strawberries, orange juice, pineapple juice
				</h4>
			</div>
		</div>
	
		<div class='item_wrapper'>
			<div class='default'>
				<h3>Pomegranate Paradise</h3>
				<h4>pomegranate juice, strawberries, mangos, peaches
				</h4>
			</div>
		</div>
	
		<div class='item_wrapper'>
			<div class='default'>
				<h3>Peach Perfection</h3>
				<h4>peaches, mangos, strawberries, peach and apple-strawberry juice 
				</h4>
			</div>
		</div>
		
		<div class='item_wrapper'>
			<div class='default'>
				<h3>Five Fruit Frenzy</h3>
				<h4>strawberries, bananas, peaches, mango, blueberries, peach juice, berry juice
				</h4>
			</div>
		</div>	

<div class='clear'></div>
<div class='smoothie_type'>
	<h2>Creamy Treats</h2>
</div>

		<div class='item_wrapper'>
			<div class='default'>
				<h3></h3>
				<h4>
				</h4>
			</div>
		</div>	
		<div class='item_wrapper'>
			<div class='default'>
				<h3> Chocolate Moo'd</h3>
				<h4>chocolate moo'd base, nonfat frozen yogurt
				</h4>
			</div>
		</div>	
		<div class='item_wrapper'>
			<div class='default'>
				<h3>Orange Dream Machine</h3>
				<h4>orange juice, orange sherbet, soymilk, nonfat frozen yogurt
				</h4>
			</div>
		</div>	
		<div class='item_wrapper'>
			<div class='default'>
				<h3></h3>
				<h4>
				</h4>
			</div>
		</div>	


		<div class='checkout'> 
				<h1>Review My Order</h1>

				<div id='enter_address'>
					<h3> Enter current address to find nearest store</h3>
					<input type="text" placeholder='your address'> <!-- make this tie into google API -->
				</div>

					<h4>Approximate time for pickup: </h4>
					<div id='ToD'> <h2>1:15pm</h2></div>
					<input type="submit" value='change'>
				

			</div>
	
	
	</div>

	</div>

</div>
</body>
</html>