<div id='carzin'>
<h2>Ваш заказ:</h2>
<?php
if($_SESSION['cart']) {
?>	
<form action='index.php?view=update_cart' method='post' >
		<?php
		foreach($_SESSION['cart'] as $id => $quant):
		$prod=getproduct($id);		
	?>
	<hr>
	<p>Товар: <?=$prod[0]['title'];?></p>
	<p>Цена: <?=number_format($prod[0]['price'],2)?>$</p>
	<p>Кол-во: <input type='text' size='2' name='<?=$id?>' maxlength='2' value='<?=$quant?>'></p>
	<p>Всего: <?=number_format($prod[0]['price']*$quant,2)?>$</p>
<?php endforeach;?>
	<p class='total'>Общая сумма заказа: <span class='product-price'><?=number_format($_SESSION['total_price'],2)?>$</span></p>
	<p><input type='submit' name='update' value='Обновить'></p>
</form>
<p class='order'><a href='index.php?view=order'>Оформить заказ</a></p>
</div>
<?php } else {
	echo '<div class="liecont"><p>вы ничего не заказали, ваша корзина пустая</p></div>';
	}
?>
