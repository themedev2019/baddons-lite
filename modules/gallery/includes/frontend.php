<?php 
	extract( (array) $settings);
	$id = $module->node;
	
	$classs = 'grid-style';
	$class2 = 'gallery-grid-item';
	if( $gallery_type == 'masonry'){
		$classs = 'masonary-coloum-style';
		$class2 = 'gallery-masonary-item';
	} else if($gallery_type == 'list'){
		$classs = 'list-style';
		$class2 = 'gallery-list-item';
	}

	if($open_popup == 'yes'){
		$class2 .= '  nx-popup-gallery-open';
	}

?>
<div class="nxbb-gallery-area">
	<div class="nxadd-gallery-style <?php echo esc_attr($classs);?>">
		<?php if( !empty($photos_data) ){?>
			
			<?php foreach( $photos_data as $v):
				$title = get_the_title($v);
				$details = get_post_meta($v, '_wp_attachment_image_alt', TRUE);

				$title = !empty($title) ? $title : $details;
				?>
			<div class="nxadd-single-gallery-item <?php echo esc_attr($class2);?>" nx-body-click="yes" >
				<div class="nxadd-portfolio-thumb">
					
					<?php _e( wp_get_attachment_image( $v, $photos_size, '', ['class' => 'nxadd-img']) );?>
					
					<?php if($content_position == 'yes'){?>
                    <div class="nxadd-hover-area">
                        <div class="nxadd-hover-content">
                            <?php if($show_title == 'yes'  && !empty($title) ):?>
                             <h3 class="nxadd-gallery-title"> <?php echo __($title, 'nbaddons');?></h3>
                            <?php endif;?>

                            <?php if($show_alt == 'yes' && !empty($details) ):?>
                                <p class="nxadd-des"><?php echo __($details, 'nbaddons');?></p>
                            <?php endif;?>
                           
                        </div>
                    </div>
                    <?php }?>
				</div>
			</div>
		<?php endforeach;?>

		<?php }?>
	</div>
	
</div>
