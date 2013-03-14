<div class="widget widget_testimonials">

    <div class="quoteBox bcolor">
        
    <!--<h3 class="widget-title"><?php echo $instance['title'] ?></h3>-->

    <?php
    $query = new WP_Query(array(
                'post_type' => 'testimonials',
                'orderby' => 'rand',
            ));

    $uniq_id = uniqid();
	
    ?>
		
		<ul class="testimonials_<?php echo $uniq_id ?> quotes">

			<?php
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
					?>

					<li>

						<div class="quote-text"><?php the_content_feed(); ?></div><!--/ .quote-text-->
						<div class="quote-author">-<?php the_title(); ?>-</div><!--/ .quote-author-->

					</li>

					<?php
				endwhile;
			endif;

			wp_reset_query();
			?>

		</ul>
		
    </div>
	
	<script type="text/javascript">

		jQuery(document).ready(function($) {

			/* ---------------------------------------------------------------------- */
			/*	Cycle
					/* ---------------------------------------------------------------------- */



				// Testimonials
				var $quotes = $("ul.testimonials_<?php echo $uniq_id ?>");


					$quotes.each(function(i) {
						var $this = $(this);

						$this.cycle({
							before: function(curr, next, opts) {
								var $this = $(this);
								$this.parent().stop().animate({
									height: $this.height()
								}, opts.speed);
							},
							containerResize : false,
							easing          : 'easeInOutExpo',
							fx              : 'fade',
							fit             : true,
							pause           : true,
							slideExpr       : 'li',
							slideResize     : true,
							speed           : 600,
							timeout         : <?php echo (int) $instance['pause'] ?>,
							width           : '100%'
						});
					});




			/* end Cycle */


		});

	</script>
	
</div><!--/ .widget-container-->



