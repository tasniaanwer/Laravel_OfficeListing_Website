<x-layout>
  <script>
    function toggleOfficeSelection() {
      const selectOption = document.getElementById('office_select_option');
      const existingOfficeDiv = document.getElementById('existing_office_div');
      const newOfficeDiv = document.getElementById('new_office_div');

      if (selectOption.value === 'existing') {
        existingOfficeDiv.style.display = 'block';
        newOfficeDiv.style.display = 'none';
        document.getElementById('office_id').required = true;
        document.getElementById('new_office_name').required = false;
        document.getElementById('new_office_location').required = false;
        document.getElementById('new_office_description').required = false;
      } else {
        existingOfficeDiv.style.display = 'none';
        newOfficeDiv.style.display = 'block';
        document.getElementById('office_id').required = false;
        document.getElementById('new_office_name').required = true;
        document.getElementById('new_office_location').required = true;
        document.getElementById('new_office_description').required = true;
      }
    }
  </script>

  <form action="{{ route('internships.store') }}" method="POST">
    <!-- CSRF token for security -->
    @csrf

    <h2>Create a New Internship</h2>

    <!-- Position Title -->
    <label for="position">Position Title:</label>
    <input
      type="text"
      id="position"
      name="position"
      value="{{ old('position') }}"
      required
    >

    <!-- Position Description -->
    <label for="about">About the Position:</label>
    <textarea
      rows="5"
      id="about"
      name="about"
      required
    >{{ old('about') }}</textarea>

    <!-- Office Selection Type -->
    <label for="office_select_option">Office Selection:</label>
    <select id="office_select_option" name="office_select_option" onchange="toggleOfficeSelection()" required>
      <option value="" disabled selected>Choose an option</option>
      <option value="existing" {{ old('office_select_option') == 'existing' ? 'selected' : '' }}>Select existing office</option>
      <option value="new" {{ old('office_select_option') == 'new' ? 'selected' : '' }}>Create new office</option>
    </select>

    <!-- Existing Office Selection -->
    <div id="existing_office_div" style="display: {{ old('office_select_option') == 'new' ? 'none' : 'block' }};">
      <label for="office_id">Select Office:</label>
      <select id="office_id" name="office_id" {{ old('office_select_option') == 'new' ? '' : 'required' }}>
        <option value="" disabled selected>Select an office</option>
        @foreach ($offices as $office)
          <option value="{{ $office->id }}" {{ $office->id == old('office_id') ? 'selected' : '' }}>
            {{ $office->name }} - {{ $office->location }}
          </option>
        @endforeach
      </select>
    </div>

    <!-- New Office Creation -->
    <div id="new_office_div" style="display: {{ old('office_select_option') == 'new' ? 'block' : 'none' }};">
      <h3>Create New Office</h3>

      <label for="new_office_name">Office Name:</label>
      <input
        type="text"
        id="new_office_name"
        name="new_office_name"
        value="{{ old('new_office_name') }}"
        {{ old('office_select_option') == 'new' ? 'required' : '' }}
      >

      <label for="new_office_location">Office Location:</label>
      <input
        type="text"
        id="new_office_location"
        name="new_office_location"
        value="{{ old('new_office_location') }}"
        {{ old('office_select_option') == 'new' ? 'required' : '' }}
      >

      <label for="new_office_description">Office Description:</label>
      <textarea
        rows="3"
        id="new_office_description"
        name="new_office_description"
        {{ old('office_select_option') == 'new' ? 'required' : '' }}
      >{{ old('new_office_description') }}</textarea>
    </div>

    <button type="submit" class="btn mt-4">Create Internship</button>

    <!-- validation errors -->
    @if ($errors->any())
      <ul class="px-4 py-2 bg-red-100">
        @foreach ($errors->all() as $error)
          <li class="my-2 text-red-500">{{ $error }}</li>
        @endforeach
      </ul>
    @endif

  </form>
</x-layout>