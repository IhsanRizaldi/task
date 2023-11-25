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
        //
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
    public function update_status(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        if ($task->is_done == false) {
            $task->is_done = true;
            $task->save();
        } else {
            $task->is_done = false;
            $task->save();
        }
        

        Alert::success('Success', 'Anda Telah Berhasil Mengubah Status Task');
        return redirect()->route('home.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('task_id');
        $name = $request->input('name');
        $description = $request->input('description');
        $is_done = $request->input('is_done');

        $task = Task::findOrFail($id);

        $task->name = $name;
        $task->description = $description;
        $task->is_done = $is_done;

        $task->save();

        Alert::success('Success', 'Anda Telah Berhasil Mengubah Task');
        return redirect()->route('home.index');
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
