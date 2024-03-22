<?php

namespace App\Http\Controllers;

use App\Models\Maladies;
use Illuminate\Http\Request;

class MaladiesController extends Controller
{
    //

    public function index(Request $request)
    {
        $maladies = Maladies::where(function ($query) use ($request) {
            if ($request->has('nom')) {
                $query->where('nom', 'like', '%' . $request->nom . '%');
            }
            if ($request->has('categorie')) {
                $query->where('categorie', 'like', '%' . $request->categorie . '%');
            }
            if ($request->has('gravite')) {
                $query->where('gravite', 'like', '%' . $request->gravite . '%');
            }
            if ($request->has('autres')) {
                $query->where('autres', 'like', '%' . $request->autres . '%');
            }
        })->get();
        return response()->json($maladies);
    }

    public function show($id)
    {
        $maladie = Maladies::find($id);
        return response()->json($maladie);
    }

    public function store(Request $request)
    {
        $maladie = new Maladies();

        // Assign fields
        $fieldsToAssign = ['nom', 'categorie', 'gravite', 'autres'];

        foreach ($fieldsToAssign as $field) {
            if ($request->has($field)) {
                $maladie->$field = $request->$field;
            }
        }

        // Save the maladie
        $maladie->save();

        return response()->json($maladie);
    }

    public function update(Request $request, $id)
    {
        $maladie = Maladies::find($id);

        // Assign fields
        $fieldsToAssign = ['nom', 'categorie', 'gravite', 'autres'];

        foreach ($fieldsToAssign as $field) {
            if ($request->has($field)) {
                $maladie->$field = $request->$field;
            }
        }

        // Save the maladie
        $maladie->save();

        return response()->json($maladie);
    }

    public function destroy($id)
    {
        $maladie = Maladies::find($id);
        $maladie->delete();
        return response()->json(['message' => 'Maladie deleted']);
    }

}
