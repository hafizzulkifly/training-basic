

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Todos Index') }}</div>
                    <table class="table">
                        <thead>
                            <th> ID </th>
                            <th> Nama</th>
                            <th> Email </th>
                            <th> created </th>
                            <th> Action </th>
                        </thead>

                        <tbody>
                         @foreach ($user as $pengguna)
                            <tr>
                                <td> {{ $pengguna->id }} </td>
                                <td> {{ $pengguna->name}} </td>
                                <td> {{$pengguna->email }} </td>
                                <td> {{$pengguna->created_at->diffForHumans()}} </td>
                                <td>
                                <a class="btn btn-primary" href="/listuser/{{ $pengguna->id}}">Show </a>
                                <a class="btn btn-success" href="/listuser/{{ $pengguna->id}}/edit">Edit </a>
                                <a onclick="return confirm ('Are you sure')" class="btn btn-danger" href="/listuser/{{ $pengguna->id}}/delete">Delete </a>
                                </td>

                            </tr>
                           @endforeach 
                        </tbody>
                    </table>

                    {{ $user->links()}}
              
                <div class="card-body">
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
