<?php
session_start();
if(!isset($_SESSION['admin']) && !isset($_SESSION['user_id']))
{
    header('Location:index.php');
    exit;
    
}
?>