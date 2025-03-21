<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGoodReceiptNoteDetail;
use App\Models\GoodReceiptNote;
use App\Models\GoodReceiptNoteDetail;
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

        return back()->withInput();
    }

    public function edit($id){
        $goodReceiptNoteDetail =  GoodReceiptNoteDetail::find($id);
        //Cập nhật lại giá cho tổng đơn hàng
        $goodReceiptNote = GoodReceiptNote::where('id',$goodReceiptNoteDetail->good_receipt_note_id)->first();
        $goodReceiptNote->update([
            'total_price' => $goodReceiptNote->total_price - $goodReceiptNoteDetail->sub_total
        ]);

        $goodReceiptNoteDetail->delete();

        toast('Xóa thành công', 'success');
        return back()->withInput();
    }

    public function update(StoreGoodReceiptNoteDetail $request,$id){
        //Kiểm tra sản phẩm đã có trong chi tiết đơn hàng chưa
        $productInDetails = GoodReceiptNoteDetail::select('good_receipt_note_details.*')
        ->join('products','products.id','product_id')
        ->where('good_receipt_note_id',$id)
        ->where('product_id',$request->product_id)
        ->first();
        //Lấy ra giá sản phẩm
        $product = Product::select('products.id','products.name', 'entry_price')
            ->where('products.id', $request->product_id)
            ->first();
        //Nếu tồn tại thì thêm cập nhật lại số lượng
        if($productInDetails){
            $subTotal = $request->quantity * $product->entry_price;
            $productInDetails->update([
                'quantity' => $productInDetails->quantity + $request->quantity,
                'sub_total' => $productInDetails->sub_total + $subTotal
            ]);

            //Cập nhật lại giá cho tổng đơn hàng
            $totalPrice = $this->sumTotalPrice($id);
            GoodReceiptNote::where('id',$id)->update([
                'total_price' => $totalPrice,
            ]);

            return back()->withInput();
        }else{
            GoodReceiptNoteDetail::create([
                'good_receipt_note_id' => $id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'sub_total' => $request->quantity * $product->entry_price 
            ]);
            //Cập nhật lại giá cho tổng đơn hàng
            $totalPrice = $this->sumTotalPrice($id);
            GoodReceiptNote::where('id',$id)->update([
                'total_price' => $totalPrice,
            ]);
            return back()->withInput();
        }
    }

    public function sumTotalPrice($id){
        $productInDetails = GoodReceiptNoteDetail::select('id','good_receipt_note_id','sub_total')
        ->where('good_receipt_note_id',$id)
        ->get();

        $totalPrice = 0;
        foreach($productInDetails as $item){
            $totalPrice += $item->sub_total;
        }

        return $totalPrice;
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

        return back()->withInput();
    }
}
