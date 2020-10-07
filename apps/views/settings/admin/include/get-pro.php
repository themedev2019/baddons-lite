<div class="section-addons addons-pro">
	
	<h3><?php echo esc_html__('DeskAddons (Pro)', 'nbaddons');?></h3>
	<div class="nxadd-pro-features">
		<div class="nx-row nxadd-content-inner">
			<div class="nx-col-lg-6">
				<div class="nxadd-admin-wrapper">
                    <div class="nxadd-admin-block">
                        <div class="nxadd-admin-header">
                            <div class="nxadd-admin-header-icon">
                                <i class="nx-icon nx-icon-file-text-o"></i>
                            </div>
							<h4 class="nxadd-admin-header-title"><?php _e('Advance Tab', 'nbaddons')?></h4>
							<p><?php _e('', 'nbaddons')?></p>
                        </div>
                    </div>
                   
                </div>
			</div>
			<div class="nx-col-lg-6">
				<div class="feature-addons-bannar nx-pt-lt">
					<img src="<?php echo esc_url('//ddesks.com/ads/attach/deskaddons/advance.png'); ?>" alt="Woo">
				</div>
			</div>
		</div>
		<div class="nx-row nxadd-content-inner">
			<div class="nx-col-lg-6">
				<div class="feature-addons-bannar">
					<img src="<?php echo esc_url('//ddesks.com/ads/attach/deskaddons/pro-modules.png'); ?>" alt="Demo">
				</div>
			</div>
			<div class="nx-col-lg-6">
				<div class="nxadd-admin-wrapper nx-pt-lt">
                    <div class="nxadd-admin-block">
                        <div class="nxadd-admin-header">
                            <div class="nxadd-admin-header-icon">
                                <i class="nx-icon nx-icon-file-text-o"></i>
                            </div>
							<h4 class="nxadd-admin-header-title"><?php _e('Pro Modules', 'nbaddons')?></h4>
							<p><?php _e('', 'nbaddons')?></p>
                        </div>
                    </div>
                   
                </div>
			</div>
			
		</div>
	</div>
	<div class="nxbb-services nx-pro">
		<h3 class="nxadd-pro-feature">PRO Features</h3>
		<div class="nx-row nxadd-content-inner nx-inner-pt-0">
			<?php
				if(is_array($widgets) && isset($widgets)){
					$key_all = '';
					foreach( $widgets as $k=>$v ):
						$sp_name = str_replace(['woo-', '-'], ['Product ', ' '], $k);
							$name = isset($v['name']) ? $v['name'] : ucwords($sp_name);
							$key = isset($v['key']) ? $v['key'] : 'single';
							$cate = isset($v['cate']) ? $v['cate'] : 'pro';
							$link = isset($v['link']) ? $v['link'] : '';
							$display = true;
							if($key == $key_all){
								$display = false;
							}
					?>
						<div class="<?php echo esc_attr('baddons-form');?> nx-col-lg-4 nx-col-md-6 nx-col-sm-12">
							<div class="card-shadow <?php echo isset($getServices['feedpro'][$k]) || empty($getServices) ? 'active' : ''; ?>">
								<?php if( !empty($cate) ){?>
								<sup class="<?php echo esc_attr($cate);?>-widget"> <?php echo strtoupper($cate);?></sup>
								<?php }?>
								<input type="checkbox" onclick="nxbb_ser_add(this)" name="ddesks[feedpro][<?php _e( $k );?>][ebable]" <?php echo isset($getServices['feedpro'][$k]) || empty($getServices) ? 'checked' : ''; ?> class="nbaddons-switch-input nxbb-event-enable" value="Yes" id="nextfeedpro-<?php _e( $k );?>_addons_data"/>
								<label class="nbaddons-checkbox-switch" for="nextfeedpro-<?php _e( $k );?>_addons_data">
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
						$key_all = $key;
						endforeach;
					}
			?>
		</div>
	</div>
	<div class="nxadd-footer-pro-inner">
		<div class="nx-row ">
			<div class="nx-col-lg-12">
				<h3 class="nxadd-fetaure-pro-title">Get PRO version with exclusive Modules & Features.</h3>
				<a href="https://products.ddesks.com/deskaddons/pricing/" target="_blank" class="nxadd-button nx-get-pro">GET PRO</a>
			</div>
		</div>
	</div>
</div>