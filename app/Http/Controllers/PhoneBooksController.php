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
        $fileJson = file_get_contents('C:\Users\User\Projects\CodingTest\public\json\phone-book.json');
        $tempArray = json_decode($fileJson, true);
        if(isset($tempArray)){
            return $tempArray;  //returns values

        }else
        return "No records";
        
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

        // $this->validate($request, [ // the new values should not be null
        //     'firstName' => 'required',
        //     'lastName' => 'required',
        //     'type' => 'required',
        //     'number' => 'required',
        // ]);
       
        // using db mysql*
        // $phone_book = new PhoneBooks;
        // $phone_book->name = $request->firstName ." ". $request->lastName ; //user name = firstname + lastname
        // $phone_book->type = $request->type; // phone number type
        // $phone_book->number = $request->number; // phone number input
        // $phone_book->save(); //storing values as an object

        // using jsom file 
        $data = json_encode( $request->query());
        $fileJson = file_get_contents('C:\Users\User\Projects\CodingTest\public\json\phone-book.json');
        $tempArray = json_decode($fileJson, true);
        array_push($tempArray, $data);
        $jsonData = json_encode($tempArray);
        file_put_contents('C:\Users\User\Projects\CodingTest\public\json\phone-book.json', $jsonData);

        
        return json_decode($data);
 

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        $file = file_get_contents('C:\Users\User\Projects\CodingTest\public\json\phone-book.json');
        $tempArray = json_decode($file, true);
        if(isset($tempArray[$id])){
            return json_decode($tempArray[$id]); //searches for the object in the file using its index and returns it.

        }
        return "not found check index /already deleted";


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
       
        
          
            // $phone_book = PhoneBooks::findorFail($id); // uses the id to search values that need to be updated.
            // $phone_book->name =  $request->firstName ." ". $request->lastName ; // update name with user input
            // $phone_book->type = $request->type; // update type with  user input
            // $phone_book->number =  $request->number ; // update number with user input
    
            // $phone_book->save();//saves the values in the database. The existing data is overwritten.
            $data = json_encode( $request->query());
            $file = file_get_contents('C:\Users\User\Projects\CodingTest\public\json\phone-book.json');
            
            $fileContent = json_decode($file, true);

            if(isset($fileContent[$id])){
                $fileContent[$id] = $data;
                $newJsonString = json_encode($fileContent);
                file_put_contents('C:\Users\User\Projects\CodingTest\public\json\phone-book.json', $newJsonString);

                return json_decode($fileContent[$id]); // retrieves the updated object from the file
            }else
            return "Records not found to update check index or already deleted";
            
            
            
            

           
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $phone_book = PhoneBooks::findorFail($id); //searching for object in database using ID
        // if($phone_book->delete()){ //deletes the object
        //     return 'Deleted successfully'; //shows a message when the delete operation was successful.
        // }

        $file = file_get_contents('C:\Users\User\Projects\CodingTest\public\json\phone-book.json');
            
            $fileContent = json_decode($file, true);
            if(isset($fileContent[$id])){
                unset($fileContent[$id]);
                file_put_contents('C:\Users\User\Projects\CodingTest\public\json\phone-book.json', json_encode($fileContent));
            
                return 'Deleted successfully'; 
            }else{
                return 'Already Deleted';
            }

        
    }
    // get all data from database and orders them ASC 
    // public function orderData(){
    //     $order = new PhoneBooks();
    //     $order = $order->orderedByFirstName();
    //     return json_decode($order) ;
    // }
}
