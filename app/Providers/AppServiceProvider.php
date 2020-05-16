<?php

namespace App\Providers;

use App\Charts\SampleChart;
use App\Console;
use App\Display;
use App\Services;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['statistique','home'],function($view) {
            $uses = DB::select("SELECT u.name as nomuser , count(*) as nbtick FROM tickets t INNER JOIN users u ON t.user_id = u.id GROUP BY nomuser");

            $nbtick = [];
            $nomuser = [];
            foreach ($uses as $use) {
                array_push($nbtick, $use->nbtick);
                array_push($nomuser, $use->nomuser);
            }

            $chs = new SampleChart;


            $chs->labels($nomuser);
            $chs->dataset('ticket Par user', 'line', $nbtick);


            $view ->with("chs",$chs);
        });
        view()->composer(['statistique','home'],function($view) {
            $results = DB::select("SELECT to_char(created_at, 'DAY') as month, count(*) as nbuser FROM users  GROUP BY month");

            $nbuser = [];
            $month = [];
            foreach ($results as $res) {
                array_push($nbuser, $res->nbuser);
                array_push($month, $res->month);
            }

            $chart = new SampleChart;


            $chart->labels($month);
            $chart->dataset('Users', 'line', $nbuser);


            $view ->with("chart",$chart);
        });
        view()->composer(['statistique','home'],function($view) {
            $resu = DB::select("SELECT name , count(service_tp_id) as nbtick FROM services GROUP BY name");

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



            $view ->with("cha",$cha);
        });
        view()->composer(['statistique','home'],function($view) {
            $result = DB::select("SELECT to_char(created_at, 'DAY') as month,count(*) as nbuser FROM services GROUP BY month");

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


            $view ->with("char",$char);
        });
    }
}
