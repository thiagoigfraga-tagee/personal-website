<?php

namespace App\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public $visible = true;
    public $message;
    public $type = 'info'; // info, success, warning, error

    public function mount($message = '', $type = 'info')
    {
        $this->message = $message;
        $this->type = $type;
    }

    public function close()
    {
        $this->visible = false;
    }

    public function render()
    {
        return view('livewire.alert');
    }
}
