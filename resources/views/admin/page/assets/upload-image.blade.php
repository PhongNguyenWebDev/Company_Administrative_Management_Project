<form id="uploadForm" action="{{ route('images.upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Delete Photo
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this photo?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="confirmDelete">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="position-relative">
        @if (isset($images->first()->file_name))
            <div class="d-flex align-items-center justify-content-center my-5 position-relative">
                <div class="position-absolute w-100 top-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="ms-5 mt-2 mb-0 text-white" id="photoIndex">1/{{ count($images) }}</p>
                        <span class="me-5 mt-2 badge bg-danger" data-bs-target="#exampleModal"
                            data-bs-toggle="modal">X</span>
                    </div>
                </div>
                <img src="{{ asset('storage/images/' . $images->first()->file_name) }}" alt="Photo" id="mainPhoto">
            </div>
            <div class="d-flex align-items-center justify-content-between">
                {{-- @if (isset($check)) --}}
                <a class="text-center" id="prevBtn" onclick="changePhoto(-1)">
                    <img class="w-25 text-center" src="{{ asset('assets/images/icons/left-chevron.png') }}"
                        alt="" srcset="">
                </a>
                <div id="thumbnails" class="d-flex justify-content-between mx-2">
                    @foreach ($images->take(4) as $index => $image)
                        <img src="{{ asset('storage/images/' . $image->file_name) }}" alt="Image"
                            class="img-thumbnail thumbnail" style="width: 30%" data-index="{{ $index }}">
                    @endforeach

                </div>
                <a class="text-center" id="nextBtn" onclick="changePhoto(1)"><img class="w-25"
                        src="{{ asset('assets/images/icons/chevron.png') }}" alt="" srcset=""></a>
            </div>
        @endif
        <div class="my-3">
            <label for="images" class="form-label">Upload Images</label>
            <input class="form-control @error('images.*') is-invalid @enderror" type="file" id="images"
                name="images[]" multiple>
            <input type="hidden" name="asset_id" value="{{ $asset->id }}">
            @error('images.*')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="my-2 btn btn-primary" style="float: right" type="submit">UPLOAD PHOTO</button>
    </div>
</form>
