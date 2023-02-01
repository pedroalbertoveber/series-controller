<x-layout title="Séries">
  @auth
  <a href="{{ route('series.create')}}" class="btn btn-dark mb-2">Adicionar</a>
  @endauth

  <ul class="list-group">
    @foreach ($series as $serie)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        @auth<a href="{{ route('seasons.index', $serie->id) }}">@endauth
          {{ $serie->name }}
        @auth</a>@endauth

        <div class="d-flex align-items-center justify-content-end">
          @auth
          <a href="{{route('series.edit', $serie->id)}}" class="d-block btn btn-primary m-2">Edit</a>
          <form action="{{ route('series.destroy', $serie->id) }}" method="POST"> 
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">
              X
            </button>
          </form>
          @endauth
        </div>
      </li>

    @endforeach
  </ul>
</x-layout>
