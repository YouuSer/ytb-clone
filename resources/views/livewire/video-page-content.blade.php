<div>

    <x-slot name="header">
        <div class="flex w-9/12">
            <h2 class="font-bold text-3xl text-gray-800 capitalize">
                {{ __($video->title) }}
            </h2>
            @auth
                @if (Auth::user()->role == 'admin' or Auth::user()->id == $video->user->id)
                    <form action="{{ route('video.destroy', $video->id) }}" method="POST" class="ml-auto mr-16">
                        @method('DELETE')
                        @csrf
                        <button class="bg-rose-600 hover:bg-rose-700 px-4 py-2 rounded-lg">
                            <svg version="1.1" width="17" height="17" viewBox="0 0 17 17">
                                <g>
                                </g>
                                <path
                                    d="M10.935 2.016c-0.218-0.869-0.999-1.516-1.935-1.516-0.932 0-1.71 0.643-1.931 1.516h-3.569v1h11v-1h-3.565zM9 1.5c0.382 0 0.705 0.221 0.875 0.516h-1.733c0.172-0.303 0.485-0.516 0.858-0.516zM13 4h1v10.516c0 0.827-0.673 1.5-1.5 1.5h-7c-0.827 0-1.5-0.673-1.5-1.5v-10.516h1v10.516c0 0.275 0.224 0.5 0.5 0.5h7c0.276 0 0.5-0.225 0.5-0.5v-10.516zM8 5v8h-1v-8h1zM11 5v8h-1v-8h1z"
                                    fill="#fff" />
                            </svg>
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </x-slot>
    <main>
        <div class="flex">
            <div class="w-9/12 mr-20">
                <div>
                    <video width="100%" controls poster autoplay src="{{ asset($video->path) }}"></video>
                    <div class="flex mt-4">
                        <div>
                            <p>{{ $video->views }}
                                @if ($video->views > 1)
                                    <span>vues</span>
                                @else
                                    <span>vue</span>
                                @endif
                                - {{ $video->created_at->format('d-m-Y') }}
                            </p>
                            <div class="flex mt-4 bg-white rounded-lg px-4 py-2 shadow-md cursor-pointer">
                                <x-user-icon />
                                <p class="ml-4 mt-1 font-bold capitalize">{{ $video->user->name }}</p>
                            </div>
                        </div>
                        @auth
                            <x-like-dislike-buttons :video="$video" />
                        @endauth
                    </div>
                </div>
                <hr class="my-6">
                <div>
                    <livewire:comment-section :videoId="$video->id" />
                </div>
            </div>
            <div>
                <livewire:other-videos :videoId="$video->id" />
            </div>
        </div>
    </main>

</div>
