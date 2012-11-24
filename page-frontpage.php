<?php
/**
 * Template Name: Frontpage
 */
?>
<?php get_header(); ?>

    <div class="front-feature">
      <div class="container">
        <div class="row">
          <div class="span8">

            <?php if(rand(1,5) > 2): ?>
            <iframe class="hidden-phone" id="ytplayer" type="text/html" width="100%" height="350" src="https://www.youtube.com/embed/GpTfqRu7Bu4?autoplay=0&wmode=opaque&controls=0&rel=0&showinfo=0&HD=1" frameborder="0" allowfullscreen=""></iframe>
            <?php else: ?>
            <iframe class="hidden-phone" id="ytplayer" type="text/html" width="100%" height="350" src="https://www.youtube.com/embed/C3r3E5bEEeU?autoplay=0&wmode=opaque&controls=0&rel=0&showinfo=0&HD=1" frameborder="0" allowfullscreen=""></iframe>
            <?php endif; ?>
            <div class="visible-phone"></div>
          </div>
          <div class="span4" style="text-align:center">
            <?php if(rand(1,5) > 2): ?>
            <a href="./shop"><img src="<?php echo get_stylesheet_directory_uri()?>/img/buybutton-mikkel.png" /></a>
            <?php else: ?>
            <a href="./shop"><img src="<?php echo get_stylesheet_directory_uri()?>/img/buybutton-per.png" /></a>
            <?php endif; ?>
          </div>
        </div>        
      </div>
    </div>

    <?php
    $options = get_option('brondbytrust_theme_options');
    ?>

    <div class="main">
      <div class="container">              
        <div class="row">
          <div class="span12" style="text-align: center">
            <h1 style="margin-bottom: 40px">Derfor skal du støtte Brøndby Supporters Trust</h1>
          </div>
        </div>
        <div class="row">
          <div class="span4" style="text-align: center">
              <img src="<?php echo get_stylesheet_directory_uri()?>/img/bstlogo-50px.png" />
              <h2><?php echo $options['frontpage-left-header']; ?></h2>
              <?php echo $options['frontpage-left-text']; ?>
          </div>
          <div class="span4" style="text-align: center">
              <img src="<?php echo get_stylesheet_directory_uri()?>/img/bstlogo-50px.png" />
              <h2><?php echo $options['frontpage-middle-header']; ?></h2>
              <?php echo $options['frontpage-middle-text']; ?>
         </div>
          <div class="span4" style="text-align: center">
              <img src="<?php echo get_stylesheet_directory_uri()?>/img/bstlogo-50px.png" />
              <h2><?php echo $options['frontpage-right-header']; ?></h2>
              <?php echo $options['frontpage-right-text']; ?>
          </div>
        </div>
        <div class="row" style="margin-top: 30px;">
          <div class="span12" style="text-align: center">
            <h1>Status<small>opdateret <?php echo $options['status-updated']; ?></small></h1>
          </div>
        </div>        
        <div class="row" style="text-align: center">
          <div class="span6">
            <h4>Fundraising</h4>

            <?php 
              // Expects the format prev|current|next
              $fundraising = explode("|", $options['status-fundraising']);
              $members = explode("|", $options['status-medlemmer']);
            ?>

            <div class="bar_mortice rounded blue_mortice">
              <span class="prev"><?php echo $fundraising[0] ?></span>
              <span class="next"><?php echo $fundraising[2] ?></span>
              <div class="progressbar rounded blue" style="width: <?php echo (($fundraising[1]-$fundraising[0])/($fundraising[2]-$fundraising[0])*100); ?>%;"><?php echo $fundraising[1] ?></div>
            </div>
            <a href="http://www.brondbytrust.dk/shop/" class="btn btn-bstlightblue">Køb en fan-aktie!</a>
          </div>
          <div class="span6">
            <h4>Medlemmer</h4>
            <div class="bar_mortice rounded yellow_mortice">
              <span class="prev"><?php echo $members[0] ?></span>
              <span class="next"><?php echo $members[2] ?></span>
              <div class="progressbar rounded yellow" style="width: <?php echo ($members[1]/$members[2]*100); ?>%;"><?php echo $members[1] ?></div>
            </div>
            <a href="https://blivmedlem.brondbytrust.dk/" class="btn btn-bstlightblue">Meld dig ind!</a>
          </div>
        </div>          
      </div>
    </div>

<?php get_footer(); ?>