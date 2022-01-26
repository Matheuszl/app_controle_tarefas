<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        .titulo {
            border: 1px;
            background-color: #c2c2c2;
            text-align: center;
            width: 100%;
            text-transform: uppercase;
            font-weight: bold;

            margin-bottom: 25px;

        }

        .tabela {
            width: 100%;
        }

        table th {
            text-align: left;
        }

        .page-break {
            page-break-after: always;
        }

    </style>
</head>

<body>
    <div class="titulo">Lista de Tarefas</div>

    <table class="tabela">
        <thead>
            <tr>
                <th>ID:</th>
                <th>Tarefa</th>
                <th>Data conclusao:</th>
            </tr>
        </thead>

        <body>
            @foreach ($tarefas as $kay => $tarefa)
                <tr>
                    <td>{{ $tarefa->id }}</td>
                    <td>{{ $tarefa->tarefa }}</td>
                    <td>{{ date('d/m/Y', strtotime($tarefa->data_conclusao)) }}</td>
                </tr>
            @endforeach

        </body>
    </table>
</body>

</html>
