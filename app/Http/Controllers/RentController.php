<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function rentedbooks()
    {
        $rented = Rent::with('subscriber')->with('book.genre')->where('return_date', '=', NULL)->orderBy('id', 'DESC')->get();
        return response()->json($rented, 200);
    }

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
        $validateData = $request->validate([
            'book_id' => 'required',
            'subscriber_id' => 'required',
            'get_date' => 'required',
           ]);

        $rent = new Rent();
        $rent->book_id = $request->book_id;
        $rent->subscriber_id = $request->subscriber_id;
        $rent->get_date = $request->get_date;
        $rent->return_date = null;
        $rent->save();

        return response()->json($rent, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rent = Rent::with('book')->with('subscriber')->findOrFail($id);
        return response()->json($rent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit(rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'book_id' => 'required',
            'subscriber_id' => 'required',
            'get_date' => 'required',
           ]);

        $data = array();
        $data['book_id'] =  $request->book_id;
        $data['subscriber_id'] =  $request->subscriber_id;
        $data['get_date'] =  $request->get_date;
        $data['return_date'] =  $request->return_date;
        $rent = Rent::where('id',$id)->update($data);

        return response()->json($rent, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rent::destroy($id);
        return response()->json(null, 200);
    }
}
