<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Academic Level Details') }}
            </h2>
            <div>
                <a href="{{ route('admin.academic-levels.edit', $academicLevel) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Edit
                </a>
                <a href="{{ route('admin.academic-levels.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              @if($academicLevel->icon)
    <div class="col-span-2">
        <img src="{{ Storage::disk('public')->url($academicLevel->icon) }}" 
             alt="{{ $academicLevel->name_ar ?? $academicLevel->name_en }}"
             class="w-full max-w-md object-cover rounded">
    </div>
@endif


                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Status</h3>
                    <p>
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $academicLevel->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $academicLevel->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Name (Arabic)</h3>
                    <p class="text-gray-600" dir="rtl">{{ $academicLevel->name_ar }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Name (English)</h3>
                    <p class="text-gray-600">{{ $academicLevel->name_en }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Number of Students</h3>
                    <p class="text-gray-600">{{ $academicLevel->students->count() }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Created At</h3>
                    <p class="text-gray-600">{{ $academicLevel->created_at->format('Y-m-d H:i') }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Updated At</h3>
                    <p class="text-gray-600">{{ $academicLevel->updated_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
