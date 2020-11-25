@php
    /** @var App\Models\BlogPost $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ $item->is_published ? 'Опубликовано' : 'Черновик' }}</div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted">

                </div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#main-data" class="nav-link active" data-toggle="tab" role="tab">
                            Основные данные
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#additional-data" class="nav-link" data-toggle="tab" role="tab">
                            Дополнительные данные
                        </a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="main-data" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" name="title" value="{{ $item->title }}" id="title" class="form-control" minlength="3" required>
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Статья</label>
                            <textarea name="content_raw" id="content_raw" rows="20"
                                      class="form-control">{{ old('content_raw', $item->content_raw) }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="additional-data" role="tabpanel">
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="" selected="selected" disabled>Выберите категорию</option>
                                @foreach($categoryList as $categoryOption)
                                    <option
                                        value="{{ $categoryOption->id }}"
                                        @if($categoryOption->id === $item->category_id) selected="selected" @endif
                                    >{{ $categoryOption->id_title }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input type="text" name="slug" value="{{ $item->slug }}" id="slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Выдержка</label>
                            <textarea name="excerpt" id="excerpt" rows="5"
                                      class="form-control">{{ old('excerpt', $item->excerpt) }}</textarea>
                        </div>
                        <div class="form-check">
                            <input type="hidden" value="0" name="is_published">

                            <input
                                id="is_published"
                                type="checkbox"
                                name="is_published"
                                class="form-check-input"
                                value="1"
                                @if($item->is_published)
                                checked="checked"
                                @endif
                            >
                            <label for="is_published">Опубликовано</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
