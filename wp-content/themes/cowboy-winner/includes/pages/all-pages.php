<?php

	add_action( 'cmb2_admin_init', 'metaboxes_all_pages' );

	function metaboxes_all_pages() {

		$id_sobre 		= get_page_by_path( 'sobre-nos', OBJECT, 'page' )->ID;
		$id_produtos 	= get_page_by_path( 'loja', OBJECT, 'page' )->ID;
		$id_servicos 	= get_page_by_path( 'solucoes', OBJECT, 'page' )->ID;
		$id_equipe 		= get_page_by_path( 'equipe', OBJECT, 'page' )->ID;
		$id_blog 		= get_page_by_path( 'blog', OBJECT, 'page' )->ID;
		$id_contato 	= get_page_by_path( 'contato', OBJECT, 'page' )->ID;
		$id_carrinho 	= get_page_by_path( 'carrinho', OBJECT, 'page' )->ID;

		is_array($all_pagesArray);

		$all_pagesArray = [ $id_sobre, $id_produtos, $id_servicos, $id_equipe, $id_blog, $id_contato, $id_carrinho ];

		// Metabox Banner
		$banner_all_pages = new_cmb2_box( array(
			'id'            => 'banner_all_pages',
			'title'         => __( 'Banner' ),
			'object_types'  => array( 'page', ),
			'show_on'       => array( 'key' => 'id', 'value' => $all_pagesArray ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$banner_all_pages->add_field( array(
			'name'         => __( 'Imagem do banner' ),
			'desc'         => __( 'Tamanho recomendado <strong>1920x110</strong>' ),
			'id'           => 'wsg_banner_all_pages_img',
			'type'         => 'file',
			'preview_size' => array( 1920/1, 110/1 ),
			'query_args'   => array( 'type' => 'image' ),
		) );

	}

?>