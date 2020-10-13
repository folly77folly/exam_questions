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
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Create Question
                </div>
                <div id="errordiv" class="text-danger font-weight-bold bg-info"></div>
                <form action="{{route('store')}}" method="POST" >
                    <div class="form-group">
                        <label for="body"></label>
                        <textarea name="question" id="question" class="form-control @error('question')is-invalid @enderror" placeholder="Enter Questions"></textarea>
                        @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>
                    <div class="form-group">
                        <label for="optionA">Option A</label>
                        <input type="text" name="optionA" id="optionA" class="form-control @error('optionA')is-invalid @enderror">
                        @error('optionA')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>
                    <div class="form-group">
                        <label for="tilte">Option B</label>
                        <input type="text" name="optionB" id="optionB" class="form-control @error('optionB')is-invalid @enderror">
                        @error('optionB')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>
                    <div class="form-group">
                        <label for="tilte">Option C</label>
                        <input type="text" name="optionC" id="optionC" class="form-control @error('optionC')is-invalid @enderror">
                        @error('optionC')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>
                    <div class="form-group">
                        <label for="tilte">Option D</label>
                        <input type="text" name="optionD" id="optionD" class="form-control @error('optionD')is-invalid @enderror">
                        @error('optionD')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>
                    <div class="form-group form-check form-check-inline">
                        <fieldset>
                            <legend class="legend-label">
                                Category
                            </legend>
                            @foreach($categories as $category)
                            <input type="radio" value="{{ $category->id }}" name="category_id" id="category_id" class="form-check-input mr-4">
                            <label for="" class="form-check-label ml-5 @error('category_id')is-invalid @enderror">{{$category->name}}</label>
                            @endforeach
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror 
                        </fieldset>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="button" onclick="createQuestion();">Create a new Question</button>
                        <button class="btn btn-primary" type="button" onclick="showQuestions();">Show All Questions</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </body>
</html>

<script>

function createQuestion(){
    // 
    var $category_id =""
    var $question = document.getElementById('question').value;
    var $optionA = document.getElementById('optionA').value;
    var $optionB = document.getElementById('optionB').value;
    var $optionC = document.getElementById('optionC').value;
    var $optionD = document.getElementById('optionD').value;
    var $category_id = document.querySelector('input[name="category_id"]:checked');
    if ($category_id === null){
        $category_id =""
    }else{
        $category_id = document.querySelector('input[name="category_id"]:checked').value;
    }

        $.ajax({
        type:'POST',
        url: "{{ route('store') }}",
        data: {
            question: $question,
            optionA: $optionA,
            optionB: $optionB,
            optionC: $optionC,
            optionD: $optionD,
            category_id: $category_id,
            _token: '{{csrf_token()}}'
         },

         beforeSend: function(){
            // Show image container
            $("#verifyloader").show();
            $('#errordiv').hide()
        },
        success:function(data){
            $('#errordiv').html("Question Added Successfully");
            $('#errordiv').show()  ;
            document.getElementById('question').value= ""
            document.getElementById('optionA').value = ""
            document.getElementById('optionB').value =""
            document.getElementById('optionC').value =""
            document.getElementById('optionD').value =""
        },
        error:function(data){
            console.log(data);
            var errors = data.responseJSON;
            // console.log(errors.errors)
            $('#errordiv').html(errors.errors) ;
            $.each(errors.errors, function(key, value){
                console.log(value)
                $('#errordiv').append(value + "<br>")
                $('#errordiv').show()  ;
                // showErrorToast(value);
            });
            // console.log(JSON.parse(data.responseText));
            // $('#fullname').val(data);

        },
        complete:function(data){
            // Hide image container
            $("#verifyloader").hide();
        }

    })
}


function showQuestions(){
    window.location.href = "{{route('index')}}"
}
</script>
