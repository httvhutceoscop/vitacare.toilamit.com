<?php class post_category extends WP_Widget
{
    function post_category(){
		$widget_ops = array('description'=> 'Hiển thị bài viết theo danh mục sản phẩm phần giỏ hàng');
		$control_ops = array('width'=> 250, 'height'=> 300);
		parent::WP_Widget(false,$name='Hiển thị bài viết theo danh mục sản phẩm phần giỏ hàng',$widget_ops,$control_ops);

    }
 
  //Displays the Widget in the front-end 
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '  ': $instance['title']);
		$posts_number = empty($instance['posts_number']) ? '': (int) $instance['posts_number'];
		$blog_category = empty($instance['blog_category']) ? '': (int) $instance['blog_category'];
	 
		echo $before_widget;
	 
		if( $title )
		echo $before_title . $title . $after_title;
	?>
		<?php 
		$args = array(
							'post_type' => 'post',
							'posts_per_page' => $posts_number,
							'meta_query' => array(
												array(
													'key' => 'style_product',
													'value' => 2,
													),
												),
							'cat' => $blog_category,
						);
			query_posts($args);
		if(have_posts()) : while(have_posts()) : the_post(); ?>
			<div class="block-posts">
				<ul class="cart_left">
					<li class="title_product"><a href="<?php echo get_permalink();?>"><?php echo the_title();?></a> - $<?php echo get_field('price');?></li>
				</ul>
				<ul class="cart_right">
					<li class="addtocart"><a href="<?php bloginfo('url'); ?>/gio-hang/them/<?php echo get_the_ID(); ?>" class="add_to_cart">Add To Cart</a></li>
				</ul>
			</div><!-- end .block-post -->
		<?php endwhile; endif; wp_reset_query(); ?>
	 
	<?php
		echo $after_widget;

    }
 
  //Saves the settings. 
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);
		$instance['posts_number'] = (int) $new_instance['posts_number'];
		$instance['blog_category'] = (int) $new_instance['blog_category'];
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
			$cats_array = get_categories('hide_empty=0');
		?>
		<p>
			<label for="<?php echo $this->get_field_id('blog_category'); ?>">Category</label>
			<select name="<?php echo $this->get_field_name('blog_category'); ?>"id="<?php echo $this->get_field_id('blog_category'); ?>"class="widefat">
				<?php foreach( $cats_array as $category ) { ?>
					<option value="<?php echo $category->cat_ID; ?>"<?php selected( $instance['blog_category'], $category->cat_ID ); ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>
		<?php

    }
 
} // end bcdonline_fromcategorieswidget class
 
function post_categoryInit() {
  register_widget('post_category');
}
add_action('widgets_init', 'post_categoryInit');
?>
