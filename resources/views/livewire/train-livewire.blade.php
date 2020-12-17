<div>
  <div class="row">

    <div class="col-lg-4 order-lg-2">

      <div class="card shadow mb-4">
        <button wire:click.prevent="clear()" class="btn btn-primary">Clear</button>
        <div class="card-body">
          <form @if($updateForm) wire:submit.prevent="save" @else wire:submit.prevent="update({{ $id_train }})" @endif>

            <input wire:model="id_train" type="hidden">
            <div class="form-group">
              <label>Name</label>
              <input wire:model="name" type="text" class="form-control">
              @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
              <label>Departure</label>
              <input wire:model="departure" type="time" class="form-control">
              @error('departure') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
              <label>Arrival</label>
              <input wire:model="arrival" type="time" class="form-control">
              @error('arrival') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
              <div wire:ignore>
                <label>From</label>
                <select wire:model="from" class="custom-select" name="" id="select2from">
                  <option value="">Select Station</option>
                  @foreach($stations as $station)
                  <option value="{{ $station->id }}">
                    {{ $station->station_name }}
                  </option>
                  @endforeach
                </select>
              </div>
              
              @error('from') <div class="text-danger">{{ $message }}</div> @enderror
              @push('scripts')
                              <script>
                                  $(document).ready(function() {
                                      $('#select2from').select2();
                                      $('#select2from').on('change', function (e) {
                                        @this.set('from', e.target.value);
                                      });
                                  });
                              </script>
                              @endpush
            </div>

            
            <div class="form-group">
              <label>To</label>
              <div wire:ignore>
                <select wire:model="to" class="custom-select" name="" id="select2to">
                  <option value="">Select Station</option>
                  @foreach($stations as $station)
                  <option value="{{ $station->id }}">
                    {{ $station->station_name }}
                  </option>
                  @endforeach
                </select>
              </div>
              
              @error('to') <div class="text-danger">{{ $message }}</div> @enderror
              @push('scripts')
                              <script>
                                  $(document).ready(function() {
                                      $('#select2to').select2();
                                      $('#select2to').on('change', function (e) {
                                        @this.set('to', e.target.value);
                                      });
                                  });
                              </script>
                              @endpush
            </div>
            <div class="form-group">
              <label>Price</label>
              <input wire:model="price" type="text" class="form-control">
              @error('price') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
              <label>Qty</label>
              <input wire:model="qty" type="text" class="form-control">
              @error('qty') <div class="text-danger">{{ $message }}</div> @enderror
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
                  <th>Name</th>
                  <th>Departure</th>
                  <th>Arrival</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                @if($trains->count() > 0)
                @foreach($trains as $train)
                <tr>
                  <td>{{ $loop->iteration + $trains->firstItem() - 1 }}</td>
                  <td>{{ $train->name }}</td>
                  <td>{{ date('h:i A', strtotime($train->departure)) }}</td>
                  <td>{{ date('h:i A', strtotime($train->arrival)) }}</td>
                  <td>{{ $train->created_at->diffForHumans() }}</td>
                  <!-- Modal -->
                  <div class="modal fade" id="modaltrain{{ $train->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Name Train : <label class="badge-counter">{{ $train->name }}</label><br>
                          Departure : <label class="badge-counter">{{ date('h:i A', strtotime($train->departure)) }}</label><br>
                          Arrival : <label class="badge-counter">{{ date('h:i A', strtotime($train->arrival)) }}</label><br>
                          from: <label class="badge-counter">@foreach($stations as $station) @if($train->from == $station->id){{ $station->station_name }}@endif @endforeach</label><br>
                          To: <label class="badge-counter">@foreach($stations as $station) @if($train->to == $station->id){{ $station->station_name }}@endif @endforeach</label><br>
                          Price : <label class="badge-counter">Rp.{{ $train->price }}</label><br>
                          Qty : <label class="badge-counter">{{ $train->qty }}</label>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <td>
                    <button data-toggle="modal" data-target="#modaltrain{{ $train->id }}" type="button" class="btn btn-secondary btn-primary btn-sm"><i class="fa fa-info" aria-hidden="true"></i></button>
                    <button wire:click.prevent="getTrain({{ $train->id }})" type="button" class="btn btn-secondary btn-warning btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button>
                    <button wire:click.prevent="delete({{ $train->id }})" type="button" class="btn btn-secondary btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
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
              {{ $trains->links() }}
            </div>
          </div>

        </div>

      </div>

    </div>

  </div>
</div>