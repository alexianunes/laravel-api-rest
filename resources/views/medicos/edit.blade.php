@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edição de Médicos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form>
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
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Especialidades</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
