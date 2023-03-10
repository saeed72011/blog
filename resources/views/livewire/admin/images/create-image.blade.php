<div class="m-auto col-md-8 col-sm-12">
    <x-form wire:submit.prevent="save" enctype="multipart/form-data" >
        @wire
        <x-form-input name="image" type="file" label="تصویر شاخص" />
        @endwire
        <hr>
        <x-form-submit>افزودن تصویر</x-form-submit>
    </x-form>
</div>
