<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Career Submissions') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Job Position</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Major</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($submissions as $submission)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $submission->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $submission->full_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $submission->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $submission->job_position }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $submission->major->name_en }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('admin.career-submissions.update-status', $submission) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()"
                                        class="text-xs rounded-full px-2 py-1 
                                        {{ $submission->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                        {{ $submission->status === 'reviewed' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $submission->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                                        <option value="pending" {{ $submission->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="reviewed" {{ $submission->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                        <option value="rejected" {{ $submission->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $submission->created_at->format('Y-m-d') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.career-submissions.show', $submission) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                                <a href="{{ route('admin.career-submissions.download-cv', $submission) }}" class="text-green-600 hover:text-green-900 mr-3">Download CV</a>
                                <form action="{{ route('admin.career-submissions.destroy', $submission) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500">No submissions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $submissions->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>