<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data['subject']}}</title>

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <style type="text/css">
    body{
      margin: 0;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.6;
      color: #212529;
      text-align: left;
      background-color: #fefefe;
      /*background-color: #e9ecef;*/

    }
    .mail-title {
      background: #374eb4;
      border-bottom: 1px solid #e5e9f2;
      padding: 10px 20px;
      border-radius: .25rem;
      text-align: center;
      /* margin-top: 1rem; */
      margin-bottom: 1rem;
    }
    .mail-title a {
        color: #fff;
        font-size: 19px;
        font-weight: bold;
        text-decoration: none;
    }
    .footer {
      background: #374eb4;
      border-bottom: 1px solid #e5e9f2;
      padding: 20px 30px;
      border-radius: .25rem;
      text-align: center;
      margin-top: 1rem;
      /* margin-bottom: 1rem; */
      bottom: 0;
    }

    .footer p {
        color: #fefefe;
        font-size: 14px;
        text-align: center;
    }

    .content{
      font-size: 1.2rem;
      font-weight: 400;
      line-height: 1.6;
      min-height: 40vh;
      padding: 15px;
    }
    .cn-b{
      padding: 10px;
    }

    </style>
</head>
<body>
    <div class="mail-title">
        <a href="{{route('index')}}"> {{env('APP_NAME')}}</a>
    </div>

    <h5>{{$data['subject']}}</h5>
    
    <p class="content">{!! $data['message'] !!}</p>
    <div class="cn-b">
      <hr class="mb-0">      
      <p style="margin-botton: 0px;">Best Regards,</p>
    </div>
    <!-- Footer -->
    <div class="footer py-4">
      <p>Developed by <b>Jay Flash </b></p>
       <p> © {{ date('Y') }} {{env('APP_NAME')}}. All rights reserved. </p>
    </div>
</body>
</html>


