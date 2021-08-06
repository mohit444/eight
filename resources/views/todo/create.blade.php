@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('TODO create') }} 
                    <a href="/todo" style="float:right;"><i class="fas fa-eye"></i></a>
                </div>

                

                <div class="card-body">
                   <x-alert/>
                   <form action="/todo/create" method="post">
                       @csrf
                       <input type="text" name="title" value="{{ old('title') }}" >
                       <input type="submit" value="Create" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
