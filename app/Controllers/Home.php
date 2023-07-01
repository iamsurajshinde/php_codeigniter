<?php

namespace App\Controllers;

use App\Models\EmpModel;
use Exception;

class Home extends BaseController
{

    protected $empModel;

    protected $data;

    public function __construct()
    {
        $this->empModel = new EmpModel();
        ;
        $this->data = [
            'session' => null,
            'empList' => null,
            'form' => null
        ];
    }


    public function index()
    {
        $this->getEmpList();
        return view('homeview', $this->data);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            try {

                $input = $this->request->getRawInput();
                print_r($input);
                if ($this->empModel->save($input)) {
                    // success message
                    $this->session->setFlashdata('success', 'Data saved successfully!');
                }
            } catch (Exception $e) {
                // error message
                $this->session->setFlashdata('error', $e->getMessage());
            }
            $this->data['session'] = $this->session;
        }
        $this->getEmpList();
        return view('homeview', $this->data);
    }

    public function getEmpList()
    {
        $this->data['empList'] = $this->empModel->findAll();
    }


    public function edit($id = null)
    {
        if ($this->request->is('post')) {
            $input = $this->request->getRawInput();
            $this->empModel->update($input['id'], $input);
        }
        if($id != null) {
           $emp = $this->empModel->find($id);
           $this->data['form'] = $emp;
        }
        $this->getEmpList();
        return view('homeview', $this->data);
    }

    public function delete($id = null)
    {
        if ($id != null) {
            $this->empModel->delete($id);
        }
        $this->getEmpList();
        return view('homeview', $this->data);
    }


}