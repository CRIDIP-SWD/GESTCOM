<?php
$encrypt = new \App\noctus\encrypt("mmockelyn", "1992maxime");
$sys = $encrypt->encrypt();
?>
<pre><?php var_dump($sys); ?></pre>
