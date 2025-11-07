<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Uploaded Files
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">Filename</th>
                        <th class="px-4 py-2 border">Records Imported</th>
                        <th class="px-4 py-2 border">Uploaded At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($uploads as $upload)
                        <tr>
                            <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border">{{ $upload->filename }}</td>
                            <td class="px-4 py-2 border text-center">{{ $upload->stock_prices_count }}</td>
                            <td class="px-4 py-2 border">{{ $upload->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">
                                No uploads yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
