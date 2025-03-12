<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreGoodDeliveryNoteDetail;

class GoodDeliveryNoteDetailController extends Controller
{
    public function store(StoreGoodDeliveryNoteDetail $request)
    {
        // Lấy dữ liệu từ request
        $product = Product::select('products.id', 'unit_id', 'products.name', 'entry_price', 'units.name AS unit_name')
            ->join('units', 'units.id', 'unit_id')
            ->where('products.id', $request->product_id)
            ->first();
        $productInWarehouse = Warehouse::where('product_id', $product->id)->first();
        if ($request->quantity > $productInWarehouse->quantity) {
            toast("Sản phẩm này trong kho chỉ còn $productInWarehouse->quantity", 'error');
            return back();
        }
        // Tạo một mảng chứa thông tin sản phẩm
        $item = [
            'product_id' => $product->id,
            'product' => $product->name,
            'unit' => $product->unit_name,
            'quantity' => $request->quantity,
            'sub_total' => $product->entry_price * $request->quantity
        ];
        // Lấy mảng hiện tại từ session hoặc tạo mới nếu chưa có
        $cartDelivery = Session::get('cartDelivery', []);

        // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng hay chưa
        $productExists = false;

        // Nếu có thì cập nhật lại giá và số lượng
        foreach ($cartDelivery as $key => $cartDeliveryItem) {
            //Kiểm tra trước nếu số lượng sản phẩm trong cart ít sản phẩm trong kho thì cập nhật lại số lượng trong cart
            $quantityInCart = $cartDelivery[$key]['quantity'] + $item['quantity'];
            if ($cartDeliveryItem['product_id'] == $item['product_id']) {
                if ($quantityInCart <= $productInWarehouse->quantity) {
                    $cartDelivery[$key]['quantity'] += $item['quantity'];
                    $cartDelivery[$key]['sub_total'] = $product->entry_price * $cartDelivery[$key]['quantity'];
                    $productExists = true;
                    break;
                } else {
                    //Nếu không sẽ trả về thông báo lỗi
                    toast("Sản phẩm này trong kho chỉ còn $productInWarehouse->quantity", 'error');
                    return back()->withInput();
                }
            }
        }

        // Nếu sản phẩm chưa tồn tại, thêm vào giỏ hàng
        if (!$productExists) {
            $cartDelivery[] = $item;
        }
        // Tính tổng giá tiền
        $total = 0;
        foreach ($cartDelivery as $cartDeliveryItem) {
            $total += $cartDeliveryItem['sub_total'];
        }

        // Lưu lại vào session
        Session::put('cartDelivery', $cartDelivery);

        return back()->withInput();
    }

    public function delete($product)
    {
        $cartDelivery = Session::get('cartDelivery', []);
        foreach ($cartDelivery as $key => $item) {
            if ($item['product'] == $product) {
                unset($cartDelivery[$key]);
                break;
            }
        }
        Session::put('cartDelivery', array_values($cartDelivery));

        return back();
    }
}
