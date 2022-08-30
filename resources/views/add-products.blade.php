
@extends('layouts.app_new')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Products') }}</div>

                <div class="card-body">
                <div class="row justify-content-center">
        <div class="col-md-8">
                <form method="POST" action="save">
                        @csrf

                        <div class="row mb-3">
                            <label for="Name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name">
                                @error('name')
                                        <strong>{{ $message }}</strong>  
                                @enderror
                            </div>
                               
                        </div>
                        <div class="row mb-3">
                            <label for="Category" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" name="category" id="category" onchange="getSubCategory()">
 
                            <option value="">-- Select Category --</option>

                            @foreach($categories as $key=>$category)

                              <option value="{{ $key }}">{{ $category }}</option>

                            @endforeach

                            </select>
                                @error('category')
                                        <strong>{{ $message }}</strong>  
                                @enderror
                            </div>
                                
                        </div>
                        
                        <div class="row mb-3">
                            <label for="Sub-Category" class="col-md-4 col-form-label text-md-end">{{ __('Sub Category') }}</label>
                            <div class="col-md-6">
                            <select class="form-control"  name="sub_category" id="sub_category" >
 
                            <option value="">-- Select Sub-Category --</option>

                            </select>
                                @error('sub_category')
                                        <strong>{{ $message }}</strong>  
                                @enderror
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <label for="Price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>
                        <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price">

                                @error('price')
                                        <strong>{{ $message }}</strong>  
                                @enderror 
                        </div>
                        
                        </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="submit">
                                    {{ __('Save') }}
                                </button>

                               
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection

<script src="{{asset('js/add_product.js')}}" defer></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

