<?php
extract( (array) $settings);
$id = $module->node;	
if ( class_exists( '\FLBuilderCSS' ) ) {

    // title

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_title',
            'selector' 	=> ".fl-node-$id .nxbb-heading-wrapper .nxbb-content-heading .heading-title",
        ) 
    );

    //Color
    \FLBuilderCSS::rule( array(
        'selector' => ".fl-node-$id .nxbb-heading-wrapper .nxbb-content-heading .heading-title",
        'enabled'  => in_array( $settings->title_bg_type, array( 'color', 'gradient') ),
        'props'    => array(
            'color' => $settings->title_bg_color,
        ),
    ) );


    //Gradient
    \FLBuilderCSS::rule( array(
        'selector' => ".fl-node-$id .nxbb-heading-wrapper .nxbb-content-heading .heading-title",
        'enabled'  => 'gradient' === $settings->title_bg_type,
        'props'    => array(
            '-webkit-background-clip' => 'text',
            'background-color' => 'ffffff00',
            '-webkit-text-fill-color' => 'ffffff00',
            'background-image' => \FLBuilderColor::gradient( $settings->title_bg_gradient ),
        ),
    ) );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'title_spacing',
            'enabled'  => 'nx-default-heading' === $settings->layout_style,
            'selector'	=> ".fl-node-$id .nxbb-heading-wrapper .nxbb-content-heading .heading-title",
            'prop'		=> 'margin-bottom',
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'title_spacing',
            'enabled'  => 'nx-default-reverse' === $settings->layout_style,
            'selector'	=> ".fl-node-$id .nxbb-heading-wrapper .nxbb-content-heading .heading-title",
            'prop'		=> 'margin-top',
        ) 
    );

    // sub title

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_subtitle',
            'selector' 	=> ".fl-node-$id .nxbb-heading-wrapper .nxbb-content-heading .heading-subtitle",
        ) 
    );

    //Color
    \FLBuilderCSS::rule( array(
        'selector' => ".fl-node-$id .nxbb-heading-wrapper .nxbb-content-heading .heading-subtitle",
        'props'    => array(
            'color' => $settings->subtitle_color,
        ),
    ) );


} ?>

<?php $module->next_extra_method($id, $settings, $module); ?>