@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Todo Description') }} 
                    <a href="{{route('todo.index')}}" ><span style="float:right; font-size:20px;" ><i class="fas fa-long-arrow-alt-left"></i></span></a>
                </div>

                <div class="card-body">
                   <p>{{$todo->description}} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
