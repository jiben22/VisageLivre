<?php
class Todo extends CI_Controller {
    
    public function __construct ()
    {
        parent :: __construct () ;
        $this->load->model('todo_model');
        $this->load->helper('url');
    }
    
    public function index()
    {
        $data ['todolist'] = $this->todo_model->todo_get_tasks();
        $data ['title'] = 'Todo list'; // a title to display above the list
        $data ['content'] = 'task_list'; // template will call ' task_list ' sub - view
        
        $this->load->vars($data);
        $this->load->view('template');
    }
    
    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Créer une tâche';
        $this->form_validation->set_rules('title' , 'Enoncé', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['content'] = 'form';
        } else {
            $title = $this->input->post('title');
            $this->todo_model->todo_add_task($title);
            $data['content'] = 'add_success';
        }
        $this->load->vars($data);
        $this->load->view('template');
    }
}
?>