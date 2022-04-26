<?php

/**
 * @file BmiCrudController.php
 * MonitoringListResource
 * @date 20.05.2021
 *
 */

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BmiRequest;
use App\Models\Bmi;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BmiCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BmiCrudController extends CrudController
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
        CRUD::setModel(Bmi::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/bmi');
        CRUD::setEntityNameStrings('значение', 'Индекс массы тела');
    }

    protected function setupListOperation(): void
    {
        $this->crud->addColumns($this->getColumns());
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(BmiRequest::class);

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
                'name'  => 'id',
                'type'  => 'number',
                'label' => 'id',
            ],
            [
                'name'  => 'min',
                'type'  => 'text',
                'label' => 'Мин. значение',
            ],
            [
                'name'  => 'max',
                'type'  => 'text',
                'label' => 'Макс. значение',
            ],
            [
                'name'    => 'is_diabetic',
                'type'    => 'boolean',
                'label'   => 'Диабетик?',
                'options' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
            ],
            [
                'name'  => 'title',
                'type'  => 'text',
                'label' => 'Заголовок',
            ],
        ];
    }

    protected function getFields(): array
    {
        return [
            [
                'name'  => 'min',
                'type'  => 'number',
                'attributes' => ["step" => "any"],
                'label' => 'Мин. значение',
            ],
            [
                'name'  => 'max',
                'type'  => 'number',
                'attributes' => ["step" => "any"],
                'label' => 'Макс. значение',
            ],
            [
                'name'    => 'is_diabetic',
                'type'    => 'boolean',
                'label'   => 'Диабетик?',
                'options' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
            ],
            [
                'name'  => 'title',
                'type'  => 'text',
                'label' => 'Заголовок',
            ],
            [
                'name'  => 'text',
                'type'  => 'textarea',
                'label' => 'Описание',
                'attributes' => [
                    'rows' => 10,
                ],
            ],
        ];
    }
}
