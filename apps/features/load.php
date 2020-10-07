<?php 
namespace NbAdds\Apps\Features;

defined( 'ABSPATH' ) || exit;
/**
 * Global Nbaddons_Load class.
 *
 * @since 1.0.0
 */
class Nbaddons_Load{

    private static $instance;

    public function _init() {         
        // Nbaddons_Advance Features
        Nbaddons_Advance::instance()->_init();

        
    }

    public function get_post($cate = ''){
        $post_type = ['post'];
        $args['post_status'] = 	'publish';
        $args['post_type'] =  $post_type;

        if(is_array($cate) && !empty($cate) ){
            $args['tax_query'] = [ 
                [
                    'taxonomy' => 'category', 
                    'field'    => 'id',
                    'terms'    => $cate,
                ],
            ];
        }

        $posts = get_posts($args);    
        $options = [];
        $count = count((array)$posts);
        if($count > 0):
            foreach ($posts as $post) {
                $options[$post->ID] = $post->post_title;
            }
        endif;  

        return $options;
    }

    public function get_category( $cate = 'post' ){
        $post_cat = self::_get_terms($cate);
        
        $taxonomy	 = isset($post_cat[0]) && !empty($post_cat[0]) ? $post_cat[0] : ['category'];
        $query_args = [
            'taxonomy'      => $taxonomy,
            'orderby'       => 'name', 
            'order'         => 'DESC',
            'hide_empty'    => false,
            'number'        => 1500
        ];
        $terms = get_terms( $query_args );

        $options = [];
        $count = count( (array) $terms);
        if($count > 0):
            foreach ($terms as $term) {
                if( $term->parent == 0 ) {
                    $options[$term->term_id] = $term->name;
                    foreach( $terms as $subcategory ) {
                        if($subcategory->parent == $term->term_id) {
                            $options[$subcategory->term_id] = $subcategory->name;
                        }
                    }
                }
            }
        endif;      
        return $options;
    }
    
    public function get_taxonomies( $cate = 'post', $type = 0){
        $post_cat = self::_get_terms($cate);
        
        $tag	 = isset($post_cat[$type]) && !empty($post_cat[$type]) ? $post_cat[$type] : 'category';
        $terms = get_terms( array(
            'taxonomy' => $tag, 
            'orderby'       => 'name', 
            'order'         => 'DESC',
            'hide_empty'    => false,
            'number'        => 1500
        ) );
      
        return $terms;
    }

    public function  _get_terms( $post = 'post'){
        $taxonomy_objects = get_object_taxonomies( $post );
     return $taxonomy_objects;
    }

    public static function instance(){
		if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
	}
}