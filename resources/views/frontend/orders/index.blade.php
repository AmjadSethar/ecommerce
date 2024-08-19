@extends('layouts.app')
@section('title','My Orders')
    

@section('content')
<div class="py-3 pyt-md-4">
    <div class="container">
        ,<div class="row">
            <div class="col-md-12 text-center">
                <div class="p-4 shadow bg-white">
                    <h2>My Orders</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>Order ID</th>
                            <th>Tracking No</th>
                            <th>Username </th>
                            <th>payment Mode</th>
                            <th>Ordered Date</th>
                            <th>Status Message</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $Orderitem)
                                <tr>
                                    <td>{{$Orderitem->id}}</td>
                                    <td>{{$Orderitem->tracking_no}}</td>
                                    <td>{{$Orderitem->fullname}}</td>
                                    <td>{{$Orderitem->payment_mode}}</td>
                                    <td>{{$Orderitem->created_at}}</td>
                                    <td>{{$Orderitem->status_message}}</td>
                                    <td>
                                        <a href="{{url('/orders/'.$Orderitem->id)}}" class="btn btn-primary btn-sm">View</a>
                                       
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Orders Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{$orders->links()}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection