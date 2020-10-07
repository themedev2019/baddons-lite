<?php 
	extract( (array) $settings);
	$id = $module->node;
?>
<div class="nxbb-image-box">
	<div class="nxadd-image-box">
	<?php if( $settings->photo_source_data != 'no' ) : ?>
		<a class="box-thumble" href="<?php echo esc_url($link_url_data);?>">
			
			<?php if( $settings->photo_source_data == 'library' ){
				 _e( wp_get_attachment_image( $settings->photo, 'full', '', ['class' => 'fulid-img']) );
			  } else { ?>
				<img class="fulid-img" src="<?php echo esc_url($settings->photo_url_data);?>" alt="">
			 <?php } ?>
		</a>
	<?php endif;?>
		<div class="nxadd-box-body">
		<?php if( !empty($title_text_data) ){?>
			<a class="nxadd-image-box-title" href="<?php echo esc_url($link_url_data);?>"><?php _e($title_text_data, 'nbaddons');?></a>
		<?php } ?>
		<?php if( !empty($details_text_data) ){?>
			<p class="nxadd-des"><?php _e($details_text_data, 'nbaddons');?></p>
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
