<div class="container mx-auto p-4">
    <h2 class="text-lg font-bold mb-4">Attended Candidates</h2>

    <form wire:submit.prevent="filterCandidates" class="mb-4 flex items-center space-x-2">
        <label for="date" class="block text-gray-700 font-semibold">Select Date:</label>
        <input type="date" wire:model="date" class="border p-2 rounded-md" />
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition">
            Filter
        </button>
    </form>

    @if(empty($candidates) || count($candidates) === 0)
        <p class="text-gray-500">No candidates attended on this date.</p>
    @else
        <table class="w-full border-collapse border border-gray-300 mt-4">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Phone</th>
                    <th class="border border-gray-300 px-4 py-2">Interview Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidates as $candidate)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $candidate->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $candidate->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $candidate->phone }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $candidate->interview_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
