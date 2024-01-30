<div class="card card-body" style="width:80%;">
    <form action="{{route('AddRental')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col">
            <div class="mb-3 row">
                <label for="user_id" class="col-md-4 col-form-label">Nama Pelanggan</label>
                <div class="col-md-8">
                    <select class="form-control select2-single" id="user_id" name="user_id" width="100%" required>
                    @foreach ($DataUser as $itemUser)
                        <option value="{{ $itemUser['id'] }}">{{ $itemUser['name'] }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        
            <div class="mb-3 row">
                <label for="car_id" class="col-md-4 col-form-label">No Plat Mobil </label>
                <div class="col-md-8">
                    <select class="form-control select2-single" id="car_id" name="car_id" width="100%" required>
                        @foreach ($DataCar as $itemCar)
                            <option value="{{ $itemCar['id'] }}">{{ $itemCar['nomor_plat'] }} - Rp {{ $itemCar['tarif_harian'] }}</option>
                        @endforeach
                        </select>
                </div>
            </div>
        </div>
        <div class="col"> 
            <div class="mb-3 row">
                <label for="car_id" class="col-md-4 col-form-label">Tanggal Mulai </label>
                <div class="col-md-8">
                    <input type="date" name="tanggal_mulai" class="form-control">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="car_id" class="col-md-4 col-form-label">Tanggal Selesai </label>
                <div class="col-md-8">
                    <input type="date" name="tanggal_selesai" class="form-control">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="car_id" class="col-md-4 col-form-label"></label>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary float-end" width="100%"> Submit </button>
                </div>
            </div>
            </div>
        </div>
    </div>
    </form>
</div>