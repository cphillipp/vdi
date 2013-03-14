<?php get_header(); ?>

<!-- - - - - - - - - - - - Entry - - - - - - - - - - - - - - -->		

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


		<?php the_content(); 
		
	endwhile;
endif;
?>
		
<!-- - - - - - - - - - - - end Entry - - - - - - - - - - - - - - -->			

<?php get_footer(); ?>

