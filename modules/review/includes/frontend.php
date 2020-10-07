<?php 
	extract( (array) $settings);
	$id = $module->node;
?>
<div class="nxbb-review">
	<div class="nxbb-widget-container <?php echo esc_attr($layout_type);?>">

		<?php if( $photo_source != 'no'): ?>
			<figure class="nx-review-fig">
				<?php if( $settings->photo_source == 'library' ){
					_e( wp_get_attachment_image( $settings->photo, 'full', '', ['class' => 'nxbb-review-image']) );
				} else { ?>
					<img src="<?php echo esc_url($settings->photo_url);?>" alt="Team" class="nxbb-review-image">
				<?php } ?>	
			</figure>
		<?php endif;?>

		<div class="nx-review-body">
		
			<div class="nx-review-header">
				<?php if( !empty($name_text) ) :?>
				<h3 class="nx-review-reviewer"><?php  _e($name_text, 'nbaddons')?></h3>
				<?php endif;?>

				<?php if( !empty($designation_text) ) :?>
					<div class="nx-review-position"><?php  _e($designation_text, 'nbaddons')?></div>
				<?php endif;?>

				<?php if( !empty($ratting_text) ) :?>
				<div class="nx-review-ratting nx-review-ratting--star" >
					<?php if($ratting_type == 'default'){ ?>
						<?php _e($ratting_text);?> <i class="nxbb-icon nx-icon nx-icon-star-full" aria-hidden="true"></i>
					<?php } else {
						for( $m = 0; $m < 5; $m++):
							$icon = 'nxbb-icon nx-icon nx-icon-star-o';
							if( (int) $ratting_text > $m){
								$icon = 'nxbb-icon nx-icon nx-icon-star-full';
							}
						?>    
							<i class="<?php echo esc_attr($icon);?>" aria-hidden="true"></i>
						<?php endfor;
					}?>             
				</div>
				<?php endif;?>
			</div>
			<?php if( !empty($details_text) ) :?>
			<div class="nx-review-desc" itemprop="reviewBody">
				<p><?php _e($details_text, 'next-addons'); ?></p>
			</div>
			<?php endif;?>
		</div>

	</div>
	
</div>
