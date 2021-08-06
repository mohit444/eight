@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('All Your TODOs') }} 
                    <a href="/todo/create" ><span style="float:right; font-size:20px;" ><i class="fas fa-plus"></i></span></a>
                </div>

                <div class="card-body">
                   <x-alert/>
                   <ul>
                       @foreach ($todos as $todo)
                           <li >{{$todo->title}} 
                                @if($todo->completed)
                                    <span style="float:right; padding-left:5px; color:green;">
                                        <i class="fas fa-check" ></i>
                                    </span>
                                @else
                                    <span style="float:right; padding-left:5px; color:lightgray;" 
                                        onclick="event.preventDefault();
                                        document.getElementById('form-completed-{{$todo->id}}').submit()"
                                    >
                                        <i class="fas fa-check " ></i>
                                        <form style="display:none;" id="{{'form-completed-'.$todo->id}}" method="post" action="{{route('todo.completed', $todo->id)}}">
                                            @csrf
                                            @method('put')
                                        </form>
                                    </span>
                                @endif
                                <a href="{{'/todo/'.$todo->id.'/edit'}}" >
                                    <span style="float:right;" > 
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    
                                </a>
                               
                            
                            </li>
                       @endforeach
                   </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
