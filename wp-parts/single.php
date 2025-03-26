<?php get_header(); ?>

<main>
  <?php $blog_hero_background = get_field('blog_hero_background', 'option'); ?>
  <?php $blog_hero_title = get_field('blog_hero_title', 'option'); ?>
  <div class="simple-hero" style="background-image: url('<?php echo $blog_hero_background ?? ''; ?>');">
    <div class="simple-hero__container container-base">
      <div class="simple-hero__content">
        <h1 class="simple-hero__title">
          <?php
          echo the_title();
          ?>
        </h1>
      </div>
    </div>
  </div>
  <div class="blog">
    <div class="blog__container container-base">
      <div class="blog__main blog__single">
        <?php if (have_posts()):
          while (have_posts()):
            the_post(); ?>
            <article class="prose single-article" style="margin-bottom: 30px;">
              <?php the_content(); ?>
            </article>
          <?php endwhile; ?>

        <?php else: ?>
          <p>No posts</p>
        <?php endif; ?>

        <?php if (has_tag()) { ?>
          <div class="blog__single-tags">
            <h2 class="blog__single-tags-title">Tags:</h2>
            <div class="blog__single-tags-list">
              <?php the_tags(''); ?>
            </div>
          </div>
        <?php } ?>

        <div class="blog__single-share">
          <p class="blog__single-share-title">Share this article:</p>

          <ul class="blog__single-share-list">
            <li>
              <a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" title="Share on Facebook"
                aria-label="Share on Facebook"
                onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600'); return false;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95" />
                </svg>
              </a>
            </li>
            <li>
              <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo get_the_title(); ?>"
                title="Share on Twitter" aria-label="Share on Twitter"
                onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600'); return false;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M22.46 6c-.77.35-1.6.58-2.46.69a4.27 4.27 0 0 0 1.88-2.37 8.59 8.59 0 0 1-2.72 1.04 4.26 4.26 0 0 0-7.26 3.88A12.1 12.1 0 0 1 3.16 4.9a4.26 4.26 0 0 0 1.32 5.68 4.23 4.23 0 0 1-1.93-.53v.05a4.26 4.26 0 0 0 3.42 4.18 4.3 4.3 0 0 1-1.92.07 4.26 4.26 0 0 0 3.98 2.96A8.54 8.54 0 0 1 2 19.54a12.07 12.07 0 0 0 6.56 1.92c7.88 0 12.2-6.53 12.2-12.2 0-.19 0-.38-.01-.57A8.7 8.7 0 0 0 22.46 6z" />
                </svg>
              </a>
            </li>
            <li>
              <a title="Share on Pinterest" aria-label="Share on Pinterest"
                href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>"
                onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=320,width=600'); return false;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M9.04 21.54c.96.29 1.93.46 2.96.46a10 10 0 0 0 10-10A10 10 0 0 0 12 2A10 10 0 0 0 2 12c0 4.25 2.67 7.9 6.44 9.34c-.09-.78-.18-2.07 0-2.96l1.15-4.94s-.29-.58-.29-1.5c0-1.38.86-2.41 1.84-2.41c.86 0 1.26.63 1.26 1.44c0 .86-.57 2.09-.86 3.27c-.17.98.52 1.84 1.52 1.84c1.78 0 3.16-1.9 3.16-4.58c0-2.4-1.72-4.04-4.19-4.04c-2.82 0-4.48 2.1-4.48 4.31c0 .86.28 1.73.74 2.3c.09.06.09.14.06.29l-.29 1.09c0 .17-.11.23-.28.11c-1.28-.56-2.02-2.38-2.02-3.85c0-3.16 2.24-6.03 6.56-6.03c3.44 0 6.12 2.47 6.12 5.75c0 3.44-2.13 6.2-5.18 6.2c-.97 0-1.92-.52-2.26-1.13l-.67 2.37c-.23.86-.86 2.01-1.29 2.7z" />
                </svg>
              </a>
            </li>
            <li>
              <a title="Share on LinkedIn" aria-label="Share on LinkedIn"
                href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>"
                onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=320,width=600'); return false;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93zM6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37z" />
                </svg>
              </a>
            </li>
            <li>
              <a href="mailto:?subject=<?php echo get_the_title(); ?>&body=<?php echo get_the_excerpt() . ' ' . get_permalink(); ?>"
                title="Share via Email" aria-label="Share via Email">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M12 13.5L2 6.75V18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6.75L12 13.5zM12 11L22 4H2l10 7z" />
                </svg>
              </a>
            </li>
          </ul>
        </div>

        <?php
        $terms = get_the_category(get_the_ID());
        foreach ($terms as $term) {
          $args = [
            'post_type' => 'post',
            'posts_per_page' => 3,
            'order' => 'DESC',
            'post__not_in' => array(get_the_ID()),
            'cat' => $term->term_id,
          ];
        }
        $recent_posts = get_posts($args);
        ?>


        <?php
        if (!empty($recent_posts)) {
          ?>
          <div class="blog__related">
            <h2 class="blog__related-title">Related Articles</h2>
            <div class="blog__related-list">
              <?php
              foreach ($recent_posts as $post) {
                setup_postdata($post);
                ?>
                <article class="blog__related-article">
                  <a href=" <?php the_permalink(); ?>" class="blog__related-article-link">
                    <?php if (has_post_thumbnail()): ?>
                      <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="Related post image"
                        class="blog__related-article-image" />
                    <?php else: ?>
                      <?php $default_placeholder = get_field('default_placeholder', 'option'); ?>
                      <?php echo wp_get_attachment_image($default_placeholder, 'full', false, ['loading' => 'lazy', 'class' => 'blog__related-article-image']); ?>
                    <?php endif; ?>
                    <h3 class="blog__related-article-title"><?php the_title(); ?></h3>
                  </a>
                </article>
                <?php
              }
              wp_reset_postdata(); ?>
            </div>
          </div>
          <?php
        } else {
          echo '<p>No posts found!</p>';
        }
        ?>

      </div>

      <?php
      get_template_part('template-parts/sidebar');
      ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>