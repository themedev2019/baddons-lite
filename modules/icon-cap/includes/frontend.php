<?php 
	extract( (array) $settings);
	$id = $module->node;
?>
<div class="nxbb-icon-caps-area">
	<div class="nxadd-icon-caps-wrapper">
		<?php if( !empty($badge_title) ):?><span class="nxadd-icon-caps-badge"><?php _e($badge_title, 'nbaddons');?></span><?php endif;?>
		<div class="nxadd-icon-inner <?php echo esc_attr($layout_type);?>">
			
			<?php if( $card_icon != 'no'){
					$icons = ($card_icon == 'library') ? $select_icons : $button_class;
				?>
				<span class="nxadd-icon">
					<i class="nxbb-icon <?php echo esc_attr($icons)?>"></i>
				</span>
			<?php }?>

			<?php if( !empty($icon_title) ):?>
			<h3 class="nxadd-icon-caps-title-wrap">
				<a href="<?php echo esc_url($link_url);?>" class="nxadd-icon-caps-title"><?php _e($icon_title, 'nbaddons'); ?></a>
			</h3>
			<?php endif;?>
		</div>
	</div>
</div>
