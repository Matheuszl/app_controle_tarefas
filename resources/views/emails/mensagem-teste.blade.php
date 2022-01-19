@component('mail::message')
# Dedicado a introdução do email

Aqui deve ser introduzido o corpo do email

@component('mail::button', ['url' => ''])
Texto do botao
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
