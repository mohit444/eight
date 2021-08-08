<div style="text-align: center">
    <div >
        <p>Create if required steps
            <span wire:click='create' class="fas fa-plus" style="padding-left:5px; cursor:pointer;" ></span>
        </p>
        
    </div>
    
    @foreach($steps as $step)
    <input  type="text" name='step[]' placeholder="{{'Describe step'. $step}}" />
    <span wire:click='remove({{$loop->index}})' class="fas fa-times" style="padding-left:5px; cursor:pointer;" ></span>
    {{$loop->index}}
    @endforeach
</div>
