<?php

namespace App\Http\Controllers;

use App\Models\Medecins;
use Illuminate\Http\Request;

class MedecinsController extends Controller
{

    // get medecin with filter like  'nom',
    // 'prenom',
    // 'specialite',
    // 'adresse',
    // 'tel',
    // 'email',
    public function index(Request $request)
    {
        $medecins = Medecins::where(function ($query) use ($request) {
            if ($request->has('nom')) {
                $query->where('nom', 'like', '%' . $request->nom . '%');
            }
            if ($request->has('prenom')) {
                $query->where('prenom', 'like', '%' . $request->prenom . '%');
            }
            if ($request->has('specialite')) {
                $query->where('specialite', 'like', '%' . $request->specialite . '%');
            }
            if ($request->has('adresse')) {
                $query->where('adresse', 'like', '%' . $request->adresse . '%');
            }
            if ($request->has('tel')) {
                $query->where('tel', 'like', '%' . $request->tel . '%');
            }
            if ($request->has('email')) {
                $query->where('email', 'like', '%' . $request->email . '%');
            }
        })->get();
        return response()->json($medecins);
    }

    // get medecin by id
    public function show($id)
    {
        $medecin = Medecins::find($id);
        return response()->json($medecin);
    }

    // add new medecin
    public function store(Request $request)
    {
        $medecin = new Medecins();

        // Assign fields
        $fieldsToAssign = ['nom', 'prenom', 'specialite', 'adresse', 'tel', 'email'];

        foreach ($fieldsToAssign as $field) {
            if ($request->has($field)) {
                $medecin->$field = $request->$field;
            }
        }

        // Save the medecin
        $medecin->save();

        return response()->json($medecin);
    }

    // update medecin by id
    public function update(Request $request, $id)
    {
        $medecin = Medecins::find($id);

        // Vérifier et mettre à jour les champs modifiables
        $fieldsToUpdate = ['nom', 'prenom', 'specialite', 'adresse', 'tel', 'email'];

        foreach ($fieldsToUpdate as $field) {
            if ($request->has($field)) {
                $medecin->$field = $request->$field;
            }
        }

        // Enregistrer les modifications
        $medecin->save();

        return response()->json($medecin);
    }
    // delete medecin by id
    public function destroy($id)
    {
        $medecin = Medecins::find($id);
        $medecin->delete();
        return response()->json($medecin);
    }

}
