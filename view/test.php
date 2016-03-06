<?php
$encrypt = new \App\noctus\encrypt("esetbon", "mosheB55");
$en_user = $encrypt->encrypt();
$decrypt = new \App\noctus\decrypt($en_user, "esetbon", "mosheB55");
$de_user = $decrypt->decrypt();
?>
<h2>Encrypt User</h2>
<pre><?php var_dump($en_user); ?></pre>

<h2>Decrypt user</h2>
<?php
if($de_user == true){echo "<pre>OK</pre>";}else{echo "<pre>Erreur</pre>";}
?>

