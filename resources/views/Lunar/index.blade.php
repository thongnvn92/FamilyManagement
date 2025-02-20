@extends('layouts.app')

@section('content')
    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?nature,autumn') no-repeat center center;
            background-size: cover;
            font-family: 'Nunito', sans-serif;
        }

        .calendar-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 20px;
        }

        #amlich-calendar {
            display: flex;
        }
        .header-calendar {
            background-color: #2c3e50;
            color: white;
            padding: 10px;
            border-radius: 2px 2px 0 0;
            text-align: center;
            font-weight: bold;
        }

        .selected-date {
            font-size: 5rem;
            font-weight: 600;
            color: #2c3e50;
            line-height: 3rem;
        }

        .calendar td {
            height: 66px;
            text-align: center;
            cursor: pointer;
            padding: 15px;
            transition: 0.3s;
            position: relative;
        }

        .calendar .selected {
            background-color: #91b5d1;
            color: white;
        }
        .calendar .homnay {
            background-color: #27ae60;
            color: white;
        }

        .calendar td:hover {
            background-color: #cadbe9;
            color: white;
            opacity: 0.8;
        }

        .calendar th {
            width: fit-content;
            height: 50px;
            background-color: #2c3e50;
            color: white;
            padding: 7px;
        }

        .info-container {
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
            color: #2c3e50;
        }

        .day-duong {
            font-size: 1.2rem;
            font-weight: bold;
            position: absolute;
            top: 5px;
            left: 5px;
        }

        .day-am {
            font-size: 0.8rem;
            position: absolute;
            bottom: 5px;
            right: 5px;
            color: #555;
        }

        .btn-nav {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: none;
            background-color: transparent;
            color: #a8a8a8;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s, transform 0.2s;
            opacity: 0.5;
        }

        .btn-nav:hover {
            background-color: #f2f2f2;
            transform: scale(1.0);
            opacity: 0.5;
        }

        hr {
            border: 0;
            height: 1px;
            background: #333;
            background: -webkit-linear-gradient(left, hsla(0, 0%, 0%, 0) 0%, hsla(0, 0%, 0%, .75) 50%, hsla(0, 0%, 0%, 0) 100%);
            background: -moz-linear-gradient(left, hsla(0, 0%, 0%, 0) 0%, hsla(0, 0%, 0%, .75) 50%, hsla(0, 0%, 0%, 0) 100%);
            background: -ms-linear-gradient(left, hsla(0, 0%, 0%, 0) 0%, hsla(0, 0%, 0%, .75) 50%, hsla(0, 0%, 0%, 0) 100%);
            background: -o-linear-gradient(left, hsla(0, 0%, 0%, 0) 0%, hsla(0, 0%, 0%, .75) 50%, hsla(0, 0%, 0%, 0) 100%);
        }
    </style>

    <div class="row justify-content-center">
        <div id="amlich-calendar"></div>
    </div>

    <script src="/assets/dist/js/jquery.amlich.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#amlich-calendar').amLich({
            type: 'bootstrap',
            tableWidth: '200px'
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".calendar td").click(function() {
                $(".calendar td").removeClass("selected");
                $(this).addClass("selected");
                $("#selectedDate").text($(this).data("day"));
            });
        });
    </script>

    </html>
@endsection
