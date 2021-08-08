@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('All Your TODOs') }} 
                    <a href="{{route('todo.create')}}" ><span style="float:right; font-size:20px;" ><i class="fas fa-plus"></i></span></a>
                </div>

                <div class="card-body">
                   <x-alert/>
                   <ul>
                       @forelse ($todos as $todo)
                           <li style="list-style-type: none;">

                                @if($todo->completed)
                                    <span style="float:left; padding-right:20px;padding-left:-20px; color:green; cursor:pointer;"
                                        onclick="event.preventDefault();
                                        document.getElementById('form-incompleted-{{$todo->id}}').submit()"
                                    >
                                        <i class="fas fa-check" ></i>
                                        <form style="display:none;" id="{{'form-incompleted-'.$todo->id}}" method="post" 
                                            action="{{route('todo.incompleted', $todo->id)}}">
                                            @csrf
                                            @method('put')
                                        </form>
                                    </span>
                                @else
                                    <span style="float:left; padding-right:20px; padding-left:-20px; color:lightgray; cursor:pointer;" 
                                        onclick="event.preventDefault();
                                        document.getElementById('form-completed-{{$todo->id}}').submit()"
                                    >
                                        <i class="fas fa-check " ></i>
                                        <form style="display:none;" id="{{'form-completed-'.$todo->id}}" method="post" 
                                            action="{{route('todo.completed', $todo->id)}}">
                                            @csrf
                                            @method('put')
                                        </form>
                                    </span>
                                @endif
                               
                                <a href="{{route('todo.show',$todo->id)}}">{{$todo->title}}</a> 
                                
                                
                                    <span style="float:right; padding-left:7px; color:red; cursor:pointer;" 
                                        onclick="event.preventDefault();
                                        if(confirm('Do you really want to delete ?')){
                                            document.getElementById('form-delete-{{$todo->id}}').submit()
                                        }"
                                        
                                    > 
                                        <i class="fas fa-trash"></i>
                                        <form style="display:none;" id="{{'form-delete-'.$todo->id}}" method="post" 
                                            action="{{route('todo.destroy', $todo->id)}}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </span>
                                    
                                      

                                <a href="{{route("todo.edit",$todo->id)}}" >
                                    <span style="float:right; color:orange;" > 
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    
                                </a>
                            </li>

                        @empty
                            <p>No task available, cretae one.</p>
                       @endforelse
                   </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
