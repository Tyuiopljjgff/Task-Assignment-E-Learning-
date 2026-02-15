<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('News Details') }}
            </h2>
            <div>
                <a href="{{ route('admin.news.edit', $news) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Edit
                </a>
                <a href="{{ route('admin.news.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @if($news->image)
                    <div class="col-span-2">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title_en }}"
                            class="w-full max-w-md object-cover rounded">
                    </div>
                @endif

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Title (English)</h3>
                    <p class="text-gray-600">{{ $news->title_en }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Title (Arabic)</h3>
                    <p class="text-gray-600" dir="rtl">{{ $news->title_ar }}</p>
                </div>

                <div class="col-span-2">
                    <h3 class="text-lg font-semibold text-gray-700">Description (English)</h3>
                    <p class="text-gray-600">{{ $news->description_en }}</p>
                </div>

                <div class="col-span-2">
                    <h3 class="text-lg font-semibold text-gray-700">Description (Arabic)</h3>
                    <p class="text-gray-600" dir="rtl">{{ $news->description_ar }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Date</h3>
                    <p class="text-gray-600">{{ $news->date->format('Y-m-d') }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Status</h3>
                    <p>
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $news->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $news->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Created At</h3>
                    <p class="text-gray-600">{{ $news->created_at->format('Y-m-d H:i') }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Updated At</h3>
                    <p class="text-gray-600">{{ $news->updated_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>