<div class="col-xl-3 col-md-3 col-sm-4">
    <div class="card">
        <div class="card-content">
            <div class="card-body {{$category->status ? 'bg-success' : 'bg-danger'}}">
                <div class="row ">
                    <div class="col-8">
                        @wire
                        <x-form-radio
                            name="categoryId"
                            value="{{$category->id}}"
                            label="{{$category->title}} "
                            id="{{random_int(1000,9999)}}{{$category->title.$category->id}}"
                        />
                        @endwire
                    </div>
                    <div class="col-4">
                        <button type="button"
                                class="btn btn-sm btn-outline-danger"
                                wire:click="delete({{$category->id}})"
                        >
                            <i class="bx bx-trash text-white"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        @wire('lazy')
                        <x-form-input
                            name="sorts.{{$category->id}}"
                            placeholder="{{$category->sort}}"
                            id="master{{$category->id}}"
                        />
                        @endwire

                    </div>
                    <div class="col-4">


                        <button wire:click='$emit("openModal", "admin.categories.edit-category, {{ json_encode(["category" => $category]) }})'>ویرایش</button>
                    </div>
                    <div class="col-8">
                        <button wire:click='$emit("openModal", "admin.categories.create-category, {{ json_encode(["categoryId" => $category->id]) }})'>ایجاد زیر دسته</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
