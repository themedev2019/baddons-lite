<?php 
	extract( (array) $settings);
	$id = $module->node;
	
?>
<div class="nxbb-team-area">
	<div class="nxadd-team-member-profile nx-text-center nxbeaver-round-image <?php echo esc_attr($settings->layout_type);?>">
		<?php if( $photo_source != 'no'):?>
		<div class="nxadd-team-member-image">
			
			<?php if( $settings->photo_source == 'library' ){
				_e( wp_get_attachment_image( $settings->photo, 'full', '', ['class' => 'nxbb-team-image']) );
			} else { ?>
				<img src="<?php echo esc_url($settings->photo_url);?>" alt="Team" class="nxbb-team-image">
			<?php } ?>

		</div>
		<?php endif;?>
		<div class="nxadd-team-member-content">
			<?php echo do_action('nxbb_team/content/before', $settings);?>	
			<?php if( $show_name == 'yes') :?>
			<h3 class="member-title"><?php  _e($name_text, 'nbaddons')?></h3>
			<?php endif;?>

			<?php if( $show_designation == 'yes') :?>
			<p class="member-designation"><?php  _e($designation_text, 'nbaddons')?></p>
			<?php endif;?>
			<?php echo do_action('nxbb_team/content/after', $settings);?>
		
		<?php if($show_social == 'yes'):?>		
		<ul class="nxadd-social nxaddon-social-colored">
			<?php if( !empty($fb_url) ){?>
			<li class="social-item ">
				<a class="facebook" href="<?php echo esc_url($fb_url);?>">
					<i class="nx-icon nx-icon-facebook"></i>
				</a>
			</li>
			<?php }
			if( !empty($tw_url) ){
			?>
			<li class="social-item">
				<a class="twitter" href="<?php echo esc_url($tw_url);?>">
					<i class="nx-icon nx-icon-twitter"></i>
				</a>
			</li>
			<?php }
			if( !empty($li_url) ){
			?>
			<li class="social-item">
				<a class="linkedin" href="<?php echo esc_url($li_url);?>">
					<i class="nx-icon nx-icon-linkedin"></i>
				</a>
			</li>
			<?php }
			if( !empty($in_url) ){
			?>
			<li class="social-item">
				<a class="instagram" href="<?php echo esc_url($in_url);?>">
					<i class="nx-icon nx-icon-instagram"></i>
				</a>
			</li>
			<?php }?>
		</ul>
		<?php endif;?>
		</div>
	</div>
</div>
