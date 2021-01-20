<answer :answer="{{ $answer }}" inline-template>
    <div class="media post">
        @include ('shared._vote', [
            'model' => $answer
        ])
        <div class="media-body">
            <form v-if="editing" @submit.prevent="update">
                <div class="form-group">
                    <textarea rows="10" v-model="body" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-sm btn-primary" :disabled="isInvalid">Update</button>
                    <button class="btn btn-sm btn-outline-secondary" @click="cancel" type="button">Cancel</button>
                </div>
            </form>
            <div v-else>
            <div v-html="bodyHtml"></div>
            <div class="row">
                <div class="col-4">
                    @can('update', $answer)
                        <a @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>
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
                <user-info :model="{{ $answer }}" label="Answered"></user-info>
                </div>
            </div>
           </div>
        </div>
    </div>
</answer>
