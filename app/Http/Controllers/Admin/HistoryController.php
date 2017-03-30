<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Restoran;
use App\Model\Order;
use App\Model\Generators\OrderStatus;
use App\Model\SysDirectoryName;
use Maatwebsite\Excel\Facades\Excel as Excel;

class HistoryController extends Controller{
    function getList (Request $request){
        $orders = Order::where('id', '>', 0);

        if (($request->has('filter.city_id') && $request->input('filter.city_id')) || ($request->has('filter.r_name')))
            $orders = $orders->whereHas('relRestoran', function($q) use ($request) {
                if ($request->has('filter.city_id') && $request->input('filter.city_id'))
                    $q = $q->where('city_id', $request->input('filter.city_id'));
                if ($request->has('filter.r_name'))
                    $q = $q->where('name', 'like', '%'.$request->input('filter.r_name').'%');
            });

        if ($request->has('filter.status_id') && $request->input('filter.status_id'))
            $orders = $orders->where('status_id', $request->input('filter.status_id'));

        if ($request->has('filter.customer_name'))
            $orders = $orders->whereHas('relCustomer', function($q) use ($request){
                $q->where('name', 'like', '%'.$request->input('filter.customer_name').'%');
            });



        $ar = array();
        $ar['title'] = "Трекинг";
        $ar['ar_input'] = $request->all();
        $ar['ar_status'] = OrderStatus::getStatusAr();
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');

        if ($request->has('download'))
            return $this->generateExel($ar, $orders);

        $ar['orders'] = $orders->with('relCustomer', 'relRestoran')->orderBy('id', 'desc')->paginate(24);

        return view('admin.history.index', $ar);
    }

    function generateExel($ar, $orders){
        $orders = $orders->with('relCustomer', 'relRestoran')->orderBy('id', 'desc')->get();

        $data = array(
            array('ID', 'Ресторан','Статус','Город','Ф.И.О.','Почта','Адрес','Способ оплаты', 'Итоговая сумма', 'Время оформления', 'Сумма')
        );

        extract($ar, EXTR_PREFIX_SAME, "wddx");

        foreach ($orders as $o){
            $row = array();
            $row[] = $o->id;
            $row[] = $o->relRestoran->name;
            $row[] = $ar_status[$o->status_id];
            $row[] = $ar_city[$o->relRestoran->city_id];
            $row[] = $o->relCustomer->name;
            $row[] = $o->relCustomer->relUser->email;
            $row[] = $o->relCustomer->full_adress;
            $row[] = 'Наличными курьеру';
            $row[] = $o->total_sum;
            $row[] = $o->duration;
            $row[] = $o->total_sum;

            $data[] = $row;
        }

        Excel::create('download', function($excel) use ($data) {
            // Set the title
            $excel->setTitle('no title');
            $excel->setCreator('no no creator')->setCompany('no company');
            $excel->setDescription('report file');

            $excel->sheet('sheet1', function($sheet) use ($data) {

                $sheet->fromArray($data, null, 'A1', false, false);
                $sheet->cells('A1:K1', function($cells) {
                    $cells->setBackground('#AAAAFF');

                });
            });
        })->download('xlsx');
    }

}
