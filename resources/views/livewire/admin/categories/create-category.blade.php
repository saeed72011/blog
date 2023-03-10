<div class="m-auto col-md-8 col-sm-12">
    <x-form wire:submit.prevent="save">
        @wire
            <x-form-input name="title" label="عنوان" />
            <x-form-input name="meta_title" label="عنوان متا" />
            <x-form-input name="slug" label="slug"/>
            <x-form-textarea name="desc" label="توضیحات" />
            <x-form-textarea name="meta_desc" label="توضیحات متا" />
            <x-form-input name="image" type="file" label="تصویر شاخص" />
            <x-form-group name="status" label="وضعیت" inline>
                <x-form-radio name="status" value="1" label="فعال" />
                <x-form-radio name="status" value="0" label="غیر فعال" />
            </x-form-group>
        @endwire
        <hr>
        <x-form-submit>ذخیره شود</x-form-submit>
    </x-form>
</div>
