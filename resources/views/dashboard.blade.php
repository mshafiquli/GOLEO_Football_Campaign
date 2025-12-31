<x-app-layout>
    @php
        // Fetch paginated votes, 10 per page
        $votes = \App\Models\Vote::orderBy('created_at', 'desc')->paginate(10);
    @endphp

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if ($votes->count() > 0)
                        <table class="min-w-full border border-gray-300 table-auto dark:border-gray-600">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 border-b dark:border-gray-600">Sl</th>
                                    <th class="px-4 py-2 border-b dark:border-gray-600">User (Phone/Email)</th>
                                    <th class="px-4 py-2 border-b dark:border-gray-600">Team Voted</th>
                                    <th class="px-4 py-2 border-b dark:border-gray-600">Timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($votes as $vote)
                                    <tr class="text-center border-b dark:border-gray-600">
                                        <td class="px-4 py-2">{{ $loop->iteration + ($votes->currentPage() - 1) * $votes->perPage() }}</td>
                                        <td class="px-4 py-2">{{ $vote->phone ?? $vote->email ?? 'N/A' }}</td>
                                        <td class="px-4 py-2">{{ $vote->team_name }}</td>
                                        <td class="px-4 py-2">{{ $vote->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination links -->
                        <div class="mt-4">
                            {{ $votes->links() }}
                        </div>
                    @else
                        <p class="text-center text-gray-500 dark:text-gray-400">No votes found.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
