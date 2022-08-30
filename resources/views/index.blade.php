@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Products') }}
                <a style="float:right" href="/add-products" class="btn btn-success btn-sm">Add Product</a>

                </div>

                <div class="card-body">
                <div class="row justify-content-center">
                <div class="col-md-8">
                     <table class="table" width="100%;">
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Sub-Category</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        @foreach($products as $key=>$product)
                        <tr>
                            <td>{{$product['name']}}</td>
                            <td>{{$product['category']}}</td>
                            <td>{{$product['sub_category']}}</td>
                            <td>{{$product['price']}}</td>
                            <td>
                            <a href="/product/{{$product['id']}}/edit" class="btn btn-primary btn-sm">Edit</a>
                            <a href="/product/{{$product['id']}}/delete"  onclick="return confirm('Are you sure you want to delete record?')" class="btn btn-danger btn-sm" href="">Delete</a> 
                            </td>
                        </tr>
                        @endforeach
                    </table>   
                </div>
    </div>
</div>
@endsection

<script src="{{asset('js/add_product.js')}}" defer></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

