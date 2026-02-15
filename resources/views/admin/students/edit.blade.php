<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <form action="{{ route('admin.students.update', $student) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name *
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                        required>
                    @error('name')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email *
                    </label>
                    <input type="email" name="email" id="email" value="{{ old('email', $student->email) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                        required>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                        Phone *
                    </label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $student->phone) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('phone') border-red-500 @enderror"
                        required>
                    @error('phone')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="academic_level_id">
                        Academic Level *
                    </label>
                    <select name="academic_level_id" id="academic_level_id"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('academic_level_id') border-red-500 @enderror"
                        required>
                        <option value="">Select Academic Level</option>
                        @foreach($academicLevels as $level)
                            <option value="{{ $level->id }}" {{ old('academic_level_id', $student->academic_level_id) == $level->id ? 'selected' : '' }}>
                                {{ $level->name_en }}
                            </option>
                        @endforeach
                    </select>
                    @error('academic_level_id')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                        Image
                    </label>
                    @if($student->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->name }}" class="w-32 h-32 object-cover rounded">
                        </div>
                    @endif
                    <input type="file" name="image" id="image" accept="image/*"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror">
                    @error('image')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Student
                    </button>
                    <a href="{{ route('admin.students.index') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>