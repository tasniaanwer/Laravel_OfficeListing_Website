<x-layout>
  <h2>Available Internship Positions</h2>

  <ul>
    @foreach($internships as $internship)
      <li>
        <x-card href="{{route('internships.show', $internship->id)}}">
          <div>
            <h3>{{ $internship->position }}</h3>
            <p>{{ $internship->office->name }}</p>
          </div>
        </x-card>
      </li>
    @endforeach
  </ul>

  {{ $internships->links() }}
</x-layout>