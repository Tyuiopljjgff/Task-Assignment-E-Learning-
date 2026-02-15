<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit News') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title_ar">
                            Title (Arabic) *
                        </label>
                        <input type="text" name="title_ar" id="title_ar" value="{{ old('title_ar', $news->title_ar) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title_ar') border-red-500 @enderror"
                            required dir="rtl">
                        @error('title_ar')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title_en">
                            Title (English) *
                        </label>
                        <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $news->title_en) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title_en') border-red-500 @enderror"
                            required>
                        @error('title_en')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description_ar">
                        Description (Arabic) *
                    </label>
                    <textarea name="description_ar" id="description_ar" rows="4"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description_ar') border-red-500 @enderror"
                        required dir="rtl">{{ old('description_ar', $news->description_ar) }}</textarea>
                    @error('description_ar')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description_en">
                        Description (English) *
                    </label>
                    <textarea name="description_en" id="description_en" rows="4"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description_en') border-red-500 @enderror"
                        required>{{ old('description_en', $news->description_en) }}</textarea>
                    @error('description_en')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="date">
                            Date *
                        </label>
                        <input type="date" name="date" id="date" value="{{ old('date', $news->date->format('Y-m-d')) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('date') border-red-500 @enderror"
                            required>
                        @error('date')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                            Image
                        </label>
                        @if($news->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title_en }}" class="w-32 h-32 object-cover rounded">
                            </div>
                        @endif
                        <input type="file" name="image" id="image" accept="image/*"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror">
                        @error('image')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $news->is_active) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-600">Active</span>
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update News
                    </button>
                    <a href="{{ route('admin.news.index') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>