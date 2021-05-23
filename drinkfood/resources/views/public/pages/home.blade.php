@extends('public/layouts/master_layout')
@section('title', 'Trang chủ')

@section('content')
<div class="box_content">
    {{-- Begin: Thanh tiêu đề --}}
    <div class="content_bar">
        <div class="title_content">
            <span class="title_bar">{{ trans('message.foods') }}</span>
        </div>
    </div>
    {{-- End: Thanh tiêu đề --}}

    {{-- Begin: Danh sách sản phẩm --}}
    <div class="product_box">
        <div class="templatemo_product_box">
            <h1>Phở Bò <span>(Bà Nga)</span></h1>
            <div class="box_img">
                <img src="{{asset('images/sp1.jpg')}}" alt="image" />
            </div>
            <div class="product_info">
                <p>Quán phở bò ngon ở Đà Nẵng</p>
                <h3>25.000 VNĐ</h3>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="buy_now_button"><a href="#">{{ trans('message.order') }}</a></div>
                <div class="detail_button"><a href="#">{{ trans('message.detail') }}</a></div>
            </div>
            <div class="cleaner">&nbsp;</div>
        </div>
    
        <div class="cleaner_with_width">&nbsp;</div>
    
        <div class="templatemo_product_box">
            <h1>Cháo bột cá lóc  <span>(74 Quán)</span></h1>
            <div class="box_img">
                <img src="{{asset('images/sp2.jpg')}}" alt="image" />
            </div>
            <div class="product_info">
                <p>74 Quán quán nằm ở đường Phạm Như Xương.</p>
                <h3>15.000 VNĐ</h3>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="buy_now_button"><a href="#">{{ trans('message.order') }}</a></div>
                <div class="detail_button"><a href="#">{{ trans('message.detail') }}</a></div>
            </div>
            <div class="cleaner">&nbsp;</div>
        </div>
    
        <div class="cleaner_with_height">&nbsp;</div>
    
        <div class="templatemo_product_box">
            <h1>Cơm gà chiên <span>(Bé A)</span></h1>
            <div class="box_img">
                <img src="{{asset('images/sp3.jpg')}}" alt="image" />
            </div>
            <div class="product_info">
                <p>Cơm Gà Chiên của cửa hàng Cơm Bé A ở 25 Ngô Thì Nhậm.</p>
                <h3>30.000 VNĐ</h3>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="buy_now_button"><a href="#">{{ trans('message.order') }}</a></div>
                <div class="detail_button"><a href="#">{{ trans('message.detail') }}</a></div>
            </div>
            <div class="cleaner">&nbsp;</div>
        </div>
    
        <div class="cleaner_with_width">&nbsp;</div>
    
        <div class="templatemo_product_box">
            <h1>Cơm Gà Chiên  <span>(Cơm 165)</span></h1>
            <div class="box_img">
                <img src="{{asset('images/sp4.jpg')}}" alt="image" />
            </div>
            <div class="product_info">
                <p>Cơm Gà Chiên của cửa hàng Cơm 165 ở 165 Ngô Thì Nhậm. </p>
                <h3>25.000 VNĐ</h3>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="buy_now_button"><a href="#">{{ trans('message.order') }}</a></div>
                <div class="detail_button"><a href="#">{{ trans('message.detail') }}</a></div>
            </div>
            <div class="cleaner">&nbsp;</div>
        </div>
    
        <div class="cleaner_with_height">&nbsp;</div>
    </div>
    {{-- End: Danh sách sản phẩm --}}
</div>    
    
<div class="box_content">
    {{-- Begin: Thanh tiêu đề --}}
    <div class="content_bar">
        <div class="title_content">
            <span class="title_bar">{{ trans('message.drinks') }}</span>
        </div>
    </div>
    {{-- End: Thanh tiêu đề --}}

    {{-- Begin: Danh sách sản phẩm đồ uống--}}
    <div class="product_box">
        <div class="templatemo_product_box">
            <h1>Cafe Đen <span>(Tcafe)</span></h1>
            <div class="box_img">
                <img src="{{asset('images/sp1.jpg')}}" alt="image" />
            </div>
            <div class="product_info">
                <p>Cafe đen của cửa hàng Tcafe ở 09 Ngô Văn Sở</p>
                <h3>10.000 VNĐ</h3>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="buy_now_button"><a href="#">{{ trans('message.order') }}</a></div>
                <div class="detail_button"><a href="#">{{ trans('message.detail') }}</a></div>
            </div>
            <div class="cleaner">&nbsp;</div>
        </div>
    
        <div class="cleaner_with_width">&nbsp;</div>
    
        <div class="templatemo_product_box">
            <h1>Cafe Sữa  <span>(Tcafe)</span></h1>
            <div class="box_img">
                <img src="{{asset('images/sp2.jpg')}}" alt="image" />
            </div>
            <div class="product_info">
                <p>Cafe sữa của cửa hàng Tcafe ở 09 Ngô Văn Sở.</p>
                <h3>15.000 VNĐ</h3>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="buy_now_button"><a href="#">{{ trans('message.order') }}</a></div>
                <div class="detail_button"><a href="#">{{ trans('message.detail') }}</a></div>
            </div>
            <div class="cleaner">&nbsp;</div>
        </div>
    
        <div class="cleaner_with_height">&nbsp;</div>
    
        <div class="templatemo_product_box">
            <h1>Trà Sữa Trân Châu <span>(Mộc)</span></h1>
            <div class="box_img">
                <img src="{{asset('images/sp3.jpg')}}" alt="image" />
            </div>
            <div class="product_info">
                <p>Là thức uống đặc biệt của cửa hàng Mộc ở 65 Ngô Văn Sở.</p>
                <h3>30.000 VNĐ</h3>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="buy_now_button"><a href="#">{{ trans('message.order') }}</a></div>
                <div class="detail_button"><a href="#">{{ trans('message.detail') }}</a></div>
            </div>
            <div class="cleaner">&nbsp;</div>
        </div>
    
        <div class="cleaner_with_width">&nbsp;</div>
    
        <div class="templatemo_product_box">
            <h1>Cơm Gà Chiên  <span>(Cơm 165)</span></h1>
            <div class="box_img">
                <img src="{{asset('images/sp4.jpg')}}" alt="image" />
            </div>
            <div class="product_info">
                <p>Cơm Gà Chiên của cửa hàng Cơm 165 ở 165 Ngô Thì Nhậm. </p>
                <h3>25.000 VNĐ</h3>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="buy_now_button"><a href="#">{{ trans('message.order') }}</a></div>
                <div class="detail_button"><a href="#">{{ trans('message.detail') }}</a></div>
            </div>
            <div class="cleaner">&nbsp;</div>
        </div>
    
        <div class="cleaner_with_height">&nbsp;</div>
    </div>
    {{-- End: Danh sách sản phẩm đồ uống--}}
 
</div>

@endsection
