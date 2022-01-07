<?php

class M_Guru extends CI_Model
{
    public function save($id)
    {
        $data = [

            'title' => preg_replace("/[^a-zA-Z0-9]/", "-", htmlspecialchars($this->input->post('title', true))),
            'sub_title' => htmlspecialchars($this->input->post('sub_title', true)),
            'content' => $this->input->post('content', true),
            'status' => $this->input->post('status', true),
            'date_post' => time(),
            'id' => $id,
            'id_class' => $this->input->post('id_class', true),

        ];

        $matter = $this->db->insert('subject_matter', $data);

        if ($matter) {
            $get_idmat = $this->db->select('id_subject_matter')
                ->from('subject_matter')
                ->where('sub_title', htmlspecialchars($this->input->post('sub_title', true)))
                ->get()
                ->row()->id_subject_matter;

            $data2 = [
                'id_subject_matter' => $get_idmat,
                'id' => $id

            ];
            $this->db->insert('task_user', $data2);
        } else {
            echo "elol";
        }
    }

    public function save_class($id)
    {

        $ambil = [
            'name_class' => preg_replace("/[^a-zA-Z0-9]/", "-", htmlspecialchars($this->input->post('class', true))),
            'deskripsi' => $this->input->post('deskripsi', true),
            'id' => $id,
        ];
        return $this->db->insert('class', $ambil);
    }

    public function save_task($id)
    {
        $ambil = [
            'id_user' => $id,

        ];
        return $this->db->insert('task_user', $ambil);
    }

    public function getcontent($id)
    {
        $this->db->select('*');
        $this->db->from('subject_matter');
        $this->db->join('user', 'user.id = subject_matter.id');
        $this->db->join('class', 'class.id_class = subject_matter.id_class');
        $this->db->join('task_user', 'task_user.id_subject_matter = subject_matter.id_subject_matter');
        $this->db->where('subject_matter.id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function del_content($id_subject_matter)
    {
        return $this->db->delete('subject_matter', ['id_subject_matter' => $id_subject_matter]);
    }
    public function del_task($id_subject_matter)
    {
        return $this->db->delete('task_user', ['id_subject_matter' => $id_subject_matter]);
    }
    public function gettask($id)
    {
        $this->db->select('*');
        $this->db->from('task_user');
        $this->db->join('subject_matter', 'subject_matter.id_subject_matter = task_user.id_subject_matter');
        $this->db->join('class', 'class.id_class = subject_matter.id_class');
        $this->db->where('task_user.id', $id);

        $query = $this->db->get();
        return $query->result();
    }

    public function getpoin($id)
    {
        $this->db->select('*');
        $this->db->from('completed_task');
        $this->db->join('subject_matter', 'subject_matter.id_subject_matter = completed_task.id_subject_matter');
        $this->db->join('task_user', 'task_user.id_subject_matter = completed_task.id_subject_matter');
        $this->db->join('user', 'user.id = completed_task.id');
        $this->db->join('class', 'class.id_class = subject_matter.id_class');
        $this->db->where('subject_matter.id', $id);

        $query = $this->db->get();
        return $query->result();
    }

    public function getpoin_id($id_completed_task)
    {
        return $this->db->get_where('completed_task', ['id_completed_task' => $id_completed_task])->result();
    }

    public function showclass()
    {
        $this->db->select('*');
        $this->db->from('class');
        $query = $this->db->get();
        return $query->result();
    }

    public function gettask_id($id_task)
    {
        return $this->db->get_where('task_user', ['id_task' => $id_task])->result();
    }


    public function getclass()
    {

        $this->db->select('*');
        $this->db->from('class');
        $this->db->join('user', 'user.id = class.id');


        $query = $this->db->get();
        return $query->result();
    }

    public function get_kategori_id($id)
    {
        return $this->db->get_where('class', ['id_class' => $id])->result();
    }

    public function getstudy()
    {
        return $this->db->get('subject_matter')->result();
    }


    public function getuser($id)
    {
        $query = "SELECT * FROM profile inner join user on user.id = profile.id_user inner join subject_matter.id_subject_matter on  where role_id in(2) and ";
        return $this->db->query($query)->result();
    }

    public function update_kategori($id)
    {
        $data = [
            'deskripsi' => $this->input->post('deskripsi'),
            'kategori' => $this->input->post('kategori')
        ];
        return $this->db->update('class', $data, ['id_class' => $id]);
    }
    public function update_task($id_task)
    {
        $data = [
            'name_task' => $this->input->post('name_task'),
            'start_task' => $this->input->post('start_task'),
            'end_task' => $this->input->post('end_task')
        ];
        return $this->db->update('task_user', $data, ['id_task' => $id_task]);
    }

    public function update_poin($id_completed_task)
    {
        $data = [
            'poin' => $this->input->post('poin'),

        ];
        return $this->db->update('completed_task', $data, ['id_completed_task' => $id_completed_task]);
    }
}
