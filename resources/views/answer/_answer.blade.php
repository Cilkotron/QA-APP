<div class="media post">
    @include('shared._vote', [
        'model' => $answer
    ])
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
            @include('shared._author', [
                'model' => $answer,
                'label' => 'answered'
            ])
            </div>
        </div>
    </div>
</div>
