<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' .$this->search. '%')
        ->orwhere('email', 'LIKE', '%' .$this->search. '%')
        ->paginate(10);

        return view('livewire.admin.user-index', compact('users'));
    }
}
