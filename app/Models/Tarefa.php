<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = ['tarefa', 'data_conclusao', 'user_id', 'descricao', 'status', 'relevancia', 'valor'];

    /**
     * Get the user that owns the Tarefa
     * PERTENCE A
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
