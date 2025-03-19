@if ($total > 0)
<div class="w-1/3 md:w-1/4 text-center">
    <span class="font-bold text-gray-800">{{ number_format($total, 0, ',', '.') }}đ</span>
</div>
@endif