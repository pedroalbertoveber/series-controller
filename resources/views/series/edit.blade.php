<x-layout title="Editar série: '{{ $series->name }}'">
  <x-series.form :action="route('series.update', $series->id)" :name="$series->name" :update="true"/>
    <form action="{{ $action }}" method="POST">
      @csrf
      @isset($update)
        @method('PUT')
      @endisset
      <div class="mb-3">
        <label for="name" class="form-label">Nome:</label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          class="form-control"
          @isset($name) 
            value="{{$name}}"
          @endisset
          >
      </div>
      <button type="submit" class="btn btn-primary">
        Adicionar
      </button>
    </form>
</x-layout>