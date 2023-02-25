<?php
	get_header();

	$id_page = get_page_by_path( 'home', OBJECT, 'page' )->ID;
?>

	<section data-aos="fade-up" class="wq-banner">
		<?php
			$entries = get_post_meta( $id_page, 'banner_items', true );

			foreach ( (array) $entries as $key => $entry ) {

				$wsg_banner_items_subtitulo = null;
				$wsg_banner_items_titulo = null;
				$wsg_banner_items_link = null;

				if ( isset( $entry['wsg_banner_items_img_id'] ) ) {
					$wsg_banner_items_img_id = $entry['wsg_banner_items_img_id'];
				}
				if ( isset( $entry['wsg_banner_items_mobile_img_id'] ) ) {
					$wsg_banner_items_mobile_img_id = $entry['wsg_banner_items_mobile_img_id'];
				}
				if ( isset( $entry['wsg_banner_items_subtitulo'] ) ) {
					$wsg_banner_items_subtitulo = $entry['wsg_banner_items_subtitulo'];
				}
				if ( isset( $entry['wsg_banner_items_titulo'] ) ) {
					$wsg_banner_items_titulo = $entry['wsg_banner_items_titulo'];
				}
				if ( isset( $entry['wsg_banner_items_link'] ) ) {
					$wsg_banner_items_link = $entry['wsg_banner_items_link'];
				}
		?>
			<div class="wq-banner-item">
				<?php if ( !empty($wsg_banner_items_link) && empty($wsg_banner_items_btn_texto) ) { ?>
					<a href="<?php echo $wsg_banner_items_link; ?>">
						<figure>
							<?php
								getImageThumb($wsg_banner_items_img_id,'1920x600');
							?>
						</figure>
					</a>
				<?php } else{ ?>
					<figure>
						<?php
							getImageThumb($wsg_banner_items_img_id,'1920x600');
						?>
					</figure>
				<?php } ?>
				<?php if ( !empty($wsg_banner_items_link) && empty($wsg_banner_items_btn_texto) ) { ?>
					<a href="<?php echo $wsg_banner_items_link; ?>">
						<figure class="wq-banner_responsivo">
							<?php
								getImageThumb($wsg_banner_items_mobile_img_id,'1000x820');
							?>
						</figure>
					</a>
				<?php } else{ ?>
					<figure>
						<?php
							getImageThumb($wsg_banner_items_mobile_img_id,'1000x820');
						?>
					</figure>
				<?php } ?>
				<?php if (!empty($wsg_banner_items_subtitulo) && !empty($wsg_banner_items_titulo)) { ?>
					<div class="wq-banner_conteudo">
						<?php if (!empty($wsg_banner_items_link)) { ?>
							<a href="<?php echo $wsg_banner_items_link; ?>" style="display: block;">
								<div class="wq-container">
									<div class="wq-cto">
										<h4><?php echo $wsg_banner_items_subtitulo; ?></h4>
										<h2><?php echo $wsg_banner_items_titulo; ?></h2>
									</div>
								</div>
							</a>
						<?php } else{ ?>
						<div class="wq-container">
							<div class="wq-cto">
								<h4><?php echo $wsg_banner_items_subtitulo; ?></h4>
								<h2><?php echo $wsg_banner_items_titulo; ?></h2>
							</div>
						</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
	</section>

	<?php
		$wsg_estatisticas_img_id = get_post_meta($id_page, 'wsg_estatisticas_img_id', true);
		$wsg_estatisticas_img_id = wp_get_attachment_image_src($wsg_estatisticas_img_id, '1920x480');
		$wsg_estatisticas_img_id = $wsg_estatisticas_img_id[0];
	?>
	<!-- <section class="wq-estatisticas" style="background-image: url(<?php echo $wsg_estatisticas_img_id; ?>);"> -->
	<section class="wq-estatisticas">
		<div class="wq-container">
			<h2 data-aos="fade-up" data-aos-duration="3000" class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_estatisticas_titulo', true ); ?></h2>
			<div class="wq-flex">
				<?php
					$entries = get_post_meta( $id_page, 'estatisticas_items', true );

					foreach ( (array) $entries as $key => $entry ) {

						if ( isset( $entry['wsg_estatisticas_items_valor'] ) ) {
							$wsg_estatisticas_items_valor = $entry['wsg_estatisticas_items_valor'];
						}
						if ( isset( $entry['wsg_estatisticas_items_legenda'] ) ) {
							$wsg_estatisticas_items_legenda = $entry['wsg_estatisticas_items_legenda'];
						}
				?>
					<div data-aos="fade-up" data-aos-duration="3000" class="wq-box_3 wq-box_cp-12 wq-box_cl-6 wq-box_tp-4">
						<div class="wq-content">
							<h3><?php echo $wsg_estatisticas_items_valor; ?></h3>
							<p><?php echo $wsg_estatisticas_items_legenda; ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<section class="wq-produtos_01 wq-4-itens">
		<div class="wq-container">
			<div class="wq-cto">
				<h3 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_produtos_titulo', true ); ?></h3>
			</div>
			<div class="wq-flex">
				<?php
					$wsg_produtos_na_home = get_post_meta( $id_page, 'wsg_produtos_na_home', true );

					$arrayQueryServicos = array(
						'post_type'				=> array( 'produtos192' ),
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'posts_per_page'		=> '-1',
						'post__in'				=> $wsg_produtos_na_home
					);
					$queryServicos = new WP_Query($arrayQueryServicos);
					while ( $queryServicos->have_posts()) {
						$queryServicos->the_post();
				?>
					<article class="wq-box_3 wq-box_cp-6 wq-box_cl-6 wq-box_tp-4">
						<div class="wq-produtos_subcategorias-box destaque">
							<figure>
								<?php
									$wsg_produto_item_img_id = get_post_meta( get_the_ID(), 'wsg_produto_item_img_id', true );
									getImageThumb($wsg_produto_item_img_id,'263x350');
								?>
							</figure>
							<div>
								<h2><?php the_title(); ?></h2>
								<a href="<?php the_permalink(); ?>" class="wq-btn">Saiba mais</a>
								<!-- <a href="<?php bloginfo('url') ?>/carrinho?acao=add&id=<?php echo get_the_ID(); ?>" class="wq-btn_cart">
									<img src="<?php bloginfo('template_url'); ?>/img/smart-cart.png" alt="Icone do carrinho" title="Adicionar ao carrinho">
								</a> -->
							</div>
						</div>
					</article>
				<?php }wp_reset_query(); ?>
			<!-- <?php //echo do_shortcode( ' [featured_products per_page="-1" columns="4"] ' ); ?> -->
			</div>
		</div>
	</section>

	<?php include "inc-depoimentos.php"; ?>

	<?php include "inc-marcas.php"; ?>

	<section class="wq-05">
		<div class="wq-container">
			<h3 data-aos="fade-up" data-aos-duration="3000" class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_blog_titulo', true ); ?></h3>
			<div class="wq-flex">
				<?php
					$args = array (
						'post_type'         => 'post',
						'posts_per_page'    => 3
					);
					$query = new WP_Query( $args );
					$posts = $query->get_posts();
					foreach ($posts as $key => $item) {
						// setup_postdata($item);
						$categories = get_the_terms( $item->ID, 'category' );
						$htmlCategory = '';
						if ( $categories && ! is_wp_error( $categories ) ){
							$draught_links = array();
							foreach ($categories as $category) {
								$cat_Item = '<a href="'.get_term_link($category->term_id, "category").'" title="'.$category->name.'" > '.$category->name.'</a>';
								array_push($draught_links, $cat_Item);
							}
							$htmlCategory = implode(' | ', $draught_links);
						}
				?>
					<div data-aos="fade-up" data-aos-duration="3000" class="wq-box_4 wq-box_cp-12 wq-box_cl-12 wq-box_tp-6 wq-box_tl-6">
						<div data-aos="fade-up" data-aos-duration="3000" class="wq-blog_box">
							<div class="wq-flex">
								<div class="wq-box_12f wq-box_cp-12f wq-box_cl-12f wq-box_tp-12f wq-box_tl-12f">
									<figure>
										<?php echo getImageThumb(get_post_thumbnail_id($item->ID), '550x392'); ?>
									</figure>
								</div>
								<div class="wq-box_12f wq-box_cp-12f wq-box_cl-12f wq-box_tp-12f wq-box_tl-12f">
									<div class="wq-blog_box-conteudo">
										<ul class="wq-lista-inline">
											<li>
												<span class="flaticon-calendar-2"></span>
												<?php echo get_the_date('d', $item->ID); ?>.<?php echo get_the_date('m', $item->ID); ?>.<?php echo get_the_date('Y', $item->ID); ?>
											</li>
											<li>
												<span class="flaticon-folder-2"></span>
												<?php echo $htmlCategory; ?>
											</li>
										</ul>
										<h2><?php echo $item->post_title; ?></h2>
										<?php echo wpautop($item->post_excerpt); ?>
										<a href="<?php echo get_permalink($item->ID); ?>" class="wq-btn">Ler Mais</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php }wp_reset_query(); ?>
			</div>
		</div>
	</section>

	<?php include "inc-newsletter.php"; ?>

<?php get_footer(); ?>