<div>
    <div class="row">

        <div class="col-lg-4 order-lg-2">

            <div class="card shadow mb-4">
                <button wire:click.prevent="clear()" class="btn btn-primary">Clear</button>
                <div class="card-body">
                    <form @if($updateForm) wire:submit.prevent="save" @else wire:submit.prevent="update({{ $id_passanger }})" @endif>

                         <input wire:model="id_passanger" type="hidden">
                          <div class="form-group">
                            <label>No Identity</label>
                            <input wire:model="no_identity" type="text" class="form-control">
                            @error('no_identity') <div class="text-danger">{{ $message }}</div> @enderror
                          </div>
                          <div class="form-group">
                            <label>Name</label>
                            <input wire:model="name" type="text" class="form-control">
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                          </div>
                          <div class="form-group">
                            <label>Address</label>
                            <input wire:model="address" type="text" class="form-control">
                            @error('address') <div class="text-danger">{{ $message }}</div> @enderror
                          </div>
                          <div class="form-group">
                            <label>Number</label>
                            <input wire:model="number" type="text" class="form-control">
                            @error('number') <div class="text-danger">{{ $message }}</div> @enderror
                          </div>
                        <button type="submit" class="btn btn-primary float-right">Submit <i class="fa fa-mouse-pointer" aria-hidden="true"></i></button>
                      </form>
                </div>
            </div>

        </div>

        <div class="col-lg-8 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List</h6>
                </div>

                <div class="card-body">
                    @if ($message = Session::get('delete'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
            @elseif($message = Session::get('save'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
            @elseif($message = Session::get('update'))
                <div class="alert alert-primary alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>        
            @endif
                    <div class="card-header">
                        <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input wire:model.debounce.500ms="search" type="search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table table-hover table-md">
                            <tr>
                              <th>#</th>
                              <th>No Identity</th>
                              <th>Name</th>
                              <th>Address</th>
                              <th>Number</th>
                              <th>Action</th>
                            </tr>
                            @if($passangers->count() > 0)
                            @foreach($passangers as $passanger)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $passanger->no_identity }}</td>
                              <td>{{ $passanger->name }}</td>
                              <td>{{ $passanger->address }}</td>
                              <td>{{ $passanger->number }}</td>
                              <td>
                                  <button wire:click.prevent="getPassanger({{ $passanger->id }})" type="button" class="btn btn-secondary btn-warning btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                  <button wire:click.prevent="delete({{ $passanger->id }})" type="button" class="btn btn-secondary btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                              </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                              <td colspan="6" align="center">
                                <p class="alert-danger">Empty</p>
                              </td>
                            </tr>
                            @endif
                          </table>
                          {{ $passangers->links() }}
                        </div>
                      </div>
                      

                </div>

            </div>

        </div>

    </div>

    <div class="row">

      <div class="col-lg-12 order-lg-1">

          <div class="card shadow mb-4">

              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">List Ticket</h6>
              </div>

              <div class="card-body">
                 
                  <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-hover table-md">
                          <tr>
                            <th>#</th>
                              <th>Code Booking</th>
                              <th>Date</th>
                              <th>Passanger</th>
                              <th>Train</th>
                              <th>From</th>
                              <th>To</th>
                              <th>Departure</th>
                              <th>Arrival</th>
                              <th>Price</th>
                          </tr>
                          @if($tickets->count() > 0)
                          @foreach($tickets as $ticket)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                              <td>{{ $ticket->code_booking }}</td>
                              <td>{{ $ticket->date }}</td>
                              <td>{{ $ticket->passanger->name }}</td>
                              <td>{{ $ticket->train->name }}</td>
                              <td>@foreach($stations as $station)@if($ticket->train->from == $station->id){{ $station->station_name }}@endif @endforeach</td>
                              <td>@foreach($stations as $station)@if($ticket->train->to == $station->id){{ $station->station_name }}@endif @endforeach</td>
                              <td>{{ date('h:i A', strtotime($ticket->train->departure)) }}</td>
                              <td>{{ date('h:i A', strtotime($ticket->train->arrival)) }}</td>
                              <td>Rp. {{ $ticket->train->price }}</td>
                          </tr>
                          @endforeach
                          @else
                          <tr>
                            <td colspan="10" align="center">
                              <p class="alert-danger">Empty</p>
                            </td>
                          </tr>
                          @endif
                        </table>
                      </div>
                    </div>
                    

              </div>

          </div>

      </div>

  </div>
</div>
