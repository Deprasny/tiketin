<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Ticket;
use App\Passanger;
use App\Train;
use App\Station;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BuyticketLivewire extends Component
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
    public $name;
    public $search;
    public $searchFrom;
    public $searchTo;

    public function render()
    {
        $passangers = Passanger::where('user_id', Auth::user()->id)->get();
        $stations = Station::all();
        if (isset($this->searchFrom) && isset($this->searchTo)) {
            $getidFrom = Station::where('station_name', 'like', '%' . $this->searchFrom . '%')->first()->id;
            $getidTo = Station::where('station_name', 'like', '%' . $this->searchTo . '%')->first()->id;
            $trains = Train::where('from', $getidFrom)
                ->where('to', $getidTo)->paginate(5);
        } elseif (isset($this->search) || isset($this->searchFrom) && isset($this->searchTo)) {
            $trains = Train::where('name', 'like', '%' . $this->search . '%')->paginate(5);
        } else {
            $trains = Train::orderBy('id', 'DESC')->paginate(5);
        }
        return view('livewire.buyticket-livewire', ['passangers' => $passangers, 'stations' => $stations,  'trains' => $trains]);
    }

    public function getTrain($id)
    {
        $train = Train::find($id);
        $this->id_train = $train->id;
        $this->train_id = $train->id;
        $this->name = $train->name;
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
        session()->flash('save', 'Ticket successfully Created.');
    }

    public function clear()
    {
        $this->passanger_id = '';
        $this->name = '';
        $this->train_id = '';
        $this->date = '';
        $this->seat = '';
    }
}
