<?php

namespace App\Http\Controllers;

use App\Models\PhoneBooks;
use Illuminate\Http\Request;

class PhoneBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return json_decode(PhoneBooks::orderBy('Created_at', 'desc')->get());  //returns values in ascending order
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('phone_books\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [ // the new values should not be null
            'firstName' => 'required',
            'lastName' => 'required',
            'type' => 'required',
            'number' => 'required',
        ]);
       
        
        $phone_book = new PhoneBooks;
        $phone_book->name = $request->firstName ." ". $request->lastName ; //user name = firstname + lastname
        $phone_book->type = $request->type; // phone number type
        $phone_book->number = $request->number; // phone number input
        $phone_book->save(); //storing values as an object
        return json_decode($phone_book);
 

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        return json_encode( PhoneBooks::findorFail($id)); //searches for the object in the database using its id and returns it.

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhoneBooks  $phoneBooks
     * @return \Illuminate\Http\Response
     */
    public function edit(PhoneBooks $phoneBooks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
       
        
            $this->validate($request, [ // the new values should not be null
                'firstName' => 'required',
                'lastName' => 'required',
                'type' => 'required',
                'number' => 'required',
            ]);
            $phone_book = PhoneBooks::findorFail($id); // uses the id to search values that need to be updated.
            $phone_book->name =  $request->firstName ." ". $request->lastName ; // update name with user input
            $phone_book->type = $request->type; // update type with  user input
            $phone_book->number =  $request->number ; // update number with user input
    
            $phone_book->save();//saves the values in the database. The existing data is overwritten.
            return json_decode($phone_book); // retrieves the updated object from the database
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $phone_book = PhoneBooks::findorFail($id); //searching for object in database using ID
        if($phone_book->delete()){ //deletes the object
            return 'Deleted successfully'; //shows a message when the delete operation was successful.
        }
    }
    // get all data from database and orders them ASC 
    public function orderData(){
        $order = new PhoneBooks();
        $order = $order->orderedByFirstName();
        return json_decode($order) ;
    }
}
