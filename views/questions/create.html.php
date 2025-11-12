<style>
    .form-container {
        max-width: 800px;
        margin: 0 auto;
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .form-header {
        margin-bottom: 30px;
    }
    
    .form-header h2 {
        font-size: 28px;
        color: #333;
        margin-bottom: 8px;
    }
    
    .form-header p {
        color: #666;
        font-size: 14px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        font-size: 14px;
    }
    
    .form-group label .required {
        color: #dc3545;
    }
    
    .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
        transition: border-color 0.3s;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 3px rgba(0,123,255,0.1);
    }
    
    select.form-control {
        cursor: pointer;
        background: #fff;
    }
    
    textarea.form-control {
        min-height: 150px;
        resize: vertical;
        font-family: inherit;
    }
    
    .upload-area {
        border: 2px dashed #ddd;
        border-radius: 8px;
        padding: 40px;
        text-align: center;
        background: #fafafa;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .upload-area:hover {
        border-color: #007bff;
        background: #f0f8ff;
    }
    
    .upload-area .icon {
        font-size: 48px;
        margin-bottom: 10px;
    }
    
    .upload-area p {
        margin: 5px 0;
        color: #666;
    }
    
    .upload-area .file-types {
        font-size: 12px;
        color: #999;
    }
    
    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 30px;
    }
    
    .btn {
        padding: 12px 24px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
    }
    
    .btn-primary {
        background: #007bff;
        color: white;
    }
    
    .btn-primary:hover {
        background: #0056b3;
    }
    
    .btn-secondary {
        background: #6c757d;
        color: white;
    }
    
    .btn-secondary:hover {
        background: #545b62;
    }
    
    .alert {
        padding: 12px 16px;
        border-radius: 4px;
        margin-bottom: 20px;
    }
    
    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
</style>

<div class="form-container">
    <div class="form-header">
        <h2>Add a New Question</h2>
        <p>Share your question with the community</p>
    </div>
    
    <?php if (!empty($message)): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>
    
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">
                Question Title <span class="required">*</span>
            </label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   class="form-control" 
                   placeholder="Enter your question title..."
                   required
                   value="<?= htmlspecialchars($_POST['title'] ?? '') ?>">
        </div>
        
        <div class="form-group">
            <label for="module_id">
                Select Module <span class="required">*</span>
            </label>
            <select id="module_id" name="module_id" class="form-control" required>
                <option value="">-- Choose a module --</option>
                <?php foreach ($modules as $module): ?>
                    <option value="<?= $module['id'] ?>" 
                            <?= (isset($_POST['module_id']) && $_POST['module_id'] == $module['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($module['module_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="user_id">
                Select User <span class="required">*</span>
            </label>
            <select id="user_id" name="user_id" class="form-control" required>
                <option value="">-- Choose user --</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?= $user['id'] ?>"
                            <?= (isset($_POST['user_id']) && $_POST['user_id'] == $user['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($user['username']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="content">
                Question Details <span class="required">*</span>
            </label>
            <textarea id="content" 
                      name="content" 
                      class="form-control" 
                      placeholder="Describe your question in detail..."
                      required><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="picture">
                Upload Screenshot/Image (Optional)
            </label>
            <div class="upload-area" onclick="document.getElementById('picture').click()">
                <div class="icon">📁</div>
                <p><strong>Click to upload</strong> or drag and drop</p>
                <p class="file-types">PNG, JPG, GIF up to 5MB</p>
            </div>
            <input type="file" 
                   id="picture" 
                   name="picture" 
                   accept="image/*"
                   style="display: none;"
                   onchange="updateFileName(this)">
            <p id="file-name" style="margin-top: 10px; color: #666; font-size: 14px;"></p>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                ✅ Submit Question
            </button>
            <a href="forum.php" class="btn btn-secondary">
                ❌ Cancel
            </a>
        </div>
    </form>
</div>

<script>
function updateFileName(input) {
    const fileName = document.getElementById('file-name');
    if (input.files && input.files[0]) {
        fileName.textContent = '📎 Selected: ' + input.files[0].name;
    } else {
        fileName.textContent = '';
    }
}
</script>