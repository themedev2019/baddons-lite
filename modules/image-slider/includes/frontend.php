<?php 
	extract( (array) $settings);
	$id = $module->node;

	$leftIcon = !empty($nxbb_slide_arrow_left) ? $nxbb_slide_arrow_left : 'nx-icon nx-icon-chevron-left';
	$rightIcon = !empty($nxbb_slide_arrow_right) ? $nxbb_slide_arrow_right : 'nx-icon nx-icon-chevron-right';

?>
<div class="nxbb-image-slider-wrapper">
	<div class="nxadd-slider-item"> 
		<?php if( !empty($photos_data) ){?>
			<div class="nx-slider-content" id="nxslider-<?php echo esc_attr($id);?>" nx-slide-active="0" nx-slide-speed="<?php echo esc_attr($nxbb_slide_speed);?>" nx-item-width="<?php echo esc_attr($nxbb_slide_width);?>" nx-item-margin="<?php echo esc_attr($nxbb_slide_spacing);?>" nx-control-button="<?php echo esc_attr($nxbb_slide_arrow);?>" nx-pre-button-text="<?php echo esc_attr($leftIcon);?>" nx-next-button-text="<?php echo esc_attr($rightIcon);?>" nx-slide-item="<?php echo esc_attr($nxbb_slide_item);?>" nx-control-dot="<?php echo esc_attr($nxbb_slide_dot);?>" nx-slide-type="<?php echo esc_attr($nxbb_slide_vertical);?>">				    
        
			<?php foreach( $photos_data as $v):
				$title = get_the_title($v);
				$details = get_post_meta($v, '_wp_attachment_image_alt', TRUE);

				$title = !empty($title) ? $title : $details;

				?>
				<div class="nx-item-slider " style="float: left; min-height:1px;">
                    <div class="nxadd-image-slider-item">
						<?php _e( wp_get_attachment_image( $v, $photos_size, '', ['class' => 'nx-full-width']) );?>

						<div class="nxadd-entry-caption <?php echo esc_attr($content_position);?>"> 
                            <?php if(!empty($title) && $show_title == 'yes'):?>
                            <h5 class="nxadd-title"> <?php echo __($title, 'nbaddons');?></h5>
                            <?php endif;?>

                            <?php if(!empty($details)  && $show_alt == 'yes' ):?>
                            <span class="nxadd-subtitle"><?php echo __($details, 'nbaddons');?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
			<?php endforeach;?>
			</div>
		<?php }?>
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($){
		let id_nd = 'nxslider-<?php echo esc_attr($id);?>';
		nx_slider_start(id_nd);
	});
</script>