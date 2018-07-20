<?php

namespace App\Http\Controllers;

use App\ContractType;
use Illuminate\Http\Request;
use Session;

class ContractTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');

    }


    public function index()
    {
        $contractType = ContractType::all();
        return view('admin.contract_type.index')->with('contractType', $contractType);
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
        $this->validate($request, [
           'name'=>'required'
        ]);
        $contractType = new ContractType();
        $contractType->name = $request->name;
        $contractType->admin_id = auth()->user()->id;
        $contractType->save();

        Session::flash('success', 'You have successfully added a new Contract Type!');
        return redirect()->back();
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
        $contractType = ContractType::find($id);
        return view('admin.contract_type.editContractType')
            ->with('contractType', $contractType);
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
        $this->validate($request, [
            'name'=>'required'
        ]);
        $contractType = ContractType::find($id);
        $contractType->name = $request->name;
        $contractType->admin_id = auth()->user()->id;
        $contractType->save();

        Session::flash('success', 'You have successfully update a contract type');
        return redirect('admin/contractType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contractType = ContractType::find($id);
        $contractType->delete();
        Session::flash('success', 'You have successfully deleted a Contract Type!');
        return redirect('admin/contractType');
    }
}
