<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.client')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->

@endsection

@section('title')
Tin tức
@endsection
@section('content')

<main>
    <section class="mt-8">

        <div class="container">
            <div class="text-center">
                <h2><span class="active">Tin tức về FoodMart</h2>
                <p>Chuyên mục tin tức - blog giúp FoodMart tiếp cận được nhiều khách hàng<br>các bài viết là những nền tảng tốt nhất xây dựng thương hiệu</p>
            </div>
            <div class="flex flex-wrap justify-content-between mt-8">
                <div class="new-box">
                    <a href="">
                        <div class="new-box-img" style="background-image: url('assets/clients/images/news/our-news1.jpg')"></div>
                    </a>
                    <div class="new-text-box">
                        <h1>Dâu tây ở xứ sở thần tiên Đà Lạt.</h1>
                        <p class="blog-meta d-flex">
                            <span class="box-blog d-flex"><img class="icon-blog" src="{{ asset('assets/clients/images/news/user-solid.svg') }}">Admin</span>
                            <span class="box-blog d-flex"><img class="icon-blog" src="{{ asset('assets/clients/images/news/calendar-days-solid.svg') }}">12 September 2020</span>
                        </p>
                        <p class="note">Cây dâu tây là một loài cây thân thảo với tên khoa học là: Fragaria. Có những nơi còn gọi là cây dâu đất. Dâu tây không thuộc họ dâu mà là loài thực vật có hoa thuộc họ Hoa Hồng. Cây dâu tây cho quả màu đỏ mọng rất đáng yêu với mùi thơm ngào ngạt cực hấp dẫn.</p>
                        <a href="" class="read-btn">Xem thêm<span>&gt;</span></a>
                    </div>
                </div>
                <div class="new-box">
                    <a href="">
                        <div class="new-box-img" style="background-image: url('assets/clients/images/news/our-news2.jpg')"></div>
                    </a>
                    <div class="new-text-box">
                        <h1>Ăn hoa quả có tác dụng duy trì thị lực tốt.</h1>
                        <p class="blog-meta d-flex">
                            <span class="box-blog d-flex"><img class="icon-blog" src="{{ asset('assets/clients/images/news/user-solid.svg') }}">Admin</span>
                            <span class="box-blog d-flex"><img class="icon-blog" src="{{ asset('assets/clients/images/news/calendar-days-solid.svg') }}">12 September 2020</span>
                        </p>
                        <p class="note">Nhờ giàu anthocyanoside, hoa quả có thể giúp làm chậm quá trình giảm thị lực. Nhờ vào thành phần chống oxy hóa, có thể trì hoãn hoặc ngăn cản các vấn đề về thị lực liên quan đến tuổi tác, bao gồm: đục thủy tinh thể, thoái hóa điểm vàng, cận thị và viễn thị.</p>
                        <a href="" class="read-btn">Xem thêm<span>&gt;</span></a>
                    </div>
                </div>
                <div class="new-box">
                    <a href="">
                        <div class="new-box-img" style="background-image: url('assets/clients/images/news/our-news3.jpg')"></div>
                    </a>
                    <div class="new-text-box">
                        <h1>Việt Quất – Loại quả tuyệt vời cho sức khỏe.</h1>
                        <p class="blog-meta d-flex">
                            <span class="box-blog d-flex"><img class="icon-blog" src="{{ asset('assets/clients/images/news/user-solid.svg') }}">Admin</span>
                            <span class="box-blog d-flex"><img class="icon-blog" src="{{ asset('assets/clients/images/news/calendar-days-solid.svg') }}">12 September 2020</span>
                        </p>
                        <p class="note">Trái việt quất Blueberry hay còn gọi là Sim Úc, là một loại quả có nhiều chất bổ dưỡng giúp chống lại bệnh tiểu đường, bệnh tim mạch, giảm cholesterol và nhất là hiện tượng lão hóa của các tế bào trong cơ thể.</p>
                        <a href="" class="read-btn">Xem thêm<span>&gt;</span></a>
                    </div>
                </div>
                <div class="new-box">
                    <a href="">
                        <div class="new-box-img" style="background-image: url('assets/clients/images/news/news-bg-4.jpg')"></div>
                    </a>
                    <div class="new-text-box">
                        <h1>Có gì khác biệt ở táo New Zealand với các loại táo thông thường.</h1>
                        <p class="blog-meta d-flex">
                            <span class="box-blog d-flex"><img class="icon-blog" src="{{ asset('assets/clients/images/news/user-solid.svg') }}">Admin</span>
                            <span class="box-blog d-flex"><img class="icon-blog" src="{{ asset('assets/clients/images/news/calendar-days-solid.svg') }}">12 September 2020</span>
                        </p>
                        <p class="note">Nhắc đến táo New Zealand, chắc hẳn chúng ta sẽ nghĩ ngay tới táo Envy và Táo Rockit. 2 loại này thường được xếp vào danh sách táo ngon nhất thế giới. Không chỉ mang vẻ ngoài bắt mắt, sang trọng nên chúng thường được xếp vào các giỏ quà, hai loại táo này còn được nhiều người biết đến với hương vị thơm ngon, thịt giòn, chắc và rất ngọt.</p>
                        <a href="" class="read-btn">Xem thêm<span>&gt;</span></a>
                    </div>
                </div>
                <div class="new-box">
                    <a href="">
                        <div class="new-box-img" style="background-image: url('assets/clients/images/news/news-bg-5.jpg')"></div>
                    </a>
                    <div class="new-text-box">
                        <h1>Công dụng dưa hấu mang lại chỉ với việc ăn 1 lát mỗi ngày.</h1>
                        <p class="blog-meta d-flex">
                            <span class="box-blog d-flex"><img class="icon-blog" src="{{ asset('assets/clients/images/news/user-solid.svg') }}">Admin</span>
                            <span class="box-blog d-flex"><img class="icon-blog" src="{{ asset('assets/clients/images/news/calendar-days-solid.svg') }}">12 September 2020</span>
                        </p>
                        <p class="note">Dưỡng da là một trong những công dụng dưa hấu mang lại. Bổ mắt vì dưa hấu chứa nhiều vitamin A khi bạn biết đến công dụng dưa hấu. Giảm đau nhức cơ bắp- Công dụng dưa hấu góp phần giảm đau hiệu quả. Công dụng dưa hấu trong hệ miễn dịch</p>
                        <a href="" class="read-btn">Xem thêm<span>&gt;</span></a>
                    </div>
                </div>
                <div class="new-box">
                    <a href="">
                        <div class="new-box-img" style="background-image: url('assets/clients/images/news/news-bg-6.jpg')"></div>
                    </a>
                    <div class="new-text-box">
                        <h1>Nho xanh nhập khẩu không hạt giòn ngọt.</h1>
                        <p class="blog-meta d-flex">
                            <span class="box-blog d-flex"><img class="icon-blog" src="{{ asset('assets/clients/images/news/user-solid.svg') }}">Admin</span>
                            <span class="box-blog d-flex"><img class="icon-blog" src="{{ asset('assets/clients/images/news/calendar-days-solid.svg') }}">12 September 2020</span>
                        </p>
                        <p class="note">Nho xanh không hạt là một loại trái cây được yêu thích trên toàn thế giới nhờ hương vị ngọt ngào, mọng nước và sự tiện lợi khi không có hạt. Với màu sắc xanh tươi mát và hình dáng bầu dục hấp dẫn, nho xanh không hạt không chỉ là một món ăn ngon mà còn mang lại nhiều lợi ích sức khỏe đáng kể.</p>
                        <a href="" class="read-btn">Xem thêm<span>&gt;</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pagination-wrap">
            <div class="container text-center">
                <ul>
                    <li><a href="">Quay lại</a></li>
                    <li><a href="">1</a></li>
                    <li><a class="active" href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">Tiếp</a></li>
                </ul>
            </div>
        </div>
    </section>
</main>

@endsection

@section('js')

@endsection(js)