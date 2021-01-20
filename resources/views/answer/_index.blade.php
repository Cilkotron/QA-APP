@if($answersCount > 0 )
    <div class="row mt-4" v-cloak>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $answersCount . " " . str_plural('Answer', $answersCount ) }}</h2>
                    </div>
                    <hr>
                    @include('layouts._messages')
                    @foreach($answers as $answer)
<<<<<<< HEAD
                        <div class="media">
                            <div class="d-flex flex-column vote-controls">
                                <a title="This answer is useful" class="vote-up {{ Auth::guest() ? 'off' : '' }}" onclick="event.preventDefault(); document.getElementById('up-vote-answer-{{ $answer->id }}').submit();">
                                    <i class="fas fa-caret-up fa-3x"></i>
                                </a>
                                <form id="up-vote-answer-{{ $answer->id }}" action="/answer/{{ $answer->id }}/vote" method="post" style="display: none;">
                                    @csrf
                                <input type="hidden" name="vote" value="1">
                                </form>
                                <span class="votes-count">{{ $answer->votes_count  }}</span>
                                <a title="This answer is not useful" class="vote-down {{ Auth::guest() ? 'off' : '' }}" onclick="event.preventDefault(); document.getElementById('down-vote-answer-{{ $answer->id }}').submit();">
                                    <i class="fas fa-caret-down fa-3x"></i>
                                </a>
                                <form id="down-vote-answer-{{ $answer->id }}" action="/answer/{{ $answer->id }}/vote" method="post" style="display: none;">
                                    @csrf
                                <input type="hidden" name="vote" value="-1">
                                </form>

<<<<<<< HEAD
                                @include('shared._accept', [
                                    'model' => $answer
                                ])
                            </div>
                            <div class="media-body">
                                {!! $answer->body_html !!}
                                <div class="row">
                                    <div class="col-4">
                                        @can('update', $answer)
                                            <a href="{{  route('question.answer.edit', [$question->id, $answer->id]) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                        @endcan
                                        @can('delete', $answer)
                                        <form class="form-delete" action="{{ route('question.answer.destroy', [$question->id, $answer->id] ) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm ('Are you sure?')">Delete</button>
                                        </form>
                                        @endcan
                                    </div>
                                    <div class="col-4">
                                    </div>
                                    <div class="col-4">
                                    {{--  @include('shared._author', [
                                        'model' => $answer,
                                        'label' => 'answered'
                                    ]) --}}
                                    <user-info :model="{{ $answer }}" label="Answered" ></user-info>
=======
 <div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $answersCount . " " . str_plural('Answer', $answersCount ) }}</h2>
                </div>
                <hr>
                @include('layouts._messages')
                @foreach($answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="This answer is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">123</span>
                            <a title="This answer is not useful" class="vote-down off">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            <a title="Mark this answer as best answer (Click again to undo)" class="{{ $answer->status }} mt-2">
                                <i class="fas fa-check fa-2x"></i>
                                <span class="favorites-count">12</span>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $answer->body_html !!}
                            <div class="row">
                                <div class="col-4">
                                    @can('update', $answer)
                                        <a href="{{  route('question.answer.edit', [$question->id, $answer->id]) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                    @endcan
                                    @can('delete', $answer)
                                    <form class="form-delete" action="{{ route('question.answer.destroy', [$question->id, $answer->id] ) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm ('Are you sure?')">Delete</button>
                                    </form>
                                    @endcan
                                </div>
                                <div class="col-4">
                                </div>
                                <div class="col-4">
                                    <span class="text-muted">Aswered {{ $answer->created_at }}</span>
                                    <div class="media mt-2">
                                        <a class="pr-2" href="{{ $answer->user->url }}">
                                            <img src="{{ $answer->user->avatar }}" alt="User avatar">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                        </div>
>>>>>>> unit-19
                                    </div>
                                </div>


                            </div>
                        </div>
                        <hr>
=======
                        @include ('answer._answer')
>>>>>>> unit-29
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif

