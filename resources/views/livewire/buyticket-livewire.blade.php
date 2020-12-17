<div>
    <div class="row">

        <div class="col-lg-3 order-lg-2">

            <div class="card shadow mb-4">
                <button wire:click.prevent="clear()" class="btn btn-primary">Clear</button>
                <div class="card-body">
                    <form wire:submit.prevent="save">
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
                            <input wire:model="name" type="text" value="asdasd" class="form-control" disabled>
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
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

        <div class="col-lg-9 order-lg-1">

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
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <div wire:ignore>
                                  <select class="custom-select" name="" id="select2from">
                                    <option value="">From</option>
                                    @foreach($stations as $station)
                                    <option value="{{ $station->station_name }}">
                                      {{ $station->station_name }}
                                    </option>
                                    @endforeach
                                  </select>
                                </div>
                                @push('scripts')
                                                <script>
                                                    $(document).ready(function() {
                                                        $('#select2from').select2();
                                                        $('#select2from').on('change', function (e) {
                                                          @this.set('searchFrom', e.target.value);
                                                        });
                                                    });
                                                </script>
                                                @endpush
                              </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div wire:ignore>
                                  <select class="custom-select" name="" id="select2to">
                                    <option value="">To</option>
                                    @foreach($stations as $station)
                                    <option value="{{ $station->station_name }}">
                                      {{ $station->station_name }}
                                    </option>
                                    @endforeach
                                  </select>
                                </div>
                                @push('scripts')
                                                <script>
                                                    $(document).ready(function() {
                                                        $('#select2to').select2();
                                                        $('#select2to').on('change', function (e) {
                                                          @this.set('searchTo', e.target.value);
                                                        });
                                                    });
                                                </script>
                                                @endpush
                              </div>
                        </div>
                      </div>
                  </div>
                  
                </div>
      
      
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-hover table-md">
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Action</th>
                      </tr>
                      @if($trains->count() > 0)
                      @foreach($trains as $train)
                      <tr>
                        <td>{{ $loop->iteration + $trains->firstItem() - 1 }}</td>
                        <td>{{ $train->name }}</td>
                        <td>@foreach($stations as $station) @if($train->from == $station->id){{ $station->station_name }}@endif @endforeach</td>
                        <td>@foreach($stations as $station) @if($train->to == $station->id){{ $station->station_name }}@endif @endforeach</td>
                        <td>{{ date('h:i A', strtotime($train->departure)) }}</td>
                        <td>{{ date('h:i A', strtotime($train->arrival)) }}</td>
                        <td>Rp. {{ $train->price}}</td>
                        <td>{{ $train->qty}}</td>
                        <td>
                          <button wire:click.prevent="getTrain({{ $train->id }})" type="button" class="btn btn-secondary btn-danger btn-sm"><i class="fa fa-arrow-right" aria-hidden="true"></i> Buy</button>
                        </td>
                      </tr>
                      @endforeach
                      @else
                      <tr>
                        <td colspan="9" align="center">
                          <p class="alert-danger">Empty</p>
                        </td>
                      </tr>
                      @endif
                    </table>
                    {{ $trains->links() }}
                  </div>
                </div>
      
              </div>
      
            </div>
      
          </div>
    </div>
</div>
