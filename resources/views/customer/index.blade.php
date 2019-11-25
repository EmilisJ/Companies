@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Customers</div>
                <div class="card-body">
                    @foreach ($customers as $customer)
                    <div class="w-50"><a href="{{route('customer.edit',[$customer])}}">{{$customer->name}} {{$customer->surname}}</a> {{$customer->company->name}}</div> 
                    <form method="POST" class="border-bottom" action="{{route('customer.destroy', [$customer])}}">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                    </form>
                    <br>
                    @endforeach
                </div>
            </div>
       </div>
   </div>
</div>
@endsection
