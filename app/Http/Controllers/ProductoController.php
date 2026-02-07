<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Nivel Oro: Lectura con filtros
     */
    public function index(Request $request)
    {
        $query = Producto::query();

        if ($request->has('categoria')) {
            $query->where('categoria', $request->input('categoria'));
        }
        if ($request->has('precio_max')) {
            $query->where('precio', '<=', $request->input('precio_max'));
        }
        if ($request->has('buscar')) {
            $query->where('nombre', 'like', '%' . $request->input('buscar') . '%');
        }

        return response()->json($query->get(), 200);
    }

    
    public function store(Request $request)
    {
        // Validación estricta
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'categoria' => 'nullable|string',
            'imagen' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'stock' => 'integer|min:0'
        ]);

        $producto = Producto::create($datos);
        return response()->json($producto, 201);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        if (!$producto) return response()->json(['mensaje' => 'No encontrado'], 404);

        $datos = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'precio' => 'sometimes|required|numeric|min:0',
            'categoria' => 'nullable|string',
            'stock' => 'integer|min:0'
        ]);

        $producto->update($datos);
        return response()->json($producto, 200);
    }

    
    public function show($id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['mensaje' => 'No encontrado'], 404);
        }
        return response()->json($producto, 200);
    }


    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['mensaje' => 'No encontrado'], 404);
        }
        
        $producto->update($request->all());
        
        return response()->json($producto, 200);
    }

    
    public function destroy($id)
    {
        $producto = Producto::find($id);
        
        if ($producto) {
            $producto->delete();
        }
        
        return response()->json(null, 204);
    }
}