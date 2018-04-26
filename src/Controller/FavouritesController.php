<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;

use Cake\Routing\Router;

use Cake\Mailer\Email;         

use Cake\Auth\DefaultPasswordHasher;

/**
 * Favourites Controller
 *
 * @property \App\Model\Table\FavouritesTable $Stores
 *
 * @method \App\Model\Entity\Store[] paginate($object = null, array $settings = [])
 */
class FavouritesController extends AppController
{

    
    
    
    	public function beforeFilter(Event $event) {
 
        parent::beforeFilter($event);



        $this->Auth->allow(['index', 'add']);

        $this->authcontent();

    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
       
    }



    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        $fav = $this->Favourites->newEntity();
         $post = $this->request->data;  
         
        if ($this->request->is('post')) {
            $user_id = $_POST['user_id'];
         $product_id = $_POST['product_id'] ;
            $check = $this->Favourites->find('all',array('conditions'=>array('AND'=>array('Favourites.product_id'=>$this->request->data['product_id'],'Favourites.user_id'=>$this->request->data['user_id']))));
           
             $check = $check->first(); 
            if($check){  
                $response['isSuccess'] = 'true';
                $response['msg'] = '<div class="alert alert-success">This boat already added!</div>'; 
            }else{
            $fav = $this->Favourites->patchEntity($fav, $post);
            if ($this->Favourites->save($fav)) {
                $response['isSuccess'] = 'true';
                $response['msg'] = '<div class="alert alert-success">The Favourites has been saved.</div>';
             
            }else{ 
                $response['isSuccess'] = 'false';
                $response['msg'] = 'The Favourites could not be saved. Please, try again.';  
                
            }
            }
        }
        
     echo json_encode($response);
     exit;
    }

    /**
     * Edit method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $store = $this->Favourites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $store = $this->Favourites->patchEntity($store, $this->request->getData());
            if ($this->Favourites->save($store)) {
                $this->Flash->success(__('The Favourites has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Favourites could not be saved. Please, try again.'));
        }
        $this->set(compact('favourite'));
        $this->set('_serialize', ['favourite']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $store = $this->Favourites->get($id);
        if ($this->Favourites->delete($store)) {
            $this->Flash->success(__('The Favourites has been deleted.'));
        } else {
            $this->Flash->error(__('The Favourites could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function favourite()
    {  
        
         $uid = $this->Auth->user('id');
         if (empty($uid)) {      
            return $this->redirect('/');
        }  
        
        $yourfavourite = $this->Favourites->find('all',[
                    'contain' => ['Products'],
                    'conditions' => ['Favourites.user_id' => $this->Auth->user('id')]
                ])->all();
        // print_r($yourfavourite)

        $this->set('yourfavourite',$yourfavourite);
        $this->set('_serialize', ['yourfavourite']);   
   
    }


}
