<div class="mb-3"><!--dinamikusan akarok írni-->
    @if($label)
        <label for="{{$name}}" >
            {{$label}}
        </label><!--mi az input neve/mi a leírása-->
    @endif
    <input class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}" type="{{$type}}" name="{{$name}}" value="{{old($name,$value)}}" {{$attributes}}>
    @if($errors->has($name))
        <p class="invalid-feedback">
            {{$errors->first($name)}}
        </p>
    @endif
</div>