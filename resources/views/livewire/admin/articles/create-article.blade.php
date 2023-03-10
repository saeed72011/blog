<div class="m-auto col-md-10 col-sm-12">
    <x-elements.page-template title="افزودن مقاله" :routs="['articles.index' => '  مقالات', 'ایجاد مقاله']">
        <x-form enctype="multipart/form-data" method="get" onsubmit="return false">
            @wire
            <x-form-input name="title" label="عنوان "/>
            <x-form-input name="meta_title" label="عنوان متا"/>
            <x-form-input name="slug" label="پسوند url "/>
            <x-form-input name="author" label="نویسنده"/>
            <x-form-input name="study_time" label="زمان مطالعه " type="number"/>
            <x-form-input name="image" label="عکس" type="file"/>
            <x-form-input name="video" label="ویدیو" type="file"/>
            <x-form-select name="user_id" :options="$users" placeholder="نویسنده"/>
            <x-form-select name="category_id" :options="$categories" placeholder="دیته بندی"/>
            <x-form-textarea name="meta_desc" label="توضیحات متا"/>
            <x-form-group name="status" label="وضعیت" inline>
                <x-form-radio name="status" value="1" label="فعال"/>
                <x-form-radio name="status" value="0" label="غیر فعال"/>
            </x-form-group>
            <div wire:ignore>
                <x-form-textarea id="ckeditor" class="editor" name="desc" row="30"/>
            </div>
            @error('desc') <span class="error text-danger">{{ $message }}</span> @enderror
            @endwire
            <hr>
            <x-form-submit id="submitArticleCreateForm">ذخیره شود</x-form-submit>
        </x-form>
    </x-elements.page-template>

    @push('scripts')
        <script>
            document.querySelector('#submitArticleCreateForm').addEventListener('click', () => {
                let desc = editor.getData();
                Livewire.emit('descValue', desc)
            });
        </script>
    @endpush

</div>
