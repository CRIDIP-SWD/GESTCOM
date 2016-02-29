<?php
$encrypt = new \App\noctus\encrypt("test", "test");
$sys = $encrypt->encrypt();
?>
<pre><?php var_dump($sys); ?></pre>
