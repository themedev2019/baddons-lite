<?php
extract( (array) $settings);
$id = $module->node;	
if ( class_exists( '\FLBuilderCSS' ) ) {

    // content

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_content',
            'selector' 	=> ".fl-node-$id .nxbb-image-slider-wrapper .nxadd-slider-item",
            'unit'		=> $padding_content_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_content_top', 
                'padding-right'  => 'padding_content_right',
                'padding-bottom' => 'padding_content_bottom',
                'padding-left' 	 => 'padding_content_left',
            ),
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'margin_content',
            'selector' 	=> ".fl-node-$id .nxbb-image-slider-wrapper .nxadd-slider-item",
            'unit'		=> $margin_content_unit,
            'props'		=> array(
                'margin-top' 	 => 'margin_content_top', 
                'margin-right'  => 'margin_content_right',
                'margin-bottom' => 'margin_content_bottom',
                'margin-left' 	 => 'margin_content_left',
            ),
        ) 
    );


    // items

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_item', 
            'selector' 	=> ".fl-node-$id .nxbb-image-slider-wrapper .nx-item-slider",
        )
        
        
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'margin_item',
            'selector' 	=> ".fl-node-$id .nxbb-image-slider-wrapper .nx-item-slider",
            'unit'		=> $margin_item_unit,
            'props'		=> array(
                'margin-top' 	 => 'margin_item_top', 
                'margin-right'  => 'margin_item_right',
                'margin-bottom' => 'margin_item_bottom',
                'margin-left' 	 => 'margin_item_left',
            ),
        ) 
    );

    // title

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-image-slider-wrapper .nxadd-image-slider-item .nxadd-entry-caption .nxadd-title",
            'props'    => array(
                'color' => $color_title
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_title',
            'selector' 	=> ".fl-node-$id .nxbb-image-slider-wrapper .nxadd-image-slider-item .nxadd-entry-caption .nxadd-title",
        ) 
    );

    // details

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-image-slider-wrapper .nxadd-image-slider-item .nxadd-entry-caption .nxadd-subtitle",
            'props'    => array(
                'color' => $color_details
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_details',
            'selector' 	=> ".fl-node-$id .nxbb-image-slider-wrapper .nxadd-image-slider-item .nxadd-entry-caption .nxadd-subtitle",
        ) 
    );



} ?>

<?php $module->next_extra_method($id, $settings, $module); ?>