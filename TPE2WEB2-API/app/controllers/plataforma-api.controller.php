<?php
require_once 'app/models/plataforma.model.php';
require_once 'app/views/api.view.php';

class PlataformaApiController
{

    private $model;
    private $view;
    private $data;

    public function __construct()
    {
        $this->model = new PlataformaModel();
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input");

    }

    private function getData()
    {
        return json_decode($this->data);
    }

    function showPlataformas()
    {
        if (isset($_GET['order'])) {
            $order = $_GET['order'];
            $plataformas = $this->model->getPlataformas(strtoupper($order));
        }
        else {
            $plataformas = $this->model->getPlataformas();
        }
        $this->view->response($plataformas);

    }

    function showPlataforma($params = null) {
        if (isset($params[':id'])) {
            $id = $params[':id'];
            $plataforma = $this->model->get($id);
            if ($plataforma) {
                    $this->view->response($plataforma);
            }
            else {
                $this->view->response("La plataforma con el id=$id no existe", 404);
            }
        }
    }
    function addPlataforma(){

        $plataforma = $this->getData();

        if (empty($plataforma->nombre) || empty($plataforma->anios_activo)) {
            $this->view->response("Por favor, complete todos los campos", 400);
        }
        else {
            $id = $this->model->insert($plataforma->nombre, $plataforma->anios_activo);
            $plataforma = $this->model->get($id);
            $this->view->response($plataforma, 201);
        }
    }

    function update($params = null)
    {
        $id = $params[':id'];

        $plataformaValues = $this->getData();
        if (empty($plataformaValues->nombre) || empty($plataformaValues->anios_activo)) {
            $this->view->response("Por favor, complete todos los campos", 400);
        }

        if ($this->model->get($id)) { 
            $this->model->update($id, $plataformaValues->nombre, $plataformaValues->anios_activo);
            $plataforma = $this->model->get($id);
            $this->view->response("La plataforma $plataforma fue actualizada con exito", 200);
        } 
        else {
            $this->view->response("La plataforma con el id=$id no existe", 404);
        }
    }
    
    function deleteplataforma($params = null)
    {
        $id = $params[':id'];
        
        $plataforma = $this->model->get($id);
        if ($plataforma) {
            $this->model->remove($id);
            $this->view->response( $plataforma, 200 );
        }
        else {
            $this->view->response("La plataforma con el id=$id no existe", 404);
        }
        
    }
}


 

