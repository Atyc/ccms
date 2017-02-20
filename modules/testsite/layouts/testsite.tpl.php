<!DOCTYPE html>
<html<?= !empty($_COOKIE['rem']) ? ' style="font-size: '.$_COOKIE['rem'].'px; "' : '' ?>>
<head>
	<meta charset="UTF-8">
	<script type="text/javascript">
		var _orientation = function(){if (typeof window.orientation != 'undefined') return (window.orientation == 0 || window.orientation == 180) ? 900 : 1024;
				else return screen.width > 768 ? 1024 : 900;}
    	document.write('<meta name="viewport" content="width='+(screen.width>=768?_orientation():'600')+',user-scalable=no">');
    	var _orientationchange = function(){
        	var viewport = document.querySelector('meta[name=viewport]');
        	var orientation = _orientation();
        	document.body.style.display='none';
        	viewport.setAttribute('content', '');
			setTimeout(function(){
				viewport.setAttribute('content', 'width='+(screen.width>=768?orientation:'600')+',user-scalable=no');
				setTimeout(function(){
				    document.body.offsetHeight;
				    // document.body.style.removeProperty('display');
				    document.body.style.display='block';
				}, 20);
			}, 500);
		};
    	if (typeof screen.orientation != 'undefined' && typeof screen.orientation.addEventListener != 'undefined') screen.orientation.addEventListener('change', _orientationchange); 
    	else window.addEventListener('orientationchange', _orientationchange);
		var config_url = '<?php print($GLOBALS['config']['base_url']); ?>';
		<?php if(!empty($_SESSION['cms_user']['cms_user_id'])): ?>var admin_logged_in = 1;<?php endif ?>
	</script>
	<noscript>
		<style type="text/css">
		body {
		    display: block!important;
		}
		</style>
	</noscript>
</head>

<body>
	
	<script type="text/javascript">

		function _set_rem(){
			var width = window.innerWidth;
			var height = window.innerHeight;
			if (width > 750){
				/*
				if (width > height * 1.5){
					width = Math.floor(height * 1.5);
				}
				*/
				var rem = Math.round(width/100 * 10)/10;
			} else {
				var rem = Math.round(width/50 * 10)/10;
			}
			$('html').css('font-size', rem + 'px');
			document.cookie = 'rem=' + encodeURIComponent(rem) + '; path=/';
		}

		_set_rem();

		window.addEventListener('resize', _set_rem);
		
	</script>

	<?php print(get_position('header', $data)); ?>

	<?php print(get_position('main', $data)); ?>

	<?php print(get_position('footer', $data)); ?>

</body>
</html>