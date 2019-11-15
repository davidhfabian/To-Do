<?php 
session_start();
function autenticador() {
    if(empty($_SESSION['id'])){
        return true;   
    } else {
        return false;
    }
}