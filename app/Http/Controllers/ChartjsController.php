<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Chat;

class ChartjsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jan=Chat::whereMonth('created_at', '1')->get();
        $jancount=count($jan);
        $num1=(int)$jancount;
        $feb=Chat::whereMonth('created_at', '2')->get();
        $febcount=count($feb);
        $num2=(int)$febcount;
        $mar =Chat::whereMonth('created_at', '3')->get();
        $marcount=count($mar);
        $num3=(int)$marcount;
        $apl =Chat::whereMonth('created_at', '4')->get();
        $aplcount=count($apl);
        $num4=(int)$aplcount;
        $may =Chat::whereMonth('created_at', '5')->get();
        $maycount=count($may);
        $num5=(int)$maycount;
        $jun =Chat::whereMonth('created_at', '6')->get();
        $juncount=count($jun);
        $num6=(int)$juncount;
        $july =Chat::whereMonth('created_at', '7')->get();
        $julycount=count($july);
        $num7=(int)$julycount;
        $aug =Chat::whereMonth('created_at', '8')->get();
        $augcount=count($aug);
        $num8=(int)$augcount;
        $sep =Chat::whereMonth('created_at', '9')->get();
        $sepcount=count($sep);
        $num9=(int)$sepcount;
        $oct =Chat::whereMonth('created_at', '10')->get();
        $octcount=count($oct);
        $num10=(int)$octcount;
        $nov =Chat::whereMonth('created_at', '11')->get();
        $novcount=count($nov);
        $num11=(int)$novcount;
        $dec =Chat::whereMonth('created_at', '12')->get();
        $deccount=count($dec);
        $num12=(int)$deccount;
        
        return view('chartjs/chartjs',compact('num1','num2','num3','num4','num5','num6','num7','num8','num9','num10','num11','num12'));
        
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
        //
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
        //
    }
}
