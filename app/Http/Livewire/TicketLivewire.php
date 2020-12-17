<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Ticket;
use App\Passanger;
use App\Train;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TicketLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $updateForm = true;

    public $id_ticket;
    public $code_booking;
    public $passanger_id;
    public $train_id;
    public $date;
    public $seat;
    public $search;


    public function render()
    {
        $passangers = Passanger::all();
        $trains = Train::all();

        if ($this->search) {
            $tickets = Ticket::where('code_booking', '=', $this->search)->paginate(4);
        } else {
            $tickets = Ticket::orderBy('id', 'DESC')->paginate(4);
        }
        return view('livewire.ticket-livewire', ['tickets' => $tickets, 'passangers' => $passangers, 'trains' => $trains]);
    }

    public function getTicket($id)
    {
        $this->updateForm = false;

        $ticket = Ticket::find($id);
        $this->id_ticket = $ticket->id;
        $this->code_booking = $ticket->code_booking;
        $this->passanger_id = $ticket->passanger_id;
        $this->train_id = $ticket->train_id;
        $this->date = $ticket->date;
        $this->seat = $ticket->seat;
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'passanger_id' => 'required',
            'train_id' => 'required',
            'date' => 'required',
            'seat' => 'required',
        ]);
    }

    public function save()
    {
        $this->validate([
            'passanger_id' => 'required',
            'train_id' => 'required',
            'date' => 'required',
            'seat' => 'required',
        ]);

        Ticket::Create([
            'code_booking' => Str::random(6),
            'user_id' => Auth::user()->id,
            'passanger_id' => $this->passanger_id,
            'train_id' => $this->train_id,
            'date' => $this->date,
            'seat' => $this->seat,
        ]);
        $train = Train::where('id', $this->train_id)->first();
        $train->qty = $train->qty - 1;
        $train->update();
        $this->clear();
        session()->flash('save', 'Data successfully Created.');
    }

    public function update($id)
    {

        $validatedData = $this->validate([
            'passanger_id' => 'required',
            'train_id' => 'required',
            'date' => 'required',
            'seat' => 'required',
        ]);

        Ticket::find($id)->update($validatedData);
        $this->clear();
        session()->flash('update', 'Data successfully Updated.');
    }

    public function delete($id)
    {

        Ticket::destroy($id);
        session()->flash('delete', 'Data successfully Deleted.');
    }

    public function clear()
    {
        $this->id_ticket = '';
        $this->code_booking = '';
        $this->passanger_id = '';
        $this->train_id = '';
        $this->date = '';
        $this->seat = '';
        $this->updateForm = true;
    }
}
