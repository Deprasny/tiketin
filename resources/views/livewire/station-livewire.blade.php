<div>
    <div class="row">

        <div class="col-lg-4 order-lg-2">

            <div class="card shadow mb-4">
                <button wire:click.prevent="clear()" class="btn btn-primary">Clear</button>
                <div class="card-body">
                    <form @if($updateForm) wire:submit.prevent="save" @else wire:submit.prevent="update({{ $id_station }})" @endif>

                         <input wire:model="id_station" type="hidden">
                          <div class="form-group">
                            <label>Station Name</label>
                            <input wire:model="station_name" type="text" class="form-control">
                            @error('station_name') <div class="text-danger">{{ $message }}</div> @enderror
                          </div>
                          <div class="form-group">
                              <div wire:ignore>
                                <label>Class</label>
                                <select wire:model="class" class="form-control" name="class" id="select2class">
                                    <option value="">select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                               
                              </div>
                              @error('class') <div class="text-danger">{{ $message }}</div> @enderror
                              @push('scripts')
                              <script>
                                  $(document).ready(function() {
                                      $('#select2class').select2();
                                      $('#select2class').on('change', function (e) {
                                        @this.set('class', e.target.value);
                                      });
                                  });
                              </script>
                              @endpush
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
                              <th>Station Name</th>
                              <th>Class</th>
                              <th>Created At</th>
                              <th>Action</th>
                            </tr>
                            @if($stations->count() > 0)
                            @foreach($stations as $station)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $station->station_name }}</td>
                              <td>{{ $station->class }}</td>
                              <td>{{ $station->created_at->diffForHumans() }}</td>
                              <td>
                                  <button wire:click.prevent="getStation({{ $station->id }})" type="button" class="btn btn-secondary btn-warning btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                  <button wire:click.prevent="delete({{ $station->id }})" type="button" class="btn btn-secondary btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
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
                          {{ $stations->links() }}
                        </div>
                      </div>

                </div>

            </div>

        </div>

    </div>
</div>
