		<div class="sponsors">
		  	I samarbejde med<br/>
			<img src="<?php echo get_stylesheet_directory_uri()?>/img/baursoffset.png" />
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

		<script>

			jQuery(function() {
					
				jQuery('.progressbar').each(function(){
					var t = jQuery(this),
						dataperc = t.attr('data-perc'),
						barperc = Math.round(dataperc*5.56);
					t.find('.bar').animate({width:barperc}, dataperc*25);
					t.find('.label').append('<div class="perc"></div>');
					
					function perc() {
						var length = t.find('.bar').css('width'),
							perc = Math.round(parseInt(length)/5.56),
							labelpos = (parseInt(length)-2);
						t.find('.label').css('left', labelpos);
						t.find('.perc').text(perc+'%');
					}
					perc();
					setInterval(perc, 0); 
				});
			});

		</script>

		<script>
			var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-33630372-1']);
				_gaq.push(['_trackPageview']);

				(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>

	</body>
</html>