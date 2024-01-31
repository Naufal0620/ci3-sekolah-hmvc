<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('actbtn')) {
    function actbtn($id)
    {
        if ($id) {
            $btn = '<span class="btn btn-sm btn-primary editBtn" data-id="'.$id.'"><i class="fa fa-edit"></i> Edit</span>
                    <span class="btn btn-sm btn-danger deleteBtn" data-id="'.$id.'"><i class="fas fa-trash-alt"></i> Delete</span>';
        }
        return $btn;
    }
}

if (!function_exists('addbtn')) {
    function addbtn()
    {
        $btn = '<span class="btn btn-primary waves-effect waves-light mb-3 addBtn">
        <i class="bx bx-plus font-size-16 align-middle me-2"></i> Tambah Data</span>';

        return $btn;
    }
}

if(!function_exists('test_kegunaan_helper')) {
    function test_kegunaan_helper(){
        return 'hello';
    }
}