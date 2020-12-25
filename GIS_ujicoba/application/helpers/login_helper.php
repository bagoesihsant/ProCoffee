<?php

function is_logged_in()
{
    $ci = get_instance();
    if(!$ci->session->userdata('email'))
    {
        redirect('auth');
    }else{
        $role_id = $ci->session->userdata('kode_role');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

        $menu_id = $queryMenu['kode_menu'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'kode_role' => $role_id,
            'kode_menu' => $menu_id
        ]); 

        if($userAccess->num_rows() < 1)
        {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('kode_role', $role_id);
    $ci->db->where('kode_menu', $menu_id);

    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}