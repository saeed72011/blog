<div class="m-auto col-md-8 col-sm-12">
    <x-form wire:submit.prevent="save">
        @wire
        <x-form-input name="name" label="نام و نام خانوادگی" />
        <x-form-input name="position" label="سمت شغلی"/>
        <x-form-input name="sort" label="ترتیب" type="number" />
        <x-form-input name="mobile" label="موبایل "/>
        <x-form-textarea name="desc" label="توضیح"/>
        <x-form-input name="image" type="file" label="عکس" />
        <img src="{{assetFile($team->image)}}" class="img-thumbnail">
        <x-form-group name="status" label="وضعیت" inline>
            <x-form-radio name="status" value="1" label="فعال" />
            <x-form-radio name="status" value="0" label="غیر فعال" />
        </x-form-group>
        <x-form-group name="gender" label="آقا/خانوم" inline>
            <x-form-radio name="gender" value="sir" label="اقا" />
            <x-form-radio name="gender" value="mis" label="خانوم" />
        </x-form-group>
        @endwire
        <hr>
        <x-form-submit>ذخیره شود</x-form-submit>
    </x-form>
</div>
