<?php

namespace App\Http\Controllers;

use App\Models\Crm;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Requests\CrmRequest;

class CrmController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // return view('crms.index');
        $crms = Crm::all();
        return view('crms.index')->with(compact('crms'));
        // return view('crms.index', compact('crms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {

        return view('crms.search');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $method = 'GET';
        $zipcode  = $request->postcode;
        // $url = config('crms.url') . '/api/search?zipcode=/' . $zipcode;
        $url = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=' . $zipcode;
        $client = new Client();

        try {
            $response = $client->request($method, $url);
            $body = $response->getBody();
            $zip_cloud = json_decode($body, true);
            $result = $zip_cloud['results'][0];
            $address = $result['address1'] . $result['address2'] . $result['address3'];
            $post_code = $result['zipcode'];
        } catch (\Throwable $th) {
            $address = null;
            $postcode = null;
        }
        // dd($zipcode);
        return view('crms.create')->with(compact('address', 'zipcode'));
    }

    public function show(Crm $crm)
    {
        //
        return view('crms.show')->with(compact('crm'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrmRequest $request)
    {
        //
        $crm = new Crm();

        $crm->name = $request->name;
        $crm->email = $request->email;
        $crm->postcode = $request->postcode;
        $crm->address = $request->address;
        $crm->phone = $request->phone;
        $crm->save();

        return redirect('/crms');
        // return redirect()->route('crms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    // public function show(Crm $crm)
    // {
    //     return view('crms.show');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)

    //
    // return view('crms.edit');
    public function edit($id)
    {
        $crm = Crm::find($id);
        return view('crms.edit')->with(compact('crm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Crm $crm)
    public function update(CrmRequest $request, $id)
    // public function update(CrmRequest $request,Crm $crm)
    {
        //
        $crm = Crm::find($id);
        $crm->name = $request->name;
        $crm->email = $request->email;
        $crm->postcode = $request->postcode;
        $crm->address = $request->address;
        $crm->phone = $request->phone;
        $crm->save();
        return view('crms.show')->with(compact('crm'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crm $crm)
    {
        //
        $crm->delete();
        return redirect('/crms');
    }
}
