<?php

	function taxonomy_categorias_produtos(){
		$categorias_produtos = new_cmb2_box( array(
			'id'				=> 'categorias_produtos',
			'title'				=> __( 'Imagem da Categoria' ),
			'object_types'		=> array( 'term', ),
			'taxonomies'		=> array('categorias_produtos'),
			'context'			=> 'normal',
			'priority'			=> 'high',
			'show_names'		=> true,
			'closed'			=> true,
			'new_term_section'	=> true,
		));

		$categorias_produtos->add_field( array(
			'name'		 => __( 'Imagem da Categoria' ),
			'desc'       => __( 'Tamanho recomendado <strong>262x212</strong>' ),
			'id'         => 'wsg_categorias_produtos_img',
			'type'       => 'file',
			'query_args' => array(
				'type' => array(
					'image',
				),
			),
			'preview_size' => array( 262/1, 212/1 ),
			'on_front' => false
		) );

		$categoria_ordem = new_cmb2_box( array(
			'id'               => 'categoria_ordem',
			'title'            => "Onde exibir?",
			'object_types'     => array( 'term' ),
			'taxonomies'       => array( 'categorias_produtos' ),
			'new_term_section' => true,
			'priority'			=> 'high',
			'show_names'		=> true,
			'closed'			=> true,
			'new_term_section'	=> true,
		));
		$categoria_ordem->add_field(array(
			'name'             => 'Ordem',
			'id'               => 'categoria_ordem_valor',
			'type'             => 'text_small',
			'default'		   => 0,
		));
	}
	add_action('cmb2_admin_init', 'taxonomy_categorias_produtos');
?>