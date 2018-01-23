<?php
include("functions.php");
$data = import_data("data.json");

include('handlers/'.$_GET['handler'].'.php');

echo '<br><a href="/">Tillbaka till start</a>';
?>