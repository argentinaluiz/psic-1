<div class="slider ">
  <ul class="slides">
    @foreach($list as $key => $value)
      <li>
        <img src="{{$value->url}}"> <!-- random image -->
        <div class="caption center-align">
          @if(isset($value->name))
            <h3>{{$value->name}}</h3>
          @endif
          @if(isset($value->description))
            <h5 class="light grey-text text-lighten-3">{{$value->description}}</h5>
          @endif

          @if(isset($value->url) && $value->url != '')
            <a class="btn btn-sm btn-default" href="{{$value->url}}">Ver mais</a>
          @endif

        </div>
      </li>
    @endforeach
  </ul>
</div>


