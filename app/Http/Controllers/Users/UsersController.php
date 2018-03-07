<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\PayMethod;
use App\Http\Models\Earn;
use App\Http\Models\Views;
use App\Http\Models\link;
use App\Http\Models\file;
use App\Http\Models\Options;
use App\Http\Models\linkVisitor;
use App\Http\Models\fileDownloader;
use App\Http\Models\Downloads;
use App\User;
use Charts;
use Auth;
use Carbon\Carbon;
use Khill\Lavacharts\Lavacharts;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chart_space()
    {   
        $User = Auth::user();        
        $all_space_int = $User->plan->space_size;
        $used_space_int =0.2;
        $used_space = human_filesize($used_space_int);
        $all_space =space_size($all_space_int); //  this function in app/helpers/file.php
        $remining_space = $all_space_int - $used_space_int;
        if( $remining_space < 0){ $remining_space = 0; }
        $lava = new Lavacharts; // See note below for Laravel
         $reasons = $lava->DataTable();
         return $reasons->addStringColumn('Reasons')
            ->addNumberColumn('Percent')
            ->addRow([\Lang::get('lang.remaining_space'),  $remining_space])
            ->addRow([\Lang::get('lang.used_space'), $used_space_int]);               
    }
    function chart_files_links()
    {   
        $lava = new Lavacharts;
        $view = new Views;
        $download = new Downloads;
        $link = new link;
        $file = new file;
        $user_id =Auth::id();
        $links = $link->UserLinks($user_id)->get();
        $files = $file->UserFiles($user_id)->get();
        $files_links_count = $lava->DataTable();
        $files_links_count ->addDateColumn('Date')
                            ->addNumberColumn(\Lang::get('lang.Links').' '.\Lang::get('lang.visit'))
                            ->addNumberColumn(\Lang::get('lang.Files').' '.\Lang::get('lang.download'));                        
                            $date = Carbon::now(); 
        for($i=1 ; $i<31;$i++)
        {   
            $i = $i<10 ? '0'.$i : $i;
            $date->month = $date->month< 10 ? '0'.$date->month : $date->month;
            $link_views = $view->dateLinkViews($date->year.'-'.$date->month.'-'.$i);
            $file_downloads = $download->dateFileDownloads( $date);
            $files_links_count->addRow([$date->year.'-'.$date->month.'-'.$i, $link_views , $file_downloads]); 
        }
        return $files_links_count;
    }
    public function visitors()
    { 
        $lava = new Lavacharts;
        $link = new link;
        $visitors = $lava->DataTable();
     $visitors->addStringColumn('Country')
                   ->addNumberColumn('visitors');
    $links = $link->userLinks(Auth::id())->get();
    
    foreach($links as $link)
    {   
        $linkVisitors =linkVisitor::where('link_id',$link->id)->get();
        //        
        foreach($linkVisitors as $visitor)
        {
            $links_count =linkVisitor::where('country',$visitor->country)->count();
            $visitors->addRow(array($visitor->country, $links_count ));
        }
    }
    return $visitors;
}
    

    public function dashboard(Earn $earn ,Views $view,Downloads $download)
    {   
        $user_id = Auth::id();
        $TodayLinkEarnings= $earn->TodayLinkEarnings($user_id);
        $TodayFileEarnings= $earn->TodayFileEarnings($user_id);
        $TotalLinkEarnings= $earn->TotalLinkEarnings($user_id);
        $TotalFileEarnings= $earn->TotalFileEarnings($user_id);
            $TotalEarnings    = $earn->TotalEarnings($user_id);
            $ReferralEarnings = $earn->ReferralEarnings($user_id);
            $Referral_MyEarnings = $earn->Referral_MyEarnings($user_id);
            
        $TodayLinkViews= $view->TodayLinkViews($user_id);
        $TodayFileViews= $view->TodayFileViews($user_id);
        $TotalLinkViews= $view->TotalLinkViews($user_id);
        $TotalFileViews= $view->TotalFileViews($user_id);
            $TotalViews    = $view->TotalViews($user_id);
        $TodayFileDownloads= $download->TodayFileDownloads($user_id);
        $TotalFileDownloads= $download->TotalFileDownloads($user_id);

        $DayTime = Carbon::today()->Format('Y-m-d');
        $NowTime = Carbon::now(); 
              
        $lava = new Lavacharts; // See note below for Laravel
        $files_links= $this->chart_files_links();
        $visitors =          $this->visitors();
        $reasons =          $this->chart_space();
        $lava->DonutChart('IMDB', $reasons,     ['title' => \Lang::get('lang.use_cloud_space'),]);
        $lava->LineChart('Temps', $files_links, ['title' => \Lang::get('lang.Files') .' & '.  \Lang::get('lang.Links')]);
        $lava->GeoChart('visitors', $visitors);

    $array = array([
        'TodayLinkEarnings','TodayFileEarnings','TotalLinkEarnings','TotalFileEarnings','TotalEarnings','ReferralEarnings','Referral_MyEarnings',
        'TodayLinkViews','TodayFileViews','TotalLinkViews','TotalFileViews','TotalViews',
        'TodayFileDownloads','TotalFileDownloads',
        'NowTime', 'DayTime','lava','all_space',
      ]);
     return view('users.dashboard', compact($array));
    }
    public function referrals(Earn $earn)
    {
        $user_id = Auth::id();
        $refUsers=User::where('referred_by',$user_id)->get();
         if(count($refUsers)){
             $user_earnings = $earn->ReferralEarnings($user_id);
             $my_earnings =$earn->Referral_MyEarnings($user_id);
        }

        return view('users.referrals',compact('refUsers','my_earnings','user_earnings','earn'));
    }

    public function withdraw()
    {  
       $User= Auth::user();
       $method_id = $User->profile->withdrawal_method_id;

       $method = PayMethod::where('id',$method_id)->first();
       $Balance=  $User->Balance->avilable_amount;
     
       $PaymentMethod = $method->name;
       return view('users.withdraw',compact('PaymentMethod','Balance') );
    }
    
   

    // public function dashboard1()
    // {
    //     $domains_auth_urls = [];
    //     $multi_domains = get_all_multi_domains_list();
    //     $main_domain = get_option('main_domain', '');
    //     unset($multi_domains[$main_domain]);

    //     if (isset($_SESSION['Auth']['User']['domains_auth']) &&
    //         $_SESSION['Auth']['User']['domains_auth'] == 'required' &&
    //         count($multi_domains)
    //     ) {
    //         $data = urlencode(data_encrypt([
    //             'session_name' => session_name(),
    //             'session_id' => session_id(),
    //             'time' => time()
    //         ]));

    //         foreach ($multi_domains as $key => $value) {
    //             $domains_auth_urls[] = '//' . $value . $this->request->base . '/auth/users/multidomains-auth' .
    //                 '?auth=' . $data;
    //         }
    //     }
    //     $this->set('domains_auth_urls', $domains_auth_urls);

    //     $auth_user_id = $this->Auth->user('id');

    //     $last_record = $this->Users->Statistics->find()
    //         ->select('created')
    //         ->where(['user_id' => $auth_user_id])
    //         ->order(['created' => 'DESC'])
    //         ->first();

    //     if (!$last_record) {
    //         $last_record = Time::now();
    //     } else {
    //         $last_record = $last_record->created;
    //     }

    //     $first_record = $this->Users->Statistics->find()
    //         ->select('created')
    //         ->where(['user_id' => $auth_user_id])
    //         ->order(['created' => 'ASC'])
    //         ->first();

    //     if (!$first_record) {
    //         $first_record = Time::now()->modify('-1 second');
    //     } else {
    //         $first_record = $first_record->created;
    //     }

    //     $year_month = [];

    //     $last_month = Time::now()->year($last_record->year)->month($last_record->month)->startOfMonth();
    //     $first_month = Time::now()->year($first_record->year)->month($first_record->month)->startOfMonth();

    //     while ($first_month <= $last_month) {
    //         $year_month[$last_month->format('Y-m')] = $last_month->i18nFormat('LLLL Y');

    //         $last_month->modify('-1 month');
    //     }

    //     $this->set('year_month', $year_month);

    //     $to_month = Time::now()->format('Y-m');
    //     if (isset($this->request->query['month']) &&
    //         array_key_exists($this->request->query['month'], $year_month)
    //     ) {
    //         $to_month = explode('-', $this->request->query['month']);
    //         $year = (int)$to_month[0];
    //         $month = (int)$to_month[1];
    //     } else {
    //         $time = new Time($to_month);
    //         $current_time = $time->startOfMonth();

    //         $year = (int)$current_time->format('Y');
    //         $month = (int)$current_time->format('m');
    //     }

    //     $date1 = Time::now()->year($year)->month($month)->startOfMonth()->format('Y-m-d H:i:s');
    //     $date2 = Time::now()->year($year)->month($month)->endOfMonth()->format('Y-m-d H:i:s');

    //     $connection = ConnectionManager::get('default');

    //     $CurrentMonthDays = Cache::read('currentMonthDays_' . $auth_user_id.'_'.$date1.'_'.$date2, '15min');
    //     if ($CurrentMonthDays === false) {
    //         $sql = "SELECT 
    //               CASE
    //                 WHEN Statistics.publisher_earn > 0
    //                 THEN
    //                   DATE_FORMAT(Statistics.created, '%d-%m-%Y')
    //               END  AS `day`,
    //               CASE
    //                 WHEN Statistics.publisher_earn > 0
    //                 THEN
    //                   COUNT(Statistics.id)
    //               END AS `count`,
    //               CASE
    //                 WHEN Statistics.publisher_earn > 0
    //                 THEN
    //                   SUM(Statistics.publisher_earn)
    //               END AS `publisher_earnings`
    //             FROM 
    //               statistics Statistics 
    //             WHERE 
    //               (
    //                 Statistics.created BETWEEN :date1 
    //                 AND :date2 
    //                 AND Statistics.user_id = {$auth_user_id}
    //               ) 
    //             GROUP BY 
    //               day";

    //         $stmt = $connection->prepare($sql);
    //         $stmt->bindValue('date1', $date1, 'datetime');
    //         $stmt->bindValue('date2', $date2, 'datetime');
    //         $stmt->execute();
    //         $views_publisher = $stmt->fetchAll('assoc');


    //         $sql = "SELECT 
    //               CASE
    //                 WHEN Statistics.referral_earn > 0
    //                 THEN
    //                   DATE_FORMAT(Statistics.created, '%d-%m-%Y')
    //               END  AS `day`,
    //               CASE
    //                 WHEN Statistics.referral_earn > 0
    //                 THEN
    //                   SUM(Statistics.referral_earn)
    //               END AS `referral_earnings`
    //             FROM 
    //               statistics Statistics 
    //             WHERE 
    //               (
    //                 Statistics.created BETWEEN :date1 
    //                 AND :date2 
    //                 AND Statistics.referral_id = {$auth_user_id}
    //               ) 
    //             GROUP BY 
    //               day";

    //         $stmt = $connection->prepare($sql);
    //         $stmt->bindValue('date1', $date1, 'datetime');
    //         $stmt->bindValue('date2', $date2, 'datetime');
    //         $stmt->execute();
    //         $views_referral = $stmt->fetchAll('assoc');

    //         $CurrentMonthDays = [];

    //         $targetTime = Time::now();
    //         $targetTime->year($year)
    //             ->month($month)
    //             ->day(1);

    //         for ($i = 1; $i <= $targetTime->format('t'); $i++) {
    //             $CurrentMonthDays[$i . "-" . $month . "-" . $year] = [
    //                 'view' => 0,
    //                 'publisher_earnings' => 0,
    //                 'referral_earnings' => 0,
    //             ];
    //         }
    //         foreach ($views_publisher as $view) {
    //             if (!$view['day']) {
    //                 continue;
    //             }
    //             $day = Time::now()->modify($view['day'])->format('j-n-Y');
    //             $CurrentMonthDays[$day]['view'] = $view['count'];
    //             $CurrentMonthDays[$day]['publisher_earnings'] = $view['publisher_earnings'];
    //         }
    //         unset($view);
    //         foreach ($views_referral as $view) {
    //             if (!$view['day']) {
    //                 continue;
    //             }
    //             $day = Time::now()->modify($view['day'])->format('j-n-Y');
    //             $CurrentMonthDays[$day]['referral_earnings'] = $view['referral_earnings'];
    //         }
    //         unset($view);

    //         Cache::write('currentMonthDays_'.$auth_user_id.'_'.$date1.'_'.$date2, $CurrentMonthDays, '15min');
    //     }
    //     $this->set('CurrentMonthDays', $CurrentMonthDays);

    //     $this->set('total_views', array_sum(array_column($CurrentMonthDays, 'view')));
    //     $this->set('total_earnings', array_sum(array_column($CurrentMonthDays, 'publisher_earnings')));
    //     $this->set('referral_earnings', array_sum(array_column($CurrentMonthDays, 'referral_earnings')));

    //     $this->loadModel('Announcements');

    //     $announcements = $this->Announcements->find()
    //         ->where(['Announcements.published' => 1])
    //         ->order(['Announcements.id DESC'])
    //         ->limit(3)
    //         ->toArray();
    //     $this->set('announcements', $announcements);
    // }

    // public function referrals()
    // {
    //     $query = $this->Users->find()
    //         ->where(['referred_by' => $this->Auth->user('id')]);
    //     $referrals = $this->paginate($query);

    //     $this->set('referrals', $referrals);
    // }

    // public function profile()
    // {
    //     $user = $this->Users->find()->contain(['Plans'])->where(['Users.id' => $this->Auth->user('id')])->first();

    //     if ($this->request->is(['post', 'put'])) {
    //         $user = $this->Users->patchEntity($user, $this->request->data);
    //         //debug($user->errors());
    //         if ($this->Users->save($user)) {
    //             if ($this->Auth->user('id') === $user->id) {
    //                 $data = $user->toArray();
    //                 unset($data['password']);

    //                 $this->Auth->setUser($data);
    //             }
    //             $this->Flash->success(__('Profile has been updated'));
    //             $this->redirect(['action' => 'profile']);
    //         } else {
    //             $this->Flash->error(__('Oops! There are mistakes in the form. Please make the correction.'));
    //         }
    //     }
    //     unset($user->password);
    //     $this->set('user', $user);
    // }

    // public function plans()
    // {
    //     if ((bool)get_option('enable_premium_membership') === false) {
    //         throw new NotFoundException(__('Invalid request'));
    //     }

    //     $user = $this->Users->findById($this->Auth->user('id'))->contain(['Plans'])->first();
    //     $this->set('user', $user);

    //     $plans = $this->Users->plans->find()->where(['enable' => 1, 'hidden' => 0]);
    //     $this->set('plans', $plans);
    // }

    // public function payPlan($id = null, $period = null)
    // {
    //     if ((bool)get_option('enable_premium_membership') === false) {
    //         throw new NotFoundException(__('Invalid request'));
    //     }

    //     $this->request->allowMethod(['post']);

    //     if (!$id || !$period) {
    //         throw new NotFoundException(__('Invalid request'));
    //     }

    //     $plan = $this->Users->Plans->findById($id)->first();

    //     $amount = $plan->yearly_price;
    //     $period_name = __("Yearly");
    //     if ($period === 'm') {
    //         $amount = $plan->monthly_price;
    //         $period_name = __("Monthly");
    //     }

    //     $data = [
    //         'status' => 2, //Unpaid Invoice
    //         'user_id' => $this->Auth->user('id'),
    //         'description' => __("{0} Premium Membership: {1}", [$period_name, $plan->title]),
    //         'type' => 1, //Plan Invoice
    //         'rel_id' => $plan->id, //Plan Id
    //         'payment_method' => '',
    //         'amount' => $amount,
    //         'data' => serialize([
    //             'payment_period' => $period
    //         ]),
    //     ];

    //     $invoice = $this->Users->Invoices->newEntity($data);

    //     if ($this->Users->Invoices->save($invoice)) {
    //         $this->Flash->success(__('An invoice with id: {0} has been generated.', $invoice->id));
    //         return $this->redirect(['controller' => 'Invoices', 'action' => 'view', $invoice->id]);
    //     }
    // }

    // public function changeEmail($username = null, $key = null)
    // {
    //     if (!$username && !$key) {
    //         $user = $this->Users->findById($this->Auth->user('id'))->first();

    //         if ($this->request->is(['post', 'put'])) {
    //             $uuid = \Cake\Utility\Text::uuid();

    //             $user->activation_key = \Cake\Utility\Security::hash($uuid, 'sha1', true);

    //             $user = $this->Users->patchEntity($user, $this->request->data, ['validate' => 'changEemail']);

    //             if ($this->Users->save($user)) {
    //                 // Send rest email
    //                 $this->getMailer('User')->send('changeEmail', [$user]);

    //                 $this->Flash->success(__('Kindly check your email to confirm it.'));

    //                 $this->redirect(['action' => 'changeEmail']);
    //             } else {
    //                 $this->Flash->error(__('Oops! There are mistakes in the form. Please make the correction.'));
    //             }
    //         }
    //         $this->set('user', $user);
    //     } else {
    //         $user = $this->Users->find('all')
    //             ->contain(['Plans'])
    //             ->where([
    //                 'Users.status' => 1,
    //                 'Users.username' => $username,
    //                 'Users.activation_key' => $key
    //             ])
    //             ->first();

    //         if (!$user) {
    //             $this->Flash->error(__('Invalid Activation.'));
    //             return $this->redirect(['action' => 'changeEmail']);
    //         }

    //         $user->email = $user->temp_email;
    //         $user->temp_email = '';
    //         $user->activation_key = '';

    //         if ($this->Users->save($user)) {
    //             if ($this->Auth->user('id') === $user->id) {
    //                 $data = $user->toArray();
    //                 unset($data['password']);

    //                 $this->Auth->setUser($data);
    //             }
    //             $this->Flash->success(__('Your email has been confirmed.'));
    //             return $this->redirect(['action' => 'signin', 'prefix' => 'auth']);
    //         } else {
    //             $this->Flash->error(__('Unable to confirm your email.'));
    //             return $this->redirect(['action' => 'changeEmail']);
    //         }
    //     }
    // }

    // public function changePassword()
    // {
    //     $user = $this->Users->findById($this->Auth->user('id'))->first();

    //     if ($this->request->is(['post', 'put'])) {
    //         $user = $this->Users->patchEntity($user, $this->request->data, ['validate' => 'changePassword']);
    //         //debug($user->errors());
    //         if ($this->Users->save($user)) {
    //             $this->Flash->success(__('Password has been updated'));
    //             $this->redirect(['action' => 'changePassword']);
    //         } else {
    //             $this->Flash->error(__('Oops! There are mistakes in the form. Please make the correction.'));
    //         }
    //     }
    //     unset($user->password);
    //     $this->set('user', $user);
    // }
  
}
    
