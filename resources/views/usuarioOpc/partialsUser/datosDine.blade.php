<div class="col-sm-4 col-md-4 col-lg-4">
    <label for="">Tu dinero actualmente</label>
</div>
<div class="col-sm-4 col-md-4 col-lg-4">
    <label>
        @if (Auth::user()->us_din == null)
            No tienes dinero :(
        @else
            S/{{ Auth::user()->us_din }}
        @endif

    </label>
</div>
