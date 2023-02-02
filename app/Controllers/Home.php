<?php

namespace App\Controllers;

use App\Models\TimeListModel;
use App\Models\RegisterModel;
use CodeIgniter\I18n\Time;
use stdClass;


class Home extends BaseController
{
    // public function index()
    // {
    //     return view('welcome_message');
    // }

    public function signUp()
    {
        // $RegisterModel = new RegisterModel;

        $data = [
            "fname" => $this->request->getPost('fname'),
            "lname" => $this->request->getPost('lname'),
            "email" => $this->request->getPost("email"),
            "password" => md5(trim($this->request->getPost("password"))),
            "role" => "user"
        ];
        // 

        session()->set($data);

        return redirect()->to('/timesheet');
        session()->setFlashdata('success',  'You have signed up successfully now just sign in to get started!');
    }


    public function signIn()
    {
        $RegisterModel = new RegisterModel();

        // $data = [
        //     "fname" => $this->request->getPost('fname'),
        //     "password" => $this->request->getPost('password'),
        // ];
        // session()->setFlashdata('success',  'Your Success Message goes here!');
        // session()->setFlashdata('error',    'Your Error Message goes here!');
        // session()->setFlashdata('info',     'Your Info Message goes here!');
        // session()->setFlashdata('warning',  'Your Warning Message goes here!');
        $fname = $this->request->getPost('fname');
        $password = $this->request->getPost('password');

        // $userName = $RegisterModel->where('fname', $data['fname'])->first();
        // $userPassword = $RegisterModel->where('password', $data['password'])->first();
        // $user = $RegisterModel->where('fname', $data['fname'])
        // ->where('password', $data['password'])->first();
        $user = $RegisterModel->where('fname', $fname)
            ->where('password', md5(trim($password)))->first();
        // 


        // && $userPassword
        if ($user != null) {
            session()->set($user);
            session()->setFlashdata('success',  'You have successfully Signed In!');
            // $datas['users'] = $RegisterModel->find($userEmail['id']);
            // return view('timesheet');
            return redirect()->to('timesheet');
        } else {
            session()->setFlashdata('error',  'Please check your email and password!');
            return redirect()->to('login');
        };

        // $this->session->set($data);
        // return view('signIn');
    }
    public function timesheet()
    {
        $TimeListModel = new TimeListModel();

        $start_time = $this->request->getPost('worked_start');
        $end_time = $this->request->getPost('worked_end');

        $start = new \DateTime($start_time);

        $end = new \DateTime($end_time);

        $difference = $start->diff($end);

        $worked_time = null;

        if ($difference->invert === 1) {
            session()->setFlashdata('warning',  'End time should be greater than start time!');
            return redirect()->to('timesheet');
        } else {
            $worked_time = $difference->format('%h hours %i minutes');
        }

        $current_date = date('Y-m-d');


        $data = [
            'current_date' => $current_date,
            'task_title' => $this->request->getPost('task_title'),
            'worked_start' => $this->request->getPost('worked_start'),
            'worked_time' => $worked_time,
            'worked_end' => $this->request->getPost('worked_end'),
            'task_desc' => $this->request->getPost('task_desc'),
            'task_type' => $this->request->getPost('task_type'),
            "fname" => session()->get('fname'),
            "role" => session()->get('role'),
        ];

        $TimeListModel->insert($data);

        session()->setFlashdata('success',  'You have successfully filled in your timesheet!');

        // return view('timesheet');
        if (session()->get()) {
            return redirect()->to('timesheet');
        } else {
            return redirect()->to('login');
        }
    }

    public function createuser()
    {
        $RegisterModel = new RegisterModel();
        $data['users'] = $RegisterModel->findAll();

        return view('/createuser',$data);
    }


    public function createuserdata()
    {
        $RegisterModel = new RegisterModel;
        $data['users'] = $RegisterModel->findAll();


        $data = [
            "fname" => $this->request->getPost('fname'),
            "lname" => $this->request->getPost('lname'),
            "email" => $this->request->getPost("email"),
            "password" => $this->request->getPost("password"),
            "role" => "user"
        ];

        $RegisterModel->insert($data);
        // 
        // echo '<pre/>';
        // print_r($data);
        // die;

        session()->set($data);

        return redirect()->to('/createuser');
        // session()->setFlashdata('success',  'You have signed up successfully now just sign in to get started!');
    }

