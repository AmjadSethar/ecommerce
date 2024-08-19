@extends('layouts.admin')
@section('title','My Orders')
    

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>My Orders</h4>
            </div>
            <div class="card-body">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Filter By Date</label>
                            <input type="date" name="date" value="{{Request::get('date') ?? date('Y-m-d')}}"  class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Filter By Status</label>
                            <select name="status"  class="form-select">
                                <option value="">Select All Status</option>
                                <option value="in progress"{{Request::get('status')== 'in progress' ? 'selected':''}}>In Progress</option>
                                <option value="completed" {{Request::get('status')== 'completed' ? 'selected':''}}>Completed</option>
                                <option value="pending" {{Request::get('status')== 'pending' ? 'selected':''}}>Pending</option>
                                <option value="canclelled" {{Request::get('status')== 'canclelled' ? 'selected':''}}>Cancelled</option>
                                <option value="out-for-delivery" {{Request::get('status')== 'out-of-delivery' ? 'selected':''}}>Out For delivery</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
                <hr>
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
                                        <a href="{{url('admin/orders/'.$Orderitem->id)}}" class="btn btn-primary btn-sm">View</a>
                                       
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
@endsection