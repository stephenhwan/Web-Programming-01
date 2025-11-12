<form action="" method="post" style="max-width: 500px;">
        <div style="margin-bottom: 15px;">
            <label for='module_name'>Module Name: </label>
            <input type="text" 
                   name='module_name' 
                   id='module_name' 
                   value="<?= htmlspecialchars($module['module_name']) ?>"
                   required 
                   style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
        
        <div style="margin-top: 20px;">
            <input type='submit' value='Update Module' class="btn btn-primary" style="padding: 10px 20px; cursor: pointer;">
            <a href="module.php" class="btn" style="margin-left: 10px; padding: 10px 20px; text-decoration: none; background: #6c757d; color: white; display: inline-block; border-radius: 4px;">Cancel</a>
        </div>
    </form>