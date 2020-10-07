<?php
$active_tab = isset($_GET["tab"]) ? sanitize_text_field($_GET["tab"]) : 'modules';
?>
 <ul class="nav-tab-wrapper">
	<li><a href="<?php echo esc_url(admin_url().'admin.php?page=nbaddons&tab=modules');?>" class="nav-tab <?php if($active_tab == 'modules'){ _e('nav-tab-active');} ?> "><?php echo esc_html__('Modules', 'nbaddons');?></a></li>
	<?php 
	if ( ! did_action( 'ddeskaddonsPro/loaded' ) ) {
	?>
	<!--li><a href="<?php echo esc_url(admin_url().'admin.php?page=nbaddons&tab=get-pro');?>" class="nav-tab nav-item-pro <?php if($active_tab == 'get-pro'){_e( 'nav-tab-active');} ?>"><?php echo esc_html__('Get Pro', 'nbaddons');?></a></li--> 
	
	<?php }?>
</ul>