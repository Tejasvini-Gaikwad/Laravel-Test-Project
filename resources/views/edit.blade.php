@extends('layouts.app_new')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Product') }}</div>

                <div class="card-body">
                <div class="row justify-content-center">
        <div class="col-md-8">
                <form method="POST" action="update">
                        @csrf

                        <div class="row mb-3">
                            <label for="Name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}" required autocomplete="name" autofocus>

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

                              <option value="{{ $key }}" {{$key == $data->category ? 'selected' : ''}}>{{ $category }}</option>

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
                            <select class="form-control" name="sub_category" id="sub_category" >
 
                            <option value="">-- Select Sub-Category --</option>
                            @foreach($sub_categories as $key=>$sub_category)

                            <option value="{{ $key }}" {{$key == $data->sub_category ? 'selected' : ''}}>{{ $sub_category }}</option>

                            @endforeach
                            </select>
                                @error('sub_category')
                                        <strong>{{ $message }}</strong>  
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>
                        <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $data->price}}" required autocomplete="price" autofocus>

                                @error('price')
                                        <strong>{{ $message }}</strong>  
                                @enderror 
                        </div>
                        </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="submit">
                                    {{ __('Update') }}
                                </button>

                               
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection

<script src="{{asset('js/edit.js')}}" defer></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

