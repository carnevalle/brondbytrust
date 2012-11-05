<?php get_header(); ?>

<div class="main">
  <div class="container">
    <div class="row">
      <div class="span8">
        
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="text-box post">
              <span class="byline">Publiceret <?php echo the_time('j. F Y'); ?>, Kl. <?php the_time('H:i'); ?></span>

              <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

              <?php the_content(); ?>

              <?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>

              <?php comments_template(); ?>
            </div> 

            <?php endwhile; else : ?>
        
              <h2><?php _e("Indlægget findes ikke", "brondbytrusttheme"); ?></h2>
        
            <?php endif; ?>
      </div>
      <div class="span4">
        <?php get_sidebar("sidebar"); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>