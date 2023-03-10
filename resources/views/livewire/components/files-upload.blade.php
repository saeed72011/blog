<div>
    <div class="file-input row col-12 col-md-6 m-auto">
        <input type="file" id="file" class="file" wire:model="photos" multiple>
        <label for="file">
            عکس ها را انتخاب نمایید
            <p class="file-name"></p>
        </label>
        @error('photos.*') <span class="error text-danger">{{ $message }}</span> @enderror
        <div wire:loading wire:target="photos">در حال بارگذاری...</div>
    </div>


    <hr>
    <button type="button" class="btn btn-sm btn-outline-light" wire:click="addCheckAll">انتخاب همه</button>
    <button type="button" class="btn btn-sm btn-outline-light" wire:click="subCheckAll"> عدم انتخاب همه</button>

    <br><br>
    <form wire:submit.prevent="deleteFile">
        @if(isset($images))
            <div class="row">
                @foreach($images as $key => $image)
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card">
                            <input
                                    type="checkbox"
                                    name="checkPics"
                                    wire:model="checkPics.{{$image->id}}"
                                    value="{{$image->photo}}"
                                    id="photo-{{$key.$image->id}}"/>
                            <div class="card-content">
                                <img class="img-fluid" src="{{asset('storage/'.$image->photo)}}">
                            </div>
                            <input
                                    name="alts"
                                    wire:model="alts.{{$image->id}}"
                                    id="photo-{{$key.'alt'.$image->id}}"/>

                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-sm btn-outline-danger"> حذف</button>
        @endif
    </form>
</div>
