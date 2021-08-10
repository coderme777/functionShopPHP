<?php
	require_once('fs_db.php');
	require_once('cart_func.php');//выносим функции для работы корзины в отдельный файл
	session_start(); //добавим работу корзины через сессии
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart']=array();
		$_SESSION['total_product']=0;
		$_SESSION['total_sum']='0.00';
	}
	
	$view = empty($_GET['view']) ? 'index' : $_GET['view']; //если эл. массива пустой, то =index, иначе сохраняем то, что лежит в глоб.массиве $_GET['view']
	switch($view)//берем инфу из массива get (какая страница актуальна сейчас), затем из switch запускаем соответствующую странице функцию
	{
		case('index'):
			$cat=$_GET['id'];
			$dos=getdata_db();
		break;
		case('cart'):
			echo'';
		break;
		case('cat'):
			$cat=$_GET['id'];
			$dos=get_categories($cat);
		break;
		case('product'):
			$id=$_GET['id'];
			$product=getproduct($id);
		break;
		case('add_cart'):
			$id=$_GET['id'];
			$add_item=add_cart($id);
			$_SESSION['total_product']=total_prod($_SESSION['cart']);
			$_SESSION['total_price']=total_price($_SESSION['cart']);
			header('Location: index.php?view=product&id='.$id);//чтобы остаться на странице после добавления товара делаем перенаправление
		break;
		case('update_cart'):
			$id=$_GET['id'];
			update_cart();
			$_SESSION['total_product']=total_prod($_SESSION['cart']);
			$_SESSION['total_price']=total_price($_SESSION['cart']);
			header('Location: index.php?view=cart');//чтобы остаться на странице после изменения характеристик товара делаем перенаправление
		break;
		case('order'):
		
		break;
		default:
			echo "Нет такой страницы: ";
	}
	
	$secur = array('index','product','cat','cart','add_cart','update_cart','order');//делаю простою защиту адресной строки от ввода лишнего
	if(!in_array($view,$secur)) die('404');	
	require_once($_SERVER['DOCUMENT_ROOT'].'/layouts/shop.php');
?>