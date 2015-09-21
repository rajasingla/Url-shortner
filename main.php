<?php
$alphabet = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';

function base_encode($num, $alphabet) {
$base_count = strlen($alphabet);
$encoded = '';
while ($num >= $base_count) {
$div = $num/$base_count;
$mod = ($num-($base_count*intval($div)));
$encoded = $alphabet[$mod] . $encoded;
$num = intval($div);
}

if ($num) $encoded = $alphabet[$num] . $encoded;

return $encoded;
}

function base_decode($num, $alphabet) {
$decoded = 0;
$multi = 1;
while (strlen($num) > 0) {
$digit = $num[strlen($num)-1];
$decoded += $multi * strpos($alphabet, $digit);
$multi = $multi * strlen($alphabet);
$num = substr($num, 0, -1);
}

return $decoded;
}
?>