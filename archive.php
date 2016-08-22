<?php
/**
* @package moran
* @subpackage archive template
* @version 1.5
* Template Name: Archive template
* Description: Display taxonomy queries.
*
*/
get_header(); ?>
  <div class="category_articles">
    <div class="articles_header header">
    <?php
    // Show title of custom taxonomy
    $term = get_term_by( 'slug', get_query_var( 'term' ),   get_query_var( 'taxonomy' ) );
    // Query custom post types to include in page header as filter for content
    $args = array('public' => true, '_builtin'=>false);
    $outs = 'objects';
    $opr = 'and';
    $post_types = get_post_types($args, $outs, $opr);
    ?>
      <h1 class="category_title">
        <?php echo $term->name ?>
      </h1>
    <?php if (have_posts()): ?>
      <ul class="category_filter">
        <?php foreach ($post_types as $post_type): ?>
          <li>
            <a href="#" data-filter="<?php echo $post_type->name ?>">
              <?php echo $post_type->labels->menu_name ?>
            </a>
          </li>
        <?php endforeach; ?>
          <li>
            <a href="#" class="selected" data-filter="*">
              <?php echo _e('Show all', 'moran'); ?>
            </a>
          </li>
      </ul>
    <?php endif; ?>
    </div> <!-- End of Category Header -->
    <div class="articles_body body">
      <?php if(have_posts()): ?>
      <div class="body_main grid">
        <?php // show category articles
        while(have_posts()): the_post();
          get_template_part('templates/article', get_post_format());
        endwhile;
        ?>
      </div>
      <?php else: ?>
      <div class="body_main empty">
        <?php // show message if no articles found
        get_template_part('templates/article', 'empty');
        ?>
      </div>
      <?php endif;?>
    </div><!-- End of Category Body -->
  </div>
<?php get_footer();
