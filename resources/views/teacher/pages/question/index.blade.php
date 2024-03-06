@extends('teacher.dashboard')
@section('content')
@section('title', 'Qustions')
@section('title_page', 'Qustions')
<div class="container">
    <div class="card">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div class="card-header">
            <a href="{{ route('teacher.question.create') }}" class="btn btn-primary float-end">Create</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class=" table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Questions</th>
                        <th scope="col">Answers</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                @forelse ($questions as $key => $item)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->question }}</td>
                            <td> @foreach ($item->answers as $answer)
                                {{ $answer->answer }}
                                @if (!$loop->last)
                                    <br>
                                @endif
                            @endforeach</td>
                            <td>
                            <div class="d-flex justify-content-around">
                                <form action="{{ route('teacher.question.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                @empty
                @endforelse

            </table>
        </div>
    </div>
</div>
@endsection
