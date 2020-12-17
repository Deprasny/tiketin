<div>
    <div class="row">

        <div class="col-lg-4 order-lg-2">

            <div class="card shadow mb-4">
                <button wire:click.prevent="clear()" class="btn btn-primary">Clear</button>
                <div class="card-body">
                    <form @if($updateForm) wire:submit.prevent="save" @else wire:submit.prevent="update({{ $id_ticket }})" @endif>

                         <input wire:model="id_ticket" type="hidden">
                         @if($updateForm)
                         @else 
                         <div class="form-group">
                            <label>Code Booking</label>
                            <input wire:model="code_booking" type="text" class="form-control" disabled>
                         </div>
                         @endif
                          <div class="form-group">
                            <label>Passanger</label>
                            <select wire:model="passanger_id" class="form-control" name="" id="select2pass">
                                <option value="">select</option>
                                @foreach($passangers as $passanger)
                                <option value="{{ $passanger->id }}">
                                {{ $passanger->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('passanger_id') <div class="text-danger">{{ $message }}</div> @enderror
                          </div>
                          <div class="form-group">
                            <label>Train</label>
                            <div wire:ignore>
                              <select wire:model="train_id" class="custom-select" name="" id="select2train">
                                <option value="">Select Train</option>
                                @foreach($trains as $trains)
                                <option value="{{ $trains->id }}">
                                  {{ $trains->name }}
                                </option>
                                @endforeach
                              </select>
                            </div>
                            
                            @error('train_id') <div class="text-danger">{{ $message }}</div> @enderror
                            @push('scripts')
                                            <script>
                                                $(document).ready(function() {
                                                    $('#select2train').select2();
                                                    $('#select2train').on('change', function (e) {
                                                      @this.set('train_id', e.target.value);
                                                    });
                                                });
                                            </script>
                                            @endpush
                          </div>
                          <div class="form-group">
                            <label>Date</label>
                            <input wire:model="date" type="date" class="form-control">
                            @error('date') <div class="text-danger">{{ $message }}</div> @enderror
                          </div>
                          <div class="form-group">
                            <label>Seat</label>
                            <input wire:model="seat" type="text" class="form-control">
                            @error('seat') <div class="text-danger">{{ $message }}</div> @enderror
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
                              <th>Code Booking</th>
                              <th>Date</th>
                              <th>Passanger</th>
                              <th>Train</th>
                              <th>Created At</th>
                              <th>Action</th>
                            </tr>
                            @if($tickets->count() > 0)
                            @foreach($tickets as $ticket)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $ticket->code_booking }}</td>
                              <td>{{ $ticket->date }}</td>
                              <td>{{ $ticket->passanger->name }}</td>
                              <td>{{ $ticket->train->name }}</td>
                              <td>{{ $ticket->created_at->diffForHumans() }}</td>
                              <td>
                                  <button wire:click.prevent="getTicket({{ $ticket->id }})" type="button" class="btn btn-secondary btn-warning btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                  <button wire:click.prevent="delete({{ $ticket->id }})" type="button" class="btn btn-secondary btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                              </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                              <td colspan="7" align="center">
                                <p class="alert-danger">Empty</p>
                              </td>
                            </tr>
                            @endif
                          </table>
                          {{ $tickets->links() }}
                        </div>
                      </div>

                </div>

            </div>

        </div>

    </div>
</div>
