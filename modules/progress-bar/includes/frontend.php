<?php 
	extract( (array) $settings);
	$id = $module->node;
?>
<div class="nxbb-skillbar-group">
	<div class="nxbb-single-skill-bar">

		<?php if( !empty($title_text) ):?>
		<div class="skill-bar-content">
			<span class="skill-title"><?php _e($title_text, 'nbaddons')?></span>
		</div>
		<?php endif;?>

		<div class="nx-skill-bar4 nx-<?php echo esc_attr($id);?>">
			<div class="nx-skill-progress" nx-progress="<?php echo esc_attr( (int) $percentage_text);?>" nx-animation-duration="<?php echo esc_attr( (int) $speed_text);?>">
				<span class="number-percentage-wraper ">
					<span class="nx-progress-counter number-percentage"></span><?php _e($addi_text);?>
				</span>
			</div>
		</div>
	</div>
	
</div>

<script type="text/javascript">
	jQuery(document).ready(function($){
		nx_progress_start( '.nx-<?php echo esc_attr($id);?>');
	});
</script>