<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry Submitted</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            overflow: hidden;
            padding: 0px 10px;
        }

        header {
            background: #3c8dbc;
            color: white;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #e8491d 4px solid;
        }

        header a {
            color: #ffffff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }

        header ul {
            padding: 0;
            margin: 0;
            list-style: none;
            overflow: hidden;
        }

        header #logo {
            margin-top: 10px;
            height: 50px;
            width: auto;
            float: left;
        }

        header #logo img {
            height: 40px;
        }

        header #logo span {
            font-weight: bold;
        }

        header a:hover {
            color: #efcd4f;
        }

        header #logo a {
            text-decoration: none;
            color: white;
            font-size: 1.7em;
            line-height: 70px;
        }

        header #logo a span {
            color: #efcd4f;
        }

        .main {
            padding: 20px 0;
        }

        .main h1 {
            color: #333;
        }

        .main p {
            font-size: 18px;
            line-height: 1.6em;
            color: #666;
        }

        .main .content {
            background: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .footer {
            background: #333;
            color: #fff;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div id="logo">
                <a href="{{ url('/') }}">
                    <span>MH ENTERPRISE</span>
                </a>
            </div>
        </div>
    </header>
    <div class="container main">
        <h1> <span style="color:#1946ee">{{ $inquiryData['name'] }}</span> Inquiry Submitted</h1>
        <div class="content">
            <h4 style="text-transfrom:uppercase;margin-top:10px;margin-bottom:10px;">Details</h4>
            <p><strong>Email Type:</strong> {{ $inquiryData['email_type'] }}</p>
            <p><strong>Name:</strong>
                @if ($inquiryData['name_prefix'])
                    {{ $inquiryData['name_prefix'] . ' ' }}
                @endif

                {{ $inquiryData['name'] }}
            </p>
            <p><strong>Email:</strong> {{ $inquiryData['email'] }}</p>

            <p><strong>Country:</strong> {{ $inquiryData['country'] }}</p>
            @if ($inquiryData['make'])
                <p><strong>Make:</strong></p>
                <p>{{ $inquiryData['make'] }} </p>
            @endif
            @if ($inquiryData['model'])
                <p><strong>Model:</strong></p>
                <p>{{ $inquiryData['model'] }} </p>
            @endif
            @if ($inquiryData['stock_number'])
                <p><strong>Stock Code :</strong></p>
                <p>{{ $inquiryData['stock_number'] }} </p>
            @endif
            @if ($inquiryData['price_from'])
                <p><strong>Price From:</strong></p>
                <p>{{ $inquiryData['price_from'] }} </p>
            @endif
            @if ($inquiryData['price_to'])
                <p><strong>Price To:</strong></p>
                <p>{{ $inquiryData['price_to'] }} </p>
            @endif
            @if ($inquiryData['currency'])
                <p><strong>currency:</strong></p>
                <p>{{ $inquiryData['currency'] }} </p>
            @endif
            @if ($inquiryData['reg_year_from'])
                <p><strong>Registration Year From:</strong></p>
                <p>{{ $inquiryData['reg_year_from'] }} </p>
            @endif
            @if ($inquiryData['reg_year_to'])
                <p><strong>Registration Year To :</strong></p>
                <p>{{ $inquiryData['reg_year_to'] }} </p>
            @endif
            @if ($inquiryData['drive_type'])
                <p><strong>Drive Type :</strong></p>
                <p>{{ $inquiryData['drive_type'] }} </p>
            @endif
            @if ($inquiryData['port'])
                <p><strong>Port Name :</strong></p>
                <p>{{ $inquiryData['port'] }} </p>
            @endif
            @if ($inquiryData['telephone'])
                <p><strong>Telephone :</strong></p>
                <p>{{ $inquiryData['telephone'] }} </p>
            @endif
            @if ($inquiryData['message'])
                <p><strong>Message:</strong></p>
                <p>{{ $inquiryData['message'] }}</p>
            @endif
        </div>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} MH ENTERPRISE . All rights reserved.
    </div>
</body>

</html>
