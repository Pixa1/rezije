<?php

namespace App\Http\Controllers;

use App\Configurable;
use App\Record;
use App\Total;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Redirect;

class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //dd($request);
        //Selection::whereId($id)->update($request->all());
        $configurable = Configurable::first();
        Record::whereId($request->id)->update($request->all());
        
        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        $array = $request->toArray();
        if (in_array(null, $array, true) || in_array('', $array, true)) {
            //print_r("There are null values");
        } else {


            $prevRecord = Record::orderBy('Date','desc')->skip(1)->take(1)->first();
            //Voda
            $vodaKm3 =  $request->VK - $prevRecord->VK;
            $vodaPm3 = $request->VP - $prevRecord->VP;
            $vodaOm3 = $vodaKm3 - $vodaPm3;
            $vodaBm3 = $vodaOm3/3/3;
            $vodaPtotm3 = $vodaBm3 + $vodaPm3;
            $vodaJTm3 = $vodaOm3/3 + $vodaBm3;
            $VK_KN = ($vodaKm3 * $configurable->voda_o2 + $configurable->voda)* (1+13/100)+($configurable->voda_o3 * $vodaKm3);
            $VP_KN = ($vodaPtotm3 * $configurable->voda_o2 + $configurable->voda/3)*(1+13/100)+($configurable->voda_o3 * $vodaPtotm3);
            $VJT_KN = ($vodaJTm3 * $configurable->voda_o2 + $configurable->voda/3)*(1+13/100)+($configurable->voda_o3 * $vodaJTm3);

            //Struja
            $SK_KW = $request->SK - $prevRecord->SK;
            $SP_KW = $request->SP - $prevRecord->SP;
            $SJ_KW = $request->SJ - $prevRecord->SJ;
            $ST_KW = $request->ST - $prevRecord->ST;
            $SB_KW = $SK_KW - $SP_KW - $SJ_KW - $ST_KW;

            $SK_KN = $SK_KW * $configurable->struja;
            $SP_KN = $SP_KW * $configurable->struja;
            $SJ_KN = $SJ_KW * $configurable->struja;
            $ST_KN = $ST_KW * $configurable->struja;
            $SB_KN = $SB_KW * $configurable->struja/3;

            $Pixa = $SB_KN + $SP_KN + $VP_KN + $configurable->komunal/3;
            $Jura = $SB_KN + $SJ_KN + $VJT_KN + $configurable->komunal/3;
            $Bero = $SB_KN + $ST_KN + $VJT_KN + $configurable->komunal/3;

            $total = Total::orderBy('date','desc')->first();

            $total->date = Carbon::now()->subMonth(1);
            $total->Pixa = $Pixa;
            $total->Jura = $Jura;
            $total->Bero = $Bero;
            $total->Struja = $SK_KN;
            $total->Voda = $VK_KN;
            $total->Komunal = $configurable->komunal;
    
            $total->save();
        }
                                     
        return Response::json($notification);


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
        $record  = Record::where('id',$id)->first();
        return $record;
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
