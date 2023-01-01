<?php

class Task_model extends CI_model {
    public function showAllTask() {
        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->join('priority', 'tasks.idPriority = priority.idPriority');
        $this->db->join('status', 'tasks.idStatus = status.idStatus');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function showAllPriority() {
        return $this->db->get('priority')->result_array();
    }
    public function showAllStatus() {
        return $this->db->get('status')->result_array();
    }
    
    public function showAllTaskByStatus($status) {
        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->join('priority', 'tasks.idPriority = priority.idPriority');
        $this->db->join('status', 'tasks.idStatus = status.idStatus');
        $this->db->order_by('tasks.idPriority', "asc");
        $this->db->where('tasks.idStatus', $status);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function addTask()
    {
        $today = date("Y/m/d");
        $endTime = date("Y-m-d", strtotime($this->input->post('endTime',true)));
        $data = [
            "title" => $this->input->post('title',true),
            "startTime" => $today,
            "endTime" => $endTime,
            "idPriority" => $this->input->post('idPriority',true),
            "idStatus" => $this->input->post('idStatus',true),
        ];

        $this->db->insert('tasks',$data);
    }
    
    public function editTask($data)
    {
        // $today = date("Y/m/d");
        $endTime = date("Y-m-d", strtotime($data['endTime']));
        $datas = [
            "idTask" => $data['idTask'],
            "title" => $data['title'],
            "startTime" => ' ',
            "endTime" => $endTime,
            "idPriority" => $data['idPriority'],
            "idStatus" => $data['idStatus'],
        ];
        $this->db->where('idTask', $data['idTask']);
        $this->db->update('tasks', $datas);
    }

    public function deleteTask($idTask)
    {
        $this->db->delete('tasks', ['idTask' => $idTask]);
    }
}