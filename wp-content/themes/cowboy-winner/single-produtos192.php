<?php
	get_header();

	$id_page = get_page_by_path( 'produtos', OBJECT, 'page' )->ID;

	$id_telefones = get_page_by_path( 'telefones', OBJECT, 'contatos' )->ID;

	$id_contato = get_page_by_path( 'contato', OBJECT, 'page' )->ID;

	$wsg_contato_widget = get_post_meta($id_contato, 'wsg_contato_widget', true);
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-produtos_01">
		<div class="wq-container">
			<div class="wq-flex">
				<?php include "inc-sidebar.php"; ?>
				<div class="wq-box_9 wq-box_cp-12 wq-box_cl-12">
					<div class="wq-produto_interna">
						<div class="wq-flex">
							<div class="wq-box_7 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12">
								<div class="wq-produto_interna-conteudo">
									<div class="wq-produto_interna-carousel">
										<?php
											$wsg_produto_interna_img = get_post_meta( get_the_ID(), 'wsg_produto_interna_img', true );
											if (!empty($wsg_produto_interna_img)) {
											foreach ($wsg_produto_interna_img as $key => $value){
										?>
											<figure>
												<?php getImageThumb($key,'446x594'); ?>
											</figure>
										<?php } } ?>
									</div>
									<h2><?php the_title(); ?></h2>
									<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_produto_interna_conteudo', true )); ?>
									<div class="wq-preco">
										<?php
											$tamanhos = get_the_terms( get_the_ID(), 'tamanhos_produtos' );
											if (!empty($tamanhos)) {
										?>
											<select class="wq-tamanhos" name="tamanho">
												<option selected>Selecione o tamanho</option>
												<?php foreach ($tamanhos as $key => $value) { ?>
													<option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
												<?php } ?>
											</select>
										<?php } ?>
										<input type="number" name="quantidade" value="1" min="0" class="wq-quantidade">
										<a href="javascript:void(0)" data-quantidade="1" data-tamanho="1" type="submit" class="wq-btn_cart">
											<img src="<?php bloginfo('template_url'); ?>/img/smart-cart.png" alt="Icone do carrinho" title="Adicionar ao carrinho">
										</a>
									</div>
								</div>
							</div>
							<div class="wq-box_5 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12">
								<div class="wq-suprimentos_section__form">
									<h3><?php echo get_post_meta( $id_page, 'wsg_servicos_formulario_titulo', true ); ?></h3>
									<p><?php echo get_post_meta( $id_page, 'wsg_servicos_formulario_subtitulo', true ); ?></p>
									<form action="#" onsubmit="return submitFormWithRecaptcha(this);" class="contact-form" method="POST">

										<input type="hidden" name="subject_email" value="Enviado pelo site">
										<input required type="hidden" name="title_email" value="Contato enviado pelo formulário da página: <?php the_title(); ?>">

										<input type="hidden" name="label-send-data-name" value="Nome">
										<input required type="text" name="send-data-name" placeholder="Qual é o seu nome?">

										<input type="hidden" name="label-send-data-email" value="Email">
										<input required type="email" name="send-data-email" placeholder="Qual é o seu melhor email?">

										<input type="hidden" name="label-send-data-phone" value="Telefone">
										<input required type="text" name="send-data-phone" placeholder="Qual é o seu telefone?" class="inputphone">

										<?php if (strlen($wsg_contato_widget) > 0) { ?>
											<div class="g-recaptcha invisible-recaptcha" id="recaptcha-<?php echo md5(uniqid(rand(), true)); ?>" data-sitekey="<?php echo $wsg_contato_widget; ?>" data-size="invisible"></div>
										<?php } ?>

										<button class="wq-btn wq-btn_azul" type="submit">Enviar</button>
									</form>
								</div>
								<?php
									$wsg_whatsapp_btn_sidebar_link = get_post_meta( $id_telefones, 'wsg_whatsapp_btn_sidebar_link', true );
									if (!empty($wsg_whatsapp_btn_sidebar_link)) {
								?>
									<a href="<?php echo $wsg_whatsapp_btn_sidebar_link; ?>" class="wq-btn_whatsapp">
										<span class="flaticon-whatsapp-2"></span>
										<span>ATENDIMENTO POR WHATSAPP</span>
									</a>
								<?php } ?>
							</div>
							<div class="wq-box_12">
								<div class="wq-tabs">
									<ul class="wq-tabs_btns wq-lista-inline">
										<li><a href="javascript:void(0)" class="wq-tabs_btn" data-tab="1">VÍDEOS DO PRODUTO</a></li>
										<li><a href="javascript:void(0)" class="wq-tabs_btn" data-tab="2">FICHA TÉCNICA</a></li>
										<li><a href="javascript:void(0)" class="wq-tabs_btn" data-tab="3">DOWNLOADS</a></li>
									</ul>
									<div class="wq-tabs_contents">
										<div data-tab="1">
											<?php echo get_post_meta( get_the_ID(), 'wsg_produto_interna_video', true ); ?>
										</div>
										<div data-tab="2" class="">
											<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_produto_interna_ficha_tecnica', true )); ?>
										</div>
										<div data-tab="3" class="">
											<?php
												$entries = get_post_meta( get_the_ID(), 'produto_interna_items', true );

												if (!empty($entries)) {

												foreach ( (array) $entries as $key => $entry ) {

													$wsg_produto_interna_items_link = null;
													$wsg_produto_interna_items_titulo = null;

													if ( isset( $entry['wsg_produto_interna_items_link'] ) ) {
														$wsg_produto_interna_items_link = $entry['wsg_produto_interna_items_link'];
													}
													if ( isset( $entry['wsg_produto_interna_items_titulo'] ) ) {
														$wsg_produto_interna_items_titulo = $entry['wsg_produto_interna_items_titulo'];
													}
											?>
												<?php if ( $wsg_produto_interna_items_link != null && strlen($wsg_produto_interna_items_link) > 0 ) { ?>
													<div class="wq-link_group">
														<a href="<?php echo $wsg_produto_interna_items_link; ?>" class="wq-btn_link">
															<img src="<?php bloginfo('template_url'); ?>/img/icone_download.png" alt="download" title="download">
															<span><?php echo $wsg_produto_interna_items_titulo; ?></span>
														</a>
													</div>
												<?php } ?>
											<?php } } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
		$(document).ready(function() {

			$('.wq-btn_cart').attr("data-tamanho", $('.wq-tamanhos').val() );

			<?php
				$tamanhos = get_the_terms( get_the_ID(), 'tamanhos_produtos' );
				if (!empty($tamanhos)) {
			?>
				$('.wq-tamanhos').each( function() {
					$(this).on('change', function() {
						$('.wq-btn_cart').attr("data-tamanho", $(this).val() );
					});
				});
			<?php } ?>

		 	$('.wq-btn_cart').attr("data-quantidade", $('.wq-quantidade').val() );
		 	$('.wq-btn_cart').hide()

			$('.wq-quantidade').on('input', function() {
				$('.wq-btn_cart').show()
				$('.wq-btn_cart').attr("data-quantidade", $('.wq-quantidade').val() );
			});


			<?php
				$tamanhos = get_the_terms( get_the_ID(), 'tamanhos_produtos' );
				if (!empty($tamanhos)) {
			?>
				$('.wq-quantidade').on('change', function() {
					var tamanhoProduto = $('.wq-btn_cart').data("tamanho");
					var quantidadeProduto = $('.wq-btn_cart').data("quantidade");

					$('.wq-btn_cart').attr("href", "<?php bloginfo('url') ?>/carrinho?acao=add&id=<?php echo get_the_ID(); ?>&quantidade="+quantidadeProduto+"&tamanho="+tamanhoProduto );
				});
			<?php } else{ ?>
				$('.wq-quantidade').on('change', function() {
					var quantidadeProduto = $('.wq-btn_cart').data("quantidade");
					$('.wq-btn_cart').attr("href", "<?php bloginfo('url') ?>/carrinho?acao=add&id=<?php echo get_the_ID(); ?>&quantidade="+quantidadeProduto );
				});
			<?php } ?>
		});
	</script>

	<?php include "inc-newsletter.php"; ?>

<?php get_footer(); ?>