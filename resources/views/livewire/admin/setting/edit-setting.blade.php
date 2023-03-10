<div class="m-auto col-md-8 col-sm-12">
    <x-form wire:submit.prevent="save">
        @wire
        <x-form-input name="setting.name" label="نام سایت"/>
        <x-form-input name="setting.title" label="عنوان سایت"/>
        <x-form-input name="setting.meta_title" label="عنوان سئو"/>
        <x-form-input name="setting.url" label="آدرس سایت"/>
        <x-form-input name="setting.phone" label="شماره تلفن"/>
        <x-form-input name="setting.mobile" label="شماره موبایل"/>
        <x-form-input name="setting.city" label="شهر"/>
        <x-form-input name="setting.address" label="آدرس"/>
        <x-form-input name="setting.email" label="ایمیل"/>
        <x-form-input name="setting.opens" label="ساعت شروع"/>
        <x-form-input name="setting.closes" label="ساعت پایان"/>
        <x-form-input name="setting.latitude" label="عرض جغرافیایی -latitude "/>
        <x-form-input name="setting.longitude" label="طول جغرافیایی -longitude"/>
        <x-form-textarea name="setting.meta_desc" label="توضیحات سئو"/>
        <x-form-textarea name="setting.about" label="درباره ما"/>
        <div class="row">
            <div class="col-3">
                <x-form-input name="logo" type="file" label="لوگو"/>
                <img src="{{asset('storage/'. $setting->logo)}}" alt="logo">
            </div>
            <div class="col-3">
                <x-form-input name="image" type="file" label="تصویری برای معرفی"/>
                <img src="{{asset('storage/'. $setting->image)}}" alt="image">
            </div>
            <div class="col-3">
                <x-form-input name="video" type="file" label="ویدیو برای معرفی"/>
                <video controls>
                    <source src="{{asset('storage/'. $setting->video)}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="col-3">
                <x-form-input name="favicon" type="file" label="favicon"/>
                <img src="{{asset('storage/'. $setting->favicon)}}" alt="favicon">
            </div>

        </div>

        <x-form-group name="setting.index" label="وضعیت ایندکس ربات گوگل" inline>
            <x-form-radio name="setting.index" value="1" label="بله - ایندکس شود"/>
            <x-form-radio name="setting.index" value="0" label="خیر - ایندکس نشود"/>
        </x-form-group>
        @endwire
        <hr>
        <x-form-submit>ذخیره شود</x-form-submit>
    </x-form>
</div>

