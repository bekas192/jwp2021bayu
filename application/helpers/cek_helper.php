<?php

function cek()
{
    $CI = &get_instance();
    $session = $CI->session->userdata;
    if ($session['status'] != 'oke') {
        redirect('auth');
    }
}
