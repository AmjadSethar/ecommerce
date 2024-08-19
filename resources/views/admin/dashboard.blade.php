@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      @if(session('message'))
      <h2>{{session('message')}}</h2>
      @endif
      <div class="me-md-3 me-xl-5">
        <h2>Dashboard</h2>
         <p class="mb-md-0">Your analytics dashboard template.</p>
         <hr>
       </div>
       <div class="row">
        <div class="col-md-3">
          <div class="card card-body bg-primary text-white mb-3">
            <label>Total Orders</label>
            <h1>{{$totalOrders}}</h1>
            <a href="{{url('admin/orders')}}" class="text-white">View</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-success text-white mb-3">
            <label>Today Orders</label>
            <h1>{{$todayOrders}}</h1>
            <a href="{{url('admin/orders')}}" class="text-white">View</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-warning text-white mb-3">
            <label>This Month Orders</label>
            <h1>{{$thisMonthOrders}}</h1>
            <a href="{{url('admin/orders')}}" class="text-white">View</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-danger text-white mb-3">
            <label>This Year Orders</label>
            <h1>{{$thisYearOrders}}</h1>
            <a href="{{url('admin/orders')}}" class="text-white">View</a>
          </div>
        </div>
       </div>
       <hr>
       <div class="row">
        <div class="col-md-3">
          <div class="card card-body bg-primary text-white mb-3">
            <label>Total Products</label>
            <h1>{{$totalProducts}}</h1>
            <a href="{{url('admin/products')}}" class="text-white">View</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-success text-white mb-3">
            <label>Total Categorirs</label>
            <h1>{{$totalCategories}}</h1>
            <a href="{{url('admin/category')}}" class="text-white">View</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-warning text-white mb-3">
            <label>Total Brands</label>
            <h1>{{$totalBrands}}</h1>
            <a href="{{url('admin/brands')}}" class="text-white">View</a>
          </div>
        </div>
       </div>
       <hr>
       <div class="row">
        <div class="col-md-3">
          <div class="card card-body bg-primary text-white mb-3">
            <label>All Users</label>
            <h1>{{$totalAllUsers}}</h1>
            <a href="{{url('admin/users')}}" class="text-white">View</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-success text-white mb-3">
            <label>Total Users</label>
            <h1>{{$totalUser}}</h1>
            <a href="{{url('admin/users')}}" class="text-white">View</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-warning text-white mb-3">
            <label>Total Admin</label>
            <h1>{{$totalAdmin}}</h1>
            <a href="{{url('admin/users')}}" class="text-white">View</a>
          </div>
        </div>
        
       </div>
    </div>
  </div>
@endsection