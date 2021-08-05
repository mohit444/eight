@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('All Your TODOs') }} 
                    <a href="/todo/create" style="float:right;">Create Todo</a>
                </div>

                <div class="card-body">
                   <x-alert/>
                   <ul>
                       @foreach ($todos as $todo)
                           <li>{{$todo->title}} 
                                <a href="{{'/todo/'.$todo->id.'/edit'}}" style="float:right;">Edit</a>
                            </li>
                       @endforeach
                   </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
