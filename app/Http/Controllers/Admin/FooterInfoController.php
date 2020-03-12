<?php

namespace App\Http\Controllers\Admin;
use App\Models\FooterInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;

class FooterInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FooterInfo::get();
        return  view('admin.footer-info.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = FooterInfo::first();
        return  view('admin.footer-info.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            
            'shipping_text' => 'required|max:455',
            'payments_text' => 'required|max:455',
            'returns_text' => 'required|max:455',
            'contacts_text' => 'required|max:455',
            'resi_text' => 'required|max:455',
            'company_text' => 'required|max:455',
            
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        FooterInfo::updateOrCreate(
            ['type' => '1'],
            [
                'shipping_text' => isset($data['shipping_text']) ? $data['shipping_text'] : '',
                'payments_text' => isset($data['payments_text']) ? $data['payments_text'] : '',
                'returns_text'  => isset($data['returns_text']) ? $data['returns_text'] : '',
                'contacts_text' => isset($data['contacts_text']) ? $data['contacts_text'] : '',
                'resi_text'     => isset($data['resi_text']) ? $data['resi_text'] : '',
                'company_text'  => isset($data['company_text']) ? $data['company_text'] : '',
            ]
        );
        return  redirect()->back()->with('success', 'Footer Info save successfully!');
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
