<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ArticleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ArticleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Article::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/article');
        CRUD::setEntityNameStrings('article', 'articles');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'feature_image',
            'label' => 'Thumbnail',
            'type' => 'image',
        ]);
        $this->crud->addColumn([
            'label' => 'Title',
            'name' => 'title'
        ]);
        $this->crud->addColumn([
            'label' => 'Category',
            'name' => 'category_id',
            // 'entity' => 'category',
            // 'attribute' => 'name'
        ]);

        $this->crud->addColumn([
            'label' => 'Created At',
            'name' => 'created_at'
        ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ArticleRequest::class);
        $this->crud->addField([
            'name' => 'title',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'user_id',
            'type' => 'hidden',
            'value' => backpack_user()->id
        ]);

        $this->crud->addField([
            'name' => 'body',
            'label' => 'Body',
            'type' => 'textarea'
        ]);

        $this->crud->addField([
            'name' => 'category_id',
            'label' => 'Category',
            'type' => 'select',
        ]);

        $this->crud->addField([
            'label' => 'Tags',
            'type' => 'select_multiple',
            'name' => 'tags',
            'entity' => 'tags',
            'attribute' => 'name',
            'model' => 'App\Models\Tag',
        ]);

        $this->crud->addField([
            'name' => 'feature_image',
            'label' => 'Thumbnail',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'uploads'
        ]);
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
