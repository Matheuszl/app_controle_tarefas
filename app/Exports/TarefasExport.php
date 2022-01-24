<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

/**
 * ESSE DIRETORIO É CRIADO 
 * php artisan make:export UsersExport --model=User
 * PARA EXPORTAÇÃO DE ARQUIVOS XLSX
 */
class TarefasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Tarefa::all(); TRAS TODOS OS REGISTROS DE TAREFA MAPEADO POR ELE MESMO
        // dd(auth()->user()->tarefas()->get());
        return auth()->user()->tarefas()->get(); //exposta apenas as tarefas relacionadas ao usuario logado
    }

    //a interface espera que o metodo retorne um array
    // :array declaramos o tipo do retorno
    public function headings():array 
    {   
        return ['ID Tarefa', 'ID Usuario', 'Tarefa', 'Data Conclusão', 'Data Criação', 'Data Atualização']; 
    }
}
