<?php

// Minhas taxonomies
	function minhas_taxonomies(){

		// Na home
		register_taxonomy( 'categorias_produtos', array( 'produtos192' ), array(
			'hierarchical' => true,
			'label' => __( 'Categorias' ),
			'show_ui' => true,
			'show_in_tag_cloud' => false,
			'query_var' => true,
				'rewrite' => array(
					'slug' => 'categoria-produtos',
					'with_front' => true,
				),
				'capabilities' => array(
					'manage_terms' => true,
					'edit_terms' => true,
					'delete_terms' => true,
				)
			)
		);

		// Na home
		register_taxonomy( 'tamanhos_produtos', array( 'produtos192' ), array(
			'hierarchical' => false,
			'label' => __( 'Tamanhos' ),
			'show_ui' => true,
			'show_in_tag_cloud' => false,
			'query_var' => true,
				'rewrite' => array(
					'slug' => 'tamanhos-produtos',
					'with_front' => true,
				),
				'capabilities' => array(
					'manage_terms' => true,
					'edit_terms' => true,
					'delete_terms' => true,
				)
			)
		);

	}
	add_action('init', 'minhas_taxonomies');

?>