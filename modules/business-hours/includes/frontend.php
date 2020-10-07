<?php 
	extract( (array) $settings);
	$id = $module->node;
	
?>
<div class="nxbb-business-hours-wrapper">
	<ul class="nxadd-business-hours-inner">

		<?php if( !empty($heading_text) ) :?>
		<li class="nxadd-business-hour-title">
			<h3><?php echo esc_html__($heading_text, 'nbaddons');?></h3>
		</li>
		<?php endif;?>
		<?php 
		 if( is_array($items_title) && !empty($items_title) ){
			 foreach($items_title as $k=>$v):
				$time = isset($items_time[$k]) ? $items_time[$k] : '';
				$close = ($close_hours == $v) ? 'nx-business-close' : '';
			 ?>
			 <li class="nxadd-business-hour-single-item <?php echo esc_attr($close);?>">
				<span class="nxadd-business-day"> <?php _e($v, 'nbaddons'); ?></span>
				<span class="nxadd-business-time"> <?php _e($time, 'nbaddons'); ?> </span>
			</li>
			 <?php
			 endforeach;
		 }
		?>	
		
	</ul>
	
</div>
