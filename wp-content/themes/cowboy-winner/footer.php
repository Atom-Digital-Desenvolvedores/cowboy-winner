<?php
	$id_sobre = get_page_by_path( 'sobre-nos', OBJECT, 'page' )->ID;
	$id_admin = get_page_by_path( 'slug-outras-info', OBJECT, 'adminpanel' )->ID;

	$id_logo = get_page_by_path( 'configuracoes-da-logo', OBJECT, 'gerais' )->ID;
	$id_telefones = get_page_by_path( 'telefones', OBJECT, 'contatos' )->ID;
	$id_email = get_page_by_path( 'email', OBJECT, 'contatos' )->ID;
?>

	<footer class="wq-footer">
		<div class="wq-footer_top">
			<div class="wq-container">
				<div class="wq-flex">
					<div class="wq-box_3 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6">
						<h4>Redes sociais</h4>
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

						<a href="<?php bloginfo('template_url'); ?>/img/" class="wq-logo">
							<figure>
								<?php
									$wsg_logo_footer_img_id = get_post_meta( $id_logo, 'wsg_logo_footer_img_id', true );
									echo getImageThumb($wsg_logo_footer_img_id, 'full');
								?>
							</figure>
						</a>
					</div>
					<div class="wq-box_3 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6">
						<h4>
							<?php
								$menu_location = 'footer-menu';
								$menu_locations = get_nav_menu_locations();
								$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
								$menu_name = (isset($menu_object->name) ? $menu_object->name : '');
								echo esc_html($menu_name);
							?>
						</h4>
						<ul class="wq-menu_footer">
							<?php
								$menu_name = 'footer-menu';
								$locations = get_nav_menu_locations();
								$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
								$primaryNav = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
								wp_nav_menu( array(
									'menu'            => 'footer-menu',
									'container'       => '',
									'menu_class'      => 'menu',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'items_wrap'      => '%3$s',
									'depth'           => 4,
								) );
							?>
						</ul>
						<script>
							var $temFilho = $('.wq-menu_footer ul li').has( "ul" );
							$($temFilho).attr({
								class: "wq-dropdown",
								onclick: ""
							});
							var $temNeto = $('.wq-menu_footer ul li ul li').has( "ul" );
							$($temNeto).attr({
								class: "wq-dropright",
								onclick: ""
							});
						</script>
					</div>
					<div class="wq-box_3 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6">
						<h4>Contato</h4>
						<ul class="wq-footer_contatos">
							<?php
								$wsg_emails = get_post_meta( $id_email, 'wsg_emails', true );
								foreach ( (array) $wsg_emails as $key => $email ) {
							?>
								<li>
									<a href="mailto:<?php echo $email; ?>" target="_blank">
										<span class="flaticon-mail-1"></span>
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
									<a href="<?php echo $wsg_telefone_link; ?>" target="_blank">
										<?php if ( $wsg_telefone_icone == "phone-1" ){ ?>
											<span class="flaticon-phone-1"></span>
											<p>
												<span>Telefone</span>
										<?php } else { ?>
											<span class="flaticon-whatsapp-1"></span>
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
					<div class="wq-box_3 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6">
						<h4>Nossas unidades</h4>
						<ul class="wq-footer_contatos">
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
								<li>
									<span class="flaticon-placeholder-1"></span>
									<div>
										<p>
											<span><?php the_title(); ?></span>
											<?php echo get_post_meta( get_the_ID(), 'wsg_unidades_item_endereco', true ); ?>
										</p>
									</div>
								</li>
							<?php }wp_reset_query(); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="wq-footer_bottom">
			<div class="wq-container">
				<div class="wq-flex">
					<?php echo wpautop(get_post_meta( $id_sobre, 'wsg_sobre_footer_copyright', true )); ?>
					<?php echo wpautop(get_post_meta( $id_admin, 'agency_setting_footer_site_content', true )); ?>
				</div>
			</div>
		</div>
	</footer>

	<?php
		$id_google = get_page_by_path( 'configuracoes-do-google', OBJECT, 'gerais' )->ID;

		echo get_post_meta( $id_google, 'script_analytics', true );
	?>

	<script src="<?php bloginfo('template_url') ?>/js-template/footer-load.js"></script>

	<?php wp_footer(); ?>

	<!-- Botão Whatsapp HTML/JS -->
	<div class="nav-bottom-whatsapp-websam">
		<div class="popup-whatsapp-websam box-sombra">
			<!--cabeçalho-->
			<div class="cabecalho-websam grid-websam grid-template-top-websam rounded-top-websam">
				<div class="btn-fechar-websam">
					<button type="button" class="closePopup-websam">
						<span>x</span>
					</button>
				</div>
				<div class="titulo-top-websam">
					<p><?php echo get_post_meta( $id_telefones, 'wsg_whatsapp_popup_titulo', true ); ?></p>
				</div>
			</div>
			<!--fim cabeçalho-->
			<div class="atendimento-corpo-websam">
				<?php
					$entries = get_post_meta( $id_telefones, 'whatsapp_popup_items', true );

					foreach ( (array) $entries as $key => $entry ) {

						if ( isset( $entry['wsg_whatsapp_popup_items_img_id'] ) ) {
							$wsg_whatsapp_popup_items_img_id = $entry['wsg_whatsapp_popup_items_img_id'];
						}
						if ( isset( $entry['wsg_whatsapp_popup_items_link'] ) ) {
							$wsg_whatsapp_popup_items_link = $entry['wsg_whatsapp_popup_items_link'];
						}
						if ( isset( $entry['wsg_whatsapp_popup_items_nome'] ) ) {
							$wsg_whatsapp_popup_items_nome = $entry['wsg_whatsapp_popup_items_nome'];
						}
						if ( isset( $entry['wsg_whatsapp_popup_items_subtitulo'] ) ) {
							$wsg_whatsapp_popup_items_subtitulo = $entry['wsg_whatsapp_popup_items_subtitulo'];
						}
				?>
					<a href="<?php echo $wsg_whatsapp_popup_items_link; ?>" target="_blank">
						<div class="usuario-websam grid-websam grid-template-usuario-websam">
							<div class="imagem-usuario-websam">
								<?php getImageThumb($wsg_whatsapp_popup_items_img_id,'64x64') ?>
							</div>
							<div class="titulo-usuario-websam">
								<p class="titulo1-websam"><?php echo $wsg_whatsapp_popup_items_nome; ?></p>
								<p class="titulo2-websam"><?php echo $wsg_whatsapp_popup_items_subtitulo; ?></p>
							</div>
						</div>
					</a>
				<?php } ?>
			</div>
		</div>
		<button type="button" class="whatsapp-button-websam float-whatsapp">
			<span class="flaticon-whatsapp-2"></span>
		</button>
	</div>
	<script>
		popupWhatsApp = () => {
			let btnClosePopup = document.querySelector('.closePopup-websam');
			let btnOpenPopup = document.querySelector('.whatsapp-button-websam');
			let popup = document.querySelector('.popup-whatsapp-websam');

			btnClosePopup.addEventListener("click",  () => {
			popup.classList.toggle('is-active-whatsapp-popup-websam')
			})

			btnOpenPopup.addEventListener("click",  () => {
			popup.classList.toggle('is-active-whatsapp-popup-websam')
			popup.style.animation = "fadeIn .6s 0.0s both";
			})

			//setTimeout(() => {
			//popup.classList.toggle('is-active-whatsapp-popup');
			//}, 3000);
		}
		popupWhatsApp();
	</script>

	<!-- Botão Whatsapp CSS -->
	<style type="text/css">
		/*GERAL*/
		a.nav-bottom-whatsapp-websam:hover {
			text-decoration: none;
		}
		button:focus {
			outline:0;
		}
		.box-sombra {
			box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			transition: all 0.3s cubic-bezier(.25,.8,.25,1);
		}
		.box-sombra:hover {
			box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
		}
		/*FIM GERAL*/

		/*GRID*/
		.grid-websam {
			display: grid;
			max-width: 360px;
			margin: 0 auto;
		}
		.grid-template-top-websam {
			grid-template-columns: 30px auto;
			grid-template-rows: 70px auto;
		}
		.grid-template-usuario-websam {
			grid-template-columns: 80px auto;
			grid-template-rows: 64px auto;
		}

		/*FIM GRID*/

		/*POPUP*/
		.nav-bottom-whatsapp-websam{
			display: flex;
			flex-direction: row;
			justify-content: flex-end;
			align-content: flex-end;
			width: auto;
			height: auto;
			position: fixed;
			z-index: 999999;
			bottom: 65px;
			right: 0px;
			padding: 5px;
			margin: 0px;
		}
		.popup-whatsapp-websam {
			z-index: 999999;
			display: none;
			position: absolute;
			flex-direction: column;
			justify-content: flex-start;
			align-items: flex-start;
			width: 400px;
			height: auto;
			padding: 10px;
			bottom: 100px;
			right: 6px;
			transition: .5s;
			border-radius: 10px;
			background-color: rgb(255, 255, 255);
		}
		.rounded-top-websam {
			border-top-left-radius: .25rem!important;
			border-top-right-radius: .25rem!important;
		}
		.closePopup-websam {
			margin-bottom: -20px;
			font-size: 2em;
			display: flex;
			justify-content: center;
			align-items: center;
			width: 18px;
			height: 18px;
			border-radius: 50%;
			border: none;
			outline: none;
			cursor: pointer;
			background-color: transparent;
		}
		.is-active-whatsapp-popup-websam {
			overflow-y: auto;
			display: flex;
			animation: slideInRight .6s 0.0s both;
			display: flex;
			width: 360px;
			background: #f4f4f4;
		}
		/*FIM POPUP*/

		/*CABEÇALHO*/
		.cabecalho-websam {
			background: #25d366;
			color: #fff;
			padding: 10px 0px 10px 0px;
			width: 360px;
			margin: 0 auto;
		}

		.btn-fechar-websam span{
			font-size: 22px;
			font-weight: 600;
			color: #FFF;
			padding-left: 10px;
		}

		.titulo-top-websam {
			/*font-family: 'Roboto', sans-serif;*/
			font-size: 16px;
			font-weight: 400;
		}

		/*FIM CABEÇALHO*/

		/*AREA DOS USUARIOS*/
		.atendimento-corpo-websam {
			height: 255px;
			margin: 0 auto;
			overflow: overlay;
		}
		.atendimento-corpo-websam::-webkit-scrollbar-track{
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.1);
			background-color: #F5F5F5;
			border-radius: 10px;
		}

		.atendimento-corpo-websam::-webkit-scrollbar{
			width: 8px;
			background-color: #F5F5F5;
		}

		.atendimento-corpo-websam::-webkit-scrollbar-thumb{
			border-radius: 10px;
			background-color: #075e54;
			/*background-image: -webkit-gradient(linear, 40% 0%, 75% 84%, from(#4D9C41), to(#19911D), color-stop(.6,#54DE5D))*/
		}
		/*FIM DA AREA DOS USUARIOS*/

		/*USUARIO*/
		.usuario-websam {
			width: 360px;
			background: #fff;
			border-bottom: 1px solid #ccc;
			color: #333333;
			padding: 10px 0px 10px 0px;
			margin: 0 auto;
		}

		.usuario-websam:hover {
			background-color: #dcf8c6;
			transition: 0.3s ease-in;
		}
		.imagem-usuario-websam {
			margin: 0 auto;
			overflow: hidden;
			border-radius: 50%;
		}
		.imagem-usuario-websam img{
			display: block;
			width: 64px;
		}
		.imagem-circular-websam {
			overflow: hidden;
			border-radius: 50%!important;
		}
		.titulo-usuario-websam {
			margin: 5px;
			padding: 5px;
		}
		p.titulo1-websam{
			font-size: 1.1em;
			font-weight: 600
		}
		p.titulo2-websam{
			font-size: 0.9em;
			font-weight: 400;
		}
		/*FIM USUARIO*/

		/*BOTAO WHATSAPP*/
		.whatsapp-button-websam {
			display: flex;
			align-content: center;
			justify-content: center;
			z-index: 9999;
			height: 60px;
			width: 60px;
			margin: 10px;
			padding: 7px;
			border: none;
			outline: none;
			cursor: pointer;
			transition: .3s;
			border-radius: 50%;
			background-color: rgb(255, 255, 255);
			box-shadow: 0px 0px 25px -6px rgba(0,0,0,1);
			animation: effect 5s infinite ease-in;
		}
		@keyframes effect {
			20%, 100% {
				width: 60px;
				height: 60px;
				font-size: 35px;
			}
			0%, 10%{
				width: 65px;
				height: 65px;
				font-size: 40px;
			}
			5%{
				width: 60px;
				height: 60px;
				font-size: 35px;
			}
		}
		.float-whatsapp{
			position: fixed;
			height: 60px;
			width: 60px;
			right: 10px;
			bottom: 80px;
			color: #FFF;
			text-align: center;
			font-size: 30px;
			z-index: 9999;
			border-radius: 50px;
			background-color: #25d366;
			box-shadow: 2px 2px 3px #999;
		}
		/*FIM BOTAO WHATSAPP*/

		@media only screen and (max-width: 767px) {
			.is-active-whatsapp-popup-websam {
				width: 290px;
			}
			.cabecalho-websam {
				width: 290px;
			}
			.titulo-top-websam {
				font-size: 1em;
			}
			.atendimento-corpo-websam {
				height: 275px;
				width: 290px;
			}
			.usuario-websam {
				width: 290px;
			}
		}
	</style>

</body>
</html>