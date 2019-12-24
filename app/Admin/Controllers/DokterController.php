<?php

namespace App\Admin\Controllers;

use App\Dokter;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DokterController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Dokter';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Dokter);

        $grid->column('id', __('Id'));
        $grid->column('pasiens.nama', __('Pasien'));
        $grid->column('dokters.nama', __('Dokter'));

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
        $show = new Show(Dokter::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('pasien', __('Pasien'));
        $show->field('dokter', __('Dokter'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Dokter);

        $form->number('pasien', __('Pasien'));
        $form->number('dokter', __('Dokter'));

        return $form;
    }
}
