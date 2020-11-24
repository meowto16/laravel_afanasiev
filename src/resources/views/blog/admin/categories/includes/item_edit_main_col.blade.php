@php /** @var \App\Models\BlogCategory $item */ @endphp

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">
            <a href="{{ route('main') }}" class="link">Главная</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <a href="#title_select" class="link">Админка</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <a href="{{ route('blog.admin.categories.index') }}" class="link">Список категорий</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{ $item->title }}</li>
    </ol>
</nav>

<div class="card">
    <div class="card-body py-2">
        <ul class="nav nav-tabs mb-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#maindata" role="tab">Основные данные</a>
            </li>
        </ul>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input name="title" class="form-control" type="text" value="{{ old('title', $item->title) }}" id="title" minlength="3" required>
        </div>
        <div class="form-group">
            <label for="slug">Идентификатор</label>
            <input class="form-control" type="text" value="{{ old('slug', $item->slug) }}" name="slug" id="slug">
        </div>
        <div class="form-group">
            <label for="parent_id">Родитель</label>
            <select class="form-control" id="parent_id" name="parent_id">
                @foreach ($categoryList as $categoryOption)
                <option @if($categoryOption->id === $item->parent_id) selected="selected" @endif value="{{ $categoryOption->id }}">{{ $categoryOption->id_title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $item->description) }}</textarea>
        </div>
    </div>
</div>
