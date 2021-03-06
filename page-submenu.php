<?php
/**
 * Template Name: Page w/ submenu
 */
?>
<?php get_header(); ?>

<div class="main">
	<div class="container">
		<div class="row">
			<div class="span2">
				<ul class="unstyled">
					<li>Værdigrundlag</li>
					<li>Bestyrelsen</li>
					<li>Vedtægter</li>
				</ul>
			</div>
			<div class="span7">
				<div class="round-text-box post">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<span class="byline">Publiceret <?php echo the_time('j. F Y'); ?>, Kl. <?php the_time('H:i'); ?></span>
						<h2><?php the_title(); ?></h2>

						<?php the_content(); ?>

						<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>

						<?php comments_template(); ?>

				    <?php endwhile; else : ?>
				
						<h2><?php _e("Oops, Post Not Found!", "brondbytrusttheme"); ?></h2>
				
				    <?php endif; ?>

				</div> 
			</div>
			<div class="span3">
				<div class="round-text-box">
					Her kommer en menu
				</div>				
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>