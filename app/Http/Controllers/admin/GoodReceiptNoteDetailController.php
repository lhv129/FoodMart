<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGoodReceiptNoteDetail;
use Illuminate\Support\Facades\Session;

class GoodReceiptNoteDetailController extends Controller
{
    public function store(StoreGoodReceiptNoteDetail $request)
    {
        // Lấy dữ liệu từ request
        $product = Product::select('products.id', 'unit_id', 'products.name', 'entry_price', 'units.name AS unit_name')
            ->join('units', 'units.id', 'unit_id')
            ->where('products.id', $request->product_id)
            ->first();
        // dd($product);
        // Tạo một mảng chứa thông tin sản phẩm
        $item = [
            'product_id' => $product->id,
            'product' => $product->name,
            'unit' => $product->unit_name,
            'quantity' => $request->quantity,
            'sub_total' => $product->entry_price * $request->quantity
        ];
        // Lấy mảng hiện tại từ session hoặc tạo mới nếu chưa có
        $cart = Session::get('cart', []);

        // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng hay chưa
        $productExists = false;

        // Nếu có thì cập nhật lại giá và số lượng
        foreach ($cart as $key => $cartItem) {
            if ($cartItem['product_id'] == $item['product_id']) {
                $cart[$key]['quantity'] += $item['quantity'];
                $cart[$key]['sub_total'] = $product->entry_price * $cart[$key]['quantity'];
                $productExists = true;
                break;
            }
        }

        // Nếu sản phẩm chưa tồn tại, thêm vào giỏ hàng
        if (!$productExists) {
            $cart[] = $item;
        }
        // Tính tổng giá tiền
        $total = 0;
        foreach ($cart as $cartItem) {
            $total += $cartItem['sub_total'];
        }

        // Lưu lại vào session
        Session::put('cart', $cart);

        return back();
    }

    public function delete($product)
    {
        $cart = Session::get('cart', []);
        foreach ($cart as $key => $item) {
            if ($item['product'] == $product) {
                unset($cart[$key]);
                break;
            }
        }
        Session::put('cart', array_values($cart));

        return back();
    }
}
