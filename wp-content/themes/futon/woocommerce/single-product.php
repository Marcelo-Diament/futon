<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	
	<!-- CUSTOMIZAÇÃO DA PÁGINA - INÍCIO -->
	<section class="row">
		
		<!-- GALERIA DE IMAGENS - INÍCIO -->

		<article class="col-6">

			<?php 

				$image = get_field('imagem_de_capa');

				if( !empty($image) ): ?>

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" height="696" width="696" title="<?php echo $image['title']; ?>" />

			<?php endif; ?>
			
		</article>
		<!-- GALERIA DE IMAGENS - FIM -->

		<!-- INFORMAÇÕES GERAIS - INÍCIO -->
		<article class="col-6">
			<!-- Título do Produto vindo do ACF-->
			<h1 class="titulo"><?php the_field('titulo'); ?></h1>

			<!-- Subtítulo do Produto vindo do ACF-->
			<h2 class="subtitulo"><?php the_field('subtitulo'); ?></h2>
			
			<!-- Descrição do Produto vindo do ACF -->
			<div class="descricao"><?php the_field('descricao'); ?></div>

			<!-- Medidas do Produto vindo do ACF -->
			<?php 

				$image = get_field('dimensoes');

				if( !empty($image) ): ?>

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" height="80" width="470" title="<?php echo $image['title']; ?>" />
			<?php endif; ?>

			<small class="dimensoes">medidas em cm</small>

			<!-- Material vindo do ACF -->
			<small class="material"><?php the_field('material'); ?></small>

			<!-- Cores Disponíveis vindo do ACF -->
			<?php 

				$images = get_field('cores');

				if( $images ): ?>
				    <div class="flex-grid">
				        <ul class="cores">
				            <?php foreach( $images as $image ): ?>
				                <li>
				                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="32" height="32" />
				                </li>
				            <?php endforeach; ?>
				        </ul>
				    </div>
			<?php endif; ?>
		
		</article>
		<!-- INFORMAÇÕES GERAIS - FIM -->
	
	</section>

	<section class="row">

		<!-- Tabs de Informações Complementares-->
		<article class="col-12 info-complementar">
			
			<nav>
			  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
			    <a class="nav-item nav-link active" id="nav-descricao-tab" data-toggle="tab" href="#nav-descricao" role="tab" aria-controls="nav-descricao" aria-selected="true">Descrição</a>
			    <a class="nav-item nav-link" id="nav-duvidas-tab" data-toggle="tab" href="#nav-duvidas" role="tab" aria-controls="nav-duvidas" aria-selected="false">Dúvidas</a>
			    <a class="nav-item nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="false">Informações</a>
			    <a class="nav-item nav-link" id="nav-manuais-tab" data-toggle="tab" href="#nav-manuais" role="tab" aria-controls="nav-manuais" aria-selected="false">Manuais</a>
			  </div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
			  <div class="tab-pane fade show active" id="nav-descricao" role="tabpanel" aria-labelledby="nav-descricao-tab">
			  	<?php the_field('descricao_adicional'); ?>
			  </div>
			  <div class="tab-pane fade" id="nav-duvidas" role="tabpanel" aria-labelledby="nav-duvidas-tab">
			  	<?php the_field('duvidas'); ?>
			  </div>
			  <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
			  	<?php the_field('informacoes_tecnicas'); ?>
			  </div>
			  <div class="tab-pane fade" id="nav-manuais" role="tabpanel" aria-labelledby="nav-manuais-tab">
			  	<?php the_field('manuais'); ?>
			  </div>
			</div>

		</article>


		
	</section>
	
	<!-- CUSTOMIZAÇÃO DA PÁGINA - FIM -->



		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
