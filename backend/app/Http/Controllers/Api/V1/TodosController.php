<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    // -------- ここから追記 --------
    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $todo = Todo::create($validated);

        return response()->json($todo, 201);
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return response()->json(['message' => 'Todo deleted successfully']);
    }

    private function todoParams(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);
    }
}
