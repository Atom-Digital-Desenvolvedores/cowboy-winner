<?php

// Meus posts types
	function meus_post_types(){

		// Produtos
		register_post_type('produtos192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Produtos'),
					'singular_name'	=> _x('produto', 'post type singular name'),
					'add_new'		=> _x('Novo produto', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar novo produto', 'portfolio item'),
					'edit_item'		=> _x('Editar produto', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'produtos'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-admin-post',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

		// Equipe
		register_post_type('equipe192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Equipe'),
					'singular_name'	=> _x('Membro', 'post type singular name'),
					'add_new'		=> _x('Novo Membro', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar novo Membro', 'portfolio item'),
					'edit_item'		=> _x('Editar Membro', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'equipe'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-groups',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

		// Depoimentos
		register_post_type('depoimentos192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Depoimentos'),
					'singular_name'	=> _x('depoimento', 'post type singular name'),
					'add_new'		=> _x('Novo depoimento', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar novo depoimento', 'portfolio item'),
					'edit_item'		=> _x('Editar depoimento', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'depoimentos'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-testimonial',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

		// Unidades
		register_post_type('unidades192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Unidades'),
					'singular_name'	=> _x('unidade', 'post type singular name'),
					'add_new'		=> _x('Novo unidade', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar novo unidade', 'portfolio item'),
					'edit_item'		=> _x('Editar unidade', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'unidades'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-location',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

	}
	add_action('init', 'meus_post_types');

?>