<x-layout>
  <h2>{{ $internship->position }} Internship</h2>

  {{-- internship info --}}
  <div class="bg-gray-200 p-4 rounded">
    <p><strong>Position:</strong> {{ $internship->position }}</p>
    <p><strong>About the position:</strong></p>
    <p>{{ $internship->about }}</p>
  </div>

  {{-- office info --}}
  <div class="border-2 border-dashed bg-white px-4 pb-4 my-4 rounded">
    <h3>Office Information</h3>
    <p><strong>Office name:</strong> {{ $internship->office->name }}</p>
    <p><strong>Location:</strong> {{ $internship->office->location }}</p>
    <p><strong>About the Office:</strong></p>
    <p>{{ $internship->office->description }}</p>
  </div>

  {{-- delete button --}}
  <form action="{{ route('internships.destroy', $internship->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn my-4">Delete Internship</button>
  </form>

</x-layout>