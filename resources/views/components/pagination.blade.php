<ul class="row">
    @if ($page_id == null or $page_id==1)
        <li style="list-style: none;" class="nav-item">
            <a href="{{ url(url()->current()."?page_id=1") }}" class="btn btn-outline-primary nav-link">first</a>
        </li>
    @else
        <li style="list-style: none;" class="nav-item">
            <a href="{{ url(url()->current()."?page_id=1") }}" class="btn btn-outline-primary nav-link">first</a>
        </li>
        <li style="list-style: none;" class="nav-item">
            <a href="{{ url(url()->current()."?page_id=".$page_id-1) }}" class="btn btn-outline-primary nav-link">Previous</a>
        </li>
    @endif

    @for ($i=1;$i<=$pages;$i++)
        @if ($pages>10)
        @switch($i)
            @case($i==$page_id+1)
                <li style="list-style: none;" class="nav-item">
                    <a href="{{ url(url()->current()."?page_id=".$i) }}" class="btn btn-outline-primary nav-link">{{ $i }}</a>
                </li>
            @break
            @case($i==$page_id+2)
                <li style="list-style: none;" class="nav-item">
                    <a href="{{ url(url()->current()."?page_id=".$i) }}" class="btn btn-outline-primary nav-link">{{ $i }}</a>
                </li>
            @break
            @case($i==$page_id+3)
                <li style="list-style: none;" class="nav-item">
                    <a href="{{ url(url()->current()."?page_id=".$i) }}" class="btn btn-outline-primary nav-link">{{ $i }}</a>
                </li>
            @break
            @case($i==$page_id+4)
                <li style="list-style: none;" class="nav-item">
                    <a href="{{ url(url()->current()."?page_id=".$i) }}" class="btn btn-outline-primary nav-link">{{ $i }}</a>
                </li>
            @break
        @endswitch
        @else
            <li style="list-style: none;" class="nav-item">
                <a href="{{ url(url()->current()."?page_id=".$i) }}" class="btn btn-outline-primary nav-link">{{ $i }}</a>
            </li>
        @endif

    @endfor

    @if ($page_id==$total_pages)
        <li style="list-style: none;" class="nav-item">
            <a href="{{ url(url()->current()."?page_id=".$pages) }}" class="btn btn-outline-primary nav-link">last</a>
        </li>
    @else
        <li style="list-style: none;" class="nav-item">
            <a href="{{ url(url()->current()."?page_id=".$page_id+1) }}" class="btn btn-outline-primary nav-link">next</a>
        </li>
        <li style="list-style: none;" class="nav-item">
            <a href="{{ url(url()->current()."?page_id=".$pages) }}" class="btn btn-outline-primary nav-link">last</a>
        </li>
    @endif
</ul>
