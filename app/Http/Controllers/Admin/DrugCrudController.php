<?php

/**
 * @file DrugCrudController.php
 * MonitoringListResource
 * @date 20.05.2021
 *
 */

namespace App\Http\Controllers\Admin;

use App\Models\Drug;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DrugCrudControllerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DrugCrudController extends CrudController
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
        CRUD::setModel(Drug::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/drugs');
        CRUD::setEntityNameStrings('Лекарство', 'Лекарства');
    }

    protected function setupListOperation(): void
    {
        $this->crud->addFilter(
            [
                'type'  => 'text',
                'name'  => 'patient',
                'label' => 'Найти по пациенту',
            ],
            false,
            function ($value) {
                $this->crud->query = $this->crud->query->whereHas('patient.user', function ($query) use ($value) {
                    $query->where('full_name', 'LIKE', "%$value%");
                });
            }
        );

        $this->crud->addColumns($this->getColumns());
    }

    public function update()
    {
        $this->crud->hasAccessOrFail('update');

        // execute the FormRequest authorization and validation, if one is required
        $request = $this->crud->validateRequest();
        $request['timers'] = json_decode($request['timers']);

        // update the row in the db
        $item = $this->crud->update(
            $request->get($this->crud->model->getKeyName()),
            $this->crud->getStrippedSaveRequest()
        );
        $this->data['entry'] = $this->crud->entry = $item;

        // show a success message
        \Alert::success(trans('backpack::crud.update_success'))->flash();

        // save the redirect choice for next time
        $this->crud->setSaveAction();

        return $this->crud->performSaveAction($item->getKey());
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

    protected function setupShowOperation(): void
    {
        $this->crud->addFields($this->getFields());
    }

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
                'entity'        => 'patient.user',
                'attribute'     => 'full_name',
            ],
            [
                'name'  => 'title',
                'type'  => 'text',
                'label' => 'Название',
            ],
            [
                'name'  => 'frequency',
                'type'  => 'text',
                'label' => 'Частота приёма',
            ],
            [
                'name'  => 'timers',
                'type'  => 'text',
                'label' => 'Время приёма',
            ],
        ];
    }

    protected function getFields(): array
    {
        return [
            [
                'name'      => 'patient',
                'type'      => 'relationship',
                'label'     => 'Пациент',
                'entity'    => 'patient',
                'attribute' => 'full_name',
                'options'   => (function ($query) {
                    foreach ($options = $query->get() as $patient) {
                        $patient->setAttribute('full_name', $patient->user->getAttribute('full_name'));
                    }

                    return $options;
                }),
            ],
            [
                'name'  => 'title',
                'type'  => 'text',
                'label' => 'Название',
            ],
            [
                'name' => 'dosage',
                'type' => 'textarea',
                'label' => 'Дозировка',
            ],
            [
                'name' => 'planned',
                'type' => 'textarea',
                'label' => 'Когда принимать',
            ],
            [
                'name' => 'start_date',
                'type' => 'datetime',
                'label' => 'Дата начала приёма',
            ],
            [
                'name' => 'end_date',
                'type' => 'datetime',
                'label' => 'Дата конца приёма',
            ],
            [
                'name'        => 'frequency',
                'type'        => 'select_from_array',
                'label'       => 'Частота приёма',
                'options'     => Drug::FREQUENCIES,
                'allows_null' => false,
            ],
            [
                'name'            => 'timers',
                'type'            => 'text',
                'label'           => 'Время приёма',
                'entity_singular' => 'время',
                'columns'         => [
                    'key' => 'Время',
                ],
                'max'             => array_count_values(Drug::FREQUENCIES),
                'min'             => 0,
            ],
        ];
    }
}
