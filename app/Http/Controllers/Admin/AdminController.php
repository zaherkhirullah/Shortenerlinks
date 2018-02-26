<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\PayMethod;
use App\Http\Models\Earn;
use App\Http\Models\Views;
use App\Http\Models\link;
use App\Http\Models\Options;
use App\Http\Models\Downloads;
use App\User;
use Auth;
use Carbon\Carbon;
use Khill\Lavacharts\Lavacharts;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
   
    public function dashboard()
    {
        $lava = new Lavacharts; // See note below for Laravel
    
        $reasons = $lava->DataTable();
            $reasons->addStringColumn('Reasons')
            ->addNumberColumn('Percent')
            ->addRow([\Lang::get('lang.all_space'), 100])
            ->addRow([\Lang::get('lang.used_space'), 5]);

        $lava->DonutChart('IMDB', $reasons, [
            'title' => \Lang::get('lang.use_cloud_space'),
            ]);
        $temperatures = $lava->DataTable();
        $temperatures
                     ->addDateColumn('Date')
                     ->addNumberColumn(\Lang::get('lang.Files'))
                     ->addNumberColumn('Max Temp')
                     ->addNumberColumn(\Lang::get('lang.Links'))
                     ->addRow(['2014-10-1',  67, 65, 62])
                     ->addRow(['2014-10-2',  68, 65, 61])
                     ->addRow(['2014-10-3',  68, 62, 55])
                     ->addRow(['2014-10-4',  72, 62, 52])
                     ->addRow(['2014-10-5',  61, 54, 47])
                     ->addRow(['2014-10-6',  70, 58, 45])
                     ->addRow(['2014-10-7',  74, 70, 65])
                     ->addRow(['2014-10-8',  75, 69, 62])
                     ->addRow(['2014-10-9',  69, 63, 56])
                     ->addRow(['2014-10-10', 64, 58, 52])
                     ->addRow(['2014-10-11', 59, 55, 50])
                     ->addRow(['2014-10-12', 65, 56, 46])
                     ->addRow(['2014-10-13', 66, 56, 46])
                     ->addRow(['2014-10-14', 75, 70, 64])
                     ->addRow(['2014-10-15', 76, 72, 68])
                     ->addRow(['2014-10-16', 71, 66, 60])
                     ->addRow(['2014-10-17', 72, 66, 60])
                     ->addRow(['2014-10-18', 63, 62, 62]);
            
             $lava->LineChart('Temps', $temperatures, [
                'title' => \Lang::get('lang.Files') .' & '.  \Lang::get('lang.Links')
            ]);
                
        $popularity = $lava->DataTable();

        $popularity->addStringColumn('Country')
                ->addNumberColumn('visitors')
                ->addRow(array('Germany', 10))
                ->addRow(array('United States', 300))
                ->addRow(array('Brazil', 400))
                ->addRow(array('Canada', 500))
                ->addRow(array('France', 600))
                ->addRow(array('Sy', 600))
                ->addRow(array('RU', 700));

        $lava->GeoChart('Popularity', $popularity);
        $array = array([
        'TodayLinkEarnings','TodayFileEarnings','TotalLinkEarnings','TotalFileEarnings','TotalEarnings','ReferralEarnings','Referral_MyEarnings',
        'TodayLinkViews','TodayFileViews','TotalLinkViews','TotalFileViews','TotalViews',
        'TodayFileDownloads','TotalFileDownloads',
        'NowTime', 'DayTime','lava',
      ]);
     return view('admin.dashboard', compact($array));
    }
}
