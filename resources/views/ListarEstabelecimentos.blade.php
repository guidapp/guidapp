@extends('layouts.app')

@section('content')

<script language= 'javascript'>
function avisoDeletar(id){
  if(confirm ('Esta ação removerá do sistema todos os contratos deste fornecedor. Deseja realmente excluí-lo? ')) {
    location.href="/fornecedor/remover/"+id;
  }
  else {
    return false;
  }
}

function editar(id){
  location.href="/editarestabelecimento/"+id;
}
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Estabelecimentos') }}</div>

                <div class="card-body">

                  @if (\Session::has('success'))
                  <br>
                      <div class="alert alert-success">
                          {!! \Session::get('success') !!}
                      </div>
                  @endif
                  @if (\Session::has('warning'))
                      <div class="alert alert-warning">
                            {!! \Session::get('warning') !!}
                      </div>
                  @endif
                  <div class="panel-body">
                      @if(count($estabelecimentos) == 0)
                      <div class="alert alert-danger">
                              Não há nenhum estabelecimento seu cadastrado no sistema.
                      </div>
                      @else
                      {{-- <div id= "termoBusca" style="display: flex; justify-content: space-between">
                          <input type="text" id="termo" onkeyup="buscar()" placeholder="Busca">
                      </div>
                          <br> --}}
                        <div id="tabela" class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                  <th>Nome</th>
                                  <th>Latitude</th>
                                  <th>Longitude</th>
                                  <th>Descrição</th>
                                  <th>Telefone</th>
                                  <th>Cidade</th>
                                  <th>Organizador</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($estabelecimentos as $estabelecimento)
                                <tr>
                                    <td data-title="Nome">{{ $estabelecimento->nome }}</td>
                                    <td data-title="Latitude">{{ $estabelecimento->latitude }}</td>
                                    <td data-title="Longitude">{{ $estabelecimento->longitude }}</td>
                                    <td data-title="Descrição">{{ $estabelecimento->descricao }}</td>
                                    <td data-title="Telefone">{{ $estabelecimento->telefone }}</td>
                                    <td data-title="Cidade">{{ $estabelecimento->cidade }}</td>
                                    <td data-title="Organizador">{{ $estabelecimento->user_id }}</td>

                                   <td align="right">
                                      <a class="btn btn-primary" title="Editar estabelecimento" href="{{ route ("estabelecimento.editar", ['id' => $estabelecimento->id])}}">
                                        {{-- <img src="/img/edit.png" height="21" width="17" align = "right"> --}}
                                        Editar
                                      </a>
                                    </td>
                                </tr>
                              @endforeach

                            </tbody>
                          </table>
                        </div>
                      @endif
                  </div>
                  <div class="panel-footer">
                      <a class="btn btn-primary" href="{{ route("estabelecimento.cadastrar") }}">Novo</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script type="text/javascript">
    function buscar() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("termo");
      filter = input.value.toUpperCase();
      table = document.getElementById("tabela");
      tr = table.getElementsByTagName("tr");
      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
</script> --}}
@endsection
