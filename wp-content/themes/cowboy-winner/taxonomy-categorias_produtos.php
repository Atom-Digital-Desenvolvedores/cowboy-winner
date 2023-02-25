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
					<?php
						include "inc-produtos.php";
					?>
				</div>
			</div>
		</div>
	</section>

	<?php include "inc-newsletter.php"; ?>

<?php get_footer(); ?>