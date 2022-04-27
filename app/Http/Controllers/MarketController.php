<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketRequest;
use App\Models\ModelMarket;
use App\Models\ModelType;
use App\Http\Middleware;

class MarketController extends Controller
{
    
    private $objType;
    private $objMarket;
    public function __construct(){
        $this->middleware('admin');
        $this->objType =new ModelType();
        $this->objMarket =new ModelMarket();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $market=$this->objMarket->paginate(8);
        return view('dashboard-market', compact('market'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=$this->objType->all();
        return view('create-market', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarketRequest $request)
    {   
        if($request->hasFile('image')){
            $destination_path = 'public/img/market/';
            $image = $request->file('image');
            $image_name = $image->GetClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);
            $this->objMarket->create([
                'name'=>$request->name,
                'quant'=>$request->quant,
                'price'=>$request->price,
                'percentage'=>$request->percentage,
                'total'=>$request->price + ($request->price * ($request->percentage/100)),
                'id_type'=>$request->id_type,
                'image'=>$image_name,
            ]);
        }else{
            $this->objMarket->create([
                'name'=>$request->name,
                'quant'=>$request->quant,
                'price'=>$request->price,
                'percentage'=>$request->percentage,
                'total'=>$request->price + ($request->price * ($request->percentage/100)),
                'id_type'=>$request->id_type,
            ]);
        }
         
        return redirect('markets');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $market=$this->objMarket->find($id);
        return view('show-market', compact('market'));
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
        $types=$this->objType->all();
        return view('create-market', compact('market', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarketRequest $request, $id)
    {
        if($request->hasFile('image')){
            $destination_path = 'public/img/market/';
            $image = $request->file('image');
            $image_name = $image->GetClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);
            $this->objMarket->where(['id'=>$id])->update([
                'name'=>$request->name,
                'quant'=>$request->quant,
                'price'=>$request->price,
                'percentage'=>$request->percentage,
                'total'=>$request->price + ($request->price * ($request->percentage/100)),
                'id_type'=>$request->id_type,
                'image'=>$image_name,
            ]);
        }else{
            $this->objMarket->where(['id'=>$id])->update([
                'name'=>$request->name,
                'quant'=>$request->quant,
                'price'=>$request->price,
                'percentage'=>$request->percentage,
                'total'=>$request->price + ($request->price * ($request->percentage/100)),
                'id_type'=>$request->id_type,
            ]);
        }
        
        return redirect('markets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objMarket->destroy($id);
        return($del)?"Yes":"No";
    }
}
