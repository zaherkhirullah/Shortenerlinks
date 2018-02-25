<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         3.3.4
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Settings\AppController;
use Cake\Event\Event;

/**
 * Error Handling Controller
 *
 * Controller used by ExceptionRenderer to render error responses.
 */
class ErrorController extends AppController
{
    public function error()
    {
        $value = "";
        return view('error.error',compact('value')); 
    }

    public function Notfound()
    {
        $value = "";        
        return view('error.Notfound',compact('value')); 
    }
    public function error_v( $value )
    {  
        return view('error.error',compact('value')); 
    }
    public function Notfound_v( $value )
    {
        return view('error.Notfound',compact('value')); 
    }

    




    public function initialize()
    {
        $this->loadComponent('RequestHandler');
    }

    
    public function beforeFilter(Event $event)
    {
    }

   
    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);

        $this->viewBuilder()->templatePath('Error');
    }

   
    public function afterFilter(Event $event)
    {
    }
}
