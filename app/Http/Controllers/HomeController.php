<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FacturaModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datos = DB::select(" select * from facturas");
        return view('plantilla', compact('datos'));
    }
    public function create(Request $request)
    {
        $sql = DB::insert(" insert into facturas(nombre, nit, descripcion, precio, cantidad, total)values(?,?,?,?,?,?)", [
            $request->nombre,
            $request->nit,
            $request->descripcion,
            $request->precio,
            $request->cantidad,
            $total = ($request->precio * $request->cantidad),
        ]);
        return redirect()->route('facturas.index');
    }
    public function edit(FacturaModel $datos)
    {
        return view('facturas.update', compact('datos'));
    }

    public function update(Request $request)
    {
        $sql = DB::update(" update facturas set nombre=?, nit=?, descripcion=?, precio=?, cantidad=?, total=? where id=? ", [
            $request->nombre,
            $request->nit,
            $request->descripcion,
            $request->precio,
            $request->cantidad,
            $total = ($request->precio * $request->cantidad),
            $request->id,

        ]);
        return redirect()->route('facturas.index');
    }
    public function delete($id)
    {
        $sql = DB::delete(" delete from facturas where id=$id");
        return redirect()->route('facturas.index');
    }
}
