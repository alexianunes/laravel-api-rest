@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastro de Médicos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('medicos.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="nome">Nome</label>
                          <input id="nome" name="nome" type="text" class="form-control" placeholder="Informe o Nome">
                        </div>
                        <div class="form-group">
                            <label for="crm">CRM</label>
                            <input id="crm" name="crm" type="text" class="form-control" placeholder="Informe o CRM">
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input id="telefone" name="telefone" type="text" class="form-control" placeholder="Informe o Telefone">
                        </div>
                        <div class="form-group form-check">
                            <label for="especialidades">Especialidades:</label><br>
                            @foreach ($especialidadesArray as $especialidade)
                                <input type="checkbox" class="form-check-input" value="{{$especialidade->id}}" name="especialidades[]">
                                <label class="form-check-label">{{$especialidade->nome}}</label> <br>
                            @endforeach
                          
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
