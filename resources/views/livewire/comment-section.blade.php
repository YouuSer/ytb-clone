<div>
    @auth
        <form wire:submit.prevent="saveComment">
            @method('POST')
            @csrf
            <input type="hidden" wire:model="video_id" name="video_id" id="video_id" value="{{ $video_id }}">
            <input type="hidden" wire:model="user_id" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
            <div class="flex">
                <input
                    class="py-6 px-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block my-1 w-10/12 resize-none"
                    type="text" wire:model="content" name="content" id="content"
                    placeholder="Ajouter un commentaire"></input>
                <button type="submit"
                    class="w-1/6 my-1 ml-1 bg-gray-700 rounded-lg text-gray-100 font-semibold">Ajouter</button>
            </div>
        </form>
        @error('content')
            <span class="font-bold text-red-500">Veuillez saisir un commentaire</span>
        @enderror
    @else
        <div class="font-bold text-gray-600"><a href="{{ route('login') }}" class="text-blue-600">Connectez-vous</a> pour
            écrire un
            commentaire.</div>
        <hr>
    @endauth
    @forelse ($comments->sortByDesc('created_at') as $comment)
        <div class="flex mt-8">
            <div class="w-8 mr-4">
                <x-user-icon />
            </div>
            <div class="w-2/3">
                <span class="font-bold capitalize">{{ $comment->user->name }}</span>
                <p>{{ $comment->content }}</p>
            </div>
            <div class="ml-auto text-gray-700">{{ $comment->created_at->diffForHumans() }}</div>
            @auth
                @if (Auth::user()->role == 'admin' or Auth::user()->id == $comment->user_id or Auth::user()->id == $comment->video->user->id)
                    <div class="ml-4 cursor-pointer" wire:click="deleteComment({{ $comment->id }})">
                        <svg class="fill-red-500 hover:fill-red-600" x="0px" y="0px" width="24px" height="24px"
                            viewBox="0 0 92 92" enable-background="new 0 0 92 92" xml:space="preserve">
                            <path id="XMLID_732_" d="M70.7,64.3c1.8,1.8,1.8,4.6,0,6.4c-0.9,0.9-2,1.3-3.2,1.3c-1.2,0-2.3-0.4-3.2-1.3L46,52.4L27.7,70.7
         c-0.9,0.9-2,1.3-3.2,1.3s-2.3-0.4-3.2-1.3c-1.8-1.8-1.8-4.6,0-6.4L39.6,46L21.3,27.7c-1.8-1.8-1.8-4.6,0-6.4c1.8-1.8,4.6-1.8,6.4,0
         L46,39.6l18.3-18.3c1.8-1.8,4.6-1.8,6.4,0c1.8,1.8,1.8,4.6,0,6.4L52.4,46L70.7,64.3z" />
                        </svg>
                    </div>
                @endif
            @endauth
        </div>
        <hr class="my-6">
    @empty
        <hr class="my-6">
        <div class="ml-2">Pas de commentaires</div>
        <hr class="my-6">
    @endforelse
</div>
