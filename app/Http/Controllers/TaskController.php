<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
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
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|string',
           'description' => 'required|string'
        ]);

        $data = new Task;
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->is_done = false;
        $data->save();
        Alert::success('Success', 'Anda Telah Berhasil Menambahkan Task');
        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);
        return view('task.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string'
         ]);

         $data = Task::find($id);
         $data->user_id = Auth::user()->id;
         $data->name = $request->name;
         $data->description = $request->description;
         $data->is_done = $request->is_done;
         $data->save();
         Alert::success('Success', 'Anda Telah Berhasil Mengubah Task');
         return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        Alert::success('Success', 'Anda Telah Berhasil Menghapus Task');
        return redirect()->back();
    }
}
