<?php
extract( (array) $settings);
$id = $module->node;	
if ( class_exists( '\FLBuilderCSS' ) ) {

    // body css rendder
    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'align_body',
            'selector'	=> ".fl-node-$id .nxbb-icon-caps-area .nxadd-icon-caps-wrapper",
            'prop'		=> 'text-align',
        ) 
    );

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-icon-caps-area .nxadd-icon-caps-wrapper",
            'props'    => array(
                'background-color' => $bgcolor_body,
            ),
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_body',
            'selector' 	=> ".fl-node-$id .nxbb-icon-caps-area .nxadd-icon-caps-wrapper",
            'unit'		=> $padding_body_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_body_top', 
                'padding-right'  => 'padding_body_right',
                'padding-bottom' => 'padding_body_bottom',
                'padding-left' 	 => 'padding_body_left',
            ),
        ) 
    );

    
    // badge style

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-icon-caps-area .nxadd-icon-caps-badge",
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
            'selector'	=> ".fl-node-$id .nxbb-icon-caps-area .nxadd-icon-caps-badge",
            'prop'		=> 'top',
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'position_left_badge',
            'selector'	=> ".fl-node-$id .nxbb-icon-caps-area .nxadd-icon-caps-badge",
            'prop'		=> 'left',
        )
    );

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_badge',
            'selector' 	=> ".fl-node-$id .nxbb-icon-caps-area .nxadd-icon-caps-badge",
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_badge', 
            'selector' 	=> ".fl-node-$id .nxbb-icon-caps-area .nxadd-icon-caps-badge",
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_badge',
            'selector' 	=> ".fl-node-$id .nxbb-icon-caps-area .nxadd-icon-caps-badge",
            'unit'		=> $padding_badge_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_badge_top', 
                'padding-right'  => 'padding_badge_right',
                'padding-bottom' => 'padding_badge_bottom',
                'padding-left' 	 => 'padding_badge_left',
            ),
        ) 
    );


    //title
    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-icon-caps-area .nxadd-icon-caps-wrapper .nxadd-icon-caps-title-wrap .nxadd-icon-caps-title",
            'props'    => array(
                'color' => $color_title
            ),
            
            
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_title',
            'selector' 	=> ".fl-node-$id .nxbb-icon-caps-area .nxadd-icon-caps-wrapper .nxadd-icon-caps-title-wrap .nxadd-icon-caps-title",
        ) 
    );

    // icon

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-icon-caps-area .nxadd-icon-caps-wrapper .nxadd-icon .nxbb-icon",
            'props'    => array(
                'color' => $color_icon
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_icon',
            'selector' 	=> ".fl-node-$id .nxbb-icon-caps-area .nxadd-icon-caps-wrapper .nxadd-icon .nxbb-icon",
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'spacing_icon',
            'selector' 	=> ".fl-node-$id .nxbb-icon-caps-area .nxadd-icon-caps-wrapper .nxadd-icon",
            'unit'		=> $spacing_icon_unit,
            'props'		=> array(
                'margin-top' 	 => 'spacing_icon_top', 
                'margin-right'   => 'spacing_icon_right',
                'margin-bottom'  => 'spacing_icon_bottom',
                'margin-left' 	 => 'spacing_icon_left',
            ),
        ) 
    );



} ?>

<?php $module->next_extra_method($id, $settings, $module); ?>