<?php
$link = mysqli_connect("localhost", "sedirorg_userisi", "Hhv7x63Kt9D") or die ('Error es: '.mysqli_error());
mysqli_select_db($link, "sedirorg_db");
$tildes = $link->query("SET NAMES 'utf8'"); //Para que se inserten las tildes correctamente
