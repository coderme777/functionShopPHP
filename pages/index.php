<?php
foreach($dos as $k):?>		
	<div class='product'>
        <div><a href="index.php?view=product&id=<?=$k['id']?>"><img src="imgfiles/<?=$k['img']?>" alt="" /></a></div>
        <div class="description">
            <div class="product-name"><a href="#"><?=$k['title']?></a></div>
            <div class="product-price"><?=$k['price']?></div>
        </div>
	</div>	
<?endforeach;?>