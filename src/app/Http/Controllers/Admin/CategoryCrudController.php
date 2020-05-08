<?php

namespace Backpack\NewsCRUD\app\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\NewsCRUD\app\Http\Requests\CategoryRequest;

class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\InlineCreateOperation;

    public function setup()
    {
        CRUD::setModel("Backpack\NewsCRUD\app\Models\Category");
        CRUD::setRoute(config('backpack.base.route_prefix', 'admin').'/category');
        CRUD::setEntityNameStrings('category', 'categories');
    }

    protected function setupListOperation()
    {
        CRUD::addColumn('name');
        CRUD::addColumn('slug');
        CRUD::addColumn('parent');
        CRUD::addColumn([   // select_multiple: n-n relationship (with pivot table)
            'label'     => 'Articles', // Table column heading
            'type'      => 'relationship_count',
            'name'      => 'articles', // the method that defines the relationship in your Model
            'wrapper'   => [
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('article?category_id='.$entry->getKey());
                },
            ],
        ]);
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();

        CRUD::addColumn('created_at');
        CRUD::addColumn('updated_at');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(CategoryRequest::class);

        CRUD::addField([
            'name' => 'name',
            'label' => 'Name',
        ]);
        CRUD::addField([
            'name' => 'slug',
            'label' => 'Slug (URL)',
            'type' => 'text',
            'hint' => 'Will be automatically generated from your name, if left empty.',
            // 'disabled' => 'disabled'
        ]);
        CRUD::addField([
            'label' => 'Parent',
            'type' => 'select',
            'name' => 'parent_id',
            'entity' => 'parent',
            'attribute' => 'name',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupReorderOperation()
    {
        CRUD::set('reorder.label', 'name');
        CRUD::set('reorder.max_level', 2);
    }
}
