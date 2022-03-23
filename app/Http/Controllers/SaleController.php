<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelMarket;
use App\Models\User;
use App\Models\ModelSale;
use App\Http\Middleware;

class SaleController extends Controller
{
    private $objMarket;
    private $objSale;
    public function __construct(){
        $this->middleware('auth');
        $this->objMarket =new ModelMarket();
        $this->objSale =new ModelSale();
        $this->objUser =new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale=$this->objSale->paginate(8);
        return view('dashboard-sale', compact('sale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $markets=$this->objMarket->all();
        return view('create-sale', compact('markets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objSale->create([
            'id_user'=>$request->id_user,
            'id_market'=>$request->id_market,
            'quant'=>$request->quant,
            'price'=>$request->quant * ModelMarket::find($request->get('id_market'))->total,
        ]);
        if($cad){
            return redirect('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale=$this->objSale->find($id);
        return view('show-sale', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale=$this->objSale->find($id);
        $markets=$this->objMarket->all();
        return view('create-sale', compact('sale', 'markets'));
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
        $this->objSale->where(['id'=>$id])->update([
            'id_user'=>$request->id_user,
            'id_market'=>$request->id_market,
            'quant'=>$request->quant,
            'price'=>$request->quant * ModelMarket::find($request->get('id_market'))->total,
        ]);
        return redirect('home');
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
