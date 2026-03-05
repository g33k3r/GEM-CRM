<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overdue Leads Alert - DrImpacto</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }
        
        .email-container {
            max-width: 700px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .header p {
            font-size: 16px;
            opacity: 0.9;
        }
        
        .content {
            padding: 40px 30px;
        }
        
        .alert-section {
            background-color: #f8d7da;
            border: 2px solid #f5c6cb;
            border-radius: 8px;
            padding: 25px;
            margin: 25px 0;
            text-align: center;
        }
        
        .alert-section h2 {
            color: #721c24;
            font-size: 22px;
            margin-bottom: 10px;
        }
        
        .alert-section p {
            color: #721c24;
            font-size: 16px;
            font-weight: 500;
        }
        
        .summary-box {
            background-color: #fff3cd;
            border: 2px solid #ffeaa7;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            text-align: center;
        }
        
        .summary-box h3 {
            color: #856404;
            font-size: 18px;
            margin-bottom: 10px;
        }
        
        .summary-box .count {
            font-size: 32px;
            font-weight: bold;
            color: #dc3545;
        }
        
        .leads-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .leads-table th {
            background-color: #dc3545;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }
        
        .leads-table td {
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
        }
        
        .leads-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        .leads-table tr:hover {
            background-color: #e9ecef;
        }
        
        .lead-id {
            font-weight: 600;
            color: #007bff;
        }
        
        .customer-name {
            font-weight: 500;
            color: #2c3e50;
        }
        
        .hours-overdue {
            color: #dc3545;
            font-weight: 600;
        }
        
        .created-date {
            color: #6c757d;
            font-size: 14px;
        }
        
        .action-section {
            text-align: center;
            margin: 30px 0;
        }
        
        .action-button {
            display: inline-block;
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 16px;
            transition: transform 0.2s ease;
        }
        
        .action-button:hover {
            transform: translateY(-2px);
        }
        
        .urgent-notice {
            background-color: #fff3cd;
            border: 2px solid #ffc107;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }
        
        .urgent-notice h4 {
            color: #856404;
            margin-bottom: 10px;
            font-size: 18px;
        }
        
        .urgent-notice p {
            color: #856404;
            margin: 0;
            font-weight: 500;
        }
        
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 25px;
            text-align: center;
        }
        
        .footer p {
            margin-bottom: 8px;
        }
        
        .footer .company-name {
            font-weight: 600;
            font-size: 16px;
        }
        
        .footer .contact-info {
            font-size: 14px;
            opacity: 0.8;
        }
        
        @media (max-width: 600px) {
            .email-container {
                margin: 0;
            }
            
            .header, .content, .footer {
                padding: 20px;
            }
            
            .leads-table {
                font-size: 14px;
            }
            
            .leads-table th,
            .leads-table td {
                padding: 10px;
            }
            
            .action-button {
                display: block;
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>Overdue Leads Alert</h1>
            <p>Immediate attention required for pending leads</p>
        </div>
        
        <!-- Main Content -->
        <div class="content">
            <!-- Alert Section -->
            <div class="alert-section">
                <h2>Urgent: <?php echo e(count($overdueLeads)); ?> Lead(s) Overdue</h2>
                <p>These leads have been pending for more than 24 hours and require immediate attention.</p>
            </div>
            
            <!-- Summary Box -->
            <div class="summary-box">
                <h3>Total Overdue Leads</h3>
                <div class="count"><?php echo e(count($overdueLeads)); ?></div>
            </div>
            
            <!-- Overdue Leads Table -->
            <table class="leads-table">
                <thead>
                    <tr>
                        <th>Lead ID</th>
                        <th>Customer Name</th>
                        <th>Created Date</th>
                        <th>Hours Overdue</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $overdueLeads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="lead-id">#<?php echo e($lead['id']); ?></td>
                        <td class="customer-name"><?php echo e($lead['customer_name']); ?></td>
                        <td class="created-date"><?php echo e($lead['created_at']); ?></td>
                        <td class="hours-overdue"><?php echo e($lead['hours_overdue']); ?> hours</td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            
            <!-- Action Section -->
            <div class="action-section">
                <a href="<?php echo e($leadsUrl); ?>" class="action-button">View All Leads</a>
            </div>
            
            <!-- Urgent Notice -->
            <div class="urgent-notice">
                <h4>Immediate Action Required</h4>
                <p>Please review these overdue leads immediately and take appropriate action. Delayed responses may result in lost opportunities and customer dissatisfaction.</p>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p class="company-name">DrImpacto Management System</p>
            <p class="contact-info">
                This is an automated alert. Please take immediate action on the overdue leads listed above.
            </p>
        </div>
    </div>
</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/drimpacto_app/resources/views/emails/overdue-leads.blade.php ENDPATH**/ ?>