<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(){
        $warehouses = Warehouse::paginate(10);
        return view('admin/warehouses/index',compact('warehouses'));
    }
}
