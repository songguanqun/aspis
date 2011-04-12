<?php require_once('AspisMain.php'); ?><?php
define('SIMPLEPIE_NAME','SimplePie');
define('SIMPLEPIE_VERSION','1.2');
define('SIMPLEPIE_BUILD','20090627192103');
define('SIMPLEPIE_URL','http://simplepie.org');
define('SIMPLEPIE_USERAGENT',SIMPLEPIE_NAME . '/' . SIMPLEPIE_VERSION . ' (Feed Parser; ' . SIMPLEPIE_URL . '; Allow like Gecko) Build/' . SIMPLEPIE_BUILD);
define('SIMPLEPIE_LINKBACK','<a href="' . SIMPLEPIE_URL . '" title="' . SIMPLEPIE_NAME . ' ' . SIMPLEPIE_VERSION . '">' . SIMPLEPIE_NAME . '</a>');
define('SIMPLEPIE_LOCATOR_NONE',0);
define('SIMPLEPIE_LOCATOR_AUTODISCOVERY',1);
define('SIMPLEPIE_LOCATOR_LOCAL_EXTENSION',2);
define('SIMPLEPIE_LOCATOR_LOCAL_BODY',4);
define('SIMPLEPIE_LOCATOR_REMOTE_EXTENSION',8);
define('SIMPLEPIE_LOCATOR_REMOTE_BODY',16);
define('SIMPLEPIE_LOCATOR_ALL',31);
define('SIMPLEPIE_TYPE_NONE',0);
define('SIMPLEPIE_TYPE_RSS_090',1);
define('SIMPLEPIE_TYPE_RSS_091_NETSCAPE',2);
define('SIMPLEPIE_TYPE_RSS_091_USERLAND',4);
define('SIMPLEPIE_TYPE_RSS_091',6);
define('SIMPLEPIE_TYPE_RSS_092',8);
define('SIMPLEPIE_TYPE_RSS_093',16);
define('SIMPLEPIE_TYPE_RSS_094',32);
define('SIMPLEPIE_TYPE_RSS_10',64);
define('SIMPLEPIE_TYPE_RSS_20',128);
define('SIMPLEPIE_TYPE_RSS_RDF',65);
define('SIMPLEPIE_TYPE_RSS_SYNDICATION',190);
define('SIMPLEPIE_TYPE_RSS_ALL',255);
define('SIMPLEPIE_TYPE_ATOM_03',256);
define('SIMPLEPIE_TYPE_ATOM_10',512);
define('SIMPLEPIE_TYPE_ATOM_ALL',768);
define('SIMPLEPIE_TYPE_ALL',1023);
define('SIMPLEPIE_CONSTRUCT_NONE',0);
define('SIMPLEPIE_CONSTRUCT_TEXT',1);
define('SIMPLEPIE_CONSTRUCT_HTML',2);
define('SIMPLEPIE_CONSTRUCT_XHTML',4);
define('SIMPLEPIE_CONSTRUCT_BASE64',8);
define('SIMPLEPIE_CONSTRUCT_IRI',16);
define('SIMPLEPIE_CONSTRUCT_MAYBE_HTML',32);
define('SIMPLEPIE_CONSTRUCT_ALL',63);
define('SIMPLEPIE_SAME_CASE',1);
define('SIMPLEPIE_LOWERCASE',2);
define('SIMPLEPIE_UPPERCASE',4);
define('SIMPLEPIE_PCRE_HTML_ATTRIBUTE','((?:[\x09\x0A\x0B\x0C\x0D\x20]+[^\x09\x0A\x0B\x0C\x0D\x20\x2F\x3E][^\x09\x0A\x0B\x0C\x0D\x20\x2F\x3D\x3E]*(?:[\x09\x0A\x0B\x0C\x0D\x20]*=[\x09\x0A\x0B\x0C\x0D\x20]*(?:"(?:[^"]*)"|\'(?:[^\']*)\'|(?:[^\x09\x0A\x0B\x0C\x0D\x20\x22\x27\x3E][^\x09\x0A\x0B\x0C\x0D\x20\x3E]*)?))?)*)[\x09\x0A\x0B\x0C\x0D\x20]*');
define('SIMPLEPIE_PCRE_XML_ATTRIBUTE','((?:\s+(?:(?:[^\s:]+:)?[^\s:]+)\s*=\s*(?:"(?:[^"]*)"|\'(?:[^\']*)\'))*)\s*');
define('SIMPLEPIE_NAMESPACE_XML','http://www.w3.org/XML/1998/namespace');
define('SIMPLEPIE_NAMESPACE_ATOM_10','http://www.w3.org/2005/Atom');
define('SIMPLEPIE_NAMESPACE_ATOM_03','http://purl.org/atom/ns#');
define('SIMPLEPIE_NAMESPACE_RDF','http://www.w3.org/1999/02/22-rdf-syntax-ns#');
define('SIMPLEPIE_NAMESPACE_RSS_090','http://my.netscape.com/rdf/simple/0.9/');
define('SIMPLEPIE_NAMESPACE_RSS_10','http://purl.org/rss/1.0/');
define('SIMPLEPIE_NAMESPACE_RSS_10_MODULES_CONTENT','http://purl.org/rss/1.0/modules/content/');
define('SIMPLEPIE_NAMESPACE_RSS_20','');
define('SIMPLEPIE_NAMESPACE_DC_10','http://purl.org/dc/elements/1.0/');
define('SIMPLEPIE_NAMESPACE_DC_11','http://purl.org/dc/elements/1.1/');
define('SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO','http://www.w3.org/2003/01/geo/wgs84_pos#');
define('SIMPLEPIE_NAMESPACE_GEORSS','http://www.georss.org/georss');
define('SIMPLEPIE_NAMESPACE_MEDIARSS','http://search.yahoo.com/mrss/');
define('SIMPLEPIE_NAMESPACE_MEDIARSS_WRONG','http://search.yahoo.com/mrss');
define('SIMPLEPIE_NAMESPACE_ITUNES','http://www.itunes.com/dtds/podcast-1.0.dtd');
define('SIMPLEPIE_NAMESPACE_XHTML','http://www.w3.org/1999/xhtml');
define('SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY','http://www.iana.org/assignments/relation/');
define('SIMPLEPIE_PHP5',version_compare(PHP_VERSION,'5.0.0','>='));
define('SIMPLEPIE_FILE_SOURCE_NONE',0);
define('SIMPLEPIE_FILE_SOURCE_REMOTE',1);
define('SIMPLEPIE_FILE_SOURCE_LOCAL',2);
define('SIMPLEPIE_FILE_SOURCE_FSOCKOPEN',4);
define('SIMPLEPIE_FILE_SOURCE_CURL',8);
define('SIMPLEPIE_FILE_SOURCE_FILE_GET_CONTENTS',16);
class SimplePie{var $data = array();
var $error;
var $sanitize;
var $useragent = SIMPLEPIE_USERAGENT;
var $feed_url;
var $file;
var $raw_data;
var $timeout = 10;
var $force_fsockopen = false;
var $force_feed = false;
var $xml_dump = false;
var $cache = true;
var $cache_duration = 3600;
var $autodiscovery_cache_duration = 604800;
var $cache_location = './cache';
var $cache_name_function = 'md5';
var $order_by_date = true;
var $input_encoding = false;
var $autodiscovery = SIMPLEPIE_LOCATOR_ALL;
var $cache_class = 'SimplePie_Cache';
var $locator_class = 'SimplePie_Locator';
var $parser_class = 'SimplePie_Parser';
var $file_class = 'SimplePie_File';
var $item_class = 'SimplePie_Item';
var $author_class = 'SimplePie_Author';
var $category_class = 'SimplePie_Category';
var $enclosure_class = 'SimplePie_Enclosure';
var $caption_class = 'SimplePie_Caption';
var $copyright_class = 'SimplePie_Copyright';
var $credit_class = 'SimplePie_Credit';
var $rating_class = 'SimplePie_Rating';
var $restriction_class = 'SimplePie_Restriction';
var $content_type_sniffer_class = 'SimplePie_Content_Type_Sniffer';
var $source_class = 'SimplePie_Source';
var $javascript = 'js';
var $max_checked_feeds = 10;
var $all_discovered_feeds = array();
var $favicon_handler = '';
var $image_handler = '';
var $multifeed_url = array();
var $multifeed_objects = array();
var $config_settings = null;
var $item_limit = 0;
var $strip_attributes = array('bgsound','class','expr','id','style','onclick','onerror','onfinish','onmouseover','onmouseout','onfocus','onblur','lowsrc','dynsrc');
var $strip_htmltags = array('base','blink','body','doctype','embed','font','form','frame','frameset','html','iframe','input','marquee','meta','noscript','object','param','script','style');
function SimplePie ( $feed_url = null,$cache_location = null,$cache_duration = null ) {
{$this->sanitize = &new SimplePie_Sanitize;
if ( $cache_location !== null)
 {$this->set_cache_location($cache_location);
}if ( $cache_duration !== null)
 {$this->set_cache_duration($cache_duration);
}if ( $feed_url !== null)
 {$this->set_feed_url($feed_url);
$this->init();
}} }
function __toString (  ) {
{{$AspisRetTemp = md5(serialize($this->data));
return $AspisRetTemp;
}} }
function __destruct (  ) {
{if ( (version_compare(PHP_VERSION,'5.3','<') || !gc_enabled()) && !ini_get('zend.ze1_compatibility_mode'))
 {if ( !empty($this->data['items']))
 {foreach ( $this->data['items'] as $item  )
{$item->__destruct();
}unset($item,$this->data['items']);
}if ( !empty($this->data['ordered_items']))
 {foreach ( $this->data['ordered_items'] as $item  )
{$item->__destruct();
}unset($item,$this->data['ordered_items']);
}}} }
function force_feed ( $enable = false ) {
{$this->force_feed = (bool)$enable;
} }
function set_feed_url ( $url ) {
{if ( is_array($url))
 {$this->multifeed_url = array();
foreach ( $url as $value  )
{$this->multifeed_url[] = SimplePie_Misc::fix_protocol($value,1);
}}else 
{{$this->feed_url = SimplePie_Misc::fix_protocol($url,1);
}}} }
function set_file ( &$file ) {
{if ( is_a($file,'SimplePie_File'))
 {$this->feed_url = $file->url;
$this->file = &$file;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_raw_data ( $data ) {
{$this->raw_data = $data;
} }
function set_timeout ( $timeout = 10 ) {
{$this->timeout = (int)$timeout;
} }
function force_fsockopen ( $enable = false ) {
{$this->force_fsockopen = (bool)$enable;
} }
function enable_xml_dump ( $enable = false ) {
{$this->xml_dump = (bool)$enable;
} }
function enable_cache ( $enable = true ) {
{$this->cache = (bool)$enable;
} }
function set_cache_duration ( $seconds = 3600 ) {
{$this->cache_duration = (int)$seconds;
} }
function set_autodiscovery_cache_duration ( $seconds = 604800 ) {
{$this->autodiscovery_cache_duration = (int)$seconds;
} }
function set_cache_location ( $location = './cache' ) {
{$this->cache_location = (string)$location;
} }
function enable_order_by_date ( $enable = true ) {
{$this->order_by_date = (bool)$enable;
} }
function set_input_encoding ( $encoding = false ) {
{if ( $encoding)
 {$this->input_encoding = (string)$encoding;
}else 
{{$this->input_encoding = false;
}}} }
function set_autodiscovery_level ( $level = SIMPLEPIE_LOCATOR_ALL ) {
{$this->autodiscovery = (int)$level;
} }
function set_cache_class ( $class = 'SimplePie_Cache' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_Cache'))
 {$this->cache_class = $class;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_locator_class ( $class = 'SimplePie_Locator' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_Locator'))
 {$this->locator_class = $class;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_parser_class ( $class = 'SimplePie_Parser' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_Parser'))
 {$this->parser_class = $class;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_file_class ( $class = 'SimplePie_File' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_File'))
 {$this->file_class = $class;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_sanitize_class ( $class = 'SimplePie_Sanitize' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_Sanitize'))
 {$this->sanitize = &AspisNewUnknownProxy($class,array ,false);
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_item_class ( $class = 'SimplePie_Item' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_Item'))
 {$this->item_class = $class;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_author_class ( $class = 'SimplePie_Author' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_Author'))
 {$this->author_class = $class;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_category_class ( $class = 'SimplePie_Category' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_Category'))
 {$this->category_class = $class;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_enclosure_class ( $class = 'SimplePie_Enclosure' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_Enclosure'))
 {$this->enclosure_class = $class;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_caption_class ( $class = 'SimplePie_Caption' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_Caption'))
 {$this->caption_class = $class;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_copyright_class ( $class = 'SimplePie_Copyright' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_Copyright'))
 {$this->copyright_class = $class;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_credit_class ( $class = 'SimplePie_Credit' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_Credit'))
 {$this->credit_class = $class;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_rating_class ( $class = 'SimplePie_Rating' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_Rating'))
 {$this->rating_class = $class;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_restriction_class ( $class = 'SimplePie_Restriction' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_Restriction'))
 {$this->restriction_class = $class;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_content_type_sniffer_class ( $class = 'SimplePie_Content_Type_Sniffer' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_Content_Type_Sniffer'))
 {$this->content_type_sniffer_class = $class;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_source_class ( $class = 'SimplePie_Source' ) {
{if ( SimplePie_Misc::is_subclass_of($class,'SimplePie_Source'))
 {$this->source_class = $class;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function set_useragent ( $ua = SIMPLEPIE_USERAGENT ) {
{$this->useragent = (string)$ua;
} }
function set_cache_name_function ( $function = 'md5' ) {
{if ( is_callable($function))
 {$this->cache_name_function = $function;
}} }
function set_javascript ( $get = 'js' ) {
{if ( $get)
 {$this->javascript = (string)$get;
}else 
{{$this->javascript = false;
}}} }
function set_stupidly_fast ( $set = false ) {
{if ( $set)
 {$this->enable_order_by_date(false);
$this->remove_div(false);
$this->strip_comments(false);
$this->strip_htmltags(false);
$this->strip_attributes(false);
$this->set_image_handler(false);
}} }
function set_max_checked_feeds ( $max = 10 ) {
{$this->max_checked_feeds = (int)$max;
} }
function remove_div ( $enable = true ) {
{$this->sanitize->remove_div($enable);
} }
function strip_htmltags ( $tags = '',$encode = null ) {
{if ( $tags === '')
 {$tags = $this->strip_htmltags;
}$this->sanitize->strip_htmltags($tags);
if ( $encode !== null)
 {$this->sanitize->encode_instead_of_strip($tags);
}} }
function encode_instead_of_strip ( $enable = true ) {
{$this->sanitize->encode_instead_of_strip($enable);
} }
function strip_attributes ( $attribs = '' ) {
{if ( $attribs === '')
 {$attribs = $this->strip_attributes;
}$this->sanitize->strip_attributes($attribs);
} }
function set_output_encoding ( $encoding = 'UTF-8' ) {
{$this->sanitize->set_output_encoding($encoding);
} }
function strip_comments ( $strip = false ) {
{$this->sanitize->strip_comments($strip);
} }
function set_url_replacements ( $element_attribute = array('a' => 'href','area' => 'href','blockquote' => 'cite','del' => 'cite','form' => 'action','img' => array('longdesc','src'),'input' => 'src','ins' => 'cite','q' => 'cite') ) {
{$this->sanitize->set_url_replacements($element_attribute);
} }
function set_favicon_handler ( $page = false,$qs = 'i' ) {
{if ( $page !== false)
 {$this->favicon_handler = $page . '?' . $qs . '=';
}else 
{{$this->favicon_handler = '';
}}} }
function set_image_handler ( $page = false,$qs = 'i' ) {
{if ( $page !== false)
 {$this->sanitize->set_image_handler($page . '?' . $qs . '=');
}else 
{{$this->image_handler = '';
}}} }
function set_item_limit ( $limit = 0 ) {
{$this->item_limit = (int)$limit;
} }
function init (  ) {
{if ( (function_exists('version_compare') && version_compare(PHP_VERSION,'4.3.0','<')) || !extension_loaded('xml') || !extension_loaded('pcre'))
 {{$AspisRetTemp = false;
return $AspisRetTemp;
}}elseif ( !extension_loaded('xmlreader'))
 {static $xml_is_sane = null;
if ( $xml_is_sane === null)
 {$parser_check = xml_parser_create();
xml_parse_into_struct($parser_check,'<foo>&amp;</foo>',$values);
xml_parser_free($parser_check);
$xml_is_sane = isset($values[0]['value']);
}if ( !$xml_is_sane)
 {{$AspisRetTemp = false;
return $AspisRetTemp;
}}}if ( (isset($_GET[0][$this->javascript]) && Aspis_isset($_GET[0][$this ->javascript ])))
 {SimplePie_Misc::output_javascript();
exit();
}$this->sanitize->pass_cache_data($this->cache,$this->cache_location,$this->cache_name_function,$this->cache_class);
$this->sanitize->pass_file_data($this->file_class,$this->timeout,$this->useragent,$this->force_fsockopen);
if ( $this->feed_url !== null || $this->raw_data !== null)
 {$this->data = array();
$this->multifeed_objects = array();
$cache = false;
if ( $this->feed_url !== null)
 {$parsed_feed_url = SimplePie_Misc::parse_url($this->feed_url);
if ( $this->cache && $parsed_feed_url['scheme'] !== '')
 {$cache = AspisUntainted_call_user_func(array($this->cache_class,'create'),$this->cache_location,AspisUntainted_call_user_func($this->cache_name_function,$this->feed_url),'spc');
}if ( $cache && !$this->xml_dump)
 {$this->data = $cache->load();
if ( !empty($this->data))
 {if ( !isset($this->data['build']) || $this->data['build'] !== SIMPLEPIE_BUILD)
 {$cache->unlink();
$this->data = array();
}elseif ( isset($this->data['url']) && $this->data['url'] !== $this->feed_url)
 {$cache = false;
$this->data = array();
}elseif ( isset($this->data['feed_url']))
 {if ( $cache->mtime() + $this->autodiscovery_cache_duration > time())
 {if ( $this->data['feed_url'] === $this->data['url'])
 {$cache->unlink();
$this->data = array();
}else 
{{$this->set_feed_url($this->data['feed_url']);
{$AspisRetTemp = $this->init();
return $AspisRetTemp;
}}}}}elseif ( $cache->mtime() + $this->cache_duration < time())
 {if ( isset($this->data['headers']['last-modified']) || isset($this->data['headers']['etag']))
 {$headers = array();
if ( isset($this->data['headers']['last-modified']))
 {$headers['if-modified-since'] = $this->data['headers']['last-modified'];
}if ( isset($this->data['headers']['etag']))
 {$headers['if-none-match'] = '"' . $this->data['headers']['etag'] . '"';
}$file = &AspisNewUnknownProxy($this ->file_class,array( $this ->feed_url ,$this ->timeout  / 10,5,$headers,$this ->useragent ,$this ->force_fsockopen ),false);
if ( $file->success)
 {if ( $file->status_code === 304)
 {$cache->touch();
{$AspisRetTemp = true;
return $AspisRetTemp;
}}else 
{{$headers = $file->headers;
}}}else 
{{unset($file);
}}}}else 
{{{$AspisRetTemp = true;
return $AspisRetTemp;
}}}}else 
{{$cache->unlink();
$this->data = array();
}}}if ( !isset($file))
 {if ( is_a($this->file,'SimplePie_File') && $this->file->url === $this->feed_url)
 {$file = &$this->file;
}else 
{{$file = &AspisNewUnknownProxy($this ->file_class,array( $this ->feed_url ,$this ->timeout ,5,null,$this ->useragent ,$this ->force_fsockopen ),false);
}}}if ( !$file->success && !($file->method & SIMPLEPIE_FILE_SOURCE_REMOTE === 0 || ($file->status_code === 200 || $file->status_code > 206 && $file->status_code < 300)))
 {$this->error = $file->error;
if ( !empty($this->data))
 {{$AspisRetTemp = true;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}}if ( !$this->force_feed)
 {$locate = &AspisNewUnknownProxy($this ->locator_class,array( $file,$this ->timeout ,$this ->useragent ,$this ->file_class ,$this ->max_checked_feeds ,$this ->content_type_sniffer_class ),false);
if ( !AspisReferenceMethodCall($locate,"is_feed",array(AspisPushRefParam($file)),array(0)))
 {unset($file);
if ( $file = AspisReferenceMethodCall($locate,"find",array($this->autodiscovery,AspisPushRefParam($this->all_discovered_feeds)),array(1)))
 {if ( $cache)
 {$this->data = array('url' => $this->feed_url,'feed_url' => $file->url,'build' => SIMPLEPIE_BUILD);
if ( !$cache->save($this))
 {trigger_error("$this->cache_location is not writeable",E_USER_WARNING);
}$cache = AspisUntainted_call_user_func(array($this->cache_class,'create'),$this->cache_location,AspisUntainted_call_user_func($this->cache_name_function,$file->url),'spc');
}$this->feed_url = $file->url;
}else 
{{$this->error = "A feed could not be found at $this->feed_url";
SimplePie_Misc::error($this->error,E_USER_NOTICE,__FILE__,__LINE__);
{$AspisRetTemp = false;
return $AspisRetTemp;
}}}}$locate = null;
}$headers = $file->headers;
$data = $file->body;
$sniffer = &AspisNewUnknownProxy($this ->content_type_sniffer_class,array( $file),false);
$sniffed = $sniffer->get_type();
}else 
{{$data = $this->raw_data;
}}$encodings = array();
if ( $this->input_encoding !== false)
 {$encodings[] = $this->input_encoding;
}$application_types = array('application/xml','application/xml-dtd','application/xml-external-parsed-entity');
$text_types = array('text/xml','text/xml-external-parsed-entity');
if ( isset($sniffed))
 {if ( in_array($sniffed,$application_types) || substr($sniffed,0,12) === 'application/' && substr($sniffed,-4) === '+xml')
 {if ( isset($headers['content-type']) && preg_match('/;\x20?charset=([^;]*)/i',$headers['content-type'],$charset))
 {$encodings[] = strtoupper($charset[1]);
}$encodings = array_merge($encodings,SimplePie_Misc::xml_encoding($data));
$encodings[] = 'UTF-8';
}elseif ( in_array($sniffed,$text_types) || substr($sniffed,0,5) === 'text/' && substr($sniffed,-4) === '+xml')
 {if ( isset($headers['content-type']) && preg_match('/;\x20?charset=([^;]*)/i',$headers['content-type'],$charset))
 {$encodings[] = $charset[1];
}$encodings[] = 'US-ASCII';
}elseif ( substr($sniffed,0,5) === 'text/')
 {$encodings[] = 'US-ASCII';
}}$encodings = array_merge($encodings,SimplePie_Misc::xml_encoding($data));
$encodings[] = 'UTF-8';
$encodings[] = 'ISO-8859-1';
$encodings = array_unique($encodings);
if ( $this->xml_dump)
 {header('Content-type: text/xml; charset=' . $encodings[0]);
echo $data;
exit();
}foreach ( $encodings as $encoding  )
{if ( $utf8_data = SimplePie_Misc::change_encoding($data,$encoding,'UTF-8'))
 {$parser = &AspisNewUnknownProxy($this ->parser_class,array( ),false);
if ( $parser->parse($utf8_data,'UTF-8'))
 {$this->data = $parser->get_data();
if ( $this->get_type() & ~SIMPLEPIE_TYPE_NONE)
 {if ( isset($headers))
 {$this->data['headers'] = $headers;
}$this->data['build'] = SIMPLEPIE_BUILD;
if ( $cache && !$cache->save($this))
 {trigger_error("$cache->name is not writeable",E_USER_WARNING);
}{$AspisRetTemp = true;
return $AspisRetTemp;
}}else 
{{$this->error = "A feed could not be found at $this->feed_url";
SimplePie_Misc::error($this->error,E_USER_NOTICE,__FILE__,__LINE__);
{$AspisRetTemp = false;
return $AspisRetTemp;
}}}}}}if ( isset($parser))
 {$this->error = sprintf('XML error: %s at line %d, column %d',$parser->get_error_string(),$parser->get_current_line(),$parser->get_current_column());
}else 
{{$this->error = 'The data could not be converted to UTF-8';
}}SimplePie_Misc::error($this->error,E_USER_NOTICE,__FILE__,__LINE__);
{$AspisRetTemp = false;
return $AspisRetTemp;
}}elseif ( !empty($this->multifeed_url))
 {$i = 0;
$success = 0;
$this->multifeed_objects = array();
foreach ( $this->multifeed_url as $url  )
{if ( SIMPLEPIE_PHP5)
 {$this->multifeed_objects[$i] = clone ($this);
}else 
{{$this->multifeed_objects[$i] = $this;
}}$this->multifeed_objects[$i]->set_feed_url($url);
$success |= $this->multifeed_objects[$i]->init();
$i++;
}{$AspisRetTemp = (bool)$success;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
function error (  ) {
{{$AspisRetTemp = $this->error;
return $AspisRetTemp;
}} }
function get_encoding (  ) {
{{$AspisRetTemp = $this->sanitize->output_encoding;
return $AspisRetTemp;
}} }
function handle_content_type ( $mime = 'text/html' ) {
{if ( !headers_sent())
 {$header = "Content-type: $mime;
";
if ( $this->get_encoding())
 {$header .= ' charset=' . $this->get_encoding();
}else 
{{$header .= ' charset=UTF-8';
}}header($header);
}} }
function get_type (  ) {
{if ( !isset($this->data['type']))
 {$this->data['type'] = SIMPLEPIE_TYPE_ALL;
if ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed']))
 {$this->data['type'] &= SIMPLEPIE_TYPE_ATOM_10;
}elseif ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed']))
 {$this->data['type'] &= SIMPLEPIE_TYPE_ATOM_03;
}elseif ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF']))
 {if ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_10]['channel']) || isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_10]['image']) || isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_10]['item']) || isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_10]['textinput']))
 {$this->data['type'] &= SIMPLEPIE_TYPE_RSS_10;
}if ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_090]['channel']) || isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_090]['image']) || isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_090]['item']) || isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_090]['textinput']))
 {$this->data['type'] &= SIMPLEPIE_TYPE_RSS_090;
}}elseif ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss']))
 {$this->data['type'] &= SIMPLEPIE_TYPE_RSS_ALL;
if ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['attribs']['']['version']))
 {switch ( trim($this->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['attribs']['']['version']) ) {
case '0.91':$this->data['type'] &= SIMPLEPIE_TYPE_RSS_091;
if ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_20]['skiphours']['hour'][0]['data']))
 {switch ( trim($this->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_20]['skiphours']['hour'][0]['data']) ) {
case '0':$this->data['type'] &= SIMPLEPIE_TYPE_RSS_091_NETSCAPE;
break ;
case '24':$this->data['type'] &= SIMPLEPIE_TYPE_RSS_091_USERLAND;
break ;
 }
}break ;
case '0.92':$this->data['type'] &= SIMPLEPIE_TYPE_RSS_092;
break ;
case '0.93':$this->data['type'] &= SIMPLEPIE_TYPE_RSS_093;
break ;
case '0.94':$this->data['type'] &= SIMPLEPIE_TYPE_RSS_094;
break ;
case '2.0':$this->data['type'] &= SIMPLEPIE_TYPE_RSS_20;
break ;
 }
}}else 
{{$this->data['type'] = SIMPLEPIE_TYPE_NONE;
}}}{$AspisRetTemp = $this->data['type'];
return $AspisRetTemp;
}} }
function get_favicon (  ) {
{if ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'icon'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( ($url = $this->get_link()) !== null && preg_match('/^http(s)?:\/\//i',$url))
 {$favicon = SimplePie_Misc::absolutize_url('/favicon.ico',$url);
if ( $this->cache && $this->favicon_handler)
 {$favicon_filename = AspisUntainted_call_user_func($this->cache_name_function,$favicon);
$cache = AspisUntainted_call_user_func(array($this->cache_class,'create'),$this->cache_location,$favicon_filename,'spi');
if ( $cache->load())
 {{$AspisRetTemp = $this->sanitize($this->favicon_handler . $favicon_filename,SIMPLEPIE_CONSTRUCT_IRI);
return $AspisRetTemp;
}}else 
{{$file = &AspisNewUnknownProxy($this ->file_class,array( $favicon,$this ->timeout  / 10,5,array('X-FORWARDED-FOR' => deAspisWarningRC($_SERVER[0]['REMOTE_ADDR']) ),$this ->useragent ,$this ->force_fsockopen ),false);
if ( $file->success && ($file->method & SIMPLEPIE_FILE_SOURCE_REMOTE === 0 || ($file->status_code === 200 || $file->status_code > 206 && $file->status_code < 300)) && strlen($file->body) > 0)
 {$sniffer = &AspisNewUnknownProxy($this ->content_type_sniffer_class,array( $file),false);
if ( substr($sniffer->get_type(),0,6) === 'image/')
 {if ( $cache->save(array('headers' => $file->headers,'body' => $file->body)))
 {{$AspisRetTemp = $this->sanitize($this->favicon_handler . $favicon_filename,SIMPLEPIE_CONSTRUCT_IRI);
return $AspisRetTemp;
}}else 
{{trigger_error("$cache->name is not writeable",E_USER_WARNING);
{$AspisRetTemp = $this->sanitize($favicon,SIMPLEPIE_CONSTRUCT_IRI);
return $AspisRetTemp;
}}}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}}}}}else 
{{{$AspisRetTemp = $this->sanitize($favicon,SIMPLEPIE_CONSTRUCT_IRI);
return $AspisRetTemp;
}}}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function subscribe_url (  ) {
{if ( $this->feed_url !== null)
 {{$AspisRetTemp = $this->sanitize($this->feed_url,SIMPLEPIE_CONSTRUCT_IRI);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function subscribe_feed (  ) {
{if ( $this->feed_url !== null)
 {{$AspisRetTemp = $this->sanitize(SimplePie_Misc::fix_protocol($this->feed_url,2),SIMPLEPIE_CONSTRUCT_IRI);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function subscribe_outlook (  ) {
{if ( $this->feed_url !== null)
 {{$AspisRetTemp = $this->sanitize('outlook' . SimplePie_Misc::fix_protocol($this->feed_url,2),SIMPLEPIE_CONSTRUCT_IRI);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function subscribe_podcast (  ) {
{if ( $this->feed_url !== null)
 {{$AspisRetTemp = $this->sanitize(SimplePie_Misc::fix_protocol($this->feed_url,3),SIMPLEPIE_CONSTRUCT_IRI);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function subscribe_itunes (  ) {
{if ( $this->feed_url !== null)
 {{$AspisRetTemp = $this->sanitize(SimplePie_Misc::fix_protocol($this->feed_url,4),SIMPLEPIE_CONSTRUCT_IRI);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function subscribe_service ( $feed_url,$site_url = null ) {
{if ( $this->subscribe_url())
 {$return = $feed_url . rawurlencode($this->feed_url);
if ( $site_url !== null && $this->get_link() !== null)
 {$return .= $site_url . rawurlencode($this->get_link());
}{$AspisRetTemp = $this->sanitize($return,SIMPLEPIE_CONSTRUCT_IRI);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function subscribe_aol (  ) {
{{$AspisRetTemp = $this->subscribe_service('http://feeds.my.aol.com/add.jsp?url=');
return $AspisRetTemp;
}} }
function subscribe_bloglines (  ) {
{{$AspisRetTemp = $this->subscribe_service('http://www.bloglines.com/sub/');
return $AspisRetTemp;
}} }
function subscribe_eskobo (  ) {
{{$AspisRetTemp = $this->subscribe_service('http://www.eskobo.com/?AddToMyPage=');
return $AspisRetTemp;
}} }
function subscribe_feedfeeds (  ) {
{{$AspisRetTemp = $this->subscribe_service('http://www.feedfeeds.com/add?feed=');
return $AspisRetTemp;
}} }
function subscribe_feedster (  ) {
{{$AspisRetTemp = $this->subscribe_service('http://www.feedster.com/myfeedster.php?action=addrss&confirm=no&rssurl=');
return $AspisRetTemp;
}} }
function subscribe_google (  ) {
{{$AspisRetTemp = $this->subscribe_service('http://fusion.google.com/add?feedurl=');
return $AspisRetTemp;
}} }
function subscribe_gritwire (  ) {
{{$AspisRetTemp = $this->subscribe_service('http://my.gritwire.com/feeds/addExternalFeed.aspx?FeedUrl=');
return $AspisRetTemp;
}} }
function subscribe_msn (  ) {
{{$AspisRetTemp = $this->subscribe_service('http://my.msn.com/addtomymsn.armx?id=rss&ut=','&ru=');
return $AspisRetTemp;
}} }
function subscribe_netvibes (  ) {
{{$AspisRetTemp = $this->subscribe_service('http://www.netvibes.com/subscribe.php?url=');
return $AspisRetTemp;
}} }
function subscribe_newsburst (  ) {
{{$AspisRetTemp = $this->subscribe_service('http://www.newsburst.com/Source/?add=');
return $AspisRetTemp;
}} }
function subscribe_newsgator (  ) {
{{$AspisRetTemp = $this->subscribe_service('http://www.newsgator.com/ngs/subscriber/subext.aspx?url=');
return $AspisRetTemp;
}} }
function subscribe_odeo (  ) {
{{$AspisRetTemp = $this->subscribe_service('http://www.odeo.com/listen/subscribe?feed=');
return $AspisRetTemp;
}} }
function subscribe_podnova (  ) {
{{$AspisRetTemp = $this->subscribe_service('http://www.podnova.com/index_your_podcasts.srf?action=add&url=');
return $AspisRetTemp;
}} }
function subscribe_rojo (  ) {
{{$AspisRetTemp = $this->subscribe_service('http://www.rojo.com/add-subscription?resource=');
return $AspisRetTemp;
}} }
function subscribe_yahoo (  ) {
{{$AspisRetTemp = $this->subscribe_service('http://add.my.yahoo.com/rss?url=');
return $AspisRetTemp;
}} }
function get_feed_tags ( $namespace,$tag ) {
{$type = $this->get_type();
if ( $type & SIMPLEPIE_TYPE_ATOM_10)
 {if ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0]['child'][$namespace][$tag]))
 {{$AspisRetTemp = $this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0]['child'][$namespace][$tag];
return $AspisRetTemp;
}}}if ( $type & SIMPLEPIE_TYPE_ATOM_03)
 {if ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0]['child'][$namespace][$tag]))
 {{$AspisRetTemp = $this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0]['child'][$namespace][$tag];
return $AspisRetTemp;
}}}if ( $type & SIMPLEPIE_TYPE_RSS_RDF)
 {if ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][$namespace][$tag]))
 {{$AspisRetTemp = $this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][$namespace][$tag];
return $AspisRetTemp;
}}}if ( $type & SIMPLEPIE_TYPE_RSS_SYNDICATION)
 {if ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['child'][$namespace][$tag]))
 {{$AspisRetTemp = $this->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['child'][$namespace][$tag];
return $AspisRetTemp;
}}}{$AspisRetTemp = null;
return $AspisRetTemp;
}} }
function get_channel_tags ( $namespace,$tag ) {
{$type = $this->get_type();
if ( $type & SIMPLEPIE_TYPE_ATOM_ALL)
 {if ( $return = $this->get_feed_tags($namespace,$tag))
 {{$AspisRetTemp = $return;
return $AspisRetTemp;
}}}if ( $type & SIMPLEPIE_TYPE_RSS_10)
 {if ( $channel = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_RSS_10,'channel'))
 {if ( isset($channel[0]['child'][$namespace][$tag]))
 {{$AspisRetTemp = $channel[0]['child'][$namespace][$tag];
return $AspisRetTemp;
}}}}if ( $type & SIMPLEPIE_TYPE_RSS_090)
 {if ( $channel = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_RSS_090,'channel'))
 {if ( isset($channel[0]['child'][$namespace][$tag]))
 {{$AspisRetTemp = $channel[0]['child'][$namespace][$tag];
return $AspisRetTemp;
}}}}if ( $type & SIMPLEPIE_TYPE_RSS_SYNDICATION)
 {if ( $channel = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_RSS_20,'channel'))
 {if ( isset($channel[0]['child'][$namespace][$tag]))
 {{$AspisRetTemp = $channel[0]['child'][$namespace][$tag];
return $AspisRetTemp;
}}}}{$AspisRetTemp = null;
return $AspisRetTemp;
}} }
function get_image_tags ( $namespace,$tag ) {
{$type = $this->get_type();
if ( $type & SIMPLEPIE_TYPE_RSS_10)
 {if ( $image = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_RSS_10,'image'))
 {if ( isset($image[0]['child'][$namespace][$tag]))
 {{$AspisRetTemp = $image[0]['child'][$namespace][$tag];
return $AspisRetTemp;
}}}}if ( $type & SIMPLEPIE_TYPE_RSS_090)
 {if ( $image = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_RSS_090,'image'))
 {if ( isset($image[0]['child'][$namespace][$tag]))
 {{$AspisRetTemp = $image[0]['child'][$namespace][$tag];
return $AspisRetTemp;
}}}}if ( $type & SIMPLEPIE_TYPE_RSS_SYNDICATION)
 {if ( $image = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20,'image'))
 {if ( isset($image[0]['child'][$namespace][$tag]))
 {{$AspisRetTemp = $image[0]['child'][$namespace][$tag];
return $AspisRetTemp;
}}}}{$AspisRetTemp = null;
return $AspisRetTemp;
}} }
function get_base ( $element = array() ) {
{if ( !($this->get_type() & SIMPLEPIE_TYPE_RSS_SYNDICATION) && !empty($element['xml_base_explicit']) && isset($element['xml_base']))
 {{$AspisRetTemp = $element['xml_base'];
return $AspisRetTemp;
}}elseif ( $this->get_link() !== null)
 {{$AspisRetTemp = $this->get_link();
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = $this->subscribe_url();
return $AspisRetTemp;
}}}} }
function sanitize ( $data,$type,$base = '' ) {
{{$AspisRetTemp = $this->sanitize->sanitize($data,$type,$base);
return $AspisRetTemp;
}} }
function get_title (  ) {
{if ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_10_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_03_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_10,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_MAYBE_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_090,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_MAYBE_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_MAYBE_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_11,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_10,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_category ( $key = 0 ) {
{$categories = $this->get_categories();
if ( isset($categories[$key]))
 {{$AspisRetTemp = $categories[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_categories (  ) {
{$categories = array();
foreach ( (array)$this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'category') as $category  )
{$term = null;
$scheme = null;
$label = null;
if ( isset($category['attribs']['']['term']))
 {$term = $this->sanitize($category['attribs']['']['term'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($category['attribs']['']['scheme']))
 {$scheme = $this->sanitize($category['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($category['attribs']['']['label']))
 {$label = $this->sanitize($category['attribs']['']['label'],SIMPLEPIE_CONSTRUCT_TEXT);
}$categories[] = &AspisNewUnknownProxy($this ->category_class,array( $term,$scheme,$label),false);
}foreach ( (array)$this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20,'category') as $category  )
{$term = $this->sanitize($category['data'],SIMPLEPIE_CONSTRUCT_TEXT);
if ( isset($category['attribs']['']['domain']))
 {$scheme = $this->sanitize($category['attribs']['']['domain'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$scheme = null;
}}$categories[] = &AspisNewUnknownProxy($this ->category_class,array( $term,$scheme,null),false);
}foreach ( (array)$this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_11,'subject') as $category  )
{$categories[] = &AspisNewUnknownProxy($this ->category_class,array( $this ->sanitize( $category['data'],SIMPLEPIE_CONSTRUCT_TEXT),null,null),false);
}foreach ( (array)$this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_10,'subject') as $category  )
{$categories[] = &AspisNewUnknownProxy($this ->category_class,array( $this ->sanitize( $category['data'],SIMPLEPIE_CONSTRUCT_TEXT),null,null),false);
}if ( !empty($categories))
 {{$AspisRetTemp = SimplePie_Misc::array_unique($categories);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_author ( $key = 0 ) {
{$authors = $this->get_authors();
if ( isset($authors[$key]))
 {{$AspisRetTemp = $authors[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_authors (  ) {
{$authors = array();
foreach ( (array)$this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'author') as $author  )
{$name = null;
$uri = null;
$email = null;
if ( isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data']))
 {$name = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data']))
 {$uri = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]));
}if ( isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data']))
 {$email = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( $name !== null || $email !== null || $uri !== null)
 {$authors[] = &AspisNewUnknownProxy($this ->author_class,array( $name,$uri,$email),false);
}}if ( $author = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'author'))
 {$name = null;
$url = null;
$email = null;
if ( isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data']))
 {$name = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data']))
 {$url = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]));
}if ( isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data']))
 {$email = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( $name !== null || $email !== null || $url !== null)
 {$authors[] = &AspisNewUnknownProxy($this ->author_class,array( $name,$url,$email),false);
}}foreach ( (array)$this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_11,'creator') as $author  )
{$authors[] = &AspisNewUnknownProxy($this ->author_class,array( $this ->sanitize( $author['data'],SIMPLEPIE_CONSTRUCT_TEXT),null,null),false);
}foreach ( (array)$this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_10,'creator') as $author  )
{$authors[] = &AspisNewUnknownProxy($this ->author_class,array( $this ->sanitize( $author['data'],SIMPLEPIE_CONSTRUCT_TEXT),null,null),false);
}foreach ( (array)$this->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES,'author') as $author  )
{$authors[] = &AspisNewUnknownProxy($this ->author_class,array( $this ->sanitize( $author['data'],SIMPLEPIE_CONSTRUCT_TEXT),null,null),false);
}if ( !empty($authors))
 {{$AspisRetTemp = SimplePie_Misc::array_unique($authors);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_contributor ( $key = 0 ) {
{$contributors = $this->get_contributors();
if ( isset($contributors[$key]))
 {{$AspisRetTemp = $contributors[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_contributors (  ) {
{$contributors = array();
foreach ( (array)$this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'contributor') as $contributor  )
{$name = null;
$uri = null;
$email = null;
if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data']))
 {$name = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data']))
 {$uri = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]));
}if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data']))
 {$email = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( $name !== null || $email !== null || $uri !== null)
 {$contributors[] = &AspisNewUnknownProxy($this ->author_class,array( $name,$uri,$email),false);
}}foreach ( (array)$this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'contributor') as $contributor  )
{$name = null;
$url = null;
$email = null;
if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data']))
 {$name = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data']))
 {$url = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]));
}if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data']))
 {$email = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( $name !== null || $email !== null || $url !== null)
 {$contributors[] = &AspisNewUnknownProxy($this ->author_class,array( $name,$url,$email),false);
}}if ( !empty($contributors))
 {{$AspisRetTemp = SimplePie_Misc::array_unique($contributors);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_link ( $key = 0,$rel = 'alternate' ) {
{$links = $this->get_links($rel);
if ( isset($links[$key]))
 {{$AspisRetTemp = $links[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_permalink (  ) {
{{$AspisRetTemp = $this->get_link(0);
return $AspisRetTemp;
}} }
function get_links ( $rel = 'alternate' ) {
{if ( !isset($this->data['links']))
 {$this->data['links'] = array();
if ( $links = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'link'))
 {foreach ( $links as $link  )
{if ( isset($link['attribs']['']['href']))
 {$link_rel = (isset($link['attribs']['']['rel'])) ? $link['attribs']['']['rel'] : 'alternate';
$this->data['links'][$link_rel][] = $this->sanitize($link['attribs']['']['href'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($link));
}}}if ( $links = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'link'))
 {foreach ( $links as $link  )
{if ( isset($link['attribs']['']['href']))
 {$link_rel = (isset($link['attribs']['']['rel'])) ? $link['attribs']['']['rel'] : 'alternate';
$this->data['links'][$link_rel][] = $this->sanitize($link['attribs']['']['href'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($link));
}}}if ( $links = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_10,'link'))
 {$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($links[0]));
}if ( $links = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_090,'link'))
 {$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($links[0]));
}if ( $links = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20,'link'))
 {$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($links[0]));
}$keys = array_keys($this->data['links']);
foreach ( $keys as $key  )
{if ( SimplePie_Misc::is_isegment_nz_nc($key))
 {if ( isset($this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key]))
 {$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key] = array_merge($this->data['links'][$key],$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key]);
$this->data['links'][$key] = &$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key];
}else 
{{$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key] = &$this->data['links'][$key];
}}}elseif ( substr($key,0,41) === SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY)
 {$this->data['links'][substr($key,41)] = &$this->data['links'][$key];
}$this->data['links'][$key] = array_unique($this->data['links'][$key]);
}}if ( isset($this->data['links'][$rel]))
 {{$AspisRetTemp = $this->data['links'][$rel];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_all_discovered_feeds (  ) {
{{$AspisRetTemp = $this->all_discovered_feeds;
return $AspisRetTemp;
}} }
function get_description (  ) {
{if ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'subtitle'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_10_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'tagline'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_03_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_10,'description'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_MAYBE_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_090,'description'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_MAYBE_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20,'description'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_11,'description'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_10,'description'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES,'summary'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES,'subtitle'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_copyright (  ) {
{if ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'rights'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_10_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'copyright'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_03_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20,'copyright'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_11,'rights'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_10,'rights'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_language (  ) {
{if ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20,'language'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_11,'language'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_10,'language'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0]['xml_lang']))
 {{$AspisRetTemp = $this->sanitize($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0]['xml_lang'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0]['xml_lang']))
 {{$AspisRetTemp = $this->sanitize($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0]['xml_lang'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['xml_lang']))
 {{$AspisRetTemp = $this->sanitize($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['xml_lang'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( isset($this->data['headers']['content-language']))
 {{$AspisRetTemp = $this->sanitize($this->data['headers']['content-language'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_latitude (  ) {
{if ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO,'lat'))
 {{$AspisRetTemp = (double)$return[0]['data'];
return $AspisRetTemp;
}}elseif ( ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_GEORSS,'point')) && preg_match('/^((?:-)?[0-9]+(?:\.[0-9]+)) ((?:-)?[0-9]+(?:\.[0-9]+))$/',$return[0]['data'],$match))
 {{$AspisRetTemp = (double)$match[1];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_longitude (  ) {
{if ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO,'long'))
 {{$AspisRetTemp = (double)$return[0]['data'];
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO,'lon'))
 {{$AspisRetTemp = (double)$return[0]['data'];
return $AspisRetTemp;
}}elseif ( ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_GEORSS,'point')) && preg_match('/^((?:-)?[0-9]+(?:\.[0-9]+)) ((?:-)?[0-9]+(?:\.[0-9]+))$/',$return[0]['data'],$match))
 {{$AspisRetTemp = (double)$match[2];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_image_title (  ) {
{if ( $return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_10,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_090,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_20,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_DC_11,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_DC_10,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_image_url (  ) {
{if ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES,'image'))
 {{$AspisRetTemp = $this->sanitize($return[0]['attribs']['']['href'],SIMPLEPIE_CONSTRUCT_IRI);
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'logo'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'icon'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_10,'url'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_090,'url'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_20,'url'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($return[0]));
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_image_link (  ) {
{if ( $return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_10,'link'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_090,'link'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_20,'link'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($return[0]));
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_image_width (  ) {
{if ( $return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_20,'width'))
 {{$AspisRetTemp = round($return[0]['data']);
return $AspisRetTemp;
}}elseif ( $this->get_type() & SIMPLEPIE_TYPE_RSS_SYNDICATION && $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_20,'url'))
 {{$AspisRetTemp = 88.0;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_image_height (  ) {
{if ( $return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_20,'height'))
 {{$AspisRetTemp = round($return[0]['data']);
return $AspisRetTemp;
}}elseif ( $this->get_type() & SIMPLEPIE_TYPE_RSS_SYNDICATION && $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_20,'url'))
 {{$AspisRetTemp = 31.0;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_item_quantity ( $max = 0 ) {
{$max = (int)$max;
$qty = count($this->get_items());
if ( $max === 0)
 {{$AspisRetTemp = $qty;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = ($qty > $max) ? $max : $qty;
return $AspisRetTemp;
}}}} }
function get_item ( $key = 0 ) {
{$items = $this->get_items();
if ( isset($items[$key]))
 {{$AspisRetTemp = $items[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_items ( $start = 0,$end = 0 ) {
{if ( !isset($this->data['items']))
 {if ( !empty($this->multifeed_objects))
 {$this->data['items'] = SimplePie::merge_items($this->multifeed_objects,$start,$end,$this->item_limit);
}else 
{{$this->data['items'] = array();
if ( $items = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'entry'))
 {$keys = array_keys($items);
foreach ( $keys as $key  )
{$this->data['items'][] = &AspisNewUnknownProxy($this ->item_class,array( $this,$items[$key]),false);
}}if ( $items = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'entry'))
 {$keys = array_keys($items);
foreach ( $keys as $key  )
{$this->data['items'][] = &AspisNewUnknownProxy($this ->item_class,array( $this,$items[$key]),false);
}}if ( $items = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_RSS_10,'item'))
 {$keys = array_keys($items);
foreach ( $keys as $key  )
{$this->data['items'][] = &AspisNewUnknownProxy($this ->item_class,array( $this,$items[$key]),false);
}}if ( $items = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_RSS_090,'item'))
 {$keys = array_keys($items);
foreach ( $keys as $key  )
{$this->data['items'][] = &AspisNewUnknownProxy($this ->item_class,array( $this,$items[$key]),false);
}}if ( $items = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20,'item'))
 {$keys = array_keys($items);
foreach ( $keys as $key  )
{$this->data['items'][] = &AspisNewUnknownProxy($this ->item_class,array( $this,$items[$key]),false);
}}}}}if ( !empty($this->data['items']))
 {if ( $this->order_by_date && empty($this->multifeed_objects))
 {if ( !isset($this->data['ordered_items']))
 {$do_sort = true;
foreach ( $this->data['items'] as $item  )
{if ( !$item->get_date('U'))
 {$do_sort = false;
break ;
}}$item = null;
$this->data['ordered_items'] = $this->data['items'];
if ( $do_sort)
 {AspisUntainted_usort($this->data['ordered_items'],array(&$this,'sort_items'));
}}$items = $this->data['ordered_items'];
}else 
{{$items = $this->data['items'];
}}if ( $end === 0)
 {{$AspisRetTemp = array_slice($items,$start);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = array_slice($items,$start,$end);
return $AspisRetTemp;
}}}}else 
{{{$AspisRetTemp = array();
return $AspisRetTemp;
}}}} }
function sort_items ( $a,$b ) {
{{$AspisRetTemp = $a->get_date('U') <= $b->get_date('U');
return $AspisRetTemp;
}} }
function merge_items ( $urls,$start = 0,$end = 0,$limit = 0 ) {
{if ( is_array($urls) && sizeof($urls) > 0)
 {$items = array();
foreach ( $urls as $arg  )
{if ( is_a($arg,'SimplePie'))
 {$items = array_merge($items,$arg->get_items(0,$limit));
}else 
{{trigger_error('Arguments must be SimplePie objects',E_USER_WARNING);
}}}$do_sort = true;
foreach ( $items as $item  )
{if ( !$item->get_date('U'))
 {$do_sort = false;
break ;
}}$item = null;
if ( $do_sort)
 {AspisUntainted_usort($items,array('SimplePie','sort_items'));
}if ( $end === 0)
 {{$AspisRetTemp = array_slice($items,$start);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = array_slice($items,$start,$end);
return $AspisRetTemp;
}}}}else 
{{trigger_error('Cannot merge zero SimplePie objects',E_USER_WARNING);
{$AspisRetTemp = array();
return $AspisRetTemp;
}}}} }
}class SimplePie_Item{var $feed;
var $data = array();
function SimplePie_Item ( $feed,$data ) {
{$this->feed = $feed;
$this->data = $data;
} }
function __toString (  ) {
{{$AspisRetTemp = md5(serialize($this->data));
return $AspisRetTemp;
}} }
function __destruct (  ) {
{if ( (version_compare(PHP_VERSION,'5.3','<') || !gc_enabled()) && !ini_get('zend.ze1_compatibility_mode'))
 {unset($this->feed);
}} }
function get_item_tags ( $namespace,$tag ) {
{if ( isset($this->data['child'][$namespace][$tag]))
 {{$AspisRetTemp = $this->data['child'][$namespace][$tag];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_base ( $element = array() ) {
{{$AspisRetTemp = $this->feed->get_base($element);
return $AspisRetTemp;
}} }
function sanitize ( $data,$type,$base = '' ) {
{{$AspisRetTemp = $this->feed->sanitize($data,$type,$base);
return $AspisRetTemp;
}} }
function get_feed (  ) {
{{$AspisRetTemp = $this->feed;
return $AspisRetTemp;
}} }
function get_id ( $hash = false ) {
{if ( !$hash)
 {if ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'id'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'id'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20,'guid'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_11,'identifier'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_10,'identifier'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( ($return = $this->get_permalink()) !== null)
 {{$AspisRetTemp = $return;
return $AspisRetTemp;
}}elseif ( ($return = $this->get_title()) !== null)
 {{$AspisRetTemp = $return;
return $AspisRetTemp;
}}}if ( $this->get_permalink() !== null || $this->get_title() !== null)
 {{$AspisRetTemp = md5($this->get_permalink() . $this->get_title());
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = md5(serialize($this->data));
return $AspisRetTemp;
}}}} }
function get_title (  ) {
{if ( !isset($this->data['title']))
 {if ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'title'))
 {$this->data['title'] = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_10_construct_type($return[0]['attribs']),$this->get_base($return[0]));
}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'title'))
 {$this->data['title'] = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_03_construct_type($return[0]['attribs']),$this->get_base($return[0]));
}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_10,'title'))
 {$this->data['title'] = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_MAYBE_HTML,$this->get_base($return[0]));
}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_090,'title'))
 {$this->data['title'] = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_MAYBE_HTML,$this->get_base($return[0]));
}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20,'title'))
 {$this->data['title'] = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_MAYBE_HTML,$this->get_base($return[0]));
}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_11,'title'))
 {$this->data['title'] = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_10,'title'))
 {$this->data['title'] = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$this->data['title'] = null;
}}}{$AspisRetTemp = $this->data['title'];
return $AspisRetTemp;
}} }
function get_description ( $description_only = false ) {
{if ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'summary'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_10_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'summary'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_03_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_10,'description'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_MAYBE_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20,'description'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_11,'description'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_10,'description'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES,'summary'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES,'subtitle'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( !$description_only)
 {{$AspisRetTemp = $this->get_content(true);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_content ( $content_only = false ) {
{if ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'content'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_10_content_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'content'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_03_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_10_MODULES_CONTENT,'encoded'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( !$content_only)
 {{$AspisRetTemp = $this->get_description(true);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_category ( $key = 0 ) {
{$categories = $this->get_categories();
if ( isset($categories[$key]))
 {{$AspisRetTemp = $categories[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_categories (  ) {
{$categories = array();
foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'category') as $category  )
{$term = null;
$scheme = null;
$label = null;
if ( isset($category['attribs']['']['term']))
 {$term = $this->sanitize($category['attribs']['']['term'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($category['attribs']['']['scheme']))
 {$scheme = $this->sanitize($category['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($category['attribs']['']['label']))
 {$label = $this->sanitize($category['attribs']['']['label'],SIMPLEPIE_CONSTRUCT_TEXT);
}$categories[] = &AspisNewUnknownProxy($this ->feed->category_class,array( $term,$scheme,$label),false);
}foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20,'category') as $category  )
{$term = $this->sanitize($category['data'],SIMPLEPIE_CONSTRUCT_TEXT);
if ( isset($category['attribs']['']['domain']))
 {$scheme = $this->sanitize($category['attribs']['']['domain'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$scheme = null;
}}$categories[] = &AspisNewUnknownProxy($this ->feed->category_class,array( $term,$scheme,null),false);
}foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_11,'subject') as $category  )
{$categories[] = &AspisNewUnknownProxy($this ->feed->category_class,array( $this ->sanitize( $category['data'],SIMPLEPIE_CONSTRUCT_TEXT),null,null),false);
}foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_10,'subject') as $category  )
{$categories[] = &AspisNewUnknownProxy($this ->feed->category_class,array( $this ->sanitize( $category['data'],SIMPLEPIE_CONSTRUCT_TEXT),null,null),false);
}if ( !empty($categories))
 {{$AspisRetTemp = SimplePie_Misc::array_unique($categories);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_author ( $key = 0 ) {
{$authors = $this->get_authors();
if ( isset($authors[$key]))
 {{$AspisRetTemp = $authors[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_contributor ( $key = 0 ) {
{$contributors = $this->get_contributors();
if ( isset($contributors[$key]))
 {{$AspisRetTemp = $contributors[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_contributors (  ) {
{$contributors = array();
foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'contributor') as $contributor  )
{$name = null;
$uri = null;
$email = null;
if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data']))
 {$name = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data']))
 {$uri = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]));
}if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data']))
 {$email = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( $name !== null || $email !== null || $uri !== null)
 {$contributors[] = &AspisNewUnknownProxy($this ->feed->author_class,array( $name,$uri,$email),false);
}}foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'contributor') as $contributor  )
{$name = null;
$url = null;
$email = null;
if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data']))
 {$name = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data']))
 {$url = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]));
}if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data']))
 {$email = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( $name !== null || $email !== null || $url !== null)
 {$contributors[] = &AspisNewUnknownProxy($this ->feed->author_class,array( $name,$url,$email),false);
}}if ( !empty($contributors))
 {{$AspisRetTemp = SimplePie_Misc::array_unique($contributors);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_authors (  ) {
{$authors = array();
foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'author') as $author  )
{$name = null;
$uri = null;
$email = null;
if ( isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data']))
 {$name = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data']))
 {$uri = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]));
}if ( isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data']))
 {$email = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( $name !== null || $email !== null || $uri !== null)
 {$authors[] = &AspisNewUnknownProxy($this ->feed->author_class,array( $name,$uri,$email),false);
}}if ( $author = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'author'))
 {$name = null;
$url = null;
$email = null;
if ( isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data']))
 {$name = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data']))
 {$url = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]));
}if ( isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data']))
 {$email = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( $name !== null || $email !== null || $url !== null)
 {$authors[] = &AspisNewUnknownProxy($this ->feed->author_class,array( $name,$url,$email),false);
}}if ( $author = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20,'author'))
 {$authors[] = &AspisNewUnknownProxy($this ->feed->author_class,array( null,null,$this ->sanitize( $author[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT)),false);
}foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_11,'creator') as $author  )
{$authors[] = &AspisNewUnknownProxy($this ->feed->author_class,array( $this ->sanitize( $author['data'],SIMPLEPIE_CONSTRUCT_TEXT),null,null),false);
}foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_10,'creator') as $author  )
{$authors[] = &AspisNewUnknownProxy($this ->feed->author_class,array( $this ->sanitize( $author['data'],SIMPLEPIE_CONSTRUCT_TEXT),null,null),false);
}foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES,'author') as $author  )
{$authors[] = &AspisNewUnknownProxy($this ->feed->author_class,array( $this ->sanitize( $author['data'],SIMPLEPIE_CONSTRUCT_TEXT),null,null),false);
}if ( !empty($authors))
 {{$AspisRetTemp = SimplePie_Misc::array_unique($authors);
return $AspisRetTemp;
}}elseif ( ($source = $this->get_source()) && ($authors = $source->get_authors()))
 {{$AspisRetTemp = $authors;
return $AspisRetTemp;
}}elseif ( $authors = $this->feed->get_authors())
 {{$AspisRetTemp = $authors;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_copyright (  ) {
{if ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'rights'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_10_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_11,'rights'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_10,'rights'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_date ( $date_format = 'j F Y, g:i a' ) {
{if ( !isset($this->data['date']))
 {if ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'published'))
 {$this->data['date']['raw'] = $return[0]['data'];
}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'updated'))
 {$this->data['date']['raw'] = $return[0]['data'];
}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'issued'))
 {$this->data['date']['raw'] = $return[0]['data'];
}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'created'))
 {$this->data['date']['raw'] = $return[0]['data'];
}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'modified'))
 {$this->data['date']['raw'] = $return[0]['data'];
}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20,'pubDate'))
 {$this->data['date']['raw'] = $return[0]['data'];
}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_11,'date'))
 {$this->data['date']['raw'] = $return[0]['data'];
}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_10,'date'))
 {$this->data['date']['raw'] = $return[0]['data'];
}if ( !empty($this->data['date']['raw']))
 {$parser = SimplePie_Parse_Date::get();
$this->data['date']['parsed'] = $parser->parse($this->data['date']['raw']);
}else 
{{$this->data['date'] = null;
}}}if ( $this->data['date'])
 {$date_format = (string)$date_format;
switch ( $date_format ) {
case '':{$AspisRetTemp = $this->sanitize($this->data['date']['raw'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}case 'U':{$AspisRetTemp = $this->data['date']['parsed'];
return $AspisRetTemp;
}default :{$AspisRetTemp = date($date_format,$this->data['date']['parsed']);
return $AspisRetTemp;
} }
}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_local_date ( $date_format = '%c' ) {
{if ( !$date_format)
 {{$AspisRetTemp = $this->sanitize($this->get_date(''),SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( ($date = $this->get_date('U')) !== null)
 {{$AspisRetTemp = strftime($date_format,$date);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_permalink (  ) {
{$link = $this->get_link();
$enclosure = $this->get_enclosure(0);
if ( $link !== null)
 {{$AspisRetTemp = $link;
return $AspisRetTemp;
}}elseif ( $enclosure !== null)
 {{$AspisRetTemp = $enclosure->get_link();
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_link ( $key = 0,$rel = 'alternate' ) {
{$links = $this->get_links($rel);
if ( $links[$key] !== null)
 {{$AspisRetTemp = $links[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_links ( $rel = 'alternate' ) {
{if ( !isset($this->data['links']))
 {$this->data['links'] = array();
foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'link') as $link  )
{if ( isset($link['attribs']['']['href']))
 {$link_rel = (isset($link['attribs']['']['rel'])) ? $link['attribs']['']['rel'] : 'alternate';
$this->data['links'][$link_rel][] = $this->sanitize($link['attribs']['']['href'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($link));
}}foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'link') as $link  )
{if ( isset($link['attribs']['']['href']))
 {$link_rel = (isset($link['attribs']['']['rel'])) ? $link['attribs']['']['rel'] : 'alternate';
$this->data['links'][$link_rel][] = $this->sanitize($link['attribs']['']['href'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($link));
}}if ( $links = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_10,'link'))
 {$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($links[0]));
}if ( $links = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_090,'link'))
 {$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($links[0]));
}if ( $links = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20,'link'))
 {$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($links[0]));
}if ( $links = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20,'guid'))
 {if ( !isset($links[0]['attribs']['']['isPermaLink']) || strtolower(trim($links[0]['attribs']['']['isPermaLink'])) === 'true')
 {$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($links[0]));
}}$keys = array_keys($this->data['links']);
foreach ( $keys as $key  )
{if ( SimplePie_Misc::is_isegment_nz_nc($key))
 {if ( isset($this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key]))
 {$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key] = array_merge($this->data['links'][$key],$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key]);
$this->data['links'][$key] = &$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key];
}else 
{{$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key] = &$this->data['links'][$key];
}}}elseif ( substr($key,0,41) === SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY)
 {$this->data['links'][substr($key,41)] = &$this->data['links'][$key];
}$this->data['links'][$key] = array_unique($this->data['links'][$key]);
}}if ( isset($this->data['links'][$rel]))
 {{$AspisRetTemp = $this->data['links'][$rel];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_enclosure ( $key = 0,$prefer = null ) {
{$enclosures = $this->get_enclosures();
if ( isset($enclosures[$key]))
 {{$AspisRetTemp = $enclosures[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_enclosures (  ) {
{if ( !isset($this->data['enclosures']))
 {$this->data['enclosures'] = array();
$captions_parent = null;
$categories_parent = null;
$copyrights_parent = null;
$credits_parent = null;
$description_parent = null;
$duration_parent = null;
$hashes_parent = null;
$keywords_parent = null;
$player_parent = null;
$ratings_parent = null;
$restrictions_parent = null;
$thumbnails_parent = null;
$title_parent = null;
$parent = $this->get_feed();
if ( $captions = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'text'))
 {foreach ( $captions as $caption  )
{$caption_type = null;
$caption_lang = null;
$caption_startTime = null;
$caption_endTime = null;
$caption_text = null;
if ( isset($caption['attribs']['']['type']))
 {$caption_type = $this->sanitize($caption['attribs']['']['type'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['attribs']['']['lang']))
 {$caption_lang = $this->sanitize($caption['attribs']['']['lang'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['attribs']['']['start']))
 {$caption_startTime = $this->sanitize($caption['attribs']['']['start'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['attribs']['']['end']))
 {$caption_endTime = $this->sanitize($caption['attribs']['']['end'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['data']))
 {$caption_text = $this->sanitize($caption['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$captions_parent[] = &AspisNewUnknownProxy($this ->feed->caption_class,array( $caption_type,$caption_lang,$caption_startTime,$caption_endTime,$caption_text),false);
}}elseif ( $captions = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'text'))
 {foreach ( $captions as $caption  )
{$caption_type = null;
$caption_lang = null;
$caption_startTime = null;
$caption_endTime = null;
$caption_text = null;
if ( isset($caption['attribs']['']['type']))
 {$caption_type = $this->sanitize($caption['attribs']['']['type'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['attribs']['']['lang']))
 {$caption_lang = $this->sanitize($caption['attribs']['']['lang'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['attribs']['']['start']))
 {$caption_startTime = $this->sanitize($caption['attribs']['']['start'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['attribs']['']['end']))
 {$caption_endTime = $this->sanitize($caption['attribs']['']['end'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['data']))
 {$caption_text = $this->sanitize($caption['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$captions_parent[] = &AspisNewUnknownProxy($this ->feed->caption_class,array( $caption_type,$caption_lang,$caption_startTime,$caption_endTime,$caption_text),false);
}}if ( is_array($captions_parent))
 {$captions_parent = array_values(SimplePie_Misc::array_unique($captions_parent));
}foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'category') as $category  )
{$term = null;
$scheme = null;
$label = null;
if ( isset($category['data']))
 {$term = $this->sanitize($category['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($category['attribs']['']['scheme']))
 {$scheme = $this->sanitize($category['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$scheme = 'http://search.yahoo.com/mrss/category_schema';
}}if ( isset($category['attribs']['']['label']))
 {$label = $this->sanitize($category['attribs']['']['label'],SIMPLEPIE_CONSTRUCT_TEXT);
}$categories_parent[] = &AspisNewUnknownProxy($this ->feed->category_class,array( $term,$scheme,$label),false);
}foreach ( (array)$parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'category') as $category  )
{$term = null;
$scheme = null;
$label = null;
if ( isset($category['data']))
 {$term = $this->sanitize($category['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($category['attribs']['']['scheme']))
 {$scheme = $this->sanitize($category['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$scheme = 'http://search.yahoo.com/mrss/category_schema';
}}if ( isset($category['attribs']['']['label']))
 {$label = $this->sanitize($category['attribs']['']['label'],SIMPLEPIE_CONSTRUCT_TEXT);
}$categories_parent[] = &AspisNewUnknownProxy($this ->feed->category_class,array( $term,$scheme,$label),false);
}foreach ( (array)$parent->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES,'category') as $category  )
{$term = null;
$scheme = 'http://www.itunes.com/dtds/podcast-1.0.dtd';
$label = null;
if ( isset($category['attribs']['']['text']))
 {$label = $this->sanitize($category['attribs']['']['text'],SIMPLEPIE_CONSTRUCT_TEXT);
}$categories_parent[] = &AspisNewUnknownProxy($this ->feed->category_class,array( $term,$scheme,$label),false);
if ( isset($category['child'][SIMPLEPIE_NAMESPACE_ITUNES]['category']))
 {foreach ( (array)$category['child'][SIMPLEPIE_NAMESPACE_ITUNES]['category'] as $subcategory  )
{if ( isset($subcategory['attribs']['']['text']))
 {$label = $this->sanitize($subcategory['attribs']['']['text'],SIMPLEPIE_CONSTRUCT_TEXT);
}$categories_parent[] = &AspisNewUnknownProxy($this ->feed->category_class,array( $term,$scheme,$label),false);
}}}if ( is_array($categories_parent))
 {$categories_parent = array_values(SimplePie_Misc::array_unique($categories_parent));
}if ( $copyright = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'copyright'))
 {$copyright_url = null;
$copyright_label = null;
if ( isset($copyright[0]['attribs']['']['url']))
 {$copyright_url = $this->sanitize($copyright[0]['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($copyright[0]['data']))
 {$copyright_label = $this->sanitize($copyright[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$copyrights_parent = &AspisNewUnknownProxy($this ->feed->copyright_class,array( $copyright_url,$copyright_label),false);
}elseif ( $copyright = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'copyright'))
 {$copyright_url = null;
$copyright_label = null;
if ( isset($copyright[0]['attribs']['']['url']))
 {$copyright_url = $this->sanitize($copyright[0]['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($copyright[0]['data']))
 {$copyright_label = $this->sanitize($copyright[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$copyrights_parent = &AspisNewUnknownProxy($this ->feed->copyright_class,array( $copyright_url,$copyright_label),false);
}if ( $credits = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'credit'))
 {foreach ( $credits as $credit  )
{$credit_role = null;
$credit_scheme = null;
$credit_name = null;
if ( isset($credit['attribs']['']['role']))
 {$credit_role = $this->sanitize($credit['attribs']['']['role'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($credit['attribs']['']['scheme']))
 {$credit_scheme = $this->sanitize($credit['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$credit_scheme = 'urn:ebu';
}}if ( isset($credit['data']))
 {$credit_name = $this->sanitize($credit['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$credits_parent[] = &AspisNewUnknownProxy($this ->feed->credit_class,array( $credit_role,$credit_scheme,$credit_name),false);
}}elseif ( $credits = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'credit'))
 {foreach ( $credits as $credit  )
{$credit_role = null;
$credit_scheme = null;
$credit_name = null;
if ( isset($credit['attribs']['']['role']))
 {$credit_role = $this->sanitize($credit['attribs']['']['role'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($credit['attribs']['']['scheme']))
 {$credit_scheme = $this->sanitize($credit['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$credit_scheme = 'urn:ebu';
}}if ( isset($credit['data']))
 {$credit_name = $this->sanitize($credit['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$credits_parent[] = &AspisNewUnknownProxy($this ->feed->credit_class,array( $credit_role,$credit_scheme,$credit_name),false);
}}if ( is_array($credits_parent))
 {$credits_parent = array_values(SimplePie_Misc::array_unique($credits_parent));
}if ( $description_parent = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'description'))
 {if ( isset($description_parent[0]['data']))
 {$description_parent = $this->sanitize($description_parent[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}}elseif ( $description_parent = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'description'))
 {if ( isset($description_parent[0]['data']))
 {$description_parent = $this->sanitize($description_parent[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}}if ( $duration_parent = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES,'duration'))
 {$seconds = null;
$minutes = null;
$hours = null;
if ( isset($duration_parent[0]['data']))
 {$temp = explode(':',$this->sanitize($duration_parent[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT));
if ( sizeof($temp) > 0)
 {(int)$seconds = array_pop($temp);
}if ( sizeof($temp) > 0)
 {(int)$minutes = array_pop($temp);
$seconds += $minutes * 60;
}if ( sizeof($temp) > 0)
 {(int)$hours = array_pop($temp);
$seconds += $hours * 3600;
}unset($temp);
$duration_parent = $seconds;
}}if ( $hashes_iterator = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'hash'))
 {foreach ( $hashes_iterator as $hash  )
{$value = null;
$algo = null;
if ( isset($hash['data']))
 {$value = $this->sanitize($hash['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($hash['attribs']['']['algo']))
 {$algo = $this->sanitize($hash['attribs']['']['algo'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$algo = 'md5';
}}$hashes_parent[] = $algo . ':' . $value;
}}elseif ( $hashes_iterator = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'hash'))
 {foreach ( $hashes_iterator as $hash  )
{$value = null;
$algo = null;
if ( isset($hash['data']))
 {$value = $this->sanitize($hash['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($hash['attribs']['']['algo']))
 {$algo = $this->sanitize($hash['attribs']['']['algo'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$algo = 'md5';
}}$hashes_parent[] = $algo . ':' . $value;
}}if ( is_array($hashes_parent))
 {$hashes_parent = array_values(SimplePie_Misc::array_unique($hashes_parent));
}if ( $keywords = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'keywords'))
 {if ( isset($keywords[0]['data']))
 {$temp = explode(',',$this->sanitize($keywords[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT));
foreach ( $temp as $word  )
{$keywords_parent[] = trim($word);
}}unset($temp);
}elseif ( $keywords = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES,'keywords'))
 {if ( isset($keywords[0]['data']))
 {$temp = explode(',',$this->sanitize($keywords[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT));
foreach ( $temp as $word  )
{$keywords_parent[] = trim($word);
}}unset($temp);
}elseif ( $keywords = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'keywords'))
 {if ( isset($keywords[0]['data']))
 {$temp = explode(',',$this->sanitize($keywords[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT));
foreach ( $temp as $word  )
{$keywords_parent[] = trim($word);
}}unset($temp);
}elseif ( $keywords = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES,'keywords'))
 {if ( isset($keywords[0]['data']))
 {$temp = explode(',',$this->sanitize($keywords[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT));
foreach ( $temp as $word  )
{$keywords_parent[] = trim($word);
}}unset($temp);
}if ( is_array($keywords_parent))
 {$keywords_parent = array_values(SimplePie_Misc::array_unique($keywords_parent));
}if ( $player_parent = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'player'))
 {if ( isset($player_parent[0]['attribs']['']['url']))
 {$player_parent = $this->sanitize($player_parent[0]['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_IRI);
}}elseif ( $player_parent = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'player'))
 {if ( isset($player_parent[0]['attribs']['']['url']))
 {$player_parent = $this->sanitize($player_parent[0]['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_IRI);
}}if ( $ratings = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'rating'))
 {foreach ( $ratings as $rating  )
{$rating_scheme = null;
$rating_value = null;
if ( isset($rating['attribs']['']['scheme']))
 {$rating_scheme = $this->sanitize($rating['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$rating_scheme = 'urn:simple';
}}if ( isset($rating['data']))
 {$rating_value = $this->sanitize($rating['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$ratings_parent[] = &AspisNewUnknownProxy($this ->feed->rating_class,array( $rating_scheme,$rating_value),false);
}}elseif ( $ratings = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES,'explicit'))
 {foreach ( $ratings as $rating  )
{$rating_scheme = 'urn:itunes';
$rating_value = null;
if ( isset($rating['data']))
 {$rating_value = $this->sanitize($rating['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$ratings_parent[] = &AspisNewUnknownProxy($this ->feed->rating_class,array( $rating_scheme,$rating_value),false);
}}elseif ( $ratings = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'rating'))
 {foreach ( $ratings as $rating  )
{$rating_scheme = null;
$rating_value = null;
if ( isset($rating['attribs']['']['scheme']))
 {$rating_scheme = $this->sanitize($rating['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$rating_scheme = 'urn:simple';
}}if ( isset($rating['data']))
 {$rating_value = $this->sanitize($rating['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$ratings_parent[] = &AspisNewUnknownProxy($this ->feed->rating_class,array( $rating_scheme,$rating_value),false);
}}elseif ( $ratings = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES,'explicit'))
 {foreach ( $ratings as $rating  )
{$rating_scheme = 'urn:itunes';
$rating_value = null;
if ( isset($rating['data']))
 {$rating_value = $this->sanitize($rating['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$ratings_parent[] = &AspisNewUnknownProxy($this ->feed->rating_class,array( $rating_scheme,$rating_value),false);
}}if ( is_array($ratings_parent))
 {$ratings_parent = array_values(SimplePie_Misc::array_unique($ratings_parent));
}if ( $restrictions = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'restriction'))
 {foreach ( $restrictions as $restriction  )
{$restriction_relationship = null;
$restriction_type = null;
$restriction_value = null;
if ( isset($restriction['attribs']['']['relationship']))
 {$restriction_relationship = $this->sanitize($restriction['attribs']['']['relationship'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($restriction['attribs']['']['type']))
 {$restriction_type = $this->sanitize($restriction['attribs']['']['type'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($restriction['data']))
 {$restriction_value = $this->sanitize($restriction['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$restrictions_parent[] = &AspisNewUnknownProxy($this ->feed->restriction_class,array( $restriction_relationship,$restriction_type,$restriction_value),false);
}}elseif ( $restrictions = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES,'block'))
 {foreach ( $restrictions as $restriction  )
{$restriction_relationship = 'allow';
$restriction_type = null;
$restriction_value = 'itunes';
if ( isset($restriction['data']) && strtolower($restriction['data']) === 'yes')
 {$restriction_relationship = 'deny';
}$restrictions_parent[] = &AspisNewUnknownProxy($this ->feed->restriction_class,array( $restriction_relationship,$restriction_type,$restriction_value),false);
}}elseif ( $restrictions = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'restriction'))
 {foreach ( $restrictions as $restriction  )
{$restriction_relationship = null;
$restriction_type = null;
$restriction_value = null;
if ( isset($restriction['attribs']['']['relationship']))
 {$restriction_relationship = $this->sanitize($restriction['attribs']['']['relationship'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($restriction['attribs']['']['type']))
 {$restriction_type = $this->sanitize($restriction['attribs']['']['type'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($restriction['data']))
 {$restriction_value = $this->sanitize($restriction['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$restrictions_parent[] = &AspisNewUnknownProxy($this ->feed->restriction_class,array( $restriction_relationship,$restriction_type,$restriction_value),false);
}}elseif ( $restrictions = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES,'block'))
 {foreach ( $restrictions as $restriction  )
{$restriction_relationship = 'allow';
$restriction_type = null;
$restriction_value = 'itunes';
if ( isset($restriction['data']) && strtolower($restriction['data']) === 'yes')
 {$restriction_relationship = 'deny';
}$restrictions_parent[] = &AspisNewUnknownProxy($this ->feed->restriction_class,array( $restriction_relationship,$restriction_type,$restriction_value),false);
}}if ( is_array($restrictions_parent))
 {$restrictions_parent = array_values(SimplePie_Misc::array_unique($restrictions_parent));
}if ( $thumbnails = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'thumbnail'))
 {foreach ( $thumbnails as $thumbnail  )
{if ( isset($thumbnail['attribs']['']['url']))
 {$thumbnails_parent[] = $this->sanitize($thumbnail['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_IRI);
}}}elseif ( $thumbnails = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'thumbnail'))
 {foreach ( $thumbnails as $thumbnail  )
{if ( isset($thumbnail['attribs']['']['url']))
 {$thumbnails_parent[] = $this->sanitize($thumbnail['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_IRI);
}}}if ( $title_parent = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'title'))
 {if ( isset($title_parent[0]['data']))
 {$title_parent = $this->sanitize($title_parent[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}}elseif ( $title_parent = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'title'))
 {if ( isset($title_parent[0]['data']))
 {$title_parent = $this->sanitize($title_parent[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}}unset($parent);
$bitrate = null;
$channels = null;
$duration = null;
$expression = null;
$framerate = null;
$height = null;
$javascript = null;
$lang = null;
$length = null;
$medium = null;
$samplingrate = null;
$type = null;
$url = null;
$width = null;
$captions = null;
$categories = null;
$copyrights = null;
$credits = null;
$description = null;
$hashes = null;
$keywords = null;
$player = null;
$ratings = null;
$restrictions = null;
$thumbnails = null;
$title = null;
foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS,'group') as $group  )
{foreach ( (array)$group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['content'] as $content  )
{if ( isset($content['attribs']['']['url']))
 {$bitrate = null;
$channels = null;
$duration = null;
$expression = null;
$framerate = null;
$height = null;
$javascript = null;
$lang = null;
$length = null;
$medium = null;
$samplingrate = null;
$type = null;
$url = null;
$width = null;
$captions = null;
$categories = null;
$copyrights = null;
$credits = null;
$description = null;
$hashes = null;
$keywords = null;
$player = null;
$ratings = null;
$restrictions = null;
$thumbnails = null;
$title = null;
if ( isset($content['attribs']['']['bitrate']))
 {$bitrate = $this->sanitize($content['attribs']['']['bitrate'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['channels']))
 {$channels = $this->sanitize($content['attribs']['']['channels'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['duration']))
 {$duration = $this->sanitize($content['attribs']['']['duration'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$duration = $duration_parent;
}}if ( isset($content['attribs']['']['expression']))
 {$expression = $this->sanitize($content['attribs']['']['expression'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['framerate']))
 {$framerate = $this->sanitize($content['attribs']['']['framerate'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['height']))
 {$height = $this->sanitize($content['attribs']['']['height'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['lang']))
 {$lang = $this->sanitize($content['attribs']['']['lang'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['fileSize']))
 {$length = ceil($content['attribs']['']['fileSize']);
}if ( isset($content['attribs']['']['medium']))
 {$medium = $this->sanitize($content['attribs']['']['medium'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['samplingrate']))
 {$samplingrate = $this->sanitize($content['attribs']['']['samplingrate'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['type']))
 {$type = $this->sanitize($content['attribs']['']['type'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['width']))
 {$width = $this->sanitize($content['attribs']['']['width'],SIMPLEPIE_CONSTRUCT_TEXT);
}$url = $this->sanitize($content['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_IRI);
if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['text']))
 {foreach ( $content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['text'] as $caption  )
{$caption_type = null;
$caption_lang = null;
$caption_startTime = null;
$caption_endTime = null;
$caption_text = null;
if ( isset($caption['attribs']['']['type']))
 {$caption_type = $this->sanitize($caption['attribs']['']['type'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['attribs']['']['lang']))
 {$caption_lang = $this->sanitize($caption['attribs']['']['lang'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['attribs']['']['start']))
 {$caption_startTime = $this->sanitize($caption['attribs']['']['start'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['attribs']['']['end']))
 {$caption_endTime = $this->sanitize($caption['attribs']['']['end'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['data']))
 {$caption_text = $this->sanitize($caption['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$captions[] = &AspisNewUnknownProxy($this ->feed->caption_class,array( $caption_type,$caption_lang,$caption_startTime,$caption_endTime,$caption_text),false);
}if ( is_array($captions))
 {$captions = array_values(SimplePie_Misc::array_unique($captions));
}}elseif ( isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['text']))
 {foreach ( $group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['text'] as $caption  )
{$caption_type = null;
$caption_lang = null;
$caption_startTime = null;
$caption_endTime = null;
$caption_text = null;
if ( isset($caption['attribs']['']['type']))
 {$caption_type = $this->sanitize($caption['attribs']['']['type'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['attribs']['']['lang']))
 {$caption_lang = $this->sanitize($caption['attribs']['']['lang'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['attribs']['']['start']))
 {$caption_startTime = $this->sanitize($caption['attribs']['']['start'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['attribs']['']['end']))
 {$caption_endTime = $this->sanitize($caption['attribs']['']['end'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['data']))
 {$caption_text = $this->sanitize($caption['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$captions[] = &AspisNewUnknownProxy($this ->feed->caption_class,array( $caption_type,$caption_lang,$caption_startTime,$caption_endTime,$caption_text),false);
}if ( is_array($captions))
 {$captions = array_values(SimplePie_Misc::array_unique($captions));
}}else 
{{$captions = $captions_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['category']))
 {foreach ( (array)$content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['category'] as $category  )
{$term = null;
$scheme = null;
$label = null;
if ( isset($category['data']))
 {$term = $this->sanitize($category['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($category['attribs']['']['scheme']))
 {$scheme = $this->sanitize($category['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$scheme = 'http://search.yahoo.com/mrss/category_schema';
}}if ( isset($category['attribs']['']['label']))
 {$label = $this->sanitize($category['attribs']['']['label'],SIMPLEPIE_CONSTRUCT_TEXT);
}$categories[] = &AspisNewUnknownProxy($this ->feed->category_class,array( $term,$scheme,$label),false);
}}if ( isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['category']))
 {foreach ( (array)$group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['category'] as $category  )
{$term = null;
$scheme = null;
$label = null;
if ( isset($category['data']))
 {$term = $this->sanitize($category['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($category['attribs']['']['scheme']))
 {$scheme = $this->sanitize($category['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$scheme = 'http://search.yahoo.com/mrss/category_schema';
}}if ( isset($category['attribs']['']['label']))
 {$label = $this->sanitize($category['attribs']['']['label'],SIMPLEPIE_CONSTRUCT_TEXT);
}$categories[] = &AspisNewUnknownProxy($this ->feed->category_class,array( $term,$scheme,$label),false);
}}if ( is_array($categories) && is_array($categories_parent))
 {$categories = array_values(SimplePie_Misc::array_unique(array_merge($categories,$categories_parent)));
}elseif ( is_array($categories))
 {$categories = array_values(SimplePie_Misc::array_unique($categories));
}elseif ( is_array($categories_parent))
 {$categories = array_values(SimplePie_Misc::array_unique($categories_parent));
}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright']))
 {$copyright_url = null;
$copyright_label = null;
if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['attribs']['']['url']))
 {$copyright_url = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['data']))
 {$copyright_label = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$copyrights = &AspisNewUnknownProxy($this ->feed->copyright_class,array( $copyright_url,$copyright_label),false);
}elseif ( isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright']))
 {$copyright_url = null;
$copyright_label = null;
if ( isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['attribs']['']['url']))
 {$copyright_url = $this->sanitize($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['data']))
 {$copyright_label = $this->sanitize($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$copyrights = &AspisNewUnknownProxy($this ->feed->copyright_class,array( $copyright_url,$copyright_label),false);
}else 
{{$copyrights = $copyrights_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['credit']))
 {foreach ( $content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['credit'] as $credit  )
{$credit_role = null;
$credit_scheme = null;
$credit_name = null;
if ( isset($credit['attribs']['']['role']))
 {$credit_role = $this->sanitize($credit['attribs']['']['role'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($credit['attribs']['']['scheme']))
 {$credit_scheme = $this->sanitize($credit['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$credit_scheme = 'urn:ebu';
}}if ( isset($credit['data']))
 {$credit_name = $this->sanitize($credit['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$credits[] = &AspisNewUnknownProxy($this ->feed->credit_class,array( $credit_role,$credit_scheme,$credit_name),false);
}if ( is_array($credits))
 {$credits = array_values(SimplePie_Misc::array_unique($credits));
}}elseif ( isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['credit']))
 {foreach ( $group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['credit'] as $credit  )
{$credit_role = null;
$credit_scheme = null;
$credit_name = null;
if ( isset($credit['attribs']['']['role']))
 {$credit_role = $this->sanitize($credit['attribs']['']['role'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($credit['attribs']['']['scheme']))
 {$credit_scheme = $this->sanitize($credit['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$credit_scheme = 'urn:ebu';
}}if ( isset($credit['data']))
 {$credit_name = $this->sanitize($credit['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$credits[] = &AspisNewUnknownProxy($this ->feed->credit_class,array( $credit_role,$credit_scheme,$credit_name),false);
}if ( is_array($credits))
 {$credits = array_values(SimplePie_Misc::array_unique($credits));
}}else 
{{$credits = $credits_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['description']))
 {$description = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['description'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}elseif ( isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['description']))
 {$description = $this->sanitize($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['description'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$description = $description_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['hash']))
 {foreach ( $content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['hash'] as $hash  )
{$value = null;
$algo = null;
if ( isset($hash['data']))
 {$value = $this->sanitize($hash['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($hash['attribs']['']['algo']))
 {$algo = $this->sanitize($hash['attribs']['']['algo'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$algo = 'md5';
}}$hashes[] = $algo . ':' . $value;
}if ( is_array($hashes))
 {$hashes = array_values(SimplePie_Misc::array_unique($hashes));
}}elseif ( isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['hash']))
 {foreach ( $group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['hash'] as $hash  )
{$value = null;
$algo = null;
if ( isset($hash['data']))
 {$value = $this->sanitize($hash['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($hash['attribs']['']['algo']))
 {$algo = $this->sanitize($hash['attribs']['']['algo'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$algo = 'md5';
}}$hashes[] = $algo . ':' . $value;
}if ( is_array($hashes))
 {$hashes = array_values(SimplePie_Misc::array_unique($hashes));
}}else 
{{$hashes = $hashes_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords']))
 {if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords'][0]['data']))
 {$temp = explode(',',$this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT));
foreach ( $temp as $word  )
{$keywords[] = trim($word);
}unset($temp);
}if ( is_array($keywords))
 {$keywords = array_values(SimplePie_Misc::array_unique($keywords));
}}elseif ( isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords']))
 {if ( isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords'][0]['data']))
 {$temp = explode(',',$this->sanitize($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT));
foreach ( $temp as $word  )
{$keywords[] = trim($word);
}unset($temp);
}if ( is_array($keywords))
 {$keywords = array_values(SimplePie_Misc::array_unique($keywords));
}}else 
{{$keywords = $keywords_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['player']))
 {$player = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['player'][0]['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_IRI);
}elseif ( isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['player']))
 {$player = $this->sanitize($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['player'][0]['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_IRI);
}else 
{{$player = $player_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['rating']))
 {foreach ( $content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['rating'] as $rating  )
{$rating_scheme = null;
$rating_value = null;
if ( isset($rating['attribs']['']['scheme']))
 {$rating_scheme = $this->sanitize($rating['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$rating_scheme = 'urn:simple';
}}if ( isset($rating['data']))
 {$rating_value = $this->sanitize($rating['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$ratings[] = &AspisNewUnknownProxy($this ->feed->rating_class,array( $rating_scheme,$rating_value),false);
}if ( is_array($ratings))
 {$ratings = array_values(SimplePie_Misc::array_unique($ratings));
}}elseif ( isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['rating']))
 {foreach ( $group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['rating'] as $rating  )
{$rating_scheme = null;
$rating_value = null;
if ( isset($rating['attribs']['']['scheme']))
 {$rating_scheme = $this->sanitize($rating['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$rating_scheme = 'urn:simple';
}}if ( isset($rating['data']))
 {$rating_value = $this->sanitize($rating['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$ratings[] = &AspisNewUnknownProxy($this ->feed->rating_class,array( $rating_scheme,$rating_value),false);
}if ( is_array($ratings))
 {$ratings = array_values(SimplePie_Misc::array_unique($ratings));
}}else 
{{$ratings = $ratings_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['restriction']))
 {foreach ( $content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['restriction'] as $restriction  )
{$restriction_relationship = null;
$restriction_type = null;
$restriction_value = null;
if ( isset($restriction['attribs']['']['relationship']))
 {$restriction_relationship = $this->sanitize($restriction['attribs']['']['relationship'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($restriction['attribs']['']['type']))
 {$restriction_type = $this->sanitize($restriction['attribs']['']['type'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($restriction['data']))
 {$restriction_value = $this->sanitize($restriction['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$restrictions[] = &AspisNewUnknownProxy($this ->feed->restriction_class,array( $restriction_relationship,$restriction_type,$restriction_value),false);
}if ( is_array($restrictions))
 {$restrictions = array_values(SimplePie_Misc::array_unique($restrictions));
}}elseif ( isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['restriction']))
 {foreach ( $group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['restriction'] as $restriction  )
{$restriction_relationship = null;
$restriction_type = null;
$restriction_value = null;
if ( isset($restriction['attribs']['']['relationship']))
 {$restriction_relationship = $this->sanitize($restriction['attribs']['']['relationship'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($restriction['attribs']['']['type']))
 {$restriction_type = $this->sanitize($restriction['attribs']['']['type'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($restriction['data']))
 {$restriction_value = $this->sanitize($restriction['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$restrictions[] = &AspisNewUnknownProxy($this ->feed->restriction_class,array( $restriction_relationship,$restriction_type,$restriction_value),false);
}if ( is_array($restrictions))
 {$restrictions = array_values(SimplePie_Misc::array_unique($restrictions));
}}else 
{{$restrictions = $restrictions_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['thumbnail']))
 {foreach ( $content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['thumbnail'] as $thumbnail  )
{$thumbnails[] = $this->sanitize($thumbnail['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_IRI);
}if ( is_array($thumbnails))
 {$thumbnails = array_values(SimplePie_Misc::array_unique($thumbnails));
}}elseif ( isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['thumbnail']))
 {foreach ( $group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['thumbnail'] as $thumbnail  )
{$thumbnails[] = $this->sanitize($thumbnail['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_IRI);
}if ( is_array($thumbnails))
 {$thumbnails = array_values(SimplePie_Misc::array_unique($thumbnails));
}}else 
{{$thumbnails = $thumbnails_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['title']))
 {$title = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['title'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}elseif ( isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['title']))
 {$title = $this->sanitize($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['title'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$title = $title_parent;
}}$this->data['enclosures'][] = &AspisNewUnknownProxy($this ->feed->enclosure_class,array( $url,$type,$length,$this ->feed ->javascript ,$bitrate,$captions,$categories,$channels,$copyrights,$credits,$description,$duration,$expression,$framerate,$hashes,$height,$keywords,$lang,$medium,$player,$ratings,$restrictions,$samplingrate,$thumbnails,$title,$width),false);
}}}if ( isset($this->data['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['content']))
 {foreach ( (array)$this->data['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['content'] as $content  )
{if ( isset($content['attribs']['']['url']))
 {$bitrate = null;
$channels = null;
$duration = null;
$expression = null;
$framerate = null;
$height = null;
$javascript = null;
$lang = null;
$length = null;
$medium = null;
$samplingrate = null;
$type = null;
$url = null;
$width = null;
$captions = null;
$categories = null;
$copyrights = null;
$credits = null;
$description = null;
$hashes = null;
$keywords = null;
$player = null;
$ratings = null;
$restrictions = null;
$thumbnails = null;
$title = null;
if ( isset($content['attribs']['']['bitrate']))
 {$bitrate = $this->sanitize($content['attribs']['']['bitrate'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['channels']))
 {$channels = $this->sanitize($content['attribs']['']['channels'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['duration']))
 {$duration = $this->sanitize($content['attribs']['']['duration'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$duration = $duration_parent;
}}if ( isset($content['attribs']['']['expression']))
 {$expression = $this->sanitize($content['attribs']['']['expression'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['framerate']))
 {$framerate = $this->sanitize($content['attribs']['']['framerate'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['height']))
 {$height = $this->sanitize($content['attribs']['']['height'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['lang']))
 {$lang = $this->sanitize($content['attribs']['']['lang'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['fileSize']))
 {$length = ceil($content['attribs']['']['fileSize']);
}if ( isset($content['attribs']['']['medium']))
 {$medium = $this->sanitize($content['attribs']['']['medium'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['samplingrate']))
 {$samplingrate = $this->sanitize($content['attribs']['']['samplingrate'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['type']))
 {$type = $this->sanitize($content['attribs']['']['type'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['attribs']['']['width']))
 {$width = $this->sanitize($content['attribs']['']['width'],SIMPLEPIE_CONSTRUCT_TEXT);
}$url = $this->sanitize($content['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_IRI);
if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['text']))
 {foreach ( $content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['text'] as $caption  )
{$caption_type = null;
$caption_lang = null;
$caption_startTime = null;
$caption_endTime = null;
$caption_text = null;
if ( isset($caption['attribs']['']['type']))
 {$caption_type = $this->sanitize($caption['attribs']['']['type'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['attribs']['']['lang']))
 {$caption_lang = $this->sanitize($caption['attribs']['']['lang'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['attribs']['']['start']))
 {$caption_startTime = $this->sanitize($caption['attribs']['']['start'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['attribs']['']['end']))
 {$caption_endTime = $this->sanitize($caption['attribs']['']['end'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($caption['data']))
 {$caption_text = $this->sanitize($caption['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$captions[] = &AspisNewUnknownProxy($this ->feed->caption_class,array( $caption_type,$caption_lang,$caption_startTime,$caption_endTime,$caption_text),false);
}if ( is_array($captions))
 {$captions = array_values(SimplePie_Misc::array_unique($captions));
}}else 
{{$captions = $captions_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['category']))
 {foreach ( (array)$content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['category'] as $category  )
{$term = null;
$scheme = null;
$label = null;
if ( isset($category['data']))
 {$term = $this->sanitize($category['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($category['attribs']['']['scheme']))
 {$scheme = $this->sanitize($category['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$scheme = 'http://search.yahoo.com/mrss/category_schema';
}}if ( isset($category['attribs']['']['label']))
 {$label = $this->sanitize($category['attribs']['']['label'],SIMPLEPIE_CONSTRUCT_TEXT);
}$categories[] = &AspisNewUnknownProxy($this ->feed->category_class,array( $term,$scheme,$label),false);
}}if ( is_array($categories) && is_array($categories_parent))
 {$categories = array_values(SimplePie_Misc::array_unique(array_merge($categories,$categories_parent)));
}elseif ( is_array($categories))
 {$categories = array_values(SimplePie_Misc::array_unique($categories));
}elseif ( is_array($categories_parent))
 {$categories = array_values(SimplePie_Misc::array_unique($categories_parent));
}else 
{{$categories = null;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright']))
 {$copyright_url = null;
$copyright_label = null;
if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['attribs']['']['url']))
 {$copyright_url = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['data']))
 {$copyright_label = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$copyrights = &AspisNewUnknownProxy($this ->feed->copyright_class,array( $copyright_url,$copyright_label),false);
}else 
{{$copyrights = $copyrights_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['credit']))
 {foreach ( $content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['credit'] as $credit  )
{$credit_role = null;
$credit_scheme = null;
$credit_name = null;
if ( isset($credit['attribs']['']['role']))
 {$credit_role = $this->sanitize($credit['attribs']['']['role'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($credit['attribs']['']['scheme']))
 {$credit_scheme = $this->sanitize($credit['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$credit_scheme = 'urn:ebu';
}}if ( isset($credit['data']))
 {$credit_name = $this->sanitize($credit['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$credits[] = &AspisNewUnknownProxy($this ->feed->credit_class,array( $credit_role,$credit_scheme,$credit_name),false);
}if ( is_array($credits))
 {$credits = array_values(SimplePie_Misc::array_unique($credits));
}}else 
{{$credits = $credits_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['description']))
 {$description = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['description'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$description = $description_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['hash']))
 {foreach ( $content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['hash'] as $hash  )
{$value = null;
$algo = null;
if ( isset($hash['data']))
 {$value = $this->sanitize($hash['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($hash['attribs']['']['algo']))
 {$algo = $this->sanitize($hash['attribs']['']['algo'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$algo = 'md5';
}}$hashes[] = $algo . ':' . $value;
}if ( is_array($hashes))
 {$hashes = array_values(SimplePie_Misc::array_unique($hashes));
}}else 
{{$hashes = $hashes_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords']))
 {if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords'][0]['data']))
 {$temp = explode(',',$this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT));
foreach ( $temp as $word  )
{$keywords[] = trim($word);
}unset($temp);
}if ( is_array($keywords))
 {$keywords = array_values(SimplePie_Misc::array_unique($keywords));
}}else 
{{$keywords = $keywords_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['player']))
 {$player = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['player'][0]['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_IRI);
}else 
{{$player = $player_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['rating']))
 {foreach ( $content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['rating'] as $rating  )
{$rating_scheme = null;
$rating_value = null;
if ( isset($rating['attribs']['']['scheme']))
 {$rating_scheme = $this->sanitize($rating['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$rating_scheme = 'urn:simple';
}}if ( isset($rating['data']))
 {$rating_value = $this->sanitize($rating['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$ratings[] = &AspisNewUnknownProxy($this ->feed->rating_class,array( $rating_scheme,$rating_value),false);
}if ( is_array($ratings))
 {$ratings = array_values(SimplePie_Misc::array_unique($ratings));
}}else 
{{$ratings = $ratings_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['restriction']))
 {foreach ( $content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['restriction'] as $restriction  )
{$restriction_relationship = null;
$restriction_type = null;
$restriction_value = null;
if ( isset($restriction['attribs']['']['relationship']))
 {$restriction_relationship = $this->sanitize($restriction['attribs']['']['relationship'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($restriction['attribs']['']['type']))
 {$restriction_type = $this->sanitize($restriction['attribs']['']['type'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($restriction['data']))
 {$restriction_value = $this->sanitize($restriction['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}$restrictions[] = &AspisNewUnknownProxy($this ->feed->restriction_class,array( $restriction_relationship,$restriction_type,$restriction_value),false);
}if ( is_array($restrictions))
 {$restrictions = array_values(SimplePie_Misc::array_unique($restrictions));
}}else 
{{$restrictions = $restrictions_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['thumbnail']))
 {foreach ( $content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['thumbnail'] as $thumbnail  )
{$thumbnails[] = $this->sanitize($thumbnail['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_IRI);
}if ( is_array($thumbnails))
 {$thumbnails = array_values(SimplePie_Misc::array_unique($thumbnails));
}}else 
{{$thumbnails = $thumbnails_parent;
}}if ( isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['title']))
 {$title = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['title'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$title = $title_parent;
}}$this->data['enclosures'][] = &AspisNewUnknownProxy($this ->feed->enclosure_class,array( $url,$type,$length,$this ->feed ->javascript ,$bitrate,$captions,$categories,$channels,$copyrights,$credits,$description,$duration,$expression,$framerate,$hashes,$height,$keywords,$lang,$medium,$player,$ratings,$restrictions,$samplingrate,$thumbnails,$title,$width),false);
}}}foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'link') as $link  )
{if ( isset($link['attribs']['']['href']) && !empty($link['attribs']['']['rel']) && $link['attribs']['']['rel'] === 'enclosure')
 {$bitrate = null;
$channels = null;
$duration = null;
$expression = null;
$framerate = null;
$height = null;
$javascript = null;
$lang = null;
$length = null;
$medium = null;
$samplingrate = null;
$type = null;
$url = null;
$width = null;
$url = $this->sanitize($link['attribs']['']['href'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($link));
if ( isset($link['attribs']['']['type']))
 {$type = $this->sanitize($link['attribs']['']['type'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($link['attribs']['']['length']))
 {$length = ceil($link['attribs']['']['length']);
}$this->data['enclosures'][] = &AspisNewUnknownProxy($this ->feed->enclosure_class,array( $url,$type,$length,$this ->feed ->javascript ,$bitrate,$captions_parent,$categories_parent,$channels,$copyrights_parent,$credits_parent,$description_parent,$duration_parent,$expression,$framerate,$hashes_parent,$height,$keywords_parent,$lang,$medium,$player_parent,$ratings_parent,$restrictions_parent,$samplingrate,$thumbnails_parent,$title_parent,$width),false);
}}foreach ( (array)$this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'link') as $link  )
{if ( isset($link['attribs']['']['href']) && !empty($link['attribs']['']['rel']) && $link['attribs']['']['rel'] === 'enclosure')
 {$bitrate = null;
$channels = null;
$duration = null;
$expression = null;
$framerate = null;
$height = null;
$javascript = null;
$lang = null;
$length = null;
$medium = null;
$samplingrate = null;
$type = null;
$url = null;
$width = null;
$url = $this->sanitize($link['attribs']['']['href'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($link));
if ( isset($link['attribs']['']['type']))
 {$type = $this->sanitize($link['attribs']['']['type'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($link['attribs']['']['length']))
 {$length = ceil($link['attribs']['']['length']);
}$this->data['enclosures'][] = &AspisNewUnknownProxy($this ->feed->enclosure_class,array( $url,$type,$length,$this ->feed ->javascript ,$bitrate,$captions_parent,$categories_parent,$channels,$copyrights_parent,$credits_parent,$description_parent,$duration_parent,$expression,$framerate,$hashes_parent,$height,$keywords_parent,$lang,$medium,$player_parent,$ratings_parent,$restrictions_parent,$samplingrate,$thumbnails_parent,$title_parent,$width),false);
}}if ( $enclosure = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20,'enclosure'))
 {if ( isset($enclosure[0]['attribs']['']['url']))
 {$bitrate = null;
$channels = null;
$duration = null;
$expression = null;
$framerate = null;
$height = null;
$javascript = null;
$lang = null;
$length = null;
$medium = null;
$samplingrate = null;
$type = null;
$url = null;
$width = null;
$url = $this->sanitize($enclosure[0]['attribs']['']['url'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($enclosure[0]));
if ( isset($enclosure[0]['attribs']['']['type']))
 {$type = $this->sanitize($enclosure[0]['attribs']['']['type'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($enclosure[0]['attribs']['']['length']))
 {$length = ceil($enclosure[0]['attribs']['']['length']);
}$this->data['enclosures'][] = &AspisNewUnknownProxy($this ->feed->enclosure_class,array( $url,$type,$length,$this ->feed ->javascript ,$bitrate,$captions_parent,$categories_parent,$channels,$copyrights_parent,$credits_parent,$description_parent,$duration_parent,$expression,$framerate,$hashes_parent,$height,$keywords_parent,$lang,$medium,$player_parent,$ratings_parent,$restrictions_parent,$samplingrate,$thumbnails_parent,$title_parent,$width),false);
}}if ( sizeof($this->data['enclosures']) === 0 && ($url || $type || $length || $bitrate || $captions_parent || $categories_parent || $channels || $copyrights_parent || $credits_parent || $description_parent || $duration_parent || $expression || $framerate || $hashes_parent || $height || $keywords_parent || $lang || $medium || $player_parent || $ratings_parent || $restrictions_parent || $samplingrate || $thumbnails_parent || $title_parent || $width))
 {$this->data['enclosures'][] = &AspisNewUnknownProxy($this ->feed->enclosure_class,array( $url,$type,$length,$this ->feed ->javascript ,$bitrate,$captions_parent,$categories_parent,$channels,$copyrights_parent,$credits_parent,$description_parent,$duration_parent,$expression,$framerate,$hashes_parent,$height,$keywords_parent,$lang,$medium,$player_parent,$ratings_parent,$restrictions_parent,$samplingrate,$thumbnails_parent,$title_parent,$width),false);
}$this->data['enclosures'] = array_values(SimplePie_Misc::array_unique($this->data['enclosures']));
}if ( !empty($this->data['enclosures']))
 {{$AspisRetTemp = $this->data['enclosures'];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_latitude (  ) {
{if ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO,'lat'))
 {{$AspisRetTemp = (double)$return[0]['data'];
return $AspisRetTemp;
}}elseif ( ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_GEORSS,'point')) && preg_match('/^((?:-)?[0-9]+(?:\.[0-9]+)) ((?:-)?[0-9]+(?:\.[0-9]+))$/',$return[0]['data'],$match))
 {{$AspisRetTemp = (double)$match[1];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_longitude (  ) {
{if ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO,'long'))
 {{$AspisRetTemp = (double)$return[0]['data'];
return $AspisRetTemp;
}}elseif ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO,'lon'))
 {{$AspisRetTemp = (double)$return[0]['data'];
return $AspisRetTemp;
}}elseif ( ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_GEORSS,'point')) && preg_match('/^((?:-)?[0-9]+(?:\.[0-9]+)) ((?:-)?[0-9]+(?:\.[0-9]+))$/',$return[0]['data'],$match))
 {{$AspisRetTemp = (double)$match[2];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_source (  ) {
{if ( $return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'source'))
 {{$AspisRetTemp = AspisNewUnknownProxy($this ->feed->source_class,array( $this,$return[0]),false);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function add_to_service ( $item_url,$title_url = null,$summary_url = null ) {
{if ( $this->get_permalink() !== null)
 {$return = $item_url . rawurlencode($this->get_permalink());
if ( $title_url !== null && $this->get_title() !== null)
 {$return .= $title_url . rawurlencode($this->get_title());
}if ( $summary_url !== null && $this->get_description() !== null)
 {$return .= $summary_url . rawurlencode($this->get_description());
}{$AspisRetTemp = $this->sanitize($return,SIMPLEPIE_CONSTRUCT_IRI);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function add_to_blinklist (  ) {
{{$AspisRetTemp = $this->add_to_service('http://www.blinklist.com/index.php?Action=Blink/addblink.php&Description=&Url=','&Title=');
return $AspisRetTemp;
}} }
function add_to_blogmarks (  ) {
{{$AspisRetTemp = $this->add_to_service('http://blogmarks.net/my/new.php?mini=1&simple=1&url=','&title=');
return $AspisRetTemp;
}} }
function add_to_delicious (  ) {
{{$AspisRetTemp = $this->add_to_service('http://del.icio.us/post/?v=4&url=','&title=');
return $AspisRetTemp;
}} }
function add_to_digg (  ) {
{{$AspisRetTemp = $this->add_to_service('http://digg.com/submit?url=','&title=','&bodytext=');
return $AspisRetTemp;
}} }
function add_to_furl (  ) {
{{$AspisRetTemp = $this->add_to_service('http://www.furl.net/storeIt.jsp?u=','&t=');
return $AspisRetTemp;
}} }
function add_to_magnolia (  ) {
{{$AspisRetTemp = $this->add_to_service('http://ma.gnolia.com/bookmarklet/add?url=','&title=');
return $AspisRetTemp;
}} }
function add_to_myweb20 (  ) {
{{$AspisRetTemp = $this->add_to_service('http://myweb2.search.yahoo.com/myresults/bookmarklet?u=','&t=');
return $AspisRetTemp;
}} }
function add_to_newsvine (  ) {
{{$AspisRetTemp = $this->add_to_service('http://www.newsvine.com/_wine/save?u=','&h=');
return $AspisRetTemp;
}} }
function add_to_reddit (  ) {
{{$AspisRetTemp = $this->add_to_service('http://reddit.com/submit?url=','&title=');
return $AspisRetTemp;
}} }
function add_to_segnalo (  ) {
{{$AspisRetTemp = $this->add_to_service('http://segnalo.com/post.html.php?url=','&title=');
return $AspisRetTemp;
}} }
function add_to_simpy (  ) {
{{$AspisRetTemp = $this->add_to_service('http://www.simpy.com/simpy/LinkAdd.do?href=','&title=');
return $AspisRetTemp;
}} }
function add_to_spurl (  ) {
{{$AspisRetTemp = $this->add_to_service('http://www.spurl.net/spurl.php?v=3&url=','&title=');
return $AspisRetTemp;
}} }
function add_to_wists (  ) {
{{$AspisRetTemp = $this->add_to_service('http://wists.com/r.php?c=&r=','&title=');
return $AspisRetTemp;
}} }
function search_technorati (  ) {
{{$AspisRetTemp = $this->add_to_service('http://www.technorati.com/search/');
return $AspisRetTemp;
}} }
}class SimplePie_Source{var $item;
var $data = array();
function SimplePie_Source ( $item,$data ) {
{$this->item = $item;
$this->data = $data;
} }
function __toString (  ) {
{{$AspisRetTemp = md5(serialize($this->data));
return $AspisRetTemp;
}} }
function get_source_tags ( $namespace,$tag ) {
{if ( isset($this->data['child'][$namespace][$tag]))
 {{$AspisRetTemp = $this->data['child'][$namespace][$tag];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_base ( $element = array() ) {
{{$AspisRetTemp = $this->item->get_base($element);
return $AspisRetTemp;
}} }
function sanitize ( $data,$type,$base = '' ) {
{{$AspisRetTemp = $this->item->sanitize($data,$type,$base);
return $AspisRetTemp;
}} }
function get_item (  ) {
{{$AspisRetTemp = $this->item;
return $AspisRetTemp;
}} }
function get_title (  ) {
{if ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_10_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_03_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_10,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_MAYBE_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_090,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_MAYBE_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_20,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_MAYBE_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_11,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_10,'title'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_category ( $key = 0 ) {
{$categories = $this->get_categories();
if ( isset($categories[$key]))
 {{$AspisRetTemp = $categories[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_categories (  ) {
{$categories = array();
foreach ( (array)$this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'category') as $category  )
{$term = null;
$scheme = null;
$label = null;
if ( isset($category['attribs']['']['term']))
 {$term = $this->sanitize($category['attribs']['']['term'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($category['attribs']['']['scheme']))
 {$scheme = $this->sanitize($category['attribs']['']['scheme'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($category['attribs']['']['label']))
 {$label = $this->sanitize($category['attribs']['']['label'],SIMPLEPIE_CONSTRUCT_TEXT);
}$categories[] = &AspisNewUnknownProxy($this ->item->feed->category_class,array( $term,$scheme,$label),false);
}foreach ( (array)$this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_20,'category') as $category  )
{$term = $this->sanitize($category['data'],SIMPLEPIE_CONSTRUCT_TEXT);
if ( isset($category['attribs']['']['domain']))
 {$scheme = $this->sanitize($category['attribs']['']['domain'],SIMPLEPIE_CONSTRUCT_TEXT);
}else 
{{$scheme = null;
}}$categories[] = &AspisNewUnknownProxy($this ->item->feed->category_class,array( $term,$scheme,null),false);
}foreach ( (array)$this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_11,'subject') as $category  )
{$categories[] = &AspisNewUnknownProxy($this ->item->feed->category_class,array( $this ->sanitize( $category['data'],SIMPLEPIE_CONSTRUCT_TEXT),null,null),false);
}foreach ( (array)$this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_10,'subject') as $category  )
{$categories[] = &AspisNewUnknownProxy($this ->item->feed->category_class,array( $this ->sanitize( $category['data'],SIMPLEPIE_CONSTRUCT_TEXT),null,null),false);
}if ( !empty($categories))
 {{$AspisRetTemp = SimplePie_Misc::array_unique($categories);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_author ( $key = 0 ) {
{$authors = $this->get_authors();
if ( isset($authors[$key]))
 {{$AspisRetTemp = $authors[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_authors (  ) {
{$authors = array();
foreach ( (array)$this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'author') as $author  )
{$name = null;
$uri = null;
$email = null;
if ( isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data']))
 {$name = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data']))
 {$uri = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]));
}if ( isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data']))
 {$email = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( $name !== null || $email !== null || $uri !== null)
 {$authors[] = &AspisNewUnknownProxy($this ->item->feed->author_class,array( $name,$uri,$email),false);
}}if ( $author = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'author'))
 {$name = null;
$url = null;
$email = null;
if ( isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data']))
 {$name = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data']))
 {$url = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]));
}if ( isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data']))
 {$email = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( $name !== null || $email !== null || $url !== null)
 {$authors[] = &AspisNewUnknownProxy($this ->item->feed->author_class,array( $name,$url,$email),false);
}}foreach ( (array)$this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_11,'creator') as $author  )
{$authors[] = &AspisNewUnknownProxy($this ->item->feed->author_class,array( $this ->sanitize( $author['data'],SIMPLEPIE_CONSTRUCT_TEXT),null,null),false);
}foreach ( (array)$this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_10,'creator') as $author  )
{$authors[] = &AspisNewUnknownProxy($this ->item->feed->author_class,array( $this ->sanitize( $author['data'],SIMPLEPIE_CONSTRUCT_TEXT),null,null),false);
}foreach ( (array)$this->get_source_tags(SIMPLEPIE_NAMESPACE_ITUNES,'author') as $author  )
{$authors[] = &AspisNewUnknownProxy($this ->item->feed->author_class,array( $this ->sanitize( $author['data'],SIMPLEPIE_CONSTRUCT_TEXT),null,null),false);
}if ( !empty($authors))
 {{$AspisRetTemp = SimplePie_Misc::array_unique($authors);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_contributor ( $key = 0 ) {
{$contributors = $this->get_contributors();
if ( isset($contributors[$key]))
 {{$AspisRetTemp = $contributors[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_contributors (  ) {
{$contributors = array();
foreach ( (array)$this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'contributor') as $contributor  )
{$name = null;
$uri = null;
$email = null;
if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data']))
 {$name = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data']))
 {$uri = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]));
}if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data']))
 {$email = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( $name !== null || $email !== null || $uri !== null)
 {$contributors[] = &AspisNewUnknownProxy($this ->item->feed->author_class,array( $name,$uri,$email),false);
}}foreach ( (array)$this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'contributor') as $contributor  )
{$name = null;
$url = null;
$email = null;
if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data']))
 {$name = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data']))
 {$url = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]));
}if ( isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data']))
 {$email = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
}if ( $name !== null || $email !== null || $url !== null)
 {$contributors[] = &AspisNewUnknownProxy($this ->item->feed->author_class,array( $name,$url,$email),false);
}}if ( !empty($contributors))
 {{$AspisRetTemp = SimplePie_Misc::array_unique($contributors);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_link ( $key = 0,$rel = 'alternate' ) {
{$links = $this->get_links($rel);
if ( isset($links[$key]))
 {{$AspisRetTemp = $links[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_permalink (  ) {
{{$AspisRetTemp = $this->get_link(0);
return $AspisRetTemp;
}} }
function get_links ( $rel = 'alternate' ) {
{if ( !isset($this->data['links']))
 {$this->data['links'] = array();
if ( $links = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'link'))
 {foreach ( $links as $link  )
{if ( isset($link['attribs']['']['href']))
 {$link_rel = (isset($link['attribs']['']['rel'])) ? $link['attribs']['']['rel'] : 'alternate';
$this->data['links'][$link_rel][] = $this->sanitize($link['attribs']['']['href'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($link));
}}}if ( $links = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'link'))
 {foreach ( $links as $link  )
{if ( isset($link['attribs']['']['href']))
 {$link_rel = (isset($link['attribs']['']['rel'])) ? $link['attribs']['']['rel'] : 'alternate';
$this->data['links'][$link_rel][] = $this->sanitize($link['attribs']['']['href'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($link));
}}}if ( $links = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_10,'link'))
 {$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($links[0]));
}if ( $links = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_090,'link'))
 {$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($links[0]));
}if ( $links = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_20,'link'))
 {$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($links[0]));
}$keys = array_keys($this->data['links']);
foreach ( $keys as $key  )
{if ( SimplePie_Misc::is_isegment_nz_nc($key))
 {if ( isset($this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key]))
 {$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key] = array_merge($this->data['links'][$key],$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key]);
$this->data['links'][$key] = &$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key];
}else 
{{$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key] = &$this->data['links'][$key];
}}}elseif ( substr($key,0,41) === SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY)
 {$this->data['links'][substr($key,41)] = &$this->data['links'][$key];
}$this->data['links'][$key] = array_unique($this->data['links'][$key]);
}}if ( isset($this->data['links'][$rel]))
 {{$AspisRetTemp = $this->data['links'][$rel];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_description (  ) {
{if ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'subtitle'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_10_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'tagline'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_03_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_10,'description'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_MAYBE_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_090,'description'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_MAYBE_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_20,'description'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_MAYBE_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_11,'description'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_10,'description'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ITUNES,'summary'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ITUNES,'subtitle'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_HTML,$this->get_base($return[0]));
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_copyright (  ) {
{if ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'rights'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_10_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_03,'copyright'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SimplePie_Misc::atom_03_construct_type($return[0]['attribs']),$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_20,'copyright'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_11,'rights'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_10,'rights'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_language (  ) {
{if ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_20,'language'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_11,'language'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_10,'language'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}elseif ( isset($this->data['xml_lang']))
 {{$AspisRetTemp = $this->sanitize($this->data['xml_lang'],SIMPLEPIE_CONSTRUCT_TEXT);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_latitude (  ) {
{if ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO,'lat'))
 {{$AspisRetTemp = (double)$return[0]['data'];
return $AspisRetTemp;
}}elseif ( ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_GEORSS,'point')) && preg_match('/^((?:-)?[0-9]+(?:\.[0-9]+)) ((?:-)?[0-9]+(?:\.[0-9]+))$/',$return[0]['data'],$match))
 {{$AspisRetTemp = (double)$match[1];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_longitude (  ) {
{if ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO,'long'))
 {{$AspisRetTemp = (double)$return[0]['data'];
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO,'lon'))
 {{$AspisRetTemp = (double)$return[0]['data'];
return $AspisRetTemp;
}}elseif ( ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_GEORSS,'point')) && preg_match('/^((?:-)?[0-9]+(?:\.[0-9]+)) ((?:-)?[0-9]+(?:\.[0-9]+))$/',$return[0]['data'],$match))
 {{$AspisRetTemp = (double)$match[2];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_image_url (  ) {
{if ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ITUNES,'image'))
 {{$AspisRetTemp = $this->sanitize($return[0]['attribs']['']['href'],SIMPLEPIE_CONSTRUCT_IRI);
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'logo'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($return[0]));
return $AspisRetTemp;
}}elseif ( $return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10,'icon'))
 {{$AspisRetTemp = $this->sanitize($return[0]['data'],SIMPLEPIE_CONSTRUCT_IRI,$this->get_base($return[0]));
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
}class SimplePie_Author{var $name;
var $link;
var $email;
function SimplePie_Author ( $name = null,$link = null,$email = null ) {
{$this->name = $name;
$this->link = $link;
$this->email = $email;
} }
function __toString (  ) {
{{$AspisRetTemp = md5(serialize($this));
return $AspisRetTemp;
}} }
function get_name (  ) {
{if ( $this->name !== null)
 {{$AspisRetTemp = $this->name;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_link (  ) {
{if ( $this->link !== null)
 {{$AspisRetTemp = $this->link;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_email (  ) {
{if ( $this->email !== null)
 {{$AspisRetTemp = $this->email;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
}class SimplePie_Category{var $term;
var $scheme;
var $label;
function SimplePie_Category ( $term = null,$scheme = null,$label = null ) {
{$this->term = $term;
$this->scheme = $scheme;
$this->label = $label;
} }
function __toString (  ) {
{{$AspisRetTemp = md5(serialize($this));
return $AspisRetTemp;
}} }
function get_term (  ) {
{if ( $this->term !== null)
 {{$AspisRetTemp = $this->term;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_scheme (  ) {
{if ( $this->scheme !== null)
 {{$AspisRetTemp = $this->scheme;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_label (  ) {
{if ( $this->label !== null)
 {{$AspisRetTemp = $this->label;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = $this->get_term();
return $AspisRetTemp;
}}}} }
}class SimplePie_Enclosure{var $bitrate;
var $captions;
var $categories;
var $channels;
var $copyright;
var $credits;
var $description;
var $duration;
var $expression;
var $framerate;
var $handler;
var $hashes;
var $height;
var $javascript;
var $keywords;
var $lang;
var $length;
var $link;
var $medium;
var $player;
var $ratings;
var $restrictions;
var $samplingrate;
var $thumbnails;
var $title;
var $type;
var $width;
function SimplePie_Enclosure ( $link = null,$type = null,$length = null,$javascript = null,$bitrate = null,$captions = null,$categories = null,$channels = null,$copyright = null,$credits = null,$description = null,$duration = null,$expression = null,$framerate = null,$hashes = null,$height = null,$keywords = null,$lang = null,$medium = null,$player = null,$ratings = null,$restrictions = null,$samplingrate = null,$thumbnails = null,$title = null,$width = null ) {
{$this->bitrate = $bitrate;
$this->captions = $captions;
$this->categories = $categories;
$this->channels = $channels;
$this->copyright = $copyright;
$this->credits = $credits;
$this->description = $description;
$this->duration = $duration;
$this->expression = $expression;
$this->framerate = $framerate;
$this->hashes = $hashes;
$this->height = $height;
$this->javascript = $javascript;
$this->keywords = $keywords;
$this->lang = $lang;
$this->length = $length;
$this->link = $link;
$this->medium = $medium;
$this->player = $player;
$this->ratings = $ratings;
$this->restrictions = $restrictions;
$this->samplingrate = $samplingrate;
$this->thumbnails = $thumbnails;
$this->title = $title;
$this->type = $type;
$this->width = $width;
if ( class_exists('idna_convert'))
 {$idn = &new idna_convert;
$parsed = SimplePie_Misc::parse_url($link);
$this->link = SimplePie_Misc::compress_parse_url($parsed['scheme'],$idn->encode($parsed['authority']),$parsed['path'],$parsed['query'],$parsed['fragment']);
}$this->handler = $this->get_handler();
} }
function __toString (  ) {
{{$AspisRetTemp = md5(serialize($this));
return $AspisRetTemp;
}} }
function get_bitrate (  ) {
{if ( $this->bitrate !== null)
 {{$AspisRetTemp = $this->bitrate;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_caption ( $key = 0 ) {
{$captions = $this->get_captions();
if ( isset($captions[$key]))
 {{$AspisRetTemp = $captions[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_captions (  ) {
{if ( $this->captions !== null)
 {{$AspisRetTemp = $this->captions;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_category ( $key = 0 ) {
{$categories = $this->get_categories();
if ( isset($categories[$key]))
 {{$AspisRetTemp = $categories[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_categories (  ) {
{if ( $this->categories !== null)
 {{$AspisRetTemp = $this->categories;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_channels (  ) {
{if ( $this->channels !== null)
 {{$AspisRetTemp = $this->channels;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_copyright (  ) {
{if ( $this->copyright !== null)
 {{$AspisRetTemp = $this->copyright;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_credit ( $key = 0 ) {
{$credits = $this->get_credits();
if ( isset($credits[$key]))
 {{$AspisRetTemp = $credits[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_credits (  ) {
{if ( $this->credits !== null)
 {{$AspisRetTemp = $this->credits;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_description (  ) {
{if ( $this->description !== null)
 {{$AspisRetTemp = $this->description;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_duration ( $convert = false ) {
{if ( $this->duration !== null)
 {if ( $convert)
 {$time = SimplePie_Misc::time_hms($this->duration);
{$AspisRetTemp = $time;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = $this->duration;
return $AspisRetTemp;
}}}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_expression (  ) {
{if ( $this->expression !== null)
 {{$AspisRetTemp = $this->expression;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = 'full';
return $AspisRetTemp;
}}}} }
function get_extension (  ) {
{if ( $this->link !== null)
 {$url = SimplePie_Misc::parse_url($this->link);
if ( $url['path'] !== '')
 {{$AspisRetTemp = pathinfo($url['path'],PATHINFO_EXTENSION);
return $AspisRetTemp;
}}}{$AspisRetTemp = null;
return $AspisRetTemp;
}} }
function get_framerate (  ) {
{if ( $this->framerate !== null)
 {{$AspisRetTemp = $this->framerate;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_handler (  ) {
{{$AspisRetTemp = $this->get_real_type(true);
return $AspisRetTemp;
}} }
function get_hash ( $key = 0 ) {
{$hashes = $this->get_hashes();
if ( isset($hashes[$key]))
 {{$AspisRetTemp = $hashes[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_hashes (  ) {
{if ( $this->hashes !== null)
 {{$AspisRetTemp = $this->hashes;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_height (  ) {
{if ( $this->height !== null)
 {{$AspisRetTemp = $this->height;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_language (  ) {
{if ( $this->lang !== null)
 {{$AspisRetTemp = $this->lang;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_keyword ( $key = 0 ) {
{$keywords = $this->get_keywords();
if ( isset($keywords[$key]))
 {{$AspisRetTemp = $keywords[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_keywords (  ) {
{if ( $this->keywords !== null)
 {{$AspisRetTemp = $this->keywords;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_length (  ) {
{if ( $this->length !== null)
 {{$AspisRetTemp = $this->length;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_link (  ) {
{if ( $this->link !== null)
 {{$AspisRetTemp = urldecode($this->link);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_medium (  ) {
{if ( $this->medium !== null)
 {{$AspisRetTemp = $this->medium;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_player (  ) {
{if ( $this->player !== null)
 {{$AspisRetTemp = $this->player;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_rating ( $key = 0 ) {
{$ratings = $this->get_ratings();
if ( isset($ratings[$key]))
 {{$AspisRetTemp = $ratings[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_ratings (  ) {
{if ( $this->ratings !== null)
 {{$AspisRetTemp = $this->ratings;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_restriction ( $key = 0 ) {
{$restrictions = $this->get_restrictions();
if ( isset($restrictions[$key]))
 {{$AspisRetTemp = $restrictions[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_restrictions (  ) {
{if ( $this->restrictions !== null)
 {{$AspisRetTemp = $this->restrictions;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_sampling_rate (  ) {
{if ( $this->samplingrate !== null)
 {{$AspisRetTemp = $this->samplingrate;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_size (  ) {
{$length = $this->get_length();
if ( $length !== null)
 {{$AspisRetTemp = round($length / 1048576,2);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_thumbnail ( $key = 0 ) {
{$thumbnails = $this->get_thumbnails();
if ( isset($thumbnails[$key]))
 {{$AspisRetTemp = $thumbnails[$key];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_thumbnails (  ) {
{if ( $this->thumbnails !== null)
 {{$AspisRetTemp = $this->thumbnails;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_title (  ) {
{if ( $this->title !== null)
 {{$AspisRetTemp = $this->title;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_type (  ) {
{if ( $this->type !== null)
 {{$AspisRetTemp = $this->type;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_width (  ) {
{if ( $this->width !== null)
 {{$AspisRetTemp = $this->width;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function native_embed ( $options = '' ) {
{{$AspisRetTemp = $this->embed($options,true);
return $AspisRetTemp;
}} }
function embed ( $options = '',$native = false ) {
{$audio = '';
$video = '';
$alt = '';
$altclass = '';
$loop = 'false';
$width = 'auto';
$height = 'auto';
$bgcolor = '#ffffff';
$mediaplayer = '';
$widescreen = false;
$handler = $this->get_handler();
$type = $this->get_real_type();
if ( is_array($options))
 {extract(($options));
}else 
{{$options = explode(',',$options);
foreach ( $options as $option  )
{$opt = explode(':',$option,2);
if ( isset($opt[0],$opt[1]))
 {$opt[0] = trim($opt[0]);
$opt[1] = trim($opt[1]);
switch ( $opt[0] ) {
case 'audio':$audio = $opt[1];
break ;
case 'video':$video = $opt[1];
break ;
case 'alt':$alt = $opt[1];
break ;
case 'altclass':$altclass = $opt[1];
break ;
case 'loop':$loop = $opt[1];
break ;
case 'width':$width = $opt[1];
break ;
case 'height':$height = $opt[1];
break ;
case 'bgcolor':$bgcolor = $opt[1];
break ;
case 'mediaplayer':$mediaplayer = $opt[1];
break ;
case 'widescreen':$widescreen = $opt[1];
break ;
 }
}}}}$mime = explode('/',$type,2);
$mime = $mime[0];
if ( $width === 'auto')
 {if ( $mime === 'video')
 {if ( $height === 'auto')
 {$width = 480;
}elseif ( $widescreen)
 {$width = round((intval($height) / 9) * 16);
}else 
{{$width = round((intval($height) / 3) * 4);
}}}else 
{{$width = '100%';
}}}if ( $height === 'auto')
 {if ( $mime === 'audio')
 {$height = 0;
}elseif ( $mime === 'video')
 {if ( $width === 'auto')
 {if ( $widescreen)
 {$height = 270;
}else 
{{$height = 360;
}}}elseif ( $widescreen)
 {$height = round((intval($width) / 16) * 9);
}else 
{{$height = round((intval($width) / 4) * 3);
}}}else 
{{$height = 376;
}}}elseif ( $mime === 'audio')
 {$height = 0;
}if ( $mime === 'audio')
 {$placeholder = $audio;
}elseif ( $mime === 'video')
 {$placeholder = $video;
}$embed = '';
if ( !$native)
 {static $javascript_outputted = null;
if ( !$javascript_outputted && $this->javascript)
 {$embed .= '<script type="text/javascript" src="?' . htmlspecialchars($this->javascript) . '"></script>';
$javascript_outputted = true;
}}if ( $handler === 'odeo')
 {if ( $native)
 {$embed .= '<embed src="http://odeo.com/flash/audio_player_fullsize.swf" pluginspage="http://adobe.com/go/getflashplayer" type="application/x-shockwave-flash" quality="high" width="440" height="80" wmode="transparent" allowScriptAccess="any" flashvars="valid_sample_rate=true&external_url=' . $this->get_link() . '"></embed>';
}else 
{{$embed .= '<script type="text/javascript">embed_odeo("' . $this->get_link() . '");</script>';
}}}elseif ( $handler === 'flash')
 {if ( $native)
 {$embed .= "<embed src=\"" . $this->get_link() . "\" pluginspage=\"http://adobe.com/go/getflashplayer\" type=\"$type\" quality=\"high\" width=\"$width\" height=\"$height\" bgcolor=\"$bgcolor\" loop=\"$loop\"></embed>";
}else 
{{$embed .= "<script type='text/javascript'>embed_flash('$bgcolor', '$width', '$height', '" . $this->get_link() . "', '$loop', '$type');</script>";
}}}elseif ( $handler === 'fmedia' || ($handler === 'mp3' && $mediaplayer !== ''))
 {$height += 20;
if ( $native)
 {$embed .= "<embed src=\"$mediaplayer\" pluginspage=\"http://adobe.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" quality=\"high\" width=\"$width\" height=\"$height\" wmode=\"transparent\" flashvars=\"file=" . rawurlencode($this->get_link() . '?file_extension=.' . $this->get_extension()) . "&autostart=false&repeat=$loop&showdigits=true&showfsbutton=false\"></embed>";
}else 
{{$embed .= "<script type='text/javascript'>embed_flv('$width', '$height', '" . rawurlencode($this->get_link() . '?file_extension=.' . $this->get_extension()) . "', '$placeholder', '$loop', '$mediaplayer');</script>";
}}}elseif ( $handler === 'quicktime' || ($handler === 'mp3' && $mediaplayer === ''))
 {$height += 16;
if ( $native)
 {if ( $placeholder !== '')
 {$embed .= "<embed type=\"$type\" style=\"cursor:hand; cursor:pointer;
\" href=\"" . $this->get_link() . "\" src=\"$placeholder\" width=\"$width\" height=\"$height\" autoplay=\"false\" target=\"myself\" controller=\"false\" loop=\"$loop\" scale=\"aspect\" bgcolor=\"$bgcolor\" pluginspage=\"http://apple.com/quicktime/download/\"></embed>";
}else 
{{$embed .= "<embed type=\"$type\" style=\"cursor:hand; cursor:pointer;
\" src=\"" . $this->get_link() . "\" width=\"$width\" height=\"$height\" autoplay=\"false\" target=\"myself\" controller=\"true\" loop=\"$loop\" scale=\"aspect\" bgcolor=\"$bgcolor\" pluginspage=\"http://apple.com/quicktime/download/\"></embed>";
}}}else 
{{$embed .= "<script type='text/javascript'>embed_quicktime('$type', '$bgcolor', '$width', '$height', '" . $this->get_link() . "', '$placeholder', '$loop');</script>";
}}}elseif ( $handler === 'wmedia')
 {$height += 45;
if ( $native)
 {$embed .= "<embed type=\"application/x-mplayer2\" src=\"" . $this->get_link() . "\" autosize=\"1\" width=\"$width\" height=\"$height\" showcontrols=\"1\" showstatusbar=\"0\" showdisplay=\"0\" autostart=\"0\"></embed>";
}else 
{{$embed .= "<script type='text/javascript'>embed_wmedia('$width', '$height', '" . $this->get_link() . "');</script>";
}}}else 
{$embed .= '<a href="' . $this->get_link() . '" class="' . $altclass . '">' . $alt . '</a>';
}{$AspisRetTemp = $embed;
return $AspisRetTemp;
}} }
function get_real_type ( $find_handler = false ) {
{if ( substr(strtolower($this->get_link()),0,15) === 'http://odeo.com')
 {{$AspisRetTemp = 'odeo';
return $AspisRetTemp;
}}$types_flash = array('application/x-shockwave-flash','application/futuresplash');
$types_fmedia = array('video/flv','video/x-flv','flv-application/octet-stream');
$types_quicktime = array('audio/3gpp','audio/3gpp2','audio/aac','audio/x-aac','audio/aiff','audio/x-aiff','audio/mid','audio/midi','audio/x-midi','audio/mp4','audio/m4a','audio/x-m4a','audio/wav','audio/x-wav','video/3gpp','video/3gpp2','video/m4v','video/x-m4v','video/mp4','video/mpeg','video/x-mpeg','video/quicktime','video/sd-video');
$types_wmedia = array('application/asx','application/x-mplayer2','audio/x-ms-wma','audio/x-ms-wax','video/x-ms-asf-plugin','video/x-ms-asf','video/x-ms-wm','video/x-ms-wmv','video/x-ms-wvx');
$types_mp3 = array('audio/mp3','audio/x-mp3','audio/mpeg','audio/x-mpeg');
if ( $this->get_type() !== null)
 {$type = strtolower($this->type);
}else 
{{$type = null;
}}if ( !in_array($type,array_merge($types_flash,$types_fmedia,$types_quicktime,$types_wmedia,$types_mp3)))
 {switch ( strtolower($this->get_extension()) ) {
case 'aac':case 'adts':$type = 'audio/acc';
break ;
case 'aif':case 'aifc':case 'aiff':case 'cdda':$type = 'audio/aiff';
break ;
case 'bwf':$type = 'audio/wav';
break ;
case 'kar':case 'mid':case 'midi':case 'smf':$type = 'audio/midi';
break ;
case 'm4a':$type = 'audio/x-m4a';
break ;
case 'mp3':case 'swa':$type = 'audio/mp3';
break ;
case 'wav':$type = 'audio/wav';
break ;
case 'wax':$type = 'audio/x-ms-wax';
break ;
case 'wma':$type = 'audio/x-ms-wma';
break ;
case '3gp':case '3gpp':$type = 'video/3gpp';
break ;
case '3g2':case '3gp2':$type = 'video/3gpp2';
break ;
case 'asf':$type = 'video/x-ms-asf';
break ;
case 'flv':$type = 'video/x-flv';
break ;
case 'm1a':case 'm1s':case 'm1v':case 'm15':case 'm75':case 'mp2':case 'mpa':case 'mpeg':case 'mpg':case 'mpm':case 'mpv':$type = 'video/mpeg';
break ;
case 'm4v':$type = 'video/x-m4v';
break ;
case 'mov':case 'qt':$type = 'video/quicktime';
break ;
case 'mp4':case 'mpg4':$type = 'video/mp4';
break ;
case 'sdv':$type = 'video/sd-video';
break ;
case 'wm':$type = 'video/x-ms-wm';
break ;
case 'wmv':$type = 'video/x-ms-wmv';
break ;
case 'wvx':$type = 'video/x-ms-wvx';
break ;
case 'spl':$type = 'application/futuresplash';
break ;
case 'swf':$type = 'application/x-shockwave-flash';
break ;
 }
}if ( $find_handler)
 {if ( in_array($type,$types_flash))
 {{$AspisRetTemp = 'flash';
return $AspisRetTemp;
}}elseif ( in_array($type,$types_fmedia))
 {{$AspisRetTemp = 'fmedia';
return $AspisRetTemp;
}}elseif ( in_array($type,$types_quicktime))
 {{$AspisRetTemp = 'quicktime';
return $AspisRetTemp;
}}elseif ( in_array($type,$types_wmedia))
 {{$AspisRetTemp = 'wmedia';
return $AspisRetTemp;
}}elseif ( in_array($type,$types_mp3))
 {{$AspisRetTemp = 'mp3';
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}}else 
{{{$AspisRetTemp = $type;
return $AspisRetTemp;
}}}} }
}class SimplePie_Caption{var $type;
var $lang;
var $startTime;
var $endTime;
var $text;
function SimplePie_Caption ( $type = null,$lang = null,$startTime = null,$endTime = null,$text = null ) {
{$this->type = $type;
$this->lang = $lang;
$this->startTime = $startTime;
$this->endTime = $endTime;
$this->text = $text;
} }
function __toString (  ) {
{{$AspisRetTemp = md5(serialize($this));
return $AspisRetTemp;
}} }
function get_endtime (  ) {
{if ( $this->endTime !== null)
 {{$AspisRetTemp = $this->endTime;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_language (  ) {
{if ( $this->lang !== null)
 {{$AspisRetTemp = $this->lang;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_starttime (  ) {
{if ( $this->startTime !== null)
 {{$AspisRetTemp = $this->startTime;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_text (  ) {
{if ( $this->text !== null)
 {{$AspisRetTemp = $this->text;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_type (  ) {
{if ( $this->type !== null)
 {{$AspisRetTemp = $this->type;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
}class SimplePie_Credit{var $role;
var $scheme;
var $name;
function SimplePie_Credit ( $role = null,$scheme = null,$name = null ) {
{$this->role = $role;
$this->scheme = $scheme;
$this->name = $name;
} }
function __toString (  ) {
{{$AspisRetTemp = md5(serialize($this));
return $AspisRetTemp;
}} }
function get_role (  ) {
{if ( $this->role !== null)
 {{$AspisRetTemp = $this->role;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_scheme (  ) {
{if ( $this->scheme !== null)
 {{$AspisRetTemp = $this->scheme;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_name (  ) {
{if ( $this->name !== null)
 {{$AspisRetTemp = $this->name;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
}class SimplePie_Copyright{var $url;
var $label;
function SimplePie_Copyright ( $url = null,$label = null ) {
{$this->url = $url;
$this->label = $label;
} }
function __toString (  ) {
{{$AspisRetTemp = md5(serialize($this));
return $AspisRetTemp;
}} }
function get_url (  ) {
{if ( $this->url !== null)
 {{$AspisRetTemp = $this->url;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_attribution (  ) {
{if ( $this->label !== null)
 {{$AspisRetTemp = $this->label;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
}class SimplePie_Rating{var $scheme;
var $value;
function SimplePie_Rating ( $scheme = null,$value = null ) {
{$this->scheme = $scheme;
$this->value = $value;
} }
function __toString (  ) {
{{$AspisRetTemp = md5(serialize($this));
return $AspisRetTemp;
}} }
function get_scheme (  ) {
{if ( $this->scheme !== null)
 {{$AspisRetTemp = $this->scheme;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_value (  ) {
{if ( $this->value !== null)
 {{$AspisRetTemp = $this->value;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
}class SimplePie_Restriction{var $relationship;
var $type;
var $value;
function SimplePie_Restriction ( $relationship = null,$type = null,$value = null ) {
{$this->relationship = $relationship;
$this->type = $type;
$this->value = $value;
} }
function __toString (  ) {
{{$AspisRetTemp = md5(serialize($this));
return $AspisRetTemp;
}} }
function get_relationship (  ) {
{if ( $this->relationship !== null)
 {{$AspisRetTemp = $this->relationship;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_type (  ) {
{if ( $this->type !== null)
 {{$AspisRetTemp = $this->type;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_value (  ) {
{if ( $this->value !== null)
 {{$AspisRetTemp = $this->value;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
}class SimplePie_File{var $url;
var $useragent;
var $success = true;
var $headers = array();
var $body;
var $status_code;
var $redirects = 0;
var $error;
var $method = SIMPLEPIE_FILE_SOURCE_NONE;
function SimplePie_File ( $url,$timeout = 10,$redirects = 5,$headers = null,$useragent = null,$force_fsockopen = false ) {
{if ( class_exists('idna_convert'))
 {$idn = &new idna_convert;
$parsed = SimplePie_Misc::parse_url($url);
$url = SimplePie_Misc::compress_parse_url($parsed['scheme'],$idn->encode($parsed['authority']),$parsed['path'],$parsed['query'],$parsed['fragment']);
}$this->url = $url;
$this->useragent = $useragent;
if ( preg_match('/^http(s)?:\/\//i',$url))
 {if ( $useragent === null)
 {$useragent = ini_get('user_agent');
$this->useragent = $useragent;
}if ( !is_array($headers))
 {$headers = array();
}if ( !$force_fsockopen && function_exists('curl_exec'))
 {$this->method = SIMPLEPIE_FILE_SOURCE_REMOTE | SIMPLEPIE_FILE_SOURCE_CURL;
$fp = curl_init();
$headers2 = array();
foreach ( $headers as $key =>$value )
{$headers2[] = "$key: $value";
}if ( version_compare(SimplePie_Misc::get_curl_version(),'7.10.5','>='))
 {curl_setopt($fp,CURLOPT_ENCODING,'');
}curl_setopt($fp,CURLOPT_URL,$url);
curl_setopt($fp,CURLOPT_HEADER,1);
curl_setopt($fp,CURLOPT_RETURNTRANSFER,1);
curl_setopt($fp,CURLOPT_TIMEOUT,$timeout);
curl_setopt($fp,CURLOPT_CONNECTTIMEOUT,$timeout);
curl_setopt($fp,CURLOPT_REFERER,$url);
curl_setopt($fp,CURLOPT_USERAGENT,$useragent);
curl_setopt($fp,CURLOPT_HTTPHEADER,$headers2);
if ( !ini_get('open_basedir') && !ini_get('safe_mode') && version_compare(SimplePie_Misc::get_curl_version(),'7.15.2','>='))
 {curl_setopt($fp,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($fp,CURLOPT_MAXREDIRS,$redirects);
}$this->headers = curl_exec($fp);
if ( curl_errno($fp) === 23 || curl_errno($fp) === 61)
 {curl_setopt($fp,CURLOPT_ENCODING,'none');
$this->headers = curl_exec($fp);
}if ( curl_errno($fp))
 {$this->error = 'cURL error ' . curl_errno($fp) . ': ' . curl_error($fp);
$this->success = false;
}else 
{{$info = curl_getinfo($fp);
curl_close($fp);
$this->headers = explode("\r\n\r\n",$this->headers,$info['redirect_count'] + 1);
$this->headers = array_pop($this->headers);
$parser = &new SimplePie_HTTP_Parser($this->headers);
if ( $parser->parse())
 {$this->headers = $parser->headers;
$this->body = $parser->body;
$this->status_code = $parser->status_code;
if ( (in_array($this->status_code,array(300,301,302,303,307)) || $this->status_code > 307 && $this->status_code < 400) && isset($this->headers['location']) && $this->redirects < $redirects)
 {$this->redirects++;
$location = SimplePie_Misc::absolutize_url($this->headers['location'],$url);
{$AspisRetTemp = $this->SimplePie_File($location,$timeout,$redirects,$headers,$useragent,$force_fsockopen);
return $AspisRetTemp;
}}}}}}else 
{{$this->method = SIMPLEPIE_FILE_SOURCE_REMOTE | SIMPLEPIE_FILE_SOURCE_FSOCKOPEN;
$url_parts = parse_url($url);
if ( isset($url_parts['scheme']) && strtolower($url_parts['scheme']) === 'https')
 {$url_parts['host'] = "ssl://$url_parts[host]";
$url_parts['port'] = 443;
}if ( !isset($url_parts['port']))
 {$url_parts['port'] = 80;
}$fp = @fsockopen($url_parts['host'],$url_parts['port'],$errno,$errstr,$timeout);
if ( !$fp)
 {$this->error = 'fsockopen error: ' . $errstr;
$this->success = false;
}else 
{{stream_set_timeout($fp,$timeout);
if ( isset($url_parts['path']))
 {if ( isset($url_parts['query']))
 {$get = "$url_parts[path]?$url_parts[query]";
}else 
{{$get = $url_parts['path'];
}}}else 
{{$get = '/';
}}$out = "GET $get HTTP/1.0\r\n";
$out .= "Host: $url_parts[host]\r\n";
$out .= "User-Agent: $useragent\r\n";
if ( extension_loaded('zlib'))
 {$out .= "Accept-Encoding: x-gzip,gzip,deflate\r\n";
}if ( isset($url_parts['user']) && isset($url_parts['pass']))
 {$out .= "Authorization: Basic " . base64_encode("$url_parts[user]:$url_parts[pass]") . "\r\n";
}foreach ( $headers as $key =>$value )
{$out .= "$key: $value\r\n";
}$out .= "Connection: Close\r\n\r\n";
fwrite($fp,$out);
$info = stream_get_meta_data($fp);
$this->headers = '';
while ( !$info['eof'] && !$info['timed_out'] )
{$this->headers .= fread($fp,1160);
$info = stream_get_meta_data($fp);
}if ( !$info['timed_out'])
 {$parser = &new SimplePie_HTTP_Parser($this->headers);
if ( $parser->parse())
 {$this->headers = $parser->headers;
$this->body = $parser->body;
$this->status_code = $parser->status_code;
if ( (in_array($this->status_code,array(300,301,302,303,307)) || $this->status_code > 307 && $this->status_code < 400) && isset($this->headers['location']) && $this->redirects < $redirects)
 {$this->redirects++;
$location = SimplePie_Misc::absolutize_url($this->headers['location'],$url);
{$AspisRetTemp = $this->SimplePie_File($location,$timeout,$redirects,$headers,$useragent,$force_fsockopen);
return $AspisRetTemp;
}}if ( isset($this->headers['content-encoding']))
 {switch ( strtolower(trim($this->headers['content-encoding'],"\x09\x0A\x0D\x20")) ) {
case 'gzip':case 'x-gzip':$decoder = &new SimplePie_gzdecode($this->body);
if ( !$decoder->parse())
 {$this->error = 'Unable to decode HTTP "gzip" stream';
$this->success = false;
}else 
{{$this->body = $decoder->data;
}}break ;
case 'deflate':if ( ($body = gzuncompress($this->body)) === false)
 {if ( ($body = gzinflate($this->body)) === false)
 {$this->error = 'Unable to decode HTTP "deflate" stream';
$this->success = false;
}}$this->body = $body;
break ;
default :$this->error = 'Unknown content coding';
$this->success = false;
 }
}}}else 
{{$this->error = 'fsocket timed out';
$this->success = false;
}}fclose($fp);
}}}}}else 
{{$this->method = SIMPLEPIE_FILE_SOURCE_LOCAL | SIMPLEPIE_FILE_SOURCE_FILE_GET_CONTENTS;
if ( !$this->body = file_get_contents($url))
 {$this->error = 'file_get_contents could not read the file';
$this->success = false;
}}}} }
}class SimplePie_HTTP_Parser{var $http_version = 0.0;
var $status_code = 0;
var $reason = '';
var $headers = array();
var $body = '';
var $state = 'http_version';
var $data = '';
var $data_length = 0;
var $position = 0;
var $name = '';
var $value = '';
function SimplePie_HTTP_Parser ( $data ) {
{$this->data = $data;
$this->data_length = strlen($this->data);
} }
function parse (  ) {
{while ( $this->state && $this->state !== 'emit' && $this->has_data() )
{$state = $this->state;
AspisUntaintedDynamicCall(array($this,$state));
}$this->data = '';
if ( $this->state === 'emit' || $this->state === 'body')
 {{$AspisRetTemp = true;
return $AspisRetTemp;
}}else 
{{$this->http_version = '';
$this->status_code = '';
$this->reason = '';
$this->headers = array();
$this->body = '';
{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
function has_data (  ) {
{{$AspisRetTemp = (bool)($this->position < $this->data_length);
return $AspisRetTemp;
}} }
function is_linear_whitespace (  ) {
{{$AspisRetTemp = (bool)($this->data[$this->position] === "\x09" || $this->data[$this->position] === "\x20" || ($this->data[$this->position] === "\x0A" && isset($this->data[$this->position + 1]) && ($this->data[$this->position + 1] === "\x09" || $this->data[$this->position + 1] === "\x20")));
return $AspisRetTemp;
}} }
function http_version (  ) {
{if ( strpos($this->data,"\x0A") !== false && strtoupper(substr($this->data,0,5)) === 'HTTP/')
 {$len = strspn($this->data,'0123456789.',5);
$this->http_version = substr($this->data,5,$len);
$this->position += 5 + $len;
if ( substr_count($this->http_version,'.') <= 1)
 {$this->http_version = (double)$this->http_version;
$this->position += strspn($this->data,"\x09\x20",$this->position);
$this->state = 'status';
}else 
{{$this->state = false;
}}}else 
{{$this->state = false;
}}} }
function status (  ) {
{if ( $len = strspn($this->data,'0123456789',$this->position))
 {$this->status_code = (int)substr($this->data,$this->position,$len);
$this->position += $len;
$this->state = 'reason';
}else 
{{$this->state = false;
}}} }
function reason (  ) {
{$len = strcspn($this->data,"\x0A",$this->position);
$this->reason = trim(substr($this->data,$this->position,$len),"\x09\x0D\x20");
$this->position += $len + 1;
$this->state = 'new_line';
} }
function new_line (  ) {
{$this->value = trim($this->value,"\x0D\x20");
if ( $this->name !== '' && $this->value !== '')
 {$this->name = strtolower($this->name);
if ( isset($this->headers[$this->name]))
 {$this->headers[$this->name] .= ', ' . $this->value;
}else 
{{$this->headers[$this->name] = $this->value;
}}}$this->name = '';
$this->value = '';
if ( substr($this->data[$this->position],0,2) === "\x0D\x0A")
 {$this->position += 2;
$this->state = 'body';
}elseif ( $this->data[$this->position] === "\x0A")
 {$this->position++;
$this->state = 'body';
}else 
{{$this->state = 'name';
}}} }
function name (  ) {
{$len = strcspn($this->data,"\x0A:",$this->position);
if ( isset($this->data[$this->position + $len]))
 {if ( $this->data[$this->position + $len] === "\x0A")
 {$this->position += $len;
$this->state = 'new_line';
}else 
{{$this->name = substr($this->data,$this->position,$len);
$this->position += $len + 1;
$this->state = 'value';
}}}else 
{{$this->state = false;
}}} }
function linear_whitespace (  ) {
{do {if ( substr($this->data,$this->position,2) === "\x0D\x0A")
 {$this->position += 2;
}elseif ( $this->data[$this->position] === "\x0A")
 {$this->position++;
}$this->position += strspn($this->data,"\x09\x20",$this->position);
}while ($this->has_data() && $this->is_linear_whitespace() )
;
$this->value .= "\x20";
} }
function value (  ) {
{if ( $this->is_linear_whitespace())
 {$this->linear_whitespace();
}else 
{{switch ( $this->data[$this->position] ) {
case '"':$this->position++;
$this->state = 'quote';
break ;
case "\x0A":$this->position++;
$this->state = 'new_line';
break ;
default :$this->state = 'value_char';
break ;
 }
}}} }
function value_char (  ) {
{$len = strcspn($this->data,"\x09\x20\x0A\"",$this->position);
$this->value .= substr($this->data,$this->position,$len);
$this->position += $len;
$this->state = 'value';
} }
function quote (  ) {
{if ( $this->is_linear_whitespace())
 {$this->linear_whitespace();
}else 
{{switch ( $this->data[$this->position] ) {
case '"':$this->position++;
$this->state = 'value';
break ;
case "\x0A":$this->position++;
$this->state = 'new_line';
break ;
case '\\':$this->position++;
$this->state = 'quote_escaped';
break ;
default :$this->state = 'quote_char';
break ;
 }
}}} }
function quote_char (  ) {
{$len = strcspn($this->data,"\x09\x20\x0A\"\\",$this->position);
$this->value .= substr($this->data,$this->position,$len);
$this->position += $len;
$this->state = 'value';
} }
function quote_escaped (  ) {
{$this->value .= $this->data[$this->position];
$this->position++;
$this->state = 'quote';
} }
function body (  ) {
{$this->body = substr($this->data,$this->position);
$this->state = 'emit';
} }
}class SimplePie_gzdecode{var $compressed_data;
var $compressed_size;
var $min_compressed_size = 18;
var $position = 0;
var $flags;
var $data;
var $MTIME;
var $XFL;
var $OS;
var $SI1;
var $SI2;
var $extra_field;
var $filename;
var $comment;
function __set ( $name,$value ) {
{trigger_error("Cannot write property $name",E_USER_ERROR);
} }
function SimplePie_gzdecode ( $data ) {
{$this->compressed_data = $data;
$this->compressed_size = strlen($data);
} }
function parse (  ) {
{if ( $this->compressed_size >= $this->min_compressed_size)
 {if ( substr($this->compressed_data,0,3) !== "\x1F\x8B\x08")
 {{$AspisRetTemp = false;
return $AspisRetTemp;
}}$this->flags = ord($this->compressed_data[3]);
if ( $this->flags > 0x1F)
 {{$AspisRetTemp = false;
return $AspisRetTemp;
}}$this->position += 4;
$mtime = substr($this->compressed_data,$this->position,4);
if ( current(unpack('S',"\x00\x01")) === 1)
 {$mtime = strrev($mtime);
}$this->MTIME = current(unpack('l',$mtime));
$this->position += 4;
$this->XFL = ord($this->compressed_data[$this->position++]);
$this->OS = ord($this->compressed_data[$this->position++]);
if ( $this->flags & 4)
 {$this->SI1 = $this->compressed_data[$this->position++];
$this->SI2 = $this->compressed_data[$this->position++];
if ( $this->SI2 === "\x00")
 {{$AspisRetTemp = false;
return $AspisRetTemp;
}}$len = current(unpack('v',substr($this->compressed_data,$this->position,2)));
$position += 2;
$this->min_compressed_size += $len + 4;
if ( $this->compressed_size >= $this->min_compressed_size)
 {$this->extra_field = substr($this->compressed_data,$this->position,$len);
$this->position += $len;
}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}}if ( $this->flags & 8)
 {$len = strcspn($this->compressed_data,"\x00",$this->position);
$this->min_compressed_size += $len + 1;
if ( $this->compressed_size >= $this->min_compressed_size)
 {$this->filename = substr($this->compressed_data,$this->position,$len);
$this->position += $len + 1;
}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}}if ( $this->flags & 16)
 {$len = strcspn($this->compressed_data,"\x00",$this->position);
$this->min_compressed_size += $len + 1;
if ( $this->compressed_size >= $this->min_compressed_size)
 {$this->comment = substr($this->compressed_data,$this->position,$len);
$this->position += $len + 1;
}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}}if ( $this->flags & 2)
 {$this->min_compressed_size += $len + 2;
if ( $this->compressed_size >= $this->min_compressed_size)
 {$crc = current(unpack('v',substr($this->compressed_data,$this->position,2)));
if ( (crc32(substr($this->compressed_data,0,$this->position)) & 0xFFFF) === $crc)
 {$this->position += 2;
}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}}if ( ($this->data = gzinflate(substr($this->compressed_data,$this->position,-8))) === false)
 {{$AspisRetTemp = false;
return $AspisRetTemp;
}}else 
{{$this->position = $this->compressed_size - 8;
}}$crc = current(unpack('V',substr($this->compressed_data,$this->position,4)));
$this->position += 4;
$isize = current(unpack('V',substr($this->compressed_data,$this->position,4)));
$this->position += 4;
if ( sprintf('%u',strlen($this->data) & 0xFFFFFFFF) !== sprintf('%u',$isize))
 {{$AspisRetTemp = false;
return $AspisRetTemp;
}}{$AspisRetTemp = true;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
}class SimplePie_Cache{function SimplePie_Cache (  ) {
{trigger_error('Please call SimplePie_Cache::create() instead of the constructor',E_USER_ERROR);
} }
function create ( $location,$filename,$extension ) {
{$location_iri = &new SimplePie_IRI($location);
switch ( $location_iri->get_scheme() ) {
case 'mysql':if ( extension_loaded('mysql'))
 {{$AspisRetTemp = new SimplePie_Cache_MySQL($location_iri,$filename,$extension);
return $AspisRetTemp;
}}break ;
default :{$AspisRetTemp = new SimplePie_Cache_File($location,$filename,$extension);
return $AspisRetTemp;
} }
} }
}class SimplePie_Cache_File{var $location;
var $filename;
var $extension;
var $name;
function SimplePie_Cache_File ( $location,$filename,$extension ) {
{$this->location = $location;
$this->filename = $filename;
$this->extension = $extension;
$this->name = "$this->location/$this->filename.$this->extension";
} }
function save ( $data ) {
{if ( file_exists($this->name) && is_writeable($this->name) || file_exists($this->location) && is_writeable($this->location))
 {if ( is_a($data,'SimplePie'))
 {$data = $data->data;
}$data = serialize($data);
if ( function_exists('file_put_contents'))
 {{$AspisRetTemp = (bool)file_put_contents($this->name,$data);
return $AspisRetTemp;
}}else 
{{$fp = fopen($this->name,'wb');
if ( $fp)
 {fwrite($fp,$data);
fclose($fp);
{$AspisRetTemp = true;
return $AspisRetTemp;
}}}}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function load (  ) {
{if ( file_exists($this->name) && is_readable($this->name))
 {{$AspisRetTemp = AspisUntainted_unserialize(file_get_contents($this->name));
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function mtime (  ) {
{if ( file_exists($this->name))
 {{$AspisRetTemp = filemtime($this->name);
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function touch (  ) {
{if ( file_exists($this->name))
 {{$AspisRetTemp = touch($this->name);
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function unlink (  ) {
{if ( file_exists($this->name))
 {{$AspisRetTemp = unlink($this->name);
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
}class SimplePie_Cache_DB{function prepare_simplepie_object_for_cache ( $data ) {
{$items = $data->get_items();
$items_by_id = array();
if ( !empty($items))
 {foreach ( $items as $item  )
{$items_by_id[$item->get_id()] = $item;
}if ( count($items_by_id) !== count($items))
 {$items_by_id = array();
foreach ( $items as $item  )
{$items_by_id[$item->get_id(true)] = $item;
}}if ( isset($data->data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0]))
 {$channel = &$data->data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0];
}elseif ( isset($data->data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0]))
 {$channel = &$data->data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0];
}elseif ( isset($data->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]))
 {$channel = &$data->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0];
}elseif ( isset($data->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_20]['channel'][0]))
 {$channel = &$data->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_20]['channel'][0];
}else 
{{$channel = null;
}}if ( $channel !== null)
 {if ( isset($channel['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['entry']))
 {unset($channel['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['entry']);
}if ( isset($channel['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['entry']))
 {unset($channel['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['entry']);
}if ( isset($channel['child'][SIMPLEPIE_NAMESPACE_RSS_10]['item']))
 {unset($channel['child'][SIMPLEPIE_NAMESPACE_RSS_10]['item']);
}if ( isset($channel['child'][SIMPLEPIE_NAMESPACE_RSS_090]['item']))
 {unset($channel['child'][SIMPLEPIE_NAMESPACE_RSS_090]['item']);
}if ( isset($channel['child'][SIMPLEPIE_NAMESPACE_RSS_20]['item']))
 {unset($channel['child'][SIMPLEPIE_NAMESPACE_RSS_20]['item']);
}}if ( isset($data->data['items']))
 {unset($data->data['items']);
}if ( isset($data->data['ordered_items']))
 {unset($data->data['ordered_items']);
}}{$AspisRetTemp = array(serialize($data->data),$items_by_id);
return $AspisRetTemp;
}} }
}class SimplePie_Cache_MySQL extends SimplePie_Cache_DB{var $mysql;
var $options;
var $id;
function SimplePie_Cache_MySQL ( $mysql_location,$name,$extension ) {
{$host = $mysql_location->get_host();
if ( SimplePie_Misc::stripos($host,'unix(') === 0 && substr($host,-1) === ')')
 {$server = ':' . substr($host,5,-1);
}else 
{{$server = $host;
if ( $mysql_location->get_port() !== null)
 {$server .= ':' . $mysql_location->get_port();
}}}if ( strpos($mysql_location->get_userinfo(),':') !== false)
 {list($username,$password) = explode(':',$mysql_location->get_userinfo(),2);
}else 
{{$username = $mysql_location->get_userinfo();
$password = null;
}}if ( $this->mysql = mysql_connect($server,$username,$password))
 {$this->id = $name . $extension;
$this->options = SimplePie_Misc::parse_str($mysql_location->get_query());
if ( !isset($this->options['prefix'][0]))
 {$this->options['prefix'][0] = '';
}if ( mysql_select_db(ltrim($mysql_location->get_path(),'/')) && mysql_query('SET NAMES utf8') && ($query = mysql_unbuffered_query('SHOW TABLES')))
 {$db = array();
while ( $row = mysql_fetch_row($query) )
{$db[] = $row[0];
}if ( !in_array($this->options['prefix'][0] . 'cache_data',$db))
 {if ( !mysql_query('CREATE TABLE `' . $this->options['prefix'][0] . 'cache_data` (`id` TEXT CHARACTER SET utf8 NOT NULL, `items` SMALLINT NOT NULL DEFAULT 0, `data` BLOB NOT NULL, `mtime` INT UNSIGNED NOT NULL, UNIQUE (`id`(125)))'))
 {$this->mysql = null;
}}if ( !in_array($this->options['prefix'][0] . 'items',$db))
 {if ( !mysql_query('CREATE TABLE `' . $this->options['prefix'][0] . 'items` (`feed_id` TEXT CHARACTER SET utf8 NOT NULL, `id` TEXT CHARACTER SET utf8 NOT NULL, `data` TEXT CHARACTER SET utf8 NOT NULL, `posted` INT UNSIGNED NOT NULL, INDEX `feed_id` (`feed_id`(125)))'))
 {$this->mysql = null;
}}}else 
{{$this->mysql = null;
}}}} }
function save ( $data ) {
{if ( $this->mysql)
 {$feed_id = "'" . mysql_real_escape_string($this->id) . "'";
if ( is_a($data,'SimplePie'))
 {if ( SIMPLEPIE_PHP5)
 {$data = clone ($data);
}$prepared = $this->prepare_simplepie_object_for_cache($data);
if ( $query = mysql_query('SELECT `id` FROM `' . $this->options['prefix'][0] . 'cache_data` WHERE `id` = ' . $feed_id,$this->mysql))
 {if ( mysql_num_rows($query))
 {$items = count($prepared[1]);
if ( $items)
 {$sql = 'UPDATE `' . $this->options['prefix'][0] . 'cache_data` SET `items` = ' . $items . ', `data` = \'' . mysql_real_escape_string($prepared[0]) . '\', `mtime` = ' . time() . ' WHERE `id` = ' . $feed_id;
}else 
{{$sql = 'UPDATE `' . $this->options['prefix'][0] . 'cache_data` SET `data` = \'' . mysql_real_escape_string($prepared[0]) . '\', `mtime` = ' . time() . ' WHERE `id` = ' . $feed_id;
}}if ( !mysql_query($sql,$this->mysql))
 {{$AspisRetTemp = false;
return $AspisRetTemp;
}}}elseif ( !mysql_query('INSERT INTO `' . $this->options['prefix'][0] . 'cache_data` (`id`, `items`, `data`, `mtime`) VALUES(' . $feed_id . ', ' . count($prepared[1]) . ', \'' . mysql_real_escape_string($prepared[0]) . '\', ' . time() . ')',$this->mysql))
 {{$AspisRetTemp = false;
return $AspisRetTemp;
}}$ids = array_keys($prepared[1]);
if ( !empty($ids))
 {foreach ( $ids as $id  )
{$database_ids[] = mysql_real_escape_string($id);
}if ( $query = mysql_unbuffered_query('SELECT `id` FROM `' . $this->options['prefix'][0] . 'items` WHERE `id` = \'' . implode('\' OR `id` = \'',$database_ids) . '\' AND `feed_id` = ' . $feed_id,$this->mysql))
 {$existing_ids = array();
while ( $row = mysql_fetch_row($query) )
{$existing_ids[] = $row[0];
}$new_ids = array_diff($ids,$existing_ids);
foreach ( $new_ids as $new_id  )
{if ( !($date = $prepared[1][$new_id]->get_date('U')))
 {$date = time();
}if ( !mysql_query('INSERT INTO `' . $this->options['prefix'][0] . 'items` (`feed_id`, `id`, `data`, `posted`) VALUES(' . $feed_id . ', \'' . mysql_real_escape_string($new_id) . '\', \'' . mysql_real_escape_string(serialize($prepared[1][$new_id]->data)) . '\', ' . $date . ')',$this->mysql))
 {{$AspisRetTemp = false;
return $AspisRetTemp;
}}}{$AspisRetTemp = true;
return $AspisRetTemp;
}}}else 
{{{$AspisRetTemp = true;
return $AspisRetTemp;
}}}}}elseif ( $query = mysql_query('SELECT `id` FROM `' . $this->options['prefix'][0] . 'cache_data` WHERE `id` = ' . $feed_id,$this->mysql))
 {if ( mysql_num_rows($query))
 {if ( mysql_query('UPDATE `' . $this->options['prefix'][0] . 'cache_data` SET `items` = 0, `data` = \'' . mysql_real_escape_string(serialize($data)) . '\', `mtime` = ' . time() . ' WHERE `id` = ' . $feed_id,$this->mysql))
 {{$AspisRetTemp = true;
return $AspisRetTemp;
}}}elseif ( mysql_query('INSERT INTO `' . $this->options['prefix'][0] . 'cache_data` (`id`, `items`, `data`, `mtime`) VALUES(\'' . mysql_real_escape_string($this->id) . '\', 0, \'' . mysql_real_escape_string(serialize($data)) . '\', ' . time() . ')',$this->mysql))
 {{$AspisRetTemp = true;
return $AspisRetTemp;
}}}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function load (  ) {
{if ( $this->mysql && ($query = mysql_query('SELECT `items`, `data` FROM `' . $this->options['prefix'][0] . 'cache_data` WHERE `id` = \'' . mysql_real_escape_string($this->id) . "'",$this->mysql)) && ($row = mysql_fetch_row($query)))
 {$data = AspisUntainted_unserialize($row[1]);
if ( isset($this->options['items'][0]))
 {$items = (int)$this->options['items'][0];
}else 
{{$items = (int)$row[0];
}}if ( $items !== 0)
 {if ( isset($data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0]))
 {$feed = &$data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0];
}elseif ( isset($data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0]))
 {$feed = &$data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0];
}elseif ( isset($data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]))
 {$feed = &$data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0];
}elseif ( isset($data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]))
 {$feed = &$data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0];
}else 
{{$feed = null;
}}if ( $feed !== null)
 {$sql = 'SELECT `data` FROM `' . $this->options['prefix'][0] . 'items` WHERE `feed_id` = \'' . mysql_real_escape_string($this->id) . '\' ORDER BY `posted` DESC';
if ( $items > 0)
 {$sql .= ' LIMIT ' . $items;
}if ( $query = mysql_unbuffered_query($sql,$this->mysql))
 {while ( $row = mysql_fetch_row($query) )
{$feed['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['entry'][] = AspisUntainted_unserialize($row[0]);
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}}}{$AspisRetTemp = $data;
return $AspisRetTemp;
}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function mtime (  ) {
{if ( $this->mysql && ($query = mysql_query('SELECT `mtime` FROM `' . $this->options['prefix'][0] . 'cache_data` WHERE `id` = \'' . mysql_real_escape_string($this->id) . "'",$this->mysql)) && ($row = mysql_fetch_row($query)))
 {{$AspisRetTemp = $row[0];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
function touch (  ) {
{if ( $this->mysql && ($query = mysql_query('UPDATE `' . $this->options['prefix'][0] . 'cache_data` SET `mtime` = ' . time() . ' WHERE `id` = \'' . mysql_real_escape_string($this->id) . "'",$this->mysql)) && mysql_affected_rows($this->mysql))
 {{$AspisRetTemp = true;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
function unlink (  ) {
{if ( $this->mysql && ($query = mysql_query('DELETE FROM `' . $this->options['prefix'][0] . 'cache_data` WHERE `id` = \'' . mysql_real_escape_string($this->id) . "'",$this->mysql)) && ($query2 = mysql_query('DELETE FROM `' . $this->options['prefix'][0] . 'items` WHERE `feed_id` = \'' . mysql_real_escape_string($this->id) . "'",$this->mysql)))
 {{$AspisRetTemp = true;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
}class SimplePie_Misc{function time_hms ( $seconds ) {
{$time = '';
$hours = floor($seconds / 3600);
$remainder = $seconds % 3600;
if ( $hours > 0)
 {$time .= $hours . ':';
}$minutes = floor($remainder / 60);
$seconds = $remainder % 60;
if ( $minutes < 10 && $hours > 0)
 {$minutes = '0' . $minutes;
}if ( $seconds < 10)
 {$seconds = '0' . $seconds;
}$time .= $minutes . ':';
$time .= $seconds;
{$AspisRetTemp = $time;
return $AspisRetTemp;
}} }
function absolutize_url ( $relative,$base ) {
{$iri = SimplePie_IRI::absolutize(new SimplePie_IRI($base),$relative);
{$AspisRetTemp = $iri->get_iri();
return $AspisRetTemp;
}} }
function remove_dot_segments ( $input ) {
{$output = '';
while ( strpos($input,'./') !== false || strpos($input,'/.') !== false || $input === '.' || $input === '..' )
{if ( strpos($input,'../') === 0)
 {$input = substr($input,3);
}elseif ( strpos($input,'./') === 0)
 {$input = substr($input,2);
}elseif ( strpos($input,'/./') === 0)
 {$input = substr_replace($input,'/',0,3);
}elseif ( $input === '/.')
 {$input = '/';
}elseif ( strpos($input,'/../') === 0)
 {$input = substr_replace($input,'/',0,4);
$output = substr_replace($output,'',strrpos($output,'/'));
}elseif ( $input === '/..')
 {$input = '/';
$output = substr_replace($output,'',strrpos($output,'/'));
}elseif ( $input === '.' || $input === '..')
 {$input = '';
}elseif ( ($pos = strpos($input,'/',1)) !== false)
 {$output .= substr($input,0,$pos);
$input = substr_replace($input,'',0,$pos);
}else 
{{$output .= $input;
$input = '';
}}}{$AspisRetTemp = $output . $input;
return $AspisRetTemp;
}} }
function get_element ( $realname,$string ) {
{$return = array();
$name = preg_quote($realname,'/');
if ( preg_match_all("/<($name)" . SIMPLEPIE_PCRE_HTML_ATTRIBUTE . "(>(.*)<\/$name>|(\/)?>)/siU",$string,$matches,PREG_SET_ORDER | PREG_OFFSET_CAPTURE))
 {for ( $i = 0,$total_matches = count($matches) ; $i < $total_matches ; $i++ )
{$return[$i]['tag'] = $realname;
$return[$i]['full'] = $matches[$i][0][0];
$return[$i]['offset'] = $matches[$i][0][1];
if ( strlen($matches[$i][3][0]) <= 2)
 {$return[$i]['self_closing'] = true;
}else 
{{$return[$i]['self_closing'] = false;
$return[$i]['content'] = $matches[$i][4][0];
}}$return[$i]['attribs'] = array();
if ( isset($matches[$i][2][0]) && preg_match_all('/[\x09\x0A\x0B\x0C\x0D\x20]+([^\x09\x0A\x0B\x0C\x0D\x20\x2F\x3E][^\x09\x0A\x0B\x0C\x0D\x20\x2F\x3D\x3E]*)(?:[\x09\x0A\x0B\x0C\x0D\x20]*=[\x09\x0A\x0B\x0C\x0D\x20]*(?:"([^"]*)"|\'([^\']*)\'|([^\x09\x0A\x0B\x0C\x0D\x20\x22\x27\x3E][^\x09\x0A\x0B\x0C\x0D\x20\x3E]*)?))?/',' ' . $matches[$i][2][0] . ' ',$attribs,PREG_SET_ORDER))
 {for ( $j = 0,$total_attribs = count($attribs) ; $j < $total_attribs ; $j++ )
{if ( count($attribs[$j]) === 2)
 {$attribs[$j][2] = $attribs[$j][1];
}$return[$i]['attribs'][strtolower($attribs[$j][1])]['data'] = SimplePie_Misc::entities_decode(end($attribs[$j]),'UTF-8');
}}}}{$AspisRetTemp = $return;
return $AspisRetTemp;
}} }
function element_implode ( $element ) {
{$full = "<$element[tag]";
foreach ( $element['attribs'] as $key =>$value )
{$key = strtolower($key);
$full .= " $key=\"" . htmlspecialchars($value['data']) . '"';
}if ( $element['self_closing'])
 {$full .= ' />';
}else 
{{$full .= ">$element[content]</$element[tag]>";
}}{$AspisRetTemp = $full;
return $AspisRetTemp;
}} }
function error ( $message,$level,$file,$line ) {
{if ( (ini_get('error_reporting') & $level) > 0)
 {switch ( $level ) {
case E_USER_ERROR:$note = 'PHP Error';
break ;
case E_USER_WARNING:$note = 'PHP Warning';
break ;
case E_USER_NOTICE:$note = 'PHP Notice';
break ;
default :$note = 'Unknown Error';
break ;
 }
error_log("$note: $message in $file on line $line",0);
}{$AspisRetTemp = $message;
return $AspisRetTemp;
}} }
function display_cached_file ( $identifier_url,$cache_location = './cache',$cache_extension = 'spc',$cache_class = 'SimplePie_Cache',$cache_name_function = 'md5' ) {
{$cache = AspisUntainted_call_user_func(array($cache_class,'create'),$cache_location,$identifier_url,$cache_extension);
if ( $file = $cache->load())
 {if ( isset($file['headers']['content-type']))
 {header('Content-type:' . $file['headers']['content-type']);
}else 
{{header('Content-type: application/octet-stream');
}}header('Expires: ' . gmdate('D, d M Y H:i:s',time() + 604800) . ' GMT');
echo $file['body'];
exit();
}exit('Cached file for ' . $identifier_url . ' cannot be found.');
} }
function fix_protocol ( $url,$http = 1 ) {
{$url = SimplePie_Misc::normalize_url($url);
$parsed = SimplePie_Misc::parse_url($url);
if ( $parsed['scheme'] !== '' && $parsed['scheme'] !== 'http' && $parsed['scheme'] !== 'https')
 {{$AspisRetTemp = SimplePie_Misc::fix_protocol(SimplePie_Misc::compress_parse_url('http',$parsed['authority'],$parsed['path'],$parsed['query'],$parsed['fragment']),$http);
return $AspisRetTemp;
}}if ( $parsed['scheme'] === '' && $parsed['authority'] === '' && !file_exists($url))
 {{$AspisRetTemp = SimplePie_Misc::fix_protocol(SimplePie_Misc::compress_parse_url('http',$parsed['path'],'',$parsed['query'],$parsed['fragment']),$http);
return $AspisRetTemp;
}}if ( $http === 2 && $parsed['scheme'] !== '')
 {{$AspisRetTemp = "feed:$url";
return $AspisRetTemp;
}}elseif ( $http === 3 && strtolower($parsed['scheme']) === 'http')
 {{$AspisRetTemp = substr_replace($url,'podcast',0,4);
return $AspisRetTemp;
}}elseif ( $http === 4 && strtolower($parsed['scheme']) === 'http')
 {{$AspisRetTemp = substr_replace($url,'itpc',0,4);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = $url;
return $AspisRetTemp;
}}}} }
function parse_url ( $url ) {
{$iri = &new SimplePie_IRI($url);
{$AspisRetTemp = array('scheme' => (string)$iri->get_scheme(),'authority' => (string)$iri->get_authority(),'path' => (string)$iri->get_path(),'query' => (string)$iri->get_query(),'fragment' => (string)$iri->get_fragment());
return $AspisRetTemp;
}} }
function compress_parse_url ( $scheme = '',$authority = '',$path = '',$query = '',$fragment = '' ) {
{$iri = &new SimplePie_IRI('');
$iri->set_scheme($scheme);
$iri->set_authority($authority);
$iri->set_path($path);
$iri->set_query($query);
$iri->set_fragment($fragment);
{$AspisRetTemp = $iri->get_iri();
return $AspisRetTemp;
}} }
function normalize_url ( $url ) {
{$iri = &new SimplePie_IRI($url);
{$AspisRetTemp = $iri->get_iri();
return $AspisRetTemp;
}} }
function percent_encoding_normalization ( $match ) {
{$integer = hexdec($match[1]);
if ( $integer >= 0x41 && $integer <= 0x5A || $integer >= 0x61 && $integer <= 0x7A || $integer >= 0x30 && $integer <= 0x39 || $integer === 0x2D || $integer === 0x2E || $integer === 0x5F || $integer === 0x7E)
 {{$AspisRetTemp = chr($integer);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = strtoupper($match[0]);
return $AspisRetTemp;
}}}} }
function utf8_bad_replace ( $str ) {
{if ( function_exists('iconv') && ($return = @iconv('UTF-8','UTF-8//IGNORE',$str)))
 {{$AspisRetTemp = $return;
return $AspisRetTemp;
}}elseif ( function_exists('mb_convert_encoding') && ($return = @mb_convert_encoding($str,'UTF-8','UTF-8')))
 {{$AspisRetTemp = $return;
return $AspisRetTemp;
}}elseif ( preg_match_all('/(?:[\x00-\x7F]|[\xC2-\xDF][\x80-\xBF]|\xE0[\xA0-\xBF][\x80-\xBF]|[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}|\xED[\x80-\x9F][\x80-\xBF]|\xF0[\x90-\xBF][\x80-\xBF]{2}|[\xF1-\xF3][\x80-\xBF]{3}|\xF4[\x80-\x8F][\x80-\xBF]{2})+/',$str,$matches))
 {{$AspisRetTemp = implode("\xEF\xBF\xBD",$matches[0]);
return $AspisRetTemp;
}}elseif ( $str !== '')
 {{$AspisRetTemp = "\xEF\xBF\xBD";
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = '';
return $AspisRetTemp;
}}}} }
function windows_1252_to_utf8 ( $string ) {
{static $convert_table = array("\x80" => "\xE2\x82\xAC","\x81" => "\xEF\xBF\xBD","\x82" => "\xE2\x80\x9A","\x83" => "\xC6\x92","\x84" => "\xE2\x80\x9E","\x85" => "\xE2\x80\xA6","\x86" => "\xE2\x80\xA0","\x87" => "\xE2\x80\xA1","\x88" => "\xCB\x86","\x89" => "\xE2\x80\xB0","\x8A" => "\xC5\xA0","\x8B" => "\xE2\x80\xB9","\x8C" => "\xC5\x92","\x8D" => "\xEF\xBF\xBD","\x8E" => "\xC5\xBD","\x8F" => "\xEF\xBF\xBD","\x90" => "\xEF\xBF\xBD","\x91" => "\xE2\x80\x98","\x92" => "\xE2\x80\x99","\x93" => "\xE2\x80\x9C","\x94" => "\xE2\x80\x9D","\x95" => "\xE2\x80\xA2","\x96" => "\xE2\x80\x93","\x97" => "\xE2\x80\x94","\x98" => "\xCB\x9C","\x99" => "\xE2\x84\xA2","\x9A" => "\xC5\xA1","\x9B" => "\xE2\x80\xBA","\x9C" => "\xC5\x93","\x9D" => "\xEF\xBF\xBD","\x9E" => "\xC5\xBE","\x9F" => "\xC5\xB8","\xA0" => "\xC2\xA0","\xA1" => "\xC2\xA1","\xA2" => "\xC2\xA2","\xA3" => "\xC2\xA3","\xA4" => "\xC2\xA4","\xA5" => "\xC2\xA5","\xA6" => "\xC2\xA6","\xA7" => "\xC2\xA7","\xA8" => "\xC2\xA8","\xA9" => "\xC2\xA9","\xAA" => "\xC2\xAA","\xAB" => "\xC2\xAB","\xAC" => "\xC2\xAC","\xAD" => "\xC2\xAD","\xAE" => "\xC2\xAE","\xAF" => "\xC2\xAF","\xB0" => "\xC2\xB0","\xB1" => "\xC2\xB1","\xB2" => "\xC2\xB2","\xB3" => "\xC2\xB3","\xB4" => "\xC2\xB4","\xB5" => "\xC2\xB5","\xB6" => "\xC2\xB6","\xB7" => "\xC2\xB7","\xB8" => "\xC2\xB8","\xB9" => "\xC2\xB9","\xBA" => "\xC2\xBA","\xBB" => "\xC2\xBB","\xBC" => "\xC2\xBC","\xBD" => "\xC2\xBD","\xBE" => "\xC2\xBE","\xBF" => "\xC2\xBF","\xC0" => "\xC3\x80","\xC1" => "\xC3\x81","\xC2" => "\xC3\x82","\xC3" => "\xC3\x83","\xC4" => "\xC3\x84","\xC5" => "\xC3\x85","\xC6" => "\xC3\x86","\xC7" => "\xC3\x87","\xC8" => "\xC3\x88","\xC9" => "\xC3\x89","\xCA" => "\xC3\x8A","\xCB" => "\xC3\x8B","\xCC" => "\xC3\x8C","\xCD" => "\xC3\x8D","\xCE" => "\xC3\x8E","\xCF" => "\xC3\x8F","\xD0" => "\xC3\x90","\xD1" => "\xC3\x91","\xD2" => "\xC3\x92","\xD3" => "\xC3\x93","\xD4" => "\xC3\x94","\xD5" => "\xC3\x95","\xD6" => "\xC3\x96","\xD7" => "\xC3\x97","\xD8" => "\xC3\x98","\xD9" => "\xC3\x99","\xDA" => "\xC3\x9A","\xDB" => "\xC3\x9B","\xDC" => "\xC3\x9C","\xDD" => "\xC3\x9D","\xDE" => "\xC3\x9E","\xDF" => "\xC3\x9F","\xE0" => "\xC3\xA0","\xE1" => "\xC3\xA1","\xE2" => "\xC3\xA2","\xE3" => "\xC3\xA3","\xE4" => "\xC3\xA4","\xE5" => "\xC3\xA5","\xE6" => "\xC3\xA6","\xE7" => "\xC3\xA7","\xE8" => "\xC3\xA8","\xE9" => "\xC3\xA9","\xEA" => "\xC3\xAA","\xEB" => "\xC3\xAB","\xEC" => "\xC3\xAC","\xED" => "\xC3\xAD","\xEE" => "\xC3\xAE","\xEF" => "\xC3\xAF","\xF0" => "\xC3\xB0","\xF1" => "\xC3\xB1","\xF2" => "\xC3\xB2","\xF3" => "\xC3\xB3","\xF4" => "\xC3\xB4","\xF5" => "\xC3\xB5","\xF6" => "\xC3\xB6","\xF7" => "\xC3\xB7","\xF8" => "\xC3\xB8","\xF9" => "\xC3\xB9","\xFA" => "\xC3\xBA","\xFB" => "\xC3\xBB","\xFC" => "\xC3\xBC","\xFD" => "\xC3\xBD","\xFE" => "\xC3\xBE","\xFF" => "\xC3\xBF");
{$AspisRetTemp = strtr($string,$convert_table);
return $AspisRetTemp;
}} }
function change_encoding ( $data,$input,$output ) {
{$input = SimplePie_Misc::encoding($input);
$output = SimplePie_Misc::encoding($output);
if ( $input === 'US-ASCII')
 {static $non_ascii_octects = '';
if ( !$non_ascii_octects)
 {for ( $i = 0x80 ; $i <= 0xFF ; $i++ )
{$non_ascii_octects .= chr($i);
}}$data = substr($data,0,strcspn($data,$non_ascii_octects));
}if ( $input === 'windows-1252' && $output === 'UTF-8')
 {{$AspisRetTemp = SimplePie_Misc::windows_1252_to_utf8($data);
return $AspisRetTemp;
}}elseif ( function_exists('mb_convert_encoding') && @mb_convert_encoding("\x80",'UTF-16BE',$input) !== "\x00\x80" && ($return = @mb_convert_encoding($data,$output,$input)))
 {{$AspisRetTemp = $return;
return $AspisRetTemp;
}}elseif ( function_exists('iconv') && ($return = @iconv($input,$output,$data)))
 {{$AspisRetTemp = $return;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
function encoding ( $charset ) {
{switch ( strtolower(preg_replace('/(?:[^a-zA-Z0-9]+|([^0-9])0+)/','\1',$charset)) ) {
case 'adobestandardencoding':case 'csadobestandardencoding':{$AspisRetTemp = 'Adobe-Standard-Encoding';
return $AspisRetTemp;
}case 'adobesymbolencoding':case 'cshppsmath':{$AspisRetTemp = 'Adobe-Symbol-Encoding';
return $AspisRetTemp;
}case 'ami1251':case 'amiga1251':{$AspisRetTemp = 'Amiga-1251';
return $AspisRetTemp;
}case 'ansix31101983':case 'csat5001983':case 'csiso99naplps':case 'isoir99':case 'naplps':{$AspisRetTemp = 'ANSI_X3.110-1983';
return $AspisRetTemp;
}case 'arabic7':case 'asmo449':case 'csiso89asmo449':case 'iso9036':case 'isoir89':{$AspisRetTemp = 'ASMO_449';
return $AspisRetTemp;
}case 'big5':case 'csbig5':case 'xxbig5':{$AspisRetTemp = 'Big5';
return $AspisRetTemp;
}case 'big5hkscs':{$AspisRetTemp = 'Big5-HKSCS';
return $AspisRetTemp;
}case 'bocu1':case 'csbocu1':{$AspisRetTemp = 'BOCU-1';
return $AspisRetTemp;
}case 'brf':case 'csbrf':{$AspisRetTemp = 'BRF';
return $AspisRetTemp;
}case 'bs4730':case 'csiso4unitedkingdom':case 'gb':case 'iso646gb':case 'isoir4':case 'uk':{$AspisRetTemp = 'BS_4730';
return $AspisRetTemp;
}case 'bsviewdata':case 'csiso47bsviewdata':case 'isoir47':{$AspisRetTemp = 'BS_viewdata';
return $AspisRetTemp;
}case 'cesu8':case 'cscesu8':{$AspisRetTemp = 'CESU-8';
return $AspisRetTemp;
}case 'ca':case 'csa71':case 'csaz243419851':case 'csiso121canadian1':case 'iso646ca':case 'isoir121':{$AspisRetTemp = 'CSA_Z243.4-1985-1';
return $AspisRetTemp;
}case 'csa72':case 'csaz243419852':case 'csiso122canadian2':case 'iso646ca2':case 'isoir122':{$AspisRetTemp = 'CSA_Z243.4-1985-2';
return $AspisRetTemp;
}case 'csaz24341985gr':case 'csiso123csaz24341985gr':case 'isoir123':{$AspisRetTemp = 'CSA_Z243.4-1985-gr';
return $AspisRetTemp;
}case 'csiso139csn369103':case 'csn369103':case 'isoir139':{$AspisRetTemp = 'CSN_369103';
return $AspisRetTemp;
}case 'csdecmcs':case 'dec':case 'decmcs':{$AspisRetTemp = 'DEC-MCS';
return $AspisRetTemp;
}case 'csiso21german':case 'de':case 'din66003':case 'iso646de':case 'isoir21':{$AspisRetTemp = 'DIN_66003';
return $AspisRetTemp;
}case 'csdkus':case 'dkus':{$AspisRetTemp = 'dk-us';
return $AspisRetTemp;
}case 'csiso646danish':case 'dk':case 'ds2089':case 'iso646dk':{$AspisRetTemp = 'DS_2089';
return $AspisRetTemp;
}case 'csibmebcdicatde':case 'ebcdicatde':{$AspisRetTemp = 'EBCDIC-AT-DE';
return $AspisRetTemp;
}case 'csebcdicatdea':case 'ebcdicatdea':{$AspisRetTemp = 'EBCDIC-AT-DE-A';
return $AspisRetTemp;
}case 'csebcdiccafr':case 'ebcdiccafr':{$AspisRetTemp = 'EBCDIC-CA-FR';
return $AspisRetTemp;
}case 'csebcdicdkno':case 'ebcdicdkno':{$AspisRetTemp = 'EBCDIC-DK-NO';
return $AspisRetTemp;
}case 'csebcdicdknoa':case 'ebcdicdknoa':{$AspisRetTemp = 'EBCDIC-DK-NO-A';
return $AspisRetTemp;
}case 'csebcdices':case 'ebcdices':{$AspisRetTemp = 'EBCDIC-ES';
return $AspisRetTemp;
}case 'csebcdicesa':case 'ebcdicesa':{$AspisRetTemp = 'EBCDIC-ES-A';
return $AspisRetTemp;
}case 'csebcdicess':case 'ebcdicess':{$AspisRetTemp = 'EBCDIC-ES-S';
return $AspisRetTemp;
}case 'csebcdicfise':case 'ebcdicfise':{$AspisRetTemp = 'EBCDIC-FI-SE';
return $AspisRetTemp;
}case 'csebcdicfisea':case 'ebcdicfisea':{$AspisRetTemp = 'EBCDIC-FI-SE-A';
return $AspisRetTemp;
}case 'csebcdicfr':case 'ebcdicfr':{$AspisRetTemp = 'EBCDIC-FR';
return $AspisRetTemp;
}case 'csebcdicit':case 'ebcdicit':{$AspisRetTemp = 'EBCDIC-IT';
return $AspisRetTemp;
}case 'csebcdicpt':case 'ebcdicpt':{$AspisRetTemp = 'EBCDIC-PT';
return $AspisRetTemp;
}case 'csebcdicuk':case 'ebcdicuk':{$AspisRetTemp = 'EBCDIC-UK';
return $AspisRetTemp;
}case 'csebcdicus':case 'ebcdicus':{$AspisRetTemp = 'EBCDIC-US';
return $AspisRetTemp;
}case 'csiso111ecmacyrillic':case 'ecmacyrillic':case 'isoir111':case 'koi8e':{$AspisRetTemp = 'ECMA-cyrillic';
return $AspisRetTemp;
}case 'csiso17spanish':case 'es':case 'iso646es':case 'isoir17':{$AspisRetTemp = 'ES';
return $AspisRetTemp;
}case 'csiso85spanish2':case 'es2':case 'iso646es2':case 'isoir85':{$AspisRetTemp = 'ES2';
return $AspisRetTemp;
}case 'cseucfixwidjapanese':case 'extendedunixcodefixedwidthforjapanese':{$AspisRetTemp = 'Extended_UNIX_Code_Fixed_Width_for_Japanese';
return $AspisRetTemp;
}case 'cseucpkdfmtjapanese':case 'eucjp':case 'extendedunixcodepackedformatforjapanese':{$AspisRetTemp = 'Extended_UNIX_Code_Packed_Format_for_Japanese';
return $AspisRetTemp;
}case 'gb18030':{$AspisRetTemp = 'GB18030';
return $AspisRetTemp;
}case 'chinese':case 'cp936':case 'csgb2312':case 'csiso58gb231280':case 'gb2312':case 'gb231280':case 'gbk':case 'isoir58':case 'ms936':case 'windows936':{$AspisRetTemp = 'GBK';
return $AspisRetTemp;
}case 'cn':case 'csiso57gb1988':case 'gb198880':case 'iso646cn':case 'isoir57':{$AspisRetTemp = 'GB_1988-80';
return $AspisRetTemp;
}case 'csiso153gost1976874':case 'gost1976874':case 'isoir153':case 'stsev35888':{$AspisRetTemp = 'GOST_19768-74';
return $AspisRetTemp;
}case 'csiso150':case 'csiso150greekccitt':case 'greekccitt':case 'isoir150':{$AspisRetTemp = 'greek-ccitt';
return $AspisRetTemp;
}case 'csiso88greek7':case 'greek7':case 'isoir88':{$AspisRetTemp = 'greek7';
return $AspisRetTemp;
}case 'csiso18greek7old':case 'greek7old':case 'isoir18':{$AspisRetTemp = 'greek7-old';
return $AspisRetTemp;
}case 'cshpdesktop':case 'hpdesktop':{$AspisRetTemp = 'HP-DeskTop';
return $AspisRetTemp;
}case 'cshplegal':case 'hplegal':{$AspisRetTemp = 'HP-Legal';
return $AspisRetTemp;
}case 'cshpmath8':case 'hpmath8':{$AspisRetTemp = 'HP-Math8';
return $AspisRetTemp;
}case 'cshppifont':case 'hppifont':{$AspisRetTemp = 'HP-Pi-font';
return $AspisRetTemp;
}case 'cshproman8':case 'hproman8':case 'r8':case 'roman8':{$AspisRetTemp = 'hp-roman8';
return $AspisRetTemp;
}case 'hzgb2312':{$AspisRetTemp = 'HZ-GB-2312';
return $AspisRetTemp;
}case 'csibmsymbols':case 'ibmsymbols':{$AspisRetTemp = 'IBM-Symbols';
return $AspisRetTemp;
}case 'csibmthai':case 'ibmthai':{$AspisRetTemp = 'IBM-Thai';
return $AspisRetTemp;
}case 'ccsid858':case 'cp858':case 'ibm858':case 'pcmultilingual850euro':{$AspisRetTemp = 'IBM00858';
return $AspisRetTemp;
}case 'ccsid924':case 'cp924':case 'ebcdiclatin9euro':case 'ibm924':{$AspisRetTemp = 'IBM00924';
return $AspisRetTemp;
}case 'ccsid1140':case 'cp1140':case 'ebcdicus37euro':case 'ibm1140':{$AspisRetTemp = 'IBM01140';
return $AspisRetTemp;
}case 'ccsid1141':case 'cp1141':case 'ebcdicde273euro':case 'ibm1141':{$AspisRetTemp = 'IBM01141';
return $AspisRetTemp;
}case 'ccsid1142':case 'cp1142':case 'ebcdicdk277euro':case 'ebcdicno277euro':case 'ibm1142':{$AspisRetTemp = 'IBM01142';
return $AspisRetTemp;
}case 'ccsid1143':case 'cp1143':case 'ebcdicfi278euro':case 'ebcdicse278euro':case 'ibm1143':{$AspisRetTemp = 'IBM01143';
return $AspisRetTemp;
}case 'ccsid1144':case 'cp1144':case 'ebcdicit280euro':case 'ibm1144':{$AspisRetTemp = 'IBM01144';
return $AspisRetTemp;
}case 'ccsid1145':case 'cp1145':case 'ebcdices284euro':case 'ibm1145':{$AspisRetTemp = 'IBM01145';
return $AspisRetTemp;
}case 'ccsid1146':case 'cp1146':case 'ebcdicgb285euro':case 'ibm1146':{$AspisRetTemp = 'IBM01146';
return $AspisRetTemp;
}case 'ccsid1147':case 'cp1147':case 'ebcdicfr297euro':case 'ibm1147':{$AspisRetTemp = 'IBM01147';
return $AspisRetTemp;
}case 'ccsid1148':case 'cp1148':case 'ebcdicinternational500euro':case 'ibm1148':{$AspisRetTemp = 'IBM01148';
return $AspisRetTemp;
}case 'ccsid1149':case 'cp1149':case 'ebcdicis871euro':case 'ibm1149':{$AspisRetTemp = 'IBM01149';
return $AspisRetTemp;
}case 'cp37':case 'csibm37':case 'ebcdiccpca':case 'ebcdiccpnl':case 'ebcdiccpus':case 'ebcdiccpwt':case 'ibm37':{$AspisRetTemp = 'IBM037';
return $AspisRetTemp;
}case 'cp38':case 'csibm38':case 'ebcdicint':case 'ibm38':{$AspisRetTemp = 'IBM038';
return $AspisRetTemp;
}case 'cp273':case 'csibm273':case 'ibm273':{$AspisRetTemp = 'IBM273';
return $AspisRetTemp;
}case 'cp274':case 'csibm274':case 'ebcdicbe':case 'ibm274':{$AspisRetTemp = 'IBM274';
return $AspisRetTemp;
}case 'cp275':case 'csibm275':case 'ebcdicbr':case 'ibm275':{$AspisRetTemp = 'IBM275';
return $AspisRetTemp;
}case 'csibm277':case 'ebcdiccpdk':case 'ebcdiccpno':case 'ibm277':{$AspisRetTemp = 'IBM277';
return $AspisRetTemp;
}case 'cp278':case 'csibm278':case 'ebcdiccpfi':case 'ebcdiccpse':case 'ibm278':{$AspisRetTemp = 'IBM278';
return $AspisRetTemp;
}case 'cp280':case 'csibm280':case 'ebcdiccpit':case 'ibm280':{$AspisRetTemp = 'IBM280';
return $AspisRetTemp;
}case 'cp281':case 'csibm281':case 'ebcdicjpe':case 'ibm281':{$AspisRetTemp = 'IBM281';
return $AspisRetTemp;
}case 'cp284':case 'csibm284':case 'ebcdiccpes':case 'ibm284':{$AspisRetTemp = 'IBM284';
return $AspisRetTemp;
}case 'cp285':case 'csibm285':case 'ebcdiccpgb':case 'ibm285':{$AspisRetTemp = 'IBM285';
return $AspisRetTemp;
}case 'cp290':case 'csibm290':case 'ebcdicjpkana':case 'ibm290':{$AspisRetTemp = 'IBM290';
return $AspisRetTemp;
}case 'cp297':case 'csibm297':case 'ebcdiccpfr':case 'ibm297':{$AspisRetTemp = 'IBM297';
return $AspisRetTemp;
}case 'cp420':case 'csibm420':case 'ebcdiccpar1':case 'ibm420':{$AspisRetTemp = 'IBM420';
return $AspisRetTemp;
}case 'cp423':case 'csibm423':case 'ebcdiccpgr':case 'ibm423':{$AspisRetTemp = 'IBM423';
return $AspisRetTemp;
}case 'cp424':case 'csibm424':case 'ebcdiccphe':case 'ibm424':{$AspisRetTemp = 'IBM424';
return $AspisRetTemp;
}case '437':case 'cp437':case 'cspc8codepage437':case 'ibm437':{$AspisRetTemp = 'IBM437';
return $AspisRetTemp;
}case 'cp500':case 'csibm500':case 'ebcdiccpbe':case 'ebcdiccpch':case 'ibm500':{$AspisRetTemp = 'IBM500';
return $AspisRetTemp;
}case 'cp775':case 'cspc775baltic':case 'ibm775':{$AspisRetTemp = 'IBM775';
return $AspisRetTemp;
}case '850':case 'cp850':case 'cspc850multilingual':case 'ibm850':{$AspisRetTemp = 'IBM850';
return $AspisRetTemp;
}case '851':case 'cp851':case 'csibm851':case 'ibm851':{$AspisRetTemp = 'IBM851';
return $AspisRetTemp;
}case '852':case 'cp852':case 'cspcp852':case 'ibm852':{$AspisRetTemp = 'IBM852';
return $AspisRetTemp;
}case '855':case 'cp855':case 'csibm855':case 'ibm855':{$AspisRetTemp = 'IBM855';
return $AspisRetTemp;
}case '857':case 'cp857':case 'csibm857':case 'ibm857':{$AspisRetTemp = 'IBM857';
return $AspisRetTemp;
}case '860':case 'cp860':case 'csibm860':case 'ibm860':{$AspisRetTemp = 'IBM860';
return $AspisRetTemp;
}case '861':case 'cp861':case 'cpis':case 'csibm861':case 'ibm861':{$AspisRetTemp = 'IBM861';
return $AspisRetTemp;
}case '862':case 'cp862':case 'cspc862latinhebrew':case 'ibm862':{$AspisRetTemp = 'IBM862';
return $AspisRetTemp;
}case '863':case 'cp863':case 'csibm863':case 'ibm863':{$AspisRetTemp = 'IBM863';
return $AspisRetTemp;
}case 'cp864':case 'csibm864':case 'ibm864':{$AspisRetTemp = 'IBM864';
return $AspisRetTemp;
}case '865':case 'cp865':case 'csibm865':case 'ibm865':{$AspisRetTemp = 'IBM865';
return $AspisRetTemp;
}case '866':case 'cp866':case 'csibm866':case 'ibm866':{$AspisRetTemp = 'IBM866';
return $AspisRetTemp;
}case 'cp868':case 'cpar':case 'csibm868':case 'ibm868':{$AspisRetTemp = 'IBM868';
return $AspisRetTemp;
}case '869':case 'cp869':case 'cpgr':case 'csibm869':case 'ibm869':{$AspisRetTemp = 'IBM869';
return $AspisRetTemp;
}case 'cp870':case 'csibm870':case 'ebcdiccproece':case 'ebcdiccpyu':case 'ibm870':{$AspisRetTemp = 'IBM870';
return $AspisRetTemp;
}case 'cp871':case 'csibm871':case 'ebcdiccpis':case 'ibm871':{$AspisRetTemp = 'IBM871';
return $AspisRetTemp;
}case 'cp880':case 'csibm880':case 'ebcdiccyrillic':case 'ibm880':{$AspisRetTemp = 'IBM880';
return $AspisRetTemp;
}case 'cp891':case 'csibm891':case 'ibm891':{$AspisRetTemp = 'IBM891';
return $AspisRetTemp;
}case 'cp903':case 'csibm903':case 'ibm903':{$AspisRetTemp = 'IBM903';
return $AspisRetTemp;
}case '904':case 'cp904':case 'csibbm904':case 'ibm904':{$AspisRetTemp = 'IBM904';
return $AspisRetTemp;
}case 'cp905':case 'csibm905':case 'ebcdiccptr':case 'ibm905':{$AspisRetTemp = 'IBM905';
return $AspisRetTemp;
}case 'cp918':case 'csibm918':case 'ebcdiccpar2':case 'ibm918':{$AspisRetTemp = 'IBM918';
return $AspisRetTemp;
}case 'cp1026':case 'csibm1026':case 'ibm1026':{$AspisRetTemp = 'IBM1026';
return $AspisRetTemp;
}case 'ibm1047':{$AspisRetTemp = 'IBM1047';
return $AspisRetTemp;
}case 'csiso143iecp271':case 'iecp271':case 'isoir143':{$AspisRetTemp = 'IEC_P27-1';
return $AspisRetTemp;
}case 'csiso49inis':case 'inis':case 'isoir49':{$AspisRetTemp = 'INIS';
return $AspisRetTemp;
}case 'csiso50inis8':case 'inis8':case 'isoir50':{$AspisRetTemp = 'INIS-8';
return $AspisRetTemp;
}case 'csiso51iniscyrillic':case 'iniscyrillic':case 'isoir51':{$AspisRetTemp = 'INIS-cyrillic';
return $AspisRetTemp;
}case 'csinvariant':case 'invariant':{$AspisRetTemp = 'INVARIANT';
return $AspisRetTemp;
}case 'iso2022cn':{$AspisRetTemp = 'ISO-2022-CN';
return $AspisRetTemp;
}case 'iso2022cnext':{$AspisRetTemp = 'ISO-2022-CN-EXT';
return $AspisRetTemp;
}case 'csiso2022jp':case 'iso2022jp':{$AspisRetTemp = 'ISO-2022-JP';
return $AspisRetTemp;
}case 'csiso2022jp2':case 'iso2022jp2':{$AspisRetTemp = 'ISO-2022-JP-2';
return $AspisRetTemp;
}case 'csiso2022kr':case 'iso2022kr':{$AspisRetTemp = 'ISO-2022-KR';
return $AspisRetTemp;
}case 'cswindows30latin1':case 'iso88591windows30latin1':{$AspisRetTemp = 'ISO-8859-1-Windows-3.0-Latin-1';
return $AspisRetTemp;
}case 'cswindows31latin1':case 'iso88591windows31latin1':{$AspisRetTemp = 'ISO-8859-1-Windows-3.1-Latin-1';
return $AspisRetTemp;
}case 'csisolatin2':case 'iso88592':case 'iso885921987':case 'isoir101':case 'l2':case 'latin2':{$AspisRetTemp = 'ISO-8859-2';
return $AspisRetTemp;
}case 'cswindows31latin2':case 'iso88592windowslatin2':{$AspisRetTemp = 'ISO-8859-2-Windows-Latin-2';
return $AspisRetTemp;
}case 'csisolatin3':case 'iso88593':case 'iso885931988':case 'isoir109':case 'l3':case 'latin3':{$AspisRetTemp = 'ISO-8859-3';
return $AspisRetTemp;
}case 'csisolatin4':case 'iso88594':case 'iso885941988':case 'isoir110':case 'l4':case 'latin4':{$AspisRetTemp = 'ISO-8859-4';
return $AspisRetTemp;
}case 'csisolatincyrillic':case 'cyrillic':case 'iso88595':case 'iso885951988':case 'isoir144':{$AspisRetTemp = 'ISO-8859-5';
return $AspisRetTemp;
}case 'arabic':case 'asmo708':case 'csisolatinarabic':case 'ecma114':case 'iso88596':case 'iso885961987':case 'isoir127':{$AspisRetTemp = 'ISO-8859-6';
return $AspisRetTemp;
}case 'csiso88596e':case 'iso88596e':{$AspisRetTemp = 'ISO-8859-6-E';
return $AspisRetTemp;
}case 'csiso88596i':case 'iso88596i':{$AspisRetTemp = 'ISO-8859-6-I';
return $AspisRetTemp;
}case 'csisolatingreek':case 'ecma118':case 'elot928':case 'greek':case 'greek8':case 'iso88597':case 'iso885971987':case 'isoir126':{$AspisRetTemp = 'ISO-8859-7';
return $AspisRetTemp;
}case 'csisolatinhebrew':case 'hebrew':case 'iso88598':case 'iso885981988':case 'isoir138':{$AspisRetTemp = 'ISO-8859-8';
return $AspisRetTemp;
}case 'csiso88598e':case 'iso88598e':{$AspisRetTemp = 'ISO-8859-8-E';
return $AspisRetTemp;
}case 'csiso88598i':case 'iso88598i':{$AspisRetTemp = 'ISO-8859-8-I';
return $AspisRetTemp;
}case 'cswindows31latin5':case 'iso88599windowslatin5':{$AspisRetTemp = 'ISO-8859-9-Windows-Latin-5';
return $AspisRetTemp;
}case 'csisolatin6':case 'iso885910':case 'iso8859101992':case 'isoir157':case 'l6':case 'latin6':{$AspisRetTemp = 'ISO-8859-10';
return $AspisRetTemp;
}case 'iso885913':{$AspisRetTemp = 'ISO-8859-13';
return $AspisRetTemp;
}case 'iso885914':case 'iso8859141998':case 'isoceltic':case 'isoir199':case 'l8':case 'latin8':{$AspisRetTemp = 'ISO-8859-14';
return $AspisRetTemp;
}case 'iso885915':case 'latin9':{$AspisRetTemp = 'ISO-8859-15';
return $AspisRetTemp;
}case 'iso885916':case 'iso8859162001':case 'isoir226':case 'l10':case 'latin10':{$AspisRetTemp = 'ISO-8859-16';
return $AspisRetTemp;
}case 'iso10646j1':{$AspisRetTemp = 'ISO-10646-J-1';
return $AspisRetTemp;
}case 'csunicode':case 'iso10646ucs2':{$AspisRetTemp = 'ISO-10646-UCS-2';
return $AspisRetTemp;
}case 'csucs4':case 'iso10646ucs4':{$AspisRetTemp = 'ISO-10646-UCS-4';
return $AspisRetTemp;
}case 'csunicodeascii':case 'iso10646ucsbasic':{$AspisRetTemp = 'ISO-10646-UCS-Basic';
return $AspisRetTemp;
}case 'csunicodelatin1':case 'iso10646':case 'iso10646unicodelatin1':{$AspisRetTemp = 'ISO-10646-Unicode-Latin1';
return $AspisRetTemp;
}case 'csiso10646utf1':case 'iso10646utf1':{$AspisRetTemp = 'ISO-10646-UTF-1';
return $AspisRetTemp;
}case 'csiso115481':case 'iso115481':case 'isotr115481':{$AspisRetTemp = 'ISO-11548-1';
return $AspisRetTemp;
}case 'csiso90':case 'isoir90':{$AspisRetTemp = 'iso-ir-90';
return $AspisRetTemp;
}case 'csunicodeibm1261':case 'isounicodeibm1261':{$AspisRetTemp = 'ISO-Unicode-IBM-1261';
return $AspisRetTemp;
}case 'csunicodeibm1264':case 'isounicodeibm1264':{$AspisRetTemp = 'ISO-Unicode-IBM-1264';
return $AspisRetTemp;
}case 'csunicodeibm1265':case 'isounicodeibm1265':{$AspisRetTemp = 'ISO-Unicode-IBM-1265';
return $AspisRetTemp;
}case 'csunicodeibm1268':case 'isounicodeibm1268':{$AspisRetTemp = 'ISO-Unicode-IBM-1268';
return $AspisRetTemp;
}case 'csunicodeibm1276':case 'isounicodeibm1276':{$AspisRetTemp = 'ISO-Unicode-IBM-1276';
return $AspisRetTemp;
}case 'csiso646basic1983':case 'iso646basic1983':case 'ref':{$AspisRetTemp = 'ISO_646.basic:1983';
return $AspisRetTemp;
}case 'csiso2intlrefversion':case 'irv':case 'iso646irv1983':case 'isoir2':{$AspisRetTemp = 'ISO_646.irv:1983';
return $AspisRetTemp;
}case 'csiso2033':case 'e13b':case 'iso20331983':case 'isoir98':{$AspisRetTemp = 'ISO_2033-1983';
return $AspisRetTemp;
}case 'csiso5427cyrillic':case 'iso5427':case 'isoir37':{$AspisRetTemp = 'ISO_5427';
return $AspisRetTemp;
}case 'iso5427cyrillic1981':case 'iso54271981':case 'isoir54':{$AspisRetTemp = 'ISO_5427:1981';
return $AspisRetTemp;
}case 'csiso5428greek':case 'iso54281980':case 'isoir55':{$AspisRetTemp = 'ISO_5428:1980';
return $AspisRetTemp;
}case 'csiso6937add':case 'iso6937225':case 'isoir152':{$AspisRetTemp = 'ISO_6937-2-25';
return $AspisRetTemp;
}case 'csisotextcomm':case 'iso69372add':case 'isoir142':{$AspisRetTemp = 'ISO_6937-2-add';
return $AspisRetTemp;
}case 'csiso8859supp':case 'iso8859supp':case 'isoir154':case 'latin125':{$AspisRetTemp = 'ISO_8859-supp';
return $AspisRetTemp;
}case 'csiso10367box':case 'iso10367box':case 'isoir155':{$AspisRetTemp = 'ISO_10367-box';
return $AspisRetTemp;
}case 'csiso15italian':case 'iso646it':case 'isoir15':case 'it':{$AspisRetTemp = 'IT';
return $AspisRetTemp;
}case 'csiso13jisc6220jp':case 'isoir13':case 'jisc62201969':case 'jisc62201969jp':case 'katakana':case 'x2017':{$AspisRetTemp = 'JIS_C6220-1969-jp';
return $AspisRetTemp;
}case 'csiso14jisc6220ro':case 'iso646jp':case 'isoir14':case 'jisc62201969ro':case 'jp':{$AspisRetTemp = 'JIS_C6220-1969-ro';
return $AspisRetTemp;
}case 'csiso42jisc62261978':case 'isoir42':case 'jisc62261978':{$AspisRetTemp = 'JIS_C6226-1978';
return $AspisRetTemp;
}case 'csiso87jisx208':case 'isoir87':case 'jisc62261983':case 'jisx2081983':case 'x208':{$AspisRetTemp = 'JIS_C6226-1983';
return $AspisRetTemp;
}case 'csiso91jisc62291984a':case 'isoir91':case 'jisc62291984a':case 'jpocra':{$AspisRetTemp = 'JIS_C6229-1984-a';
return $AspisRetTemp;
}case 'csiso92jisc62991984b':case 'iso646jpocrb':case 'isoir92':case 'jisc62291984b':case 'jpocrb':{$AspisRetTemp = 'JIS_C6229-1984-b';
return $AspisRetTemp;
}case 'csiso93jis62291984badd':case 'isoir93':case 'jisc62291984badd':case 'jpocrbadd':{$AspisRetTemp = 'JIS_C6229-1984-b-add';
return $AspisRetTemp;
}case 'csiso94jis62291984hand':case 'isoir94':case 'jisc62291984hand':case 'jpocrhand':{$AspisRetTemp = 'JIS_C6229-1984-hand';
return $AspisRetTemp;
}case 'csiso95jis62291984handadd':case 'isoir95':case 'jisc62291984handadd':case 'jpocrhandadd':{$AspisRetTemp = 'JIS_C6229-1984-hand-add';
return $AspisRetTemp;
}case 'csiso96jisc62291984kana':case 'isoir96':case 'jisc62291984kana':{$AspisRetTemp = 'JIS_C6229-1984-kana';
return $AspisRetTemp;
}case 'csjisencoding':case 'jisencoding':{$AspisRetTemp = 'JIS_Encoding';
return $AspisRetTemp;
}case 'cshalfwidthkatakana':case 'jisx201':case 'x201':{$AspisRetTemp = 'JIS_X0201';
return $AspisRetTemp;
}case 'csiso159jisx2121990':case 'isoir159':case 'jisx2121990':case 'x212':{$AspisRetTemp = 'JIS_X0212-1990';
return $AspisRetTemp;
}case 'csiso141jusib1002':case 'iso646yu':case 'isoir141':case 'js':case 'jusib1002':case 'yu':{$AspisRetTemp = 'JUS_I.B1.002';
return $AspisRetTemp;
}case 'csiso147macedonian':case 'isoir147':case 'jusib1003mac':case 'macedonian':{$AspisRetTemp = 'JUS_I.B1.003-mac';
return $AspisRetTemp;
}case 'csiso146serbian':case 'isoir146':case 'jusib1003serb':case 'serbian':{$AspisRetTemp = 'JUS_I.B1.003-serb';
return $AspisRetTemp;
}case 'koi7switched':{$AspisRetTemp = 'KOI7-switched';
return $AspisRetTemp;
}case 'cskoi8r':case 'koi8r':{$AspisRetTemp = 'KOI8-R';
return $AspisRetTemp;
}case 'koi8u':{$AspisRetTemp = 'KOI8-U';
return $AspisRetTemp;
}case 'csksc5636':case 'iso646kr':case 'ksc5636':{$AspisRetTemp = 'KSC5636';
return $AspisRetTemp;
}case 'cskz1048':case 'kz1048':case 'rk1048':case 'strk10482002':{$AspisRetTemp = 'KZ-1048';
return $AspisRetTemp;
}case 'csiso19latingreek':case 'isoir19':case 'latingreek':{$AspisRetTemp = 'latin-greek';
return $AspisRetTemp;
}case 'csiso27latingreek1':case 'isoir27':case 'latingreek1':{$AspisRetTemp = 'Latin-greek-1';
return $AspisRetTemp;
}case 'csiso158lap':case 'isoir158':case 'lap':case 'latinlap':{$AspisRetTemp = 'latin-lap';
return $AspisRetTemp;
}case 'csmacintosh':case 'mac':case 'macintosh':{$AspisRetTemp = 'macintosh';
return $AspisRetTemp;
}case 'csmicrosoftpublishing':case 'microsoftpublishing':{$AspisRetTemp = 'Microsoft-Publishing';
return $AspisRetTemp;
}case 'csmnem':case 'mnem':{$AspisRetTemp = 'MNEM';
return $AspisRetTemp;
}case 'csmnemonic':case 'mnemonic':{$AspisRetTemp = 'MNEMONIC';
return $AspisRetTemp;
}case 'csiso86hungarian':case 'hu':case 'iso646hu':case 'isoir86':case 'msz77953':{$AspisRetTemp = 'MSZ_7795.3';
return $AspisRetTemp;
}case 'csnatsdano':case 'isoir91':case 'natsdano':{$AspisRetTemp = 'NATS-DANO';
return $AspisRetTemp;
}case 'csnatsdanoadd':case 'isoir92':case 'natsdanoadd':{$AspisRetTemp = 'NATS-DANO-ADD';
return $AspisRetTemp;
}case 'csnatssefi':case 'isoir81':case 'natssefi':{$AspisRetTemp = 'NATS-SEFI';
return $AspisRetTemp;
}case 'csnatssefiadd':case 'isoir82':case 'natssefiadd':{$AspisRetTemp = 'NATS-SEFI-ADD';
return $AspisRetTemp;
}case 'csiso151cuba':case 'cuba':case 'iso646cu':case 'isoir151':case 'ncnc1081':{$AspisRetTemp = 'NC_NC00-10:81';
return $AspisRetTemp;
}case 'csiso69french':case 'fr':case 'iso646fr':case 'isoir69':case 'nfz62010':{$AspisRetTemp = 'NF_Z_62-010';
return $AspisRetTemp;
}case 'csiso25french':case 'iso646fr1':case 'isoir25':case 'nfz620101973':{$AspisRetTemp = 'NF_Z_62-010_(1973)';
return $AspisRetTemp;
}case 'csiso60danishnorwegian':case 'csiso60norwegian1':case 'iso646no':case 'isoir60':case 'no':case 'ns45511':{$AspisRetTemp = 'NS_4551-1';
return $AspisRetTemp;
}case 'csiso61norwegian2':case 'iso646no2':case 'isoir61':case 'no2':case 'ns45512':{$AspisRetTemp = 'NS_4551-2';
return $AspisRetTemp;
}case 'osdebcdicdf3irv':{$AspisRetTemp = 'OSD_EBCDIC_DF03_IRV';
return $AspisRetTemp;
}case 'osdebcdicdf41':{$AspisRetTemp = 'OSD_EBCDIC_DF04_1';
return $AspisRetTemp;
}case 'osdebcdicdf415':{$AspisRetTemp = 'OSD_EBCDIC_DF04_15';
return $AspisRetTemp;
}case 'cspc8danishnorwegian':case 'pc8danishnorwegian':{$AspisRetTemp = 'PC8-Danish-Norwegian';
return $AspisRetTemp;
}case 'cspc8turkish':case 'pc8turkish':{$AspisRetTemp = 'PC8-Turkish';
return $AspisRetTemp;
}case 'csiso16portuguese':case 'iso646pt':case 'isoir16':case 'pt':{$AspisRetTemp = 'PT';
return $AspisRetTemp;
}case 'csiso84portuguese2':case 'iso646pt2':case 'isoir84':case 'pt2':{$AspisRetTemp = 'PT2';
return $AspisRetTemp;
}case 'cp154':case 'csptcp154':case 'cyrillicasian':case 'pt154':case 'ptcp154':{$AspisRetTemp = 'PTCP154';
return $AspisRetTemp;
}case 'scsu':{$AspisRetTemp = 'SCSU';
return $AspisRetTemp;
}case 'csiso10swedish':case 'fi':case 'iso646fi':case 'iso646se':case 'isoir10':case 'se':case 'sen850200b':{$AspisRetTemp = 'SEN_850200_B';
return $AspisRetTemp;
}case 'csiso11swedishfornames':case 'iso646se2':case 'isoir11':case 'se2':case 'sen850200c':{$AspisRetTemp = 'SEN_850200_C';
return $AspisRetTemp;
}case 'csshiftjis':case 'mskanji':case 'shiftjis':{$AspisRetTemp = 'Shift_JIS';
return $AspisRetTemp;
}case 'csiso102t617bit':case 'isoir102':case 't617bit':{$AspisRetTemp = 'T.61-7bit';
return $AspisRetTemp;
}case 'csiso103t618bit':case 'isoir103':case 't61':case 't618bit':{$AspisRetTemp = 'T.61-8bit';
return $AspisRetTemp;
}case 'csiso128t101g2':case 'isoir128':case 't101g2':{$AspisRetTemp = 'T.101-G2';
return $AspisRetTemp;
}case 'cstscii':case 'tscii':{$AspisRetTemp = 'TSCII';
return $AspisRetTemp;
}case 'csunicode11':case 'unicode11':{$AspisRetTemp = 'UNICODE-1-1';
return $AspisRetTemp;
}case 'csunicode11utf7':case 'unicode11utf7':{$AspisRetTemp = 'UNICODE-1-1-UTF-7';
return $AspisRetTemp;
}case 'csunknown8bit':case 'unknown8bit':{$AspisRetTemp = 'UNKNOWN-8BIT';
return $AspisRetTemp;
}case 'ansix341968':case 'ansix341986':case 'ascii':case 'cp367':case 'csascii':case 'ibm367':case 'iso646irv1991':case 'iso646us':case 'isoir6':case 'us':case 'usascii':{$AspisRetTemp = 'US-ASCII';
return $AspisRetTemp;
}case 'csusdk':case 'usdk':{$AspisRetTemp = 'us-dk';
return $AspisRetTemp;
}case 'utf7':{$AspisRetTemp = 'UTF-7';
return $AspisRetTemp;
}case 'utf8':{$AspisRetTemp = 'UTF-8';
return $AspisRetTemp;
}case 'utf16':{$AspisRetTemp = 'UTF-16';
return $AspisRetTemp;
}case 'utf16be':{$AspisRetTemp = 'UTF-16BE';
return $AspisRetTemp;
}case 'utf16le':{$AspisRetTemp = 'UTF-16LE';
return $AspisRetTemp;
}case 'utf32':{$AspisRetTemp = 'UTF-32';
return $AspisRetTemp;
}case 'utf32be':{$AspisRetTemp = 'UTF-32BE';
return $AspisRetTemp;
}case 'utf32le':{$AspisRetTemp = 'UTF-32LE';
return $AspisRetTemp;
}case 'csventurainternational':case 'venturainternational':{$AspisRetTemp = 'Ventura-International';
return $AspisRetTemp;
}case 'csventuramath':case 'venturamath':{$AspisRetTemp = 'Ventura-Math';
return $AspisRetTemp;
}case 'csventuraus':case 'venturaus':{$AspisRetTemp = 'Ventura-US';
return $AspisRetTemp;
}case 'csiso70videotexsupp1':case 'isoir70':case 'videotexsuppl':{$AspisRetTemp = 'videotex-suppl';
return $AspisRetTemp;
}case 'csviqr':case 'viqr':{$AspisRetTemp = 'VIQR';
return $AspisRetTemp;
}case 'csviscii':case 'viscii':{$AspisRetTemp = 'VISCII';
return $AspisRetTemp;
}case 'cswindows31j':case 'windows31j':{$AspisRetTemp = 'Windows-31J';
return $AspisRetTemp;
}case 'iso885911':case 'tis620':{$AspisRetTemp = 'windows-874';
return $AspisRetTemp;
}case 'cseuckr':case 'csksc56011987':case 'euckr':case 'isoir149':case 'korean':case 'ksc5601':case 'ksc56011987':case 'ksc56011989':case 'windows949':{$AspisRetTemp = 'windows-949';
return $AspisRetTemp;
}case 'windows1250':{$AspisRetTemp = 'windows-1250';
return $AspisRetTemp;
}case 'windows1251':{$AspisRetTemp = 'windows-1251';
return $AspisRetTemp;
}case 'cp819':case 'csisolatin1':case 'ibm819':case 'iso88591':case 'iso885911987':case 'isoir100':case 'l1':case 'latin1':case 'windows1252':{$AspisRetTemp = 'windows-1252';
return $AspisRetTemp;
}case 'windows1253':{$AspisRetTemp = 'windows-1253';
return $AspisRetTemp;
}case 'csisolatin5':case 'iso88599':case 'iso885991989':case 'isoir148':case 'l5':case 'latin5':case 'windows1254':{$AspisRetTemp = 'windows-1254';
return $AspisRetTemp;
}case 'windows1255':{$AspisRetTemp = 'windows-1255';
return $AspisRetTemp;
}case 'windows1256':{$AspisRetTemp = 'windows-1256';
return $AspisRetTemp;
}case 'windows1257':{$AspisRetTemp = 'windows-1257';
return $AspisRetTemp;
}case 'windows1258':{$AspisRetTemp = 'windows-1258';
return $AspisRetTemp;
}default :{$AspisRetTemp = $charset;
return $AspisRetTemp;
} }
} }
function get_curl_version (  ) {
{if ( is_array($curl = curl_version()))
 {$curl = $curl['version'];
}elseif ( substr($curl,0,5) === 'curl/')
 {$curl = substr($curl,5,strcspn($curl,"\x09\x0A\x0B\x0C\x0D",5));
}elseif ( substr($curl,0,8) === 'libcurl/')
 {$curl = substr($curl,8,strcspn($curl,"\x09\x0A\x0B\x0C\x0D",8));
}else 
{{$curl = 0;
}}{$AspisRetTemp = $curl;
return $AspisRetTemp;
}} }
function is_subclass_of ( $class1,$class2 ) {
{if ( func_num_args() !== 2)
 {trigger_error('Wrong parameter count for SimplePie_Misc::is_subclass_of()',E_USER_WARNING);
}elseif ( version_compare(PHP_VERSION,'5.0.3','>=') || is_object($class1))
 {{$AspisRetTemp = is_subclass_of($class1,$class2);
return $AspisRetTemp;
}}elseif ( is_string($class1) && is_string($class2))
 {if ( class_exists($class1))
 {if ( class_exists($class2))
 {$class2 = strtolower($class2);
while ( $class1 = strtolower(get_parent_class($class1)) )
{if ( $class1 === $class2)
 {{$AspisRetTemp = true;
return $AspisRetTemp;
}}}}}else 
{{trigger_error('Unknown class passed as parameter',E_USER_WARNNG);
}}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function strip_comments ( $data ) {
{$output = '';
while ( ($start = strpos($data,'<!--')) !== false )
{$output .= substr($data,0,$start);
if ( ($end = strpos($data,'-->',$start)) !== false)
 {$data = substr_replace($data,'',0,$end + 3);
}else 
{{$data = '';
}}}{$AspisRetTemp = $output . $data;
return $AspisRetTemp;
}} }
function parse_date ( $dt ) {
{$parser = SimplePie_Parse_Date::get();
{$AspisRetTemp = $parser->parse($dt);
return $AspisRetTemp;
}} }
function entities_decode ( $data ) {
{$decoder = &new SimplePie_Decode_HTML_Entities($data);
{$AspisRetTemp = $decoder->parse();
return $AspisRetTemp;
}} }
function uncomment_rfc822 ( $string ) {
{$string = (string)$string;
$position = 0;
$length = strlen($string);
$depth = 0;
$output = '';
while ( $position < $length && ($pos = strpos($string,'(',$position)) !== false )
{$output .= substr($string,$position,$pos - $position);
$position = $pos + 1;
if ( $string[$pos - 1] !== '\\')
 {$depth++;
while ( $depth && $position < $length )
{$position += strcspn($string,'()',$position);
if ( $string[$position - 1] === '\\')
 {$position++;
continue ;
}elseif ( isset($string[$position]))
 {switch ( $string[$position] ) {
case '(':$depth++;
break ;
case ')':$depth--;
break ;
 }
$position++;
}else 
{{break ;
}}}}else 
{{$output .= '(';
}}}$output .= substr($string,$position);
{$AspisRetTemp = $output;
return $AspisRetTemp;
}} }
function parse_mime ( $mime ) {
{if ( ($pos = strpos($mime,';')) === false)
 {{$AspisRetTemp = trim($mime);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = trim(substr($mime,0,$pos));
return $AspisRetTemp;
}}}} }
function htmlspecialchars_decode ( $string,$quote_style ) {
{if ( function_exists('htmlspecialchars_decode'))
 {{$AspisRetTemp = htmlspecialchars_decode($string,$quote_style);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = strtr($string,array_flip(get_html_translation_table(HTML_SPECIALCHARS,$quote_style)));
return $AspisRetTemp;
}}}} }
function atom_03_construct_type ( $attribs ) {
{if ( isset($attribs['']['mode']) && strtolower(trim($attribs['']['mode']) === 'base64'))
 {$mode = SIMPLEPIE_CONSTRUCT_BASE64;
}else 
{{$mode = SIMPLEPIE_CONSTRUCT_NONE;
}}if ( isset($attribs['']['type']))
 {switch ( strtolower(trim($attribs['']['type'])) ) {
case 'text':case 'text/plain':{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_TEXT | $mode;
return $AspisRetTemp;
}case 'html':case 'text/html':{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_HTML | $mode;
return $AspisRetTemp;
}case 'xhtml':case 'application/xhtml+xml':{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_XHTML | $mode;
return $AspisRetTemp;
}default :{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_NONE | $mode;
return $AspisRetTemp;
} }
}else 
{{{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_TEXT | $mode;
return $AspisRetTemp;
}}}} }
function atom_10_construct_type ( $attribs ) {
{if ( isset($attribs['']['type']))
 {switch ( strtolower(trim($attribs['']['type'])) ) {
case 'text':{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_TEXT;
return $AspisRetTemp;
}case 'html':{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_HTML;
return $AspisRetTemp;
}case 'xhtml':{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_XHTML;
return $AspisRetTemp;
}default :{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_NONE;
return $AspisRetTemp;
} }
}{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_TEXT;
return $AspisRetTemp;
}} }
function atom_10_content_construct_type ( $attribs ) {
{if ( isset($attribs['']['type']))
 {$type = strtolower(trim($attribs['']['type']));
switch ( $type ) {
case 'text':{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_TEXT;
return $AspisRetTemp;
}case 'html':{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_HTML;
return $AspisRetTemp;
}case 'xhtml':{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_XHTML;
return $AspisRetTemp;
} }
if ( in_array(substr($type,-4),array('+xml','/xml')) || substr($type,0,5) === 'text/')
 {{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_NONE;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_BASE64;
return $AspisRetTemp;
}}}}else 
{{{$AspisRetTemp = SIMPLEPIE_CONSTRUCT_TEXT;
return $AspisRetTemp;
}}}} }
function is_isegment_nz_nc ( $string ) {
{{$AspisRetTemp = (bool)preg_match('/^([A-Za-z0-9\-._~\x{A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}\x{10000}-\x{1FFFD}\x{20000}-\x{2FFFD}\x{30000}-\x{3FFFD}\x{40000}-\x{4FFFD}\x{50000}-\x{5FFFD}\x{60000}-\x{6FFFD}\x{70000}-\x{7FFFD}\x{80000}-\x{8FFFD}\x{90000}-\x{9FFFD}\x{A0000}-\x{AFFFD}\x{B0000}-\x{BFFFD}\x{C0000}-\x{CFFFD}\x{D0000}-\x{DFFFD}\x{E1000}-\x{EFFFD}!$&\'()*+,;=@]|(%[0-9ABCDEF]{2}))+$/u',$string);
return $AspisRetTemp;
}} }
function space_seperated_tokens ( $string ) {
{$space_characters = "\x20\x09\x0A\x0B\x0C\x0D";
$string_length = strlen($string);
$position = strspn($string,$space_characters);
$tokens = array();
while ( $position < $string_length )
{$len = strcspn($string,$space_characters,$position);
$tokens[] = substr($string,$position,$len);
$position += $len;
$position += strspn($string,$space_characters,$position);
}{$AspisRetTemp = $tokens;
return $AspisRetTemp;
}} }
function array_unique ( $array ) {
{if ( version_compare(PHP_VERSION,'5.2','>='))
 {{$AspisRetTemp = array_unique($array);
return $AspisRetTemp;
}}else 
{{$array = (array)$array;
$new_array = array();
$new_array_strings = array();
foreach ( $array as $key =>$value )
{if ( is_object($value))
 {if ( method_exists($value,'__toString'))
 {$cmp = $value->__toString();
}else 
{{trigger_error('Object of class ' . get_class($value) . ' could not be converted to string',E_USER_ERROR);
}}}elseif ( is_array($value))
 {$cmp = (string)reset($value);
}else 
{{$cmp = (string)$value;
}}if ( !in_array($cmp,$new_array_strings))
 {$new_array[$key] = $value;
$new_array_strings[] = $cmp;
}}{$AspisRetTemp = $new_array;
return $AspisRetTemp;
}}}} }
function codepoint_to_utf8 ( $codepoint ) {
{$codepoint = (int)$codepoint;
if ( $codepoint < 0)
 {{$AspisRetTemp = false;
return $AspisRetTemp;
}}else 
{if ( $codepoint <= 0x7f)
 {{$AspisRetTemp = chr($codepoint);
return $AspisRetTemp;
}}else 
{if ( $codepoint <= 0x7ff)
 {{$AspisRetTemp = chr(0xc0 | ($codepoint >> 6)) . chr(0x80 | ($codepoint & 0x3f));
return $AspisRetTemp;
}}else 
{if ( $codepoint <= 0xffff)
 {{$AspisRetTemp = chr(0xe0 | ($codepoint >> 12)) . chr(0x80 | (($codepoint >> 6) & 0x3f)) . chr(0x80 | ($codepoint & 0x3f));
return $AspisRetTemp;
}}else 
{if ( $codepoint <= 0x10ffff)
 {{$AspisRetTemp = chr(0xf0 | ($codepoint >> 18)) . chr(0x80 | (($codepoint >> 12) & 0x3f)) . chr(0x80 | (($codepoint >> 6) & 0x3f)) . chr(0x80 | ($codepoint & 0x3f));
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = "\xEF\xBF\xBD";
return $AspisRetTemp;
}}}}}}}} }
function stripos ( $haystack,$needle,$offset = 0 ) {
{if ( function_exists('stripos'))
 {{$AspisRetTemp = stripos($haystack,$needle,$offset);
return $AspisRetTemp;
}}else 
{{if ( is_string($needle))
 {$needle = strtolower($needle);
}elseif ( is_int($needle) || is_bool($needle) || is_double($needle))
 {$needle = strtolower(chr($needle));
}else 
{{trigger_error('needle is not a string or an integer',E_USER_WARNING);
{$AspisRetTemp = false;
return $AspisRetTemp;
}}}{$AspisRetTemp = strpos(strtolower($haystack),$needle,$offset);
return $AspisRetTemp;
}}}} }
function parse_str ( $str ) {
{$return = array();
$str = explode('&',$str);
foreach ( $str as $section  )
{if ( strpos($section,'=') !== false)
 {list($name,$value) = explode('=',$section,2);
$return[urldecode($name)][] = urldecode($value);
}else 
{{$return[urldecode($section)][] = null;
}}}{$AspisRetTemp = $return;
return $AspisRetTemp;
}} }
function xml_encoding ( $data ) {
{if ( substr($data,0,4) === "\x00\x00\xFE\xFF")
 {$encoding[] = 'UTF-32BE';
}elseif ( substr($data,0,4) === "\xFF\xFE\x00\x00")
 {$encoding[] = 'UTF-32LE';
}elseif ( substr($data,0,2) === "\xFE\xFF")
 {$encoding[] = 'UTF-16BE';
}elseif ( substr($data,0,2) === "\xFF\xFE")
 {$encoding[] = 'UTF-16LE';
}elseif ( substr($data,0,3) === "\xEF\xBB\xBF")
 {$encoding[] = 'UTF-8';
}elseif ( substr($data,0,20) === "\x00\x00\x00\x3C\x00\x00\x00\x3F\x00\x00\x00\x78\x00\x00\x00\x6D\x00\x00\x00\x6C")
 {if ( $pos = strpos($data,"\x00\x00\x00\x3F\x00\x00\x00\x3E"))
 {$parser = &new SimplePie_XML_Declaration_Parser(SimplePie_Misc::change_encoding(substr($data,20,$pos - 20),'UTF-32BE','UTF-8'));
if ( $parser->parse())
 {$encoding[] = $parser->encoding;
}}$encoding[] = 'UTF-32BE';
}elseif ( substr($data,0,20) === "\x3C\x00\x00\x00\x3F\x00\x00\x00\x78\x00\x00\x00\x6D\x00\x00\x00\x6C\x00\x00\x00")
 {if ( $pos = strpos($data,"\x3F\x00\x00\x00\x3E\x00\x00\x00"))
 {$parser = &new SimplePie_XML_Declaration_Parser(SimplePie_Misc::change_encoding(substr($data,20,$pos - 20),'UTF-32LE','UTF-8'));
if ( $parser->parse())
 {$encoding[] = $parser->encoding;
}}$encoding[] = 'UTF-32LE';
}elseif ( substr($data,0,10) === "\x00\x3C\x00\x3F\x00\x78\x00\x6D\x00\x6C")
 {if ( $pos = strpos($data,"\x00\x3F\x00\x3E"))
 {$parser = &new SimplePie_XML_Declaration_Parser(SimplePie_Misc::change_encoding(substr($data,20,$pos - 10),'UTF-16BE','UTF-8'));
if ( $parser->parse())
 {$encoding[] = $parser->encoding;
}}$encoding[] = 'UTF-16BE';
}elseif ( substr($data,0,10) === "\x3C\x00\x3F\x00\x78\x00\x6D\x00\x6C\x00")
 {if ( $pos = strpos($data,"\x3F\x00\x3E\x00"))
 {$parser = &new SimplePie_XML_Declaration_Parser(SimplePie_Misc::change_encoding(substr($data,20,$pos - 10),'UTF-16LE','UTF-8'));
if ( $parser->parse())
 {$encoding[] = $parser->encoding;
}}$encoding[] = 'UTF-16LE';
}elseif ( substr($data,0,5) === "\x3C\x3F\x78\x6D\x6C")
 {if ( $pos = strpos($data,"\x3F\x3E"))
 {$parser = &new SimplePie_XML_Declaration_Parser(substr($data,5,$pos - 5));
if ( $parser->parse())
 {$encoding[] = $parser->encoding;
}}$encoding[] = 'UTF-8';
}else 
{{$encoding[] = 'UTF-8';
}}{$AspisRetTemp = $encoding;
return $AspisRetTemp;
}} }
function output_javascript (  ) {
{if ( function_exists('ob_gzhandler'))
 {ob_start('ob_gzhandler');
}header('Content-type: text/javascript; charset: UTF-8');
header('Cache-Control: must-revalidate');
header('Expires: ' . gmdate('D, d M Y H:i:s',time() + 604800) . ' GMT');
;
?>
function embed_odeo(link) {
	document.writeln('<embed src="http://odeo.com/flash/audio_player_fullsize.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" quality="high" width="440" height="80" wmode="transparent" allowScriptAccess="any" flashvars="valid_sample_rate=true&external_url='+link+'"></embed>');
}

function embed_quicktime(type, bgcolor, width, height, link, placeholder, loop) {
	if (placeholder != '') {
		document.writeln('<embed type="'+type+'" style="cursor:hand; cursor:pointer;" href="'+link+'" src="'+placeholder+'" width="'+width+'" height="'+height+'" autoplay="false" target="myself" controller="false" loop="'+loop+'" scale="aspect" bgcolor="'+bgcolor+'" pluginspage="http://www.apple.com/quicktime/download/"></embed>');
	}
	else {
		document.writeln('<embed type="'+type+'" style="cursor:hand; cursor:pointer;" src="'+link+'" width="'+width+'" height="'+height+'" autoplay="false" target="myself" controller="true" loop="'+loop+'" scale="aspect" bgcolor="'+bgcolor+'" pluginspage="http://www.apple.com/quicktime/download/"></embed>');
	}
}

function embed_flash(bgcolor, width, height, link, loop, type) {
	document.writeln('<embed src="'+link+'" pluginspage="http://www.macromedia.com/go/getflashplayer" type="'+type+'" quality="high" width="'+width+'" height="'+height+'" bgcolor="'+bgcolor+'" loop="'+loop+'"></embed>');
}

function embed_flv(width, height, link, placeholder, loop, player) {
	document.writeln('<embed src="'+player+'" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" quality="high" width="'+width+'" height="'+height+'" wmode="transparent" flashvars="file='+link+'&autostart=false&repeat='+loop+'&showdigits=true&showfsbutton=false"></embed>');
}

function embed_wmedia(width, height, link) {
	document.writeln('<embed type="application/x-mplayer2" src="'+link+'" autosize="1" width="'+width+'" height="'+height+'" showcontrols="1" showstatusbar="0" showdisplay="0" autostart="0"></embed>');
}
		<?php } }
}class SimplePie_Decode_HTML_Entities{var $data = '';
var $consumed = '';
var $position = 0;
function SimplePie_Decode_HTML_Entities ( $data ) {
{$this->data = $data;
} }
function parse (  ) {
{while ( ($this->position = strpos($this->data,'&',$this->position)) !== false )
{$this->consume();
$this->entity();
$this->consumed = '';
}{$AspisRetTemp = $this->data;
return $AspisRetTemp;
}} }
function consume (  ) {
{if ( isset($this->data[$this->position]))
 {$this->consumed .= $this->data[$this->position];
{$AspisRetTemp = $this->data[$this->position++];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
function consume_range ( $chars ) {
{if ( $len = strspn($this->data,$chars,$this->position))
 {$data = substr($this->data,$this->position,$len);
$this->consumed .= $data;
$this->position += $len;
{$AspisRetTemp = $data;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
function unconsume (  ) {
{$this->consumed = substr($this->consumed,0,-1);
$this->position--;
} }
function entity (  ) {
{switch ( $this->consume() ) {
case "\x09":case "\x0A":case "\x0B":case "\x0B":case "\x0C":case "\x20":case "\x3C":case "\x26":case false:break ;
case "\x23":switch ( $this->consume() ) {
case "\x78":case "\x58":$range = '0123456789ABCDEFabcdef';
$hex = true;
break ;
default :$range = '0123456789';
$hex = false;
$this->unconsume();
break ;
 }
if ( $codepoint = $this->consume_range($range))
 {static $windows_1252_specials = array(0x0D => "\x0A",0x80 => "\xE2\x82\xAC",0x81 => "\xEF\xBF\xBD",0x82 => "\xE2\x80\x9A",0x83 => "\xC6\x92",0x84 => "\xE2\x80\x9E",0x85 => "\xE2\x80\xA6",0x86 => "\xE2\x80\xA0",0x87 => "\xE2\x80\xA1",0x88 => "\xCB\x86",0x89 => "\xE2\x80\xB0",0x8A => "\xC5\xA0",0x8B => "\xE2\x80\xB9",0x8C => "\xC5\x92",0x8D => "\xEF\xBF\xBD",0x8E => "\xC5\xBD",0x8F => "\xEF\xBF\xBD",0x90 => "\xEF\xBF\xBD",0x91 => "\xE2\x80\x98",0x92 => "\xE2\x80\x99",0x93 => "\xE2\x80\x9C",0x94 => "\xE2\x80\x9D",0x95 => "\xE2\x80\xA2",0x96 => "\xE2\x80\x93",0x97 => "\xE2\x80\x94",0x98 => "\xCB\x9C",0x99 => "\xE2\x84\xA2",0x9A => "\xC5\xA1",0x9B => "\xE2\x80\xBA",0x9C => "\xC5\x93",0x9D => "\xEF\xBF\xBD",0x9E => "\xC5\xBE",0x9F => "\xC5\xB8");
if ( $hex)
 {$codepoint = hexdec($codepoint);
}else 
{{$codepoint = intval($codepoint);
}}if ( isset($windows_1252_specials[$codepoint]))
 {$replacement = $windows_1252_specials[$codepoint];
}else 
{{$replacement = SimplePie_Misc::codepoint_to_utf8($codepoint);
}}if ( !in_array($this->consume(),array(';',false),true))
 {$this->unconsume();
}$consumed_length = strlen($this->consumed);
$this->data = substr_replace($this->data,$replacement,$this->position - $consumed_length,$consumed_length);
$this->position += strlen($replacement) - $consumed_length;
}break ;
default :static $entities = array('Aacute' => "\xC3\x81",'aacute' => "\xC3\xA1",'Aacute;' => "\xC3\x81",'aacute;' => "\xC3\xA1",'Acirc' => "\xC3\x82",'acirc' => "\xC3\xA2",'Acirc;' => "\xC3\x82",'acirc;' => "\xC3\xA2",'acute' => "\xC2\xB4",'acute;' => "\xC2\xB4",'AElig' => "\xC3\x86",'aelig' => "\xC3\xA6",'AElig;' => "\xC3\x86",'aelig;' => "\xC3\xA6",'Agrave' => "\xC3\x80",'agrave' => "\xC3\xA0",'Agrave;' => "\xC3\x80",'agrave;' => "\xC3\xA0",'alefsym;' => "\xE2\x84\xB5",'Alpha;' => "\xCE\x91",'alpha;' => "\xCE\xB1",'AMP' => "\x26",'amp' => "\x26",'AMP;' => "\x26",'amp;' => "\x26",'and;' => "\xE2\x88\xA7",'ang;' => "\xE2\x88\xA0",'apos;' => "\x27",'Aring' => "\xC3\x85",'aring' => "\xC3\xA5",'Aring;' => "\xC3\x85",'aring;' => "\xC3\xA5",'asymp;' => "\xE2\x89\x88",'Atilde' => "\xC3\x83",'atilde' => "\xC3\xA3",'Atilde;' => "\xC3\x83",'atilde;' => "\xC3\xA3",'Auml' => "\xC3\x84",'auml' => "\xC3\xA4",'Auml;' => "\xC3\x84",'auml;' => "\xC3\xA4",'bdquo;' => "\xE2\x80\x9E",'Beta;' => "\xCE\x92",'beta;' => "\xCE\xB2",'brvbar' => "\xC2\xA6",'brvbar;' => "\xC2\xA6",'bull;' => "\xE2\x80\xA2",'cap;' => "\xE2\x88\xA9",'Ccedil' => "\xC3\x87",'ccedil' => "\xC3\xA7",'Ccedil;' => "\xC3\x87",'ccedil;' => "\xC3\xA7",'cedil' => "\xC2\xB8",'cedil;' => "\xC2\xB8",'cent' => "\xC2\xA2",'cent;' => "\xC2\xA2",'Chi;' => "\xCE\xA7",'chi;' => "\xCF\x87",'circ;' => "\xCB\x86",'clubs;' => "\xE2\x99\xA3",'cong;' => "\xE2\x89\x85",'COPY' => "\xC2\xA9",'copy' => "\xC2\xA9",'COPY;' => "\xC2\xA9",'copy;' => "\xC2\xA9",'crarr;' => "\xE2\x86\xB5",'cup;' => "\xE2\x88\xAA",'curren' => "\xC2\xA4",'curren;' => "\xC2\xA4",'Dagger;' => "\xE2\x80\xA1",'dagger;' => "\xE2\x80\xA0",'dArr;' => "\xE2\x87\x93",'darr;' => "\xE2\x86\x93",'deg' => "\xC2\xB0",'deg;' => "\xC2\xB0",'Delta;' => "\xCE\x94",'delta;' => "\xCE\xB4",'diams;' => "\xE2\x99\xA6",'divide' => "\xC3\xB7",'divide;' => "\xC3\xB7",'Eacute' => "\xC3\x89",'eacute' => "\xC3\xA9",'Eacute;' => "\xC3\x89",'eacute;' => "\xC3\xA9",'Ecirc' => "\xC3\x8A",'ecirc' => "\xC3\xAA",'Ecirc;' => "\xC3\x8A",'ecirc;' => "\xC3\xAA",'Egrave' => "\xC3\x88",'egrave' => "\xC3\xA8",'Egrave;' => "\xC3\x88",'egrave;' => "\xC3\xA8",'empty;' => "\xE2\x88\x85",'emsp;' => "\xE2\x80\x83",'ensp;' => "\xE2\x80\x82",'Epsilon;' => "\xCE\x95",'epsilon;' => "\xCE\xB5",'equiv;' => "\xE2\x89\xA1",'Eta;' => "\xCE\x97",'eta;' => "\xCE\xB7",'ETH' => "\xC3\x90",'eth' => "\xC3\xB0",'ETH;' => "\xC3\x90",'eth;' => "\xC3\xB0",'Euml' => "\xC3\x8B",'euml' => "\xC3\xAB",'Euml;' => "\xC3\x8B",'euml;' => "\xC3\xAB",'euro;' => "\xE2\x82\xAC",'exist;' => "\xE2\x88\x83",'fnof;' => "\xC6\x92",'forall;' => "\xE2\x88\x80",'frac12' => "\xC2\xBD",'frac12;' => "\xC2\xBD",'frac14' => "\xC2\xBC",'frac14;' => "\xC2\xBC",'frac34' => "\xC2\xBE",'frac34;' => "\xC2\xBE",'frasl;' => "\xE2\x81\x84",'Gamma;' => "\xCE\x93",'gamma;' => "\xCE\xB3",'ge;' => "\xE2\x89\xA5",'GT' => "\x3E",'gt' => "\x3E",'GT;' => "\x3E",'gt;' => "\x3E",'hArr;' => "\xE2\x87\x94",'harr;' => "\xE2\x86\x94",'hearts;' => "\xE2\x99\xA5",'hellip;' => "\xE2\x80\xA6",'Iacute' => "\xC3\x8D",'iacute' => "\xC3\xAD",'Iacute;' => "\xC3\x8D",'iacute;' => "\xC3\xAD",'Icirc' => "\xC3\x8E",'icirc' => "\xC3\xAE",'Icirc;' => "\xC3\x8E",'icirc;' => "\xC3\xAE",'iexcl' => "\xC2\xA1",'iexcl;' => "\xC2\xA1",'Igrave' => "\xC3\x8C",'igrave' => "\xC3\xAC",'Igrave;' => "\xC3\x8C",'igrave;' => "\xC3\xAC",'image;' => "\xE2\x84\x91",'infin;' => "\xE2\x88\x9E",'int;' => "\xE2\x88\xAB",'Iota;' => "\xCE\x99",'iota;' => "\xCE\xB9",'iquest' => "\xC2\xBF",'iquest;' => "\xC2\xBF",'isin;' => "\xE2\x88\x88",'Iuml' => "\xC3\x8F",'iuml' => "\xC3\xAF",'Iuml;' => "\xC3\x8F",'iuml;' => "\xC3\xAF",'Kappa;' => "\xCE\x9A",'kappa;' => "\xCE\xBA",'Lambda;' => "\xCE\x9B",'lambda;' => "\xCE\xBB",'lang;' => "\xE3\x80\x88",'laquo' => "\xC2\xAB",'laquo;' => "\xC2\xAB",'lArr;' => "\xE2\x87\x90",'larr;' => "\xE2\x86\x90",'lceil;' => "\xE2\x8C\x88",'ldquo;' => "\xE2\x80\x9C",'le;' => "\xE2\x89\xA4",'lfloor;' => "\xE2\x8C\x8A",'lowast;' => "\xE2\x88\x97",'loz;' => "\xE2\x97\x8A",'lrm;' => "\xE2\x80\x8E",'lsaquo;' => "\xE2\x80\xB9",'lsquo;' => "\xE2\x80\x98",'LT' => "\x3C",'lt' => "\x3C",'LT;' => "\x3C",'lt;' => "\x3C",'macr' => "\xC2\xAF",'macr;' => "\xC2\xAF",'mdash;' => "\xE2\x80\x94",'micro' => "\xC2\xB5",'micro;' => "\xC2\xB5",'middot' => "\xC2\xB7",'middot;' => "\xC2\xB7",'minus;' => "\xE2\x88\x92",'Mu;' => "\xCE\x9C",'mu;' => "\xCE\xBC",'nabla;' => "\xE2\x88\x87",'nbsp' => "\xC2\xA0",'nbsp;' => "\xC2\xA0",'ndash;' => "\xE2\x80\x93",'ne;' => "\xE2\x89\xA0",'ni;' => "\xE2\x88\x8B",'not' => "\xC2\xAC",'not;' => "\xC2\xAC",'notin;' => "\xE2\x88\x89",'nsub;' => "\xE2\x8A\x84",'Ntilde' => "\xC3\x91",'ntilde' => "\xC3\xB1",'Ntilde;' => "\xC3\x91",'ntilde;' => "\xC3\xB1",'Nu;' => "\xCE\x9D",'nu;' => "\xCE\xBD",'Oacute' => "\xC3\x93",'oacute' => "\xC3\xB3",'Oacute;' => "\xC3\x93",'oacute;' => "\xC3\xB3",'Ocirc' => "\xC3\x94",'ocirc' => "\xC3\xB4",'Ocirc;' => "\xC3\x94",'ocirc;' => "\xC3\xB4",'OElig;' => "\xC5\x92",'oelig;' => "\xC5\x93",'Ograve' => "\xC3\x92",'ograve' => "\xC3\xB2",'Ograve;' => "\xC3\x92",'ograve;' => "\xC3\xB2",'oline;' => "\xE2\x80\xBE",'Omega;' => "\xCE\xA9",'omega;' => "\xCF\x89",'Omicron;' => "\xCE\x9F",'omicron;' => "\xCE\xBF",'oplus;' => "\xE2\x8A\x95",'or;' => "\xE2\x88\xA8",'ordf' => "\xC2\xAA",'ordf;' => "\xC2\xAA",'ordm' => "\xC2\xBA",'ordm;' => "\xC2\xBA",'Oslash' => "\xC3\x98",'oslash' => "\xC3\xB8",'Oslash;' => "\xC3\x98",'oslash;' => "\xC3\xB8",'Otilde' => "\xC3\x95",'otilde' => "\xC3\xB5",'Otilde;' => "\xC3\x95",'otilde;' => "\xC3\xB5",'otimes;' => "\xE2\x8A\x97",'Ouml' => "\xC3\x96",'ouml' => "\xC3\xB6",'Ouml;' => "\xC3\x96",'ouml;' => "\xC3\xB6",'para' => "\xC2\xB6",'para;' => "\xC2\xB6",'part;' => "\xE2\x88\x82",'permil;' => "\xE2\x80\xB0",'perp;' => "\xE2\x8A\xA5",'Phi;' => "\xCE\xA6",'phi;' => "\xCF\x86",'Pi;' => "\xCE\xA0",'pi;' => "\xCF\x80",'piv;' => "\xCF\x96",'plusmn' => "\xC2\xB1",'plusmn;' => "\xC2\xB1",'pound' => "\xC2\xA3",'pound;' => "\xC2\xA3",'Prime;' => "\xE2\x80\xB3",'prime;' => "\xE2\x80\xB2",'prod;' => "\xE2\x88\x8F",'prop;' => "\xE2\x88\x9D",'Psi;' => "\xCE\xA8",'psi;' => "\xCF\x88",'QUOT' => "\x22",'quot' => "\x22",'QUOT;' => "\x22",'quot;' => "\x22",'radic;' => "\xE2\x88\x9A",'rang;' => "\xE3\x80\x89",'raquo' => "\xC2\xBB",'raquo;' => "\xC2\xBB",'rArr;' => "\xE2\x87\x92",'rarr;' => "\xE2\x86\x92",'rceil;' => "\xE2\x8C\x89",'rdquo;' => "\xE2\x80\x9D",'real;' => "\xE2\x84\x9C",'REG' => "\xC2\xAE",'reg' => "\xC2\xAE",'REG;' => "\xC2\xAE",'reg;' => "\xC2\xAE",'rfloor;' => "\xE2\x8C\x8B",'Rho;' => "\xCE\xA1",'rho;' => "\xCF\x81",'rlm;' => "\xE2\x80\x8F",'rsaquo;' => "\xE2\x80\xBA",'rsquo;' => "\xE2\x80\x99",'sbquo;' => "\xE2\x80\x9A",'Scaron;' => "\xC5\xA0",'scaron;' => "\xC5\xA1",'sdot;' => "\xE2\x8B\x85",'sect' => "\xC2\xA7",'sect;' => "\xC2\xA7",'shy' => "\xC2\xAD",'shy;' => "\xC2\xAD",'Sigma;' => "\xCE\xA3",'sigma;' => "\xCF\x83",'sigmaf;' => "\xCF\x82",'sim;' => "\xE2\x88\xBC",'spades;' => "\xE2\x99\xA0",'sub;' => "\xE2\x8A\x82",'sube;' => "\xE2\x8A\x86",'sum;' => "\xE2\x88\x91",'sup;' => "\xE2\x8A\x83",'sup1' => "\xC2\xB9",'sup1;' => "\xC2\xB9",'sup2' => "\xC2\xB2",'sup2;' => "\xC2\xB2",'sup3' => "\xC2\xB3",'sup3;' => "\xC2\xB3",'supe;' => "\xE2\x8A\x87",'szlig' => "\xC3\x9F",'szlig;' => "\xC3\x9F",'Tau;' => "\xCE\xA4",'tau;' => "\xCF\x84",'there4;' => "\xE2\x88\xB4",'Theta;' => "\xCE\x98",'theta;' => "\xCE\xB8",'thetasym;' => "\xCF\x91",'thinsp;' => "\xE2\x80\x89",'THORN' => "\xC3\x9E",'thorn' => "\xC3\xBE",'THORN;' => "\xC3\x9E",'thorn;' => "\xC3\xBE",'tilde;' => "\xCB\x9C",'times' => "\xC3\x97",'times;' => "\xC3\x97",'TRADE;' => "\xE2\x84\xA2",'trade;' => "\xE2\x84\xA2",'Uacute' => "\xC3\x9A",'uacute' => "\xC3\xBA",'Uacute;' => "\xC3\x9A",'uacute;' => "\xC3\xBA",'uArr;' => "\xE2\x87\x91",'uarr;' => "\xE2\x86\x91",'Ucirc' => "\xC3\x9B",'ucirc' => "\xC3\xBB",'Ucirc;' => "\xC3\x9B",'ucirc;' => "\xC3\xBB",'Ugrave' => "\xC3\x99",'ugrave' => "\xC3\xB9",'Ugrave;' => "\xC3\x99",'ugrave;' => "\xC3\xB9",'uml' => "\xC2\xA8",'uml;' => "\xC2\xA8",'upsih;' => "\xCF\x92",'Upsilon;' => "\xCE\xA5",'upsilon;' => "\xCF\x85",'Uuml' => "\xC3\x9C",'uuml' => "\xC3\xBC",'Uuml;' => "\xC3\x9C",'uuml;' => "\xC3\xBC",'weierp;' => "\xE2\x84\x98",'Xi;' => "\xCE\x9E",'xi;' => "\xCE\xBE",'Yacute' => "\xC3\x9D",'yacute' => "\xC3\xBD",'Yacute;' => "\xC3\x9D",'yacute;' => "\xC3\xBD",'yen' => "\xC2\xA5",'yen;' => "\xC2\xA5",'yuml' => "\xC3\xBF",'Yuml;' => "\xC5\xB8",'yuml;' => "\xC3\xBF",'Zeta;' => "\xCE\x96",'zeta;' => "\xCE\xB6",'zwj;' => "\xE2\x80\x8D",'zwnj;' => "\xE2\x80\x8C");
for ( $i = 0,$match = null ; $i < 9 && $this->consume() !== false ; $i++ )
{$consumed = substr($this->consumed,1);
if ( isset($entities[$consumed]))
 {$match = $consumed;
}}if ( $match !== null)
 {$this->data = substr_replace($this->data,$entities[$match],$this->position - strlen($consumed) - 1,strlen($match) + 1);
$this->position += strlen($entities[$match]) - strlen($consumed) - 1;
}break ;
 }
} }
}class SimplePie_IRI{var $scheme;
var $userinfo;
var $host;
var $port;
var $path;
var $query;
var $fragment;
var $valid = array();
function __toString (  ) {
{{$AspisRetTemp = $this->get_iri();
return $AspisRetTemp;
}} }
function SimplePie_IRI ( $iri ) {
{$iri = (string)$iri;
if ( $iri !== '')
 {$parsed = $this->parse_iri($iri);
$this->set_scheme($parsed['scheme']);
$this->set_authority($parsed['authority']);
$this->set_path($parsed['path']);
$this->set_query($parsed['query']);
$this->set_fragment($parsed['fragment']);
}} }
function absolutize ( $base,$relative ) {
{$relative = (string)$relative;
if ( $relative !== '')
 {$relative = &new SimplePie_IRI($relative);
if ( $relative->get_scheme() !== null)
 {$target = $relative;
}elseif ( $base->get_iri() !== null)
 {if ( $relative->get_authority() !== null)
 {$target = $relative;
$target->set_scheme($base->get_scheme());
}else 
{{$target = &new SimplePie_IRI('');
$target->set_scheme($base->get_scheme());
$target->set_userinfo($base->get_userinfo());
$target->set_host($base->get_host());
$target->set_port($base->get_port());
if ( $relative->get_path() !== null)
 {if ( strpos($relative->get_path(),'/') === 0)
 {$target->set_path($relative->get_path());
}elseif ( ($base->get_userinfo() !== null || $base->get_host() !== null || $base->get_port() !== null) && $base->get_path() === null)
 {$target->set_path('/' . $relative->get_path());
}elseif ( ($last_segment = strrpos($base->get_path(),'/')) !== false)
 {$target->set_path(substr($base->get_path(),0,$last_segment + 1) . $relative->get_path());
}else 
{{$target->set_path($relative->get_path());
}}$target->set_query($relative->get_query());
}else 
{{$target->set_path($base->get_path());
if ( $relative->get_query() !== null)
 {$target->set_query($relative->get_query());
}elseif ( $base->get_query() !== null)
 {$target->set_query($base->get_query());
}}}}}$target->set_fragment($relative->get_fragment());
}else 
{{$target = $relative;
}}}else 
{{$target = $base;
}}{$AspisRetTemp = $target;
return $AspisRetTemp;
}} }
function parse_iri ( $iri ) {
{preg_match('/^(([^:\/?#]+):)?(\/\/([^\/?#]*))?([^?#]*)(\?([^#]*))?(#(.*))?$/',$iri,$match);
for ( $i = count($match) ; $i <= 9 ; $i++ )
{$match[$i] = '';
}{$AspisRetTemp = array('scheme' => $match[2],'authority' => $match[4],'path' => $match[5],'query' => $match[7],'fragment' => $match[9]);
return $AspisRetTemp;
}} }
function remove_dot_segments ( $input ) {
{$output = '';
while ( strpos($input,'./') !== false || strpos($input,'/.') !== false || $input === '.' || $input === '..' )
{if ( strpos($input,'../') === 0)
 {$input = substr($input,3);
}elseif ( strpos($input,'./') === 0)
 {$input = substr($input,2);
}elseif ( strpos($input,'/./') === 0)
 {$input = substr_replace($input,'/',0,3);
}elseif ( $input === '/.')
 {$input = '/';
}elseif ( strpos($input,'/../') === 0)
 {$input = substr_replace($input,'/',0,4);
$output = substr_replace($output,'',strrpos($output,'/'));
}elseif ( $input === '/..')
 {$input = '/';
$output = substr_replace($output,'',strrpos($output,'/'));
}elseif ( $input === '.' || $input === '..')
 {$input = '';
}elseif ( ($pos = strpos($input,'/',1)) !== false)
 {$output .= substr($input,0,$pos);
$input = substr_replace($input,'',0,$pos);
}else 
{{$output .= $input;
$input = '';
}}}{$AspisRetTemp = $output . $input;
return $AspisRetTemp;
}} }
function replace_invalid_with_pct_encoding ( $string,$valid_chars,$case = SIMPLEPIE_SAME_CASE ) {
{if ( $case & SIMPLEPIE_LOWERCASE)
 {$string = strtolower($string);
}elseif ( $case & SIMPLEPIE_UPPERCASE)
 {$string = strtoupper($string);
}$position = 0;
$strlen = strlen($string);
while ( ($position += strspn($string,$valid_chars,$position)) < $strlen )
{if ( $string[$position] === '%')
 {if ( $position + 2 < $strlen && strspn($string,'0123456789ABCDEFabcdef',$position + 1,2) === 2)
 {$chr = chr(hexdec(substr($string,$position + 1,2)));
if ( strpos($valid_chars,$chr) !== false)
 {if ( $case & SIMPLEPIE_LOWERCASE)
 {$chr = strtolower($chr);
}elseif ( $case & SIMPLEPIE_UPPERCASE)
 {$chr = strtoupper($chr);
}$string = substr_replace($string,$chr,$position,3);
$strlen -= 2;
$position++;
}else 
{{$string = substr_replace($string,strtoupper(substr($string,$position + 1,2)),$position + 1,2);
$position += 3;
}}}else 
{{$string = substr_replace($string,'%25',$position,1);
$strlen += 2;
$position += 3;
}}}else 
{{$replacement = sprintf("%%%02X",ord($string[$position]));
$string = str_replace($string[$position],$replacement,$string);
$strlen = strlen($string);
}}}{$AspisRetTemp = $string;
return $AspisRetTemp;
}} }
function is_valid (  ) {
{{$AspisRetTemp = array_sum($this->valid) === count($this->valid);
return $AspisRetTemp;
}} }
function set_scheme ( $scheme ) {
{if ( $scheme === null || $scheme === '')
 {$this->scheme = null;
}else 
{{$len = strlen($scheme);
switch ( true ) {
case $len > 1:if ( !strspn($scheme,'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+-.',1))
 {$this->scheme = null;
$this->valid[__FUNCTION__] = false;
{$AspisRetTemp = false;
return $AspisRetTemp;
}}case $len > 0:if ( !strspn($scheme,'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',0,1))
 {$this->scheme = null;
$this->valid[__FUNCTION__] = false;
{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
$this->scheme = strtolower($scheme);
}}$this->valid[__FUNCTION__] = true;
{$AspisRetTemp = true;
return $AspisRetTemp;
}} }
function set_authority ( $authority ) {
{if ( ($userinfo_end = strrpos($authority,'@')) !== false)
 {$userinfo = substr($authority,0,$userinfo_end);
$authority = substr($authority,$userinfo_end + 1);
}else 
{{$userinfo = null;
}}if ( ($port_start = strpos($authority,':')) !== false)
 {$port = substr($authority,$port_start + 1);
$authority = substr($authority,0,$port_start);
}else 
{{$port = null;
}}{$AspisRetTemp = $this->set_userinfo($userinfo) && $this->set_host($authority) && $this->set_port($port);
return $AspisRetTemp;
}} }
function set_userinfo ( $userinfo ) {
{if ( $userinfo === null || $userinfo === '')
 {$this->userinfo = null;
}else 
{{$this->userinfo = $this->replace_invalid_with_pct_encoding($userinfo,'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-._~!$&\'()*+,;=:');
}}$this->valid[__FUNCTION__] = true;
{$AspisRetTemp = true;
return $AspisRetTemp;
}} }
function set_host ( $host ) {
{if ( $host === null || $host === '')
 {$this->host = null;
$this->valid[__FUNCTION__] = true;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}elseif ( $host[0] === '[' && substr($host,-1) === ']')
 {if ( Net_IPv6::checkIPv6(substr($host,1,-1)))
 {$this->host = $host;
$this->valid[__FUNCTION__] = true;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}else 
{{$this->host = null;
$this->valid[__FUNCTION__] = false;
{$AspisRetTemp = false;
return $AspisRetTemp;
}}}}else 
{{$this->host = $this->replace_invalid_with_pct_encoding($host,'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-._~!$&\'()*+,;=',SIMPLEPIE_LOWERCASE);
$this->valid[__FUNCTION__] = true;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}}} }
function set_port ( $port ) {
{if ( $port === null || $port === '')
 {$this->port = null;
$this->valid[__FUNCTION__] = true;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}elseif ( strspn($port,'0123456789') === strlen($port))
 {$this->port = (int)$port;
$this->valid[__FUNCTION__] = true;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}else 
{{$this->port = null;
$this->valid[__FUNCTION__] = false;
{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
function set_path ( $path ) {
{if ( $path === null || $path === '')
 {$this->path = null;
$this->valid[__FUNCTION__] = true;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}elseif ( substr($path,0,2) === '//' && $this->userinfo === null && $this->host === null && $this->port === null)
 {$this->path = null;
$this->valid[__FUNCTION__] = false;
{$AspisRetTemp = false;
return $AspisRetTemp;
}}else 
{{$this->path = $this->replace_invalid_with_pct_encoding($path,'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-._~!$&\'()*+,;=@/');
if ( $this->scheme !== null)
 {$this->path = $this->remove_dot_segments($this->path);
}$this->valid[__FUNCTION__] = true;
{$AspisRetTemp = true;
return $AspisRetTemp;
}}}} }
function set_query ( $query ) {
{if ( $query === null || $query === '')
 {$this->query = null;
}else 
{{$this->query = $this->replace_invalid_with_pct_encoding($query,'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-._~!$&\'()*+,;=:@/?');
}}$this->valid[__FUNCTION__] = true;
{$AspisRetTemp = true;
return $AspisRetTemp;
}} }
function set_fragment ( $fragment ) {
{if ( $fragment === null || $fragment === '')
 {$this->fragment = null;
}else 
{{$this->fragment = $this->replace_invalid_with_pct_encoding($fragment,'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-._~!$&\'()*+,;=:@/?');
}}$this->valid[__FUNCTION__] = true;
{$AspisRetTemp = true;
return $AspisRetTemp;
}} }
function get_iri (  ) {
{$iri = '';
if ( $this->scheme !== null)
 {$iri .= $this->scheme . ':';
}if ( ($authority = $this->get_authority()) !== null)
 {$iri .= '//' . $authority;
}if ( $this->path !== null)
 {$iri .= $this->path;
}if ( $this->query !== null)
 {$iri .= '?' . $this->query;
}if ( $this->fragment !== null)
 {$iri .= '#' . $this->fragment;
}if ( $iri !== '')
 {{$AspisRetTemp = $iri;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_scheme (  ) {
{{$AspisRetTemp = $this->scheme;
return $AspisRetTemp;
}} }
function get_authority (  ) {
{$authority = '';
if ( $this->userinfo !== null)
 {$authority .= $this->userinfo . '@';
}if ( $this->host !== null)
 {$authority .= $this->host;
}if ( $this->port !== null)
 {$authority .= ':' . $this->port;
}if ( $authority !== '')
 {{$AspisRetTemp = $authority;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_userinfo (  ) {
{{$AspisRetTemp = $this->userinfo;
return $AspisRetTemp;
}} }
function get_host (  ) {
{{$AspisRetTemp = $this->host;
return $AspisRetTemp;
}} }
function get_port (  ) {
{{$AspisRetTemp = $this->port;
return $AspisRetTemp;
}} }
function get_path (  ) {
{{$AspisRetTemp = $this->path;
return $AspisRetTemp;
}} }
function get_query (  ) {
{{$AspisRetTemp = $this->query;
return $AspisRetTemp;
}} }
function get_fragment (  ) {
{{$AspisRetTemp = $this->fragment;
return $AspisRetTemp;
}} }
}class SimplePie_Net_IPv6{function removeNetmaskSpec ( $ip ) {
{if ( strpos($ip,'/') !== false)
 {list($addr,$nm) = explode('/',$ip);
}else 
{{$addr = $ip;
}}{$AspisRetTemp = $addr;
return $AspisRetTemp;
}} }
function Uncompress ( $ip ) {
{$uip = SimplePie_Net_IPv6::removeNetmaskSpec($ip);
$c1 = -1;
$c2 = -1;
if ( strpos($ip,'::') !== false)
 {list($ip1,$ip2) = explode('::',$ip);
if ( $ip1 === '')
 {$c1 = -1;
}else 
{{$pos = 0;
if ( ($pos = substr_count($ip1,':')) > 0)
 {$c1 = $pos;
}else 
{{$c1 = 0;
}}}}if ( $ip2 === '')
 {$c2 = -1;
}else 
{{$pos = 0;
if ( ($pos = substr_count($ip2,':')) > 0)
 {$c2 = $pos;
}else 
{{$c2 = 0;
}}}}if ( strstr($ip2,'.'))
 {$c2++;
}if ( $c1 === -1 && $c2 === -1)
 {$uip = '0:0:0:0:0:0:0:0';
}else 
{if ( $c1 === -1)
 {$fill = str_repeat('0:',7 - $c2);
$uip = str_replace('::',$fill,$uip);
}else 
{if ( $c2 === -1)
 {$fill = str_repeat(':0',7 - $c1);
$uip = str_replace('::',$fill,$uip);
}else 
{{$fill = str_repeat(':0:',6 - $c2 - $c1);
$uip = str_replace('::',$fill,$uip);
$uip = str_replace('::',':',$uip);
}}}}}{$AspisRetTemp = $uip;
return $AspisRetTemp;
}} }
function SplitV64 ( $ip ) {
{$ip = SimplePie_Net_IPv6::Uncompress($ip);
if ( strstr($ip,'.'))
 {$pos = strrpos($ip,':');
$ip[$pos] = '_';
$ipPart = explode('_',$ip);
{$AspisRetTemp = $ipPart;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = array($ip,'');
return $AspisRetTemp;
}}}} }
function checkIPv6 ( $ip ) {
{$ipPart = SimplePie_Net_IPv6::SplitV64($ip);
$count = 0;
if ( !empty($ipPart[0]))
 {$ipv6 = explode(':',$ipPart[0]);
for ( $i = 0 ; $i < count($ipv6) ; $i++ )
{$dec = hexdec($ipv6[$i]);
$hex = strtoupper(preg_replace('/^[0]{1,3}(.*[0-9a-fA-F])$/','\\1',$ipv6[$i]));
if ( $ipv6[$i] >= 0 && $dec <= 65535 && $hex === strtoupper(dechex($dec)))
 {$count++;
}}if ( $count === 8)
 {{$AspisRetTemp = true;
return $AspisRetTemp;
}}elseif ( $count === 6 && !empty($ipPart[1]))
 {$ipv4 = explode('.',$ipPart[1]);
$count = 0;
foreach ( $ipv4 as $ipv4_part  )
{if ( $ipv4_part >= 0 && $ipv4_part <= 255 && preg_match('/^\d{1,3}$/',$ipv4_part))
 {$count++;
}}if ( $count === 4)
 {{$AspisRetTemp = true;
return $AspisRetTemp;
}}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
}class SimplePie_Parse_Date{var $date;
var $day = array('mon' => 1,'monday' => 1,'tue' => 2,'tuesday' => 2,'wed' => 3,'wednesday' => 3,'thu' => 4,'thursday' => 4,'fri' => 5,'friday' => 5,'sat' => 6,'saturday' => 6,'sun' => 7,'sunday' => 7,'maandag' => 1,'dinsdag' => 2,'woensdag' => 3,'donderdag' => 4,'vrijdag' => 5,'zaterdag' => 6,'zondag' => 7,'lundi' => 1,'mardi' => 2,'mercredi' => 3,'jeudi' => 4,'vendredi' => 5,'samedi' => 6,'dimanche' => 7,'montag' => 1,'dienstag' => 2,'mittwoch' => 3,'donnerstag' => 4,'freitag' => 5,'samstag' => 6,'sonnabend' => 6,'sonntag' => 7,'lunedì' => 1,'martedì' => 2,'mercoledì' => 3,'giovedì' => 4,'venerdì' => 5,'sabato' => 6,'domenica' => 7,'lunes' => 1,'martes' => 2,'miércoles' => 3,'jueves' => 4,'viernes' => 5,'sábado' => 6,'domingo' => 7,'maanantai' => 1,'tiistai' => 2,'keskiviikko' => 3,'torstai' => 4,'perjantai' => 5,'lauantai' => 6,'sunnuntai' => 7,'hétfő' => 1,'kedd' => 2,'szerda' => 3,'csütörtok' => 4,'péntek' => 5,'szombat' => 6,'vasárnap' => 7,'Δευ' => 1,'Τρι' => 2,'Τετ' => 3,'Πεμ' => 4,'Παρ' => 5,'Σαβ' => 6,'Κυρ' => 7,);
var $month = array('jan' => 1,'january' => 1,'feb' => 2,'february' => 2,'mar' => 3,'march' => 3,'apr' => 4,'april' => 4,'may' => 5,'jun' => 6,'june' => 6,'jul' => 7,'july' => 7,'aug' => 8,'august' => 8,'sep' => 9,'september' => 8,'oct' => 10,'october' => 10,'nov' => 11,'november' => 11,'dec' => 12,'december' => 12,'januari' => 1,'februari' => 2,'maart' => 3,'april' => 4,'mei' => 5,'juni' => 6,'juli' => 7,'augustus' => 8,'september' => 9,'oktober' => 10,'november' => 11,'december' => 12,'janvier' => 1,'février' => 2,'mars' => 3,'avril' => 4,'mai' => 5,'juin' => 6,'juillet' => 7,'août' => 8,'septembre' => 9,'octobre' => 10,'novembre' => 11,'décembre' => 12,'januar' => 1,'februar' => 2,'märz' => 3,'april' => 4,'mai' => 5,'juni' => 6,'juli' => 7,'august' => 8,'september' => 9,'oktober' => 10,'november' => 11,'dezember' => 12,'gennaio' => 1,'febbraio' => 2,'marzo' => 3,'aprile' => 4,'maggio' => 5,'giugno' => 6,'luglio' => 7,'agosto' => 8,'settembre' => 9,'ottobre' => 10,'novembre' => 11,'dicembre' => 12,'enero' => 1,'febrero' => 2,'marzo' => 3,'abril' => 4,'mayo' => 5,'junio' => 6,'julio' => 7,'agosto' => 8,'septiembre' => 9,'setiembre' => 9,'octubre' => 10,'noviembre' => 11,'diciembre' => 12,'tammikuu' => 1,'helmikuu' => 2,'maaliskuu' => 3,'huhtikuu' => 4,'toukokuu' => 5,'kesäkuu' => 6,'heinäkuu' => 7,'elokuu' => 8,'suuskuu' => 9,'lokakuu' => 10,'marras' => 11,'joulukuu' => 12,'január' => 1,'február' => 2,'március' => 3,'április' => 4,'május' => 5,'június' => 6,'július' => 7,'augusztus' => 8,'szeptember' => 9,'október' => 10,'november' => 11,'december' => 12,'Ιαν' => 1,'Φεβ' => 2,'Μάώ' => 3,'Μαώ' => 3,'Απρ' => 4,'Μάι' => 5,'Μαϊ' => 5,'Μαι' => 5,'Ιούν' => 6,'Ιον' => 6,'Ιούλ' => 7,'Ιολ' => 7,'Αύγ' => 8,'Αυγ' => 8,'Σεπ' => 9,'Οκτ' => 10,'Νοέ' => 11,'Δεκ' => 12,);
var $timezone = array('ACDT' => 37800,'ACIT' => 28800,'ACST' => 34200,'ACT' => -18000,'ACWDT' => 35100,'ACWST' => 31500,'AEDT' => 39600,'AEST' => 36000,'AFT' => 16200,'AKDT' => -28800,'AKST' => -32400,'AMDT' => 18000,'AMT' => -14400,'ANAST' => 46800,'ANAT' => 43200,'ART' => -10800,'AZOST' => -3600,'AZST' => 18000,'AZT' => 14400,'BIOT' => 21600,'BIT' => -43200,'BOT' => -14400,'BRST' => -7200,'BRT' => -10800,'BST' => 3600,'BTT' => 21600,'CAST' => 18000,'CAT' => 7200,'CCT' => 23400,'CDT' => -18000,'CEDT' => 7200,'CET' => 3600,'CGST' => -7200,'CGT' => -10800,'CHADT' => 49500,'CHAST' => 45900,'CIST' => -28800,'CKT' => -36000,'CLDT' => -10800,'CLST' => -14400,'COT' => -18000,'CST' => -21600,'CVT' => -3600,'CXT' => 25200,'DAVT' => 25200,'DTAT' => 36000,'EADT' => -18000,'EAST' => -21600,'EAT' => 10800,'ECT' => -18000,'EDT' => -14400,'EEST' => 10800,'EET' => 7200,'EGT' => -3600,'EKST' => 21600,'EST' => -18000,'FJT' => 43200,'FKDT' => -10800,'FKST' => -14400,'FNT' => -7200,'GALT' => -21600,'GEDT' => 14400,'GEST' => 10800,'GFT' => -10800,'GILT' => 43200,'GIT' => -32400,'GST' => 14400,'GST' => -7200,'GYT' => -14400,'HAA' => -10800,'HAC' => -18000,'HADT' => -32400,'HAE' => -14400,'HAP' => -25200,'HAR' => -21600,'HAST' => -36000,'HAT' => -9000,'HAY' => -28800,'HKST' => 28800,'HMT' => 18000,'HNA' => -14400,'HNC' => -21600,'HNE' => -18000,'HNP' => -28800,'HNR' => -25200,'HNT' => -12600,'HNY' => -32400,'IRDT' => 16200,'IRKST' => 32400,'IRKT' => 28800,'IRST' => 12600,'JFDT' => -10800,'JFST' => -14400,'JST' => 32400,'KGST' => 21600,'KGT' => 18000,'KOST' => 39600,'KOVST' => 28800,'KOVT' => 25200,'KRAST' => 28800,'KRAT' => 25200,'KST' => 32400,'LHDT' => 39600,'LHST' => 37800,'LINT' => 50400,'LKT' => 21600,'MAGST' => 43200,'MAGT' => 39600,'MAWT' => 21600,'MDT' => -21600,'MESZ' => 7200,'MEZ' => 3600,'MHT' => 43200,'MIT' => -34200,'MNST' => 32400,'MSDT' => 14400,'MSST' => 10800,'MST' => -25200,'MUT' => 14400,'MVT' => 18000,'MYT' => 28800,'NCT' => 39600,'NDT' => -9000,'NFT' => 41400,'NMIT' => 36000,'NOVST' => 25200,'NOVT' => 21600,'NPT' => 20700,'NRT' => 43200,'NST' => -12600,'NUT' => -39600,'NZDT' => 46800,'NZST' => 43200,'OMSST' => 25200,'OMST' => 21600,'PDT' => -25200,'PET' => -18000,'PETST' => 46800,'PETT' => 43200,'PGT' => 36000,'PHOT' => 46800,'PHT' => 28800,'PKT' => 18000,'PMDT' => -7200,'PMST' => -10800,'PONT' => 39600,'PST' => -28800,'PWT' => 32400,'PYST' => -10800,'PYT' => -14400,'RET' => 14400,'ROTT' => -10800,'SAMST' => 18000,'SAMT' => 14400,'SAST' => 7200,'SBT' => 39600,'SCDT' => 46800,'SCST' => 43200,'SCT' => 14400,'SEST' => 3600,'SGT' => 28800,'SIT' => 28800,'SRT' => -10800,'SST' => -39600,'SYST' => 10800,'SYT' => 7200,'TFT' => 18000,'THAT' => -36000,'TJT' => 18000,'TKT' => -36000,'TMT' => 18000,'TOT' => 46800,'TPT' => 32400,'TRUT' => 36000,'TVT' => 43200,'TWT' => 28800,'UYST' => -7200,'UYT' => -10800,'UZT' => 18000,'VET' => -14400,'VLAST' => 39600,'VLAT' => 36000,'VOST' => 21600,'VUT' => 39600,'WAST' => 7200,'WAT' => 3600,'WDT' => 32400,'WEST' => 3600,'WFT' => 43200,'WIB' => 25200,'WIT' => 32400,'WITA' => 28800,'WKST' => 18000,'WST' => 28800,'YAKST' => 36000,'YAKT' => 32400,'YAPT' => 36000,'YEKST' => 21600,'YEKT' => 18000,);
var $day_pcre;
var $month_pcre;
var $built_in = array();
var $user = array();
function SimplePie_Parse_Date (  ) {
{$this->day_pcre = '(' . implode(array_keys($this->day),'|') . ')';
$this->month_pcre = '(' . implode(array_keys($this->month),'|') . ')';
static $cache;
if ( !isset($cache[get_class($this)]))
 {$all_methods = get_class_methods($this);
foreach ( $all_methods as $method  )
{if ( strtolower(substr($method,0,5)) === 'date_')
 {$cache[get_class($this)][] = $method;
}}}foreach ( $cache[get_class($this)] as $method  )
{$this->built_in[] = $method;
}} }
function get (  ) {
{static $object;
if ( !$object)
 {$object = &new SimplePie_Parse_Date;
}{$AspisRetTemp = $object;
return $AspisRetTemp;
}} }
function parse ( $date ) {
{foreach ( $this->user as $method  )
{if ( ($returned = AspisUntainted_call_user_func($method,$date)) !== false)
 {{$AspisRetTemp = $returned;
return $AspisRetTemp;
}}}foreach ( $this->built_in as $method  )
{if ( ($returned = AspisUntainted_call_user_func(array(&$this,$method),$date)) !== false)
 {{$AspisRetTemp = $returned;
return $AspisRetTemp;
}}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function add_callback ( $callback ) {
{if ( is_callable($callback))
 {$this->user[] = $callback;
}else 
{{trigger_error('User-supplied function must be a valid callback',E_USER_WARNING);
}}} }
function date_w3cdtf ( $date ) {
{static $pcre;
if ( !$pcre)
 {$year = '([0-9]{4})';
$month = $day = $hour = $minute = $second = '([0-9]{2})';
$decimal = '([0-9]*)';
$zone = '(?:(Z)|([+\-])([0-9]{1,2}):?([0-9]{1,2}))';
$pcre = '/^' . $year . '(?:-?' . $month . '(?:-?' . $day . '(?:[Tt\x09\x20]+' . $hour . '(?::?' . $minute . '(?::?' . $second . '(?:.' . $decimal . ')?)?)?' . $zone . ')?)?)?$/';
}if ( preg_match($pcre,$date,$match))
 {for ( $i = count($match) ; $i <= 3 ; $i++ )
{$match[$i] = '1';
}for ( $i = count($match) ; $i <= 7 ; $i++ )
{$match[$i] = '0';
}if ( isset($match[9]) && $match[9] !== '')
 {$timezone = $match[10] * 3600;
$timezone += $match[11] * 60;
if ( $match[9] === '-')
 {$timezone = 0 - $timezone;
}}else 
{{$timezone = 0;
}}$second = round($match[6] + $match[7] / pow(10,strlen($match[7])));
{$AspisRetTemp = gmmktime($match[4],$match[5],$second,$match[2],$match[3],$match[1]) - $timezone;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
function remove_rfc2822_comments ( $string ) {
{$string = (string)$string;
$position = 0;
$length = strlen($string);
$depth = 0;
$output = '';
while ( $position < $length && ($pos = strpos($string,'(',$position)) !== false )
{$output .= substr($string,$position,$pos - $position);
$position = $pos + 1;
if ( $string[$pos - 1] !== '\\')
 {$depth++;
while ( $depth && $position < $length )
{$position += strcspn($string,'()',$position);
if ( $string[$position - 1] === '\\')
 {$position++;
continue ;
}elseif ( isset($string[$position]))
 {switch ( $string[$position] ) {
case '(':$depth++;
break ;
case ')':$depth--;
break ;
 }
$position++;
}else 
{{break ;
}}}}else 
{{$output .= '(';
}}}$output .= substr($string,$position);
{$AspisRetTemp = $output;
return $AspisRetTemp;
}} }
function date_rfc2822 ( $date ) {
{static $pcre;
if ( !$pcre)
 {$wsp = '[\x09\x20]';
$fws = '(?:' . $wsp . '+|' . $wsp . '*(?:\x0D\x0A' . $wsp . '+)+)';
$optional_fws = $fws . '?';
$day_name = $this->day_pcre;
$month = $this->month_pcre;
$day = '([0-9]{1,2})';
$hour = $minute = $second = '([0-9]{2})';
$year = '([0-9]{2,4})';
$num_zone = '([+\-])([0-9]{2})([0-9]{2})';
$character_zone = '([A-Z]{1,5})';
$zone = '(?:' . $num_zone . '|' . $character_zone . ')';
$pcre = '/(?:' . $optional_fws . $day_name . $optional_fws . ',)?' . $optional_fws . $day . $fws . $month . $fws . $year . $fws . $hour . $optional_fws . ':' . $optional_fws . $minute . '(?:' . $optional_fws . ':' . $optional_fws . $second . ')?' . $fws . $zone . '/i';
}if ( preg_match($pcre,$this->remove_rfc2822_comments($date),$match))
 {$month = $this->month[strtolower($match[3])];
if ( $match[8] !== '')
 {$timezone = $match[9] * 3600;
$timezone += $match[10] * 60;
if ( $match[8] === '-')
 {$timezone = 0 - $timezone;
}}elseif ( isset($this->timezone[strtoupper($match[11])]))
 {$timezone = $this->timezone[strtoupper($match[11])];
}else 
{{$timezone = 0;
}}if ( $match[4] < 50)
 {$match[4] += 2000;
}elseif ( $match[4] < 1000)
 {$match[4] += 1900;
}if ( $match[7] !== '')
 {$second = $match[7];
}else 
{{$second = 0;
}}{$AspisRetTemp = gmmktime($match[5],$match[6],$second,$month,$match[2],$match[4]) - $timezone;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
function date_rfc850 ( $date ) {
{static $pcre;
if ( !$pcre)
 {$space = '[\x09\x20]+';
$day_name = $this->day_pcre;
$month = $this->month_pcre;
$day = '([0-9]{1,2})';
$year = $hour = $minute = $second = '([0-9]{2})';
$zone = '([A-Z]{1,5})';
$pcre = '/^' . $day_name . ',' . $space . $day . '-' . $month . '-' . $year . $space . $hour . ':' . $minute . ':' . $second . $space . $zone . '$/i';
}if ( preg_match($pcre,$date,$match))
 {$month = $this->month[strtolower($match[3])];
if ( isset($this->timezone[strtoupper($match[8])]))
 {$timezone = $this->timezone[strtoupper($match[8])];
}else 
{{$timezone = 0;
}}if ( $match[4] < 50)
 {$match[4] += 2000;
}else 
{{$match[4] += 1900;
}}{$AspisRetTemp = gmmktime($match[5],$match[6],$match[7],$month,$match[2],$match[4]) - $timezone;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
function date_asctime ( $date ) {
{static $pcre;
if ( !$pcre)
 {$space = '[\x09\x20]+';
$wday_name = $this->day_pcre;
$mon_name = $this->month_pcre;
$day = '([0-9]{1,2})';
$hour = $sec = $min = '([0-9]{2})';
$year = '([0-9]{4})';
$terminator = '\x0A?\x00?';
$pcre = '/^' . $wday_name . $space . $mon_name . $space . $day . $space . $hour . ':' . $min . ':' . $sec . $space . $year . $terminator . '$/i';
}if ( preg_match($pcre,$date,$match))
 {$month = $this->month[strtolower($match[2])];
{$AspisRetTemp = gmmktime($match[4],$match[5],$match[6],$month,$match[3],$match[7]);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
function date_strtotime ( $date ) {
{$strtotime = strtotime($date);
if ( $strtotime === -1 || $strtotime === false)
 {{$AspisRetTemp = false;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = $strtotime;
return $AspisRetTemp;
}}}} }
}class SimplePie_Content_Type_Sniffer{var $file;
function SimplePie_Content_Type_Sniffer ( $file ) {
{$this->file = $file;
} }
function get_type (  ) {
{if ( isset($this->file->headers['content-type']))
 {if ( !isset($this->file->headers['content-encoding']) && ($this->file->headers['content-type'] === 'text/plain' || $this->file->headers['content-type'] === 'text/plain; charset=ISO-8859-1' || $this->file->headers['content-type'] === 'text/plain; charset=iso-8859-1'))
 {{$AspisRetTemp = $this->text_or_binary();
return $AspisRetTemp;
}}if ( ($pos = strpos($this->file->headers['content-type'],';')) !== false)
 {$official = substr($this->file->headers['content-type'],0,$pos);
}else 
{{$official = $this->file->headers['content-type'];
}}$official = strtolower($official);
if ( $official === 'unknown/unknown' || $official === 'application/unknown')
 {{$AspisRetTemp = $this->unknown();
return $AspisRetTemp;
}}elseif ( substr($official,-4) === '+xml' || $official === 'text/xml' || $official === 'application/xml')
 {{$AspisRetTemp = $official;
return $AspisRetTemp;
}}elseif ( substr($official,0,6) === 'image/')
 {if ( $return = $this->image())
 {{$AspisRetTemp = $return;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = $official;
return $AspisRetTemp;
}}}}elseif ( $official === 'text/html')
 {{$AspisRetTemp = $this->feed_or_html();
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = $official;
return $AspisRetTemp;
}}}}else 
{{{$AspisRetTemp = $this->unknown();
return $AspisRetTemp;
}}}} }
function text_or_binary (  ) {
{if ( substr($this->file->body,0,2) === "\xFE\xFF" || substr($this->file->body,0,2) === "\xFF\xFE" || substr($this->file->body,0,4) === "\x00\x00\xFE\xFF" || substr($this->file->body,0,3) === "\xEF\xBB\xBF")
 {{$AspisRetTemp = 'text/plain';
return $AspisRetTemp;
}}elseif ( preg_match('/[\x00-\x08\x0E-\x1A\x1C-\x1F]/',$this->file->body))
 {{$AspisRetTemp = 'application/octect-stream';
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = 'text/plain';
return $AspisRetTemp;
}}}} }
function unknown (  ) {
{$ws = strspn($this->file->body,"\x09\x0A\x0B\x0C\x0D\x20");
if ( strtolower(substr($this->file->body,$ws,14)) === '<!doctype html' || strtolower(substr($this->file->body,$ws,5)) === '<html' || strtolower(substr($this->file->body,$ws,7)) === '<script')
 {{$AspisRetTemp = 'text/html';
return $AspisRetTemp;
}}elseif ( substr($this->file->body,0,5) === '%PDF-')
 {{$AspisRetTemp = 'application/pdf';
return $AspisRetTemp;
}}elseif ( substr($this->file->body,0,11) === '%!PS-Adobe-')
 {{$AspisRetTemp = 'application/postscript';
return $AspisRetTemp;
}}elseif ( substr($this->file->body,0,6) === 'GIF87a' || substr($this->file->body,0,6) === 'GIF89a')
 {{$AspisRetTemp = 'image/gif';
return $AspisRetTemp;
}}elseif ( substr($this->file->body,0,8) === "\x89\x50\x4E\x47\x0D\x0A\x1A\x0A")
 {{$AspisRetTemp = 'image/png';
return $AspisRetTemp;
}}elseif ( substr($this->file->body,0,3) === "\xFF\xD8\xFF")
 {{$AspisRetTemp = 'image/jpeg';
return $AspisRetTemp;
}}elseif ( substr($this->file->body,0,2) === "\x42\x4D")
 {{$AspisRetTemp = 'image/bmp';
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = $this->text_or_binary();
return $AspisRetTemp;
}}}} }
function image (  ) {
{if ( substr($this->file->body,0,6) === 'GIF87a' || substr($this->file->body,0,6) === 'GIF89a')
 {{$AspisRetTemp = 'image/gif';
return $AspisRetTemp;
}}elseif ( substr($this->file->body,0,8) === "\x89\x50\x4E\x47\x0D\x0A\x1A\x0A")
 {{$AspisRetTemp = 'image/png';
return $AspisRetTemp;
}}elseif ( substr($this->file->body,0,3) === "\xFF\xD8\xFF")
 {{$AspisRetTemp = 'image/jpeg';
return $AspisRetTemp;
}}elseif ( substr($this->file->body,0,2) === "\x42\x4D")
 {{$AspisRetTemp = 'image/bmp';
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
function feed_or_html (  ) {
{$len = strlen($this->file->body);
$pos = strspn($this->file->body,"\x09\x0A\x0D\x20");
while ( $pos < $len )
{switch ( $this->file->body[$pos] ) {
case "\x09":case "\x0A":case "\x0D":case "\x20":$pos += strspn($this->file->body,"\x09\x0A\x0D\x20",$pos);
continue 2;
case '<':$pos++;
break ;
default :{$AspisRetTemp = 'text/html';
return $AspisRetTemp;
} }
if ( substr($this->file->body,$pos,3) === '!--')
 {$pos += 3;
if ( $pos < $len && ($pos = strpos($this->file->body,'-->',$pos)) !== false)
 {$pos += 3;
}else 
{{{$AspisRetTemp = 'text/html';
return $AspisRetTemp;
}}}}elseif ( substr($this->file->body,$pos,1) === '!')
 {if ( $pos < $len && ($pos = strpos($this->file->body,'>',$pos)) !== false)
 {$pos++;
}else 
{{{$AspisRetTemp = 'text/html';
return $AspisRetTemp;
}}}}elseif ( substr($this->file->body,$pos,1) === '?')
 {if ( $pos < $len && ($pos = strpos($this->file->body,'?>',$pos)) !== false)
 {$pos += 2;
}else 
{{{$AspisRetTemp = 'text/html';
return $AspisRetTemp;
}}}}elseif ( substr($this->file->body,$pos,3) === 'rss' || substr($this->file->body,$pos,7) === 'rdf:RDF')
 {{$AspisRetTemp = 'application/rss+xml';
return $AspisRetTemp;
}}elseif ( substr($this->file->body,$pos,4) === 'feed')
 {{$AspisRetTemp = 'application/atom+xml';
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = 'text/html';
return $AspisRetTemp;
}}}}{$AspisRetTemp = 'text/html';
return $AspisRetTemp;
}} }
}class SimplePie_XML_Declaration_Parser{var $version = '1.0';
var $encoding = 'UTF-8';
var $standalone = false;
var $state = 'before_version_name';
var $data = '';
var $data_length = 0;
var $position = 0;
function SimplePie_XML_Declaration_Parser ( $data ) {
{$this->data = $data;
$this->data_length = strlen($this->data);
} }
function parse (  ) {
{while ( $this->state && $this->state !== 'emit' && $this->has_data() )
{$state = $this->state;
AspisUntaintedDynamicCall(array($this,$state));
}$this->data = '';
if ( $this->state === 'emit')
 {{$AspisRetTemp = true;
return $AspisRetTemp;
}}else 
{{$this->version = '';
$this->encoding = '';
$this->standalone = '';
{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
function has_data (  ) {
{{$AspisRetTemp = (bool)($this->position < $this->data_length);
return $AspisRetTemp;
}} }
function skip_whitespace (  ) {
{$whitespace = strspn($this->data,"\x09\x0A\x0D\x20",$this->position);
$this->position += $whitespace;
{$AspisRetTemp = $whitespace;
return $AspisRetTemp;
}} }
function get_value (  ) {
{$quote = substr($this->data,$this->position,1);
if ( $quote === '"' || $quote === "'")
 {$this->position++;
$len = strcspn($this->data,$quote,$this->position);
if ( $this->has_data())
 {$value = substr($this->data,$this->position,$len);
$this->position += $len + 1;
{$AspisRetTemp = $value;
return $AspisRetTemp;
}}}{$AspisRetTemp = false;
return $AspisRetTemp;
}} }
function before_version_name (  ) {
{if ( $this->skip_whitespace())
 {$this->state = 'version_name';
}else 
{{$this->state = false;
}}} }
function version_name (  ) {
{if ( substr($this->data,$this->position,7) === 'version')
 {$this->position += 7;
$this->skip_whitespace();
$this->state = 'version_equals';
}else 
{{$this->state = false;
}}} }
function version_equals (  ) {
{if ( substr($this->data,$this->position,1) === '=')
 {$this->position++;
$this->skip_whitespace();
$this->state = 'version_value';
}else 
{{$this->state = false;
}}} }
function version_value (  ) {
{if ( $this->version = $this->get_value())
 {$this->skip_whitespace();
if ( $this->has_data())
 {$this->state = 'encoding_name';
}else 
{{$this->state = 'emit';
}}}else 
{{$this->state = 'standalone_name';
}}} }
function encoding_name (  ) {
{if ( substr($this->data,$this->position,8) === 'encoding')
 {$this->position += 8;
$this->skip_whitespace();
$this->state = 'encoding_equals';
}else 
{{$this->state = false;
}}} }
function encoding_equals (  ) {
{if ( substr($this->data,$this->position,1) === '=')
 {$this->position++;
$this->skip_whitespace();
$this->state = 'encoding_value';
}else 
{{$this->state = false;
}}} }
function encoding_value (  ) {
{if ( $this->encoding = $this->get_value())
 {$this->skip_whitespace();
if ( $this->has_data())
 {$this->state = 'standalone_name';
}else 
{{$this->state = 'emit';
}}}else 
{{$this->state = false;
}}} }
function standalone_name (  ) {
{if ( substr($this->data,$this->position,10) === 'standalone')
 {$this->position += 10;
$this->skip_whitespace();
$this->state = 'standalone_equals';
}else 
{{$this->state = false;
}}} }
function standalone_equals (  ) {
{if ( substr($this->data,$this->position,1) === '=')
 {$this->position++;
$this->skip_whitespace();
$this->state = 'standalone_value';
}else 
{{$this->state = false;
}}} }
function standalone_value (  ) {
{if ( $standalone = $this->get_value())
 {switch ( $standalone ) {
case 'yes':$this->standalone = true;
break ;
case 'no':$this->standalone = false;
break ;
default :$this->state = false;
{return ;
} }
$this->skip_whitespace();
if ( $this->has_data())
 {$this->state = false;
}else 
{{$this->state = 'emit';
}}}else 
{{$this->state = false;
}}} }
}class SimplePie_Locator{var $useragent;
var $timeout;
var $file;
var $local = array();
var $elsewhere = array();
var $file_class = 'SimplePie_File';
var $cached_entities = array();
var $http_base;
var $base;
var $base_location = 0;
var $checked_feeds = 0;
var $max_checked_feeds = 10;
var $content_type_sniffer_class = 'SimplePie_Content_Type_Sniffer';
function SimplePie_Locator ( &$file,$timeout = 10,$useragent = null,$file_class = 'SimplePie_File',$max_checked_feeds = 10,$content_type_sniffer_class = 'SimplePie_Content_Type_Sniffer' ) {
{$this->file = &$file;
$this->file_class = $file_class;
$this->useragent = $useragent;
$this->timeout = $timeout;
$this->max_checked_feeds = $max_checked_feeds;
$this->content_type_sniffer_class = $content_type_sniffer_class;
} }
function find ( $type = SIMPLEPIE_LOCATOR_ALL,&$working ) {
{if ( $this->is_feed($this->file))
 {{$AspisRetTemp = $this->file;
return $AspisRetTemp;
}}if ( $this->file->method & SIMPLEPIE_FILE_SOURCE_REMOTE)
 {$sniffer = &AspisNewUnknownProxy($this ->content_type_sniffer_class,array( $this ->file ),false);
if ( $sniffer->get_type() !== 'text/html')
 {{$AspisRetTemp = null;
return $AspisRetTemp;
}}}if ( $type & ~SIMPLEPIE_LOCATOR_NONE)
 {$this->get_base();
}if ( $type & SIMPLEPIE_LOCATOR_AUTODISCOVERY && $working = $this->autodiscovery())
 {{$AspisRetTemp = $working[0];
return $AspisRetTemp;
}}if ( $type & (SIMPLEPIE_LOCATOR_LOCAL_EXTENSION | SIMPLEPIE_LOCATOR_LOCAL_BODY | SIMPLEPIE_LOCATOR_REMOTE_EXTENSION | SIMPLEPIE_LOCATOR_REMOTE_BODY) && $this->get_links())
 {if ( $type & SIMPLEPIE_LOCATOR_LOCAL_EXTENSION && $working = $this->extension($this->local))
 {{$AspisRetTemp = $working;
return $AspisRetTemp;
}}if ( $type & SIMPLEPIE_LOCATOR_LOCAL_BODY && $working = $this->body($this->local))
 {{$AspisRetTemp = $working;
return $AspisRetTemp;
}}if ( $type & SIMPLEPIE_LOCATOR_REMOTE_EXTENSION && $working = $this->extension($this->elsewhere))
 {{$AspisRetTemp = $working;
return $AspisRetTemp;
}}if ( $type & SIMPLEPIE_LOCATOR_REMOTE_BODY && $working = $this->body($this->elsewhere))
 {{$AspisRetTemp = $working;
return $AspisRetTemp;
}}}{$AspisRetTemp = null;
return $AspisRetTemp;
}} }
function is_feed ( &$file ) {
{if ( $file->method & SIMPLEPIE_FILE_SOURCE_REMOTE)
 {$sniffer = &AspisNewUnknownProxy($this ->content_type_sniffer_class,array( $file),false);
$sniffed = $sniffer->get_type();
if ( in_array($sniffed,array('application/rss+xml','application/rdf+xml','text/rdf','application/atom+xml','text/xml','application/xml')))
 {{$AspisRetTemp = true;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}}elseif ( $file->method & SIMPLEPIE_FILE_SOURCE_LOCAL)
 {{$AspisRetTemp = true;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = false;
return $AspisRetTemp;
}}}} }
function get_base (  ) {
{$this->http_base = $this->file->url;
$this->base = $this->http_base;
$elements = SimplePie_Misc::get_element('base',$this->file->body);
foreach ( $elements as $element  )
{if ( $element['attribs']['href']['data'] !== '')
 {$this->base = SimplePie_Misc::absolutize_url(trim($element['attribs']['href']['data']),$this->http_base);
$this->base_location = $element['offset'];
break ;
}}} }
function autodiscovery (  ) {
{$links = array_merge(SimplePie_Misc::get_element('link',$this->file->body),SimplePie_Misc::get_element('a',$this->file->body),SimplePie_Misc::get_element('area',$this->file->body));
$done = array();
$feeds = array();
foreach ( $links as $link  )
{if ( $this->checked_feeds === $this->max_checked_feeds)
 {break ;
}if ( isset($link['attribs']['href']['data']) && isset($link['attribs']['rel']['data']))
 {$rel = array_unique(SimplePie_Misc::space_seperated_tokens(strtolower($link['attribs']['rel']['data'])));
if ( $this->base_location < $link['offset'])
 {$href = SimplePie_Misc::absolutize_url(trim($link['attribs']['href']['data']),$this->base);
}else 
{{$href = SimplePie_Misc::absolutize_url(trim($link['attribs']['href']['data']),$this->http_base);
}}if ( !in_array($href,$done) && in_array('feed',$rel) || (in_array('alternate',$rel) && !empty($link['attribs']['type']['data']) && in_array(strtolower(SimplePie_Misc::parse_mime($link['attribs']['type']['data'])),array('application/rss+xml','application/atom+xml'))) && !isset($feeds[$href]))
 {$this->checked_feeds++;
$feed = &AspisNewUnknownProxy($this ->file_class,array( $href,$this ->timeout ,5,null,$this ->useragent ),false);
if ( $feed->success && ($feed->method & SIMPLEPIE_FILE_SOURCE_REMOTE === 0 || ($feed->status_code === 200 || $feed->status_code > 206 && $feed->status_code < 300)) && $this->is_feed($feed))
 {$feeds[$href] = $feed;
}}$done[] = $href;
}}if ( !empty($feeds))
 {{$AspisRetTemp = array_values($feeds);
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = null;
return $AspisRetTemp;
}}}} }
function get_links (  ) {
{$links = SimplePie_Misc::get_element('a',$this->file->body);
foreach ( $links as $link  )
{if ( isset($link['attribs']['href']['data']))
 {$href = trim($link['attribs']['href']['data']);
$parsed = SimplePie_Misc::parse_url($href);
if ( $parsed['scheme'] === '' || preg_match('/^(http(s)|feed)?$/i',$parsed['scheme']))
 {if ( $this->base_location < $link['offset'])
 {$href = SimplePie_Misc::absolutize_url(trim($link['attribs']['href']['data']),$this->base);
}else 
{{$href = SimplePie_Misc::absolutize_url(trim($link['attribs']['href']['data']),$this->http_base);
}}$current = SimplePie_Misc::parse_url($this->file->url);
if ( $parsed['authority'] === '' || $parsed['authority'] === $current['authority'])
 {$this->local[] = $href;
}else 
{{$this->elsewhere[] = $href;
}}}}}$this->local = array_unique($this->local);
$this->elsewhere = array_unique($this->elsewhere);
if ( !empty($this->local) || !empty($this->elsewhere))
 {{$AspisRetTemp = true;
return $AspisRetTemp;
}}{$AspisRetTemp = null;
return $AspisRetTemp;
}} }
function extension ( &$array ) {
{foreach ( $array as $key =>$value )
{if ( $this->checked_feeds === $this->max_checked_feeds)
 {break ;
}if ( in_array(strtolower(strrchr($value,'.')),array('.rss','.rdf','.atom','.xml')))
 {$this->checked_feeds++;
$feed = &AspisNewUnknownProxy($this ->file_class,array( $value,$this ->timeout ,5,null,$this ->useragent ),false);
if ( $feed->success && ($feed->method & SIMPLEPIE_FILE_SOURCE_REMOTE === 0 || ($feed->status_code === 200 || $feed->status_code > 206 && $feed->status_code < 300)) && $this->is_feed($feed))
 {{$AspisRetTemp = $feed;
return $AspisRetTemp;
}}else 
{{unset($array[$key]);
}}}}{$AspisRetTemp = null;
return $AspisRetTemp;
}} }
function body ( &$array ) {
{foreach ( $array as $key =>$value )
{if ( $this->checked_feeds === $this->max_checked_feeds)
 {break ;
}if ( preg_match('/(rss|rdf|atom|xml)/i',$value))
 {$this->checked_feeds++;
$feed = &AspisNewUnknownProxy($this ->file_class,array( $value,$this ->timeout ,5,null,$this ->useragent ),false);
if ( $feed->success && ($feed->method & SIMPLEPIE_FILE_SOURCE_REMOTE === 0 || ($feed->status_code === 200 || $feed->status_code > 206 && $feed->status_code < 300)) && $this->is_feed($feed))
 {{$AspisRetTemp = $feed;
return $AspisRetTemp;
}}else 
{{unset($array[$key]);
}}}}{$AspisRetTemp = null;
return $AspisRetTemp;
}} }
}class SimplePie_Parser{var $error_code;
var $error_string;
var $current_line;
var $current_column;
var $current_byte;
var $separator = ' ';
var $namespace = array('');
var $element = array('');
var $xml_base = array('');
var $xml_base_explicit = array(false);
var $xml_lang = array('');
var $data = array();
var $datas = array(array());
var $current_xhtml_construct = -1;
var $encoding;
function parse ( &$data,$encoding ) {
{if ( strtoupper($encoding) === 'US-ASCII')
 {$this->encoding = 'UTF-8';
}else 
{{$this->encoding = $encoding;
}}if ( substr($data,0,4) === "\x00\x00\xFE\xFF")
 {$data = substr($data,4);
}elseif ( substr($data,0,4) === "\xFF\xFE\x00\x00")
 {$data = substr($data,4);
}elseif ( substr($data,0,2) === "\xFE\xFF")
 {$data = substr($data,2);
}elseif ( substr($data,0,2) === "\xFF\xFE")
 {$data = substr($data,2);
}elseif ( substr($data,0,3) === "\xEF\xBB\xBF")
 {$data = substr($data,3);
}if ( substr($data,0,5) === '<?xml' && strspn(substr($data,5,1),"\x09\x0A\x0D\x20") && ($pos = strpos($data,'?>')) !== false)
 {$declaration = &new SimplePie_XML_Declaration_Parser(substr($data,5,$pos - 5));
if ( $declaration->parse())
 {$data = substr($data,$pos + 2);
$data = '<?xml version="' . $declaration->version . '" encoding="' . $encoding . '" standalone="' . (($declaration->standalone) ? 'yes' : 'no') . '"?>' . $data;
}else 
{{$this->error_string = 'SimplePie bug! Please report this!';
{$AspisRetTemp = false;
return $AspisRetTemp;
}}}}$return = true;
static $xml_is_sane = null;
if ( $xml_is_sane === null)
 {$parser_check = xml_parser_create();
xml_parse_into_struct($parser_check,'<foo>&amp;</foo>',$values);
xml_parser_free($parser_check);
$xml_is_sane = isset($values[0]['value']);
}if ( $xml_is_sane)
 {$xml = xml_parser_create_ns($this->encoding,$this->separator);
xml_parser_set_option($xml,XML_OPTION_SKIP_WHITE,1);
xml_parser_set_option($xml,XML_OPTION_CASE_FOLDING,0);
xml_set_object($xml,$this);
xml_set_character_data_handler($xml,'cdata');
xml_set_element_handler($xml,'tag_open','tag_close');
if ( !xml_parse($xml,$data,true))
 {$this->error_code = xml_get_error_code($xml);
$this->error_string = xml_error_string($this->error_code);
$return = false;
}$this->current_line = xml_get_current_line_number($xml);
$this->current_column = xml_get_current_column_number($xml);
$this->current_byte = xml_get_current_byte_index($xml);
xml_parser_free($xml);
{$AspisRetTemp = $return;
return $AspisRetTemp;
}}else 
{{libxml_clear_errors();
$xml = &new XMLReader();
$xml->xml($data);
while ( @$xml->read() )
{switch ( $xml->nodeType ) {
case constant('XMLReader::END_ELEMENT'):if ( $xml->namespaceURI !== '')
 {$tagName = "{$xml->namespaceURI}{$this->separator}{$xml->localName}";
}else 
{{$tagName = $xml->localName;
}}$this->tag_close(null,$tagName);
break ;
case constant('XMLReader::ELEMENT'):$empty = $xml->isEmptyElement;
if ( $xml->namespaceURI !== '')
 {$tagName = "{$xml->namespaceURI}{$this->separator}{$xml->localName}";
}else 
{{$tagName = $xml->localName;
}}$attributes = array();
while ( $xml->moveToNextAttribute() )
{if ( $xml->namespaceURI !== '')
 {$attrName = "{$xml->namespaceURI}{$this->separator}{$xml->localName}";
}else 
{{$attrName = $xml->localName;
}}$attributes[$attrName] = $xml->value;
}$this->tag_open(null,$tagName,$attributes);
if ( $empty)
 {$this->tag_close(null,$tagName);
}break ;
case constant('XMLReader::TEXT'):case constant('XMLReader::CDATA'):$this->cdata(null,$xml->value);
break ;
 }
}if ( $error = libxml_get_last_error())
 {$this->error_code = $error->code;
$this->error_string = $error->message;
$this->current_line = $error->line;
$this->current_column = $error->column;
{$AspisRetTemp = false;
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = true;
return $AspisRetTemp;
}}}}}} }
function get_error_code (  ) {
{{$AspisRetTemp = $this->error_code;
return $AspisRetTemp;
}} }
function get_error_string (  ) {
{{$AspisRetTemp = $this->error_string;
return $AspisRetTemp;
}} }
function get_current_line (  ) {
{{$AspisRetTemp = $this->current_line;
return $AspisRetTemp;
}} }
function get_current_column (  ) {
{{$AspisRetTemp = $this->current_column;
return $AspisRetTemp;
}} }
function get_current_byte (  ) {
{{$AspisRetTemp = $this->current_byte;
return $AspisRetTemp;
}} }
function get_data (  ) {
{{$AspisRetTemp = $this->data;
return $AspisRetTemp;
}} }
function tag_open ( $parser,$tag,$attributes ) {
{list($this->namespace[],$this->element[]) = $this->split_ns($tag);
$attribs = array();
foreach ( $attributes as $name =>$value )
{list($attrib_namespace,$attribute) = $this->split_ns($name);
$attribs[$attrib_namespace][$attribute] = $value;
}if ( isset($attribs[SIMPLEPIE_NAMESPACE_XML]['base']))
 {$this->xml_base[] = SimplePie_Misc::absolutize_url($attribs[SIMPLEPIE_NAMESPACE_XML]['base'],end($this->xml_base));
$this->xml_base_explicit[] = true;
}else 
{{$this->xml_base[] = end($this->xml_base);
$this->xml_base_explicit[] = end($this->xml_base_explicit);
}}if ( isset($attribs[SIMPLEPIE_NAMESPACE_XML]['lang']))
 {$this->xml_lang[] = $attribs[SIMPLEPIE_NAMESPACE_XML]['lang'];
}else 
{{$this->xml_lang[] = end($this->xml_lang);
}}if ( $this->current_xhtml_construct >= 0)
 {$this->current_xhtml_construct++;
if ( end($this->namespace) === SIMPLEPIE_NAMESPACE_XHTML)
 {$this->data['data'] .= '<' . end($this->element);
if ( isset($attribs['']))
 {foreach ( $attribs[''] as $name =>$value )
{$this->data['data'] .= ' ' . $name . '="' . htmlspecialchars($value,ENT_COMPAT,$this->encoding) . '"';
}}$this->data['data'] .= '>';
}}else 
{{$this->datas[] = &$this->data;
$this->data = &$this->data['child'][end($this->namespace)][end($this->element)][];
$this->data = array('data' => '','attribs' => $attribs,'xml_base' => end($this->xml_base),'xml_base_explicit' => end($this->xml_base_explicit),'xml_lang' => end($this->xml_lang));
if ( (end($this->namespace) === SIMPLEPIE_NAMESPACE_ATOM_03 && in_array(end($this->element),array('title','tagline','copyright','info','summary','content')) && isset($attribs['']['mode']) && $attribs['']['mode'] === 'xml') || (end($this->namespace) === SIMPLEPIE_NAMESPACE_ATOM_10 && in_array(end($this->element),array('rights','subtitle','summary','info','title','content')) && isset($attribs['']['type']) && $attribs['']['type'] === 'xhtml'))
 {$this->current_xhtml_construct = 0;
}}}} }
function cdata ( $parser,$cdata ) {
{if ( $this->current_xhtml_construct >= 0)
 {$this->data['data'] .= htmlspecialchars($cdata,ENT_QUOTES,$this->encoding);
}else 
{{$this->data['data'] .= $cdata;
}}} }
function tag_close ( $parser,$tag ) {
{if ( $this->current_xhtml_construct >= 0)
 {$this->current_xhtml_construct--;
if ( end($this->namespace) === SIMPLEPIE_NAMESPACE_XHTML && !in_array(end($this->element),array('area','base','basefont','br','col','frame','hr','img','input','isindex','link','meta','param')))
 {$this->data['data'] .= '</' . end($this->element) . '>';
}}if ( $this->current_xhtml_construct === -1)
 {$this->data = &$this->datas[count($this->datas) - 1];
array_pop($this->datas);
}array_pop($this->element);
array_pop($this->namespace);
array_pop($this->xml_base);
array_pop($this->xml_base_explicit);
array_pop($this->xml_lang);
} }
function split_ns ( $string ) {
{static $cache = array();
if ( !isset($cache[$string]))
 {if ( $pos = strpos($string,$this->separator))
 {static $separator_length;
if ( !$separator_length)
 {$separator_length = strlen($this->separator);
}$namespace = substr($string,0,$pos);
$local_name = substr($string,$pos + $separator_length);
if ( strtolower($namespace) === SIMPLEPIE_NAMESPACE_ITUNES)
 {$namespace = SIMPLEPIE_NAMESPACE_ITUNES;
}if ( $namespace === SIMPLEPIE_NAMESPACE_MEDIARSS_WRONG)
 {$namespace = SIMPLEPIE_NAMESPACE_MEDIARSS;
}$cache[$string] = array($namespace,$local_name);
}else 
{{$cache[$string] = array('',$string);
}}}{$AspisRetTemp = $cache[$string];
return $AspisRetTemp;
}} }
}class SimplePie_Sanitize{var $base;
var $remove_div = true;
var $image_handler = '';
var $strip_htmltags = array('base','blink','body','doctype','embed','font','form','frame','frameset','html','iframe','input','marquee','meta','noscript','object','param','script','style');
var $encode_instead_of_strip = false;
var $strip_attributes = array('bgsound','class','expr','id','style','onclick','onerror','onfinish','onmouseover','onmouseout','onfocus','onblur','lowsrc','dynsrc');
var $strip_comments = false;
var $output_encoding = 'UTF-8';
var $enable_cache = true;
var $cache_location = './cache';
var $cache_name_function = 'md5';
var $cache_class = 'SimplePie_Cache';
var $file_class = 'SimplePie_File';
var $timeout = 10;
var $useragent = '';
var $force_fsockopen = false;
var $replace_url_attributes = array('a' => 'href','area' => 'href','blockquote' => 'cite','del' => 'cite','form' => 'action','img' => array('longdesc','src'),'input' => 'src','ins' => 'cite','q' => 'cite');
function remove_div ( $enable = true ) {
{$this->remove_div = (bool)$enable;
} }
function set_image_handler ( $page = false ) {
{if ( $page)
 {$this->image_handler = (string)$page;
}else 
{{$this->image_handler = false;
}}} }
function pass_cache_data ( $enable_cache = true,$cache_location = './cache',$cache_name_function = 'md5',$cache_class = 'SimplePie_Cache' ) {
{if ( isset($enable_cache))
 {$this->enable_cache = (bool)$enable_cache;
}if ( $cache_location)
 {$this->cache_location = (string)$cache_location;
}if ( $cache_name_function)
 {$this->cache_name_function = (string)$cache_name_function;
}if ( $cache_class)
 {$this->cache_class = (string)$cache_class;
}} }
function pass_file_data ( $file_class = 'SimplePie_File',$timeout = 10,$useragent = '',$force_fsockopen = false ) {
{if ( $file_class)
 {$this->file_class = (string)$file_class;
}if ( $timeout)
 {$this->timeout = (string)$timeout;
}if ( $useragent)
 {$this->useragent = (string)$useragent;
}if ( $force_fsockopen)
 {$this->force_fsockopen = (string)$force_fsockopen;
}} }
function strip_htmltags ( $tags = array('base','blink','body','doctype','embed','font','form','frame','frameset','html','iframe','input','marquee','meta','noscript','object','param','script','style') ) {
{if ( $tags)
 {if ( is_array($tags))
 {$this->strip_htmltags = $tags;
}else 
{{$this->strip_htmltags = explode(',',$tags);
}}}else 
{{$this->strip_htmltags = false;
}}} }
function encode_instead_of_strip ( $encode = false ) {
{$this->encode_instead_of_strip = (bool)$encode;
} }
function strip_attributes ( $attribs = array('bgsound','class','expr','id','style','onclick','onerror','onfinish','onmouseover','onmouseout','onfocus','onblur','lowsrc','dynsrc') ) {
{if ( $attribs)
 {if ( is_array($attribs))
 {$this->strip_attributes = $attribs;
}else 
{{$this->strip_attributes = explode(',',$attribs);
}}}else 
{{$this->strip_attributes = false;
}}} }
function strip_comments ( $strip = false ) {
{$this->strip_comments = (bool)$strip;
} }
function set_output_encoding ( $encoding = 'UTF-8' ) {
{$this->output_encoding = (string)$encoding;
} }
function set_url_replacements ( $element_attribute = array('a' => 'href','area' => 'href','blockquote' => 'cite','del' => 'cite','form' => 'action','img' => array('longdesc','src'),'input' => 'src','ins' => 'cite','q' => 'cite') ) {
{$this->replace_url_attributes = (array)$element_attribute;
} }
function sanitize ( $data,$type,$base = '' ) {
{$data = trim($data);
if ( $data !== '' || $type & SIMPLEPIE_CONSTRUCT_IRI)
 {if ( $type & SIMPLEPIE_CONSTRUCT_MAYBE_HTML)
 {if ( preg_match('/(&(#(x[0-9a-fA-F]+|[0-9]+)|[a-zA-Z0-9]+)|<\/[A-Za-z][^\x09\x0A\x0B\x0C\x0D\x20\x2F\x3E]*' . SIMPLEPIE_PCRE_HTML_ATTRIBUTE . '>)/',$data))
 {$type |= SIMPLEPIE_CONSTRUCT_HTML;
}else 
{{$type |= SIMPLEPIE_CONSTRUCT_TEXT;
}}}if ( $type & SIMPLEPIE_CONSTRUCT_BASE64)
 {$data = base64_decode($data);
}if ( $type & SIMPLEPIE_CONSTRUCT_XHTML)
 {if ( $this->remove_div)
 {$data = preg_replace('/^<div' . SIMPLEPIE_PCRE_XML_ATTRIBUTE . '>/','',$data);
$data = preg_replace('/<\/div>$/','',$data);
}else 
{{$data = preg_replace('/^<div' . SIMPLEPIE_PCRE_XML_ATTRIBUTE . '>/','<div>',$data);
}}}if ( $type & (SIMPLEPIE_CONSTRUCT_HTML | SIMPLEPIE_CONSTRUCT_XHTML))
 {if ( $this->strip_comments)
 {$data = SimplePie_Misc::strip_comments($data);
}if ( $this->strip_htmltags)
 {foreach ( $this->strip_htmltags as $tag  )
{$pcre = "/<($tag)" . SIMPLEPIE_PCRE_HTML_ATTRIBUTE . "(>(.*)<\/$tag" . SIMPLEPIE_PCRE_HTML_ATTRIBUTE . '>|(\/)?>)/siU';
while ( preg_match($pcre,$data) )
{$data = preg_replace_callback($pcre,array(&$this,'do_strip_htmltags'),$data);
}}}if ( $this->strip_attributes)
 {foreach ( $this->strip_attributes as $attrib  )
{$data = preg_replace('/(<[A-Za-z][^\x09\x0A\x0B\x0C\x0D\x20\x2F\x3E]*)' . SIMPLEPIE_PCRE_HTML_ATTRIBUTE . trim($attrib) . '(?:\s*=\s*(?:"(?:[^"]*)"|\'(?:[^\']*)\'|(?:[^\x09\x0A\x0B\x0C\x0D\x20\x22\x27\x3E][^\x09\x0A\x0B\x0C\x0D\x20\x3E]*)?))?' . SIMPLEPIE_PCRE_HTML_ATTRIBUTE . '>/','\1\2\3>',$data);
}}$this->base = $base;
foreach ( $this->replace_url_attributes as $element =>$attributes )
{$data = $this->replace_urls($data,$element,$attributes);
}if ( isset($this->image_handler) && ((string)$this->image_handler) !== '' && $this->enable_cache)
 {$images = SimplePie_Misc::get_element('img',$data);
foreach ( $images as $img  )
{if ( isset($img['attribs']['src']['data']))
 {$image_url = AspisUntainted_call_user_func($this->cache_name_function,$img['attribs']['src']['data']);
$cache = AspisUntainted_call_user_func(array($this->cache_class,'create'),$this->cache_location,$image_url,'spi');
if ( $cache->load())
 {$img['attribs']['src']['data'] = $this->image_handler . $image_url;
$data = str_replace($img['full'],SimplePie_Misc::element_implode($img),$data);
}else 
{{$file = &AspisNewUnknownProxy($this ->file_class,array( $img['attribs']['src']['data'],$this ->timeout ,5,array('X-FORWARDED-FOR' => deAspisWarningRC($_SERVER[0]['REMOTE_ADDR']) ),$this ->useragent ,$this ->force_fsockopen ),false);
$headers = $file->headers;
if ( $file->success && ($file->method & SIMPLEPIE_FILE_SOURCE_REMOTE === 0 || ($file->status_code === 200 || $file->status_code > 206 && $file->status_code < 300)))
 {if ( $cache->save(array('headers' => $file->headers,'body' => $file->body)))
 {$img['attribs']['src']['data'] = $this->image_handler . $image_url;
$data = str_replace($img['full'],SimplePie_Misc::element_implode($img),$data);
}else 
{{trigger_error("$this->cache_location is not writeable",E_USER_WARNING);
}}}}}}}}$data = trim($data);
}if ( $type & SIMPLEPIE_CONSTRUCT_IRI)
 {$data = SimplePie_Misc::absolutize_url($data,$base);
}if ( $type & (SIMPLEPIE_CONSTRUCT_TEXT | SIMPLEPIE_CONSTRUCT_IRI))
 {$data = htmlspecialchars($data,ENT_COMPAT,'UTF-8');
}if ( $this->output_encoding !== 'UTF-8')
 {$data = SimplePie_Misc::change_encoding($data,'UTF-8',$this->output_encoding);
}}{$AspisRetTemp = $data;
return $AspisRetTemp;
}} }
function replace_urls ( $data,$tag,$attributes ) {
{if ( !is_array($this->strip_htmltags) || !in_array($tag,$this->strip_htmltags))
 {$elements = SimplePie_Misc::get_element($tag,$data);
foreach ( $elements as $element  )
{if ( is_array($attributes))
 {foreach ( $attributes as $attribute  )
{if ( isset($element['attribs'][$attribute]['data']))
 {$element['attribs'][$attribute]['data'] = SimplePie_Misc::absolutize_url($element['attribs'][$attribute]['data'],$this->base);
$new_element = SimplePie_Misc::element_implode($element);
$data = str_replace($element['full'],$new_element,$data);
$element['full'] = $new_element;
}}}elseif ( isset($element['attribs'][$attributes]['data']))
 {$element['attribs'][$attributes]['data'] = SimplePie_Misc::absolutize_url($element['attribs'][$attributes]['data'],$this->base);
$data = str_replace($element['full'],SimplePie_Misc::element_implode($element),$data);
}}}{$AspisRetTemp = $data;
return $AspisRetTemp;
}} }
function do_strip_htmltags ( $match ) {
{if ( $this->encode_instead_of_strip)
 {if ( isset($match[4]) && !in_array(strtolower($match[1]),array('script','style')))
 {$match[1] = htmlspecialchars($match[1],ENT_COMPAT,'UTF-8');
$match[2] = htmlspecialchars($match[2],ENT_COMPAT,'UTF-8');
{$AspisRetTemp = "&lt;
$match[1]$match[2]&gt;
$match[3]&lt;/$match[1]&gt;
";
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = htmlspecialchars($match[0],ENT_COMPAT,'UTF-8');
return $AspisRetTemp;
}}}}elseif ( isset($match[4]) && !in_array(strtolower($match[1]),array('script','style')))
 {{$AspisRetTemp = $match[4];
return $AspisRetTemp;
}}else 
{{{$AspisRetTemp = '';
return $AspisRetTemp;
}}}} }
};
?>
<?php 