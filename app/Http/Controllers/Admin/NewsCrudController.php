<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class NewsCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    /**
     * @throws \Exception
     */
    public function setup(): void
    {
        CRUD::setModel(News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings('новость', 'Новости');
    }

    protected function setupListOperation(): void
    {
        $this->crud->addColumns($this->getColumns());
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(NewsRequest::class);

        $this->crud->addFields($this->getFields());
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation(): void
    {
        $this->crud->addColumns($this->getColumns());
    }

    protected function getColumns(): array
    {
        return [
            [
                'name' => 'id',
                'type' => 'number',
                'label' => 'id',
            ],
            [
                'name' => 'title_en',
                'type' => 'text',
                'label' => 'Заголовок  английский',
            ],
            [
                'name' => 'title_ru',
                'type' => 'text',
                'label' => 'Заголовок',
            ],
            [
                'name' => 'preview_ru',
                'type' => 'text',
                'label' => 'Превью русское',
            ],
            [
                'name' => 'preview_ru',
                'type' => 'text',
                'label' => 'Превью английское',
            ],
            [
                'name' => 'text_ru',
                'type' => 'text',
                'label' => 'Текст новости',
            ],
            [
                'name' => 'text_en',
                'type' => 'text',
                'label' => 'Текст новости английский',
            ],
            [
                'name' => 'active',
                'type' => 'boolean',
                'label' => 'Активность',
                'options' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
            ],
        ];
    }

    protected function getFields(): array
    {
        return [
            [
                'name' => 'title_ru',
                'type' => 'text',
                'label' => 'Заголовок',
            ],
            [
                'name' => 'title_en',
                'type' => 'text',
                'label' => 'Заголовок английский',
            ],
            [
                'name' => 'active',
                'type' => 'boolean',
                'label' => 'Активность',
                'options' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
            ],
            [
                'name' => 'start_day',
                'type' => 'text',
                'label' => 'Дата',
            ],
            [
                'name' => 'end_day',
                'type' => 'text',
                'label' => 'Дата окончания',
            ],
            [
                'name' => 'type',
                'type' => 'text',
                'label' => 'Тип новости',
            ],
            [
                'name' => 'preview_ru',
                'type' => 'ckeditor',
                'label' => 'Превью русское',
                'attributes' => [
                    'rows' => 10,
                ],
                'options' => [
                    'autoGrow_minHeight' => 200,
                    'autoGrow_bottomSpace' => 50,
                    'removePlugins' => 'resize,maximize,embed,anchor',
                ],
            ],
            [
                'name' => 'preview_en',
                'type' => 'ckeditor',
                'label' => 'Превью английское',
                'attributes' => [
                    'rows' => 10,
                ],
                'options' => [
                    'autoGrow_minHeight' => 200,
                    'autoGrow_bottomSpace' => 50,
                    'removePlugins' => 'resize,maximize,embed,anchor',
                ],
            ],
            [
                'name' => 'text_ru',
                'type' => 'ckeditor',
                'label' => 'Описание',
                'attributes' => [
                    'rows' => 10,
                ],
                'options' => [
                    'autoGrow_minHeight' => 200,
                    'autoGrow_bottomSpace' => 50,
                    'removePlugins' => 'resize,maximize,embed,anchor',
                ],
            ],
            [
                'name' => 'text_en',
                'type' => 'ckeditor',
                'label' => 'Английский текст',
                'attributes' => [
                    'rows' => 10,
                ],
                'options' => [
                    'autoGrow_minHeight' => 200,
                    'autoGrow_bottomSpace' => 50,
                    'removePlugins' => 'resize,maximize,embed,anchor',
                ],
            ],
        ];
    }
}
