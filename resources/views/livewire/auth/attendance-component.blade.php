<div>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white px-4 py-2 rounded-md mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div id="attendanceModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-lg font-semibold mb-4">{{ $modalTitle }}</h2>

            <label class="block mb-2">{{ $timeLabel }}</label>
            <input type="datetime-local" wire:model="time" class="w-full p-2 border border-gray-300 rounded mb-4">

            <div class="flex justify-end">
                <button wire:click="$emit('hideModal')" class="bg-gray-400 text-white px-4 py-2 rounded mr-2">Cancel</button>
                <button wire:click="markTime" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Submit</button>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('show-modal', () => {
            document.getElementById('attendanceModal').classList.remove('hidden');
        });

        window.addEventListener('hide-modal', () => {
            document.getElementById('attendanceModal').classList.add('hidden');
        });
    </script>
</div>
