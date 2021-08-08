@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('TODO create') }} 
                    <a href="{{route('todo.index')}}" style="float:right;"><i class="fas fa-eye"></i></a>
                </div>

                

                <div class="card-body">
                   <x-alert/>
                   <form action="{{route('todo.store')}}" method="post">
                       @csrf
                      <div style="padding:5px;"> <input type="text" name="title" value="{{ old('title') }}" placeholder="Title"/></div>
                       <div style="padding:5px;"><textarea name="description" placeholder="Description"></textarea></div>
                       <livewire:step />
                       <div style="padding:5px;"><input type="submit" value="Create" > </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
