<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model{

	public function __construct()
	{
	  parent::__construct();
	}

	public function get_record($table = false, $config = array(), $debug = false)
	{
		if($table == false)
		{
			$table = $this->_table;
		}
		
		//CONFIGURATION
		//$config['fields'] = specific fields
		//$config['where'] = AND conditions
		//$config['or_where'] = OR conditions
		//$config['like'] = LIKE conditions
		// $config['join'][] = array(
			// "table" = "TABLE NAME",
			// "on"	= "ON STRING",
			// "type"  = "LEFT,RIGHT"
		// )
		//$config['group'] = GROUP BY conditions
		//$config['order'] = ORDER BY conditions
		//$config['start'] = LIMIT START conditions
		//$config['limit'] = LIMIT END conditions
		//$config['all'] = true or false : return all removes limit
		//$config['count'] = true or false : return count not the row
		//$config['array'] = true or false : return array instead of object
		//$config['single'] = true or false : return single record
		
		
		//FIELDS CONFIGURATION
		if(isset($config['fields']) && $config['fields'] != false)
		{
			$this->db->select($config['fields']);
		}
		else
		{
			$this->db->select('*');
		}
		
		$this->db->from($table); //FROM TABLE
		
		//WHERE
		if(isset($config['where']) && $config['where'] != false)
		{
			$this->db->where($config['where']);
		}
		
		//OR WHERE
		if(isset($config['or_where']) && $config['or_where'] != false)
		{
			$this->db->or_where($config['or_where']);
		}
		
		//LIKE
		if(isset($config['like']) && $config['like'] != false)
		{
			$this->db->like($config['like']);
		}
		
		//JOIN STATEMENTS
		if(isset($config['join']) && is_array($config['join']))
		{
			foreach($config['join'] as $join)
			{
				if($join['table'] != "")
				{
					$this->db->join($join['table'], $join['on'],strtoupper($join['type']));
				}
			}
		}
		
		//GROUP
		if(isset($config['group']) && $config['group'] != false)
		{
			$this->db->group_by($config['group']);
		}
		
		//ORDER BY
		if(isset($config['order']) && $config['order'] != false)
		{
			$this->db->order_by($config['order']);
		}
		
		//CHECK IF ALL IF TRUE
		if(isset($config['all']) && $config['all'] == true)
		{
		}
		else
		{
			//LIMIT START END
			if(isset($config['limit']) && isset($config['start']))
			{
				$this->db->limit($config['limit'], $config['start']);
			}
			else
			{
				if(isset($config['limit']))
				{
					$this->db->limit($config['limit']);
				}
			}
		}
		
		$query = $this->db->get(); //EXECUTE QUERY
		
		//CHECK IF DEBUG
		if($debug)
		{
			echo '<pre>';
			var_dump($this->db->last_query());
			var_dump('');
		}
		
		//CHECK IF COUNT TRUE
		if(isset($config['count']) && $config['count'] == true)
		{
			return $query->num_rows();
		}
		else
		{		
			//CHECK IF SINGLE
			if(isset($config['single']) && $config['single'] == true)
			{
				if(isset($config['array']) && $config['array'] == true)
				{
					return $query->num_rows > 0 ? $query->first_row('array') : false;
				}
				else
				{
					return $query->num_rows > 0 ? $query->row() : false;
				}
			}
			else
			{
				if(isset($config['array']) && $config['array'] == true)
				{
					return $query->num_rows > 0 ? $query->result_array : false;
				}
				else
				{
					return $query->num_rows > 0 ? $query->result() : false;
				}
			}
		}
		
		return false;
	}


	// BASIC CRUD

	public function get()
	{
		$args = func_get_args(); //GET FUNCTION PARAMETERS as ARRAY
	
		if (count($args) > 1 || is_array($args[0]))
		{
			$this->db->where($args);
		}
		else
		{
			$this->db->where('id', $args[0]);
		}
		
		$query = $this->db->get($this->_table);
		
		return $query->num_rows() > 0 ? $query->row() : false;
	}

	public function create($data, $skip_validation = FALSE)
	{
		$data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');

		$success = $this->db->insert($this->_table, $data);

		if ($success)
		{
			return array('id' => $this->db->insert_id(), 'status' => true);
		}
		else
		{
			return FALSE;
		}
	}
	
	public function update()
	{
		$args = func_get_args();
		$args[1]['updated_at'] = date('Y-m-d H:i:s');

		if (is_array($args[0]))
		{
			$this->db->where($args);
		}
		else
		{
			$this->db->where('id', $args[0]);
		}
		
		return $this->db->update($this->_table, $args[1]);
	}
	
	public function delete()
	{
		$args = func_get_args();
	
		if (count($args) > 1 || is_array($args[0]))
		{
			$this->db->where($args);
		}
		else
		{
			$this->db->where('id', $args[0]);
		}

		return $this->db->delete($this->_table);
	}

}
