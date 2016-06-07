<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Forex;

class HomeController extends Controller
{
    public function Index()
    {
        $forex = new Forex;
        $forexData['response']=$forex->all(array('currency','currencyrate'));
        return view('forex',$forexData);
    }
}
