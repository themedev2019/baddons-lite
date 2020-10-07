<?php 
	extract( (array) $settings);
	$id = $module->node;
?>
<div class="nxbb-info-box-wrapper">
	<div class="nxadd-info-box <?php echo esc_attr($settings->layout_type);?>">
		
		<?php if( $icon_type != 'no'){
				$icons = ($icon_type == 'icon') ? $info_icons : $info_icons_custom;
			?>
			<div class="nxadd-icon">
				<i class="nxbb-icon <?php echo esc_attr($icons)?>"></i>
			</div>
		<?php }?>
		<div class="nx-info-body">
		<?php if( !empty($title_text_info) ){?>
			<h3 class="nxadd-title"><?php _e($title_text_info, 'nbaddons');?></h3>
		<?php } ?>
		<?php if( !empty($details_text_info) ){?>
			<p class="nxadd-des"><?php _e($details_text_info, 'nbaddons');?></p>	
		<?php } ?>	
			<?php if( $button_type != 'no'){?>
				<a class="nx-link-icon" href="<?php echo esc_url($link_url_data);?>">
					<?php if( in_array($button_type, ['icon', 'text-icon']) ){?>
					<i class="nx-icon <?php echo esc_attr($select_icons);?>"></i>
					<?php }?>
					<?php if( in_array($button_type, ['text', 'text-icon']) ){?>
						<?php _e($button_text, 'nbaddons');?>
					<?php }?>
				</a>
			<?php } ?>
		</div>	
	</div>
	
</div>
