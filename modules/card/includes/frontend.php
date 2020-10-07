<div class="nxbb-card-area">
<?php 
	extract( (array) $settings);
	$id = $module->node;
?>
	<div class="nxadd-card-box <?php echo esc_attr($settings->layout_type);?>">
		<?php if( !empty($badge_text) ):?><span class="nxadd-card-badge"><?php echo esc_html__($badge_text, 'nbaddons');?></span> <?php endif;?>
    
		<?php if( $settings->photo_source != 'no' ) : ?>
			<figure class="nxadd-card-header">
			 <?php if( $settings->photo_source == 'library' ){
				 _e( wp_get_attachment_image( $settings->photo, 'full', '', ['class' => 'nxcardbox']) );
			  } else { ?>
				<img src="<?php echo esc_url($settings->photo_url);?>" alt="Card" class="nxcardbox">
			 <?php } ?>
			</figure>
		<?php endif;?>
		<div class="nxadd-card-body">
			<?php if( $settings->show_title == 'yes' ):?><h3 class="nxadd-card-title"><?php _e($settings->title_text, 'nbaddons'); ?></h3> <?php endif;?>
			<?php if( $settings->show_price == 'yes' ):?><span class="nxadd-product-price"><?php _e($settings->price_text, 'nbaddons'); ?></span> <?php endif;?>
			
			<?php if( !empty($settings->details_text) ):?>
			<div class="nxadd-card-text">
				<p class="card-des"><?php _e($settings->details_text, 'nbaddons'); ?></p>
			</div>
			<?php endif;?>

			<div class="nxadd-btn-wrapper">
				<a href="<?php echo esc_url($settings->link_url);?>" class="nxadd-btn nxadd-<?php echo esc_attr($settings->icons_position);?>-icon">
				<?php if( !empty( $settings->button_text)){ ?><span> <?php _e($settings->button_text, 'nbaddons')?></span> <?php }?>
					<?php if( $settings->button_icon != 'no'){
							$icons = ($settings->button_icon == 'library') ? $settings->select_icons : $settings->button_class;
						?>
						<i class="nxbb-icon <?php echo esc_attr($icons)?>"></i>
					<?php }?>
				</a>
			</div>
		</div>
	</div>
</div>
