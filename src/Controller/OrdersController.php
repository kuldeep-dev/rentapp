<?php
namespace App\Controller;      

use App\Controller\AppController;

use Cake\Event\Event;

use Cake\Routing\Router;

use Cake\Mailer\Email;         

use Cake\Auth\DefaultPasswordHasher;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\FavouritesTable $Stores
 *
 * @method \App\Model\Entity\Store[] paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{

    
    
     
        public function beforeFilter(Event $event) {

        parent::beforeFilter($event);



        $this->Auth->allow(['add','changestatus']);          

        $this->authcontent();    
    }
    
    
        public function orderhistory()
    {  
    		 $this->loadModel('Reviews');
         $uid = $this->Auth->user('id');
         if (empty($uid)) {      
            $this->redirect('/');
        }  
        
        $this->paginate = [
    	'contain' => ['Users','Products','Reviews'] ,'conditions'=>['Orders.uid'=>$this->Auth->user('id')],
    	'order'   => ['Orders.id' => 'desc'] 

        ];

        $yourorders = $this->paginate($this->Orders)->toArray();   
        //$review = $this->Reviews->find->all();
        $review = $this->Reviews->find('all', [
                    'conditions' => ['Reviews.user_id' => $this->Auth->user('id')]
                ])->all()->toArray();

       	// print_r($review) ;
        $this->set(compact('yourorders','review'));
        $this->set('_serialize', ['yourorders']); 
   
    }

    public function upcoming()
    {  
             $this->loadModel('Reviews');
         $uid = $this->Auth->user('id');
         if (empty($uid)) {      
            $this->redirect('/');
        }  
        
        $this->paginate = [
        'contain' => ['Users','Products','Reviews'] ,'conditions'=>['Orders.uid'=>$this->Auth->user('id')],
        'order'   => ['Orders.id' => 'desc'] 

        ];

        $yourorders = $this->paginate($this->Orders)->toArray();   
        //$review = $this->Reviews->find->all();
        $review = $this->Reviews->find('all', [
                    'conditions' => ['Reviews.user_id' => $this->Auth->user('id')]
                ])->all()->toArray();

        // print_r($review) ;
        $this->set(compact('yourorders','review'));
        $this->set('_serialize', ['yourorders']); 
   
    }


    
        public function view($id = null)    
    {
        $order = $this->Orders->get($id, [
            'contain' => ['OrderItems'=>['Users','Products'],'Users']            
        ]);
 
        $this->set('order', $order); 
        $this->set('_serialize', ['order']);    
    }

    
      public function changestatus() {
        $a = $_POST['id'];
        if ($a == 0) {
            exit;
        }
        $d = explode('-', $a); 
        $user_id = $d[0];
        $order_id = $d[1];
        $order_status = $d[2];
        $data = $this->Orders->find('all', array('conditions' => array('Orders.id' => $order_id)));
        $data = $data->first();
        if($data){
            $this->Orders->updateAll(array('order_status' => $order_status), array('Orders.id' => $order_id));  
            
            $new_data = $this->Orders->find('all', array('conditions' => array('Orders.id' => $order_id)));
            
            $new_data = $new_data->first();      
//
//                $Email = new CakeEmail();
//                $Email->from('no-reply@rajdeep.crystalbiltech.com')
//                        ->to($new_data['Order']['email'])
//                        ->subject('Status Changed')
//                        ->template('orderstatus')
//                        ->emailFormat('html')
//                        ->viewVars(array('shop' => $new_data))
//                        ->send();
//      
         
        }


        exit;  
    }



   public function payment(){
        
        if(!$this->Auth->user('id')){
            $this->redirect('/');
        }
        
        
        /*********** Save Order  *********/
        
        $post = array();
        
        $post['uid']            =   $this->Auth->user('id');
        $post['product_id']     =   $this->request->data['product_id'];
        $post['start_date']     =   date('d-m-Y', strtotime($this->request->data['start_date']));
        $post['start_time']     =   $this->request->data['start_time'];
        $post['end_date']       =   date('d-m-Y', strtotime($this->request->data['end_date']));
        $post['end_time']       =   $this->request->data['end_time'];
        $post['hourly_price']   =   $this->request->data['hourly_price'];
        $post['total_hours']    =   $this->request->data['total_hours'];
        $post['total_price']    =   $this->request->data['total_price'];

        $price = ($this->request->data['hourly_price']*$this->request->data['total_hours']);

        $orders = $this->Orders->newEntity();
        $orders = $this->Orders->patchEntity($orders, $post);
        $order = $this->Orders->save($orders);
        
        
        
        
        /*********** Save Order (END)  *********/
        
        if($order){
            
            $order_id = base64_encode($order->id);
            $email = $this->Auth->user('email');
            echo ".<form name=\"_xclick\" action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\">
            <input type=\"hidden\" name=\"cmd\" value=\"_xclick\">
            <input type=\"hidden\" name=\"email\" value=\"$email\">
            <input type=\"hidden\" name=\"business\" value=\"rupak1-facilitator@avainfotech.com\">
            <input type=\"hidden\" name=\"currency_code\" value=\"USD\">
            <input type=\"hidden\" name=\"custom\" value=\"$order->id\">
            <input type=\"hidden\" name=\"amount\" value=\"$price\">
            <input type=\"hidden\" name=\"return\" value=\"http://singhgurpreet.crystalbiltech.com/rentapp/orders/success/$order_id\"> 
            <input type=\"hidden\" name=\"notify_url\" value=\"http://singhgurpreet.crystalbiltech.com/trip/orders/ipn\">
            </form>";
            echo "<script>document._xclick.submit();</script>";
        }        
        
    } 


public function success($order_id = null){
        
        if(!$order_id){
            $this->redirect('/');
        }
        
        $order = $this->Orders->get(base64_decode($order_id), [
            'contain' => ['Products' => ['Users']]
        ])->toArray();
        
        
        if(isset($_REQUEST['tx'])){ 
            $this->Orders->updateAll(array(
                'transaction_id' =>  $_REQUEST['tx'],
                'payment_status'        =>  $_REQUEST['st'],
                'order_status'                =>  3    
            ),array(
                'Orders.id'             =>  $_REQUEST['cm']
            )); 
            
            
            $email = new Email('default');
            $email->from(['kuldeepjha@avainfotech.com' => 'Renting App Booking'])
                ->to($order['product']['user']['email'])
                ->subject('About')
                ->send('My message');
            
            
            $response = 'success';
            
        }else{
            $response = 'error';
        }
        
        $this->set('order', $order);
        $this->set('_serialize', ['order']);
        
        $this->set('response', $response);
        $this->set('_serialize', ['response']);
    }
    



   
}
