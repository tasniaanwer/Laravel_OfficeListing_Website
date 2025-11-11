<x-layout>
  <h2>Currently Available Ninjas</h2>

  <ul>
    @foreach($ninjas as $ninja)
      <li>
        <x-card :highlight="$ninja['skill'] > 70" href="{{route('ninjas.show', $ninja->id)}}">
          <div>
            <h3>{{ $ninja->name }}</h3>
            <p>{{ $ninja->dojo->name }}</p>
          </div>
        </x-card>
      </li>
    @endforeach
  </ul>

  {{ $ninjas->links() }}
</x-layout>