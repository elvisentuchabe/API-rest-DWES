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
        $producto = Producto::create($request->all());
        return response()->json($producto, 201);
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