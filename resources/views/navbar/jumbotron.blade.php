@if(count($categories) > 0)
<div class="col-md-12">
    <div class="jumbotron" style="padding-top: 20px; padding-bottom: 20px;">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-2">
                    <a style="text-decoration: none" href="{{ route('actuality.index', $category->id) }}" class="{{ $category->color == 'orange' ? 'text-warning' : '' }} {{ $category->color == 'red' ? 'text-danger' :  '' }} {{ $category->color == 'clear_blue' ? 'text-primary' : '' }} {{ $category->color == 'dark_blue' ? 'text-info' : '' }} {{ $category->color == 'green' ? 'text-success' : ''}}">
                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                        <span class="{{ Request::is($category->id) && $category->color == 'orange' ? 'label label-warning' : '' }} {{ Request::is($category->id) && $category->color == 'red' ? 'label label-danger' : '' }} {{ Request::is($category->id) && $category->color == 'clear_blue' ? 'label label-primary' : '' }} {{ Request::is($category->id) && $category->color == 'dark_blue' ? 'label label-info' : '' }} {{ Request::is($category->id) && $category->color == 'green' ? 'label label-success' : '' }}"
                        style="{{ Request::is($category->id) ? 'font-size: 14px; font-weight: normal;' : ''}}">
                        {{ $category->name }} ({{ $category->totalActualities }})
                        </span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif