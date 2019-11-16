<?php

function deleteAlert()
{
    unset($_SESSION['error']);
    unset($_SESSION['correct']);
    unset($_SESSION['delete']);
}
