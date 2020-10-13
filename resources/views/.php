<!DOCTYPE html>
<html>
  <head>
    <title>Parent Engagement Survey</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #666;
      line-height: 28px;
      }
      h1, h4 {
      font-weight: 400;
      }
      h4 {
      margin: 25px 0 5px;
      color: #095484;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 3px;
      }
      form {
      width: 100%;
      padding: 20px;
      background: #fff;
      box-shadow: 0 2px 5px #ccc; 
      }
      input {
      width: auto;
      margin-right: 15px;
      vertical-align: middle;
      }
      .question-answer label {
      display: block;
      }
      .btn-block {
      margin-top: 20px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      -webkit-border-radius: 5px; 
      -moz-border-radius: 5px; 
      border-radius: 5px; 
      background-color: #095484;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background-color: #0666a3;
      }
    </style>
  </head>
  <body>
    <div class="testbox">
      <form action="/">
        <h1>Parent Engagement Survey</h1>
        <div>
          <h4>How often do you meet in person with teachers at your child's school?</h4>
          <div class="question-answer">
            <label><input type="radio" value="none" name="meet" />Almost never</label>
            <label><input type="radio" value="none" name="meet" />Once or twice per year</label>
            <label><input type="radio" value="none" name="meet" />Every few months</label>
            <label><input type="radio" value="none" name="meet" />Monthly</label>
            <label><input type="radio" value="none" name="meet" />Weekly or more</label>
          </div>
        </div>
        <div>
          <h4>How involved have you been with a parent group(s) at your child's school?</h4>
          <div class="question-answer">
            <label><input type="radio" value="none" name="involved" />Not at all involved</label>
            <label><input type="radio" value="none" name="involved" />A little involved</label>
            <label><input type="radio" value="none" name="involved" />Somewhat involved</label>
            <label><input type="radio" value="none" name="involved" />Quite involved</label>
            <label><input type="radio" value="none" name="involved" />Extremely involved</label>
          </div>
        </div>
        <div>
          <h4>In the past year, how often have you discussed your child's school with other parents from the school?</h4>
          <div class="question-answer">
            <label><input type="radio" value="none" name="discussed" />Almost never</label>
            <label><input type="radio" value="none" name="discussed" />Once or twice per year</label>
            <label><input type="radio" value="none" name="discussed" />Every few months</label>
            <label><input type="radio" value="none" name="discussed" />Monthly</label>
            <label><input type="radio" value="none" name="discussed" />Weekly or more</label>
          </div>
        </div>
        <div>
          <h4>In the past year, how often have you helped out at your child's school?</h4>
          <div class="question-answer">
            <label><input type="radio" value="none" name="name" />Almost never</label>
            <label><input type="radio" value="none" name="name" />Once or twice per year</label>
            <label><input type="radio" value="none" name="name" />Every few months</label>
            <label><input type="radio" value="none" name="name" />Monthly</label>
            <label><input type="radio" value="none" name="name" />Weekly or more</label>
          </div>
        </div>
        <div>
          <h4>How involved have you been in fundraising efforts at your child's school?</h4>
          <div class="question-answer">
            <label><input type="radio" value="none" name="fundraising" />Not at all involved</label>
            <label><input type="radio" value="none" name="fundraising" />A little involved</label>
            <label><input type="radio" value="none" name="fundraising" />Somewhat involved</label>
            <label><input type="radio" value="none" name="nafundraisingme" />Quite involved</label>
            <label><input type="radio" value="none" name="fundraising" />Extremely involved</label>
          </div>
        </div>
        <div>
          <h4>In the past year, how often have you visited your child's school?</h4>
          <div class="question-answer">
            <label><input type="radio" value="none" name="visited" />Almost never</label>
            <label><input type="radio" value="none" name="visited" />Once or twice per year</label>
            <label><input type="radio" value="none" name="visited" />Every few months</label>
            <label><input type="radio" value="none" name="visited" />Monthly</label>
            <label><input type="radio" value="none" name="visited" />Weekly or more</label>
          </div>
        </div>
        <div class="btn-block">
          <button type="submit" href="/">Send</button>
        </div>
      </form>
    </div>
  </body>
</html>


@foreach ($categories as $category)
                <h2>Category: {{ $category->name }}</h2>

                @foreach ($category->questions as $question)
                    <h4>Question : {{ $loop->index + 1 }} {{ $question->question }}</h4>

                    <div class="question-answer">
                        <label><input type="radio" value="{{ $question->options['optionA'] }}" name="cat_id" /><span class="text-option">{{ $question->options['optionA'] }}</span></label>
                        <label><input type="radio" value="{{ $question->options['optionB'] }}" name="cat_id" /><span class="text-option">{{ $question->options['optionB'] }}</span></label>
                        <label><input type="radio" value="{{ $question->options['optionC'] }}" name="cat_id" /><span class="text-option">{{ $question->options['optionC'] }}</span></label>
                        <label><input type="radio" value="{{ $question->options['optionD'] }}" name="cat_id" /><span class="text-option">{{ $question->options['optionD'] }}</span></label>
                    </div>

                @endforeach

            @endforeach