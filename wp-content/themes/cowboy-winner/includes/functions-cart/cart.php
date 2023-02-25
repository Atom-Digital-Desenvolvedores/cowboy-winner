<?php

	if(!isset($_SESSION['carrinho'])) {
		$_SESSION['carrinho'] = array();
	}

	function addCart($id, $quantity, $tamanho) {
		if(!isset($_SESSION['carrinho'][$id])){
			$_SESSION['carrinho'][$id] = array(
				'quantidade' => $quantity,
				'tamanho' => $tamanho
			);
		}
	}

	function deleteCart($id) {
		if(isset($_SESSION['carrinho'][$id])){
			unset($_SESSION['carrinho'][$id]);
		}
	}

	function updateCart($id, $quantity) {
		if(isset($_SESSION['carrinho'][$id])){
			if($quantity > 0) {
				$_SESSION['carrinho'][$id]['quantidade'] = $quantity;
			} else {
			 	deleteCart($id);
			}
		}
	}

	function getContentCart($pdo) {

		$results = array();

		if($_SESSION['carrinho']) {


			$cart = $_SESSION['carrinho'];

			$arrayProducts = array(
				'post_type'	=> array( $pdo ),
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'posts_per_page'		=> '-1',
				'post__in'				=> array_keys($cart),
			);
			$query = new WP_Query($arrayProducts);

			$products = $query->get_posts();

			foreach($products as $key => $product) {

				$results[] = array(
					'id' => $product->ID,
					'title' => $product->post_title,
					'img' => get_post_meta( $product->ID, 'wsg_produto_item_img_id', true ),
					'quantidade' => $cart[$product->ID]['quantidade'],
					'tamanho' => $cart[$product->ID]['tamanho'],
				);
			}

		}

		return $results;
	}

?>