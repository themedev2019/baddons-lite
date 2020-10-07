<?php 
	extract( (array) $settings);
	$id = $module->node;
	
?>
<div class="nxbb-button-area">
	<div class="nxbb-single-btn">
		<a class="nxbb-icon nx-btn nx-btn-primary sm" href="<?php echo esc_url($link_url);?>"> 
			<?php if( $card_icon != 'no'){
					$icons = ($card_icon == 'library') ? $select_icons : $button_class;
				?>
				<span class="nxadd-icon">
					<i class="nxbb-icon <?php echo esc_attr($icons)?>"></i>
				</span>
			<?php }?>
			<?php _e($tile_text, 'nbaddons');?>
		</a>
	</div>
</div>
