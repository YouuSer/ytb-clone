<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class RoleCheckbox extends Component
{
    public $user;

    public function changeRole($user, $role)
    {
        abort_if(Auth::user()->role !== 'admin', 404);

        User::where('id', $user)->update(['role' => $role]);
    }

    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.role-checkbox');
    }
}
