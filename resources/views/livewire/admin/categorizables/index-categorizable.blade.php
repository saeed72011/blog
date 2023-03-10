<div>
    <div class="row">
            <div class="col-11 m-auto jumbotron bg-white border">
                <h6 class="text-center">دسته بندی ها</h6>
                @foreach($categories as $id => $title)
                    <button class="btn btn-sm mt-1 {{$this->checkRel($id)}}"
                            wire:click="$set('categoryId', '{{$id}}')">
                        {{$title}}
                    </button>
                @endforeach
            </div>
    </div>
</div>
