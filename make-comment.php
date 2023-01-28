<?php 

$content = file_get_contents("html-components.txt");
$arr = preg_split("/\W/", $content);

$output = "/**\n";

foreach($arr as $tag){
    if(empty($tag)) continue;
    $output .= " * @method static string $tag(...\$params) makes a `$tag` element\n";
}

$output .= "\n */";

file_put_contents("html-comments.php", $output);
?>