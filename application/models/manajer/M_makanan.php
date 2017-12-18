<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_makanan extends CI_Model
{
    public $table = 'tbl_makanan';
    public $column_order = array(null,'id_makanan','nama','tipe','harga','gambar',null);
    public $column_search = array('id_makanan','nama');
    public $order = array('id_makanan' => 'desc');


    public function _get_datatables_query()
    {
        $this->db->from($this->table);


        $i = 0;

        foreach ($this->column_search as $item) { // loop column
            if ($_POST['search']['value']) { // if datatable send POST for search
                if ($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) { //last loop
                    $this->db->group_end();
                } //close bracket
            }
            $i++;
        }


        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } elseif (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();

        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get_data()
    {
        $query = $this->db->query('
			SELECT * fROM tbl_makanan
			');
        return $query->result();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_makanan', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function update_data($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function add_data($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    public function count_filtered()
    {
        $this->_get_datatables_query();

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_makanan', $id);
        $this->db->delete($this->table);
    }
}

/* End of file M_makanan.php */
/* Location: ./application/models/manajer/M_makanan.php */
