<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Testimonial Details') }}
            </h2>
            <div>
                <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Edit
                </a>
                <a href="{{ route('admin.testimonials.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @if($testimonial->image)
                    <div class="col-span-2">
                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->student_name_en }}"
                            class="w-48 h-48 object-cover rounded">
                    </div>
                @endif

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Student Name (English)</h3>
                    <p class="text-gray-600">{{ $testimonial->student_name_en }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Student Name (Arabic)</h3>
                    <p class="text-gray-600" dir="rtl">{{ $testimonial->student_name_ar }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Course (English)</h3>
                    <p class="text-gray-600">{{ $testimonial->course_en }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Course (Arabic)</h3>
                    <p class="text-gray-600" dir="rtl">{{ $testimonial->course_ar }}</p>
                </div>

                <div class="col-span-2">
                    <h3 class="text-lg font-semibold text-gray-700">Testimonial (English)</h3>
                    <p class="text-gray-600">{{ $testimonial->text_en }}</p>
                </div>

                <div class="col-span-2">
                    <h3 class="text-lg font-semibold text-gray-700">Testimonial (Arabic)</h3>
                    <p class="text-gray-600" dir="rtl">{{ $testimonial->text_ar }}</p>
                </div>

               <div>
    <h3 class="text-lg font-semibold text-gray-700">Color</h3>

    @if($testimonial->color == 'green')
        <svg width="64" height="58" viewBox="0 0 64 58" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_5176_3926)">
                <path d="M0.512447 17.0434C0.512447 25.1881 6.26315 31.4662 15.2273 31.1269C14.3817 42.4954 5.58655 52.3368 -0.333252 56.9182L1.35815 59.4634C13.7051 51.6581 29.2658 35.5385 29.2658 18.9099C29.2658 9.40778 23.8534 2.45098 15.0582 2.45098C6.26315 2.45098 0.512447 9.23818 0.512447 17.0434ZM34.9133 17.0434C34.9133 25.1881 40.664 31.4662 49.6283 31.1269C48.7826 42.4954 39.9875 52.3368 34.0677 56.9182L35.759 59.4634C48.1061 51.6581 63.6667 35.5385 63.6667 18.9099C63.6667 9.40778 58.2544 2.45098 49.4592 2.45098C40.664 2.45098 34.9133 9.23818 34.9133 17.0434Z" fill="#66D86E"/>
            </g>
            <defs>
                <clipPath id="clip0_5176_3926">
                    <rect width="64" height="58" fill="white" transform="matrix(-1 0 0 -1 64 58)"/>
                </clipPath>
            </defs>
        </svg>
    @elseif($testimonial->color == 'orange')
        <svg width="64" height="58" viewBox="0 0 64 58" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_5176_3935)">
                <path d="M1.1792 17.0434C1.1792 25.1881 6.9299 31.4662 15.8941 31.1269C15.0485 42.4954 6.2533 52.3368 0.333496 56.9182L2.02489 59.4634C14.3719 51.6581 29.9326 35.5385 29.9326 18.9099C29.9326 9.40778 24.5202 2.45098 15.725 2.45098C6.92989 2.45098 1.1792 9.23818 1.1792 17.0434ZM35.5801 17.0434C35.5801 25.1881 41.3308 31.4662 50.2951 31.1269C49.4494 42.4954 40.6543 52.3368 34.7345 56.9182L36.4258 59.4634C48.7729 51.6581 64.3335 35.5385 64.3335 18.9099C64.3335 9.40778 58.9211 2.45098 50.126 2.45098C41.3308 2.45098 35.5801 9.23818 35.5801 17.0434Z" fill="#FD9A33"/>
            </g>
            <defs>
                <clipPath id="clip0_5176_3935">
                    <rect width="64" height="58" fill="white" transform="matrix(-1 0 0 -1 64 58)"/>
                </clipPath>
            </defs>
        </svg>
    @else
        <svg width="64" height="58" viewBox="0 0 64 58" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_5176_3944)">
                <path d="M0.845943 17.0434C0.845943 25.1881 6.59665 31.4662 15.5608 31.1269C14.7152 42.4954 5.92004 52.3368 0.000244141 56.9182L1.69164 59.4634C14.0386 51.6581 29.5993 35.5385 29.5993 18.9099C29.5993 9.40778 24.1869 2.45098 15.3917 2.45098C6.59664 2.45098 0.845943 9.23818 0.845943 17.0434ZM35.2468 17.0434C35.2468 25.1881 40.9975 31.4662 49.9618 31.1269C49.1161 42.4954 40.321 52.3368 34.4012 56.9182L36.0925 59.4634C48.4396 51.6581 64.0002 35.5385 64.0002 18.9099C64.0002 9.40778 58.5879 2.45098 49.7927 2.45098C40.9975 2.45098 35.2468 9.23818 35.2468 17.0434Z" fill="#1396FD"/>
            </g>
            <defs>
                <clipPath id="clip0_5176_3944">
                    <rect width="64" height="58" fill="white" transform="matrix(-1 0 0 -1 64 58)"/>
                </clipPath>
            </defs>
        </svg>
    @endif
</div>


                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Status</h3>
                    <p>
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $testimonial->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Created At</h3>
                    <p class="text-gray-600">{{ $testimonial->created_at->format('Y-m-d H:i') }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Updated At</h3>
                    <p class="text-gray-600">{{ $testimonial->updated_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>