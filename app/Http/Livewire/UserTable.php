<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;
    public function render()
    {

        return view('livewire.user-table',['users'=>User::paginate(2)]);
    }
}
