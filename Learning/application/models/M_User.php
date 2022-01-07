<?php

class M_User extends CI_Model
{


    public function save_task($id_subject_matter)
    {
        $data = [

            'name_task' => $this->input->post('name_task', true),
            'link' => $this->input->post('link', true),
            'poin' => 0,
            'created_at' => time(),
            'id' => $this->input->post('id', true),
            'id_subject_matter' => $id_subject_matter,

        ];
        return $this->db->insert('completed_task', $data);
    }

    public function get_profile($email)
    {
        $query = "SELECT * FROM user INNER JOIN profile on profile.email = user.email where profile.email ='$email'";
         return $this->db->query($query)->result();
        //$this->db->select('*');
        //$this->db->from('user');
        //$this->db->join('profile', 'profile.email = user.email');
        //$this->db->where('profile.email', $email);
        //$query = $this->db->get();
        //return $query->result();
    }
    public function get_task_user($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('completed_task', 'completed_task.id = user.id');
        $this->db->join('subject_matter', 'subject_matter.id_subject_matter = completed_task.id_subject_matter');
        $this->db->join('class', 'class.id_class = subject_matter.id_class');
        $this->db->where('user.id', $id);
        $query = $this->db->get();
        return $query->result();
    }


    public function get_subtheory($name_class)
    {
        $this->db->select('*');
        $this->db->from('subject_matter');
        $this->db->join('class', 'class.id = subject_matter.id');
        $this->db->where('class.name_class', $name_class);
        $query = $this->db->get();
        return $query->result();
    }

    public function theory($class)
    {
        $this->db->select('*');
        $this->db->from('subject_matter');
        $this->db->join('class', 'class.id = subject_matter.id');
        $this->db->join('completed_task', 'completed_task.id_subject_matter = subject_matter.id_subject_matter');
        $this->db->where('class.class', $class);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_theory($id_subject_matter)
    {
        $this->db->select('*');
        $this->db->from('subject_matter');
        $this->db->join('class', 'class.id_class = subject_matter.id_class');
        $this->db->join('task_user', 'subject_matter.id_subject_matter = task_user.id_subject_matter');
        $this->db->join('user', 'user.id = subject_matter.id');
        $this->db->where('subject_matter.id_subject_matter', $id_subject_matter);
        $query = $this->db->get();
        return $query->result();
        //return $this->db->get_where('subject_matter', ['id' => $id])->result();
    }
    public function complete_task($id_subject_matter)
    {
        $this->db->select('*');
        $this->db->from('completed_task');
        $this->db->join('subject_matter', 'subject_matter.id_subject_matter = completed_task.id_subject_matter');
        $this->db->where('completed_task.id_subject_matter', $id_subject_matter);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 'True';
        } elseif ($query->num_rows() == $id_subject_matter) {
            return 'Show';
        } else {
            return 'False';
        }
    }
    public function update_user($id)
    {
        $data = [
            'name' => $this->input->post('name'),
            'date_birth' => $this->input->post('date_birth'),
            'jk' => $this->input->post('jk'),
            'address' => $this->input->post('address'),
            'last_education' => $this->input->post('last_education'),
            'place_birth' => $this->input->post('place_birth'),
        ];

        return $this->db->update('profile', $data, ['id_user' => $id]);
    }

    public function getcontent()
    {
        $query = "SELECT * FROM class INNER JOIN subject_matter on subject_matter.id = class.id and subject_matter.id_class = class.id_class GROUP BY class.name_class";
        return $this->db->query($query)->result();
    }
}
