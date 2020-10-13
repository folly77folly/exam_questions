<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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
                    Laravel
                </div>
                {{-- @include('partials.error-message') --}}
                <form action="{{route('store')}}" method="POST" >
                    <div class="form-group">
                        <label for="body"></label>
                        <textarea name="question" class="form-control @error('question')is-invalid @enderror" placeholder="Enter Questions"></textarea>
                        @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>
                    <div class="form-group">
                        <label for="tilte">Option A</label>
                        <input type="text" name="optionA" class="form-control @error('optionA')is-invalid @enderror">
                        @error('optionA')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>
                    <div class="form-group">
                        <label for="tilte">Option B</label>
                        <input type="text" name="optionB" class="form-control @error('optionB')is-invalid @enderror">
                        @error('optionB')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>
                    <div class="form-group">
                        <label for="tilte">Option C</label>
                        <input type="text" name="optionC" class="form-control @error('optionC')is-invalid @enderror">
                        @error('optionC')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>
                    <div class="form-group">
                        <label for="tilte">Option D</label>
                        <input type="text" name="optionD" class="form-control @error('optionD')is-invalid @enderror">
                        @error('optionD')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>
                    <div class="form-group form-check form-check-inline">
                        @foreach($categories as $category)
                        <input type="radio" value="{{ $category->id }}" name="category_id[]" class="form-check-input">
                        <label for="" class="form-check-label margin-left">{{$category->name}}</label>
                        @endforeach
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">Create a new Question</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </body>
</html>
