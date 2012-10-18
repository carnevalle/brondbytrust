<?php get_header(); ?>

<div class="main">
	<div class="container">
		<div class="row">
			<div class="span8">
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
			<div class="span4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>