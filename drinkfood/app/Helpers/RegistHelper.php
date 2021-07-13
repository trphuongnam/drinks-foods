<?php
use Illuminate\Support\Facades\Session;

/* Function show message in regist page */
function showMessageRegist()
{
    if (Session::has('regist_errors')) return Session::get('regist_user');
}
?>