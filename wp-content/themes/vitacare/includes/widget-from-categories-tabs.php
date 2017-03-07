<?php class fromcategoriestabswidget extends WP_Widget
{
    function fromcategoriestabswidget(){
		$widget_ops = array('description'=> 'Hiển thị category dạng tabs tin tức');
		$control_ops = array('width'=> 400, 'height'=> 300);
		parent::WP_Widget(false,$name='Show Tabs Categories',$widget_ops,$control_ops);

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
	
		$result_cap1 = $wpdb->get_results("SELECT * FROM  tlct_terms WHERE term_id = '".$blog_category."' LIMIT 1");
		
		foreach($result_cap1 as $rs){?>
			<div class="box"><div class="box-heading">
			<a class="active" href="<?php echo get_term_link($rs->slug,'category');?>"><?php echo $rs->name;?></a> 
			<?php
				$result = $wpdb->get_results("SELECT * FROM tlct_term_taxonomy p INNER JOIN tlct_terms t on t.term_id = p.term_id WHERE p.parent = '".$rs->term_id."' LIMIT 5");
					foreach($result as $rs){?>
						<a href="<?php echo get_term_link($rs->slug,'category');?>">  <?php echo $rs->name;?></a>
			<?php
					}
			?>
			</div>
				<div class="box-content">
					<?php echo show_post_cate($rs->term_id,$rs->term_id);?>
					
				</div>
			</div>
		<?php
			}

    }
	
	
 
} // end fromcategoriestabswidget class
 
function fromcategoriestabswidgetInit() {
  register_widget('fromcategoriestabswidget');
}
add_action('widgets_init', 'fromcategoriestabswidgetInit');
?>
