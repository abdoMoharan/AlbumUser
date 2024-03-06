<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $album->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Album name : {{ $album->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Page Content -->
                <div class="container">
                    <div class="row text-center text-lg-start">

                        @foreach ($album->images as $item)
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="card mb-4 ">
                                    <img class="card-img-top img-fluid img-thumbnail" src="{{ $item->image }}"
                                        alt="{{ $item->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->image_name }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
