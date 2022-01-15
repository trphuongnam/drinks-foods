<?php
/* Function show message in login page */
function showMessageLogin()
{
    if (session()->has('err_sign_in')) return session()->get('err_sign_in');
    if (session()->has('msg_sign_in')) return session()->get('msg_sign_in');
    if (session()->has('err_exception')) return session()->get('err_exception');
    if (session()->has('reset_pass_success')) return session()->get('reset_pass_success');
    if (session()->has('err_rating')) return session()->get('err_rating');
    if (session()->has('regist_success')) return session()->get('regist_success');   
    if (session()->has('account_blocked')) return session()->get('account_blocked');
}
?>