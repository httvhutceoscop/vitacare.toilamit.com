<?php class frompostfeaturewidget extends WP_Widget
{
    function frompostfeaturewidget(){
		$widget_ops = array('description'=> 'Hiển thị bài viết nổi bật');
		$control_ops = array('width'=> 400, 'height'=> 300);
		parent::WP_Widget(false,$name='Show Post Feature',$widget_ops,$control_ops);

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
	
	
	//Displays the Widget in the front-end 
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '  ': $instance['title']);
		$posts_number = empty($instance['posts_number']) ? '': (int) $instance['posts_number'];
		$blog_category = empty($instance['blog_category']) ? '': (int) $instance['blog_category'];
	 
		global $wpdb;
		/*$sql = "SELECT * FROM tlct_posts WHERE post_status = 'publish' ORDER BY post_date DESC LIMIT 4";
		$result = $wpdb->get_results($sql);*/
		$args = array( 'numberposts' => '4' );
		$recent_posts = wp_get_recent_posts($args);
		echo '<div class="feature">';
		foreach ($recent_posts as $key => $rows) {
			if ($key == 0) {?>
			   <div class="content">
					 <a href="<?php echo get_permalink($rows['ID']);?>"> <?php echo get_the_post_thumbnail($rows['ID'], 'medium');?></a>
					<ul>
					<li><a class="icon-<?php echo $key;?>" href="<?php echo get_permalink($rows['ID']);?>"><?php echo $rows['post_title'];?> </a></li>
					<p><?php echo the_excerpt($rows->ID);?></p>
					</ul>
				</div>
				<div class="tin_lien_quan">
		   <?php } else {?>
				<ul>
				<a href="<?php echo get_permalink($rows['ID']);?>"> <?php echo get_the_post_thumbnail($rows['ID'],"small");?></a>
				<li><a class="icon-<?php echo $key;?>" href="<?php echo get_permalink($rows['ID']);?>"><?php echo $rows['post_title'];?> </a></li>
				</ul>
		   <?php }        
		}?></div></div><?php

    }
	
	
 
} // end frompostfeaturewidget class
 
function frompostfeaturewidgetInit() {
  register_widget('frompostfeaturewidget');
}
add_action('widgets_init', 'frompostfeaturewidgetInit');
?>
