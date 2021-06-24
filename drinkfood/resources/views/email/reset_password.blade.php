<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ trans_choice('message.email_title', 2) }}</title>

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
        <h3>{{ trans_choice('message.email_title', 2) }}</h3>
        <p class="content_mail">
            {{ trans('message.fullname') }}: <span class="text_info">{{$user_info['fullname']}}</span> <br>
            {{ trans('message.email') }}: <span class="text_info">{{$user_info['email']}}</span> <br>
            {{ trans('message.password') }}: <span class="text_info">{{$user_info['password']}}</span><br>
            <span class="attention">{{ trans('message.attention_reset_pass') }}</span><br>
            {{ trans('message.how_to_login') }}<br>
            {{ trans_choice('message.how_to_login_tutorial', 1) }}<br>
            {{ trans_choice('message.how_to_login_tutorial', 2) }}<br><br>     
        </p>
    </div>
</body>
</html>