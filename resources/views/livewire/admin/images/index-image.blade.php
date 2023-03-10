<div>
    <x-elements.page-template title="تنظیمات تصاویر" :routs="['images.index' => 'تصاویر']">

        <div class="row m-0">
            <x-elements.modal title="افزودن عکس" live="admin.images.create-image"/>
        </div>
        <hr>

        <div class="row" >
            @foreach($images as $image)
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card text-center bg-danger bg-lighten-2">
                        <div class="card-content d-flex">
                            <div class="card-body">
                                <img src="{{asset('storage/' . $image->image)}}" alt="{{$image->alt}}"
                                     title="{{$image->title}}" height="210" style="height: 210px; width: 340px;" class="mb-1" />
                                <button
                                    wire:click="deleteFile('Image', {{$image->id}}, 'image')"
                                    class="btn btn-danger white"
                                >
                                    حذف
                                </button>
                            </div>
                        </div>
                    </div>
                </div>



            @endforeach
        </div>

    </x-elements.page-template>
</div>
