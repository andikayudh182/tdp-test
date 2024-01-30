<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModallLabel">Add New Car</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('AddCar')}}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="nomor_plat" class="col-md-4 col-form-label">Nomor Plat</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="nomor_plat" name="nomor_plat"  required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="model" class="col-md-4 col-form-label">Model</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="model" name="model"  required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="merek" class="col-md-4 col-form-label">Merek</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="merek" name="merek" value="" required>
                        </div>  
                    </div>       
                    <div class="mb-3 row">
                        <label for="tarif_harian" class="col-md-4 col-form-label">Tarif Harian</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="tarif_harian" name="tarif_harian" value="" required>
                        </div>  
                    </div>       
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>
