<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\BillingAddress;
use Illuminate\Http\Request;
use Validator;


class BillingController extends Controller
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
    //     return $request;
    //    //dd($request);
    //    exit;
        $data = $request->all();
        $userId = Auth::user()->id;
        // $validator = Validator::make($data, [
           
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'country_id' => 'required',
        //     'street_address' => 'required',
        //     'town' => 'required',
        //     'district' => 'required',
        //     'post_code' => 'required',
        //     'phone' => 'required',
        //     'email' => 'required',


        // ]);
        
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        BillingAddress::updateOrCreate(
            ['user_id' => $userId],
            [
                'first_name'       => isset($data['first_name']) ? $data['first_name'] : '',
                'last_name'        => isset($data['last_name']) ? $data['last_name'] : '',
                'country_id'       => isset($data['country_id']) ? $data['country_id'] : '',
                'street_address'   => isset($data['street_address']) ? $data['street_address'] : '',
                'town'             => isset($data['town']) ? $data['town'] : '',
                'district'         => isset($data['district']) ? $data['district'] : '',
                'post_code'        => isset($data['post_code']) ? $data['post_code'] : '',
                'phone'            => isset($data['phone']) ? $data['phone'] : '',
                'email'            => isset($data['email']) ? $data['email'] : '',
            ]
        );

        return  redirect()->back()->with('success', 'Billing address save successfully!');
    
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
