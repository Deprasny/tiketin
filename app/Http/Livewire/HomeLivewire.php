<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Ticket;
use App\Train;
use App\Passanger;
use App\User;

class HomeLivewire extends Component
{
    public function render()
    {
        $tickets = Ticket::with('train')->get();
        $total = 0;
        foreach ($tickets as $ticket) {
            $total += $ticket->train->price;
        }

        $trains = Train::count();
        $passangers = Passanger::count();
        $users = User::count();
        return view('livewire.home-livewire', ['total' => $total, 'trains' => $trains, 'passangers' => $passangers, 'users' => $users]);
    }
}
