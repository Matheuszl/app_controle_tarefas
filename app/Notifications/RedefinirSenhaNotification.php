<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class RedefinirSenhaNotification extends Notification
{
    use Queueable;
    public $token;
    public $email;
    public $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $email, $name)
    {
        $this->token = $token;
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Desviamos o fluxo nativo, assim podemos customizar.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $minutos = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
        $url = 'http://localhost:8000/password/reset/'.$this->token.'?email='.$this->email;
        $saudacao = 'Olá '.$this->name;

        return (new MailMessage)
            ->subject(Lang::get('Atualização de senha'))
            ->greeting($saudacao)
            ->line(Lang::get('Esqueceu sua senha? vamos resolver isso rapidinho!'))
            ->action(Lang::get('Redefinir senha'), $url)
            ->line('Esse requisição expira em '.$minutos.' minutos')
            ->line('Se nao foi voce que requisitou, nenhuma ação é necessaria, sua conta esta segura!')
            ->salutation('Até breve');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
