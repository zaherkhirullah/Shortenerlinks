<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Member\AppMemberController;

class WithdrawsController extends AppMemberController
{
    public function index()
    {
        $query = $this->Withdraws->find()
            ->where(['user_id' => $this->Auth->user('id')]);
        $withdraws = $this->paginate($query);

        $this->set('withdraws', $withdraws);

        $total_withdrawn = $this->Withdraws->find()
            ->select(['total' => 'SUM(amount)'])
            ->where([
                'user_id' => $this->Auth->user('id'),
                'status' => 3
            ])
            ->first();
        $this->set('total_withdrawn', $total_withdrawn->total);

        $pending_withdrawn = $this->Withdraws->find()
            ->select(['total' => 'SUM(amount)'])
            ->where([
                'user_id' => $this->Auth->user('id'),
                'status' => 2
            ])
            ->first();
        $this->set('pending_withdrawn', $pending_withdrawn->total);

        $user = $this->Withdraws->Users->get($this->Auth->user('id'));
        $this->set('user', $user);
    }

    public function request()
    {
        $this->request->allowMethod(['post', 'put']);

        $user = $this->Withdraws->Users->get($this->Auth->user('id'));

        $withdraw = $this->Withdraws->newEntity();
        $data = [];

        $withdraw->user_id = $this->Auth->user('id');
        $withdraw->status = 2;
        $withdraw->publisher_earnings = $user->publisher_earnings;
        $withdraw->referral_earnings = $user->referral_earnings;

        $method = $user->withdrawal_method;
        $account = $user->withdrawal_account;

        if ($method !== 'wallet' && (empty($method) || empty($account))) {
            $this->Flash->error(__('You should fill your withdrawal info from your profile settings.'));
            return $this->redirect(['action' => 'index']);
        }

        $data['amount'] = $user->publisher_earnings + $user->referral_earnings;

        $withdrawal_methods = array_column(get_withdrawal_methods(), 'amount', 'id');
        $minimum_withdrawal_amount = $withdrawal_methods[$user->withdrawal_method];

        if ($data['amount'] < $minimum_withdrawal_amount) {
            $this->Flash->error(__(
                'Withdraw amount should be equal or greater than {0}.',
                display_price_currency($minimum_withdrawal_amount)
            ));
            return $this->redirect(['action' => 'index']);
        }

        $withdraw->method = $method;
        $withdraw->account = $account;

        $withdraw = $this->Withdraws->patchEntity($withdraw, $data);
        if ($this->Withdraws->save($withdraw)) {
            // Rest publisher balance
            $user->publisher_earnings = 0;
            $user->referral_earnings = 0;
            $this->Withdraws->Users->save($user);

            $this->Flash->success(__('Your withdraw has been request and under review.'));
        } else {
            $this->Flash->error(__('Unable to request the withdraw.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
