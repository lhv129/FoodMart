<div class="modal-content p-8">
    <div class="flex justify-between items-center mb-4">
        <h4 class="font-bold text-gray-800" id="userModalLabel">{{ $user->name }}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x text-gray-700" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M18 6l-12 12"></path>
                <path d="M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <div class="modal-body flex justify-center mb-6">
        <img class="rounded-full w-full md:w-1/2" src="{{ $user->avatar }}">
    </div>
    <div class="flex justify-between items-center flex-wrap md:flex-nowrap">
        <a href="{{ route('profile') }}" class="w-full md:w-1/3 mb-2 btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 btn-sm">Thông tin chi tiết</a>
        <a href="{{ route('logout') }}" class="w-full md:w-1/3 mb-2 btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-green-300 btn-sm">Đăng xuất</a>
    </div>
</div>