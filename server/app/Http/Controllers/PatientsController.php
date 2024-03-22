<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index(Request $request)
    {
        $patients = Patient::where(function ($query) use ($request) {
            if ($request->has('nom')) {
                $query->where('nom', 'like', '%' . $request->nom . '%');
            }
            if ($request->has('prenom')) {
                $query->where('prenom', 'like', '%' . $request->prenom . '%');
            }
            if ($request->has('age')) {
                $query->where('age', 'like', '%' . $request->age . '%');
            }
            if ($request->has('adresse')) {
                $query->where('adresse', 'like', '%' . $request->adresse . '%');
            }
            if ($request->has('tel')) {
                $query->where('tel', 'like', '%' . $request->tel . '%');
            }
            if ($request->has('diagnostic')) {
                $query->where('diagnostic', 'like', '%' . $request->diagnostic . '%');
            }
            if ($request->has('uuid')) {
                $query->where('uuid', 'like', '%' . $request->uuid . '%');
            }
        })->with(['maladie', 'chambre'])->get();
        return response()->json($patients);
    }

    public function show($id)
    {
        $patient = Patient::with(['maladie', 'chambre'])->find($id);
        return response()->json($patient);
    }

    public function store(Request $request)
    {
        $patient = new Patient();

        // Assign fields
        $fieldsToAssign = ['diagnostic'];

        foreach ($fieldsToAssign as $field) {
            if ($request->has($field)) {
                $patient->$field = $request->$field;
            }
        }

        // Save the patient
        $patient->save();

        return response()->json($patient);
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);

        // Update fields
        $fieldsToUpdate = ['nom', 'prenom', 'age', 'adresse', 'tel', 'diagnostic', 'uuid'];

        foreach ($fieldsToUpdate as $field) {
            if ($request->has($field)) {
                $patient->$field = $request->$field;
            }
        }

        // Save changes
        $patient->save();

        return response()->json($patient);
    }
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return response()->json($patient);
    }

    public function assignMaladie(Request $request, $id)
    {
        $patient = Patient::find($id);
        $patient->maladie_id = $request->maladie_id;
        $patient->save();
        return response()->json($patient);
    }

    public function assignChambre(Request $request, $id)
    {

        // if patient is already assigned to a chambre, decrement nb_lits_occupes

        if(Patient::find($id)->chambre_id != null){
            $chambre = Patient::find($id)->chambre;
            $chambre->nb_lits_occupes--;
            $chambre->save();
        }

        $patient = Patient::find($id);
        $patient->chambre_id = $request->chambre_id;
        $patient->save();

        $chambre = $patient->chambre;
        $chambre->nb_lits_occupes++;
        $chambre->save();

        return response()->json($patient);
    }

}
