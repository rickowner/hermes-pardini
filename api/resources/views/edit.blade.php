<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <title>:: Hermes Pardini ::</title>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >
      document.getElementById('endereco').value=("");

      function meu_callback(conteudo) 
      {
        if (!("erro" in conteudo)) 
        {
            //Atualiza os campos com os valores.
            document.getElementById('endereco').value = (conteudo.logradouro) + ' , ' + (conteudo.bairro) + ' - ' + (conteudo.localidade);
        }
      } 

      function pesquisacep(valor) 
      {
        var cep = valor.replace(/\D/g, '')
        // alert(cep);

        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('endereco').value="...";
        
        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        // alert(script.src);

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);
          
      }

    </script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">:: Hermes Pardini ::</a>
    </div>
  </div>
</nav>
<form action=" {{ url('/update') }} " method="POST">
  {{ csrf_field() }}
  <div class="container">
    <input type="hidden" name="id" value=" {{ $cadastro->id }} ">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nome</label>
            <input name="nome" id="nome" value="{{ $cadastro->nome }}" type="text" class="form-control" placeholder="Enter email">
            <small id="nome" class="form-text text-muted">Nome</small>
        </div>
        <div class="form-group col-md-6">
            <label>Sobrenome</label>
            <input name="sobrenome" id="sobrenome" value="{{ $cadastro->sobrenome }}" type="text" class="form-control" placeholder="Sobrenome">
            <small id="nome" class="form-text text-muted">Sobrenome</small>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label>Email</label>
          <input name="email" id="email" value="{{ $cadastro->email }}" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email">
          <small id="emailHelp" class="form-text text-muted">Email</small>
        </div>
        <div class="form-group col-md-6">
            <label>Data Nascimento</label>
            <input name="data_nascimento" id="data_nascimento" value=" {{ date('d/m/Y', strtotime($cadastro->data_nascimento)) }}" type="text" class="form-control" onkeypress="$(this).mask('00/00/0000')" placeholder="Data Nascimento">
            <small id="nome" class="form-text text-muted">Data Nascimento</small>
        </div>
    </div>
    <div class="form-row">
      @foreach($cadastro->telefone as $telefone)
        <div class="form-group col-md-2">
            <label>Telefone Principal</label>
            <input name="telefone_principal" id="telefone_principal" value="{{ $telefone->telefone_principal }}" type="text" class="form-control" placeholder="Telefone Principal">
            <small id="nome" class="form-text text-muted">Telefone Principal</small>
        </div>
        <div class="form-group col-md-2">
            <label>Telefone Comercial</label>
            <input name="telefone_comercial" id="telefone_comercial" value="{{ $telefone->telefone_comercial }}"  type="text" class="form-control" placeholder="Telefone Comercial">
            <small id="nome" class="form-text text-muted">Telefone Comercial</small>
        </div>
        <div class="form-group col-md-2">
            <label>Telefone Celular</label>
            <input name="telefone_celular" id="telefone_celular" value="{{ $telefone->telefone_celular }}"  type="text" class="form-control" placeholder="Telefone Celular">
            <small id="nome" class="form-text text-muted">Telefone Celular</small>
        </div>
        <div class="form-group col-md-2">
            <label>Telefone Residencial</label>
            <input name="telefone_residencial" id="telefone_residencial" value="{{ $telefone->telefone_residencial }}"  type="text" class="form-control" placeholder="Telefone Residencial">
            <small id="nome" class="form-text text-muted">Telefone Residencial</small>
        </div>
        <div class="form-group col-md-2">
          <label>Telefone Recado 1</label>
          <input name="telefone_recado1" id="telefone_recado1" value="{{ $telefone->telefone_recado1 }}"  type="text" class="form-control" placeholder="Telefone Recado 1">
          <small id="nome" class="form-text text-muted">Telefone Recado 1</small>
        </div>
        <div class="form-group col-md-2">
          <label>Telefone Recado 2</label>
          <input name="telefone_recado2" id="telefone_recado2"value="{{ $telefone->telefone_recado2 }}"  type="text" class="form-control" placeholder="Telefone Recado 2">
          <small id="nome" class="form-text text-muted">Telefone Recado 2</small>
        </div>
    </div>
    @endforeach
    @foreach($cadastro->endereco as $endereco)
    <div class="form-row">
      <div class="form-group col-md-2">
        <label>CEP</label>
        <input name="cep" id="cep" value=" {{ $endereco->cep }}" type="text" class="form-control" onkeypress="$(this).mask('00000-000')" onblur="pesquisacep(this.value);" aria-describedby="emailHelp" placeholder="CEP">
        <small id="cep" class="form-text text-muted">CEP</small>
      </div>
      <div class="form-group col-md-8">
          <label>Endereço</label>
          <input name="endereco" id="endereco" value=" {{ $endereco->endereco }}" type="text" class="form-control" placeholder="Endereço">
          <small id="endereco" class="form-text text-muted">Endereço</small>
      </div>
      <div class="form-group col-md-2">
        <label>Número</label>
        <input name="numero" id="numero" value=" {{ $endereco->numero }}" type="text" class="form-control" placeholder="Número">
        <small id="numero" class="form-text text-muted">Número</small>
      </div>
    </div>
    @endforeach
    <button type="submit" class="btn btn-primary" style="float: right">Salvar</button>
</div>

</form>
</body>
</html>