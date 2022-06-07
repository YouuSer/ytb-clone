<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 ">
            {{ __('Dernières vidéos') }}
        </h2>

    </x-slot>
    <router-view />
    <x-slot name="slot">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            {{-- Composant card vidéo à créer --}}
            @forelse ($videos as $video)
                <div class="bg-white max-w-sm rounded overflow-hidden shadow-lg hover:bg-gray-100 cursor-pointer">
                    <a href="{{ route('video.show', $video->id) }}">
                        <video class="w-full" src="{{ asset($video->path) }}"></video>
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2 capitalize">{{ $video->title }}</div>
                            <div class="flex items-center">
                                <x-user-icon />
                                <p class="ml-2 mb-1 font-semibold capitalize">{{ $video->user->name }}</p>
                            </div>

                            <div>
                                <p class="ml-10 text-gray-700">{{ $video->views }} vues -
                                    {{ $video->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div>Aucune vidéo</div>
            @endforelse

        </div>
    </x-slot>
</x-app-layout>
