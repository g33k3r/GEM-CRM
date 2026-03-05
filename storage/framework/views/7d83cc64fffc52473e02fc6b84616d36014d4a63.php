<?php $__env->startSection('content'); ?>
<style>
    .table-card{
		overflow: visible;
	}
</style>
<div class="main-content">

	<div class="page-content">
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0">Commission Payouts</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
								<li class="breadcrumb-item active">Payouts</li>
							</ol>
						</div>

					</div>
				</div>
			</div>
			<!-- end page title -->

			<!-- Commission Summary Cards -->
			<div class="row mb-4">
				<div class="<?php echo e(session()->get('adminAuth')[0]['type'] == 'admin' ? 'col-xl-4' : 'col-xl-6'); ?>">
					<div class="card card-animate">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div class="flex-grow-1">
									<p class="text-uppercase fw-medium text-muted mb-0">Total Commissions</p>
								</div>
							</div>
							<div class="d-flex align-items-end justify-content-between mt-4">
								<div>
									<h4 class="fs-22 fw-semibold ff-secondary mb-4">
										$<span id="total_commissions"><?php echo e(number_format($total_commissions, 2)); ?></span>
									</h4>
									<span class="badge bg-primary">Total</span>
								</div>
								<div class="avatar-sm flex-shrink-0">
									<span class="avatar-title bg-primary-subtle rounded fs-3">
										<i class="ri-money-dollar-circle-line text-primary"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="<?php echo e(session()->get('adminAuth')[0]['type'] == 'admin' ? 'col-xl-4' : 'col-xl-6'); ?>">
					<div class="card card-animate">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div class="flex-grow-1">
									<p class="text-uppercase fw-medium text-muted mb-0">Total Paid</p>
								</div>
							</div>
							<div class="d-flex align-items-end justify-content-between mt-4">
								<div>
									<h4 class="fs-22 fw-semibold ff-secondary mb-4">
										$<span id="total_paid"><?php echo e(number_format($total_paid, 2)); ?></span>
									</h4>
									<span class="badge bg-success">Paid</span>
								</div>
								<div class="avatar-sm flex-shrink-0">
									<span class="avatar-title bg-success-subtle rounded fs-3">
										<i class="ri-check-double-line text-success"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php if(session()->get('adminAuth')[0]['type'] == 'admin'): ?>
				<div class="col-xl-4">
					<div class="card card-animate">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div class="flex-grow-1">
									<p class="text-uppercase fw-medium text-muted mb-0">Total Owed</p>
								</div>
							</div>
							<div class="d-flex align-items-end justify-content-between mt-4">
								<div>
									<h4 class="fs-22 fw-semibold ff-secondary mb-4">
										$<span id="total_owed"><?php echo e(number_format($total_owed, 2)); ?></span>
									</h4>
									<span class="badge bg-warning">Pending</span>
								</div>
								<div class="avatar-sm flex-shrink-0">
									<span class="avatar-title bg-warning-subtle rounded fs-3">
										<i class="ri-time-line text-warning"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				
			</div>
			<!-- End Commission Summary Cards -->

			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header align-items-center d-flex">
							<h4 class="card-title mb-0 flex-grow-1">All Commission Payouts</h4>


						</div><!-- end card header -->

						<div class="card-body">


							<div class="live-preview">
								<div class="table-responsive table-card" >
									<table class="table align-middle table-nowrap mb-0">
										<thead class="table-light">
										<tr>
											<th scope="col">ID</th>
											<th scope="col">Sale ID</th>
											<th scope="col">Customer Name</th>
											<th scope="col">Sale Price</th>
											<th scope="col">Agent</th>
											<th scope="col">Commission Type</th>
											<th scope="col">Commission</th>
											<th scope="col">Status</th>
											<th scope="col">Paid On</th>
											<th scope="col">Requested On</th>
											<th scope="col">Notes</th>
										</tr>
										</thead>
										<tbody>
										<?php $__empty_1 = true; $__currentLoopData = $commissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<?php if(session()->get('adminAuth')[0]['type'] == 'admin' || session()->get('adminAuth')[0]['id'] == $commission->sale->agent_id): ?>
										<tr>
											<td><a href="#" class="fw-medium">#<?php echo e($commission->id); ?></a></td>
											<td>#<?php echo e($commission->sale_id); ?></td>
											<td><?php echo e($commission->sale->name); ?></td>
											<td>$<?php echo e(number_format($commission->sale->price, 2)); ?></td>
											<td><?php echo e($commission->sale->agent->name); ?> (#<?php echo e($commission->sale->agent->id); ?>)</td>
											<td>
												<span class="badge <?php echo e($commission->type === 'a' ? 'bg-info' : 'bg-warning'); ?> text-uppercase">
													<?php echo e($commission->type === 'a' ? 'A-Side' : 'B-Side'); ?>

												</span>
											</td>
											<td>
												$<?php echo e(number_format($commission->amount, 2)); ?>

											</td>
											<td>
												<div class="d-flex gap-2">
													<div class="dropdown">
														<button class="badge <?php echo e($commission->status === 'paid' ? 'bg-success-subtle text-success' : ($commission->status === 'request' ? 'bg-info-subtle text-info' : 'bg-warning-subtle text-warning')); ?>" 
															type="button" id="dropdownMenuButton<?php echo e($commission->id); ?>" 
															<?php if(session()->get('adminAuth')[0]['type'] == 'admin'): ?>
															data-bs-toggle="dropdown" 
															<?php endif; ?>
															aria-expanded="false" 
															style="border:0">
															<?php echo e(ucfirst($commission->status)); ?> 
															<?php if(session()->get('adminAuth')[0]['type'] == 'admin'): ?>
															<i class="ri-arrow-down-s-line"></i>
															<?php endif; ?>
														</button>
														<?php if(session()->get('adminAuth')[0]['type'] == 'admin'): ?>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo e($commission->id); ?>">
															<a class="dropdown-item commission-status-update" href="#" 
																data-commission-id="<?php echo e($commission->id); ?>" 
																data-status="paid">Mark as Paid</a>
															<a class="dropdown-item reject-commission" href="#" 
																data-commission-id="<?php echo e($commission->id); ?>">Mark as Rejected</a>
														</div>
														<?php endif; ?>
													</div>
													<?php if(session()->get('adminAuth')[0]['type'] == 'admin'): ?>
													<button class="badge bg-primary-subtle text-primary edit-commission" 
														style="border:0"
														data-commission-id="<?php echo e($commission->id); ?>"
														data-amount="<?php echo e($commission->amount); ?>">
														<i class="ri-edit-line"></i>
													</button>
													<?php elseif($commission->status == 'pending'): ?>
													<button class="badge bg-info-subtle text-info commission-status-update" 
														style="border:0"
														data-commission-id="<?php echo e($commission->id); ?>"
														data-status="request">
														Request Payment
													</button>
													<?php endif; ?>
												</div>
											</td>
											<td class="paid-date-<?php echo e($commission->id); ?>">
												<?php echo e($commission->paid_at ? date('d M, Y',strtotime($commission->paid_at)) : '-'); ?>

											</td>
											<td class="requested-date-<?php echo e($commission->id); ?>">
												<?php echo e($commission->requested_on ? date('d M, Y',strtotime($commission->requested_on)) : '-'); ?>

											</td>
											<td><p data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e($commission->notes); ?>" style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo e($commission->notes ?? '-'); ?></p></td>
											
										</tr>
										<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="11" class="text-center">No commission records found</td>
										</tr>
										<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Edit Commission Modal -->
	<div class="modal fade" id="editCommissionModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Commission Amount</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="editCommissionForm">
						<input type="hidden" id="editCommissionId">
						<div class="mb-3">
							<label for="editAmount" class="form-label">Commission Amount ($)</label>
							<input type="number" class="form-control" id="editAmount" name="amount" step="0.01" required>
						</div>
						<div class="d-flex justify-content-end gap-2">
							<button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Reject Commission Modal -->
	<div class="modal fade" id="rejectCommissionModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Reject Commission</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="rejectCommissionForm">
						<input type="hidden" id="rejectCommissionId">
						<div class="mb-3">
							<label for="rejectNotes" class="form-label">Rejection Notes</label>
							<textarea class="form-control" id="rejectNotes" name="notes" rows="4" placeholder="Please provide a reason for rejecting this commission..." required></textarea>
						</div>
						<div class="d-flex justify-content-end gap-2">
							<button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-danger">Reject Commission</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        }
    });

    $('.commission-status-update').on('click', function(e) {
        e.preventDefault();
        
        var commissionId = $(this).data('commission-id');
        var newStatus = $(this).data('status');
        var buttonElement = $(`#dropdownMenuButton${commissionId}`);
        var paidDateElement = $(`.paid-date-${commissionId}`);
        var requestedDateElement = $(`.requested-date-${commissionId}`);
        var commissionAmount = parseFloat($(this).closest('tr').find('td:eq(6)').text().replace('$', '').replace(',', '')); 
        var isRequestPayment = newStatus === 'request';
        
        $.ajax({
            url: `<?php echo e(url('/')); ?>/payouts/${commissionId}/update-status`,
            type: 'POST',
            data: {
                status: newStatus
            },
            success: function(response) {
                if (response.success) {
                    // Update the button text and class
                    buttonElement.text(newStatus.charAt(0).toUpperCase() + newStatus.slice(1) + ' ');
                    buttonElement.append('<i class="ri-arrow-down-s-line"></i>');
                    
                    // Update button classes based on status
                    buttonElement.removeClass('bg-success-subtle text-success bg-warning-subtle text-warning bg-info-subtle text-info');
                    
                    if (newStatus === 'paid' && !isRequestPayment) {
                        buttonElement.addClass('bg-success-subtle text-success');
                        paidDateElement.text(response.paid_at);
                        
                        // Update totals only for paid status
                        var currentTotalPaid = parseFloat($('#total_paid').text().replace(',', ''));
                        var currentTotalOwed = parseFloat($('#total_owed').text().replace(',', ''));
                        currentTotalPaid += commissionAmount;
                        currentTotalOwed -= commissionAmount;
                        
                        // Update the displayed totals
                        $('#total_paid').text(currentTotalPaid.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}));
                        $('#total_owed').text(currentTotalOwed.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}));
                    } else if (newStatus === 'pending' && !isRequestPayment) {
                        buttonElement.addClass('bg-warning-subtle text-warning');
                        paidDateElement.text('-');
                        
                        // Update totals only for pending status
                        var currentTotalPaid = parseFloat($('#total_paid').text().replace(',', ''));
                        var currentTotalOwed = parseFloat($('#total_owed').text().replace(',', ''));
                        currentTotalPaid -= commissionAmount;
                        currentTotalOwed += commissionAmount;
                        
                        // Update the displayed totals
                        $('#total_paid').text(currentTotalPaid.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}));
                        $('#total_owed').text(currentTotalOwed.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}));
                    } else if (newStatus === 'request') {
                        buttonElement.addClass('bg-info-subtle text-info');
                    }

                    // If this is a request payment action, hide the button and update requested date
                    if (isRequestPayment) {
                        $(e.target).hide();
                        requestedDateElement.text(response.requested_on);
                    }
                    
                    // Show success message
                    alertify.success('Commission status updated successfully');
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr);
                alertify.error('Error updating commission status: ' + (xhr.responseJSON?.message || 'Unknown error'));
            }
        });
    });

    // Edit Commission Modal Handler
    $('.edit-commission').on('click', function() {
        const commissionId = $(this).data('commission-id');
        const currentAmount = $(this).data('amount');
        
        $('#editCommissionId').val(commissionId);
        $('#editAmount').val(currentAmount);
        
        $('#editCommissionModal').modal('show');
    });

    // Edit Commission Form Submit Handler
    $('#editCommissionForm').on('submit', function(e) {
        e.preventDefault();
        
        const commissionId = $('#editCommissionId').val();
        const newAmount = $('#editAmount').val();
        
        $.ajax({
            url: `<?php echo e(url('/')); ?>/payouts/${commissionId}/update-amount`,
            type: 'POST',
            data: {
                amount: newAmount,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function(response) {
                if (response.success) {
                    // Update the amount in the table
                    const row = $(`button[data-commission-id="${commissionId}"]`).closest('tr');
                    row.find('td:eq(6)').html('$' + parseFloat(newAmount).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}));
                    
                    // Close modal
                    $('#editCommissionModal').modal('hide');
                    
                    // Show success message
                    alertify.success('Commission amount updated successfully');
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr);
                alertify.error('Error updating commission amount: ' + (xhr.responseJSON?.message || 'Unknown error'));
            }
        });
    });

    // Reject Commission Modal Handler
    $('.reject-commission').on('click', function(e) {
        e.preventDefault();
        
        const commissionId = $(this).data('commission-id');
        
        $('#rejectCommissionId').val(commissionId);
        $('#rejectNotes').val('');
        
        $('#rejectCommissionModal').modal('show');
    });

    // Reject Commission Form Submit Handler
    $('#rejectCommissionForm').on('submit', function(e) {
        e.preventDefault();
        
        const commissionId = $('#rejectCommissionId').val();
        const notes = $('#rejectNotes').val();
        
        $.ajax({
            url: `<?php echo e(url('/')); ?>/payouts/${commissionId}/update-status`,
            type: 'POST',
            data: {
                status: 'pending',
                notes: notes,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function(response) {
                if (response.success) {
                    // Update the status button
                    const buttonElement = $(`#dropdownMenuButton${commissionId}`);
                    buttonElement.text('Pending ');
                    buttonElement.append('<i class="ri-arrow-down-s-line"></i>');
                    buttonElement.removeClass('bg-success-subtle text-success bg-info-subtle text-info');
                    buttonElement.addClass('bg-warning-subtle text-warning');
                    
                    // Update the notes in the table
                    const row = buttonElement.closest('tr');
                    row.find('td:eq(10)').text(notes); // Notes column
                    
                    // Update paid date
                    const paidDateElement = $(`.paid-date-${commissionId}`);
                    paidDateElement.text('-');
                    
                    // Close modal
                    $('#rejectCommissionModal').modal('hide');
                    
                    // Show success message
                    alertify.success('Commission rejected successfully');
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr);
                alertify.error('Error rejecting commission: ' + (xhr.responseJSON?.message || 'Unknown error'));
            }
        });
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/drimpacto_app/resources/views/payouts.blade.php ENDPATH**/ ?>