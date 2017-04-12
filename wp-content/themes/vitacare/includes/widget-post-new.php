<?php class show_post_new extends WP_Widget
{
    public function show_post_new() {
        $widget_ops = array(
            'classname' => 'widget_recent_entries',
            'description'=> 'Hiển thị bài viết mới.',
            'customize_selective_refresh' => true,
        );
        $control_ops = array('width'=> 250, 'height'=> 300);
        parent::WP_Widget(false,$name='Hiển thị bài viết mới.',$widget_ops,$control_ops);
        // parent::__construct( 'recent-posts', __( 'Hiển thị bài viết mới.' ), $widget_ops );
        // $this->alt_option_name = 'widget_recent_entries';

    }
    //Displays the Widget in the front-end
    public function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '  ': $instance['title']);
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number )
            $number = 5;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
        $aIdNewCats = [216, 217, 218]; //216- thong tin dinh duong, 217 - thong tin a-z, 218 - thong tin khoa hoc
        $args = array(
            'taxonomy' => 'danh-muc-bai-viet-moi',
            'post_type' => 'bai-viet-moi',
            // 'post__in' => $aIdNewCats,
            'posts_per_page' => $number,
            'post_status' => 'publish',
        );
        $wp_query = new WP_Query( $args );

        // $wp_query = new WP_Query( apply_filters( 'widget_posts_args', array(
        //     'posts_per_page'      => $number,
        //     'no_found_rows'       => true,
        //     'post_status'         => 'publish',
        //     'ignore_sticky_posts' => true
        // ) ) );

        // print_r($wp_query);

        if ($wp_query->have_posts()) :
        ?>
        <?php
            echo $before_widget;
            if( $title )
            echo $before_title . $title . $after_title;
        ?>
        <ul>
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
            <?php if ( $show_date ) : ?>
                <span class="post-date"><?php echo get_the_date(); ?></span>
            <?php endif; ?>
            </li>
        <?php endwhile; ?>
        </ul>
        <?php echo $after_widget; ?>
        <?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;
    }

    //Saves the settings.
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
        return $instance;
    }

    //Creates the form for the widget in the back-end.
    public function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
        <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>

        <?php

    }

} // end bcdonline_fromcategorieswidget class

function show_post_newInit() {
  register_widget('show_post_new');
}
add_action('widgets_init', 'show_post_newInit');
?>
