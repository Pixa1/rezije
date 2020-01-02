<?php

namespace App\Http\Controllers;

use App\Record;
use App\Total;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function graphData()
    {
        $year = Carbon::now()->year;
        $records = Total::whereYear('date',$year)->get();
        
        foreach ($records as $rec) {
            # code...
            $label[]=ucfirst($rec->date->monthName);
            $counts[]=$rec->Struja;
            $countv[]=$rec->Voda;
            $countk[]=$rec->Komunal;
            $countj[]=$rec->Jura;
            $countb[]=$rec->Bero;
            $countp[]=$rec->Pixa;
        }
        $this->graphdata=[
            'labels'=>$label,
            'datasets' => [
                [
                    'label' => 'Struja',
                    'data' => $counts,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)'
                ],
                [
                    'label' => 'Voda',
                    'data' => $countv,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                ],
                [
                    'label' => 'Komunalije',
                    'data' => $countk,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                ]
            ]

        ];
        $graphdata2=[
            'labels'=>$label,
            'datasets' => [
                [
                    'label' => 'Jura',
                    'data' => $countj,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)'
                ],
                [
                    'label' => 'Bero',
                    'data' => $countb,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                ],
                [
                    'label' => 'Pixa',
                    'data' => $countp,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                ]
            ]

        ];

        return $this->graphData;
    }
    public function index()
    {
        //
        $result = Record::select(DB::raw('YEAR(Date) as year'))->distinct()->orderBy('year','desc')->get();
        $years = $result->pluck('year');
        $year = Carbon::now()->year;
        #$records = Record::whereYear('date',Carbon::now()->year)->get();
        $records = Total::whereYear('date',$year)->orderBy('date','asc')->get();
        if(count($records) == 0){
            $year = (Carbon::now()->year)-1;
            $records = Total::whereYear('date',$year)->orderBy('date','asc')->get();
        }
            
        
        
        
        foreach ($records as $rec) {
            # code...
            $label[]=ucfirst($rec->date->monthName);
            $counts[]=$rec->Struja;
            $countv[]=$rec->Voda;
            $countk[]=$rec->Komunal;
            $countj[]=$rec->Jura;
            $countb[]=$rec->Bero;
            $countp[]=$rec->Pixa;
        }
        $graphdata=[
            'labels'=>$label,
            'datasets' => [
                [
                    'label' => 'Struja',
                    'data' => $counts,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)'
                ],
                [
                    'label' => 'Voda',
                    'data' => $countv,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                ],
                [
                    'label' => 'Komunalije',
                    'data' => $countk,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                ]
            ]

        ];
        $graphdata2=[
            'labels'=>$label,
            'datasets' => [
                [
                    'label' => 'Jura',
                    'data' => $countj,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)'
                ],
                [
                    'label' => 'Bero',
                    'data' => $countb,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                ],
                [
                    'label' => 'Pixa',
                    'data' => $countp,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                ]
            ]

        ];
        //dd($graphdata);
        /*

*/

        

        return view('home',compact('records','years','year','graphdata','graphdata2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $year = Carbon::now()->year;
        $records = Record::whereYear('date',$year)->get();


        return view('create',compact('records'));
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

        /*
        $userId = $request->user_id;
        $user   =   User::updateOrCreate(['id' => $userId],
                    ['name' => $request->name, 'email' => $request->email]);
    
        return Response::json($user);
        */
        //dd($request);
        
        /*
        $record = new Record;
        $record->Date = $request->Date;
        $record->SK = $request->SK;
        $record->SP = $request->SP;
        $record->ST = $request->ST;
        $record->SJ = $request->SJ;

        $record->save();
        */

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
        $records = Total::whereYear('Date',$id)->orderBy('Date','asc')->get();
        $year = $id;

        if (count($records) != 0){

        foreach ($records as $rec) {
            # code...
            $label[]=ucfirst($rec->date->monthName);
            $counts[]=$rec->Struja;
            $countv[]=$rec->Voda;
            $countk[]=$rec->Komunal;
            $countj[]=$rec->Jura;
            $countb[]=$rec->Bero;
            $countp[]=$rec->Pixa;
        }
        $graphdata=[
            'labels'=>$label,
            'datasets' => [
                [
                    'label' => 'Struja',
                    'data' => $counts,
                    'backgroundColor'=> "rgba(255,99,132,0.2)",
                    'borderColor'=> "rgba(255,99,132,1)",
                ],
                [
                    'label' => 'Voda',
                    'data' => $countv,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)'
                ],
                [
                    'label' => 'Komunalije',
                    'data' => $countk,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)'
                ]
            ]

        ];
        $graphdata2=[
            'labels'=>$label,
            'datasets' => [
                [
                    'label' => 'Jura',
                    'data' => $countj,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor'=> "rgba(255,99,132,1)",
                ],
                [
                    'label' => 'Bero',
                    'data' => $countb,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)'
                ],
                [
                    'label' => 'Pixa',
                    'data' => $countp,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)'
                ]
            ]

        ];
    
        return view('home')->with(compact('records','id','year','graphdata','graphdata2'));
    }
    return view('empty')->with(compact('year'));
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
