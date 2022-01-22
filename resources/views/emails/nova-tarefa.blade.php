@component('mail::message')
# {{ $tarefa }}

Data limite de conclusao de sua nova tarefa: {{ $data_conclusao }}

{{-- se usar {{ vai da erro }} --}}
@component('mail::button', ['url' => $url]) 
Clique aqui para abrir sua tarefa
@endcomponent

Tenha um otimo dia de trabalho!,<br>
{{ config('app.name') }}
@endcomponent
