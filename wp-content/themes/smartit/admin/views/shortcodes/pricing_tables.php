<div class="<?php echo $column_type  ?>">
	
	<div class="pricing-table <?php echo($is_featured ? 'featured' : '') ?>">

		<div class="column">

			<header class="header">
				<h6 class="title"><?php echo $title ?></h6>
			</header><!--/ .header -->

			<div class="heading">
				<span class="currency"><?php echo $currency ?></span>
				<span class="int"><?php echo $integer_price ?></span>
				<sup data-month="<?php echo $price_description ?>"><?php echo $fractional_price ?></sup> 
			</div><!--/ .price-->

			<ul class="features">

				<?php $list_items = explode('`', $content); ?>

				<?php if (!empty($list_items)): ?>

					<?php foreach ($list_items as $key => $value) : ?>

						<?php 

						$css_class = "";

						$not_include = substr($value, 0, 1);

						if ($not_include == "^") {
							$value = substr($value, 1, strlen($value) - 1);
							$css_class = 'check';
						}

						?>

						<li><?php echo ($css_class == 'check' ? '<span class=" '. $css_class . ' "></span>' : $value); ?></li>

					<?php endforeach; ?>

				<?php endif; ?>

				<li class="footer">
					<a class="button <?php echo $button_type ?> bcolor" href="<?php echo $button_link ?>"><?php echo $button_text ?></a>
				</li>

			</ul><!--/ .features -->	

		</div><!--/ .column-->

	</div><!--/ .pricing-table-->
	
</div>

