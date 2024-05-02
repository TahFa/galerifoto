<?php 
function is_login()
{
    if(!isset($_SESSION['username']))
    {
        redirect('auth');
    }
}
?>