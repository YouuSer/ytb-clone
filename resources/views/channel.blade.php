<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="max-w-5xl mx-auto bg-white rounded overflow-hidden shadow-lg hover:bg-gray-100">
            <h1 class="py-4 px-6 text-xl font-bold">Mes vidéos</h1>
            <table class="w-full px-4 text-center text-sm text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-4">Titre</th>
                        <th class="px-6 py-4">Date de publication</th>
                        <th class="px-6 py-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user->videos as $video)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-bold text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $video->title }}</td>
                            <td class="px-6 py-4">{{ $video->created_at->format('d-m-Y à H:i') }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route('video.destroy', $video->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button
                                        class="inline-flex items-center px-6 py-1 bg-red-400 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 disabled:opacity-25 transition ease-in-out duration-150">
                                        <svg version="1.1" width="17" height="17" viewBox="0 0 17 17">
                                            <g>
                                            </g>
                                            <path
                                                d="M10.935 2.016c-0.218-0.869-0.999-1.516-1.935-1.516-0.932 0-1.71 0.643-1.931 1.516h-3.569v1h11v-1h-3.565zM9 1.5c0.382 0 0.705 0.221 0.875 0.516h-1.733c0.172-0.303 0.485-0.516 0.858-0.516zM13 4h1v10.516c0 0.827-0.673 1.5-1.5 1.5h-7c-0.827 0-1.5-0.673-1.5-1.5v-10.516h1v10.516c0 0.275 0.224 0.5 0.5 0.5h7c0.276 0 0.5-0.225 0.5-0.5v-10.516zM8 5v8h-1v-8h1zM11 5v8h-1v-8h1z"
                                                fill="#fff" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="font-bold text-3xl">
                            <td></td>
                            <td class="py-4">Aucune video</td>
                            <td></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>
