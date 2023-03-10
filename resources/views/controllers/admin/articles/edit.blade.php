@extends('layouts.admin.app')

@section('content')
    <div class="m-auto col-md-10 col-sm-12">
        <x-elements.page-template title="ویرایش مقاله" :routs="['articles.index' => '  مقالات', 'ایجاد مقاله']">
            <x-form :action="route('articles.update', ['article' => $article])" enctype="multipart/form-data">
                @method('PUT')
                @bind($article)
                <x-form-input name="title" label="عنوان "/>
                <x-form-input name="meta_title" label="عنوان متا"/>
                <x-form-input name="slug" label="پسوند url "/>
                <x-form-input name="author" label="نویسنده"/>
                <x-form-input name="study_time" label="زمان مطالعه" type="number"/>
                <x-form-input name="image" label="عکس" type="file"/>
                <img src="{{assetFile($article->image)}}" class="img-thumbnail m-auto">
                <x-form-input name="video" label="ویدیو" type="file"/>
                <video class="img-thumbnail m-auto" controls="controls">
                    <source src="{{assetFile($article->video)}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <x-form-textarea name="meta_desc" label="توضیحات متا"/>
                <x-form-group name="status" label="وضعیت" inline>
                    <x-form-radio name="status" value="1" label="فعال"/>
                    <x-form-radio name="status" value="0" label="غیر فعال"/>
                </x-form-group>
                <x-form-textarea id="ckeditor" class="editor" name="desc" row="30"/>
                @endbind
                <hr>
                <x-form-submit class="btn btn-primary fixed-bottom text-right w-25">ذخیره شود</x-form-submit>
            </x-form>

            <hr>

            <hr>
            <livewire:admin.categorizables.index-categorizable :modelId="$article->id" modelNames="articles"
                                                               :wire:key="'category-'.$portfolio->id"/>
        </x-elements.page-template>

    </div>


@endsection
