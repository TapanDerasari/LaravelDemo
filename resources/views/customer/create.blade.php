@extends('layouts.app')
@section('title','create customer')
@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="float-right"><a href="{{route('customer')}}">Customer Details</a></div>
        <form action="{{route('customer.add')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}"
                       placeholder="name@example.com">
                @if ($errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                @if ($errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="status">Example select</label>
                <select name="status" class="form-control" id="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                @if ($errors->has('status'))
                    <div class="text-danger">{{ $errors->first('status') }}</div>
                @endif
            </div>
            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
