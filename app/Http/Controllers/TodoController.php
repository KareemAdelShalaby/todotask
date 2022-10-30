<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    //     $this->guard = "api";
    // }

    public function index()
    {

        // return Todo::orderBy('created_at', 'desc')->get();
        $todos = Todo::orderBy('created_at','desc')->paginate(100);
        return response()->json($todos);
        // return view('welcome',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new Todo();
        $todo->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */


    public function update($id,Todo $todo,Request $request)
    {
        $mytodo = Todo::where('id',$id)->first();
        $mytodo->update($request->all());
        // $todo->title = $request->title ;
        // $todo->note = $request->note ;
        // $todo->date = $request->date ;
        // $todo->save();
        return response()->json($mytodo->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::where('id',$id)->first();
        $todo->delete();
    }


    public function updateComplete($id)
    {
        $todo = Todo::where('id',$id)->first();
        if($todo->is_completed == 0 ){
            $todo->is_completed = 1 ;
        }
        else{
            $todo->is_completed = 0 ;
        }
        $todo->save();
        return response()->json($todo->id);

    }






}
