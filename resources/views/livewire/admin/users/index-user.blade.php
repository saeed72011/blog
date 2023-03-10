<div>
    <x-elements.page-template title="تنظیمات کاربران" :routs="['users.index' => 'کاربران']">

        <x-elements.modal title="ایجاد کاربر" live="admin.users.create-user"/>

        <hr>
        <livewire:admin.users.table-user/>
    </x-elements.page-template>
</div>
