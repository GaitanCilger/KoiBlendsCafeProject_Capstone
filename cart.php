<?php include('partials/menu-head.php'); ?>

	<div class="cart">
		<?php

	    if(isset($_SESSION['allremove']))
	    {
	      echo '<div class="nmsg">
	        <div class="notifmsg">
	          <p>'.$_SESSION['allremove'].'</p>
	        </div>
	      </div>';
	      unset($_SESSION['allremove']);
	    }

	    if(isset($_SESSION['itemremoved']))
	    {
	      echo '<div class="nmsg">
	        <div class="notifmsg">
	          <p>'.$_SESSION['itemremoved'].'</p>
	        </div>
	      </div>';
	      unset($_SESSION['itemremoved']);
	    }


	    ?>
		
		<div class="cart-sidebar-module">
	      
	      <div class="cart-header-padding">
	        <div class="cart-header">
	          <p>
	            <span class="title">My Cart</span> <span class="items">(<?php echo count($_SESSION['cart']); ?>)</span>
	          </p>
	        </div>
      </div>

      <div class="cart-products">
      	
      	<div class="product-1-holder">
      		<?php

      		if(isset($_SESSION['cart']))
      		{
	      		foreach($_SESSION['cart'] as $key => $value)
	      		{
	      			
	      			?>

	      		
	        <div class="checkbox-2-holder">

		        <label for="productCheck"> 

		            <div class="product-1">
		              <div class="details-1">
		                <img src="images/product/<?php echo$value['Image']; ?>" class="product-img-1" />
		                <div class="product-info-1">
		                  <p class="product-name-1"><?php echo $value['Item']; ?></p>

		                  
		                  <p class="product-price-1">P <?php echo$value['Price'] ?></p>
		                </div>
		              </div>

		              <div class="controls">
		                <div class="quantity">
	                    	<input type="hidden" class="iprice" value="<?php echo$value['Price'] ?>">
	                    	<form method="POST" action="change-qty.php">
	                    		<div class="qtywrap">
	                    		<input type="hidden" name="item" value="<?php echo $value['Item']; ?>">
                            	<input type="number" class="iqty"  name="cqty" onchange="this.form.submit();" min="1" max="10" value="<?php echo$value['Qty']; ?>">
                            	</div>
                            </form>
		                </div>

		                <div class="product-1-totalPrice">
		                    <p class="totalPrice-1 itotal">P <?php echo$value['Price'] ?></p>
		                </div>

		                <form method="POST" action="delitem.php">
		                <input type="hidden" name="vitem" value="<?php echo$value['Item'] ?>">
		                <button class="trashremove" name="remove_item" onclick="return confirm('Remove Item From Cart?')"><i class="fa-solid fa-trash-can fa-lg"></i></button>
		                </form>
		              </div>
		            </div>
		            
		        </label>
	      </div>
	      <?php
	      }
      		}

      		?>

	    </div>

	    <div class="del-all">
	    	<form method="POST" action="delall.php">
        	<button class="trashremove" name="remove_all" onclick="return confirm('Remove All Items From Cart?')"><i class="fa-solid fa-trash-can fa-lg"></i></a></button>
        	</form>
        </div>

	    <div class="cart-footer">
	        <div class="total">
	          <p>Total</p>
	          <p id="gtotal"></p>
	        </div>
	        <?php if(isset($_SESSION['user'])) : ?>
	        <a href="checkout.php" class="checkout-link">Checkout</a>
	        <?php endif ?>
	      </div>
	    </div>


      </div>

      <script src="js/user.js"></script>

      <script>
      		
      	var peso = "P";	
      	var gt=0;
    	var iprice = document.getElementsByClassName('iprice');
    	var iqty = document.getElementsByClassName('iqty');
    	var itotal = document.getElementsByClassName('itotal');
    	var gtotal = document.getElementById('gtotal');

    	function subTotal()
    	{
    		gt=0;
    		for(i=0; i<iprice.length; i++)
    		{
    			itotal[i].innerText=(peso)+(iprice[i].value)*(iqty[i].value);

    			gt = gt+(iprice[i].value)*(iqty[i].value);
    		}
    		gtotal.innerText=peso + gt;
    	}

    	subTotal()

      </script>

	</div>

<?php include('partials/front-foot.php'); ?>