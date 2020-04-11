<?php

namespace App\Http\ViewComposers;

use App\Record;
use Illuminate\View\View;
use DB;

class NavigationViewComposer
{
    #public $years = ['1','2'];

    //$result = Record::select(DB::raw('YEAR(Date) as year'))->distinct()->orderBy('year','desc')->get();
    /**
     * Create a movie composer.
     *
     * @return void
     */
/*     public function __construct(Record $years)
    {
        $result = Record::select(DB::raw('YEAR(Date) as year'))->distinct()->orderBy('year','desc')->get();
        $this->years = $result->pluck('year');
        

    } */

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose($view)
    {

        $view->with('years', Record::select(DB::raw('YEAR(Date) as year'))->distinct()->orderBy('year','desc')->get()->pluck('year'));
    }


}