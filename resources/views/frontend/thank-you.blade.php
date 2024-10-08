@extends('layouts.app')
@section('title','Thank You for shopping')  
    

@section('content')

<div class="py-3 pyt-md-4 my-5">
    <div class="container">
        ,<div class="row">
            <div class="col-md-12 text-center">
                @if (session('message'))
                    <h5 alert alert-success>{{session('message')}}</h5>
                @endif
                <div class="p-4 shadow bg-white">
                    <h2>Ecom</h2>
                <h4>Thank you for shopping with Ecom</h4>
                <a href="{{url('/collections')}}" class="btn btn-warning">Shop More</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection