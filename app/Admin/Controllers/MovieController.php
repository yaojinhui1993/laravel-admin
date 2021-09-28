<?php

namespace App\Admin\Controllers;

use App\Models\Movie;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MovieController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Movie';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Movie());

        $grid->column('id', 'ID')->sortable();
        $grid->column('title');
        $grid->column('director')->display(function ($userId) {
            return User::find($userId)->name;
        });

        $grid->column('describe');

        $grid->column('rate');

        $grid->column('released', '上映?')->display(function ($released) {
            return $released ? '是' : '否';
        });

        $grid->column('release_at');
        $grid->column('created_at');
        $grid->column('updated_at');

        $grid->filter(function ($filter) {
            $filter->between('created_at', 'Created Time')->datetime();
        });

        $grid->paginate(10);

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Movie::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Movie());



        return $form;
    }
}
