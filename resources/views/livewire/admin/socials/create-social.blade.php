<div class="m-auto col-md-8 col-sm-12">
    <x-form wire:submit.prevent="save">
        @wire
        <x-form-input name="title" label="عنوان" />
        <x-form-input name="icon" label="آیکون" />
        <a href="https://fontawesome.com/v4/icons/" rel="nofollow"> لینک آیکون </a>
        <x-form-input name="url" label="آدرس" />

        @endwire
        <hr>
        <x-form-submit>ذخیره شود</x-form-submit>
    </x-form>
</div>
