<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use HTML,Form,Validator,Mail,Response,Session,Auth,DB,Redirect,Image,Password,Cookie,File,View,Hash,JsValidator,Input,Storage,URL;;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function charge(Request $request)
    {
        dd($request->all());
    }


    //for save category into session
    public function saveCategory(Request $request)
    {
        $SessionData =Session::get('TicketData');
        
        //fro chk Session have vale or not
        $data = collect([
                 "SubId"            => $request->SubId,
                 "SubCategory"      => $request->SubCategory,   
                 "SubDescription"   => $request->SubDescription             
            ]);

        if ($request->session()->exists('TicketData')) {
                $SessionData =Session::get('TicketData');
                
                $merged = $SessionData->merge($data); // Contains foo and bar.

                session()->put('TicketData', $merged);
                return "done";
                

        }else{
            session()->put('TicketData', $data);
        }
        
        $viewPage = View::make('category.view_category', $data)->render();   
        return Response::json(['html' => $viewPage,'success' => 'session succesfull add.','error'=>'0']);

        // Session::get('variableName');
        // Session::set('variableName', $value);

    
    }

    public function session(Request $request)
    {

        //session()->put('TicketData', '1233');
        session()->forget('TicketData');
        // return "done";

    }

    public function session2(Request $request)
    {
         if ($request->session()->exists('TicketData')) {
        //    return Session::get('TicketData');
            $collection = collect([1, 2, 3]);

           echo gettype($collection);


            //    $SessionData =Session::get('TicketData');
            //   $data=[];
            //   $data2=[];  
            //  $data['data'] = [
            //      "SubId"            =>"100",
            //      "SubCategory"      => "100",   
            //      "SubDescription"   => "100"             
            // ];

            //   $data2['data2'] = [
            //      "SubId"            =>"1001",
            //      "SubCategory"      => "1001",   
            //      "SubDescription"   => "1001"             
            // ];


            // $result = array_merge($data, $data2);
            // print_r($result);


                
                
        //    return $SessionData =Session::get('TicketData');

        }else{
            return "no session value";
        }
    }    

}
