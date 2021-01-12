<a title="Click to mark as favorite question" class="favorite mt-2 {{ Auth::guest() ? 'off' : ($model->is_favorite ? 'favorited' : '') }}" onclick="event.preventDefault(); document.getElementById('favorited-question-{{ $model->id }}').submit();">
    <i class="fas fa-star fa-2x"></i>
    <span class="favorites-count">{{ $model->favorites_count }}</span>
</a>
<form id="favorited-question-{{ $model->id }}" action="/question/{{ $model->id }}/favorites" method="post" style="display: none;">
    @csrf
    @if($model->is_favorite)
        @method('DELETE')
    @endif
</form>
