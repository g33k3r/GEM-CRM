<?php $__env->startSection('content'); ?>

	<div class="main-content">
		<div class="page-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-sm-flex align-items-center justify-content-between">
							<h4 class="mb-sm-0">All Sales</h4>
							<div class="page-title-right">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
									<li class="breadcrumb-item active">Sales</li>
								</ol>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header align-items-center d-flex">
								<h4 class="card-title mb-0 flex-grow-1">All Sales</h4>
								<div class="flex-shrink-0">
									<button type="button" class="btn btn-soft-primary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-add-circle-line align-middle me-1"></i> Add New</button>
								</div>
							</div><!-- end card header -->

							<div class="card-body">


								<div class="live-preview">
									<div class="table-responsive table-card">
										<table class="table align-middle table-nowrap mb-0">
											<thead class="table-light">
											<tr>
												<th scope="col">ID</th>
												<th scope="col">Name</th>
												<th scope="col">Date</th>
												<th scope="col">Contracts Price</th>
												<th scope="col">Location</th>
												<th scope="col">Agent</th>
												<th scope="col" style="width: 150px;">Status</th>
												<th scope="col" style="width: 100px;">Actions</th>
											</tr>
											</thead>
											<tbody>
											<?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<?php if(session()->get('adminAuth')[0]['type'] == 'admin' || session()->get('adminAuth')[0]['id'] == $sale->agent->id): ?>
											<tr>
												<td><a href="#" class="fw-medium">#<?php echo e($sale->id); ?></a></td>
												<td><?php echo e($sale->name); ?></td>
												<td><?php echo e($sale->created_at->format('d M, Y')); ?></td>
												<td>$<?php echo e(number_format($sale->price, 2)); ?></td>
												<td><?php echo e($sale->location); ?></td>
												<td>
													<?php echo e($sale->agent->name); ?> (#<?php echo e($sale->agent->id); ?>)
												</td>
												<td>
												<?php if(session()->get('adminAuth')[0]['type'] == 'admin'): ?>
												<div class="dropdown">
														<button class="badge <?php echo e($sale->status == 'approved' ? 'bg-success-subtle text-success' : 'bg-primary-subtle text-primary'); ?>" 
															type="button" id="dropdownMenuButton<?php echo e($sale->id); ?>" 
															data-bs-toggle="dropdown" 
															aria-expanded="false" 
															style="border:0">
															<?php echo e(ucfirst($sale->status)); ?> <i class="ri-arrow-down-s-line"></i>
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo e($sale->id); ?>">
															<a class="dropdown-item status-update" href="#" 
																data-sale-id="<?php echo e($sale->id); ?>" 
																data-status="approved">Approve</a>
															<a class="dropdown-item status-update" href="#" 
																data-sale-id="<?php echo e($sale->id); ?>" 
																data-status="rejected">Reject</a>
														</div>
													</div>
												<?php else: ?>
												<span class="badge <?php echo e($sale->status == 'approved' ? 'bg-success-subtle text-success' : 'bg-primary-subtle text-primary'); ?>"><?php echo e(ucfirst($sale->status)); ?></span>

												<?php endif; ?>
													
												</td>
												<td>
													<div class="d-flex gap-2">
														<button class="btn btn-sm btn-soft-primary edit-sale" 
															data-sale-id="<?php echo e($sale->id); ?>"
															data-name="<?php echo e($sale->name); ?>"
															data-price="<?php echo e($sale->price); ?>"
															data-a-side="<?php echo e($sale->a_side); ?>"
															data-b-side="<?php echo e($sale->b_side); ?>"
															data-location="<?php echo e($sale->location); ?>"
															data-status="<?php echo e($sale->status); ?>"
															data-agent-id="<?php echo e($sale->agent_id); ?>">
															<i class="ri-edit-line"></i>
														</button>
														<button class="btn btn-sm btn-soft-danger delete-sale" data-sale-id="<?php echo e($sale->id); ?>">
															<i class="ri-delete-bin-line"></i>
														</button>
													</div>
												</td>
											</tr>
											<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<tr>
												<td colspan="8" class="text-center">No sales found</td>
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

		<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" style="display: none;" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalgridLabel">Add Sale</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?php echo e(route('sales.store')); ?>" method="POST">
							<?php echo csrf_field(); ?>
							<div class="row g-3">
								<div class="col-md-<?php echo e((session()->get('adminAuth')[0]['type'] == 'admin') ? 3 : 6); ?>">
									<div>
										<label for="firstName" class="form-label">Customer Name</label>
										<input type="text" class="form-control" id="firstName" placeholder="Enter Customer Name" name="name" required />
									</div>
								</div>
								<div class="col-md-<?php echo e((session()->get('adminAuth')[0]['type'] == 'admin') ? 3 : 6); ?>">
									<div>
										<label for="price" class="form-label">Contract Price</label>
										<input type="number" class="form-control" id="price" placeholder="Enter Price" name="price" required>
									</div>
								</div>
								<?php if(session()->get('adminAuth')[0]['type'] == 'admin'): ?>
								<div class="col-md-3">
									<div>
										<label for="price" class="form-label">A Side Commission (%)</label>
										<input type="number" value='5' class="form-control" id="price" placeholder="Enter A Side Commission" name="a_side" required>
									</div>
								</div>
								<div class="col-md-3">
									<div>
										<label for="price" class="form-label">B Side Commission (%)</label>
										<input type="number" value='5' class="form-control" id="price" placeholder="Enter B Side Commission" name="b_side" required>
									</div>
								</div>
								<?php else: ?>
								<input type="hidden" name="a_side" value="5">
								<input type="hidden" name="b_side" value="5">
								<?php endif; ?>
								<div class="col-xxl-12">
									<div>
										<label for="location" class="form-label">Project Location</label>
										<textarea name="location" id="location" cols="30" rows="3" class="form-control" required></textarea>
									</div>
								</div>
								<?php if(session()->get('adminAuth')[0]['type'] == 'admin'): ?>
								<div class="col-xxl-6">
									<div>
										<label for="status2" class="form-label">Status</label>
										<select name="status" id="status2" class="form-control" required>
											<option value="pending">Pending</option>
											<option value="approved">Approved</option>
										</select>
									</div>
								</div>
								<div class="col-xxl-6">
									<div>
										<label for="agent_id" class="form-label">Sales Agent</label>
										<select name="agent_id" id="agent_id" class="form-control" required>
											<option value="">Select Agent</option>
											<?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($agent->id); ?>"><?php echo e($agent->name); ?> (#<?php echo e($agent->id); ?>)</option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
								<?php else: ?>
								<input type="hidden" name="status" value="pending">
								<input type="hidden" name="agent_id" value="<?php echo e(session()->get('adminAuth')[0]['id']); ?>">
								<?php endif; ?>
								<div class="col-lg-12">
									<div class="hstack gap-2 justify-content-end">
										<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
										<button type="submit" onclick="this.disabled=true;this.textContent='Submitting...';this.form.submit();" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Edit Sale Modal -->
		<div class="modal fade" id="editSaleModal" tabindex="-1" aria-labelledby="editSaleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editSaleModalLabel">Edit Sale</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form id="editSaleForm" method="POST">
							<?php echo csrf_field(); ?>
							<?php echo method_field('PUT'); ?>
							<div class="row g-3">
							<div class="col-md-<?php echo e((session()->get('adminAuth')[0]['type'] == 'admin') ? 3 : 6); ?>">
									<div>
										<label for="editName" class="form-label">Customer Name</label>
										<input type="text" class="form-control" id="editName" placeholder="Enter Customer Name" name="name" required />
									</div>
								</div>
								<div class="col-md-<?php echo e((session()->get('adminAuth')[0]['type'] == 'admin') ? 3 : 6); ?>">
									<div>
										<label for="editPrice" class="form-label">Contract Price</label>
										<input type="number" class="form-control" id="editPrice" placeholder="Enter Price" name="price" required>
									</div>
								</div>
								<?php if(session()->get('adminAuth')[0]['type'] == 'admin'): ?>
								<div class="col-md-3">
									<div>
										<label for="editASide" class="form-label">A Side Commission (%)</label>
										<input type="number" class="form-control" id="editASide" placeholder="Enter A Side Commission" name="a_side" required>
									</div>
								</div>
								<div class="col-md-3">
									<div>
										<label for="editBSide" class="form-label">B Side Commission (%)</label>
										<input type="number" class="form-control" id="editBSide" placeholder="Enter B Side Commission" name="b_side" required>
									</div>
								</div>
								<?php else: ?>
								<input type="hidden" name="a_side" id="editASide" value="5">
								<input type="hidden" name="b_side" id="editBSide" value="5">
								<?php endif; ?>
								<div class="col-xxl-12">
									<div>
										<label for="editLocation" class="form-label">Project Location</label>
										<textarea name="location" id="editLocation" cols="30" rows="3" class="form-control" required></textarea>
									</div>
								</div>
								<?php if(session()->get('adminAuth')[0]['type'] == 'admin'): ?>
								<div class="col-xxl-6">
									<div>
										<label for="editStatus" class="form-label">Status</label>
										<select name="status" id="editStatus" class="form-control" required>
											<option value="pending">Pending</option>
											<option value="approved">Approved</option>
										</select>
									</div>
								</div>
								<div class="col-xxl-6">
									<div>
										<label for="editAgentId" class="form-label">Sales Agent</label>
										<select name="agent_id" id="editAgentId" class="form-control" required>
											<option value="">Select Agent</option>
											<?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($agent->id); ?>"><?php echo e($agent->name); ?> (#<?php echo e($agent->id); ?>)</option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
								<?php else: ?>
								<input type="hidden" name="status" id="editStatus" value="pending">
								<input type="hidden" name="agent_id" id="editAgentId" value="<?php echo e(session()->get('adminAuth')[0]['id']); ?>">
								<?php endif; ?>
								<div class="col-lg-12">
									<div class="hstack gap-2 justify-content-end">
										<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
										<button type="submit" onclick="this.disabled=true;this.form.submit();" class="btn btn-primary">Update</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Delete Confirmation Modal -->
		<div class="modal fade" id="deleteSaleModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Confirm Delete</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete this sale? This action cannot be undone.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
					</div>
				</div>
			</div>
		</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function() {
    $('.status-update').on('click', function(e) {
		
        e.preventDefault();
        
        var saleId = $(this).data('sale-id');
        var newStatus = $(this).data('status');
        var buttonElement = $(`#dropdownMenuButton${saleId}`);
        
        $.ajax({
            url: `<?php echo e(url('/sales')); ?>/${saleId}/update-status`,
            type: 'POST',
            data: {
                status: newStatus,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function(response) {
                if (response.success) {
                    // Update the button text and class
                    buttonElement.text(newStatus.charAt(0).toUpperCase() + newStatus.slice(1) + ' ');
                    buttonElement.append('<i class="ri-arrow-down-s-line"></i>');
                    
                    // Update button classes based on status
                    buttonElement.removeClass('bg-success-subtle text-success bg-primary-subtle text-primary bg-danger-subtle text-danger');
                    
                    if (newStatus === 'approved') {
                        buttonElement.addClass('bg-success-subtle text-success');
                    } else if (newStatus === 'rejected') {
                        buttonElement.addClass('bg-danger-subtle text-danger');
                    } else {
                        buttonElement.addClass('bg-primary-subtle text-primary');
                    }
                    
                    // Show success message (optional)
                    alertify.success('Status updated successfully');
                }
            },
            error: function(xhr) {
                // Show error message
                alertify.error('Error updating status');
            }
        });
    });

    // Edit sale handler
    $('.edit-sale').on('click', function() {
        const saleId = $(this).data('sale-id');
        const name = $(this).data('name');
        const price = $(this).data('price');
        const aSide = $(this).data('a-side');
        const bSide = $(this).data('b-side');
        const location = $(this).data('location');
        const status = $(this).data('status');
        const agentId = $(this).data('agent-id');

        // Set form action
        $('#editSaleForm').attr('action', `<?php echo e(url('/sales')); ?>/${saleId}`);

        // Populate form fields
        $('#editName').val(name);
        $('#editPrice').val(price);
        $('#editASide').val(aSide);
        $('#editBSide').val(bSide);
        $('#editLocation').val(location);
        $('#editStatus').val(status);
        $('#editAgentId').val(agentId);

        // Show modal
        $('#editSaleModal').modal('show');
    });

    // Delete sale handler
    let saleIdToDelete = null;

    $('.delete-sale').on('click', function() {
        saleIdToDelete = $(this).data('sale-id');
        $('#deleteSaleModal').modal('show');
    });

    $('#confirmDelete').on('click', function() {
        if (saleIdToDelete) {
            $.ajax({
                url: `<?php echo e(url('/sales')); ?>/${saleIdToDelete}`,
                type: 'DELETE',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    if (response.success) {
                        // Reload page or remove row from table
                        location.reload();
                    }
                    $('#deleteSaleModal').modal('hide');
                },
                error: function() {
                    alertify.error('Error deleting sale');
                    $('#deleteSaleModal').modal('hide');
                }
            });
        }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/drimpacto_app/resources/views/sales.blade.php ENDPATH**/ ?>