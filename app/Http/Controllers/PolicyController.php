<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PolicyRequest;
use App\Policy;
use Response;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('policies.index', [
          'policies' => Policy::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('policies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PolicyRequest $request)
    {
        Policy::create($request->all());
        return redirect('policies');
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
        return view('policies.edit', [
          'policy' => Policy::findorfail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PolicyRequest $request, $id)
    {
        Policy::findorfail($id)->update($request->all());
        return redirect('policies');
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

    public function fetchPolicy(Request $request)
    {

      if(isset($request->policy_id)){

        Policy::findorfail($request->policy_id)->update($request->all());

      }elseif(isset($request->amount)){

        Policy::create($request->all());
      }

      return Response::json([
        'policies' => Policy::all(),
      ]);
    }
}
