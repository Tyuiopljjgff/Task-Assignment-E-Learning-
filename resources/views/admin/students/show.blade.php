<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Student Details') }}
            </h2>
            <div>
                <a href="{{ route('admin.students.edit', $student) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Edit
                </a>
                <a href="{{ route('admin.students.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @if($student->image)
                    <div class="col-span-2">
                        <img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->name }}"
                            class="w-48 h-48 object-cover rounded">
                    </div>
                @endif

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Name</h3>
                    <p class="text-gray-600">{{ $student->name }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Email</h3>
                    <p class="text-gray-600">{{ $student->email }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Phone</h3>
                    <p class="text-gray-600">{{ $student->phone }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Academic Level</h3>
                    <p class="text-gray-600">{{ $student->academicLevel->name_en }} ({{ $student->academicLevel->name_ar }})</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Created At</h3>
                    <p class="text-gray-600">{{ $student->created_at->format('Y-m-d H:i') }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Updated At</h3>
                    <p class="text-gray-600">{{ $student->updated_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>