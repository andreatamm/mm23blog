 <li>
    <details>
        <summary>{{$name}}</summary>
        <ul class="p-2 z-1">
            @php
                $categories = \App\Models\Category::where('category_id', $id)->get();
            @endphp

            @foreach ($categories as $category)
                @if($category->children()->count())
                    @include('partials.categories', ['name' => $category->name, 'id' => $category->id])
                @else
                    <li><a href="{{route('category', ['category' => $category])}}">{{$category->name}}</a></li>
                @endif
            @endforeach

        </ul>
    </details>
</li>
