<?php

	add_action( 'cmb2_admin_init', 'metaboxes_unidades' );

	function metaboxes_unidades() {

		$unidades_item = new_cmb2_box( array(
			'id'            => 'unidades_item',
			'title'         => __( 'Detalhes da unidade' ),
			'object_types'  => array( 'unidades192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$unidades_item->add_field( array(
			'name'       => __( 'Iframe da unidade' ),
			'id'         => 'wsg_unidades_item_iframe',
			'type'       => 'textarea_code',
		) );

		$unidades_item->add_field( array(
			'name'       => __( 'endereço da unidade' ),
			'id'         => 'wsg_unidades_item_endereco',
			'type'       => 'wysiwyg',
		) );

	}

?>