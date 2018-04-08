<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class EquipmentsController extends Application
{
    /**
     * Constructor for EquipmentsController.
     * 
     * It loads the assetscsv model, and sets the page title and page body.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('AssetsCsv');
        $items = json_decode(json_encode($this->AssetsCsv->all()), true);
        $this->categories = array();
        foreach ($items as $item) {
            if (!in_array($item["category"], $this->categories))
                $this->categories[] = $item["category"];
        }
        $this->data['pagetitle'] = 'Equipments build';
        $this->data['pagebody'] = 'assembly';
        $role = $this->session->userdata('userrole');
        if ($role == "")
            $role = "User Role";
        $this->data['userrole'] = $role;
        if ($role == ROLE_ADMIN)
        {
            $this->data['adminWarning'] = "<b>Change item categories at your own risk! CSS on main page will be messed up!</b>";
            $this->data['saveButton'] = '<input type="submit" value="Save Changes"/>';
        }
        else
        {
            $this->data['adminWarning'] = "Changes are only saved as admin.";
            $this->data['saveButton'] = '';
        }
	  }
 	/**
 	 * Index Page for this controller.
 	 *
 	 * Maps to the following URL
 	 * 		http://example.com/
 	 * 	- or -
 	 * 		http://example.com/welcome/index
 	 *
 	 * So any other public methods not prefixed with an underscore will
 	 * map to /welcome/<method_name>
 	 * @see https://codeigniter.com/user_guide/general/urls.html
 	 */
 	public function index()
 	{
        $this->data['page_category'] = "all-equipments";        
        $items = $this->AssetsCsv->all();
        $this->data['items'] = $items;
        $this->render();
    }
        
    public function category($key)
    {
        if($key == "all")
        {
            $items = $this->AssetsCsv->all();
            header("Content-type: application/json");
            echo json_encode($items);
            return;
        }
        if($key == "FillCategories")
        {
            $allCategories = $this->categories;
            echo json_encode($allCategories);
            return;
        }
        $this->data['page_category'] = " ".$key;        
        $items = $this->AssetsCsv->some('category', $key);
        $this->data['items'] = $items;
        $this->render();
    }

    public function singleItem($key)
    {
        $item = $this->AssetsCsv->some('id', $key);
        header("Content-type: application/json");
        echo json_encode($item);
    }

    public function requestItemUpdate()
    {
        for ($i = 0; $i < count($_POST['id']); $i++)
        {
            $item = array(); 
            $item['id'] = $_POST['id'][$i];
            $item['name'] = $_POST['name'][$i];
            $item['category'] = $_POST['category'][$i];
            $item['str'] = $_POST['str'][$i];
            $item['dex'] = $_POST['dex'][$i];
            $item['int'] = $_POST['int'][$i];
            $this->AssetsCsv->update($item);           
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}
