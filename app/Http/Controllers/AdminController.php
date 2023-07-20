<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function list() {
        $data['header_title'] = "Admin List";
        return view('admin.admin.list', $data);
    }

    public function add() {
        $data['header_title'] = "Add New Admin";
        return view('admin.admin.add', $data);
    }

    public function insert(Request $request) {
        
    }
}
