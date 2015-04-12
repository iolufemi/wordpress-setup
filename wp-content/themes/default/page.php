<?php get_header(); ?>

<?php 
	// determine parent of current page
	if ($post->post_parent) {
		$ancestors = get_post_ancestors($post->ID);
		$parent = $ancestors[count($ancestors) - 1];
		$section_title = get_the_title( $post->post_parent );
		$section_parent = false;
	} else {
		$parent = $post->ID;
		$section_title = get_the_title( $post->ID );
		$section_parent = true;
	}

	$children = wp_list_pages("title_li=&child_of=" . $parent . "&echo=0");
?>

  <!--Start of main -->
	<div class="main-container">
  
  	<div class="page-title">
   	  <h2><?php echo $section_title ?></h2>
   	  <span class="border left-top"></span>
   	  <span class="border left-bottom"></span>
   	  <span class="border right-top"></span>
   	  <span class="border right-bottom"></span>
   	</div>

	<div class="sub-page-content">
   	  <div class="sub-page-nav">
		<?php if ($children) { ?>
	      <ul class="subnav"><?php echo $children; ?></ul>
		<?php } ?>
   	  </div>

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    	<div class="content-col">
    	  <?php if (!$section_parent) { ?>
    	  <h1><?php the_title(); ?></h1>
    	  <?php } ?>
    	  <?php the_content(); ?>
            
		<?php endwhile; ?>			
						
		<?php else : ?>
						
			<article id="post-not-found">
		    <header>
		    	<h1>Not Found</h1>
		    </header>
		    <section class="post-content">
		    	<p>Sorry, but the requested resource was not found on this site.</p>
		    </section>
			</article>
						
		<?php endif; ?>
		</div>
		<!-- end of .content-col -->

	  </div>
	  <!-- end of .sub-page-content -->

	</div>
  <!-- end of .main-container -->
							
<?php get_footer(); ?>
