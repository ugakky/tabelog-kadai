<?php

namespace App\Admin\Controllers;

use App\Models\MemberShipFee;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Grid;

class MemberShipFeeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'MemberShipFee';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MemberShipFee());

        $grid->column('id', __('User ID'))->sortable();
        $grid->column('name', __('User Name'))->sortable();
        $grid->column('member_ship_fee', __('member_ship_fee'))->totalRow();
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('name', 'ユーザー名');
            $filter->between('created_at', '登録日')->datetime();
        });

        $grid->disableCreateButton();  //新規作成の操作を使用不可
        $grid->actions(function ($actions) {
            $actions->disableDelete();  //　削除不可
            $actions->disableEdit();  //編集不可
            $actions->disableView();  //表示不可
        });

        return $grid;
    }
}
