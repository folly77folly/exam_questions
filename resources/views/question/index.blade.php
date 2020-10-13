<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <style>
        body {
            padding: 0;
            /* margin: 0; */
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 16px;
            color: #666;
            line-height: 28px;
        }

        input {
            width: auto;
            /* margin-right: 15px; */
            margin-left: 15px;
            vertical-align: middle;
        }

        .question-answer label {
            display: block;
        }

        h4 {
            margin: 25px 0 5px;
        }

        .text-option{
            margin-left: 10px ;

        }

    </style>
</head>

<body>
    <div class="">
        <a href="{{ route('create' )}}">Back to Questions</a>
        <div class="container" id="report">
            <h1>
                All Questions Report 
            </h1>

        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "{{ route('report') }}",
            success : function(data){
                console.log(data);
                $('#report').append(data);

            }
        })
    })

</script>
