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
              <article class="blog__post post-article">
                <a href="<?php the_permalink(); ?>" class="post-article__link">
                  <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('full', array('class' => 'post-article__image')); ?>
                  <?php endif; ?>
                </a>
                <h2 class="post-article__title">
                  <a href="<?php the_permalink(); ?>">
                    <?php echo get_the_title(); ?>
                  </a>
                </h2>
                <p class="post-article__info">
                  <?php echo sprintf('By %s on %s', get_the_author(), get_the_time(get_option('date_format'))); ?>
                </p>
                <div class="post-article__excerpt">
                  <?php the_excerpt(); ?>
                </div>
                <a class="button post-article__button" href="<?php the_permalink(); ?>" style="max-width: 230px">READ
                  MORE</a>
              </article>
            <?php endwhile; ?>

            <div class="blog-pagination">
              <?php
              get_template_part('template-parts/pagination');
              ?>
            </div>


          <?php else: ?>
            <p>No posts</p>
          <?php endif; ?>
        </div>
      </div>

      <aside class="blog__sidebar">
        <div>
          <div class="blog__search">
            <form action="https://mediacomponents.com/" method="get" class="blog__search-form">
              <input type="text" name="s" class="blog__search-input" value="" aria-label="Search keywords"
                placeholder="Search keywords..." />
              <button type="submit" name="submit" aria-label="Submit search" class="blog__search-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                  <path
                    d="M19.5811 17.3991L15.3412 13.1591C16.2172 11.8388 16.73 10.2578 16.73 8.55836C16.73 3.95344 12.9836 0.207031 8.37867 0.207031C3.77375 0.207031 0.0273438 3.95344 0.0273438 8.55836C0.0273438 13.1633 3.77375 16.9097 8.37867 16.9097C10.0782 16.9097 11.6591 16.3969 12.9794 15.5209L17.2194 19.7608C17.8708 20.4131 18.9297 20.4131 19.5811 19.7608C20.2334 19.1086 20.2334 18.0513 19.5811 17.3991ZM2.53274 8.55836C2.53274 5.33474 5.15506 2.71243 8.37867 2.71243C11.6023 2.71243 14.2246 5.33474 14.2246 8.55836C14.2246 11.782 11.6023 14.4043 8.37867 14.4043C5.15506 14.4043 2.53274 11.782 2.53274 8.55836Z"
                    fill="currentColor"></path>
                </svg>
              </button>
            </form>
          </div>
          <div class="blog__sidebar-section">
            <h2 class="blog__sidebar-title">Recent posts:</h2>
            <ul class="blog__sidebar-list">
              <?php
              $recent_posts = get_posts(array(
                'post_type' => 'post',
                'posts_per_page' => 10,
              ));

              if (!empty($recent_posts)) {
                foreach ($recent_posts as $post) {
                  setup_postdata($post);
              ?>
                  <li class="blog__sidebar-item">
                    <a href="<?php the_permalink(); ?>" class="blog__sidebar-link"><?php the_title(); ?></a>
                  </li>
              <?php
                }
                wp_reset_postdata();
              } else {
                echo '<p>No posts found!</p>';
              }
              ?>
            </ul>
          </div>
          <div class="blog__sidebar-section">
            <h2 class="blog__sidebar-title">Blog post topics:</h2>
            <ul class="blog__sidebar-list">
              <?php $categories = get_categories(); ?>
              <?php foreach ($categories as $category): ?>
                <li class="blog__sidebar-item">
                  <a href="<?php echo get_category_link($category->term_id); ?>"
                    class="blog__sidebar-link"><?php echo $category->name; ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </aside>
    </div>
  </div>
</main>

<?php get_footer(); ?>