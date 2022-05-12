<?php

$data = $this->db->get_where('districts')->result_array();
pr($data);
