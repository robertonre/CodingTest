@extends('layouts.layout')

@section('content')
    <div class="container" >
        
        <h1 style="text-align:center;margin:20px">Create New Phone Book</h1>

        
            <form action="/api/store-phone-book" method="POST" class="form-horizontal ">
                @csrf
                    <div class="row">

                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="firstName" >First Name
                                        <strong style="color:red">*</strong></label>
                                    <input type="text" id="firstName" required  name="firstName" class="form-control"
                                            value="{{ old('firstName') }}">
                                    
								</span>
                                    @if($errors->first('firstName'))
                                        <div class="alert-danger">{{$errors->first('firstName')}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="lastName" >Last Name
                                        <strong style="color:red">*</strong></label>
                                    <input type="text" required id="lastName" name="lastName" class="form-control"
                                            value="{{ old('lastName') }}">
                                  
								</span>
                                    @if($errors->first('lastName'))
                                        <div class="alert-danger">{{$errors->first('lastName')}}</div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="type" >Type
                                        <strong style="color:red">*</strong></label>

                                        <select name="type" id="type"
                                                class="form-control uppercase">Select Type
                                                <option value="Work">Work </option>
                                                <option value="CellPhone">CellPhone </option>
                                                <option value="Work">Home </option>
                                             
                                        </select>
                                
                                        @if($errors->first('type'))
                                            <div class="alert-danger">{{$errors->first('type')}}</div>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                        <label for="number" >Number
                                            <strong style="color:red">*</strong></label>
                                        <input type="text" required name="number" class="form-control uppercase"
                                                value="{{ old('number') }}">
                                        @if($errors->first('number'))
                                            <div class="alert-danger">{{$errors->first('number')}}</div>
                                        @endif
                                </div>
                            </div>

                            <div class="container" style="display:flex;justify-content: center;">
                            <button Type="submit" class="btn btn-primary" >Submit</button>
                            </div>
                </div>
               
            </form>
    </div>

@endsection
