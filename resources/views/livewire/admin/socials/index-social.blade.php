<div>
    <x-elements.page-template title="شبکه های اجتماعی" :routs="['socials.index' => 'افزودن شبکه اجتماعی']">

        <div class="row m-0">
            <x-elements.modal title="ایجاد" live="admin.socials.create-social"/>
        </div>
        <hr>
        <livewire:admin.socials.table-social/>
    </x-elements.page-template>
</div>
