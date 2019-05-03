<?php 
include_once '../lib/Database.php';
include_once '../helpers/Format.php';
?>

<?php 
class Product{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function productInsert($data, $file){

		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$catId = mysqli_real_escape_string($this->db->link, $data['catId']);
		$brandId = mysqli_real_escape_string($this->db->link, $data['brandId']);
		$body = mysqli_real_escape_string($this->db->link, $data['body']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);

		$permited = array('jpg', 'png', 'jpeg', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "upload/".$unique_image;
		if($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == ""){
			$msg = "<span class='error'>Field Must Not be be empty.</span>";
			return $msg;
		}else{
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO tbl_product(productName, catId, brandId, body, price, image, type) VALUES ('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type')";

			$inserted_row = $this->db->insert($query);

			if($inserted_row){
					$msg = "<span class='success'>Product Inserted Successfully.</span>";
					return $msg;
			}else{
				$msg = "<span class='error'>Product Not Inserted.</span>";
				return $msg;
			}
		}
	}

	public function getAllProduct(){
		$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
		FROM tbl_product
		INNER JOIN tbl_category
		ON tbl_product.catId = tbl_category.catId
		INNER JOIN tbl_brand
		ON tbl_product.brandId = tbl_brand.brandId
		ORDER BY tbl_product.productId DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getProById($id){
		$query = "SELECT * FROM tbl_product WHERE productId = '$id' ";
		$result = $this->db->select($query);
		return $result;
	}

}

?>