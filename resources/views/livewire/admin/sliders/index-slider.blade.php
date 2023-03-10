<div>
    <x-elements.page-template title="تنظیمات اسلایدر" :routs="['sliders.index' => 'دسته بندی']">

        <div class="row m-0">
            <x-elements.modal title="ایجاد " live="admin.sliders.create-slider"/>
        </div>
        <hr>
        <livewire:admin.sliders.table-slider/>
    </x-elements.page-template>
</div>
