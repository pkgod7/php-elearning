<?php
header("Content-Disposition:'attachment'; filename='".substr($_POST['submit'],6)."'; ");
readfile("".$_POST['submit']."");
?>