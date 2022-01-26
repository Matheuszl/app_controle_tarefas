<h2>Lista de Tarefas</h2>

<table>
  <thead>
    <tr>
      <th>ID:</th>
      <th>Tarefa</th>
      <th>Data conclusao:</th>
    </tr>
  </thead>
  <body>
    @foreach ($tarefas as $kay=> $tarefa )
      <tr>
        <td>{{ $tarefa->id}}</td>
        <td>{{ $tarefa->tarefa }}</td>
        <td>{{ date('d/m/Y', strtotime( $tarefa->data_conclusao) )}}</td>
      </tr>
    @endforeach
    
  </body>
</table>


