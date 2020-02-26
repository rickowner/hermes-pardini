<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    
    <title>:: Hermes Pardini ::</title>
    
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
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
<nav class="navbar navbar-light bg-light">
<form class="form-inline" action="  ">
    
    <a href=" {{ url('/cadastros') }} " class="delete-modal btn btn-primary"> Cadastrar
        <span class="glyphicon glyphicon-send"></span>    
    </a>
  </form>
</nav>
<table id="table" class="table" style="width:100%">
    <thead>

        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Nome</th>
            <th class="text-center">Sobrenome</th>
            <th class="text-center">Email</th>
            <th class="text-center">Data Nascimento</th>
            <th class="text-center">Telefone</th>
            <th class="text-center">Endereço</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>

    <tbody>
@foreach($data as $item)
<tr class="item{{$item->id}}">
    <td class="text-center">{{ $item->id }}</td>
    <td class="text-center">{{ $item->nome }}</td>
    <td class="text-center">{{ $item->sobrenome }}</td>
    <td class="text-center">{{ $item->email }}</td>
    <td class="text-center">{{ date('d/m/Y', strtotime($item->data_nascimento)) }}</td>
    @foreach($item->telefone as $telefone)
    <td class="text-center">{{ preg_replace("/^2?(\d{5})-(\d{4})$/", "--", $telefone->telefone_principal)  }}</td>
    @endforeach
    @foreach($item->endereco as $endereco)
    <td class="text-center">{{ $endereco->endereco }}</td>
    @endforeach
    <td class="text-center">
        <a href="{{ url("/cadastros/$item->id/edit") }}" class="edit-modal btn btn-info"
            data-info="{{$item->id}},{{$item->nome}},{{$item->sobrenome}},{{$item->email}},{{$item->email}},{{$item->data_nascimento}},{{$item->data_nascimento}},{{$item->data_nascimento}},{{$item->data_nascimento}}">
            <span class="glyphicon glyphicon-edit"></span> Edit
        </a>
        <a href="" class="delete-modal btn btn-danger"
            data-info="{{$item->id}},{{$item->nome}},{{$item->sobrenome}},{{$item->email}},{{$item->email}},{{$item->data_nascimento}},{{$item->data_nascimento}},{{$item->data_nascimento}},{{$item->data_nascimento}}">
            <span class="glyphicon glyphicon-trash"></span> Delete
        </a>
    </td>
</tr>
@endforeach
</tbody>

</table>
</body>
</html>