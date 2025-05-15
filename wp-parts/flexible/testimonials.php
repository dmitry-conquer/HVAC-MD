<?php $title = get_sub_field('title'); ?>
<?php $content = get_sub_field('content'); ?>

<section class="testimonials">
  <div class="testimonials__container">
    <?php if ($title): ?>
      <h2 data-aos="fade-up" class="testimonials__title"><?php echo $title; ?></h2>
    <?php endif; ?>
    <?php if ($content): ?>
      <div data-aos="fade-up" class="testimonials__body">
        <?php echo $content; ?>
      </div>
    <?php endif; ?>
  </div>
</section>