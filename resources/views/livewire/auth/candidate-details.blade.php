<div class="container mx-auto p-4">
    <h2 class="text-lg font-bold mb-4">Candidate Details</h2>

    @if($candidate)
        <table class="w-full border-collapse border border-gray-300">
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 font-semibold">Name:</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $candidate->name }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 font-semibold">Email:</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $candidate->email }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 font-semibold">Phone:</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $candidate->phone }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 font-semibold">Interview Date:</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $candidate->interview_date }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 font-semibold">Status:</td>
                    <td class="border border-gray-300 px-4 py-2">{{ ucfirst($candidate->status) }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <p class="text-gray-500">Candidate not found.</p>
    @endif
</div>
