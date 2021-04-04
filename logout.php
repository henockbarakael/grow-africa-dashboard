<?php
require_once 'core/init.php';


    session_destroy();
    unset($_SESSION['code']);
    header('location:index.php');
