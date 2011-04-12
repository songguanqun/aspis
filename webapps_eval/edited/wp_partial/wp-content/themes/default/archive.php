<?php require_once('AspisMain.php'); ?><?php
get_header();
;
?>

	<div id="content" class="narrowcolumn" role="main">

		<?php if ( have_posts())
 {;
?>

 	  <?php $post = $posts[0];
;
?>
 	  <?php if ( is_category())
 {;
?>
		<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title();
;
?>&#8217; Category</h2>
 	  <?php }elseif ( is_tag())
 {;
?>
		<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title();
;
?>&#8217;</h2>
 	  <?php }elseif ( is_day())
 {;
?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y');
;
?></h2>
 	  <?php }elseif ( is_month())
 {;
?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y');
;
?></h2>
 	  <?php }elseif ( is_year())
 {;
?>
		<h2 class="pagetitle">Archive for <?php the_time('Y');
;
?></h2>
	  <?php }elseif ( is_author())
 {;
?>
		<h2 class="pagetitle">Author Archive</h2>
 	  <?php }elseif ( (isset($_GET[0]['paged']) && Aspis_isset($_GET[0]['paged'])) && !(empty($_GET[0]['paged']) || Aspis_empty($_GET[0]['paged'])))
 {;
?>
		<h2 class="pagetitle">Blog Archives</h2>
 	  <?php };
?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries');
;
?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;');
;
?></div>
		</div>

		<?php while ( have_posts() )
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
				<small><?php the_time('l, F jS, Y');
;
?></small>

				<div class="entry">
					<?php the_content();
;
?>
				</div>

				<p class="postmetadata"><?php the_tags('Tags: ',', ','<br />');
;
?> Posted in <?php the_category(', ');
;
?> | <?php edit_post_link('Edit','',' | ');
;
?>  <?php comments_popup_link('No Comments &#187;','1 Comment &#187;','% Comments &#187;');
;
?></p>

			</div>

		<?php };
?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries');
;
?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;');
;
?></div>
		</div>
	<?php }else 
{if ( is_category())
 {printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>",single_cat_title('',false));
}else 
{if ( is_date())
 {echo ("<h2>Sorry, but there aren't any posts with this date.</h2>");
}else 
{if ( is_author())
 {$userdata = get_userdatabylogin(get_query_var('author_name'));
printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>",$userdata->display_name);
}else 
{{echo ("<h2 class='center'>No posts found.</h2>");
}}}}get_search_form();
};
?>

	</div>

<?php get_sidebar();
;
?>

<?php get_footer();
;
?>
<?php 