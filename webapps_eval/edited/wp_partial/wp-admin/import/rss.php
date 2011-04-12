<?php require_once('AspisMain.php'); ?><?php
class RSS_Import{var $posts = array();
var $file;
function header (  ) {
{echo '<div class="wrap">';
screen_icon();
echo '<h2>' . __('Import RSS') . '</h2>';
} }
function footer (  ) {
{echo '</div>';
} }
function unhtmlentities ( $string ) {
{$trans_tbl = get_html_translation_table(HTML_ENTITIES);
$trans_tbl = array_flip($trans_tbl);
{$AspisRetTemp = strtr($string,$trans_tbl);
return $AspisRetTemp;
}} }
function greet (  ) {
{echo '<div class="narrow">';
echo '<p>' . __('Howdy! This importer allows you to extract posts from an RSS 2.0 file into your blog. This is useful if you want to import your posts from a system that is not handled by a custom import tool. Pick an RSS file to upload and click Import.') . '</p>';
wp_import_upload_form("admin.php?import=rss&amp;step=1");
echo '</div>';
} }
function _normalize_tag ( $matches ) {
{{$AspisRetTemp = '<' . strtolower($matches[1]);
return $AspisRetTemp;
}} }
function get_posts (  ) {
{{global $wpdb;
$AspisVar0 = &AspisCleanTaintedGlobalUntainted( $wpdb,"\$wpdb",$AspisChangesCache);
}set_magic_quotes_runtime(0);
$datalines = file($this->file);
$importdata = implode('',$datalines);
$importdata = str_replace(array("\r\n","\r"),"\n",$importdata);
preg_match_all('|<item>(.*?)</item>|is',$importdata,$this->posts);
$this->posts = $this->posts[1];
$index = 0;
foreach ( $this->posts as $post  )
{preg_match('|<title>(.*?)</title>|is',$post,$post_title);
$post_title = str_replace(array('<![CDATA[',']]>'),'',AspisReferenceMethodCall($wpdb,"escape",array(AspisPushRefParam(trim($post_title[1]))),array(0)));
preg_match('|<pubdate>(.*?)</pubdate>|is',$post,$post_date_gmt);
if ( $post_date_gmt)
 {$post_date_gmt = strtotime($post_date_gmt[1]);
}else 
{{preg_match('|<dc:date>(.*?)</dc:date>|is',$post,$post_date_gmt);
$post_date_gmt = preg_replace('|([-+])([0-9]+):([0-9]+)$|','\1\2\3',$post_date_gmt[1]);
$post_date_gmt = str_replace('T',' ',$post_date_gmt);
$post_date_gmt = strtotime($post_date_gmt);
}}$post_date_gmt = gmdate('Y-m-d H:i:s',$post_date_gmt);
$post_date = get_date_from_gmt($post_date_gmt);
preg_match_all('|<category>(.*?)</category>|is',$post,$categories);
$categories = $categories[1];
if ( !$categories)
 {preg_match_all('|<dc:subject>(.*?)</dc:subject>|is',$post,$categories);
$categories = $categories[1];
}$cat_index = 0;
foreach ( $categories as $category  )
{$categories[$cat_index] = AspisReferenceMethodCall($wpdb,"escape",array(AspisPushRefParam($this->unhtmlentities($category))),array(0));
$cat_index++;
}preg_match('|<guid.*?>(.*?)</guid>|is',$post,$guid);
if ( $guid)
 $guid = AspisReferenceMethodCall($wpdb,"escape",array(AspisPushRefParam(trim($guid[1]))),array(0));
else 
{$guid = '';
}preg_match('|<content:encoded>(.*?)</content:encoded>|is',$post,$post_content);
$post_content = str_replace(array('<![CDATA[',']]>'),'',AspisReferenceMethodCall($wpdb,"escape",array(AspisPushRefParam(trim($post_content[1]))),array(0)));
if ( !$post_content)
 {preg_match('|<description>(.*?)</description>|is',$post,$post_content);
$post_content = AspisReferenceMethodCall($wpdb,"escape",array(AspisPushRefParam($this->unhtmlentities(trim($post_content[1])))),array(0));
}$post_content = preg_replace_callback('|<(/?[A-Z]+)|',array(&$this,'_normalize_tag'),$post_content);
$post_content = str_replace('<br>','<br />',$post_content);
$post_content = str_replace('<hr>','<hr />',$post_content);
$post_author = 1;
$post_status = 'publish';
$this->posts[$index] = compact('post_author','post_date','post_date_gmt','post_content','post_title','post_status','guid','categories');
$index++;
}}AspisRestoreTaintedGlobalUntainted($AspisVar0,"\$wpdb",$AspisChangesCache);
 }
function import_posts (  ) {
{echo '<ol>';
foreach ( $this->posts as $post  )
{echo "<li>" . __('Importing post...');
extract(($post));
if ( $post_id = post_exists($post_title,$post_content,$post_date))
 {_e('Post already imported');
}else 
{{$post_id = wp_insert_post($post);
if ( is_wp_error($post_id))
 {$AspisRetTemp = $post_id;
return $AspisRetTemp;
}if ( !$post_id)
 {_e('Couldn&#8217;t get post ID');
{return ;
}}if ( 0 != count($categories))
 wp_create_categories($categories,$post_id);
_e('Done !');
}}echo '</li>';
}echo '</ol>';
} }
function import (  ) {
{$file = wp_import_handle_upload();
if ( isset($file['error']))
 {echo $file['error'];
{return ;
}}$this->file = $file['file'];
$this->get_posts();
$result = $this->import_posts();
if ( is_wp_error($result))
 {$AspisRetTemp = $result;
return $AspisRetTemp;
}wp_import_cleanup($file['id']);
do_action('import_done','rss');
echo '<h3>';
printf(__('All done. <a href="%s">Have fun!</a>'),get_option('home'));
echo '</h3>';
} }
function dispatch (  ) {
{if ( (empty($_GET[0]['step']) || Aspis_empty($_GET[0]['step'])))
 $step = 0;
else 
{$step = (int)deAspisWarningRC($_GET[0]['step']);
}$this->header();
switch ( $step ) {
case 0:$this->greet();
break ;
case 1:check_admin_referer('import-upload');
$result = $this->import();
if ( is_wp_error($result))
 echo $result->get_error_message();
break ;
 }
$this->footer();
} }
function RSS_Import (  ) {
{} }
}$rss_import = new RSS_Import();
register_importer('rss',__('RSS'),__('Import posts from an RSS feed.'),array($rss_import,'dispatch'));
;
?>
<?php 