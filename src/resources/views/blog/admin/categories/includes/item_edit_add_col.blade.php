<div class="card mb-3">
    <div class="card-body">
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
</div>

@if($item->exists)
<div class="card my-3">
    <div class="card-body">
        ID: {{ $item->id }}
    </div>
</div>

<div class="card my-3">
    <div class="card-body">
        <div class="form-group">
            <label for="created_at">Создано</label>
            <input name="created_at" id="created_at" type="text" class="form-control" value="{{ $item->created_at }}" disabled>
        </div>
        <div class="form-group">
            <label for="updated_at">Изменено</label>
            <input name="updated_at" id="updated_at" type="text" class="form-control" value="{{ $item->updated_at }}" disabled>
        </div>
        <div class="form-group">
            <label for="deleted_at">Удалено</label>
            <input name="deleted_at" id="deleted_at" type="text" class="form-control" value="{{ $item->deleted_at }}" disabled>
        </div>
    </div>
</div>
@endif
