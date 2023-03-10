<div class="m-auto col-md-12 col-sm-12">
    <x-form wire:submit.prevent="save">
        @wire
        <x-form-input name="title" label="عنوان" />
        <x-form-input name="meta_title" label="عنوان متا" />
        <x-form-input name="slug" label="slug"/>
        <x-form-textarea name="desc" label="توضیحات" />
        <x-form-textarea name="meta_desc" label="توضیحات متا" />
        <x-form-input name="image" type="file" label="تصویر شاخص" />
        <img src="{{assetFile($portfolio->image)}}" class="img-thumbnail m-auto">
        <x-form-group name="status" label="وضعیت" inline>
            <x-form-radio name="status" value="1" label="فعال" />
            <x-form-radio name="status" value="0" label="غیر فعال" />
        </x-form-group>
        @endwire
        <hr>
        <x-form-submit>ذخیره شود</x-form-submit>
    </x-form>
    <hr>

    <livewire:components.files-upload :modelId="$portfolio->id" modelName="portfolio"
                                      :wire:key="'photos-'.$portfolio->id"/>

    <hr>
    <livewire:admin.categorizables.index-categorizable :modelId="$portfolio->id" modelNames="portfolios"
                                      :wire:key="'category-'.$portfolio->id"/>

</div>
