<?php get_header(); ?>

    <div class="front-feature">
      <div class="container">
        <div class="row">
          <div class="span8">
            <!--<iframe width="100%" height="400" src="http://www.youtube.com/embed/K38fpv5nMe4?rel=0" frameborder="0" allowfullscreen></iframe>-->
            <!-- <iframe class="hidden-phone" id="ytplayer" type="text/html" width="100%" height="350" src="https://www.youtube.com/embed/GpTfqRu7Bu4?modestbranding=1&rel=0&showinfo=0&color=white&theme=light"frameborder="0" allowfullscreen></iframe>-->
            <iframe class="hidden-phone" id="ytplayer" type="text/html" width="100%" height="350" src="https://www.youtube.com/embed/GpTfqRu7Bu4?autoplay=0&wmode=opaque&controls=0&rel=0&showinfo=0&HD=1" frameborder="0" allowfullscreen=""></iframe>
            <div class="visible-phone">Visible phone</div>
          </div>
          <div class="span4">
            <div class="rounded-box textured">

              <div class="progresspart">
                <h3>DKK 753.000</h3>
                <div class="progress progress-trust">
                  <div class="bar" style="width: 40%;"></div>
                </div>
              </div>
              <div class="middlepart hidden-phone">
                Sammen kan vi bringe Brøndby IF tilbage til toppen af dansk fodbold. Bliv en del af Brøndbys comeback. Vør med til at skrive historie.
              </div>
              <div class="actionpart">
                <a href="fanaktier.html" class="btn btn-bstgreen">Køb din fanaktie!</a>
              </div>
            </div>
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
          <div class="span4">
            <h2><?php echo $options['frontpage-left-header']; ?></h2>
            <?php echo $options['frontpage-left-text']; ?>
            <p><a class="btn" href="#">View details &raquo;</a></p>
          </div>
          <div class="span4">
            <h2><h2><?php echo $options['frontpage-middle-header']; ?></h2></h2>
            <?php echo $options['frontpage-middle-text']; ?>
            <p><a class="btn" href="#">View details &raquo;</a></p>
         </div>
          <div class="span4">
            <h2><h2><?php echo $options['frontpage-right-header']; ?></h2></h2>
            <?php echo $options['frontpage-right-text']; ?>
            <p><a class="btn" href="#">View details &raquo;</a></p>
          </div>
        </div>
      </div>
      </div>
    </div>

<?php get_footer(); ?>