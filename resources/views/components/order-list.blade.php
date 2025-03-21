@foreach ($orders as $index => $order)

<div class="max-w-md mx-auto p-4 border rounded shadow mb-3">
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center">
            <span class="text-blue-500 mr-2">Ngày đặt</span>
            <span class="font-semibold">{{ $order['created_at'] }}</span>
        </div>
        <div>
            <span class="text-blue-500">{{ $order['code'] }}</span>
        </div>
    </div>

    <div class="flex items-center justify-between bg-green-100 p-2 rounded mb-4">
        @if ($order['status'] === 'Pending')
        <span class="text-yellow-500">Tình trạng đơn</span>
        <span class="text-yellow-500 font-semibold">Chờ xác nhận</span>
        @elseif ($order['status'] === 'Success')
        <span class="text-green-600">Giao hàng thành công</span>
        <span class="text-green-600 font-semibold">Hoàn thành</span>
        @elseif ($order['status'] === 'Failed')
        <span class="text-red-600">Tình trạng đơn</span>
        <span class="text-red-600 font-semibold">Đã hủy</span>
        @else
        <span class="text-yellow-500">Tình trạng đơn: Đã thanh toán</span>
        <span class="text-yellow-500 font-semibold">Chờ xác nhận</span>
        @endif
    </div>

    <div class="mb-4">

        @foreach ($order['order_details'] as $orderDetail )
        <div class="flex items-start mb-2">
            <img src="{{ $orderDetail ->image }}" alt="Bandana" class="w-20 h-20 object-cover mr-4" width="50" height="50">
            <div class="w-full">
                <h2 class="text-sm font-semibold">{{ $orderDetail ->name }}</h2>
                <div class="flex items-center justify-between">
                    <span class="text-xs">Số lượng: {{ $orderDetail ->quantity }} {{ $orderDetail ->unit_name }}</span>
                    <div class="w-1/2 text-right">
                        @if ($orderDetail -> discount > 0)
                        <span class="text-xs line-through text-gray-500">{{ number_format($orderDetail->retail_price, 0, ',', '.') }} ₫</span>
                        <span class="text-sm font-semibold">{{ number_format($orderDetail->retail_price - $orderDetail->discount, 0, ',', '.') }} ₫</span>
                        @else
                        <span class="text-sm font-semibold">{{ number_format($orderDetail->retail_price - $orderDetail->discount, 0, ',', '.') }} ₫</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <div class="flex justify-between items-center mt-4">
        <span class="font-semibold">Thành tiền: </span>
        <span class="font-bold text-xl">{{ number_format($order['total_price']),0,',' , '.' }}₫</span>
    </div>

    <div class="flex justify-right mt-4">
        <a href="{{ route('contact') }}"><button class="text-blue-500 hover:text-blue-700 mr-3">Liên hệ</button></a>
        <a href="{{ route('oder.detail', $order['code']) }}"><button class="text-blue-500 hover:text-blue-700">Chi tiết</button></a>
        @if ($order['status'] === 'Pending' && $order['payment_method_id'] === 1)
        <a href="{{ route('order.edit', $order['code']) }}"><button class="text-blue-500 hover:text-blue-700 ml-3">Chỉnh sửa</button></a>
        <form method="POST" action=" {{ route('order.delete', $order['code']) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500 hover:text-blue-700 ml-3" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn không?')">Hủy</button>
        </form>
        @elseif ($order['status'] === 'Failed' && $order['payment_method_id'] === 1)
        <a href="{{ route('order.restore', $order['code']) }}"><button class="text-blue-500 hover:text-blue-700 ml-3">Mua lại</button></a>
        @endif
    </div>
</div>

@endforeach