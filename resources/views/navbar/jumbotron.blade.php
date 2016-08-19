@if(count($categories) > 0)
<div class="col-md-12">
    <div class="jumbotron" style="padding-top: 20px; padding-bottom: 20px;">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-2">
                    <a style="text-decoration: none" href="{{ route('actuality.index', $category->id) }}" class="{{ $category->color == 'orange' ? 'text-warning' : '' }} {{ $category->color == 'red' ? 'text-danger' :  '' }} {{ $category->color == 'clear_blue' ? 'text-primary' : '' }} {{ $category->color == 'dark_blue' ? 'text-info' : '' }} {{ $category->color == 'green' ? 'text-success' : ''}}">
                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                        {{ $category->name }} ({{ count($category->actualities) }})
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif