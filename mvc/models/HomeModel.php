<?php
	/**
	 * 
	 */
	class HomeModel extends DB
	{
		
		public function getName($page='1')
		{
		
			$st_items = ($page-1)*12;
			if($st_items<0) return null;
			$query = 'select * from demo.products ORDER BY sold DESC LIMIT 12 OFFSET '.$st_items;
			$result = mysqli_query($this->conn, $query);
			$students =[];
			if ($result->num_rows > 0) {
			    while ($row = $result->fetch_assoc()) {
			        $students[] = $row; // Thêm mỗi hàng vào mảng
			    }
			}
			return $students;
		}

	

	}