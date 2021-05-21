<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['nome']);
header("location: ".$_SERVER['HTTP_REFERER']);