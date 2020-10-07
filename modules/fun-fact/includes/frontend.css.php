<?php
extract( (array) $settings);
$id = $module->node;	
if ( class_exists( '\FLBuilderCSS' ) ) {
    

     // body css render
     \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-funfact-area .nxbb-single-fun-fact",
            'props'    => array(
                'background-color' => $bgcolor_body,
            ),
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'align_body',
            'selector'	=> ".fl-node-$id .nxbb-funfact-area .nxbb-single-fun-fact",
            'prop'		=> 'text-align',
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_body',
            'selector' 	=> ".fl-node-$id .nxbb-funfact-area .nxbb-single-fun-fact",
            'unit'		=> $padding_body_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_body_top', 
                'padding-right'  => 'padding_body_right',
                'padding-bottom' => 'padding_body_bottom',
                'padding-left' 	 => 'padding_body_left',
            ),
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_body', 
            'selector' 	=> ".fl-node-$id .nxbb-funfact-area .nxbb-single-fun-fact",
        ) 
    );

    // data

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-funfact-area .funfact-timer > span",
            'props'    => array(
                'color' => $color_data
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_data',
            'selector' 	=> ".fl-node-$id .nxbb-funfact-area .funfact-timer > span",
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_data',
            'selector'	=> ".fl-node-$id .nxbb-funfact-area .funfact-timer",
            'prop'		=> 'margin-bottom',
        ) 
    );

    // title

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-funfact-area .funfact-title",
            'props'    => array(
                'color' => $color_title
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_title',
            'selector' 	=> ".fl-node-$id .nxbb-funfact-area .funfact-title",
        ) 
    );

    // icon

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-funfact-area .nxadd-funfact-icon .nxbb-icon",
            'props'    => array(
                'color' => $color_icon,
                'background-color' => $bgcolor_icon,
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_icon',
            'selector' 	=> ".fl-node-$id .nxbb-funfact-area .nxadd-funfact-icon .nxbb-icon",
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_icon', 
            'selector' 	=> ".fl-node-$id .nxbb-funfact-area .nxadd-funfact-icon .nxbb-icon",
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_icon',
            'selector' 	=> ".fl-node-$id .nxbb-funfact-area .nxadd-funfact-icon .nxbb-icon",
            'unit'		=> $padding_icon_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_icon_top', 
                'padding-right'   => 'padding_icon_right',
                'padding-bottom'  => 'padding_icon_bottom',
                'padding-left' 	 => 'padding_icon_left',
            ),
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'spacing_icon',
            'selector'	=> ".fl-node-$id .nxbb-funfact-area .nxadd-funfact-icon",
            'prop'		=> 'margin-bottom',
        ) 
    );
    
}
?>

<?php $module->next_extra_method($id, $settings, $module); ?>