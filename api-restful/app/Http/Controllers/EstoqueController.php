<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function index(): JsonResponse
    {
        $estoques = Estoque::all();
        return response()->json($estoques, 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'quantidade' => 'required|integer|min:0',
            'localizacao_fisica' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $estoque = Estoque::create($validated);
        return response()->json($estoque, 201);
    }

    public function show(string $id): JsonResponse
    {
        $estoque = Estoque::find($id);

        if (!$estoque) {
            return response()->json(['message' => 'Estoque não encontrado.'], 404);
        }

        return response()->json($estoque, 200);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $estoque = Estoque::find($id);

        if (!$estoque) {
            return response()->json(['message' => 'Estoque não encontrado.'], 404);
        }

        $validated = $request->validate([
            'quantidade' => 'sometimes|required|integer|min:0',
            'localizacao_fisica' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|string|max:255',
        ]);

        $estoque->update($validated);
        return response()->json($estoque, 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $estoque = Estoque::find($id);

        if (!$estoque) {
            return response()->json(['message' => 'Estoque não encontrado.'], 404);
        }

        $estoque->delete();
        return response()->json(null, 204);
    }
}