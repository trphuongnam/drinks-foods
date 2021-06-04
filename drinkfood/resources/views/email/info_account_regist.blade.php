<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email xác nhận thông tin đăng ký</title>

    <style>
        *{
            text-align: center;
        }
        #wrapper{
            width: 1000px;
            height: 100%;
            background-color: darkturquoise;
            margin: 0 auto;
        }

        .content_mail{
            text-align: left;
            margin: 0px 30px
        }

        .attention{
            color: #ec0d0d;
            font-style: bold;
            font-size: 20px;
        }
        .text_info{
            font-style: italic;
        }

    </style>
</head>
<body>
    <div id="wrapper">
        <h1>Drinks & Foods</h1>
        <h3>Xác Nhận Thông Tin Đăng Ký</h3>
        <p class="content_mail">           
            Tên: <span class="text_info">{{$user_infos['name']}}</span> <br>
            Email: <span class="text_info">{{$user_infos['email']}}</span> <br>
            
            Mật khẩu: <span class="text_info">a123456789</span><br>

            <span class="attention">Chú ý: Hãy đổi mật khẩu này sau khi đăng ký xong</span><br>

            Cách đăng nhập <br>
            - Cách 1: Đăng nhập với tài khoản Google hoặc Facebook mà bạn đã đăng ký với chúng tôi.<br>

            - Cách 2: Đăng nhập trực tiếp với email và password trên form đăng nhập.<br>
          
        </p>
        
        <h3>Confirm Registration Information</h3>
        <p class="content_mail">
            Name: <span class="text_info">{{$user_infos['name']}}</span> <br>
            Email: <span class="text_info">{{$user_infos['email']}}</span> <br>
            
            Password: <span class="text_info">a123456789</span><br>

            <span class="attention">Attention: Please change this password after registration is complete</span><br>

            How to login: <br>
            - Method 1: Sign in with the Google or Facebook account that you have registered with us.<br>

            - Method 2: Login directly with the email and password provided on the login form.<br>
        </p>
    </div>
</body>
</html>