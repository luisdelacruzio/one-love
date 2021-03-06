<?php
/*
Template Name: Home
*/
get_header();

  $subtitle     = get_post_meta(get_the_ID(),'subtitle','true');
  $button1_text = get_post_meta(get_the_ID(),'button-1-text','true');
  $button1_link = get_post_meta(get_the_ID(),'button-1-link','true');
  $button2_text = get_post_meta(get_the_ID(),'button-2-text','true');
  $button2_link = get_post_meta(get_the_ID(),'button-2-link','true');
  if ( has_post_thumbnail( $post->ID ) ) : ?>
    <header id="featured-hero" role="banner" style="background-image: url('<?php echo the_post_thumbnail_url('full'); ?>')">
      <div class="overlay remove-overlay">
        <header class="full-page-header-content">
            <?php if (!empty($subtitle)): ?>
              <h1 class="entry-title"><?php echo $subtitle;  ?></h1>
            <?php endif; ?>
            <div class="hero-overlay-buttons">
              <?php if (!empty($button1_text)): ?>
                <div class="vc_btn3-container ol_button vc_btn3-default">
                   <a class="vc_general vc_btn3 vc_btn3-size-default vc_btn3-shape-default vc_btn3-style-onelove vc_btn3-color-default" href="<?php echo $button1_link; ?>" title="">
                     <h4><?php echo $button1_text; ?></h4>
                   </a>
                 </div>
              <?php endif; ?>
                <?php if (!empty($button2_text)): ?>
                  <div class="vc_btn3-container ol_button vc_btn3-default">
                    <a class="vc_general vc_btn3 vc_btn3-size-default vc_btn3-shape-default vc_btn3-style-onelove vc_btn3-color-coral" href="<?php echo $button2_text; ?>" title="">
                       <h4><?php echo $button2_text; ?></h4>
                     </a>
                   </div>
                <?php endif; ?>
            </div>
        </header>
      </div>
    </header>
  <?php endif;
?>


<div id="page-full-width" class="homepage" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
      <?php if ( !has_post_thumbnail( $post->ID ) ): ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <h3><?php echo $subtitle; ?></h3>
      <?php endif; ?>
      <div class="entry-content">
          <?php the_content(); ?>
      </div>
  </article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer();
