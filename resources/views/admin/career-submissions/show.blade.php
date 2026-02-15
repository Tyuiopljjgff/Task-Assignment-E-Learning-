<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Career Submission Details') }}
            </h2>
            <div>
                <a href="{{ route('admin.career-submissions.download-cv', $careerSubmission) }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Download CV
                </a>
                <a href="{{ route('admin.career-submissions.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Full Name</h3>
                    <p class="text-gray-600">{{ $careerSubmission->full_name }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Email</h3>
                    <p class="text-gray-600">{{ $careerSubmission->email }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Phone</h3>
                    <p class="text-gray-600">{{ $careerSubmission->phone }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Job Position</h3>
                    <p class="text-gray-600">{{ $careerSubmission->job_position }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Years of Experience</h3>
                    <p class="text-gray-600">{{ $careerSubmission->years_experience }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Major</h3>
                    <p class="text-gray-600">{{ $careerSubmission->major->name_en }} ({{ $careerSubmission->major->name_ar }})</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Status</h3>
                    <p>
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $careerSubmission->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $careerSubmission->status === 'reviewed' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $careerSubmission->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                            {{ ucfirst($careerSubmission->status) }}
                        </span>
                    </p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">CV</h3>
                    <a href="{{ route('admin.career-submissions.download-cv', $careerSubmission) }}"
                        class="text-blue-600 hover:text-blue-800">
                        Download CV →
                    </a>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Submitted At</h3>
                    <p class="text-gray-600">{{ $careerSubmission->created_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>

            <div class="mt-6 pt-6 border-t">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Update Status</h3>
                <form action="{{ route('admin.career-submissions.update-status', $careerSubmission) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="flex items-center gap-4">
                        <select name="status" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="pending" {{ $careerSubmission->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="reviewed" {{ $careerSubmission->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                            <option value="rejected" {{ $careerSubmission->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Status
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>