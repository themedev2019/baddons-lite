<?php
extract( (array) $settings);
$id = $module->node;	
if ( class_exists( '\FLBuilderCSS' ) ) {


    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'masonry_column',
            'selector'	=> ".fl-node-$id .nxbb-gallery-area .masonary-coloum-style",
            'prop'		=> 'column-count',
        ) 
    );

    \FLBuilderCSS::rule( 
        array(
            'selector'	=> ".fl-node-$id .nxbb-gallery-area .masonary-coloum-style",
            'props'		=> [
                'column-gap' => $column_gap.'px',
            ],
        ) 
    );

    \FLBuilderCSS::rule( 
        array(
            'selector'	=> ".fl-node-$id .nxbb-gallery-area .masonary-coloum-style .nxadd-single-gallery-item",
            'props'		=> [
                'margin-bottom' => $column_gap.'px',
            ],
        ) 
    );


    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'grid_width',
            'selector'	=> ".fl-node-$id .nxbb-gallery-area .grid-style .nxadd-single-gallery-item",
            'prop'		=> 'width',
        ) 
    );

    \FLBuilderCSS::responsive_rule( 
        array(
            'settings'	=> $settings,
            'setting_name'	=> 'grid_height',
            'selector'	=> ".fl-node-$id .nxbb-gallery-area .grid-style .nxadd-single-gallery-item",
            'prop'		=> 'height',
        ) 
    );

    \FLBuilderCSS::border_field_rule( 
        array(
            'settings' 	=> $settings,
            'setting_name' 	=> 'border_photo', 
            'selector' 	=> ".fl-node-$id .nxbb-gallery-area .nxadd-single-gallery-item",
        ) 
    );

    \FLBuilderCSS::dimension_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'padding_photo',
            'selector' 	=> ".fl-node-$id .nxbb-gallery-area .nxadd-single-gallery-item",
            'unit'		=> $padding_photo_unit,
            'props'		=> array(
                'padding-top' 	 => 'padding_photo_top', 
                'padding-right'  => 'padding_photo_right',
                'padding-bottom' => 'padding_photo_bottom',
                'padding-left' 	 => 'padding_photo_left',
            ),
        ) 
    );


    
    // title

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-gallery-area .nxadd-single-gallery-item .nxadd-gallery-title",
            'props'    => array(
                'color' => $color_title
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_title',
            'selector' 	=> ".fl-node-$id .nxbb-gallery-area .nxadd-single-gallery-item .nxadd-gallery-title",
        ) 
    );

    // details

    \FLBuilderCSS::rule( 
        array(
            'selector' => ".fl-node-$id .nxbb-gallery-area .nxadd-single-gallery-item .nxadd-des",
            'props'    => array(
                'color' => $color_details
            ),
        ) 
    ); 

    \FLBuilderCSS::typography_field_rule( 
        array(
            'settings'	=> $settings,
            'setting_name' 	=> 'typography_details',
            'selector' 	=> ".fl-node-$id .nxbb-gallery-area .nxadd-single-gallery-item .nxadd-des",
        ) 
    );


} ?>

<?php $module->next_extra_method($id, $settings, $module); ?>