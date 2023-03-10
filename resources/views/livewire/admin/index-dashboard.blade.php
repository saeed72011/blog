
<div>

    <x-elements.page-template title="داشبورد" :routs="[]">

        <ul class="nav nav-tabs" role="tablist">
            <x-elements.tab-link title="ویرایش" idTab="editTab" active="1"/>
            <x-elements.tab-link title="توضیحات برای صفحه اول" idTab="desc" />
        </ul>

        <div class="tab-content">
            <x-elements.tab idTab="editTab" active="1">
                <livewire:admin.setting.edit-setting />
            </x-elements.tab>

            <x-elements.tab idTab="desc" >

                <x-form :action="route('setting.desc.update')">
                    @method('PUT')
                    @bind($setting)
                    <x-form-textarea id="ckeditor" class="editor" name="desc" row="30"/>
                    @endbind
                    <hr>
                    <x-form-submit class="btn btn-primary fixed-bottom text-right w-25">ذخیره شود</x-form-submit>
                </x-form>

            </x-elements.tab>

        </div>

    </x-elements.page-template>

</div>
