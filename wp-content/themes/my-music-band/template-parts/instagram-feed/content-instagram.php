<div id="content" class="site-content">
  <div class="wrapper">

    <div id="primary" class="content-area">
      <main id="main" class="site-main">
        <div class="singular-content-wrap instagram-content-wrap">
          <?php
          $id = 6; // add the ID of the page where the zero is
          $p = get_page($id);
          $t = $p->post_title;
          ?>
          <div class="section-heading-wrapper">
            <div class="section-title-wrapper">
              <h2 class="section-title"><?php echo apply_filters('post_title', $t) ?></h2><!-- the title is here wrapped with h2 -->
            </div>
          </div>
          <?php echo apply_filters('the_content', $p->post_content); ?>
        </div><!-- .singular-content-wrap -->
        <footer class="entry-footer">
          <div class="entry-meta">
            <span class="edit-link">
              <a class="post-edit-link" href="http://localhost:8888/SplendeurLeGroupe/wp-admin/post.php?post=68&#038;action=edit">Edit<span class="screen-reader-text">Instagram Feed</span></a>
            </span>
          </div><!-- .entry-meta -->
        </footer><!-- .entry-footer -->
      </article><!-- #post-68 -->
    </div>
  </main><!-- #main -->
</div><!-- #primary -->
</div><!-- .wrapper -->
</div><!-- #content -->
