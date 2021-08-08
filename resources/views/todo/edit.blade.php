@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('TODO Edit') }} 
                    <a href="/todo" style="float:right;">Show Todos</a>
                </div>

                

                <div class="card-body">
                   <x-alert/>
                   <form action="{{route('todo.update',$todo->id)}}" method="post">
                       @csrf
                       @method('patch')
                       
                       <div style="padding:5px;"> <input type="text" name="title" value="{{ $todo->title }}" /></div>
                       <div style="padding:5px;"><textarea name="description" placeholder="Description">{{$todo->description}}</textarea></div>
                       <input type="submit" value="Update" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
