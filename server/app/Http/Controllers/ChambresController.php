<?php

namespace App\Http\Controllers;

use App\Models\Chambres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChambresController extends Controller
{
    //

    public function index(Request $request)
    {
        Log::info("Hello");

        $chambres = Chambres::where(function ($query) use ($request) {
            if ($request->has('numero')) {
                $query->where('numero', 'like', '%' . $request->numero . '%');
            }
            if ($request->has('etage')) {
                $query->where('etage', 'like', '%' . $request->etage . '%');
            }
            if ($request->has('nb_lits')) {
                $query->where('nb_lits', 'like', '%' . $request->nb_lits . '%');
            }
            if ($request->has('nb_lits_occupes')) {
                $query->where('nb_lits_occupes', 'like', '%' . $request->nb_lits_occupes . '%');
            }
        })->get();
        return response()->json($chambres);
    }

    public function show($id)
    {
        $chambre = Chambres::find($id);
        return response()->json($chambre);
    }

    public function store(Request $request)
    {
        $chambre = new Chambres();

        // Assign fields
        $fieldsToAssign = ['numero', 'etage', 'nb_lits', 'nb_lits_occupes'];

        foreach ($fieldsToAssign as $field) {
            if ($request->has($field)) {
                $chambre->$field = $request->$field;
            }
        }

        // Save the chambre
        $chambre->save();

        return response()->json($chambre);
    }

    public function update(Request $request, $id)
    {
        $chambre = Chambres::find($id);

        // Assign fields
        $fieldsToAssign = ['numero', 'etage', 'nb_lits', 'nb_lits_occupes'];

        foreach ($fieldsToAssign as $field) {
            if ($request->has($field)) {
                $chambre->$field = $request->$field;
            }
        }

        // Save the chambre
        $chambre->save();

        return response()->json($chambre);
    }

    public function destroy($id)
    {
        $chambre = Chambres::find($id);
        $chambre->delete();
        return response()->json(['message' => 'Chambre deleted']);
    }

    public function getAvailableChambres()
    {
        // Get all chambres only where nb_lits_occupes < nb_lits
        $chambres = Chambres::whereColumn('nb_lits', '>', 'nb_lits_occupes')->get();
            return response()->json($chambres);
    }

}
