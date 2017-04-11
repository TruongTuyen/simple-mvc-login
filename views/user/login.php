<style type="text/css">
    .container{
        max-width: 400px;
        margin: auto;
    }
    
    .container form{
        border: 1px solid #e6e6e6;
        border-radius: 5px;
        
    }
    .container form .form-group{
        padding: 10px;
    }
    .container form .form-group label,
    .container form .form-group input{
        display: block;
        width: 100%;
        
    }
    
    .container form .form-group input{
        padding: 5px 7px;
        margin-top: 5px;
    }
    
    .btn-group{
        padding: 10px;
        text-align: center;
    }
    
    .btn-group input{
        padding: 5px 10px;
    }
    
    .message{
        background: #e6e6e6;
        padding: 1px 10px;
        margin-bottom: 20px;
    }
  
</style>
<div class="container">
    <?php 
        if( isset( $_GET['message'] ) && $_GET['message'] != '' ){
            echo "<div class='message'>{$_GET['message']}</div>";
        } 
    
    ?>
    <form action="index.php?controller=user&action=user_check_login" method="post">
    
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" value="" id="username" />
        </div>
        
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" value="" id="password" />
        </div>
        
        <div class="btn-group">
            <input type="submit" name="submit" value="Login"/>
            <input type="reset" name="reset" value="Reset" />
        </div>
        
    </form>
</div>