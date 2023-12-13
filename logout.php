<?php
session_start();
session_destroy();
header('Location: l0gin1.php');
exit();