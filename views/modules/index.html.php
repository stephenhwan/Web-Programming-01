        <div id="users" class="page">
            <h2 class="page-title">Users Dashboar</h2>

            <a class="btn btn-primary" href="addModule.php" style="margin-bottom: 1.5rem;">
            ➕ Add New Module
            </a>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>MODULE_NAME</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($modules)): ?>
                            <tr>
                                <td colspan="2" class="muted">No data user</td>
                            </tr>
                            <?php else: ?>
                                <?php foreach ($modules as $m): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($m['id']) ?></td>
                                        <td><?= htmlspecialchars($m['module_name']) ?></td>
                                        <td>
                                            <a class="btn btn-small" href="editModule.php?id=<?= (int)$m['id'] ?>">Edit</a>
                                            
                                            <a href="deleteModule.php?id=<?= $m['id'] ?>" 
                                            onclick="return confirm('Are you sure you want to delete this module?')"
                                            style="padding: 5px 10px; background: #dc3545; color: white; text-decoration: none; border-radius: 3px;">
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