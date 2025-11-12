<div class="page">
    <h2 class="page-title">Add New User</h2>
    
    <?php if (!empty($message)): ?>
        <div class="alert alert-danger" style="padding: 10px; margin-bottom: 15px; background: #f8d7da; color: #721c24; border-radius: 4px;">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>
    
    <form action="" method="post" style="max-width: 500px;">
        <div style="margin-bottom: 15px;">
            <label for='username'>Username: </label>
            <input type="text" 
                   name='username' 
                   id='username' 
                   required 
                   style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
        
        <div style="margin-top: 20px;">
            <input type='submit' value='Add User' class="btn btn-primary" style="padding: 10px 20px; cursor: pointer;">
            <a href="user.php" class="btn" style="margin-left: 10px; padding: 10px 20px; text-decoration: none; background: #6c757d; color: white; display: inline-block; border-radius: 4px;">Cancel</a>
        </div>
    </form>
</div>