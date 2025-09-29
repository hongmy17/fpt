<ul>
    @foreach ($categories as $cat)
        <li>
            <a href="/tin-trong-loai/{{$cat->id}}">
                {{ $cat->name }}</li>
            </a>
    @endforeach
</ul>
