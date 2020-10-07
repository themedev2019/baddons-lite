<?php
extract( (array) $settings);
$id = $module->node;	
if ( class_exists( '\FLBuilderCSS' ) ) {
    
    // body css render
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxadd-card-box .nxadd-card-body",
            'props'    => array(
                'background-color' => $bgcolor_body,
            ),
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'align_body',
            'selector'	=> ".fl-node-$id .nxadd-card-box .nxadd-card-body",
            'prop'		=> 'text-align',
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_body',
            'selector' 	=> ".fl-node-$id .nxadd-card-box .nxadd-card-body",
            'unit'		=> $padding_body_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_body_top', 
                'padding-right'  => 'padding_body_right',
                'padding-bottom' => 'padding_body_bottom',
                'padding-left' 	 => 'padding_body_left',
            ),
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'flex_width',
            'selector'	=> ".fl-node-$id .nxbb-card-area .nxadd-card-box.nx-right-layout .nxadd-card-header, .fl-node-$id .nxbb-card-area .nxadd-card-box.nx-left-layout .nxadd-card-header",
            'prop'		=> 'flex-basis',
        ) 
    );

    // badge style

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxadd-card-box .nxadd-card-badge",
            'props'    => array(
                'color' => $color_badge,
                'background-color' => $bgcolor_badge,
            ),
        ) 
    );

    
    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'position_top_badge',
            'selector'	=> ".fl-node-$id .nxadd-card-box .nxadd-card-badge",
            'prop'		=> 'top',
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
       
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'position_left_badge',
            'selector'	=> ".fl-node-$id .nxadd-card-box .nxadd-card-badge",
            'prop'		=> 'left',
        )
    );

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_badge',
            'selector' 	=> ".fl-node-$id .nxadd-card-box .nxadd-card-badge",
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_badge', 
            'selector' 	=> ".fl-node-$id .nxadd-card-box .nxadd-card-badge",
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_badge',
            'selector' 	=> ".fl-node-$id .nxadd-card-box .nxadd-card-badge",
            'unit'		=> $padding_badge_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_badge_top', 
                'padding-right'  => 'padding_badge_right',
                'padding-bottom' => 'padding_badge_bottom',
                'padding-left' 	 => 'padding_badge_left',
            ),
        ) 
    );

    // images 

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxadd-card-box img.nxcardbox",
            'props'    => array(
                
            ),
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'width_images',
            'selector'	=> ".fl-node-$id .nxadd-card-box img.nxcardbox",
            'prop'		=> 'width',
        ) 
    );
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxadd-card-box img.nxcardbox",
            'enabled'  => '' != $settings->width_images,
            'props'    => array(
                'object-fit' => 'cover'
            ),
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_images', 
            'selector' 	=> ".fl-node-$id .nxadd-card-box img.nxcardbox",
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'margin_images',
            'selector' 	=> ".fl-node-$id .nxadd-card-box .nxadd-card-header",
            'unit'		=> $margin_images_unit,
            'props'		=> array(
                'margin-top' 	 => 'margin_images_top', 
                'margin-right'   => 'margin_images_right',
                'margin-bottom'  => 'margin_images_bottom',
                'margin-left' 	 => 'margin_images_left',
            ),
        ) 
    );

    //title
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-card-title",
            'props'    => array(
                'color' => $color_title
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_title',
            'selector' 	=> ".fl-node-$id .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-card-title",
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_title',
            'selector'	=> ".fl-node-$id .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-card-title",
            'prop'		=> 'margin-bottom',
            'important' => true,
        ) 
    );

    //price
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-card-area .nxadd-product-price",
            'props'    => array(
                'color' => $color_price
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_price',
            'selector' 	=> ".fl-node-$id .nxbb-card-area .nxadd-product-price",
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_price',
            'selector'	=> ".fl-node-$id .nxbb-card-area .nxadd-product-price",
            'prop'		=> 'margin-bottom',
        ) 
    );

    //details
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-card-text .card-des",
            'props'    => array(
                'color' => $color_details
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_details',
            'selector' 	=> ".fl-node-$id .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-card-text .card-des",
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_details',
            'selector'	=> ".fl-node-$id .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-card-text .card-des",
            'prop'		=> 'margin-bottom',
        ) 
    );

    // button

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-btn-wrapper .nxadd-btn > *",
            'props'    => array(
                'color' => $color_button
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_button',
            'selector' 	=> ".fl-node-$id .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-btn-wrapper .nxadd-btn > *",
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_button', 
            'selector' 	=> ".fl-node-$id .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-btn-wrapper .nxadd-btn",
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'spacing_button',
            'selector' 	=> ".fl-node-$id .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-btn-wrapper .nxadd-btn > span",
            'unit'		=> $spacing_button_unit,
            'props'		=> array(
                'margin-top' 	 => 'spacing_button_top', 
                'margin-right'   => 'spacing_button_right',
                'margin-bottom'  => 'spacing_button_bottom',
                'margin-left' 	 => 'spacing_button_left',
            ),
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_button',
            'selector' 	=> ".fl-node-$id .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-btn-wrapper .nxadd-btn",
            'unit'		=> $padding_button_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_button_top', 
                'padding-right'   => 'padding_button_right',
                'padding-bottom'  => 'padding_button_bottom',
                'padding-left' 	 => 'padding_button_left',
            ),
        ) 
    );

    \FLBuilderCSS::rule( array(
        'selector' => ".fl-node-$id .nxbb-card-area .nxadd-card-box .nxadd-card-body .nxadd-btn-wrapper .nxadd-btn",
        'enabled'  => '' != $settings->bg_color,
        'props'    => array(
            'background-color' => $settings->bg_color,
        ),
    ) );

}
?>

<?php $module->next_extra_method($id, $settings, $module); ?>