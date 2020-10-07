<?php 
	extract( (array) $settings);
	$id = $module->node;
	$currency_data = ($currency == 'custom') ? $custom_currency : $module->_price($currency);
	
?>
<div class="nxbb-pricing-area">
	<div class="nxadd-pricing-table colorfull-style nxadd-pricing-bridge">
		<?php if( !empty($heading_text) ){?>
		<div class="nxadd-pricing-header ">
			<h2 class="pricing-title"> <?php _e($heading_text, 'nbaddons');?> </h2>
		</div>
		<?php }?>
		<div class="nxadd-pricing-price">
			<span class="nxadd-price ">
				<sup><?php echo $currency_data;?></sup>
				<?php echo esc_html($price_data);?>
				<?php if( !empty($package_name) ){?><sub><?php _e($package_name, 'nbaddons')?></sub> <?php }?>
			</span>
		</div>
		<div class="nxadd-pricing-content">
			<?php if( !empty($items_title) ){?>
				<ul class="nxadd-pricing-list ">
					<?php foreach($items_title as $v):
						if( empty( trim($v) ) ){
							continue;
						}
						?>
					<li><?php _e($v, 'nbaddons');?></li>
					<?php endforeach;?>
				</ul>
			<?php }?>
		</div>
		<?php if( !empty($button_text) ){?>
		<div class="nxadd-pricing-action">
			<a href="<?php echo esc_url($link_url);?>" class="nxadd-btn nxadd-btn-outline-primary"> <?php _e($button_text, 'nbaddons');?></a>
		</div>
		<?php }?>
	</div>
	
</div>
