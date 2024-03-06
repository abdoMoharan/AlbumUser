@extends('teacher.dashboard')
@section('content')
@section('title', 'Qustions')
@section('title_page', 'Create Qustion')
<div class="container">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('teacher.question.index') }}" class="btn btn-primary float-end">Back</a>
        </div>
        <div class="card-body">

            {{-- <h2>Add </h2> --}}
            <form id="myForm" method="post" action="{{ route('teacher.question.store') }}">
                @csrf
                <div class="form-group col-md-12">
                    <label for="question" class="col-lg-2 control-label">Question</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="question" placeholder="question"
                            name="question" required>
                        @error('question')
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
                    <div class="items" data-group="list">
                        <!-- Repeater Content -->
                        <div class="item-content">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="answer" class="col-lg-2 control-label">Answer</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="answer" placeholder="answer"
                                            data-skip-name="fales" data-name="answer" required>
                                        @error('list.*.answer')
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
