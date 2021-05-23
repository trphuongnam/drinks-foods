@extends('public/layouts/master_layout')
@section('title', trans('message.product'))

@section('content')

<div class="box_content">
    <div class="content_bar">
        <div class="title_content">
            <span class="title_bar">{{ trans('message.product') }}</span>
        </div>

        <div class="filter">
            <form action="#" method="POST">
                <label>{{ trans('message.filter') }}</label>
                <select name="filter" id="filter">
                    <option value="1">{{ trans_choice('message.filter_type', 1) }}</option>
                    <option value="2">{{ trans_choice('message.filter_type', 2) }}</option>
                    <option value="3">{{ trans_choice('message.filter_type', 3) }}</option>
                    <option value="4">{{ trans_choice('message.filter_type', 4) }}</option>
                    <option value="5">{{ trans_choice('message.filter_type', 5) }}</option>
                </select>
            </form>
        </div>
    </div>
    

    
    <div class="product_box">
        <div class="templatemo_product_box">
            <h1>Phở Bò <span>(Bà Nga)</span></h1>
            <div class="box_img">
                <a href="#"><img src="http://localhost/Php_nam_P1/drinkfood/public/images/sp1.jpg" alt="image"></a>
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
                <a href="#"><img src="http://localhost/Php_nam_P1/drinkfood/public/images/sp2.jpg" alt="image"></a>
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
                <a href="#"><img src="http://localhost/Php_nam_P1/drinkfood/public/images/sp3.jpg" alt="image"></a>
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
                <a href="#"><img src="http://localhost/Php_nam_P1/drinkfood/public/images/sp4.jpg" alt="image"></a>
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
    
</div>
<div class="pagination_bar">
    <ul class="pagination">
        <li><a href="#">{{ trans('message.prev') }}</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">{{ trans('message.next') }}</a></li>
    </ul>
</div>
@endsection
