<?php require_once('AspisMain.php'); ?><?php
class Text_Diff_Engine_native{function diff ( $from_lines,$to_lines ) {
{AspisUntainted_array_walk($from_lines,array('Text_Diff','trimNewlines'));
AspisUntainted_array_walk($to_lines,array('Text_Diff','trimNewlines'));
$n_from = count($from_lines);
$n_to = count($to_lines);
$this->xchanged = $this->ychanged = array();
$this->xv = $this->yv = array();
$this->xind = $this->yind = array();
unset($this->seq);
unset($this->in_seq);
unset($this->lcs);
for ( $skip = 0 ; $skip < $n_from && $skip < $n_to ; $skip++ )
{if ( $from_lines[$skip] !== $to_lines[$skip])
 {break ;
}$this->xchanged[$skip] = $this->ychanged[$skip] = false;
}$xi = $n_from;
$yi = $n_to;
for ( $endskip = 0 ; --$xi > $skip && --$yi > $skip ; $endskip++ )
{if ( $from_lines[$xi] !== $to_lines[$yi])
 {break ;
}$this->xchanged[$xi] = $this->ychanged[$yi] = false;
}for ( $xi = $skip ; $xi < $n_from - $endskip ; $xi++ )
{$xhash[$from_lines[$xi]] = 1;
}for ( $yi = $skip ; $yi < $n_to - $endskip ; $yi++ )
{$line = $to_lines[$yi];
if ( ($this->ychanged[$yi] = empty($xhash[$line])))
 {continue ;
}$yhash[$line] = 1;
$this->yv[] = $line;
$this->yind[] = $yi;
}for ( $xi = $skip ; $xi < $n_from - $endskip ; $xi++ )
{$line = $from_lines[$xi];
if ( ($this->xchanged[$xi] = empty($yhash[$line])))
 {continue ;
}$this->xv[] = $line;
$this->xind[] = $xi;
}$this->_compareseq(0,count($this->xv),0,count($this->yv));
$this->_shiftBoundaries($from_lines,$this->xchanged,$this->ychanged);
$this->_shiftBoundaries($to_lines,$this->ychanged,$this->xchanged);
$edits = array();
$xi = $yi = 0;
while ( $xi < $n_from || $yi < $n_to )
{assert($yi < $n_to || $this->xchanged[$xi]);
assert($xi < $n_from || $this->ychanged[$yi]);
$copy = array();
while ( $xi < $n_from && $yi < $n_to && !$this->xchanged[$xi] && !$this->ychanged[$yi] )
{$copy[] = $from_lines[$xi++];
++$yi;
}if ( $copy)
 {$edits[] = &new Text_Diff_Op_copy($copy);
}$delete = array();
while ( $xi < $n_from && $this->xchanged[$xi] )
{$delete[] = $from_lines[$xi++];
}$add = array();
while ( $yi < $n_to && $this->ychanged[$yi] )
{$add[] = $to_lines[$yi++];
}if ( $delete && $add)
 {$edits[] = &new Text_Diff_Op_change($delete,$add);
}elseif ( $delete)
 {$edits[] = &new Text_Diff_Op_delete($delete);
}elseif ( $add)
 {$edits[] = &new Text_Diff_Op_add($add);
}}{$AspisRetTemp = $edits;
return $AspisRetTemp;
}} }
function _diag ( $xoff,$xlim,$yoff,$ylim,$nchunks ) {
{$flip = false;
if ( $xlim - $xoff > $ylim - $yoff)
 {$flip = true;
list($xoff,$xlim,$yoff,$ylim) = array($yoff,$ylim,$xoff,$xlim);
}if ( $flip)
 {for ( $i = $ylim - 1 ; $i >= $yoff ; $i-- )
{$ymatches[$this->xv[$i]][] = $i;
}}else 
{{for ( $i = $ylim - 1 ; $i >= $yoff ; $i-- )
{$ymatches[$this->yv[$i]][] = $i;
}}}$this->lcs = 0;
$this->seq[0] = $yoff - 1;
$this->in_seq = array();
$ymids[0] = array();
$numer = $xlim - $xoff + $nchunks - 1;
$x = $xoff;
for ( $chunk = 0 ; $chunk < $nchunks ; $chunk++ )
{if ( $chunk > 0)
 {for ( $i = 0 ; $i <= $this->lcs ; $i++ )
{$ymids[$i][$chunk - 1] = $this->seq[$i];
}}$x1 = $xoff + (int)(($numer + ($xlim - $xoff) * $chunk) / $nchunks);
for (  ; $x < $x1 ; $x++ )
{$line = $flip ? $this->yv[$x] : $this->xv[$x];
if ( empty($ymatches[$line]))
 {continue ;
}$matches = $ymatches[$line];
reset($matches);
while ( list(,$y) = each($matches) )
{if ( empty($this->in_seq[$y]))
 {$k = $this->_lcsPos($y);
assert($k > 0);
$ymids[$k] = $ymids[$k - 1];
break ;
}}while ( list(,$y) = each($matches) )
{if ( $y > $this->seq[$k - 1])
 {assert($y <= $this->seq[$k]);
$this->in_seq[$this->seq[$k]] = false;
$this->seq[$k] = $y;
$this->in_seq[$y] = 1;
}elseif ( empty($this->in_seq[$y]))
 {$k = $this->_lcsPos($y);
assert($k > 0);
$ymids[$k] = $ymids[$k - 1];
}}}}$seps[] = $flip ? array($yoff,$xoff) : array($xoff,$yoff);
$ymid = $ymids[$this->lcs];
for ( $n = 0 ; $n < $nchunks - 1 ; $n++ )
{$x1 = $xoff + (int)(($numer + ($xlim - $xoff) * $n) / $nchunks);
$y1 = $ymid[$n] + 1;
$seps[] = $flip ? array($y1,$x1) : array($x1,$y1);
}$seps[] = $flip ? array($ylim,$xlim) : array($xlim,$ylim);
{$AspisRetTemp = array($this->lcs,$seps);
return $AspisRetTemp;
}} }
function _lcsPos ( $ypos ) {
{$end = $this->lcs;
if ( $end == 0 || $ypos > $this->seq[$end])
 {$this->seq[++$this->lcs] = $ypos;
$this->in_seq[$ypos] = 1;
{$AspisRetTemp = $this->lcs;
return $AspisRetTemp;
}}$beg = 1;
while ( $beg < $end )
{$mid = (int)(($beg + $end) / 2);
if ( $ypos > $this->seq[$mid])
 {$beg = $mid + 1;
}else 
{{$end = $mid;
}}}assert($ypos != $this->seq[$end]);
$this->in_seq[$this->seq[$end]] = false;
$this->seq[$end] = $ypos;
$this->in_seq[$ypos] = 1;
{$AspisRetTemp = $end;
return $AspisRetTemp;
}} }
function _compareseq ( $xoff,$xlim,$yoff,$ylim ) {
{while ( $xoff < $xlim && $yoff < $ylim && $this->xv[$xoff] == $this->yv[$yoff] )
{++$xoff;
++$yoff;
}while ( $xlim > $xoff && $ylim > $yoff && $this->xv[$xlim - 1] == $this->yv[$ylim - 1] )
{--$xlim;
--$ylim;
}if ( $xoff == $xlim || $yoff == $ylim)
 {$lcs = 0;
}else 
{{$nchunks = min(7,$xlim - $xoff,$ylim - $yoff) + 1;
list($lcs,$seps) = $this->_diag($xoff,$xlim,$yoff,$ylim,$nchunks);
}}if ( $lcs == 0)
 {while ( $yoff < $ylim )
{$this->ychanged[$this->yind[$yoff++]] = 1;
}while ( $xoff < $xlim )
{$this->xchanged[$this->xind[$xoff++]] = 1;
}}else 
{{reset($seps);
$pt1 = $seps[0];
while ( $pt2 = next($seps) )
{$this->_compareseq($pt1[0],$pt2[0],$pt1[1],$pt2[1]);
$pt1 = $pt2;
}}}} }
function _shiftBoundaries ( $lines,&$changed,$other_changed ) {
{$i = 0;
$j = 0;
assert('count($lines) == count($changed)');
$len = count($lines);
$other_len = count($other_changed);
while ( 1 )
{while ( $j < $other_len && $other_changed[$j] )
{$j++;
}while ( $i < $len && !$changed[$i] )
{assert('$j < $other_len && ! $other_changed[$j]');
$i++;
$j++;
while ( $j < $other_len && $other_changed[$j] )
{$j++;
}}if ( $i == $len)
 {break ;
}$start = $i;
while ( ++$i < $len && $changed[$i] )
{continue ;
}do {$runlength = $i - $start;
while ( $start > 0 && $lines[$start - 1] == $lines[$i - 1] )
{$changed[--$start] = 1;
$changed[--$i] = false;
while ( $start > 0 && $changed[$start - 1] )
{$start--;
}assert('$j > 0');
while ( $other_changed[--$j] )
{continue ;
}assert('$j >= 0 && !$other_changed[$j]');
}$corresponding = $j < $other_len ? $i : $len;
while ( $i < $len && $lines[$start] == $lines[$i] )
{$changed[$start++] = false;
$changed[$i++] = 1;
while ( $i < $len && $changed[$i] )
{$i++;
}assert('$j < $other_len && ! $other_changed[$j]');
$j++;
if ( $j < $other_len && $other_changed[$j])
 {$corresponding = $i;
while ( $j < $other_len && $other_changed[$j] )
{$j++;
}}}}while ($runlength != $i - $start )
;
while ( $corresponding < $i )
{$changed[--$start] = 1;
$changed[--$i] = 0;
assert('$j > 0');
while ( $other_changed[--$j] )
{continue ;
}assert('$j >= 0 && !$other_changed[$j]');
}}} }
}