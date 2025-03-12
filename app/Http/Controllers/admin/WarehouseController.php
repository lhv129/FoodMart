<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(){
        $warehouses = Warehouse::select('warehouses.*','products.name As product_name','image','entry_price','retail_price','unit_id','units.name As unit_name')
        ->join('products','products.id','product_id')
        ->join('units','units.id','unit_id')
        ->paginate(10);
        return view('admin/warehouses/index',compact('warehouses'));
    }
}
