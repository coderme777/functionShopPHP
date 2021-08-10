<?php	
	foreach($product as $inf):
?>
<div class='allblock'>
	<div class='product'>
		<div><a href="#"><img src="imgfiles/<?=$inf['img']?>" alt="" /></a></div>
		<div class="description">
			<div class="product-name"><a href="#"><?=$inf['title']?></a></div>
			<div class="product-price"><?=$inf['price']?></div>
		</div>
	</div>
	<div class="desc"><?=$inf['meta_desc']?>
	<a href='index.php?view=add_cart&id=<?=$inf['id'] ?>' class='linkprod'>Добавить в корзину</a>
	</div>
	<div style="clear: both;"></div>
	<div class=""></div>
</div>
<?endforeach;?>	