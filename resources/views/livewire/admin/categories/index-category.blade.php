<div>
    <x-elements.page-template title="تنظیمات دسته" :routs="['categories.index' => 'دسته بندی']">

        <div class="row m-0">
            <x-elements.modal title="ایجاد دسته" live="admin.categories.create-category"/>
        </div>
        <hr>
        <livewire:admin.categories.table-category/>
    </x-elements.page-template>
</div>
