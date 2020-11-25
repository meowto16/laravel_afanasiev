@php
    /** @var App\Models\BlogPost $item */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>
<br>

@if($item->exists)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    ID: {{ $item->id }}
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="created_at">Создано</label>
                        <input id="created_at" name="created_at" type="text" value="{{ $item->created_at }}" disabled class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="changed_at">Изменено</label>
                        <input id="changed_at" name="changed_at" type="text" value="{{ $item->changed_at }}" disabled class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="published_at">Опубликовано</label>
                        <input id="published_at" name="published_at" type="text" value="{{ $item->published_at }}" disabled class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
