<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Testimonial') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="student_name_ar">
                            Student Name (Arabic) *
                        </label>
                        <input type="text" name="student_name_ar" id="student_name_ar" value="{{ old('student_name_ar') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('student_name_ar') border-red-500 @enderror"
                            required dir="rtl">
                        @error('student_name_ar')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="student_name_en">
                            Student Name (English) *
                        </label>
                        <input type="text" name="student_name_en" id="student_name_en" value="{{ old('student_name_en') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('student_name_en') border-red-500 @enderror"
                            required>
                        @error('student_name_en')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="course_ar">
                            Course (Arabic) *
                        </label>
                        <input type="text" name="course_ar" id="course_ar" value="{{ old('course_ar') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('course_ar') border-red-500 @enderror"
                            required dir="rtl">
                        @error('course_ar')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="course_en">
                            Course (English) *
                        </label>
                        <input type="text" name="course_en" id="course_en" value="{{ old('course_en') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('course_en') border-red-500 @enderror"
                            required>
                        @error('course_en')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="text_ar">
                        Testimonial Text (Arabic) *
                    </label>
                    <textarea name="text_ar" id="text_ar" rows="4"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('text_ar') border-red-500 @enderror"
                        required dir="rtl">{{ old('text_ar') }}</textarea>
                    @error('text_ar')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="text_en">
                        Testimonial Text (English) *
                    </label>
                    <textarea name="text_en" id="text_en" rows="4"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('text_en') border-red-500 @enderror"
                        required>{{ old('text_en') }}</textarea>
                    @error('text_en')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="color">
                            Color *
                        </label>
                        <select name="color" id="color"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('color') border-red-500 @enderror"
                            required>
                            <option value="">Select Color</option>
                            <option value="green" {{ old('color') == 'green' ? 'selected' : '' }}>Green</option>
                            <option value="orange" {{ old('color') == 'orange' ? 'selected' : '' }}>Orange</option>
                            <option value="blue" {{ old('color') == 'blue' ? 'selected' : '' }}>Blue</option>
                        </select>
                        @error('color')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                            Image
                        </label>
                        <input type="file" name="image" id="image" accept="image/*"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror">
                        @error('image')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-600">Active</span>
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Create Testimonial
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>