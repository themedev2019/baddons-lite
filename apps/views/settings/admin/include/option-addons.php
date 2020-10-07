<form action="<?php echo esc_url(admin_url().'admin.php?page=nbaddons&tab=modules');?>" name="setting_addons_form" method="post" id="nbaddons-widgets">
	<div class="section-addons addons-default">
		<div class="nxadd-import-layouts">
			<h1><?php echo esc_html__('Beaver Addons', 'nbaddons');?></h1>
			<p class="sub-headding"> <?php echo esc_html__(' Use the Buttons to Activate or Deactivate all the Elements of DeskAddons at once.', 'nbaddons');?></p>
			<div class="nextbb-btngroup">
				<button type="button" class="nxadd-btn nextbb-btncontrol-enable">Enable All</button>
				<button type="button" class="nxadd-btn nextbb-btncontrol-disable">Disable All</button>
			</div>
		</div>
		<div class="nxbb-services addons-wrapper">
			<h3><?php echo esc_html__('Elements', 'nbaddons');?></h3>
			<div class="nx-row">
				<?php
					if(is_array($widgets) && isset($widgets)){
						foreach( $widgets as $k=>$v ):
								$sp_name = str_replace(['post-', '-'], ['Blog ', ' '], $k); 
								$name = isset($v['name']) ? $v['name'] : ucwords($sp_name);
								$type = isset($v['type']) ? $v['type'] : '';
								$cate = isset($v['cate']) ? $v['cate'] : '';
								$link = isset($v['link']) ? $v['link'] : '';
					?>
						<div class="<?php echo esc_attr('baddons-form');?> nx-col-lg-4 nx-col-md-6 nx-col-sm-12">
							<div class="card-shadow <?php echo isset($getServices['addons'][$k]) || empty($getServices) ? 'active' : ''; ?>">
								<?php if( !empty($cate) ){?>
								<sup class="<?php echo esc_attr($cate);?>-widget"> <?php echo strtoupper($cate);?></sup>
								<?php }?>
								<input type="checkbox" onclick="nxbb_ser_add(this)" name="baddons[addons][<?php _e( $k );?>][ebable]" <?php echo isset($getServices['addons'][$k]) || empty($getServices) ? 'checked' : ''; ?> class="nbaddons-switch-input nxbb-event-enable" value="Yes" id="nbaddons-<?php _e( $k );?>_addons_data"/>
								<label class="nbaddons-checkbox-switch" for="nbaddons-<?php _e( $k );?>_addons_data">
									<?php echo esc_html__($name, 'nbaddons');?>
									<div class="nxbeaver-info-link">
										<a class="nxbeaver-demo-link" href="https://products.ddesks.com/deskaddons/<?php _e( $link );?>" target="_blank">
											<i class="nx-icon nx-icon-desktop"></i>
											<span class="nxbeaver-info-tooltip">Click and view demo</span>
										</a>
									</div>
									<span class="nbaddons-label-switch" data-active="ON" data-inactive="OFF"></span>
								</label>
							</div>
						</div>
					<?php	
						
						endforeach;
					}
				?>
			</div>

			
		</div>
	</div>
	
	<div class="section-addons <?php echo esc_attr('baddons-form');?>">
		<button type="submit" name="nextbb-feed-submit" class="button nxadd-save-button"> <?php echo esc_html__('Save Setting', 'nbaddons');?></button>
	</div>
</form>

