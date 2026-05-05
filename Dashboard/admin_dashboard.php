
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskHunt | إدارة المشرفين</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Cairo', 'Segoe UI', 'Tahoma', sans-serif;
        }

        :root {
            --primary-color: #10b981;
            --primary-dark: #059669;
            --primary-light: #d1fae5;
            --secondary-color: #3b82f6;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --dark-bg: #1f2937;
            --light-bg: #f9fafb;
            --text-dark: #111827;
            --text-gray: #6b7280;
            --border-color: #e5e7eb;
            --card-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        body {
            background: var(--light-bg);
            color: var(--text-dark);
        }

        /* تنسيق الهيدر */
        .header {
            background: white;
            box-shadow: var(--card-shadow);
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1000;
            padding: 1rem 2rem;
        }

        .header-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: var(--primary-color);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }

        .logo h2 {
            font-size: 20px;
            color: var(--text-dark);
        }

        .logo span {
            color: var(--primary-color);
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .back-btn {
            background: var(--secondary-color);
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #2563eb;
        }

        /* الحاوية الرئيسية */
        .container {
            max-width: 1400px;
            margin: 80px auto 40px;
            padding: 0 20px;
        }

        /* البطاقات الإحصائية */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: var(--card-shadow);
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .stat-info h3 {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .stat-info p {
            color: var(--text-gray);
            font-size: 14px;
            margin-top: 5px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-light);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--primary-color);
        }

        /* رسائل التنبيه */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border-right: 4px solid #10b981;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border-right: 4px solid #ef4444;
        }

        .close-alert {
            cursor: pointer;
            font-size: 18px;
        }

        /* أزرار */
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-danger {
            background: var(--danger-color);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .btn-sm {
            padding: 5px 12px;
            font-size: 12px;
        }

        /* الجدول */
        .table-container {
            background: white;
            border-radius: 15px;
            overflow-x: auto;
            box-shadow: var(--card-shadow);
        }

        .table-header {
            padding: 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .table-header h2 {
            font-size: 20px;
        }

        .search-box {
            display: flex;
            gap: 10px;
        }

        .search-box input {
            padding: 8px 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            outline: none;
            width: 250px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            padding: 15px;
            text-align: right;
            font-weight: 600;
            color: var(--text-gray);
            border-bottom: 1px solid var(--border-color);
        }

        td {
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-active {
            background: #d1fae5;
            color: #065f46;
        }

        .status-inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        .role-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            background: #dbeafe;
            color: #1e40af;
        }

        .role-super {
            background: #fef3c7;
            color: #92400e;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 14px;
        }

        .action-btn.edit {
            background: #dbeafe;
            color: #1e40af;
        }

        .action-btn.toggle {
            background: #fef3c7;
            color: #92400e;
        }

        .action-btn.delete {
            background: #fee2e2;
            color: #991b1b;
        }

        /* المودال */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            max-width: 500px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            padding: 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            font-size: 20px;
        }

        .close-modal {
            cursor: pointer;
            font-size: 24px;
        }

        .modal-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-dark);
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            outline: none;
            font-size: 14px;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--primary-color);
        }

        .modal-footer {
            padding: 20px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        /* رسالة toast */
        .toast {
            position: fixed;
            bottom: 30px;
            left: 30px;
            background: white;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 3000;
            animation: slideInLeft 0.3s ease;
            direction: rtl;
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* خالي من البيانات */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-gray);
        }

        .empty-state i {
            font-size: 64px;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        /* استجابة للجوال */
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .table-header {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-box {
                flex-direction: column;
            }
            
            .search-box input {
                width: 100%;
            }
            
            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-content">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <h2>Task<span>Hunt</span></h2>
            </div>
            <div class="user-menu">
                <a href="dashboard.php" class="back-btn">
                    <i class="fas fa-arrow-right"></i> رجوع للوحة التحكم
                </a>
                <div class="user-info">
                    <i class="fas fa-user-circle"></i>
                    <?php echo htmlspecialchars($_SESSION['fullname'] ?? 'Admin'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- إحصائيات -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-info">
                    <h3><?php echo $stats['total']; ?></h3>
                    <p>إجمالي المشرفين</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3><?php echo $stats['super_admins']; ?></h3>
                    <p>المشرفين العامين</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-crown"></i>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3><?php echo $stats['regular_admins']; ?></h3>
                    <p>المشرفين العاديين</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3><?php echo $stats['active_admins']; ?></h3>
                    <p>نشط حالياً</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>

        <!-- رسائل التنبيه -->
     

        <!-- جدول المشرفين -->
        <div class="table-container">
            <div class="table-header">
                <h2><i class="fas fa-user-shield"></i> قائمة المشرفين</h2>
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="🔍 بحث بالاسم أو البريد الإلكتروني...">
                    <button class="btn btn-primary" onclick="openAddModal()">
                        <i class="fas fa-plus"></i> مشرف جديد
                    </button>
                </div>
            </div>
            
            <table id="adminsTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>رقم الهاتف</th>
                        <th>الصلاحية</th>
                        <th>الحالة</th>
                        <th>تاريخ الإنضمام</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($admins) > 0): ?>
                        <?php foreach($admins as $index => $admin): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo htmlspecialchars($admin['fullname']); ?></td>
                            <td><?php echo htmlspecialchars($admin['email']); ?></td>
                            <td><?php echo htmlspecialchars($admin['phone'] ?? 'غير محدد'); ?></td>
                            <td>
                                <span class="role-badge <?php echo $admin['role'] == 'super_admin' ? 'role-super' : ''; ?>">
                                    <?php echo $admin['role'] == 'super_admin' ? 'مشرف عام' : 'مشرف'; ?>
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-<?php echo $admin['status'] ?? 'active'; ?>">
                                    <?php echo ($admin['status'] ?? 'active') == 'active' ? 'نشط' : 'غير نشط'; ?>
                                </span>
                            </td>
                            <td><?php echo date('Y-m-d', strtotime($admin['created_at'])); ?></td>
                            <td class="action-buttons">
                                <button class="action-btn edit" onclick="editAdmin(<?php echo $admin['id']; ?>)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <?php if ($admin['role'] != 'super_admin'): ?>
                                <button class="action-btn toggle" onclick="toggleStatus(<?php echo $admin['id']; ?>)">
                                    <i class="fas fa-toggle-<?php echo ($admin['status'] ?? 'active') == 'active' ? 'on' : 'off'; ?>"></i>
                                </button>
                                <button class="action-btn delete" onclick="deleteAdmin(<?php echo $admin['id']; ?>)">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8">
                                <div class="empty-state">
                                    <i class="fas fa-user-shield"></i>
                                    <p>لا يوجد مشرفين حتى الآن</p>
                                    <button class="btn btn-primary" onclick="openAddModal()">أضف مشرف جديد</button>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- مودال إضافة/تعديل مشرف -->
    <div id="adminModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">إضافة مشرف جديد</h3>
                <span class="close-modal" onclick="closeModal()">&times;</span>
            </div>
            <form method="POST" action="" id="adminForm">
                <div class="modal-body">
                    <input type="hidden" name="admin_id" id="adminId">
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> الاسم الكامل</label>
                        <input type="text" name="fullname" id="fullname" required placeholder="أدخل الاسم الكامل">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-envelope"></i> البريد الإلكتروني</label>
                        <input type="email" name="email" id="email" required placeholder="example@domain.com">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-phone"></i> رقم الهاتف</label>
                        <input type="tel" name="phone" id="phone" placeholder="05xxxxxxxx">
                    </div>
                    <div class="form-group" id="passwordGroup">
                        <label><i class="fas fa-lock"></i> كلمة المرور</label>
                        <input type="password" name="password" id="password" placeholder="********">
                        <small style="color: var(--text-gray);">يجب أن تكون 8 أحرف على الأقل</small>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-shield-alt"></i> الصلاحية</label>
                        <select name="role" id="role">
                            <option value="admin">مشرف عادي</option>
                            <option value="super_admin">مشرف عام</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" onclick="closeModal()">إلغاء</button>
                    <button type="submit" name="add_admin" class="btn btn-primary" id="submitBtn">إضافة</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // البحث في الجدول
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let searchValue = this.value.toLowerCase();
            let tableRows = document.querySelectorAll('#adminsTable tbody tr');
            
            tableRows.forEach(row => {
                let name = row.cells[1]?.textContent.toLowerCase() || '';
                let email = row.cells[2]?.textContent.toLowerCase() || '';
                
                if (name.includes(searchValue) || email.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // فتح مودال الإضافة
        function openAddModal() {
            document.getElementById('modalTitle').innerText = 'إضافة مشرف جديد';
            document.getElementById('adminForm').reset();
            document.getElementById('adminId').value = '';
            document.getElementById('passwordGroup').style.display = 'block';
            document.getElementById('submitBtn').innerHTML = 'إضافة';
            document.getElementById('submitBtn').name = 'add_admin';
            document.getElementById('adminModal').style.display = 'flex';
        }

        // تعديل مشرف
        function editAdmin(id) {
            // في التطبيق الحقيقي، استخدم AJAX لجلب البيانات
            showToast('جاري تحميل بيانات المشرف...', 'info');
            // هنا يمكنك إضافة كود AJAX لجلب بيانات المشرف
        }

        // تغيير الحالة
        function toggleStatus(id) {
            if (confirm('هل أنت متأكد من تغيير حالة هذا المشرف؟')) {
                window.location.href = `?toggle_id=${id}`;
            }
        }

        // حذف مشرف
        function deleteAdmin(id) {
            if (confirm('⚠️ تحذير: هل أنت متأكد من حذف هذا المشرف؟ لا يمكن التراجع عن هذا الإجراء.')) {
                window.location.href = `?delete_id=${id}`;
            }
        }

        // إغلاق المودال
        function closeModal() {
            document.getElementById('adminModal').style.display = 'none';
        }

        // إغلاق المودال عند النقر خارجه
        window.onclick = function(event) {
            let modal = document.getElementById('adminModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }

        // عرض رسالة منبثقة
        function showToast(message, type = 'success') {
            let toast = document.createElement('div');
            toast.className = 'toast';
            let icon = type === 'success' ? 'fa-check-circle' : (type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle');
            let color = type === 'success' ? '#10b981' : (type === 'error' ? '#ef4444' : '#3b82f6');
            toast.innerHTML = `<i class="fas ${icon}" style="color: ${color}"></i> <span>${message}</span>`;
            document.body.appendChild(toast);
            setTimeout(() => {
                toast.style.animation = 'slideOutLeft 0.3s ease';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // إخفاء رسائل التنبيه تلقائياً
        setTimeout(() => {
            let alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    if (alert) alert.style.display = 'none';
                }, 5000);
            });
        }, 100);
    </script>
</body>
</html>