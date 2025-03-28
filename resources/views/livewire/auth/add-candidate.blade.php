<div>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Add Candidate</h2>

        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="store">
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" wire:model="name" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" wire:model="email" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Phone</label>
                <input type="text" wire:model="phone" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" placeholder="+1231434">
                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Interview Date</label>
                <input type="date" wire:model="interview_date" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('interview_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('all-candidates') }}" class="bg-gray-300 px-4 py-2 rounded-lg mr-2">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">Save</button>
            </div>
        </form>
    </div>
</div>
