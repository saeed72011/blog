<div>
    <x-elements.page-template title="اعضای تیم" :routs="['teams.index' => 'تیم']">

        <div class="row m-0">
            <x-elements.modal title="ایجاد " live="admin.teams.create-team"/>
        </div>
        <hr>
        <livewire:admin.teams.table-team/>
    </x-elements.page-template>
</div>
