		<div class="sponsors">
		  	I samarbejde med
			<!--
			<img src="<?php echo get_stylesheet_directory_uri()?>/img/carlsberg_logo.gif" />
			<img src="<?php echo get_stylesheet_directory_uri()?>/img/hummel-logo.jpg" />
			-->
			<img src="<?php echo get_stylesheet_directory_uri()?>/img/glostrupfolkeblad.jpg" />
		</div>
		<div class="footer">
		  <div class="container">
		    <div class="row">
		      <div class="span4">
				<?php dynamic_sidebar('footer_left_widget'); ?>
		      </div>
		      <div class="span4">
		      	<?php dynamic_sidebar('footer_center_widget'); ?>
		      </div>
		      <div class="span4">

				<?php if(!dynamic_sidebar('footer_right_widget')): ?>

		        <h4>Brøndby Supporters Trust</h4>
		        Gammel Kirkevej 1<br/>
		        2605 Brøndby<br/>
		        CVR: 34542813<br/>
		        kontakt@brondbytrust.dk<br/>
		        Tlf. 43 42 75 75<br/><br/>

		        <img src="<?php echo get_stylesheet_directory_uri()?>/img/dankort.gif" />

	    		<?php endif; ?>
		      </div>
		    </div>
		  </div>
		</div>

		<?php wp_footer(); ?>

	</body>
</html>