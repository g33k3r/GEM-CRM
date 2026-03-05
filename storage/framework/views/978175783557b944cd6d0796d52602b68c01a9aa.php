<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Lead Assignment - DrImpacto</title>
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
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
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
        
        .greeting {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        
        .lead-info {
            background-color: #f8f9fa;
            border-left: 4px solid #28a745;
            padding: 25px;
            margin: 25px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .lead-info h3 {
            color: #2c3e50;
            font-size: 20px;
            margin-bottom: 15px;
        }
        
        .lead-details {
            display: grid;
            gap: 12px;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .detail-row:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            font-weight: 600;
            color: #495057;
            flex: 1;
        }
        
        .detail-value {
            color: #007bff;
            font-weight: 500;
            flex: 2;
            text-align: right;
        }
        
        .action-section {
            text-align: center;
            margin: 30px 0;
        }
        
        .action-button {
            display: inline-block;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 16px;
            transition: transform 0.2s ease;
            margin: 10px;
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
            text-align: center;
        }
        
        .urgent-notice h4 {
            color: #856404;
            margin-bottom: 10px;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .urgent-notice p {
            color: #856404;
            margin: 0;
            font-weight: 500;
        }
        
        .instructions {
            background-color: #e7f3ff;
            border: 1px solid #b3d9ff;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }
        
        .instructions h4 {
            color: #0056b3;
            margin-bottom: 15px;
            font-size: 16px;
        }
        
        .instructions ul {
            margin: 0;
            padding-left: 20px;
        }
        
        .instructions li {
            color: #0056b3;
            margin-bottom: 8px;
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
        
        .deadline-highlight {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin: 20px 0;
            font-weight: 600;
        }
        
        @media (max-width: 600px) {
            .email-container {
                margin: 0;
            }
            
            .header, .content, .footer {
                padding: 20px;
            }
            
            .detail-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }
            
            .detail-value {
                text-align: left;
            }
            
            .action-button {
                display: block;
                width: 100%;
                text-align: center;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>🎯 New Lead Assignment</h1>
            <p>You have been assigned a new lead</p>
        </div>
        
        <!-- Main Content -->
        <div class="content">
            <!-- Greeting -->
            <div class="greeting">
                Hello <?php echo e($assignedUserName); ?>,
            </div>
            
            <!-- Lead Information -->
            <div class="lead-info">
                <h3>📋 Lead Details</h3>
                <div class="lead-details">
                    <div class="detail-row">
                        <span class="detail-label">Customer Name:</span>
                        <span class="detail-value"><?php echo e($customerName); ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Phone:</span>
                        <span class="detail-value"><?php echo e($phone1); ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Email:</span>
                        <span class="detail-value"><?php echo e($email); ?></span>
                    </div>
                    <?php if(isset($date) && $date): ?>
                    <div class="detail-row">
                        <span class="detail-label">Appointment Date:</span>
                        <span class="detail-value"><?php echo e(\Carbon\Carbon::parse($date)->format('M d, Y \a\t g:i A')); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="detail-row">
                        <span class="detail-label">Status:</span>
                        <span class="detail-value"><?php echo e(ucfirst($status)); ?></span>
                    </div>
                </div>
            </div>
            
            <!-- Urgent Notice -->
            <div class="urgent-notice">
                <h4>⏰ Important: 24-Hour Response Required</h4>
                <p>Please review and respond to this lead within 24 hours to maintain our service standards.</p>
            </div>
            
            <!-- Deadline Highlight -->
            <div class="deadline-highlight">
                ⚠️ DEADLINE: <?php echo e(\Carbon\Carbon::now()->addHours(24)->format('M d, Y \a\t g:i A')); ?>

            </div>
            
            <!-- Action Section -->
            <div class="action-section">
                <a href="<?php echo e($leadsUrl); ?>" class="action-button">View Lead Details</a>
            </div>
            
            <!-- Instructions -->
            <div class="instructions">
                <h4>📝 Next Steps:</h4>
                <ul>
                    <li>Review the lead details carefully</li>
                    <li>Contact the customer as soon as possible</li>
                    <li>Update the lead status (Accept/Reject) within 24 hours</li>
                    <li>Add notes or comments if needed</li>
                    <li>Follow up according to company procedures</li>
                </ul>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p class="company-name">DrImpacto Team</p>
            <p class="contact-info">
                For any questions or support, please contact your supervisor.
            </p>
        </div>
    </div>
</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/drimpacto_app/resources/views/emails/lead-assignment.blade.php ENDPATH**/ ?>