<?php

	add_action( 'cmb2_admin_init', 'metaboxes_equipe' );

	function metaboxes_equipe() {
		$equipe_item = new_cmb2_box( array(
			'id'            => 'equipe_item',
			'title'         => __( 'Detalhes do integrante da equipe' ),
			'object_types'  => array( 'equipe192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$equipe_item->add_field( array(
			'name'       => __( 'Imagem do integrante' ),
			'desc'       => __( 'Tamanho recomendado <strong>280x330</strong>' ),
			'id'         => 'wsg_equipe_item_img',
			'type' => 'file',
			'preview_size' => array( 280/1, 330/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		$equipe_item->add_field( array(
			'name'       => __( 'Cargo do integrante' ),
			'id'         => 'wsg_equipe_item_cargo',
			'type'       => 'text',
		) );

		$equipe_item->add_field( array(
			'name'       => __( 'Redes sociais' ),
			'id'         => 'wsg_equipe_item_rd',
			'type'       => 'title',
		) );
		$equipe_redes_sociais = $equipe_item->add_field( array(
			'id'            => 'equipe_redes_sociais',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );
		$equipe_item->add_group_field( $equipe_redes_sociais, array(
			'name'       => __( 'Imagem do item' ),
			'desc'       => __( 'Tamanho recomendado <strong>64x64</strong>' ),
			'id'         => 'wsg_equipe_redes_sociais_img',
			'type' => 'file',
			'preview_size' => array( 64/1, 64/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$equipe_item->add_group_field( $equipe_redes_sociais, array(
			'name'       => __( 'titulo' ),
			'id'         => 'wsg_equipe_redes_sociais_titulo',
			'type'       => 'text',
		) );
		$equipe_item->add_group_field( $equipe_redes_sociais, array(
			'name'       => __( 'legenda' ),
			'id'         => 'wsg_equipe_redes_sociais_legenda',
			'type'       => 'text',
		) );
		$equipe_item->add_group_field( $equipe_redes_sociais, array(
			'name'       => __( 'Link' ),
			'id'         => 'wsg_equipe_redes_sociais_link',
			'type'       => 'text',
		) );

		// Método de especificação de página
		$equipePage = get_page_by_path( 'equipe', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($equipePage && $equipePage->ID != $post_id){
			return;
		}

		// Metabox Listagem de equipe
		$equipe_01 = new_cmb2_box( array(
			'id'            => 'equipe_01',
			'title'         => __( 'Listagem de equipe' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$equipe_01->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_equipe_01_titulo',
			'type'       => 'text',
		) );
		$equipe_01->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_equipe_01_texto',
			'type'       => 'wysiwyg',
		) );


	}

?>