@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Todos Edit') }}</div>
                   
                <div class="card-body">
                    <form action="/todos/{{$todo->id}}/update" method="POST">
                    @csrf
                        <div class="form-group">
                        <label> Tittle </label>
                        <input type="text" name="title" class="form-control" value="{{ $todo->title}}">
                        </div>
                        <div class="form-group">
                        <label> Description </label>
                        <textarea name="description" class="form-control"> {{ $todo->description}}</textarea>
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Todos </button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
