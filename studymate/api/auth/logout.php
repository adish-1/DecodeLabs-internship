<?php
session_start();
session_destroy();
header("location:/studymate/login/");
exit();
?>