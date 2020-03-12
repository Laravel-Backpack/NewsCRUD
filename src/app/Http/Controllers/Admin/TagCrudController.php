<?php

namespace Backpack\NewsCRUD\app\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\NewsCRUD\app\Http\Requests\TagRequest;

class TagCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\InlineCreateOperation;

    public function setup()
    {
        $this->crud->setModel("Backpack\NewsCRUD\app\Models\Tag");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/tag');
        $this->crud->setEntityNameStrings('tag', 'tags');
        $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TagRequest::class);
    }

    protected function setupUpdateOperation()
    {
        $this->crud->setValidation(TagRequest::class);
    }
}
