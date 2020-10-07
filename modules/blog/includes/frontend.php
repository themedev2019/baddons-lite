<?php 
	extract( (array) $settings);
	$id = $module->node;
	
?>
<div class="nxbb-blog-post-area">
	<div class="nx-container">
		<div class="nx-row">
			<?php
			$query['post_status'] = 'publish';
			$query['suppress_filters'] = false;
			$query['post_type'] = ['post'];
			$query['orderby'] = $order_by;
			$query['order'] = $order;
			
			if( !empty($limit) ){
				$query['posts_per_page'] = (int) $limit;
			}
			if( !empty($offset) ){
				$query['offset'] = (int) $offset;
			}
	
			if($query_type == 'categories'){
				if( is_array($all_categories) && sizeof($all_categories) > 0){
					$cate_query = [
						[
							'taxonomy' => 'category',
							'field'    => 'term_id',
							'terms'    => $all_categories, 
						],			
						'relation' => 'AND',
					];
					$query['tax_query'] = $cate_query;
				}
			}
	
			if($query_type == 'post'){
				if( is_array($all_posts) && sizeof($all_posts) > 0){
					$query['post__in'] = $all_posts;
				}
			}
	
			$post_query = new \WP_Query( $query );
			if ( $post_query->have_posts() ) {
				while ( $post_query->have_posts() ) : 
					$post_query->the_post();
			?>

				<div class="<?php echo esc_attr($display_column);?>">
					<div class="nxadd-blog-post-wrap style-4 nx-shadow <?php echo esc_attr($settings->layout_type);?>">
						<?php if( 'yes' == $enable_thumbnil_blog):?>
						<div class="nxadd-blog-post-thumbnail">
							<a href="<?php the_permalink(); ?>" class="post-image">
								<?php  if( has_post_thumbnail() ){
                                    $id = get_post_thumbnail_id(get_the_ID());
                                    echo wp_get_attachment_image( $id, $thumbnil_blog_size, '', ['class' => 'thumb-img']);
                                }?>
							</a>
						</div>
						<?php endif;?>
						<div class="nxadd-blog-post-content">
							<?php if( 'yes' == $enable_title_blog):?>
							<h2 class="nxadd-post-title">
								<a href="<?php the_permalink(); ?>" >
								<?php 
                                    $ext = '';
                                    if(strlen(get_the_title()) >= $title_length){
                                        $ext = '...';
                                    }
                                    if($title_length_type == 'word' ){
                                        echo wp_trim_words( get_the_title(), $title_length, $ext );
                                    }else{
                                        echo substr( get_the_title(), 0, $title_length) . $ext; 
                                    }
                                 
                                    ?>
								</a>
							</h2>
							<?php endif;?>

							<div class="nxadd-meta-list">
								<?php if($enable_date_blog == 'yes'):?>
									<span class="meta-data"><i class="nx-icon nx-icon-calendar"></i> <?php echo esc_html( get_the_date( $date_format ) ); ?></span>
								<?php endif;?>

								<?php if($enable_categories_blog == 'yes'):?>
								<span class="post-cat"> <i class="nx-icon nx-icon-folder"></i>  
									<?php echo get_the_category_list( $categories_format ); ?>
								</span>
								<?php endif;?>
							</div>
							<?php if($enable_details_blog == 'yes'):?>
							<div class="nxadd-blog-des">
								<p class="post-des">
								<?php 
								$ext = '';
								if(strlen(get_the_excerpt()) >= $details_length){
									$ext = '...';
								}
								if($details_length_type == 'word'){
									echo wp_trim_words( get_the_excerpt(), $details_length, $ext );
								}else{
									echo substr( get_the_excerpt(), 0, $details_length) . $ext; 
								}
								
								?>
								</p>
							</div>
							<?php endif;?>

							<?php if($enable_button_blog == 'yes'):?>
							<div class="nxadd-btn-wrapper">
								<a href="<?php the_permalink(); ?>" class="nxadd-btn"> <?php _e($button_text, 'nbaddons');?> </a>
							</div>
							<?php endif;?>
						</div>
					</div>
				</div>
			<?php 
			endwhile;
			wp_reset_postdata();

			}
			?>

		</div>
	</div>
	
</div>
