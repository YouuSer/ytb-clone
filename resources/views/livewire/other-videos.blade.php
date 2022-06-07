<div>
    <div class="font-bold text-gray-800 uppercase text-sm">Autres vidéos</div>
    @forelse ($videos as $video)
        <div class="w-72 mt-4 mb-2">
            <a href="{{ route('video.show', $video->id) }}">
                <video poster src="{{ asset($video->path) }}"></video>
                <div class="font-semibold text-gray-800 mt-1">{{ $video->title }}</div>
            </a>
        </div>
    @empty
        <div class="mt-4">
            Aucune vidéo.
        </div>
    @endforelse
</div>
