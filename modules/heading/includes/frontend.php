<?php 
	extract( (array) $settings);
	$id = $module->node;
?>
<div class="nxbb-heading-wrapper">
	<div class="nxbb-content-heading <?php echo esc_attr($layout_style);?>">
		<?php if( !empty($headin_title) ){?>
		<<?php _e($tags_title);?> class="heading-title"> <?php _e($headin_title, 'nbaddons');?> </<?php _e($tags_title);?>>
		<?php }
		if( !empty($headin_subtitle) ){?>
		<<?php _e($tags_subtitle);?> class="heading-subtitle"> <?php _e($headin_subtitle, 'nbaddons');?>  </<?php _e($tags_subtitle);?>>
		<?php }?>
	</div>
</div>
