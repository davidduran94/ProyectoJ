<?php
/**
 * Plugin Name: Category Row Widget
 */

add_action( 'widgets_init', 'mvp_catrow_load_widgets' );

function mvp_catrow_load_widgets() {
	register_widget( 'mvp_catrow_widget' );
}

class mvp_catrow_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function mvp_catrow_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mvp_catrow_widget', 'description' => __('A widget that displays a list of posts from a category of your choice.', 'mvp-text') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'mvp_catrow_widget' );

		/* Create the widget. */
		$this->__construct( 'mvp_catrow_widget', __('Flex Mag: Category Row Widget', 'mvp-text'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		global $post;
		$title = apply_filters('widget_title', $instance['title'] );
		$categories = $instance['categories'];
		$showcat = $instance['showcat'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
			<div class="row-widget-wrap left relative">
				<ul class="row-widget-list">
					<?php $recent = new WP_Query(array( 'cat' => $categories, 'posts_per_page' => 3 )); while($recent->have_posts()) : $recent->the_post(); ?>
						<li>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
								<div class="row-widget-img left relative">
										<?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'reg-img' )); ?>
										<?php the_post_thumbnail('mvp-small-thumb', array( 'class' => 'mob-img' )); ?>
									<?php $post_views = get_post_meta($post->ID, "post_views_count", true); if ( $post_views >= 1) { ?>
									<div class="feat-info-wrap">
										<div class="feat-info-views">
											<i class="fa fa-eye fa-2"></i> <span class="feat-info-text"><?php mvp_post_views(); ?></span>
										</div><!--feat-info-views-->
										<?php $disqus_id = get_option('mvp_disqus_id'); if ( ! $disqus_id ) { if (get_comments_number()==0) { } else { ?>
											<div class="feat-info-comm">
												<i class="fa fa-comment"></i> <span class="feat-info-text"><?php comments_number( '0', '1', '%' ); ?></span>
											</div><!--feat-info-comm-->
										<?php } } ?>
									</div><!--feat-info-wrap-->
									<?php } ?>
									<?php if ( has_post_format( 'video' )) { ?>
										<div class="feat-vid-but">
											<i class="fa fa-play fa-3"></i>
										</div><!--feat-vid-but-->
									<?php } ?>
								</div><!--row-widget-img-->
							<?php } ?>
							<div class="row-widget-text">
								<?php if($showcat) { ?>
									<span class="side-list-cat"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span>
								<?php } ?>
								<p><?php the_title(); ?></p>
							</div><!--row-widget-text-->
							</a>
						</li>
					<?php endwhile; wp_reset_postdata(); ?>
				</ul>
			</div><!--row-widget-wrap-->
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;

	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['categories'] = strip_tags( $new_instance['categories'] );
		$instance['showcat'] = strip_tags( $new_instance['showcat'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Title', 'showcat' => 'on' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>

		<!-- Category -->
		<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>">Select category:</label>
			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>All Categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) {  ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>

		<!-- Show Categories -->
		<p>
			<label for="<?php echo $this->get_field_id( 'showcat' ); ?>">Show categories on posts:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'showcat' ); ?>" name="<?php echo $this->get_field_name( 'showcat' ); ?>" <?php checked( (bool) $instance['showcat'], true ); ?> />
		</p>


	<?php
	}
}

?>