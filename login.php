<?php
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    // Burada $code kullanarak erişim jetonu (access token) alabilirsiniz.
    echo "Code: " . $code;
}
?>
