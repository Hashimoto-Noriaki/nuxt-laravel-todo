<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }

    public function store(Request $request)
    {
        $validated = $request->validated(); // バリデーション済みのデータを取得

        $todo = Todo::create($validated);

        return response()->json($todo, 201);
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return response()->json(['message' => 'Todo deleted successfully']);
    }
}
