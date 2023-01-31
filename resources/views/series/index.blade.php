<x-layout title="Séries">
  <a href="{{ route('series.create')}}" class="btn btn-dark mb-2">Adicionar</a>

  @isset($message)      
    <div class="alert alert-success">
      {{ $message }}
    </div>
  @endisset

  <ul class="list-group">
    @foreach ($series as $serie)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ route('seasons.index', $serie->id) }}">
          {{ $serie->name }}
        </a>
        <div class="d-flex align-items-center justify-content-end">
          <a href="{{route('series.edit', $serie->id)}}" class="d-block btn btn-primary m-2">Edit</a>
          <form action="{{ route('series.destroy', $serie->id) }}" method="POST"> 
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">
              X
            </button>
          </form>
        </div>
      </li>

    @endforeach
  </ul>
</x-layout>
