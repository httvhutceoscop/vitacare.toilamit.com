<?php class post_by_category extends WP_Widget
{
    function post_by_category(){
		$widget_ops = array('description'=> 'Hiển thị bài viết theo danh mục - slide bar');
		$control_ops = array('width'=> 250, 'height'=> 300);
		parent::WP_Widget(false,$name='Show Post By Categories Select',$widget_ops,$control_ops);

    }
 
  //Displays the Widget in the front-end 
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '  ': $instance['title']);
		$posts_number = empty($instance['posts_number']) ? '': (int) $instance['posts_number'];
		$blog_category = empty($instance['blog_category']) ? '': (int) $instance['blog_category'];
	 	if(is_home()){}else{
		echo $before_widget;
	 
		
		echo $before_title . $title . $after_title;
	?>
		<div class="list-content">
			
		<?php 
			$cat_ID = get_query_var('cat');
			$this_category = get_categories("&parent=".$blog_category."&hide_empty=0&order=DESC"); 
			foreach($this_category as $term) { ?>
			<ul>
				<!-- <a href="<?php echo get_category_link($term->cat_ID); ?>">
				<li class="title-content"><?php echo $term->name;?></li></a> -->
				<li <?php
						if($cat_ID == $term->cat_ID){
							echo 'class="active"';
						}
					?>
					title="<?php echo $term->cat_ID;?>"><i class="arrow_right" title="<?php echo $term->cat_ID;?>"></i>
					<a href="<?php echo get_category_link($term->cat_ID); ?>"><?php echo $term->name;?></a>
					<ul class="subcatmenu" id="<?php echo $term->cat_ID;?>">
					<?php
						query_posts("&cat=".$term->cat_ID."&meta_key=style_product&meta_value=1");
						if(have_posts()) : while(have_posts()) : the_post();
					?>
							<a href="<?php echo the_permalink(); ?>"><li class="title-content"><?php the_title();?></li></a>
					<?php
						endwhile;
						endif;
						wp_reset_query();
					?>
					</ul>
				</li>
			
	 		</ul>

	 	<?php
	 		}
	 		?>
		</div><!-- end .block-post -->
	<?php
		echo $after_widget;
	}
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
 
function post_by_categoryInit() {
  register_widget('post_by_category');
}
add_action('widgets_init', 'post_by_categoryInit');
?>
