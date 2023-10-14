    {{-- Be like water. --}}
    <div>
        <h3 class="tm-text-primary tm-mb-4">Sélectionnez l'année</h3>
        <nav class="tm-nav-secondary">
            <ul>
                @foreach ($cycles as $cycle)
                    <li><a href="/liste/{{$cycle->id}}">{{$cycle->designation}}</a></li>
                @endforeach
            </ul>
        </nav>
    </div>