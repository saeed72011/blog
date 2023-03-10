<div>
    <x-elements.page-template title="نمونه کار" :routs="['portfolios.index' => 'بخش نمونه کار']">

        <div class="row m-0">
            <x-elements.modal title="ایجاد " live="admin.portfolios.create-portfolio"/>
        </div>
        <hr>
        <livewire:admin.portfolios.table-portfolio/>
    </x-elements.page-template>
</div>
