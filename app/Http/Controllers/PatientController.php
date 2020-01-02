<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = User::patients()->paginate(5);
        return view('patients.index', compact ('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'identificacion' => 'digits:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6'
        ];

        $this->validate($request, $rules);

        User::create(
            $request->only('name', 'email', 'identificacion', 'address', 'phone') + [
                'role' => 'patient',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification = 'El paciente se ha registrado correctamente';
        return redirect('/patients')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'identificacion' => 'digits:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6'
        ];

        $this->validate($request, $rules);

        $user = User::patients()->findOrfail($id);
        $data =  $request->only('name', 'email', 'identificacion', 'address', 'phone');
        $password = $request->input('password');

        if($password)
            $data['password'] = bcrypt($password);          
                
        $user->fill($data);
        $user->save();
        
        $notification = 'La información del paciente se ha registrado correctamente';
        return redirect('/patients?page='.$request->input('page'))->with(compact('notification'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $patient, Request $request)
    {
        $patientName = $patient->name;
        $patient->delete();

        $notification = "El paciente $patientName se ha eliminado correctamente";
        return redirect('/patients?page='.$request->input('page'))->with(compact('notification'));
    }
}
