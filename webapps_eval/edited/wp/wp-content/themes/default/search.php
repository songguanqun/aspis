<?php require_once('AspisMain.php'); ?><?php
get_header();
;
?>

	<div id="content" class="narrowcolumn" role="main">

	<?php if ( deAspis(have_posts()))
 {;
?>

		<h2 class="pagetitle">Search Results</h2>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(array('&laquo; Older Entries',false));
;
?></div>
			<div class="alignright"><?php previous_posts_link(array('Newer Entries &raquo;',false));
;
?></div>
		</div>


		<?php while ( deAspis(have_posts()) )
{the_post();
;
?>

			<div <?php post_class();
;
?>>
				<h3 id="post-<?php the_ID();
;
?>"><a href="<?php the_permalink();
;
?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute();
;
?>"><?php the_title();
;
?></a></h3>
				<small><?php the_time(array('l, F jS, Y',false));
;
?></small>

				<p class="postmetadata"><?php the_tags(array('Tags: ',false),array(', ',false),array('<br />',false));
;
?> Posted in <?php the_category(array(', ',false));
;
?> | <?php edit_post_link(array('Edit',false),array('',false),array(' | ',false));
;
?>  <?php comments_popup_link(array('No Comments &#187;',false),array('1 Comment &#187;',false),array('% Comments &#187;',false));
;
?></p>
			</div>

		<?php };
?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(array('&laquo; Older Entries',false));
;
?></div>
			<div class="alignright"><?php previous_posts_link(array('Newer Entries &raquo;',false));
;
?></div>
		</div>

	<?php }else 
{;
?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php get_search_form();
;
?>

	<?php };
?>

	</div>

<?php get_sidebar();
;
?>

<?php get_footer();
;
?>
<?php 