<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserBan extends Component
{
    public $user;

    public function ban()
    {
        abort_if(Auth::user()->role !== 'admin', 404);
        $user = User::find($this->user->id);
        $user->status = !$this->user->status;
        $user->save();
    }

    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.user-ban');
    }
}
