<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div class="wrapper">

    <?php $header_logo = get_field('header_logo', 'option'); ?>
    <?php $header_menu = get_field('header_menu', 'option'); ?>
    <?php $header_button = get_field('header_button', 'option'); ?>
    <?php $is_flexible_template = is_page_template('templates/flexible.php'); ?>

    <header class="cheader <?php echo !$is_flexible_template ? 'cheader_static' : ''; ?>" data-js-header>
      <div class="cheader__container">
        <div class="cheader__body">
          <a href="/" class="cheader__logo-wrapper">
            <?php echo wp_get_attachment_image($header_logo, 'full', false, ['class' => 'cheader__logo']); ?>
          </a>
          <?php if ($header_menu && is_array($header_menu)): ?>
            <nav id="desk-menu" class="desk-nav">
              <ul class="desk-nav__list">
                <?php foreach ($header_menu as $item): ?>
                  <li class="desk-nav__item">
                    <a href="<?php echo esc_url($item['link']['url']); ?>"
                      class="desk-nav__link"><?php echo esc_html($item['link']['title']); ?></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </nav>
          <?php endif; ?>
          <?php if ($header_button && is_array($header_button)): ?>
            <a href="<?php echo esc_url($header_button['url']); ?>"
              class="cheader__cta button button_sm"><?php echo $header_button['title']; ?></a>
          <?php endif; ?>
          <button aria-controls="header-overlay" aria-expanded="false" id="button-menu" class="mobile-button-open"
            type="button" aria-label="Toggle mobile menu" title="Toggle mobile menu" data-js-header-trigger-button>
            <svg class="cheader__burger" width="26" height="16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="13.887" y="15.093" width="13.886" height="3.019" rx="1.509"
                transform="rotate(-180 13.887 15.093)" fill="#fff" />
              <rect x="20.527" y="9.056" width="20.526" height="3.019" rx="1.509" transform="rotate(-180 20.527 9.056)"
                fill="#fff" />
              <rect x="25.961" y="3.019" width="25.96" height="3.019" rx="1.509" transform="rotate(-180 25.96 3.019)"
                fill="#fff" />
            </svg>
            <svg class="cheader__close" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="21.23" y="2.842" width="25.96" height="3.019" rx="1.509" transform="rotate(135 21.23 2.842)"
                fill="#fff" />
              <rect x="19.098" y="21.198" width="25.96" height="3.019" rx="1.509" transform="rotate(-135 19.098 21.198)"
                fill="#fff" />
            </svg>
          </button>
        </div>
        <div class="cheader__mobile mobile-body" aria-labelledby="button-menu" id="header-overlay"
          data-js-header-overlay>
          <div class="mobile-body__inner">
            <nav class="mobile-body__nav">
              <ul class="mobile-body__list">
                <?php foreach ($header_menu as $item): ?>
                  <li class="mobile-body__item item-mobile-menu">
                    <a href="<?php echo esc_url($item['link']['url']); ?>"
                      class="item-mobile-menu__link"><?php echo esc_html($item['link']['title']); ?></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </nav>
            <div class="mobile-body__footer">
              <?php if ($header_button && is_array($header_button)): ?>
            <a href="<?php echo esc_url($header_button['url']); ?>"
              class="mobile-body__footer-button"><?php echo $header_button['title']; ?></a>
          <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </header>