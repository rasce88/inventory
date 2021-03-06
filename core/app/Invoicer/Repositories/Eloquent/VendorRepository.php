<?php namespace Inventory\Invoicer\Repositories\Eloquent;

use Inventory\Invoicer\Repositories\Contracts\VendorInterface;

class VendorRepository extends BaseRepository implements VendorInterface {

    /**
     * @return string
     */

    public function model() {
        return 'Inventory\Models\Vendor';
    }
    /**
     * @return string
     */
    public function generateClientNum(){
        $client = $this->model();
        $last = $client::orderBy('increment_num', 'desc')->first();
        if($last){
            $next_id = $last->increment_num+1;
        }else{
            $next_id = 1;
        }

        return $next_id;
    }
    /**
     * @return array
     */
    public function clientSelect(){
        $clients = $this->all();
        $clientList = array();
        foreach($clients as $client)
        {
            $clientList[$client->uuid] = $client->name;
        }
        return $clientList;
    }
}