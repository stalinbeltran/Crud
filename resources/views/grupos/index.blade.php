@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Grupos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/grupos/create" title="Crea un grupo"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>description</th>
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
        @foreach ($grupos as $grupo)
            <tr>
                <td>{{$grupo->id}}</td>
                <td>{{$grupo->descripcion}}</td>
                <td>{{$grupo->created_at}}</td>
                <td>
                    <form action="/grupos/{{$grupo->id}}" method="POST">

                        <a href="/grupos/{{$grupo->id}}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="/grupos/{{$grupo->id}}/edit">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $grupos->links() !!}

@endsection
