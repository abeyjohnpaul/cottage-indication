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
	
			var d = new Date();

			var month = d.getMonth()+1;
			var day = d.getDate();

			var output = d.getFullYear() + '-' +
			    (month<10 ? '0' : '') + month + '-' +
			    (day<10 ? '0' : '') + day;
			//alert(output);
			
			$.getJSON("getdetails.php?date="+output,function(json)
					{
						
				var len=json.length;
				for(var i=0;i<len;i++)
					{
					var title=json[i].titlekey;
					var description=json[i].descriptionkey;
					var time=json[i].timekey;
					var amount=json[i].amountkey;
					var date=json[i].datekey;
					$("#box").append('<div class="col-sm-12 get-out"><h3 class="text-center"> <p> '+title+'</p> </h3><div class="col-md-4 add-1"><div class="form-group form-group-sm"><label class="col-sm-3 control-label text-right" for="formGroupInputSmall">Date :</label><div class="col-sm-9"><p>  '+date+' </p></div></div></div><div class="col-md-4 col-md-offset-4 add-1"><div class="form-group form-group-sm"><label class="col-sm-3 control-label text-right" for="formGroupInputSmall"> Time :</label><div class="col-sm-9 text-left"><p> '+time+' </p></div></div></div> <div class="col-md-12 add-1"> <textarea class="add-area1" readonly="readonly">'+description+'</textarea></div><div class="col-md-4 col-space add-1"><div class="form-group form-group-sm"><label class="col-sm-4 control-label text-right" for="formGroupInputSmall">Amount :</label><div class="col-sm-8 text-left"><p> '+amount+' </p></div></div> </div></div><div style="clear: both;"></div>');
					}
					});




			$("#search").click(function()
					{
				
				var date=$(".date").val();
				//alert(date);
				
				if(date=="")
				{
				alert("please select date");
				
				}
				else
					{
					$("#box").html("");
					$.getJSON("getdetails.php?date="+date,function(json)
							{
								
						var len=json.length;
						for(var i=0;i<len;i++)
							{
							var title=json[i].titlekey;
							var description=json[i].descriptionkey;
							var time=json[i].timekey;
							var amount=json[i].amountkey;
							var date=json[i].datekey;
							$("#box").append('<div class="col-sm-12 get-out"><h3 class="text-center"> <p> '+title+'</p> </h3><div class="col-md-4 add-1"><div class="form-group form-group-sm"><label class="col-sm-3 control-label text-right" for="formGroupInputSmall">Date :</label><div class="col-sm-9"><p>  '+date+' </p></div></div></div><div class="col-md-4 col-md-offset-4 add-1"><div class="form-group form-group-sm"><label class="col-sm-3 control-label text-right" for="formGroupInputSmall"> Time :</label><div class="col-sm-9 text-left"><p> '+time+' </p></div></div></div> <div class="col-md-12 add-1"> <textarea class="add-area1" readonly="readonly">'+description+'</textarea></div><div class="col-md-4 col-space add-1"><div class="form-group form-group-sm"><label class="col-sm-4 control-label text-right" for="formGroupInputSmall">Amount :</label><div class="col-sm-8 text-left"><p> '+amount+' </p></div></div> </div></div><div style="clear: both;"></div>');
							}
							});
					}
				
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
        <div class="add-product-form">
          <h3 class="text-center"> GET REMINDER </h3>
          <div class="row">
            <div class="col-md-3 col-md-offset-9">
              <div class="form-group form-group-sm">
                <label class="col-sm-2 control-label" for="formGroupInputSmall">Date</label>
                <div class="col-sm-10">
                  <input type="date" class="date" name="bday">
               </div>
               <button type="button" class="btn btn-primary btn-lg" id="search">Search</button>
              </div>
            </div>
            <div class="get-outer" id="box">
           <!--  <div class="col-sm-12 get-out">
              <h3 class="text-center"> <p> hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh </p> </h3>
              <div class="col-md-4 add-1">
                     <div class="form-group form-group-sm">
                       <label class="col-sm-3 control-label text-right" for="formGroupInputSmall">Date :</label>
                    <div class="col-sm-9">
                          <p> hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh </p>
                      </div>
                 </div>
                  </div>
                  
            <div class="col-md-4 col-md-offset-4 add-1">
              <div class="form-group form-group-sm">
                       <label class="col-sm-3 control-label text-right" for="formGroupInputSmall"> Time :</label>
                    <div class="col-sm-9 text-left">
                            <p> hhhhhhhhhhhhh </p>
                      </div>
                 </div>
            </div> 
            <div class="col-md-12 add-1">
                    <textarea class="add-area1" readonly="readonly"></textarea>
                  </div>
            <div class="col-md-4 col-space add-1">
                     <div class="form-group form-group-sm">
                       <label class="col-sm-4 control-label text-right" for="formGroupInputSmall">Amount :</label>
                    <div class="col-sm-8 text-left">
                          <p> hhhhhhhhhhhhh </p>
                      </div>
                 </div>
                  </div>
            </div>
            <div style="clear: both;"></div>-->
          </div>

          </div>


          
        </div>
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