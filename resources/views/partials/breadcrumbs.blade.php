@if(isset($breadcrumbs))
<ul class="breadcrumb">
    @foreach($breadcrumbs as $title => $link)
    <li>
        <a href="{{ url($link) }}"{{ $loop->last ? " class=active" : '' }}>{{ $title }}</a>
    </li>
    @endforeach
</ul>
@endif