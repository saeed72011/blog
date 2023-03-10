<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Http\Livewire\Admin\BaseDataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Article;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class TableArticle extends BaseDataTableComponent
{
    protected $model = Article::class;
    protected $listeners = [
        'refresh' => '$refresh',
        'destroy', 'cancelled'
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("شناسه", "id"),
            Column::make("نامک", "slug"),
            Column::make("عنوان", "title"),
            Column::make("نویسنده", "author"),
            Column::make("بازدید", "view"),
            Column::make("زمان مطالعه", "study_time"),
            BooleanColumn::make("وضعیت", "status"),
            LinkColumn::make('ویرایش')
                ->title(fn($row) => 'ویرایش')
                ->location(fn($row) => route('articles.edit', $row->slug)),

            Column::make("حذف", "id")
                ->format(
                    fn($value, $row, Column $column) => "<button class='btn btn-sm btn-outline-danger' wire:click='delete($row->id)'>x</button>"
                )
                ->html()

        ];
    }
}
