<?php 
$this->load->view("element/top-header.php");
$this->load->view("element/header.php");
$this->load->view("element/sidemenu.php");
$this->load->view("element/nav.php");
?>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
<?php 
$category = $this->common_model->getcategorylist('master_category',array('status'=>'0'));
?>

<div class="container">
    <div class="row">
	<div class="only_mobile-view">
        <div class="col-xs-12">
             <?php if(!empty($category) && is_array($category)) { 
          foreach($category as $val) { 
          $sub_category = $this->common_model->getcategorylist('master_sub_category',array('category_id'=>$val['id'],'status'=>'0'));
            
            $node = $val['id'];
          
          ?>
            <div class="panel panel-info">
                <div class="panel-heading">
                 
                    <h3 class="panel-title"><a href="<?php echo $val['url']; ?>"  onClick="showDetails('<?php echo $node;?>');" >
                        <?php echo $val['name']; ?></a></h3>
                        
                        
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
                </div>
                <?php if(!empty($sub_category) && is_array($sub_category)) {
                foreach($sub_category as $val_sub) {?>
                <div class="panel-body">
				<div class="link-panal">
                    <a href="<?php echo base_url($val['url'].'/'.$val_sub['url']); ?>" ><?php echo $val_sub['name']; ?><span class="caret"></span></a>
					</div>
					 
					</div>
					<?php } } ?>
					 
            </div>
            <?php }}?>
        </div>
	
		
		</div>
		</div>
      </div>


<script src="javascript/jquery.parallax.js"></script> 
<script>
    jQuery(document).ready(function ($) {
        $('.parallax').parallax();
    });
</script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
<script>
$(document).on('click', '.panel-heading span.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '.panel div.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).ready(function () {
    $('.panel-heading span.clickable').click();
    $('.panel div.clickable').click();
});
</script>









<?php include("element/footer.php"); ?>