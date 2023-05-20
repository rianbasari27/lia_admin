@if ($errors->any())
    <div>
        @foreach ($errors->all() as $item)
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                <i class="fas fa-exclamation-triangle"></i> {{ $item }}
            </div>
        @endforeach
    </div>
@endif

@if (Session::get('success'))
    <div class="p-4 mb-4 text-sm text-emerald-800 rounded-lg bg-emerald-50" role="alert">
        <i class="fas fa-check-circle"></i> {{ Session::get('success') }}
    </div>
@endif