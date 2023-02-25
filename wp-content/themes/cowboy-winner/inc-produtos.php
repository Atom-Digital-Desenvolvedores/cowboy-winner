<?php $categoryProduct = get_queried_object(); ?>

						<div class="wq-produtos_subcategorias-listagem">
							<div class="wq-flex">
								<h2><?php echo $categoryProduct->name; ?></h2>
								<form class="wq-ordenar" method="POST" action="">
									<label for="ordenarPor">ORDENAR POR:</label>
									<select name="filtrodeordenacao" id="ordenarPor">
										<option value="menor_preco">Menor preço</option>
										<option value="maior_preco">Maior preço</option>
									</select>
								</form>
								<script>
									$(function() {
										function sort_Menor(a, b) {
											return ($(b).data('valor')) < ($(a).data('valor')) ? 1 : -1;
										}
										function sort_Maior(a, b) {
											return ($(a).data('valor')) < ($(b).data('valor')) ? 1 : -1;
										}
										$("#ordenarPor").change(function () {
											var valueOption = $(this).val();
											if (valueOption == 'menor_preco'){
												$(".wq-listagem-ordenar article").sort(sort_Menor).appendTo('.wq-listagem-ordenar');
											}else if (valueOption == 'maior_preco') {
												$(".wq-listagem-ordenar article").sort(sort_Maior).appendTo('.wq-listagem-ordenar');
											}
										});
									});
								</script>
							</div>
							<div class="wq-flex wq-listagem-ordenar">
								<?php
									$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									$arrayQueryProdutos = array(
										'post_type'			=> array( 'produtos192' ),
										'orderby' 			=> 'menu_order',
										'order' 			=> 'ASC',
										'tax_query' => array(
											array(
												'taxonomy'		=> 'categorias_produtos',
												'field'			=> 'slug',
												'terms'			=> array( $categoryProduct->slug),
											)
										),
										'posts_per_page'	=> '6',
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
														getImageThumb($wsg_produto_item_img_id,'262x212');
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