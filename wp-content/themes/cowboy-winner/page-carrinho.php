<?php

	session_start();

	get_header();

	$id_page = get_page_by_path( 'carrinho', OBJECT, 'page' )->ID;

	$id_email = get_page_by_path( 'email', OBJECT, 'contatos' )->ID;
	$id_telefones = get_page_by_path( 'telefones', OBJECT, 'contatos' )->ID;

	$id_contato = get_page_by_path( 'contato', OBJECT, 'page' )->ID;
	$wsg_contato_widget = get_post_meta($id_contato, 'wsg_contato_widget', true);

	if(isset($_GET['acao']) && in_array($_GET['acao'], array('add', 'del', 'up'))) {

		if($_GET['acao'] == 'add' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])){
			if (isset($_GET['tamanho'])) {
				addCart($_GET['id'], $_GET['quantidade'], $_GET['tamanho']);
			} else{
				if (isset($_GET['quantidade'])) {
					addCart($_GET['id'], $_GET['quantidade'], '');
				}
			}
		}

		if($_GET['acao'] == 'del' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])){
			deleteCart($_GET['id']);
		}

		if($_GET['acao'] == 'up'){
			if(isset($_POST['prod']) && is_array($_POST['prod'])){
				foreach($_POST['prod'] as $id => $indice){
						updateCart($id, $indice['quantidade']);
				}
			}
		}

		$url = get_bloginfo('url').'/carrinho/';
		header("HTTP/1.1 301 Moved Permanently");
		header('location: '.$url);
	}

	$resultsCarts = getContentCart( 'produtos192' );
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-carrinho-01">
		<div class="wq-container">
			<div class="titulo">
				<h5 class="wq-subtitulo">produtos selecionados</h5>
				<h3>Listagem de produtos que você já selecionou</h3>
			</div>
			<div class="wq-flex">
				<div class="wq-box_8 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12 wq-box_tl-7">
					<div class="wq-carrinho-itens">
						<form action="<?php bloginfo('url') ?>/carrinho?acao=up" method="post">
							<?php foreach($resultsCarts as $result) { ?>
								<div class="wq-carrinho-item">
									<div>
										<figure>
											<?php getImageThumb($result['img'],'100x100'); ?>
										</figure>
										<h2><?php echo $result['title']; ?></h2>
									</div>
									<input type="number" name="prod[<?php echo $result['id']?>]" value="<?php echo $result['quantidade']?>" min="1" class="wq-quantidade">
									<select name="tamanho-prod[<?php echo $result['id']?>]">
										<option value="<?php echo $result['tamanho']?>" selected><?php echo $result['tamanho']?></option>
										<?php
											$tamanhos = get_the_terms( $result['id'], 'tamanhos_produtos' );
											if (!empty($tamanhos)) {
												foreach ($tamanhos as $key => $value) {
										?>
											<option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
										<?php } } ?>
									</select>
									<a href="<?php bloginfo('url') ?>/carrinho?acao=del&id=<?php echo $result['id']?>" class="wq-remove-item">
										<img src="<?php bloginfo('template_url') ?>/img/remove-icon.svg" alt="icone remover" title="Remover">
									</a>
								</div>
							<?php } ?>
						</form>
						<script>
							$('input[type="number"]').on('input', function() {
								$('.wq-carrinho-itens form').submit();
							});
						</script>
					</div>
				</div>
				<div class="wq-box_4 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12 wq-box_tl-5">
					<div>
						<p>Você pode continuar selecionando outros produtos. Quando finalizar, preencha este formulário e envie o pedido clicando no botão verde aqui embaixo.</p>
						<div class="wq-formulario-conclusao-pedido">
							<form action="#" onsubmit="return submitFormWithRecaptcha(this);" class="contact-form" method="POST">

								<input type="hidden" name="subject_email" value="Orçamento">
								<input required type="hidden" name="title_email" value="Orçamento enviado pelo site">

								<h4>Nome:</h4>
								<input type="hidden" name="label-send-data-name" value="Nome">
								<input required type="text" name="send-data-name" placeholder="Qual é o seu nome?">

								<h4>Email:</h4>
								<input type="hidden" name="label-send-data-email" value="Email">
								<input required type="email" name="send-data-email" placeholder="Qual é o seu email?">

								<h4>Telefone</h4>
								<input type="hidden" name="label-send-data-phone" value="Telefone">
								<input required type="text" name="send-data-phone" placeholder="Qual é o seu telefone?" class="inputphone">

								<input type="hidden" name="label-send-data-message" value="Produtos">
								<textarea required name="send-data-message" style="display: none;">
									<?php
										foreach($resultsCarts as $result) {

											if (!empty($result['tamanho'])) {
												echo "<br/>".$result['title']." - Tamanho: ".$result['tamanho'].", Quantidade: ".$result['quantidade'].";";
											}else{
												echo "<br/>".$result['title'].", Quantidade: ".$result['quantidade'].";";
											}
										}
									?>
								</textarea>

								<?php if (strlen($wsg_contato_widget) > 0) { ?>
									<div class="g-recaptcha invisible-recaptcha" id="recaptcha-<?php echo md5(uniqid(rand(), true)); ?>" data-sitekey="<?php echo $wsg_contato_widget; ?>" data-size="invisible"></div>
								<?php } ?>

								<button type="submit" class="wq-btn">finalizar e enviar pedido de orçamento</button>
							</form>
						</div>
						<div>
							<a href="<?php bloginfo('url'); ?>/produtos" class="wq-btn">escolher mais produtos</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>