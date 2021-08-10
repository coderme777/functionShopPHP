<!DOCTYPE html>
<html lang="ru">
<head>
 <title>Интернет магазин на функциях php</title>
 <link href="style/style.css" rel="stylesheet" type="text/css">
 <meta charset="utf-8">
</head>
<body>
	<main>
		<div id='main-block'>
			<div id='header'>
				<p id='zag'>Магазин компьютерной техники</p>
			</div>
			<div id="menu">
				<div><a href="index.php">Главная</a></div>
				<?php 
					$cat=getcat_db();
					foreach($cat as $k):
				?>
				<div><a href="index.php?view=cat&id=<?=$k['cat_id']?>"><?=$k['name']?></a></div>
				<?endforeach;?>
				<div id="cart"><a href="index.php?view=cart">Корзина:</a> (<?=$_SESSION['total_product']?>шт.) - <?=number_format($_SESSION['total_price'],2)?>$</div>
			</div>
			
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/pages/'.$view.'.php'); ?> <!-- подгружаем главный контент сайта из папки со страницами -->
			<div style="clear: both;"></div>               
		</div>
			<footer>
					<div align="center">
						<div class="footer">&copy; Functions SHOP 2018</div>
					</div>
			</footer>
		
	</main>
</body>
</html>