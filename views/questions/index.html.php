<div id="forum" class="page">
    <h2 class="page-title">Forum Dashboard</h2>

    <a class="btn btn-primary" href="addquestion.php" style="margin-bottom: 1.5rem;">
        ➕ Add New Question
    </a>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Content</th>
                    <th>Picture</th>
                    <th>Created Date</th>
                    <th>User</th>
                    <th>Module</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($questions)): ?>
                    <tr>
                        <td colspan="7" class="muted">No questions yet</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($questions as $q): ?>
                        <tr>
                            <td><?= htmlspecialchars($q['id']) ?></td>
                            <td>
                                <?php 
                                    // Hiển thị 100 ký tự đầu tiên
                                    $content = htmlspecialchars($q['content']);
                                    echo strlen($content) > 100 
                                        ? substr($content, 0, 100) . '...' 
                                        : $content;
                                ?>
                            </td>
                            <td>
                                <?php if ($q['picture']): ?>
                                    <img src="<?= htmlspecialchars($q['picture']) ?>" 
                                         alt="Question image" 
                                         style="max-width: 80px; max-height: 60px; object-fit: cover; border-radius: 4px;">
                                <?php else: ?>
                                    <span class="muted">No image</span>
                                <?php endif; ?>
                            </td>
                            <td><?= date('M d, Y', strtotime($q['created_day'])) ?></td>
                            <td><?= htmlspecialchars($q['username']) ?></td>
                            <td><?= htmlspecialchars($q['module_name']) ?></td>
                            <td>
                                <a class="btn btn-small" href="editquestion.php?id=<?= (int)$q['id'] ?>">Edit</a>
                            </td>
                            <td>
                                <a href="deletequestion.php?id=<?= $q['id'] ?>" 
                                   onclick="return confirm('Are you sure you want to delete this question?')"
                                   style="padding: 5px 15px; background: #dc3545; color: white; text-decoration: none; border-radius: 3px;">
                                    🗑️ Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>    
            </tbody>
        </table>
    </div>
</div>