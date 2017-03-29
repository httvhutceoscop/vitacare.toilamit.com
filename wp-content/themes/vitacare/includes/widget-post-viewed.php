<?php class show_post_viewed extends WP_Widget
{
    function show_post_viewed(){
		$widget_ops = array('description'=> 'Hiển thị sản phẩm vừa xem');
		$control_ops = array('width'=> 250, 'height'=> 300);
		parent::WP_Widget(false,$name='Hiển thị sản phẩm vừa xem',$widget_ops,$control_ops);

    }
 
  //Displays the Widget in the front-end 
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '  ': $instance['title']);
		$posts_number = empty($instance['posts_number']) ? '': (int) $instance['posts_number'];
		// $blog_category = empty($instance['blog_category']) ? '': (int) $instance['blog_category'];
		if(count( $_SESSION['viewed_product'] ) > 0){
		echo $before_widget;
	 
		if( $title )
		echo $before_title . $title . $after_title;
	?>

		<div class="innersidebar recenty_viewed">
	
			<div class="box_viewed">
			<?php
			$list_id_product = array();

				if(!empty($_SESSION['viewed_product'])):

					foreach($_SESSION['viewed_product'] as $key => $value):

						array_push($list_id_product,$key );

					endforeach;

					endif;

					$args = array( 

						'post_type' => 'product',

						'post__in' => $list_id_product,

						'posts_per_page' => $posts_number,

						'post_status' => 'publish',

						);

					$wp_query = new WP_Query( $args );

					if ( $wp_query->have_posts() ) : 
						while ( $wp_query->have_posts() ) : 
							$wp_query->the_post();?>
							<ul class="san-pham-hot">
								<li class="imageorder">
									<a href="<?php the_permalink();?>"><?php the_post_thumbnail("small");?></a>
								</li>
								<li class="titlesorder">
									<a href="<?php the_permalink();?>"><?php echo get_the_title();?></a>
								</li>
								<a class="btn-buy" id="addtocatbutton" data-link="<?php echo get_the_permalink(get_the_ID());?>?add-to-cart=<?php echo get_the_ID();?>" 
									href="javascript:void(0);" onclick="Add_to_Cart(<?php echo get_the_ID();?>);" >Mua ngay</a>
							</ul>
					<?php
						endwhile; 
						wp_reset_query(); 
					endif;
			?>
			</div>
		</div>
	<?php
		echo $after_widget;
	}
    }
 
  //Saves the settings. 
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);
		$instance['posts_number'] = (int) $new_instance['posts_number'];
		// $instance['blog_category'] = (int) $new_instance['blog_category'];
		return$instance;

    }
 
  //Creates the form for the widget in the back-end. 
    function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>'Tiêu đề Categories', 'posts_number'=>'5', 'blog_category'=>'') );
	 
		$title = esc_attr($instance['title']);
		$posts_number = (int) $instance['posts_number'];
		$blog_category = (int) $instance['blog_category'];
	 
		# Title
		echo '<p><label for="'. $this->get_field_id('title') . '">'. 'Title:'. '</label><input class="widefat" id="'. $this->get_field_id('title') . '" name="'. $this->get_field_name('title') . '" type="text" value="'. $title . '" /></p>';
		# Number Of Posts
		echo '<p><label for="'. $this->get_field_id('posts_number') . '">'. 'Số lượng hiển thị:'. '</label><input class="widefat" id="'. $this->get_field_id('posts_number') . '" name="'. $this->get_field_name('posts_number') . '" type="text" value="'. $posts_number . '" /></p>';
		# Category ?>
		<?php

    }
 
} // end bcdonline_fromcategorieswidget class
 
function show_post_viewedInit() {
  register_widget('show_post_viewed');
}
add_action('widgets_init', 'show_post_viewedInit');
?>
