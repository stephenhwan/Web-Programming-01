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