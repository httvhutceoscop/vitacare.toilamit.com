<?php

get_header(); 
$id_post = get_the_ID();

 $term = get_the_terms($id_post, 'danh-muc-bai-viet-moi');
 $a_term_id = [];
 foreach ($term as $key => $value) {
     array_push($a_term_id, $value->term_id);
 }
?>
<div class="container">
	<div class="row">
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
			<?php if(function_exists('bcn_display'))
				{
					bcn_display();
			}?>
		</div>
		<div class="box-x">
			<div id="sidebar_columns_left" class="col-sm-3 hidden-xs">
                <div class="danh-muc-bai-viet-moi">
                    <ul>
                        <?php
                            $taxonomy  = 'danh-muc-bai-viet-moi';
                            $this_category = get_categories("&taxonomy=".$taxonomy."&parent=0&hide_empty=0&order=DESC");
                            foreach ($this_category as $key => $value) { ?>
                                <li><span class="title-danh-muc"><a href="<?php echo get_category_link($value->term_id);?>"><?php echo $value->name;?></a>
                                    <?php
                                        $sub_category = get_categories("&taxonomy=".$taxonomy."&parent=".$value->term_id."&hide_empty=0&order=ASC");
                                        if (count($sub_category) > 0) {
                                    ?>
                                    <i class="fa fa-minus toggle-close-parent" aria-hidden="true"></i>
                                    <i class="fa fa-plus toggle-open-parent" aria-hidden="true"></i>
                                    <?php
                                        }
                                    ?>
                                    </span>
                                    <ul class="sub-category">
                                    <?php
                                        foreach ($sub_category as $key => $sub_value) {
                                            $sub_sub_category = get_categories("&taxonomy=".$taxonomy."&parent=".$sub_value->term_id."&hide_empty=0&order=ASC");
                                    ?>
                                        <li class="
                                            <?php
                                                if($catid == $sub_value->cat_ID){
                                                    echo 'danh-muc-select ';
                                                }
                                                if (count($sub_sub_category) > 0) {
                                                    echo 'has-sub-category ';
                                                }
                                                if (in_array($sub_value->cat_ID, $a_term_id))
                                                    echo 'open-sub-category ';
                                            ?>
                                            "
                                        >
                                            <a href="<?php echo get_term_link($sub_value->cat_ID); ?>" >
                                                <?php echo $sub_value->name;?> (<?php echo count_port_by_cat($sub_value->cat_ID,'danh-muc-bai-viet-moi');?>)
                                            </a>

                                            <?php
                                                if (count($sub_sub_category) > 0) {
                                            ?>
                                            <i class="fa fa-minus toggle-close" aria-hidden="true"></i>
                                            <i class="fa fa-plus toggle-open" aria-hidden="true"></i>
                                            <?php
                                                }
                                            ?>

                                            <?php
                                                if (count($sub_sub_category) > 0) {
                                            ?>
                                                <ul class="sub-sub-category">
                                                <?php
                                                    foreach ($sub_sub_category as $key => $sub_sub_value) {
                                                ?>
                                                    <li class="<?php
                                                            if(in_array($sub_sub_value->cat_ID, $a_term_id)){
                                                                echo 'danh-muc-select ';
                                                            }
                                                        ?>">
                                                        <a href="<?php echo get_term_link($sub_sub_value->cat_ID); ?>" >
                                                            <?php echo $sub_sub_value->name;?>
                                                        </a>
                                                    </li>
                                                <?php
                                                    }
                                                ?>
                                                </ul>
                                            <?php
                                                }
                                            ?>
                                        </li>                                    
                                    <?php } ?>
                                    </ul>
                                </li>
                        <?php } ?>
                    </ul>

                </div>

                <?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
                    <?php dynamic_sidebar( 'left-sidebar' ); ?>
                <?php endif; ?>
            </div>
			 <div id="columns_left" class="box-single col-xs-12 col-sm-12 col-md-6 col-lg-6">

					<?php  if (have_posts()) : while (have_posts()) : the_post();?>
						<li><h1><?php the_title();?></h1></li>
                        <div class="social">
                            <div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                            <g:plusone></g:plusone>
                        </div>
						<li class="info_news_post"><span>Đăng bởi: <?php the_author();?></span><span>Ngày đăng: <?php the_date(); ?></span></li>
						<li class="content-news-post"><?php the_post_thumbnail('medium',array('class'=>'alignleft'));?><?php the_content();?></li>
					<?php
					endwhile;endif;wp_reset_query();
					?>
                    <div class="title_related">Bài viết khác</div>
                    <div class="list_related">
                     <?php
                        $terms = get_the_terms(get_the_ID(), 'danh-muc-bai-viet-moi');
                        $cat_id = $terms[0]->term_id;
                                                $args = array(
                                                            'post_type' => 'bai-viet-moi',
                                                            'posts_per_page' => 10,
                                                            'post__not_in' => array($id_post),
                                                            'tax_query' => array(
                                                                                array(
                                                                                    'taxonomy' => 'danh-muc-bai-viet-moi',
                                                                                    'field' => 'term_id',
                                                                                    'terms' => $cat_id,
                                                                                )
                                                                            )
                                                            );
                                                query_posts($args);
                                                if(have_posts()) : while(have_posts()) : the_post(); ?>    
                                                    <li> 
                                                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                                    </li>     
                                                <?php            
                                                    endwhile;
                                                endif;
                                                wp_reset_query();
                                            ?>
                                        </div>
                    <?php comments_template();?>
			</div>
			
			
			<div id="columns_right" class="col-sm-3 hidden-xs">
				<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
	                <?php dynamic_sidebar( 'right-sidebar' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php 
	/*global $wpdb;
	$id = $post->ID;
	$results = $wpdb->get_results("SELECT * FROM xtl_product_viewed where posts_id = $id");
	if(count($results) >= 1){
		exit();
	}else{
		$post = get_post_meta($post->ID,'style_product');
		foreach ($post as $key => $value) {
			if($value == 2){
				$wpdb->query("INSERT INTO xtl_product_viewed value('','$id')");
			}else{	
				exit();
			}
		}
	}
	*/
?>
<?php get_footer(); ?>