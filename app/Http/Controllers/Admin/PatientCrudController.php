<?php

/**
 * @file PatientCrudController.php
 *
 * @date 19.10.2021
 *
 */

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Patient;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class PatientCrudController extends CrudController
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
        CRUD::setModel(Patient::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/patients');
        CRUD::setEntityNameStrings('Пациент', 'Пациенты');
    }
    protected function setupListOperation(): void
    {
        $this->crud->addColumns($this->getColumns());
        $this->crud->disableResponsiveTable();
    }

    protected function setupCreateOperation(): void
    {
//        CRUD::setValidation(DrugCrudControllerRequest::class);

        $this->crud->addFields($this->getFields());
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
//    protected function setupShowOperation(): void
//    {
//        $this->crud->addFields($this->getFields());
//    }


    protected function getColumns(): array
    {
        return [
            [
                'name'  => 'id',
                'type'  => 'number',
                'label' => 'Id',
            ],
            [
                'name'          => 'patient',
                'type'          => 'relationship',
                'relation_type' => 'text',
                'label'         => 'Пациент',
                'entity'        => 'user',
                'attribute'     => 'full_name',
            ],
            [
                'name'          => 'doctor',
                'type'          => 'relationship',
                'relation_type' => 'text',
                'label'         => 'Лечащий врач',
                'entity'        => 'user.doctor',
                'attribute'     => 'full_name',
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
                'name'  => 'is_activated',
                'type'  => 'boolean',
                'label' => 'Активен?',
                'options' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
            ],
            [
                'name'  => 'is_approved',
                'type'  => 'boolean',
                'label' => 'Подтвержден?',
                'options' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
            ],
            [
                'name'  => 'is_profile_filled',
                'type'  => 'boolean',
                'label' => 'Профиль заполнен?',
                'options' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
            ],
            [
                'name'  => 'gender',
                'type'  => 'boolean',
                'label' => 'Пол',
                'options' => [
                    0 => 'Жен',
                    1 => 'Муж',
                ],
            ],
            [
                'name'  => 'birth_date',
                'type'  => 'date',
                'label' => 'День рождения',
            ],
            [
                'name'  => 'height',
                'type'  => 'number',
                'label' => 'Рост',
            ],
            [
                'name'  => 'max_weight',
                'type'  => 'number',
                'label' => 'Максимальный вес',
            ],
            [
                'name'  => 'hospitalisation_date',
                'type'  => 'date',
                'label' => 'День госпитализации',
            ],
            [
                'name'  => 'leaving_date',
                'type'  => 'date',
                'label' => 'День выписки',
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
                'minimum_input_length' => 2,
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
                'name'  => 'is_activated',
                'type'  => 'boolean',
                'label' => 'Активен?',
                'options' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
            ],
            [
                'name'  => 'is_approved',
                'type'  => 'boolean',
                'label' => 'Подтвержден?',
                'options' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
            ],
            [
                'name'  => 'is_profile_filled',
                'type'  => 'boolean',
                'label' => 'Профиль заполнен?',
                'options' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
            ],
        ];
    }
}
