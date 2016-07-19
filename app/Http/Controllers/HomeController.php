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
    
    public function postLogin(Request $request)
    {
        dd($request);
    }
    
    public function testUpload()
    {
        return view('uploadfile');
    }
    
    public function doUpload(Request $request)
    {
        //dd($request);
        $request->file('photo')->move('storage/app/public/', $request->file('photo')->getClientOriginalName());
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
        $forexData=$forex->where('currency',$param)->get();
        $returnData['currency']=$forexData[0]['currency'];
        $returnData['currencyrate']=$forexData[0]['currencyrate'];
        return json_encode($returnData);
    }
    
    public function angularTest()
    {
        $data['title']='Angular Test';
        return view('angulartest',$data);                
    }
    
    public function angularSearch(Request $request)
    {
        $data = file_get_contents("php://input");
        //$data=$request->get('data');

        $objData = json_decode($data);

// perform query or whatever you wish, sample:

        /*
          $query = 'SELECT * FROM
          tbl_content
          WHERE
          title="'. $objData->data .'"';
         */

// Static array for this demo
        $values = array('php', 'web', 'angularjs', 'js');

// Check if the keywords are in our array
        if (in_array($objData->data, $values)) {
            echo 'I have found what you\'re looking for!';
        } else {
            echo 'Sorry, no match!';
        }
    }
}
