<?php require_once('AspisMain.php'); ?><?php
class Text_Diff_Engine_xdiff{function diff ( $from_lines,$to_lines ) {
{AspisUntainted_array_walk($from_lines,array('Text_Diff','trimNewlines'));
AspisUntainted_array_walk($to_lines,array('Text_Diff','trimNewlines'));
$from_string = implode("\n",$from_lines);
$to_string = implode("\n",$to_lines);
$diff = xdiff_string_diff($from_string,$to_string,count($to_lines));
$diff = explode("\n",$diff);
$edits = array();
foreach ( $diff as $line  )
{switch ( $line[0] ) {
case ' ':$edits[] = &new Text_Diff_Op_copy(array(substr($line,1)));
break ;
case '+':$edits[] = &new Text_Diff_Op_add(array(substr($line,1)));
break ;
case '-':$edits[] = &new Text_Diff_Op_delete(array(substr($line,1)));
break ;
 }
}{$AspisRetTemp = $edits;
return $AspisRetTemp;
}} }
}