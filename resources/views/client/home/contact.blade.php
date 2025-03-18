<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.client')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('title')
Liên hệ
@endsection
@section('content')

<main>
    <section class="mt-8">
        <div class="container">
            <div class="text-center">
                <h2><span class="active">Liên hệ với chúng tôi</h2>
                <p>FoodMart cùng với ban hỗ trợ luôn trong trạng thái hỗ trợ khách<br>hãy liên hệ qua số điện thoại hoặc form ở dưới để gửi góp ý.</p>
            </div>

            <!-- Contact form -->
            <div class="contact-form-section">
                <div class="flex flex-wrap justify-content-between">
                    <div class="contact-form">
                        <div class="form-title">
                            <h1>Bạn có thắc mắc gì không??</h1>
                            <p>Nếu bạn đang gặp phải một vấn đề gì đó, đừng ngại hãy liên hệ ngay tới chúng tôi, chúng tôi luôn sẵn sàng hỗ trợ</p>
                        </div>
                        <div class="box-form">
                            <form method="POST" action="{{ route('handleSubmitContact') }}">
                                @csrf
                                <input class="box-contact-input" type="text" placeholder="Nhập họ tên" name="name">
                                <input class="box-contact-input" type="email" placeholder="Email của bạn" name="email">
                                <input class="box-contact-input" type="text" placeholder="Số điện thoại" name="name">
                                <input class="box-contact-message" type="text" placeholder="Nhập văn bản ở đây" name="email">
                                <button type="submit" class="btn inline-flex items-center mt-8 gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                    Gửi ngay
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-right inline-block" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l14 0"></path>
                                        <path d="M13 18l6 -6"></path>
                                        <path d="M13 6l6 6"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="contact-form-wrap">
                        <div class="contact-form-box">
                            <div class="d-flex justify-content-between">
                                <div class="contact-box-icon">
                                <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="contact-box-text">
                                    <h3>Địa chỉ shop</h3>
                                    <p>Miêu Nha<br>Tây Mỗ<br>Nam Từ Liêm, Hà Nội</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="contact-box-icon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="contact-box-text">
                                    <h3>Giờ mở cửa</h3>
                                    <p>Thứ 2 - Thứ 6: 8h tới 19h<br>Thứ 7 - Chủ nhật: 10h tới 20h</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="contact-box-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="contact-box-text">
                                    <h3>Số điện thoại</h3>
                                    <p>Số điện thoại: +00 111 222 3333<br>Email: vietlh.hn@gmail.com</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Location -->
        <div class="map-section">
            <div class="container">
                <div class="row">
                    <div class="box-map-text text-center">
                        <p><i class="fa fa-map-marker"></i>Find Our Location</p>
                    </div>
                </div>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29796.953932761942!2d105.72242586308924!3d21.007894660689015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134537a448f5531%3A0x9083fe6a98be371f!2zVMOieSBN4buXLCBOYW0gVOG7qyBMacOqbSwgSGFub2ksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1713424762331!5m2!1sen!2s" width="100%" height="800px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
</main>


@endsection

@section('js')

@endsection(js)