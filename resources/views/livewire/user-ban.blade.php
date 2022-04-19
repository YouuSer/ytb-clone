<div>

    <form wire:submit.prevent="ban" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="user_id" wire:model="user_id" value="{{ $user->id }}">
        <input type="hidden" name="status" wire:model="status" value="{{ $user->status }}">
        <button type="submit"
            class="inline-flex items-center px-6 py-1 cursor-pointer disabled:opacity-25 transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                class="{{ $user->status ? 'fill-red-700' : 'fill-green-700' }}">
                <path fill="none" d="M0 0h24v24H0V0z" />
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11H7v-2h10v2z" />
            </svg>
        </button>
    </form>

</div>