    public function create()
    {
        return view('signUp');
    }
    public function login()
    {
        return view('signIn');
    }
    public function times()
    {
        $TimeListModel = new TimeListModel();

        // $usage = $TimeListModel->findAll();

        // if ($this->session->get('role') == "supervisor") {
        //     $data['users'] = $TimeListModel->where(['role' => 'user'])->find();
        // } else {
        //     $data['users'] = $TimeListModel->where(['fname' => $this->session->get('fname')])->find();
        // }

        $data['users'] = $TimeListModel->where(['fname' => session()->get('fname')])->find();

        // echo "<pre>";
        // print_r($this->session->get('fname'));
        // die;
        if (session()->get()) {
            return view("timesheet", $data);
        } else {
            return redirect()->to('login');
        }
    }
    public function review()
    {
        $TimeListModel = new TimeListModel();
        $current_date = date('Y-m-d');

        $data = [
            'search' => $this->request->getPost('search')
        ];

        if ($data['search']) {
            $data['timesheetEntries'] = $TimeListModel->where(['current_date' => $data['search']])->find();
        } else {
            $data['timesheetEntries'] = $TimeListModel->where(['current_date' => $current_date])->find();
        }
        // echo "<pre>";
        $uniqueNamesList = [];
        foreach ($data['timesheetEntries'] as $entry) {
            if (!(isset($uniqueNamesList[$entry['fname']]))) {
                $uniqueNamesList[$entry['fname']] = 'YES';
            }
        }

        $summarizedValues = [];

        foreach ($uniqueNamesList as $user => $value) {
            // $userSummary = new stdClass();
            $userSummary = [];
            $core = 0;
            $other = 0;

            foreach ($data['timesheetEntries'] as $entry) {
                $current_date = date('Y-m-d');
                $start = new \DateTime($entry['worked_start']);
                $end = new \DateTime($entry['worked_end']);
                $difference = $start->diff($end);
                if ($entry['task_type'] == 'Core' && $entry['fname'] == $user) {
                    // $core += ($difference->h * 60) + $difference->i;
                    $core = $difference->format('%h hours %i minutes');
                }

                if (
                    $entry['task_type'] == 'Other'
                    && $entry['fname'] == $user
                ) {
                    // $other += ($difference->h * 60) + $difference->i;
                    $other = $difference->format('%h hours %i minutes');
                }
            }
            //exit
            // $userSummary->fname = $user;
            $userSummary['fname'] = $user;
            $userSummary['core'] = $core;
            // $userSummary->core = $core;
            $userSummary['other'] = $other;
            // $userSummary->other = $other;

            // $userSummary->current_date = $current_date;
            $userSummary['current_date'] = $current_date;
            // print_r($userSummary);

            $summarizedValues[] = $userSummary;
        }
        if ($data['search']) {
            $data['timesheetEntries'] = $TimeListModel->where(['current_date' => $data['search']])->find();
        } else {
            $data['timesheetEntries'] = $summarizedValues;
        }
        // die;
        // echo "<pre>";
        // print_r($summarizedValues);
        // print_r($data['timesheetEntries']);
        // die;

        return view('review', $data);
    }


    public function summary($fname)
    {
        $TimeListModel = new TimeListModel();
        $data['users'] = $TimeListModel->where(['fname' => $fname])->find();

        $uniqueNamesList = [];
        foreach ($data['users'] as $user) {
            if (!(isset($uniqueNamesList[$user['fname']]))) {
                $uniqueNamesList[] = $user['fname'];
            }
        }
        // $data['users'] = $uniqueNamesList;


        // echo "<pre>";
        // print_r($uniqueNamesList);
        // die;
        foreach ($uniqueNamesList as $key => $value) {
            $data['users'] = $TimeListModel->where(['fname' => $value])->find();
        }

        return view('summary', $data);
    }



    public function edit($id)
    {
        $TimeListModel = new TimeListModel();
        $data['users'] = $TimeListModel->find($id);
        return view('edit', $data);
    }

    public function delete($id)
    {
        $RegisterModel = new RegisterModel();
        $RegisterModel->find($id);
        return view('createuser');
    }

    public function signout()
    {
        session()->destroy();
        return redirect()->to("login");
    }
}
