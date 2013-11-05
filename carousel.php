<html>
<head>
	<link rel="stylesheet" type="text/css" href="carou_style.css">
	<script type="text/javascript" src='http://code.jquery.com/jquery-1.9.1.js'></script>
	<script>
		function carousel()
		{
			var number = 0;
			var show = 1;
			$('.slide').hide();
			$('.slide').first().show();
			//$('.slide').animate({width: 'toggle'});
			
			
			function spin()
			{
				$('#slide'+show).animate({width: 'toggle'}).hide();
				number++;
				show= number%4 + 1;
				$('#slide'+show).animate({width: 'toggle'});
			}
			setInterval(function(){spin()},4000);
		}
		$(document).ready(function(){
			carousel();
		});
	</script>
	<title></title>
</head>
<body>
	<div id='wrapper'>
		<div id='carousel'>
			<button id='left'>Left</button>
			<button id='right'>Right</button>
			<div id='slide1' class='slide'>
				slide1
			</div>
			<div class='slide' id='slide2'>
				slide2
			</div>
			<div class='slide' id='slide3'>
				slide3
			</div>
			<div class='slide' id='slide4'>
				slide4
			</div>
		</div>
	</div>
</body>
</html>