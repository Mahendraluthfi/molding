<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moldingmodel extends CI_Model {

	public function get_result_downtime($date1,$date2)
		{
			$this->db->from('downtime');
			$this->db->where('date >=', $date1);
			$this->db->where('date <=', $date2);
			$this->db->order_by('date', 'asc');
			$db = $this->db->get();
			return $db;
		}

	public function get_chart_downtime($date1,$date2)
		{
			$this->db->select('*, SUM(time) as total');
			$this->db->from('downtime');
			$this->db->where('date >=', $date1);
			$this->db->where('date <=', $date2);
			$this->db->group_by('reason');
			$db = $this->db->get();
			return $db;
		}	

	public function get_total_downtime($date1,$date2)
		{
			$this->db->select('SUM(time) as total');
			$this->db->from('downtime');
			$this->db->where('date >=', $date1);
			$this->db->where('date <=', $date2);			
			$db = $this->db->get();
			return $db;
		}	

	public function get_long_downtime($date1,$date2)
		{			
			$this->db->from('downtime');
			$this->db->where('date >=', $date1);
			$this->db->where('date <=', $date2);
			$this->db->order_by('time', 'desc');
			$this->db->limit(3);
			$db = $this->db->get();
			return $db;
		}

		public function get_target($date)
		{
			$this->db->select('target.*, node_data.serial_no');
			$this->db->from('target');
			$this->db->join('node_data', 'node_data.node_id = target.node_id');
			$this->db->where('target.date', $date);
			$db = $this->db->get();
			return $db;
		}

	public function get_solder($date)
	{
		$this->db->select('*');
		$this->db->from('tm');
		$this->db->join('soldering', 'soldering.epf = tm.epf', 'left');
		$this->db->where('soldering.date', $date);		
		$db= $this->db->get();
		// $db = $this->db->query('SELECT node_data.node_id, node_data.serial_no, soldering.* FROM node_data LEFT JOIN soldering ON node_data.node_id=soldering.node_id');
		return $db;
	}
}

/* End of file Moldingmodel.php */
/* Location: ./application/models/Moldingmodel.php */