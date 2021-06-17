<?php
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\User;

/* Function show profile link and button logout in menu */
function showProfileLink()
{
    $style_display = "";
    $profile_link = "";
    $logout_link = "";

    /* Nếu người dùng đã đăng nhập thì tạo link profile và link logout */
    if (!empty(Auth::user()))
    {   
        $userInfo = Auth::user();

        /* Lấy tên mạng xã hội đăng nhập */
        $username = $userInfo->username;
        $arr_username = explode('_', $username);
        $type_network = $arr_username[0];

        /* Nếu là google thì hiển thị icon google, ngược lại thì hiển thị icon facebook */
        $icon_network = "";
        if($type_network == "gg") $icon_network = "(<i class='fab fa-google'></i>)";
        if ($type_network == "fb") $icon_network = "(<i class='fab fa-facebook'></i>)";
        
        $style_display = "display:none";
        $profile_link = "<li><a href=".url('user')."><i class='fas fa-user'>&nbsp;&nbsp;&nbsp;</i>".$userInfo->fullname."&nbsp;&nbsp;".$icon_network."</a></li>";
        $logout_link = "<li><a href=".url('log_out')."><i class='fas fa-sign-out-alt'>&nbsp;&nbsp;&nbsp;</i>".trans('message.sign_out')."</a></li>";
       
    }
     
    $arr_link = [
        'style'=>$style_display,
        'profile_link'=>$profile_link,
        'logout_link'=>$logout_link
    ];
    return $arr_link;
} 
/* End: function showProfileLink() */

/* Begin: Function show list category */
function showCategory()
{
    return Category::where("status", 1)->get();
}

/* Show category name in title bar */
function showCategroryTitle($typeCat)
{
    $arrayTypeCat = [''=>__('message.all'), '1'=>__('message.foods'), '2'=>__('message.drinks')];
    return " <i class='fas fa-arrow-right'></i> <a href='".url('/product').'/'.$typeCat."'>".$arrayTypeCat[$typeCat]."</a>";
}

/* Begin: Function check image product */
function productImage($image)
{
    if($image == "")  return asset("images/img_default.jpg");
    else return asset("uploads/images/products/$image");
}
/* End: Function check image product */

/* Function add params to link paginate */
function addParamsLinkPaginate()
{
    $paramFilter = "";
    if(request()->filled('search')) $paramFilter .= "&search=".request()->search;
    if(request()->filled('order')) $paramFilter .= "&order=".request()->order;
    if(request()->filled('price_start')) $paramFilter .= "&price_start=".request()->price_start;
    if(request()->filled('price_end')) $paramFilter .= "&price_end=".request()->price_end;
    if(request()->filled('rating')) $paramFilter .= "&rating=".request()->rating;
    return $paramFilter;
}

/* Function show selectbox choose order */
function showSelectBoxOrder($orderParam)
{
    $arrayOrderOption = [
        1 => "&#xf15d;&nbsp;&nbsp; A-Z",
        2 => "&#xf0de;&nbsp;&nbsp;".trans_choice('message.filter_type', 2),
        3 => "&#xf0dd;&nbsp;&nbsp;".trans_choice('message.filter_type', 3),
    ];

    $optionOrder = "";
    for($i = 1; $i <= 3; $i++)
    {
        if($orderParam == $i) $selected = "selected";
        else $selected = "";
        $optionOrder .= "<option value='".$i."' $selected>$arrayOrderOption[$i]</option>";
    }
    return $optionOrder;
}

/* Function show selectbox choose star rating of filter bar */
function showSelectBoxRatingFilter($ratingParam)
{
    $arrayStarOption = [
        1 => "&#xf006; &#xf006; &#xf006; &#xf006; &#xf005;",
        2 => "&#xf006; &#xf006; &#xf006; &#xf005; &#xf005;",
        3 => "&#xf006; &#xf006; &#xf005; &#xf005; &#xf005;",
        4 => "&#xf006; &#xf005; &#xf005; &#xf005; &#xf005;",
        5 => "&#xf005; &#xf005; &#xf005; &#xf005; &#xf005;",
    ];

    $optionRating = "";
    for($i = 5; $i >= 1; $i--)
    {
        if($ratingParam == $i) $selected = "selected";
        else $selected = "";
        $optionRating .= "<option value='".$i."' $selected>$arrayStarOption[$i]</option>";
    }
    return $optionRating;
}

/* Function return amount and quantity of product in cart*/
$GLOBALS['arrayAmountProduct'] = [];
function calcAmountProduct($unitPrice, $idOrder, $idProduct, $uidProduct)
{
    if(Session::has($uidProduct))
    {
        $productInfo = Session::get($uidProduct);
        $amountProduct = $productInfo['amountProduct'];
    }else{
        $quantityProduct = OrderDetail::scopeQuantityProduct($idOrder, $idProduct);
        $amountProduct = $unitPrice*$quantityProduct;
    }
    array_push($GLOBALS['arrayAmountProduct'], $amountProduct);
    return $amountProduct;
}

/* Function get quantity of product */
function getQuantity($idOrder, $idProduct, $uidProduct)
{
    if(Session::has($uidProduct))
    {
        $productInfo = Session::get($uidProduct);
        return $productInfo['quantity'];
    }
    return OrderDetail::scopeQuantityProduct($idOrder, $idProduct);
}

/* Function calc total order */
function calcTotalOrder()
{
    $totalOrder = 0;
    for($i = 0; $i < count($GLOBALS['arrayAmountProduct']); $i++)
    {
        $totalOrder += $GLOBALS['arrayAmountProduct'][$i];
    }
    return $totalOrder;
}

/* Function get name product */
function getNameProduct($idProduct)
{
    return Product::scopeGetNameProduct($idProduct);
}

function showContentEmail($detailOrder)
{
    $numOrder = 0;
    $rowTable = "";
    for ($i = 0; $i < count($detailOrder); $i++) { 
        $numOrder++;
        $idProduct = $detailOrder[$i]['id_product'];
        $quantity = $detailOrder[$i]['quantity'];
        $unitPrice = number_format($detailOrder[$i]['unit_price'], 0, ',', '.')." VND";
        $amountProduct = number_format($detailOrder[$i]['unit_price']*$detailOrder[$i]['quantity'], 0, ',', '.')." VND";

        $rowTable .= "<tr class='row_content'><td>".$numOrder."</td><td>".getNameProduct($idProduct)."</td>
            <td>".$quantity."</td><td>".$unitPrice."</td>
            <td>".$amountProduct."</td></tr>";
    }
    return $rowTable;
}

/* Function get historyOrder */
function getHistoryOrder($idUser)
{
    return Order::scopeGetHistoryOrder($idUser);
}

function formatCurrency($currency)
{
    return number_format($currency, 0, ',', '.')." VND";
}

/* Function change color text with status */
function changeColorStatus($status){
    switch ($status) {
        case 1:
            return "black";
            break;
        case 2:
            return "blue";
            break;
        case 3:
            return "orange";
            break;
        case 4:
            return "green";
            break;
        default:
            return "red";
            break;
    }
}
?>