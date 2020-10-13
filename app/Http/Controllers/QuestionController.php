<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\QuestionRequest;
use App\Question;
use App\Option;
use App\Constants\Collections;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('question.index', compact('categories'));

    }

    public function report()
    {
        //
        $categories = Category::all();
        $index= Collections::$INDEX;
        $returnValue = "";
        foreach ($categories as $category){
            $returnValue .= "<h2>Category: $category->name </h2>";
                
            foreach ($category->questions as $question) {
                if(isset($question)) {
                    $returnValue .= '<h4>Question : '.$index. ' '. $question->question .'</h4>
                    <div class="question-answer">
                    <label><input type="radio" value="'. $question->options['optionA'] .'" name="cat_id" /><span class="text-option">'. $question->options['optionA'] .'</span></label>
                    <label><input type="radio" value="'. $question->options['optionB'] .'" name="cat_id" /><span class="text-option">'. $question->options['optionB'] .'</span></label>
                    <label><input type="radio" value="'. $question->options['optionC'] .'" name="cat_id" /><span class="text-option">'. $question->options['optionC'] .'</span></label>
                    <label><input type="radio" value="'. $question->options['optionD'] .'" name="cat_id" /><span class="text-option">'. $question->options['optionD'] .'</span></label>
                    ';
    
                    $index++;
                }else

                $returnValue = '<h4>No Questions</h4>';
            }


        };
        

    print $returnValue;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
    
        return view('question.create', compact('categories'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        //
        $data = $request->validated();
        $question = $data['question'];
        $category_id = $data['category_id'];
        $optionA = $data['optionA'];
        $optionB = $data['optionB'];
        $optionC = $data['optionC'];
        $optionD = $data['optionD'];
    //question instance
    $questionData = [
        'question'=>$question, 
        'category_id'=>$category_id
    ];
    // dd($questionData);
    $question_new = Question::create($questionData);

    //option instance
    $optionData = [
        'question_id' => $question_new->id,
        'optionA' => $optionA, 
        'optionB' => $optionB,
        'optionC' => $optionC,
        'optionD' => $optionD,
    ];
    $question_new = Option::create($optionData);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
