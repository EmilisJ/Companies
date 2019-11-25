@extends('layouts.app')

@section('content')
<div class="container" >
   <div class="row justify-content-center">
       <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Companies</div>
                <div class="card-body">
                    @foreach ($companies as $company)
                    <a href="{{route('company.edit',[$company])}}">{{$company->name}}</a> {{$company->address}}
                    <form method="POST" class="border-bottom" action="{{route('company.destroy', [$company])}}">
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
