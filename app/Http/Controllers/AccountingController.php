<?php

namespace App\Http\Controllers;

use App\Models\Accounting;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function addAccounting()
    {
        return view('accounting.add-accounting');
    }

    public function createAccounting(Request $request)
    {
        $request->validate([
            'category'=>'required|max:100',
            'date'=>'required',
            'sum'=>'required|numeric|min:1',
            'final_sum'=>'required|numeric|min:1'
        ],
         [
             'category.required'=>'Категория должна быть заполнена',
             'date.required'=>'Дата должна быть заполнена',
             'sum.required' =>'Сумма должна быть заполнена',
             'min.required'=>'Сумма должна быть равна или больше 1',
             'final_sum.required'=>'Итоговая сумма должна быть заполнена',
             'sum.min' => 'Сумма должна быть равна или больше 1',
             'final_sum.min' => 'Итоговая сумма должна быть равна или больше 1',

             ]);

        $accounting = new Accounting();
        $this->extracted($request, $accounting);
        return back()->with('account_created', 'информация добавлена успешно!');
    }

    public function getAccounting()
    {
        $accounting = Accounting::orderBy('date', 'DESC')->get();
        return view('accounting.accountings', compact('accounting'));
    }

    public function getAccountingById($id)
    {
        $accounting = Accounting::where('id', $id)->first();
        return view('accounting.single-accounting', compact('accounting'));
    }

    public function deleteAccounting($id)
    {
        Accounting::where('id', $id)->delete();
        return back()->with('accounting_deleted', 'Информация удалена успешно!');
    }

    public function editAccounting($id)
    {
        $accounting = Accounting::find($id);
        return view('accounting.edit-accounting', compact('accounting'));
    }

    public function updateAccounting(Request $request)
    {
        $request->validate([
            'category'=>'required|max:100',
            'date'=>'required',
            'sum'=>'required|numeric|min:1',
            'final_sum'=>'required|numeric|min:1'
        ],
        [
            'category.required'=>'Категория должна быть заполнена',
            'date.required'=>'Дата должна быть заполнена',
            'sum.required' =>'Сумма должна быть заполнена',
            'min.required'=>'Сумма должна быть равна или больше 1',
            'final_sum.required'=>'Итоговая сумма должна быть заполнена',
            'sum.min' => 'Сумма должна быть равна или больше 1',
            'final_sum.min' => 'Итоговая сумма должна быть равна или больше 1',
        ]
        );

        $accounting = Accounting::find($request->id);
        $this->extracted($request, $accounting);
        return back()->with('accounting_updated', 'Таблица изменена успешно!');
    }

    /**
     * @param Request $request
     * @param $accounting
     * @return void
     */
    public function extracted(Request $request, $accounting): void
    {
        $accounting->type = $request->type;
        $accounting->category = $request->category;
        $accounting->date = $request->date;
        $accounting->sum = $request->sum;
        $accounting->final_sum = $request->final_sum;
        $accounting->comment = $request->comment;
        $accounting->save();
    }
}
