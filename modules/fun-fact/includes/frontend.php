<?php 
	extract( (array) $settings);
	$id = $module->node;
	
?>
<div class="nxbb-funfact-area">
	<div class="nxbb-single-fun-fact">
		<?php if( $fun_icon != 'no'){
			$icons = ($fun_icon == 'library') ? $select_icons : $fun_class;
		?>
			<div class="nxadd-funfact-icon">
				<i class="nxbb-icon <?php echo esc_attr($icons)?>"></i>
			</div>
		<?php }?>
			<div class="funfact-timer" id="nx-<?php echo esc_attr($id);?>" nx-fun-value="<?php echo intval($counter);?>" nx-fun-start="<?php echo intval($start_counter);?>" nx-fun-step="<?php echo intval($step_counter);?>" nx-fun-speed="<?php echo intval($speed_counter);?>" nx-fun-tag="span" nx-fun-extra-data="<?php echo esc_attr($extra_data);?>" nx-fun-number-format="<?php echo esc_attr($number_status);?>" nx-fun-number-format-name="<?php echo esc_attr($nextaddons_funfact_currency_format);?>" nx-fun-extra-data-direction="<?php echo esc_attr($extra_position);?>">
		</div>
		<?php if( !empty($title_text) ){?><h4 class="funfact-title"><?php _e($title_text, 'nbaddons')?></h4> <?php }?>
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($){
		nx_fun_fact_start( '#nx-<?php echo esc_attr($id);?>');
	});
</script>
