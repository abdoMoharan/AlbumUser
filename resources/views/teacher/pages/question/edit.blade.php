@extends('teacher.dashboard')
@section('content')
@section('title', 'Qustions')
@section('title_page', 'Edit Qustion')
<div class="container">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('teacher.question.index') }}" class="btn btn-primary float-end">Back</a>
        </div>
        <div class="card-body">
            {{-- <h2>Add </h2> --}}
            <form id="myForm" method="post" action="{{route('teacher.question.update',$question->id)}}">
                @csrf
                @method('PUT')
                <div class="items" >
                    <!-- Repeater Content -->
                    <div class="item-content">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="question" class="col-lg-2 control-label">Question</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="question"
                                        name="question" value="{{old('question',$question->question)}}">
                                        @error('question')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @foreach ($question->answers as $item)
                            <div class="form-group col-md-6">
                                <label for="answer" class="col-lg-2 control-label">Answer</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="answer"
                                        name="answers[]" value="{{ old('answer', $item->answer) }}">
                                    @error('answer')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach


                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-end" >Edit</button>
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
