<?php

$enc = urlencode("Could not select db");

print $enc . "<br />";

$cu_salt_gen = str_split(md5(rand(100, 999)), 10);
$cu_salt = $cu_salt_gen[0];
echo $cu_salt . "<br />";
echo md5("duanepw") . "<br />";

$result = md5(md5("duanepw").$cu_salt);

echo $result;

?>