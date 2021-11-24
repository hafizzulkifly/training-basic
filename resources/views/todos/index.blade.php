



@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('message'))
                <div class="alert {{ session()->get('type') }}">
                    {{ session()->get('message')}}
                </div>
                @endif
            <div class="card">
                <div class="card-header">{{ __('Todos Index') }}</div>
                    <table class="table">
                        <thead>
                            <th> ID </th>
                            <th> Title </th>
                            <th> Description </th>
                            <th> Creator </th>
                            <th> Action </th>
                        </thead>

                        <tbody>
                         @foreach ($todos as $todo)
                            <tr>
                                <td> {{ $todo->id }} </td>
                                <td> {{ $todo->title}} </td>
                                <td> {{$todo->description}} </td>
                                <td> {{$todo->user->name}} </td>
                                <td> 
                                    <a class="btn btn-primary" href="/todoshow/{{ $todo->id}}">Show </a>
                                    <a class="btn btn-success" href="/todos/{{ $todo->id}}/edit">Edit </a>
                                    <a onclick="return confirm ('Are you sure')" class="btn btn-danger" href="/todos/{{ $todo->id}}/delete">Delete </a>
                                
                                </td>

                            </tr>
                           @endforeach 
                        </tbody>
                    </table>

                    {{ $todos->links()}}
              
                <div class="card-body">
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
