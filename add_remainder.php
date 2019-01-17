<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>smart shoppy</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script>

$(document).ready(function()
		{
	//alert("ddddd");
	$("#add").click(function()
			{
		//alert("kkkk");
		var title=$(".title").val();
		var description=$(".description").val();
		var tim=$(".time").val();
		var meridiem=$(".meridiem").val();
		var amount=$(".amount").val();
		var date=$(".date").val();
		alert(date);
		var time=tim+meridiem;
		if(title=="")
		{
			alert("please enter title");
			
		}
		else if(description=="")
		{
		alert("please enter description");
		
		}
		else if(tim=="")
		{
		alert("please enter time");
		
		}
		else if(meridiem=="select meridiem")
		{
		alert("please select meridiem");
		
		}
		else if(date=="")
		{
		alert("please select date");
		
		}
		else
			{
			$.getJSON("regaction.php?title="+title+"&description="+description+"&time="+time+"&amount="+amount+"&date="+date,function(json)
					{
						
						var msg=json.msg;
						alert(msg);
						window.location.href="add_remainder.php";
					});
			}
		
			});
	
	
	
	 $("#date").change(function()
			{
		 			var date=$("#date").val();
		 			$("#box").html(" ");
		 			$.getJSON("getdetails.php?date="+date,function(json)
							{
								
						var len=json.length;
						//alert(len);
						for(var i=0;i<len;i++)
							{
							var title=json[i].titlekey;
							var description=json[i].descriptionkey;
							var time=json[i].timekey;
							var amount=json[i].amountkey;
							var date=json[i].datekey;
							var remainder_id=json[i].remainder_idkey;
							$("#box").append('<div class="col-sm-12 get-out"><h3 class="text-center"> <input class="form-control" type="text" id="tit'+remainder_id+'" value="'+title+'" id="formGroupInputSmall" placeholder="Type here"> </h3><div class="col-md-4 add-1"><div class="form-group form-group-sm"><label class="col-sm-3 control-label text-right" for="formGroupInputSmall">Date :</label><div class="col-sm-9"><input class="form-control" type="text" id="dat'+remainder_id+'" value="'+date+'" id="formGroupInputSmall" placeholder="Type here"></div></div></div><div class="col-md-4 col-md-offset-4 add-1"><div class="form-group form-group-sm"><label class="col-sm-3 control-label text-right" for="formGroupInputSmall"> Time :</label><div class="col-sm-9 text-left"><input class="form-control" type="text" id="tim'+remainder_id+'" value="'+time+'" id="formGroupInputSmall" placeholder="Type here"></div></div></div><div class="col-md-12 add-1"><textarea class="add-area" id="des'+remainder_id+'">'+description+'</textarea></div><div class="col-md-4 col-space add-1"><div class="form-group form-group-sm"><label class="col-sm-4 control-label text-right" for="formGroupInputSmall">Amount :</label><div class="col-sm-8 text-left"><input class="form-control" type="text" id="am'+remainder_id+'" value="'+amount+'" id="formGroupInputSmall" placeholder="Type here"></div></div> </div><div class="col-md-4 col-space add-1"> <div class="form-group form-group-sm"><div class="col-sm-8 text-left"><button type="button" id="'+remainder_id+'" class="btn btn-primary btn-lg edit">Edit</button> <button type="button" id="'+remainder_id+'" class="btn btn-primary btn-lg delete">Delete</button></div></div></div></div><div style="clear: both;"></div>');
							}
							});
					
			});  

		 

	 $(document).on("click",".edit",function()
     		{
     	var id=$(this).attr('id');
     	//alert(id);
     	 var title=$("#tit"+id+"").val();
     	//alert(title);
     	var date=$("#dat"+id+"").val();
     	//alert(date);
     	var time=$("#tim"+id+"").val();
     	//alert(time);
     	var description=$("#des"+id+"").val();
     	//alert(description);
     	var amount=$("#am"+id+"").val();
     	//alert(amount);
     	
     		$.getJSON("editaction.php?title="+title+"&description="+description+"&time="+time+"&amount="+amount+"&date="+date+"&remainderid="+id,function(json)
         			{
         		var msg=json.msg;
         		alert(msg);
         		window.location.href="add_remainder.php";
         			});
         		});
     		
     	
	 $(document).on("click",".delete",function()
	     		{
	     	var id=$(this).attr('id');
	     	//alert(id);
	     	
	     	
	     		$.getJSON("deleteaction.php?remainderid="+id,function(json)
	         			{
	         		var msg=json.msg;
	         		alert(msg);
	         		window.location.href="add_remainder.php";
	         			});
	         		});
    
    
    
   
			
});
</script>
    
  </head>
  <body>
    
    <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header navbar-left">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="" href="index.html"> <img alt="Brand" src="images/logo1.png"></a>

          </div>
          <!-- <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
            <ul class="nav navbar-nav navbar-right">
              <li ><a href="index.html">Home</a></li>
              <li class="active"><a href="#">Add Product</a></li>
              <li><a href="edit_product.html">Edit Product</a></li>
              <li><a href="delete_product.html">Delete Product</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">invoice <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="get_invoice.html">Get Invoice</a></li>
                  <li><a href="view_invoice.html">View Invoice</a></li>
                  
                </ul>
              </li>
              <li><a href="view_feedback.html">View Feedback</a></li>
              <li><a href="add_offers.html">Add Offers</a></li>
              <li><a href="view_offers">View Offers</a></li>
              <li><a href="#">Logout</a></li>
            </ul>
            
          </div>/.nav-collapse -->
          <h3 class="cot-name"> COTTAGE INDICATION </h3>
        </div><!--/.container-fluid -->
      </nav>
      <section class="add-product-outer"> <!--add product outer start-->
        <div class="container"> <!--container start-->
        <form class="add-product-form">
          <h3 class="text-center"> ADD REMINDER </h3>
          <div class="form-group form-group-sm">
            <label class="col-sm-2 control-label" for="formGroupInputSmall">Title</label>
            <div class="col-sm-10">
              <input class="form-control title" type="text" id="formGroupInputSmall" placeholder="Type here">
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-2 control-label" for="formGroupInputSmall">Description</label>
            <div class="col-sm-10">
              <input class="form-control description" type="text" id="formGroupInputSmall" placeholder="Type here">
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-2 control-label" for="formGroupInputSmall">Time</label>
            <div class="col-sm-10">
              <input class="form-control time" type="text" id="formGroupInputSmall" placeholder="Type here">
              <select class="meridiem">
               <option>select meridiem</option>
              <option>AM</option>
              <option>PM</option>
              
              </select>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-2 control-label" for="formGroupInputSmall">Amount</label>
            <div class="col-sm-10">
              <input class="form-control amount" type="text" id="formGroupInputSmall" placeholder="Type here">
            </div>
          </div>
           <div class="form-group form-group-sm">
            <label class="col-sm-2 control-label" for="formGroupInputSmall">Date</label>
            <div class="col-sm-2">
             <input type="date" class="date" name="bday">
            </div>
          </div>
          <div class="col-sm-12">
            <button type="button" class="btn btn-primary btn-lg view-re" id="add">Add</button>
          </div>
          <div class="outer1">
          <h3 class="text-center "> VIEW REMINDER </h3>
          <div class="form-group form-group-sm">
            <label class="col-sm-2 control-label" for="formGroupInputSmall">Select Date</label>
            <div class="col-sm-2">
             <select class="form-control" id="date">
                <option>select date</option>
                <?php 
                
                $connec=mysqli_connect("localhost","root","sa","homeremainder");
               
                $res=mysqli_query($connec, "select distinct date from tbl_remainder");
                while ($row=mysqli_fetch_array($res))
                {
                  
                    $date=$row['date'];
                    ?>
                    
                     <option><?php echo $date?></option>
                    <?php
                    
                    
                }
                
                
                ?>
              </select>
            </div>
          </div>
          <div class="get-outer" id="box">
           <!--  <div class="col-sm-12 get-out">
              <h3 class="text-center"> <input class="form-control" type="text" id="formGroupInputSmall" placeholder="Type here"> </h3>
              <div class="col-md-4 add-1">
                     <div class="form-group form-group-sm">
                       <label class="col-sm-3 control-label text-right" for="formGroupInputSmall">Date :</label>
                    <div class="col-sm-9">
                          <input class="form-control" type="text" id="formGroupInputSmall" placeholder="Type here">
                      </div>
                 </div>
                  </div>
                  
            <div class="col-md-4 col-md-offset-4 add-1">
              <div class="form-group form-group-sm">
                       <label class="col-sm-3 control-label text-right" for="formGroupInputSmall"> Time :</label>
                    <div class="col-sm-9 text-left">
                           <input class="form-control" type="text" id="formGroupInputSmall" placeholder="Type here">
                      </div>
                 </div>
            </div> 
            <div class="col-md-12 add-1">
                    <textarea class="add-area">gggg</textarea>
                  </div>
            <div class="col-md-4 col-space add-1">
                     <div class="form-group form-group-sm">
                       <label class="col-sm-4 control-label text-right" for="formGroupInputSmall">Amount :</label>
                    <div class="col-sm-8 text-left">
                          <input class="form-control" type="text" id="formGroupInputSmall" placeholder="Type here">
                      </div>
                 </div>
                  </div>
                  <div class="col-md-4 col-space add-1">
                     
                    <div class="form-group form-group-sm">
                    <div class="col-sm-8 text-left">
                          <button type="button" class="btn btn-primary btn-lg">Edit</button>
                      </div>
                 </div>
                 
                  </div>
            </div>
            <div style="clear: both;"></div>-->
          </div>
          </div>
          </div>
        </form>
      </div><!--container end-->
      </section> <!--add product outer end-->

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
           function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>



  </body>
</html>