<div>
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white p-3 rounded-md mb-4">
            {{ session('error') }}
        </div>
    @endif
    <div class="overflow-x-auto">
        <a href="{{ route('candidate-form') }}" class="float-right bg-blue-500 mb-4 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition">
            Add Candidate
        </a>

        <table id="candidatesTable" class="display w-full border-collapse border border-gray-300 mt-5">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Phone</th>
                    <th class="border border-gray-300 px-4 py-2">Interview Date</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidates as $candidate)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $candidate->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $candidate->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $candidate->phone }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $candidate->interview_date }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ ucfirst($candidate->status) }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            @if($candidate->status === 'pending')
                                <form action="{{ route('attendance.checkin', $candidate->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="submit" value="Check-in"
                                        class="bg-green-500 text-white px-2 py-1 rounded-md shadow-md hover:bg-green-600 transition cursor-pointer" />
                                </form>
                                <form method="POST" action="{{ route('attendance.absent', $candidate->id) }}" style="display: inline;">
                                    @csrf
                                    <input type="submit" value="Absent"
                                        class="bg-red-500 text-white px-2 py-1 rounded-md shadow-md hover:bg-red-600 transition cursor-pointer" />
                                </form>
                            @elseif($candidate->status === 'attended')
                                <form action="{{ route('attendance.checkout', $candidate->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="submit" value="Check-out"
                                        class="bg-yellow-500 text-white px-2 py-1 rounded-md shadow-md hover:bg-yellow-600 transition cursor-pointer" />
                                </form>
                            @endif


                            <a class="bg-blue-800 text-white px-2 py-1 rounded-md shadow-md hover:bg-blue-600 transition cursor-pointer"
                                href="{{ route('candidate.details', ['candidateId' => $candidate->id]) }}">
                                Details
                                </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script>
    $(document).ready(function() {
        $('#candidatesTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                { extend: 'copy', text: 'Copy' },
                { extend: 'csv', text: 'CSV' },
                { extend: 'excel', text: 'Excel' },
                { extend: 'pdf', text: 'PDF' },
                { extend: 'print', text: 'Print' }
            ]
        });
    });
</script>
