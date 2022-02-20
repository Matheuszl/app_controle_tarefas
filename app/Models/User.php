<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; //responsavel pela verificação de email
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\RedefinirSenhaNotification;
use App\Notifications\VerificarEmailNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gestor',
        'admin',
        'colaborador'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //FUNCAO NATIVA NO LARAVEL
    public function sendPasswordResetNotification($token){
        $this->notify(new RedefinirSenhaNotification($token, $this->email, $this->name));
    }

    public function sendEmailVerificationNotification() {
        $this->notify(new VerificarEmailNotification($this->name));
    }

    
    /**
     * Get all of the tarefas for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tarefas()
    {
        //HasMany tem muitos
        return $this->hasMany('App\Models\Tarefa');
    }
}
