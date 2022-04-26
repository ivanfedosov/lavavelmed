<?php

/**
 * @file DoctorCrudController.php
 *
 * @date 19.10.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DoctorCrudControllerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DoctorCrudController extends CrudController
{
    use ListOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    /**
     * @throws \Exception
     */
    public function setup(): void
    {
        CRUD::setModel(Doctor::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/doctors');
        CRUD::setEntityNameStrings('Доктор', 'Доктора');
    }

    protected function setupListOperation(): void
    {
        $this->crud->addColumns($this->getColumns());
        $this->crud->disableResponsiveTable();
    }

//    protected function setupShowOperation(): void
//    {
//        $this->crud->addFields($this->getFields());
//    }

    protected function setupCreateOperation(): void
    {
//        CRUD::setValidation(DrugCrudControllerRequest::class);

        $this->crud->addFields($this->getFields());
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

    protected function getColumns(): array
    {
        return [
            [
                'name' => 'id',
                'type' => 'number',
                'label' => 'Id',
            ],
            [
                'name' => 'doctor',
                'type' => 'relationship',
                'relation_type' => 'text',
                'label' => 'Доктор',
                'entity' => 'user',
                'attribute' => 'full_name',
            ],
            [
                'name' => 'qualification',
                'type' => 'text',
                'label' => 'Квалификация',
            ],
            [
                'name' => 'job',
                'type' => 'text',
                'label' => 'Работа',
            ],
            [
                'name' => 'experience',
                'type' => 'text',
                'label' => 'Опыт работы',
            ],
            [
                'name' => 'is_activated',
                'type' => 'boolean',
                'label' => 'Активен?',
                'options' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
            ],
            [
                'name' => 'link_facebook',
                'type' => 'text',
                'label' => 'Ссылка на фейсбук',
            ],
            [
                'name' => 'link_twitter',
                'type' => 'text',
                'label' => 'Ссылка на твиттер',
            ],
            [
                'name' => 'link_instagram',
                'type' => 'text',
                'label' => 'Ссылка на инстаграмм',
            ],
            [
                'name' => 'link_prodoctorov',
                'type' => 'text',
                'label' => 'Ссылка на продокторов',
            ],
        ];
    }

    protected function getFields(): array
    {
        return [
            [
                'label' => 'User',
                'type' => 'select2_from_ajax',
                'name' => 'user_id',
                'entity' => 'user',
                'attribute' => 'full_name',
                'model' => User::class,
                'data_source' => url('admin/look/search-suggest'),
                'placeholder' => 'Select a look',
                'minimum_input_length' => 1,
            ],
            [
                'name' => 'qualification',
                'type' => 'text',
                'label' => 'Квалификация',
            ],
            [
                'name' => 'job',
                'type' => 'text',
                'label' => 'Работа',
            ],
            [
                'name' => 'experience',
                'type' => 'text',
                'label' => 'Опыт работы',
            ],
            [
                'name' => 'is_activated',
                'type' => 'boolean',
                'label' => 'Активен?',
                'options' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
            ],
        ];
    }
}
