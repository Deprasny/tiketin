<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Train;
use App\Station;
use NunoMaduro\Collision\Adapters\Phpunit\State;


class TrainLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $updateForm = true;

    public $id_train;
    public $name;
    public $departure;
    public $arrival;
    public $from;
    public $to;
    public $price;
    public $qty;
    public $station;


    public $search;


    public function render()
    {
        $stations = Station::all();

        if (isset($this->search)) {
            $trains = Train::where('name', 'like', '%' . $this->search . '%')->paginate(5);
        } else {
            $trains = Train::orderBy('id', 'DESC')->paginate(5);
        }
        return view('livewire.train-livewire', ['trains' => $trains, 'stations' => $stations]);
    }

    public function getTrain($id)
    {
        $this->updateForm = false;

        $train = Train::find($id);
        $this->id_train = $train->id;
        $this->name = $train->name;
        $this->departure = $train->departure;
        $this->arrival = $train->arrival;
        $this->from = $train->from;
        $this->to = $train->to;
        $this->price = $train->price;
        $this->qty = $train->qty;
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required|min:3',
            'departure' => 'required',
            'arrival' => 'required',
            'from' => 'required|different:to',
            'to' => 'required|different:from',
            'price' => 'required',
            'qty' => 'required',
        ]);
    }

    public function save()
    {
        $validatedData = $this->validate([
            'name' => 'required|min:3',
            'departure' => 'required',
            'arrival' => 'required',
            'from' => 'required|different:to',
            'to' => 'required|different:from',
            'price' => 'required',
            'qty' => 'required',
        ]);

        Train::Create($validatedData);
        $this->clear();
        session()->flash('save', 'Data successfully Created.');
    }

    public function update($id)
    {

        $validatedData = $this->validate([
            'name' => 'required|min:3',
            'departure' => 'required',
            'arrival' => 'required',
            'from' => 'required|different:to',
            'to' => 'required|different:from',
            'price' => 'required',
            'qty' => 'required',
        ]);

        Train::find($id)->update($validatedData);
        $this->clear();
        session()->flash('update', 'Data successfully Updated.');
    }

    public function delete($id)
    {

        Train::destroy($id);
        session()->flash('delete', 'Data successfully Deleted.');
    }

    public function clear()
    {
        $this->id_train = '';
        $this->name = '';
        $this->departure = '';
        $this->arrival = '';
        $this->from = '';
        $this->to = '';
        $this->price = '';
        $this->qty = '';
        $this->updateForm = true;
    }
}
