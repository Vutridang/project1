<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Carbon\Carbon;
use Datetime;
use DateInterval;
use DatePeriod;

class DashboardController extends Controller
{
    public function index(){
        $startDate = Carbon::parse('first day of January')->toDateString();//từ 1/1/2021
        $endDate = Carbon::parse('last day of December')->toDateString();//từ 31/12/2021
        $orders = Order::where('created_at','>=',$startDate.'00:00:00')->where('created_at','<=',$endDate.'23:59:59')->get()->toArray();
        $dataMonth = $this->getMonnthListFromDate($startDate, $endDate);
        $arrPending = [];
        $arrDone = [];
        foreach($dataMonth as $value){
            foreach($orders as $order){
                $monthYear = Carbon::parse($order['created_at'])->format('Y-m');//2021-01
                if($monthYear == $value){
                    if($order['status'] == 1){
                        $arrPending[$value] = isset($arrPending[$value])? $arrPending[$value] + 1 : 1;
                    }else{
                        $arrDone[$value] = isset($arrDone[$value])? $arrDone[$value] + 1 : 1;
                    }

                }else{
                    $arrPending[$value] = isset($arrPending[$value])? $arrPending[$value] : 0;
                     $arrDone[$value] = isset($arrDone[$value])? $arrDone[$value] : 0;
                }

            }
        }
        return view('Admin.index',['pending' => array_values($arrPending), 'done' => array_values($arrDone)]);
    }

    public function getMonnthListFromDate($dateStart, $dateEnd){
        $start = new DateTime($dateStart);//today date
        $end = new DateTime($dateEnd);//Create a datetime object from your Carbon object
        $interval = DateInterval::createFromDateString('1 month');//1 month interval
        $period = new DatePeriod($start, $interval, $end);//get a set of date between the 2 period

        $months = array();
        foreach($period as $dt){
            $months[] = $dt->format("Y-m");
        }
        return $months; // array tháng format: 2021-01 ... 2021-12
    }
}
