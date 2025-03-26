<?php get_header(); ?>

<main>
  <?php $blog_hero_background = get_field('blog_hero_background', 'option'); ?>
  <?php $blog_hero_title = get_field('blog_hero_title', 'option'); ?>
  <div class="simple-hero" style="background-image: url('<?php echo $blog_hero_background ?? ''; ?>');">
    <div class="simple-hero__container container-base">
      <div class="simple-hero__content">
        <h1 class="simple-hero__title">
          <?php
          if (is_category()) {
            echo single_cat_title('', false);
          } elseif (is_archive()) {
            echo get_the_archive_title();
          } elseif (is_search()) {
            echo 'Search results for: "' . get_search_query() . '"';
          } else {
            echo $blog_hero_title;
          }
          ?>
        </h1>
      </div>
    </div>
  </div>
  <div class="blog">
    <div class="blog__container container-base">
      <div class="blog__main">
        <div class="blog__posts">
          <?php if (have_posts()):
            while (have_posts()):
              the_post(); ?>
              <?php get_template_part('template-parts/article'); ?>
            <?php endwhile; ?>

            <div class="blog-pagination">
              <?php get_template_part('template-parts/pagination'); ?>
            </div>

          <?php else: ?>
            <p>No posts</p>
          <?php endif; ?>
        </div>
      </div>

      <?php get_template_part('template-parts/sidebar'); ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>