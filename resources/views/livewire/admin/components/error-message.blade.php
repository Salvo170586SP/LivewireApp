@if($errors->any())
<ul class="bg-orange-400 p-3 border rounded">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif