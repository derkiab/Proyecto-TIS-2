<?php

namespace App\Http\Controllers;

use App\Mail\ProofPayment;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('users.index', compact('users','roles'));
    }
    public function generate_pdf(){
        $users = User::all();
        $fecha_actual = Carbon::now();
        Mail::to('fparedesp@ing.ucsc.cl')->send(new ProofPayment($users,$fecha_actual));
        $pdf = PDF::loadView('receipt.ticket',['users' => $users,'fecha_actual' => $fecha_actual]);
        return $pdf->stream('ticket.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $users = User::find($id);




        return response(view('users.edit', compact('users')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $user = User::find($id);
        $roles = $user->getRoleNames();
        error_log($roles);

        $user->syncRoles($request->get('role'));
        error_log($roles);
        $user->save();

        return redirect('admin/users')->with('success', 'Tipo de envío actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

       // dejar para futuro sweetalert return response()->json(['success' => true]);

       return redirect('admin/users')->with('success', 'Usuario eliminado exitosamente!');

    }
}
