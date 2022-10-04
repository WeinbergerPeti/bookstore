<h1>Példányok száma: {{$copies -> count()}}</h1>

<h2>Kikölcsönözhető példányok: {{$copies ->where("status", "0")-> count()}}</h2> 
<!-- where("status,"=", "0") default jel = -->

<h2>Selejtezendő példányok száma: {{$copies -> where("status", "2") -> count()}}</h2>
<h2>kikölcsönzött példányok száma: {{$copies -> where("status", "1") -> count()}}</h2>

@foreach ($copies as $copy)

    <form action="/api/copies/{{$copy->copy_id}}" method="post">
        {{csrf_field()}} <!-- külső támadás ellen véd -->
        {{method_field('GET')}}
        <div class="form-group">
            <input type="submit" value="{{$copy->copy_id}}">
        </div>
    </form>

@endforeach