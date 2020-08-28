@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4 offset-md-8">
                            <a href="{{ route('medico.create') }}">
                                <button type="button" class="btn btn-primary">Novo Médico</button>
                            </a>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <h3 class="text-center">Listagem de Médicos</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 offset-md-8">
                            <form action="{{ route('medicos.search')}}" method="get">
                                <input name="busca" placeholder="Digite o nome ou CRM" class="form-control"/>
                                <button class="btn btn-primary mt-2" type="submit">Buscar</button>
                            </form>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Médico</th>
                                <th scope="col">CRM</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Ações</th>
                              </tr>
                            </thead>
                            <tbody>
                                @if($medicos)
                                @foreach ($medicos as $medico)
                                <tr>
                                    <th scope="row">{{$medico->id}}</th>
                                    <td>{{$medico->nome}}</td>
                                    <td>{{$medico->crm}}</td>
                                    <td>{{$medico->telefone}}</td>
                                    <td>
                                        <a href="{{route('medico.edit', $medico->id)}}" class="btn btn-warning">
                                            Editar
                                        </a>
                                        <form action="{{ route('medicos.destroy', $medico->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Remover</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                          </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
