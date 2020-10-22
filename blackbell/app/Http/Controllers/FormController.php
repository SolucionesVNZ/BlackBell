<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Form;

class FormController extends Controller
{

    public function guardar(Request $request)
    {
        $slug = substr($request->url, 1);
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required|email:rfc,dns',
            'membresia' => 'required',
            'disciplina' => 'required',
        ],[
            'name.required' => 'El nombre es requerido',
            'lastname.required' => 'El apellido es requerido',
            'phone.required' => 'El telefono es requerido ',
            //'phone.unique' => 'Ya te has registrado anteriormente con este numero de telefono',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'El correo electronico ingresado no es correcto',
            //'email.unique' => 'Ya te has registrado anteriormente con este correo',
            'membresia.required'  => 'Debe seleccionar una membresia',
            'disciplina.required'  => 'Debe seleccionar una disciplina',
        ]);
        try {
            $model = new Form;
            $model->nombre = $request->name;
            $model->apellido = $request->lastname;
            $model->telefono = $request->phone;
            $model->email = $request->email;
            $model->membresia = $request->membresia;
            $model->disciplina = $request->disciplina;
            $model->save();
            return redirect()->route($slug)->with('success','Se ha registrado satisfactoriamente, en las proximas 24 horas nos estaremos comunicando con usted.');
        }catch (QueryException $e) {
            return redirect()->route($slug);
        }
    }
}
