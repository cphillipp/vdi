
<?php 
if (empty($column)) $column=4;

if(!empty($column))
{
	switch ($column){
		case '3': $column_type='fourcol';  	
					break;
		case '4': $column_type='threecol';  	
					break;
		case '6': $column_type='twocol';  	
					break;
		default: $column_type='fourcol';
	}	
}
$woocommerce_loop['columns']=apply_filters( 'loop_shop_columns', 2 );


	$args = array(
		'post_type'	=> 'product',
		'post_status' => 'publish',
		'ignore_sticky_posts'	=> 1,
		'posts_per_page' => $products_per_page,
		'orderby' => $orderby,
		'order' => $order,
		'meta_query' => array(
			array(
				'key' => '_visibility',
				'value' => array('catalog', 'visible'),
				'compare' => 'IN'
			)
		)
	);

	

	$products = new WP_Query( $args );




	if ( $products->have_posts() ) : ?>
	<h1 class="page-title"> <?php echo $title; ?> </h1>
		<ul class="products">

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php //woocommerce_get_template_part( 'content', 'product' ); ?>
				
				<?php
								global $product, $woocommerce_loop;

								// Store loop count we're currently on
								if ( empty( $woocommerce_loop['loop'] ) )
								$woocommerce_loop['loop'] = 0;

								// Store column count for displaying the grid
								if ( empty( $woocommerce_loop['columns'] ) )
								$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $column );

								// Ensure visibilty
								if ( ! $product->is_visible() )
								return;

								// Increase loop count
								$woocommerce_loop['loop']++;
								?>
								<li class="product_col <?php echo $column_type; ?> <?php
								if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 )
										echo 'last';
								elseif ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 )
										echo 'first';
								?>">

								<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

								<a href="<?php the_permalink(); ?>">

										<?php
										/**
										* woocommerce_before_shop_loop_item_title hook
										*
										* @hooked woocommerce_show_product_loop_sale_flash - 10
										* @hooked woocommerce_template_loop_product_thumbnail - 10
										*/
										do_action( 'woocommerce_before_shop_loop_item_title' );
										?>

										<h3><?php the_title(); ?></h3>

										<?php
										/**
										* woocommerce_after_shop_loop_item_title hook
										*
										* @hooked woocommerce_template_loop_price - 10
										*/
										do_action( 'woocommerce_after_shop_loop_item_title' );
										?>

								</a>

								<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

								</li>
				
				
				
				

			<?php endwhile; // end of the loop. ?>

		</ul>

	<?php endif;

