<?php class bcdonline_fromcategorieswidget extends WP_Widget
{
    function bcdonline_fromcategorieswidget(){
		$widget_ops = array('description'=> 'Hiển thị danh mục với ảnh đại diện	');
		$control_ops = array('width'=> 250, 'height'=> 300);
		parent::WP_Widget(false,$name='Show Categories Select Width Thumbnail',$widget_ops,$control_ops);

    }
 
  //Displays the Widget in the front-end 
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '  ': $instance['title']);
		$posts_number = empty($instance['posts_number']) ? '': (int) $instance['posts_number'];
		$blog_category = empty($instance['blog_category']) ? '': (int) $instance['blog_category'];
	 
		echo $before_widget;
	 
		/*if( $title )
		echo $before_title . $title . $after_title;*/
	?>
		
			<div class="block-post clearfix">
				<ul>
					<a href="<?php echo get_category_link( $blog_category ); ?>">
						<li class="vne_thumbnail">
							<?php if (function_exists('z_taxonomy_image_url')) { ?>
								<img class="img-responsive" src="<?php echo z_taxonomy_image_url($blog_category); ?>"/>
							<?php } ?>
						</li>
					</a>
					<li class="slide-up">
						<a href="<?php echo get_category_link( $blog_category ); ?>"><h3><?php echo get_cat_name($blog_category);?></h3></a>
						<p> <?php echo substr(category_description( ), 0, 60); ?> </p>
					</li>
				</ul>
				<!-- <a class="btn btn-success text-center" href="<?php echo get_category_link( $blog_category ); ?>">Read more</a> -->
			</div><!-- end .block-post -->
		
	 
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
 
function bcdonline_fromcategorieswidgetInit() {
  register_widget('bcdonline_fromcategorieswidget');
}
add_action('widgets_init', 'bcdonline_fromcategorieswidgetInit');
?>
