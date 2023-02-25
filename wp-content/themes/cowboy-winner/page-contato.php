<?php
	get_header();

	$id_page = get_page_by_path( 'contato', OBJECT, 'page' )->ID;

	$id_telefones = get_page_by_path( 'telefones', OBJECT, 'contatos' )->ID;
	$id_email = get_page_by_path( 'email', OBJECT, 'contatos' )->ID;
	$id_endereco = get_page_by_path( 'endereco', OBJECT, 'contatos' )->ID;

	$wsg_contato_widget = get_post_meta($id_page, 'wsg_contato_widget', true);
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-contato_01">
		<div class="wq-container">
			<div class="wq-flex">
				<div class="wq-box_3 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12">
					<div class="wq-contato_info">
						<ul class="wq-midias-sociais wq-lista-inline">
							<?php
								$arrayQuery_Midias_Sociais = array(
									'post_type'			=> array( 'redes_sociais' ),
									'posts_per_page'	=> '-1',
									'orderby' 			=> 'menu_order',
									'order' 			=> 'ASC',
								);

								$query_Midias_Sociais = new WP_Query($arrayQuery_Midias_Sociais);

								while ( $query_Midias_Sociais->have_posts()) {
									$query_Midias_Sociais->the_post();
							?>
								<li>
									<a href="<?php echo get_post_meta( get_the_ID(), 'wsg_redes_sociais_link', true ); ?>" target="_blank" class="flaticon-<?php echo get_post_meta( get_the_ID(), 'wsg_redes_sociais_titulo', true); ?>"></a>
								</li>
							<?php
								} wp_reset_query();
							?>
						</ul>
						<ul class="wq-fale_conosco">
							<?php
								$wsg_emails = get_post_meta( $id_email, 'wsg_emails', true );
								foreach ( (array) $wsg_emails as $key => $email ) {
							?>
								<li>
									<a href="mailto:<?php echo $email; ?>" target="_blank">
										<img src="<?php bloginfo('template_url') ?>/img/header_icone-1.png" alt="icone de email" title="email">
										<p>
											<span>solicite um orçamento</span>
											<?php echo $email; ?>
										</p>
									</a>
								</li>
							<?php
									if (count($wsg_emails) > 1) {
										break;
									}
								}
							?>
							<?php
								$entries = get_post_meta( $id_telefones, 'wsg_telefone_items', true );

								foreach ( (array) $entries as $key => $entry ) {

									if ( isset( $entry['wsg_telefone_nmr'] ) ) {
										$wsg_telefone_nmr = $entry['wsg_telefone_nmr'];
									}
									if ( isset( $entry['wsg_telefone_link'] ) ) {
										$wsg_telefone_link = $entry['wsg_telefone_link'];
									}
									if ( isset( $entry['wsg_telefone_icone'] ) ) {
										$wsg_telefone_icone = $entry['wsg_telefone_icone'];
									}
							?>
								<li>
									<a href="<?php echo $wsg_telefone_link; ?>">
										<?php if ( $wsg_telefone_icone == "phone-1" ){ ?>
											<img src="<?php bloginfo('template_url') ?>/img/header_icone-2.png" alt="icone do Telefone" title="Telefone">
											<p>
												<span>Telefone</span>
										<?php } else { ?>
											<img src="<?php bloginfo('template_url') ?>/img/header_icone-3.png" alt="icone do Whatsapp" title="Whatsapp">
											<p>
												<span>Whatsapp</span>
										<?php } ?>
											<?php echo $wsg_telefone_nmr; ?>
										</p>
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="wq-box_9 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12">
					<div class="wq-contato_form">
						<h2 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_contato_01_titulo', true ); ?></h2>
						<form action="#" onsubmit="return submitFormWithRecaptcha(this);" class="contact-form" method="POST">

							<input type="hidden" name="subject_email" value="Enviado pelo site">
							<input required type="hidden" name="title_email" value="Contato enviado pelo formulário da página: <?php the_title(); ?>">

							<div class="wq-flex">
								<div class="wq-box_6 wq-box_cp-12 wq-box_cl-12 wq-box_tp-6">
									<input type="hidden" name="label-send-data-name" value="Nome">
									<input required type="text" name="send-data-name" placeholder="Qual é o seu nome?">
								</div>
								<div class="wq-box_6 wq-box_cp-12 wq-box_cl-12 wq-box_tp-6">
									<input type="hidden" name="label-send-data-email" value="Email">
									<input required type="email" name="send-data-email" placeholder="Qual é o seu melhor email?">
								</div>
								<div class="wq-box_6 wq-box_cp-12 wq-box_cl-12 wq-box_tp-6">
									<input type="hidden" name="label-send-data-phone" value="Telefone">
									<input required type="text" name="send-data-phone" placeholder="Qual é o seu telefone?" class="inputphone">
								</div>
								<div class="wq-box_6 wq-box_cp-12 wq-box_cl-12 wq-box_tp-6">
									<div class="wq-select">
										<input type="hidden" name="label-send-data-atendimento" value="Telefone">
										<select name="send-data-atendimento" required="">
												<option selected="" disabled="" value="">Quero atendimento para:</option>
												<option value="Vendas">Vendas</option>
												<option value="Suporte técnico">Suporte técnico</option>
												<option value="Financeiro">Financeiro</option>
												<option value="Diretoria">Diretoria</option>
										</select>
									</div>
								</div>
								<div class="wq-box_12">
									<input type="hidden" name="label-send-data-message" value="Mensagem">
									<textarea name="label-send-data-message" placeholder="Deixe sua mensagem..." required></textarea>
								</div>
								<div class="wq-box_6 wq-box_cp-12 wq-box_cl-12 wq-box_tp-6">
									<button type="submit" class="wq-btn wq-btn_azul">Enviar</button>
								</div>

								<?php if (strlen($wsg_contato_widget) > 0) { ?>
									<div class="g-recaptcha invisible-recaptcha" id="recaptcha-<?php echo md5(uniqid(rand(), true)); ?>" data-sitekey="<?php echo $wsg_contato_widget; ?>" data-size="invisible"></div>
								<?php } ?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="wq-unidades wq-cto">
		<div class="wq-container">
			<h2 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_unidades_titulo', true ); ?></h2>
			<div class="wq-flex">
				<?php
					$arrayQueryUnidades = array(
						'post_type'				=> array( 'unidades192' ),
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'posts_per_page'		=> '-1',
					);
					$queryUnidades = new WP_Query($arrayQueryUnidades);
					while ( $queryUnidades->have_posts()) {
						$queryUnidades->the_post();
				?>
					<div class="wq-box_6 wq-box_cp-12 wq-box_cl-12">
						<div class="wq-unidades_box">
							<div class="wq-flex">
								<div class="wq-box_6f wq-box_cp-12f">
									<?php echo get_post_meta( get_the_ID(), 'wsg_unidades_item_iframe', true ); ?>
								</div>
								<div class="wq-box_6f wq-box_cp-12f">
									<div>
										<h2><?php the_title(); ?></h2>
										<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_unidades_item_endereco', true )); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php }wp_reset_query(); ?>
			</div>
		</div>
	</section>

	<!-- <section class="wq-mapa">
		<?php //echo get_post_meta( $id_page, 'wsg_contato_01_iframe', true ); ?>
	</section> -->

<?php get_footer(); ?>