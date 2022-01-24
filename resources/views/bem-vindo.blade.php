Site da aplicação

{{-- o motor de renderização do blade possui algumas
ferramentas para ajudar a ver se o usuario é logado no sistema ou visitante --}}

@auth
{{-- verifica se o user esta logado e exibe o conteudo somente se estiver:true --}}
  <h3>Usuario autenticado</h3>

  {{ Auth::user()->id }}
  {{ Auth::user()->name }}
  {{ Auth::user()->email }}
@endauth

@guest
  {{-- ao contrario da auth ela exibe se o usuario for um visitante --}}

  <h3>Ola visitante</h3>
@endguest
