<?php $footer_content = get_field('footer_content', 'options'); ?>
<?php $footer_contacts = get_field('footer_contacts', 'options'); ?>

<?php if ($footer_content): ?>
  <footer class="footer">
    <div class="footer__container container-base">
      <div class="footer__body">
        <div class="footer__location">
          <h2 class="footer__location-title">GET IN TOUCH</h2>
          <?php if ($footer_contacts): ?>
            <div class="footer__location-list">
              <?php foreach ($footer_contacts as $item): ?>
                <div class="footer__location-item">
                  <h3 class="footer__location-item-title"><?php echo $item['title']; ?></h3>
                  <div class="footer__location-item-info">
                      <p class="footer__location-link">
                        <?php echo $item['location']; ?>
                      </p>
                    <a href="<?php echo $item['phone_number']['url']; ?>" class="footer__location-phone"><?php echo $item['phone_number']['title']; ?></a>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="footer__content">
        <?php echo $footer_content; ?>
      </div>
    </div>
  </footer>
<?php endif; ?>

<?php wp_footer(); ?>
</div>
</body>

</html>