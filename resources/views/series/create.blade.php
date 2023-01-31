<x-layout title="Nova Séries">
  <form action="{{ route('series.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
      <div class="col-8">
        <label for="name" class="form-label">Nome:</label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          class="form-control"
          value="{{ old('name') }}"
          autofocus
        >
      </div>
      <div class="col-2">
        <label for="seasonsQty" class="form-label">Temporadas:</label>
        <input 
          type="text" 
          id="seasonsQty" 
          name="seasonsQty" 
          class="form-control"
          value="{{ old('seasonsQty') }}"
        >
      </div>
      <div class="col-2">
        <label for="epsodesPerSeason" class="form-label">Ep / Temporadas:</label>
        <input 
          type="text" 
          id="epsodesPerSeason" 
          name="epsodesPerSeason" 
          class="form-control"
          value="{{ old('epsodesPerSeason') }}"
        >
      </div>
    </div>
    <button type="submit" class="btn btn-primary">
      Adicionar
    </button>
  </form>
</x-layout>
