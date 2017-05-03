<?php
namespace App\Http\Controllers\Admin\Restoran;

use DB;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Restoran;
use App\Model\RestoranData;
use App\Model\SysDirectoryName;
use App\Model\RestoranKicthen;
use App\Model\RestoranLocation;
use App\Model\RestoranRaiting;
use App\Model\Generators\ModelSnipet;

class EditController extends Controller{
    function getItem (Request $request, $id = 0){
        $item = Restoran::find($id);

        $ar = array();
        if ($item){
            $ar['title'] = 'Изменение ресторана - '.$item->name;
            $ar['action'] = action('Admin\Restoran\EditController@postItem', $item->id);
            $ar['kitchens'] = (array)$item->relKitchens()->select('kitchen_id')->get()->keyBy('kitchen_id')->toArray();
            $ar['r_data'] = $item->relData;
        }
        else {
            $ar['title'] = 'Добавление ресторана';
            $ar['action'] = action('Admin\Restoran\EditController@postItem');
            $ar['r_data'] = false;
        }

        $ar['item'] = $item;
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');
        $ar['ar_kitchen'] = SysDirectoryName::where('parent_id', 5)->lists('name', 'id');
        $ar['ar_boolen_view'] = array(0=>'Нет', 1=>'Да');
        $ar['ar_for_admin_select'] = array('Процент'=>'Процент', 'Тенге'=>'Тенге');
        $ar['ar_delivery_type_ar'] = Restoran::getDeliveryTypeAr();

        //echo '<pre>'; print_r($ar['kitchens']); echo '</pre>'; exit();

        return view('admin.restoran.edit', $ar);
    }

    function postItem(Request $request, $id = 0){
        $data = $request->all();
        $ar_kitchen = SysDirectoryName::where('parent_id', 5)->lists('name', 'id');
        //echo '<pre>'; print_r($data); echo '</pre>'; exit();

        DB::beginTransaction();

        $item = Restoran::find($id);
        if (!$item){
            $item = new Restoran();
            if (!$request->has('email') || !$request->has('password') || User::where('email', $request->input('email'))->count()){
                DB::rollback();
                return redirect()->back()->with('error', 'Email уже существует');
            }

            $user = new User();
            $user->type_id = 3;
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            $item->user_id = $user->id;

            $r_data = new RestoranData();
            $raiting = new RestoranRaiting();
        }
        else {
            $r_data = $item->relData;
            $raiting = $item->relReiting;
        }

        if ($request->hasFile('logo'))
            $item->logo = ModelSnipet::setImage($request->file('logo'), 'logo', 224, 150);
        if ($request->hasFile('photo'))
            $item->photo = ModelSnipet::setImage($request->file('photo'), 'logo', 1170, 250);

        $item->city_id = $request->input('city_id');
        $item->name = $request->input('name');
        $item->epay = $request->input('epay');

        if ($request->input('is_special') == 'is_gold')
            $item->is_gold = 1;
        else
            $item->is_gold = 0;

        if ($request->input('is_special') == 'is_platinum')
            $item->is_platinum = 1;
        else
            $item->is_platinum = 0;

        $item->betin_time = $request->input('betin_time');
        $item->end_time = $request->input('end_time');
        $item->delivery_type = $request->input('delivery_type');

        $item->save();

        RestoranKicthen::where('restoran_id', $item->id)->delete();
        if ($request->has('kitchen')){
            foreach ($request->input('kitchen') as $k_id){
                if (!isset($ar_kitchen[$k_id]))
                    continue;
                $kitchen = new RestoranKicthen();
                $kitchen->restoran_id = $item->id;
                $kitchen->kitchen_id = $k_id;
                $kitchen->kitchen_name = $ar_kitchen[$k_id];
                $kitchen->save();
            }
        }


        $r_data->restoran_id = $item->id;
        $r_data->short_note = $request->input('data.short_note');
        $r_data->note = $request->input('data.note');
        $r_data->min_price = $request->input('data.min_price');
        $r_data->contacts = $request->input('data.contacts');
        $r_data->director_name = $request->input('data.director_name');
        $r_data->director_contacts = $request->input('data.director_contacts');
        $r_data->address = $request->input('data.address');
        $r_data->delivery_price = $request->input('data.delivery_price');

        $r_data->for_admin_work_time = $request->input('data.for_admin_work_time');
        $r_data->for_admin_manager = $request->input('data.for_admin_manager');
        $r_data->for_admin_select = $request->input('data.for_admin_select');
        $r_data->for_admin_count = $request->input('data.for_admin_count');

        $r_data->save();

        $raiting->restoran_id = $item->id;
        $raiting->save();

        DB::commit();

        return redirect()->action('Admin\Restoran\EditController@getItem', $item->id)->with('success', 'Сохранено');
    }


}
