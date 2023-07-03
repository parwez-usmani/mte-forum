{{-- <main id="main" class="main"> --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3">Topic Name:</div>
                <div class="col-lg-6">{{$topic_name}}</div>
            </div> 
            <div class="row">
                <div class="col-lg-3">Title:</div>
                <div class="col-lg-6">{{$topic_title}}</div>
            </div>
            <div class="row">
                <div class="col-lg-3">Topic Description:</div>
                <div class="col-lg-6">{{$topic_description}}</div>
            </div>
            <div class="row">
                <div class="col-lg-3">Image:</div>
                <div class="col-lg-6">{{$image}}</div>
            </div>
            <div class="row">
                <div class="col-lg-3">Topic Type:</div>
                <div class="col-lg-6">{{$topic_type}}</div>
            </div>
            <div class="row">
                <div class="col-lg-3">comment:</div>
                <div class="col-lg-6">{{$comment_description}}</div>
            </div>

            <div class="row">
                <div class="col-lg-3"> 
                    <form>
                        <button class="btn btn-primary btn-sm" wire:click.prevent="comment({{ $topics_id }})">Add Comment </button>
                        {{-- <button wire:click="upModal({{ $topics_id }})" type="button" class="btn btn-sm btn-label-brand btn-bold" data-toggle="modal" data-target="#updateModal"> addcom</button> --}}
                    
                        
                    </form>
                </div> 
                {{-- <div class="col-lg-6">{{$comment_description}}</div> --}}
            </div>
             
{{-- </main> --}}
