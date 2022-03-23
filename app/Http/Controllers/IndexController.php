<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelMarket;
use App\Models\ModelSale;
use App\Http\Middleware;

class IndexController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index');
        $this->objMarket =new ModelMarket();
        $this->objSale =new ModelSale();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $market=$this->objMarket->paginate(12);
        return view('dashboard', compact('market')); 
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
    public function show($id_user)
    {
        $sale=$this->objSale->where('id_user', $id_user)->get();
        return view('show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $market=$this->objMarket->find($id);
        $markets=$this->objMarket->all();
        return view('create-sale', compact('markets','market'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objSale->destroy($id);
        return($del)?"sim":"não";
    }
}
