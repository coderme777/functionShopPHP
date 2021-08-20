<?php require_once('fs_db.php');?>
<div id='carzin'>
	<h2>Оформление заказа</h2>
	<?php
	if($_SESSION['cart'] && !isset($_POST['order']))
	{//если существует что-то в корзине и кнопка формы не нажата, то выводим данные ниже
	?>	
	<form action='index.php?view=order' method='post' >
			<?php
			foreach($_SESSION['cart'] as $id => $quant):
				$prod=getproduct($id);			
		?>
		<hr>
		<p>Товар: <?=$prod[0]['title'];?></p>
		<p>Цена: <?=number_format($prod[0]['price'],2)?>$</p>
		<p>Кол-во: <?=$quant?></p>
		<p>Всего: <?=number_format($prod[0]['price']*$quant,2)?>$</p>
	<?php endforeach;?>
		<p class='total'>Общая сумма заказа: <span class='product-price'><?=number_format($_SESSION['total_price'],2)?>$</span></p>
		<p>Имя:<br><input type='text' name='name'></p>
		<p>Фамилия:<br><input type='text' name='s_name'></p>
		<p>E-mail:<br><input type='text' name='email'></p>
		<p>Адрес:<br><input type='text' name='address'></p>
		<p>Почтовый индекс:<br><input type='text' name='post_index'></p>
		<p><input type='submit' name='order' value='Заказать'></p>		
	</form>
</div>
<?php }
	else
	{
		if($_SESSION['cart'] && isset($_POST['order']))
		{
			$date = date('Y-m-d');
			$time = date('H:i:s');
			$name = htmlspecialchars($_POST['name']);
			$s_name = htmlspecialchars($_POST['s_name']);
			$email = htmlspecialchars($_POST['email']);
			$address = htmlspecialchars($_POST['address']);
			$post_index = htmlspecialchars($_POST['post_index']);
		
		foreach($_SESSION['cart'] as $id => $quant):
				$prod=getproduct($id);
			$ord_id = $prod[0]['id'];
			$ord_title = htmlspecialchars($prod[0]['title']);
			$ord_price = htmlspecialchars($prod[0]['price']);
			$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			$connection->query("INSERT INTO `fs_orders` (`name`,`s_name`,`address`,`post_index`,`email`,`product`,`prod_id`,`price`,`qty`,`date`,`time`) VALUES ('$name','$s_name','$address','$post_index','$email','$ord_title','$ord_id','$ord_price','$quant','$date','$time')");	
		endforeach;
		echo '<p class="liecont">Ваш заказ принят. Спасибо за покупку</p>';
		$connection->close();
		session_destroy();
	}
}	
?>
