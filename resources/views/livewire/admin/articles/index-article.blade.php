<div>
    <x-elements.page-template title="مقالات" :routs="['articles.index' => 'مقالات']">
        <a href="{{route('articles.create')}}" class="btn btn-success mb-2">ایجاد مقاله</a>
        <livewire:admin.articles.table-article/>
    </x-elements.page-template>
</div>
