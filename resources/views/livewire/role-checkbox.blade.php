<div>
    @if ($user->role == 'admin')
        <div wire:click="changeRole({{ $user->id }},'user')">
            <input type="checkbox" checked>
        </div>
    @else
        <div wire:click="changeRole({{ $user->id }},'admin')">
            <input type="checkbox">
        </div>
    @endif
</div>
