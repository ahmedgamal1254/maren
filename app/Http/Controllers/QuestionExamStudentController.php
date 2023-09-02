<?php

namespace App\Http\Controllers;

use App\Models\Question_Exam_Student;
use App\Http\Requests\StoreQuestion_Exam_StudentRequest;
use App\Http\Requests\UpdateQuestion_Exam_StudentRequest;

class QuestionExamStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestion_Exam_StudentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Question_Exam_Student $question_Exam_Student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question_Exam_Student $question_Exam_Student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestion_Exam_StudentRequest $request, Question_Exam_Student $question_Exam_Student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question_Exam_Student $question_Exam_Student)
    {
        return redirect()->back()->with("message","تمت العملية بنجاح");
    }
}
