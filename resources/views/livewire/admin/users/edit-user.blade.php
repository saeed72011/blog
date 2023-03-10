<div class="m-auto col-md-6 col-sm-12">
    <x-form wire:submit.prevent="save">
        @wire
        <x-form-input name="name" label="نام کاربری "/>
        <x-form-input name="email" label="ایمیل"/>
        <x-form-input name="password" label="رمز"/>
        @endwire
        <hr>
        <x-form-submit>ویرایش شود</x-form-submit>
    </x-form>
</div>
