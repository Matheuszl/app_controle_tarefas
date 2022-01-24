<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;

/**
 * ESSE DIRETORIO É CRIADO 
 * php artisan make:export UsersExport --model=User
 * PARA EXPORTAÇÃO DE ARQUIVOS XLSX
 */
class TarefasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tarefa::all(); //TRAS TODOS OS REGISTROS DE TAREFA MAPEADO POR ELE MESMO
    }
}
