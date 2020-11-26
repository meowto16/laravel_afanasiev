@if (session('restore'))
    <form class="d-inline" method="POST" action="{{ session('restore') }}">
        @csrf
        @method('PATCH')
        <button class="btn btn-link" type="submit">Восстановить?</button>
    </form>
@endif
