<?php // Template name: Flexible template ?>

<?php get_header(); ?>

<div id="top" class="wrapper">
  <?php if (have_rows('content')): ?>
    <?php while (have_rows('content')):
      the_row(); ?>
      <?php get_template_part('flexible/flexible', get_row_layout()); ?>
    <?php endwhile; ?>
  <?php endif; ?>

  <a href="#top" aria-label="Scroll to top" class="to-top" data-js-top-top-button>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
      class="size-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18"></path>
    </svg>
  </a>
</div>

<?php get_footer(); ?>