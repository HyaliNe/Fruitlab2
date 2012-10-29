<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Tag Cloud example</title> 
  <style type="text/css">
  body {
        background-color: #fff;
        color: #000;
        margin: 2em;
        font: 0.9em/1.6em Arial, Helvetica, sans-serif;
        }

    ul#tags {
        margin: 0;
        padding: 0;
        list-style:none;
        width: 400px;
    }

    ul#tags li {
        display:inline;
                line-height: 1em;
    }

    ul#tags li a:link, ul#tags li a:visited {
        text-decoration:none;
        color: #33ccff;
    }

    ul#tags li a:hover {
        color: #003df5;
    }

    ul#tags li.popular {
        font-size: 140%;
    }

    ul#tags li.somewhat-popular {
        font-size: 240%;
    }

    ul#tags li.very-popular {
        font-size: 300%;
    }

    ul#tags li.ultra-popular {
        font-size: 400%;
    }
    </style>
</head>
<body>
<?php 
$classes = array('popular','somewhat-popular','very-popular','ultra-popular');
//@fix $query = $this->db->query("Select title,count(title) as no from taglist t,
//design d where t.design_id = d.design_id group by title");
/*
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
*/
$cloud = array();
$query = $this->db->query("Select tag.tag_id,name,count(name) as no from tag,taglist where tag.tag_id = taglist.tag_id group by name;");
$rows = $query->result();
foreach($rows as $row){
    $data = array(
      'tag' =>  $row->name,
      'count' => $row->no
    );
    $cloud[sizeof($cloud)] = $data ;
}
//print_r($cloud);

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
//@todo refactor search by tag using the upload class function write an sql queries
//write an sql queries to search by tag cloud on upload model,using diff

echo '<ul id="tags">';
foreach($cloud as $item) {
        echo '<li class="'. $score_classes[$item['count']] .'"><a href=#>'. $item['tag'] .'</a></li>' ."\n";
	//echo '<li class="'. $score_classes[$item['count']] .'"><a href="'.site_url('upload/searchtag/'.$item['tag']).'">'. $item['tag'] .'</a></li>' ."\n";
}
echo '</ul>';
?>
</body>
</html>