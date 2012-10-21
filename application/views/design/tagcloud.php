<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <title>Tag Cloud example</title>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>

<?php 

$classes = array('popular','somewhat-popular','very-popular','ultra-popular');

$cloud = array (
	0=> array (
		'tag' => 'badger',
		'count' => 32),
	1=> array (
		'tag' => 'cat',
		'count' => 10),
	2=> array (
		'tag' => 'elephant',
		'count' => 5),
	3=> array (
		'tag' => 'fish',
		'count' => 4),
	4=> array (
		'tag' => 'fox',
		'count' => 10),
	5=> array (
		'tag' => 'hedgehog',
		'count' => 26),
	6=> array (
		'tag' => 'otter',
		'count' => 4),
	7=> array (
		'tag' => 'owl',
		'count' => 17),
	8=> array (
		'tag' => 'squirrel',
		'count' => 3),
	9=> array (
		'tag' => 'weasel',
		'count' => 9)
	);



//get highest and lowest count
$boundaryUpper = 1;
$boundaryLower = 100000;


foreach($cloud as $item) {
	if($item['count'] > $boundaryUpper) {
		$boundaryUpper = $item['count'];
	}
	if($item['count'] < $boundaryLower) {
		$boundaryLower = $item['count'];
	}
}



$range = $boundaryUpper - $boundaryLower;

$score_classes = array();

$num_in_tag = ceil($range/4);

$startpoint = 0;




for($a = 0; $a < 4; $a++ ) {
	$startpoint = $boundaryLower+($num_in_tag*$a);
    for($i = $startpoint; $i <= ($startpoint+$num_in_tag+1); $i++) {
		$score_classes[$i] = $classes[$a];
    }
}



echo '<ul id="tags">';
foreach($cloud as $item) {
	echo '<li class="'. $score_classes[$item['count']] .'"><a href="articlesbytag.php?tag='.$item['tag'].'">'. $item['tag'] .'</a></li>' ."\n";
}
echo '</ul>';
?>
</body>
</html>