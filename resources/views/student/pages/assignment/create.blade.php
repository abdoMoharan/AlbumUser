@extends('student.dashboard')
@section('content')
@section('title','Assignment')
@section('title_page','All Assigmnet')
<div class="container">
    <div class="card">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card-header">
        <div id="timer" class="btn  btn-info float-right"></div>
        <a href="{{ route('assgnment.index') }}" class="btn btn-primary float-end">Back</a>
    </div>
        <div class="card-body">
            <form method="post" action="{{route('assgnment.store')}}">
                @csrf

                <div class="row">
                    @foreach ($questions as $key => $question)
                    <input type="hidden" value="{{$question->teacher_id}}"  name="teacher_id">
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mt-3">
                                        <label for="question_{{ $question->id }}">
                                            <span class="badge bg-primary">{{ $question->question }}</span>

                                        </label>
                                        @foreach ($question->answers as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="answer_{{ $item->id }}" value="{{ $item->id }}">
                                            <label class="form-check-label" for="answer_{{ $item->id }}">
                                                {{ $item->answer }}
                                            </label>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>



        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    // Get the end time from PHP and convert it to milliseconds
    var endTime = new Date('{{ $endTime->toIso8601String() }}').getTime();

    // Update the countdown every second
    var x = setInterval(function() {
        // Get the current time
        var now = new Date().getTime();

        // Calculate the remaining time in milliseconds
        var distance = endTime - now;

        // Check if the time has elapsed
        if (distance < 0) {
            clearInterval(x); // Stop the countdown
            window.location.href = '{{ route('assgnment.index') }}'; // Redirect to home page
            alert('Time limit exceeded. Redirecting to home page.'); // Display alert message
        }

        // Calculate remaining minutes and seconds
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the remaining time in the HTML element with id="timer"
        document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";
    }, 1000);
</script>
@endsection
