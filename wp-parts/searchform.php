<div class="blog__search">
  <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="blog__search-form">
    <input type="text" name="s" class="blog__search-input" value="<?php echo get_search_query(); ?>" aria-label="Search keywords"
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