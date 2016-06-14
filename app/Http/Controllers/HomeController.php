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
        $forexData['title']='List';
        $forexData['response']=$forex->all(array('currency','currencyrate'));
        return view('forex',$forexData);
    }
    
    public function Login()
    {
        $data['title']='Login';
        return view('login',$data);
    }
    
    public function ajaxCheck()
    {
        $data['title']='AJAX Check';
        return view('ajaxcheck',$data);        
    }
    
    public function ajaxReturn(Request $request)
    {
        $param=$request->get('forexid');
        $forex=new Forex;
        $returnData=$forex->where('currency',$param)->get();
        //return "Test of Ajax " . $returnData->currencyrate;
        //return "Test of Ajax " . json_encode($returnData);
        //return "USD 1 = " . $returnData[0]['currency'] . " " . $returnData[0]['currencyrate'];
        return json_encode($returnData);
    }
}
