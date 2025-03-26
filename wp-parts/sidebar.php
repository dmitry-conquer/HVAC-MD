<aside class="blog__sidebar">
        <div>
          <?php get_search_form(); ?>
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