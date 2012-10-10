<?php get_header(); ?>

<div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.html">
            <img src="<?php echo get_stylesheet_directory_uri()?>/img/bstlogo.png" class="logo hidden-phone"/> 
            Brøndby Supporters Trust
          </a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="page.html">Nyheder</a></li>
              <li><a href="page.html">Foreningen</a></li>
              <li><a href="page.html">Bliv medlem</a></li>
              <li><a href="fanaktier.html" class="buy">Køb din fanaktie</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="front-feature">
      <div class="container">
        <div class="row">
          <div class="span8">
            <!--<iframe width="100%" height="400" src="http://www.youtube.com/embed/K38fpv5nMe4?rel=0" frameborder="0" allowfullscreen></iframe>-->
            <iframe id="ytplayer" type="text/html" width="100%" height="350" src="https://www.youtube.com/embed/GpTfqRu7Bu4?modestbranding=1&rel=0&showinfo=0&color=white&theme=light"frameborder="0" allowfullscreen></iframe>
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

    <div class="main">
      <div class="container">
        <div class="row">
          <div class="span4">
            <h2>Åbenhed</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn" href="#">View details &raquo;</a></p>
          </div>
          <div class="span4">
            <h2>Ansvarlighed</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn" href="#">View details &raquo;</a></p>
         </div>
          <div class="span4">
            <h2>Demokrati</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn" href="#">View details &raquo;</a></p>
          </div>
        </div>
      </div>
      </div>
    </div>

    <div class="sponsors">
      I samarbejde med
      <img src="<?php echo get_stylesheet_directory_uri()?>/img/carlsberg_logo.gif" />
      <img src="<?php echo get_stylesheet_directory_uri()?>/img/hummel-logo.jpg" />
      <img src="<?php echo get_stylesheet_directory_uri()?>/img/glostrupfolkeblad.jpg" />
    </div>
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="span4">
            <h4>Brøndby Supporters Trust</h4>
            Gammel Kirkevej 1<br/>
            2605 Brøndby<br/>
            CVR: 34542813<br/>
            kontakt@brondbytrust.dk<br/>
            Tlf. 43 42 75 75<br/><br/>

            <a href="#">Læs vores salgsbetingelser</a><br/><br/>
            <img src="<?php echo get_stylesheet_directory_uri()?>/img/dankort.gif" />
          </div>
          <div class="span4">
            <h4>Seneste nyheder</h4>
            <ul class="unstyled list">
              <li><a href="#">Brøndby Supporters Trust lancerer banebrydende koncept</a></li>
              <li><a href="#">dsfdsf</a></li>
              <li><a href="#">dsfdsf</a></li>
            </ul>

          </div>
          <div class="span4">       
        
          </div>
        </div>
      </div>
    </div>

<?php get_footer(); ?>