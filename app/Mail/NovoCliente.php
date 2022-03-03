<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoCliente extends Mailable
{
    use Queueable, SerializesModels;

    private $nome;
    private $email;

    /**
     * Create a new message instance.
     * 
     * Passagem de parametros injesao de dependencias
     * 
     * toda info que quero mandar pra dentro do email
     *
     * @return void
     */
    public function __construct($nome, $email)
    {
        $this->nome = $nome;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * responsavel por setas os parametros
     * 
     * assunto
     * copia
     * texto
     * ...
     * 
     * @return $this
     */
    public function build()
    {
        $this->subject("Bem vindo ao nosso sistema");
        $this->to($this->email, $this->nome);
        return $this->view('emails.novo-cliente', ['cliente' => $this->nome]);
    }
}


