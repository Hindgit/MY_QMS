<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Services;
use App\Console;
use App\Display;
use App\Charts\SampleChart;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ChartController extends Controller
{
    public function index(Request $request)
    {
        //Affiche Nombre in cards
        $users = User::count();
        $services = Services::count();
        $display = Display::count();
        $console = Console::count();
        $dis = Display::count();

        return view('home',compact('users','services','console','dis'));
    }

    public function dashboard(Request $request, $date1, $date2)
    {
        //Premier Chart
        $results = DB::select("SELECT to_char(created_at, 'DAY') as month, count(*) as nbuser FROM users where created_at >= ? and created_at <= ?  GROUP BY month",[$date1 , $date2]);

        $nbuser = [];
        $month = [];
        foreach ($results as $res) {
            array_push($nbuser, $res->nbuser);
            array_push($month, $res->month);
        }

        $chart = new SampleChart;


        $chart->labels($month);
        $chart->dataset('Users', 'line', $nbuser);

        //Deuxieme Chart


        $resu = DB::select("SELECT name , count(service_tp_id) as nbtick FROM services where created_at >= ? and created_at <= ? GROUP BY name",[$date1 , $date2]);

        $nbtick = [];
        $name = [];
        foreach ($resu as $re) {
            array_push($nbtick, $re->nbtick);
            array_push($name, $re->name);
        }

        $cha = new SampleChart;
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];

        $cha->labels($name);
        $cha->dataset(' Nombre ticket', 'bar',$nbtick)
            ->color($borderColors)
            ->backgroundcolor($fillColors);

        //Troisieme chart
        // condition with datetime (today)
        $result = DB::select("SELECT to_char(created_at, 'DAY') as month,count(*) as nbuser FROM services where created_at >= ? and created_at <= ? GROUP BY month",[$date1 , $date2]);

        $nbuser = [];
        $month = [];
        foreach ($result as $resu) {
            array_push($nbuser, $resu->nbuser);
            array_push($month, $resu->month);
        }
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];

        $char = new SampleChart;
        $char->labels($month);
        $char->dataset('Service', 'pie', $nbuser)
            ->color($borderColors)
            ->backgroundcolor($fillColors);
        $uses = DB::select("SELECT u.name as nomuser , count(*) as nbtick FROM tickets t INNER JOIN users u ON t.user_id = u.id where u.created_at >= ? and u.created_at <= ? GROUP BY nomuser",[$date1 , $date2]);

        $nbtick = [];
        $nomuser = [];
        foreach ($uses as $use) {
            array_push($nbtick, $use->nbtick);
            array_push($nomuser, $use->nomuser);
        }

        $ch = new SampleChart;


        $ch->labels($nomuser);
        $ch->dataset('ticket Par user', 'line', $nbtick);


        $view = view("dashboard",compact('chart','char','cha','ch'))->render();
        return response()->json(['html'=>$view]);
    }

    public function googleLineChart()
    {
        $result = DB::select("SELECT o.id as day,count(*) as nboffice FROM offices o inner join tickets u on o.service_id = u.service_id GROUP BY day");

        $nboffice = [];
        $day = [];
        foreach ($result as $resu) {
            array_push($nboffice, $resu->nboffice);
            array_push($day, $resu->day);
        }

        return response()->json($result);
    }
    public function LineChart()
    {
        $result = DB::select("SELECT o.id as day,count(*) as nboffice FROM offices o inner join tickets u on o.user_id = u.user_id GROUP BY day");

        $nboffice = [];
        $day = [];
        foreach ($result as $resu) {
            array_push($nboffice, $resu->nboffice);
            array_push($day, $resu->day);
        }

        return response()->json($result);
    }


}
