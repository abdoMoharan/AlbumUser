@extends('admin.dashboard')
@section('content')
@section('title', 'Albums')
@section('title_page', 'All Albums')
<div class="container ">

    <div class="card mt-5">
        <div class="card-header">
            <a href="{{ route('admin.albums.index') }}" class="btn btn-outline-primary btn-sm float-end">Back</a>
        </div>

        <div class="card-body">
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
            @endif
            <form id="myForm" method="post" action="{{ route('admin.albums.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-12">
                    <label for="album" class="col-lg-2 control-label">Album Name</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control mt-2" id="album" placeholder="album" name="name"
                            required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div id="repeater">
                    <!-- Repeater Heading -->
                    <div class="repeater-heading">
                        <button type="button" class="btn btn-primary  pull-right repeater-add-btn float-end">
                            Add
                        </button>
                    </div>
                    <div class="clearfix"></div>
                    <!-- Repeater Items -->
                    <div class="items" data-group="albums">
                        <!-- Repeater Content -->
                        <div class="item-content">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="image_name" class="col-lg-2 control-label">Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="image_name" placeholder="image name"
                                            data-skip-name="fales" data-name="image_name" required>
                                        @error('albums.*.image_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image" class="col-lg-2 control-label">Image</label>
                                    <div class="col-lg-10">
                                        <input type="file" class="form-control" id="image" placeholder="image"
                                            data-skip-name="fales" data-name="image" required>
                                        @error('albums.*.image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Repeater Remove Btn -->
                        <div class="pull-right repeater-remove-btn">
                            <button class="btn btn-danger remove-btn mt-3">
                                Remove
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success float-end">Save</button>
            </form>
        </div>


    </div>

</div>
@endsection
@section('script')
<script src="{{ asset('assets/js/repeater.js') }}" type="text/javascript"></script>
<script>
    /* Create Repeater */
    $("#repeater").createRepeater({
        showFirstItemToDefault: true,
    });
</script>
@endsection
