<?php
	get_header();

	$id_page = get_page_by_path( 'produtos', OBJECT, 'page' )->ID;
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-produtos_01">
		<div class="wq-container">
			<div class="wq-flex">
				<?php include "inc-sidebar.php" ?>
				<div class="wq-box_9 wq-box_cp-12 wq-box_cl-12">
					<div class="wq-produtos_subcategorias-listagem">
						<div class="wq-flex">
							<h2><?php echo get_post_meta( $id_page, 'wsg_produtos_01_titulo', true ); ?></h2>
						</div>
						<div class="wq-flex wq-listagem-ordenar">
							<?php
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$arrayQueryProdutos = array(
									'post_type'			=> array( 'produtos192' ),
									'orderby' 			=> 'menu_order',
									'order' 			=> 'ASC',
									'posts_per_page'	=> '9',
									'paged' 			=> $paged,
								);
								$queryProdutos = new WP_Query($arrayQueryProdutos);
								while ( $queryProdutos->have_posts()) {
									$queryProdutos->the_post();
							?>
								<article class="wq-box_4 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6">
									<div class="wq-produtos_subcategorias-box destaque">
										<figure>
											<?php
												$wsg_produto_item_img_id = get_post_meta( get_the_ID(), 'wsg_produto_item_img_id', true );
												getImageThumb($wsg_produto_item_img_id,'263x350');
											?>
										</figure>
										<div>
											<h2><?php the_title(); ?></h2>
											<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_produto_item_resumo', true )); ?>
											<span class="preco"><?php echo get_post_meta( get_the_ID(), 'wsg_produto_info_valor', true )." ".get_post_meta( get_the_ID(), 'wsg_produto_info_apos_valor', true ); ?></span>
											<a href="<?php the_permalink(); ?>" class="wq-btn">Saiba mais</a>
											<a href="<?php bloginfo('url') ?>/carrinho?acao=add&id=<?php echo get_the_ID(); ?>" class="wq-btn_cart">
												<img src="<?php bloginfo('template_url'); ?>/img/smart-cart.png" alt="Icone do carrinho" title="Adicionar ao carrinho">
											</a>
										</div>
									</div>
								</article>
							<?php }wp_reset_query(); ?>
						</div>
						<?php
							if (function_exists("pagination")) {
								pagination($queryProdutos);
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include "inc-newsletter.php"; ?>

<?php get_footer(); ?>