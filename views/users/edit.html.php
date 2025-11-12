    <form action="" method="post" style="max-width: 500px;">
        <div style="margin-bottom: 15px;">
            <label for='username'>Username: </label>
            <input type="text" 
                   name='username' 
                   id='username' 
                   value="<?= htmlspecialchars($user['username']) ?>"
                   required 
                   style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
        
        <div style="margin-top: 20px;">
            <input type='submit' value='Update User' class="btn btn-primary" style="padding: 10px 20px; cursor: pointer;">
            <a href="user.php" class="btn" style="margin-left: 10px; padding: 10px 20px; text-decoration: none; background: #6c757d; color: white; display: inline-block; border-radius: 4px;">Cancel</a>
        </div>
    </form>