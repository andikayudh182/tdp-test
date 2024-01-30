<div class="modal fade" id="updateModal{{ $data['RentalID'] }}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Pengembalian Mobil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('UpdatePengembalian')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                        <label for="tanggal_pengembalian" class="col-md-4 col-form-label">Tanggal Pengembalian</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
                            <input type="hidden" name="RentalID" value="{{ $data['RentalID'] }}">
                            <input type="hidden" name="CarID" value="{{ $data['CarID'] }}">
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
