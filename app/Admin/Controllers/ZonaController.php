<?php

namespace App\Admin\Controllers;

use App\Zona;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ZonaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Zona dan Gejala';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Zona);

        $grid->column('id', __('Id'));
        $grid->column('nama', __('Nama'));
        $grid->column('alias', __('Alias'));
        $grid->column('gejala', __('Gejala'));

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
        $show = new Show(Zona::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nama', __('Nama'));
        $show->field('alias', __('Alias'));
        $show->gejala('Gejala')->as(function ($gejala) {
            return json_encode($gejala,JSON_PRETTY_PRINT);
        })->unescape();

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Zona);

        $form->text('nama', __('Nama'));
        $form->text('alias', __('Alias'));
        $form->json('gejala', __('Gejala'));

        return $form;
    }
}
