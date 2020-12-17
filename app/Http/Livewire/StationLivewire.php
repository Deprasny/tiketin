<?php

namespace App\Http\Livewire;

use App\Station;
use Livewire\Component;
use Livewire\WithPagination;

class StationLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $updateForm = true;

    public $id_station;
    public $station_name;
    public $class;
    public $search;


    public function render()
    {

        if (isset($this->search)) {
            $stations = Station::where('station_name', 'like', '%' . $this->search . '%')->paginate(4);
        } else {
            $stations = Station::orderBy('id', 'DESC')->paginate(4);
        }
        return view('livewire.station-livewire', ['stations' => $stations]);
    }

    public function getStation($id)
    {
        $this->updateForm = false;

        $station = Station::find($id);
        $this->id_station = $station->id;
        $this->station_name = $station->station_name;
        $this->class = $station->class;
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'station_name' => 'required|min:3',
            'class' => 'required',
        ]);
    }

    public function save()
    {
        $validatedData = $this->validate([
            'station_name' => 'required|min:3',
            'class' => 'required',
        ]);

        Station::Create($validatedData);
        $this->clear();
        session()->flash('save', 'Data successfully Created.');
    }

    public function update($id)
    {

        $validatedData = $this->validate([
            'station_name' => 'required|min:3',
            'class' => 'required',
        ]);

        Station::find($id)->update($validatedData);
        $this->clear();
        session()->flash('update', 'Data successfully Updated.');
    }

    public function delete($id)
    {

        Station::destroy($id);
        session()->flash('delete', 'Data successfully Deleted.');
    }

    public function clear()
    {
        $this->id_station = "";
        $this->station_name = "";
        $this->class = "";
        $this->updateForm = true;
    }
}
