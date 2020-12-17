<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Passanger;
use Illuminate\Support\Facades\Auth;

class PassangerLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $updateForm = true;

    public $id_passanger;
    public $no_identity;
    public $name;
    public $address;
    public $number;
    public $search;


    public function render()
    {

        if (isset($this->search)) {
            $passangers = Passanger::where('name', 'like', '%' . $this->search . '%')->paginate(4);
        } else {
            $passangers = Passanger::orderBy('id', 'DESC')->paginate(4);
        }
        return view('livewire.passanger-livewire', ['passangers' => $passangers]);
    }

    public function getPassanger($id)
    {
        $this->updateForm = false;

        $passanger = Passanger::find($id);
        $this->id_passanger = $passanger->id;
        $this->no_identity = $passanger->no_identity;
        $this->name = $passanger->name;
        $this->address = $passanger->address;
        $this->number = $passanger->number;
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'no_identity' => 'required|min:3',
            'name' => 'required',
            'address' => 'required',
            'number' => 'required',
        ]);
    }

    public function save()
    {
        $this->validate([
            'no_identity' => 'required|min:3',
            'name' => 'required',
            'address' => 'required',
            'number' => 'required',
        ]);

        Passanger::Create([
            'user_id' => Auth::user()->id,
            'no_identity' => $this->no_identity,
            'name' => $this->name,
            'address' => $this->address,
            'number' => $this->number,
        ]);
        $this->clear();
        session()->flash('save', 'Data successfully Created.');
    }

    public function update($id)
    {

        $validatedData = $this->validate([
            'no_identity' => 'required|min:3',
            'name' => 'required',
            'address' => 'required',
            'number' => 'required',
        ]);

        Passanger::find($id)->update($validatedData);
        $this->clear();
        session()->flash('update', 'Data successfully Updated.');
    }

    public function delete($id)
    {

        Passanger::destroy($id);
        session()->flash('delete', 'Data successfully Deleted.');
    }

    public function clear()
    {
        $this->id_passanger = '';
        $this->no_identity = '';
        $this->name = '';
        $this->address = '';
        $this->number = '';
        $this->updateForm = true;
    }
}
