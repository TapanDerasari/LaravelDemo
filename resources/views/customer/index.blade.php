@extends('layouts.app')
@section('title','Customer Details')
@section('breadcrumb',Breadcrumbs::render('customers'))
@section('content')
    <div class="container">
        <div class="float-right"><a href="{{route('customer.create')}}">Create Customer</a></div>
        <table id="customer" class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($customers)&&!empty($customers))
                @foreach($customers as $i=>$customer)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>Active</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection

