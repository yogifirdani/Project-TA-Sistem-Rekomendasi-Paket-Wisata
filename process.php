<?php
$content = file_get_contents('scratch_direngine.html');
$base = 'https://themewagon.github.io/direngine/';

$content = str_replace(
    ['href="css/', 'src="js/', 'src="images/', "url('images/", "url(images/"],
    ['href="'.$base.'css/', 'src="'.$base.'js/', 'src="'.$base.'images/', "url('".$base."images/", "url(".$base."images/"],
    $content
);

file_put_contents('resources/views/welcome.blade.php', $content);
echo "Done replacing content!";
