<!-- Edit Client Modal -->
<div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="editClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
            <div class="modal-header" style="border-bottom: 1px solid #E5E5E5; padding: 20px 32px;">
                <h2 class="modal-title" id="editClientModalLabel" style="font-weight: 700; font-size: 24px; color: #000;">Edit Client</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0;">
                <form id="editClientForm" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="client_id" id="edit_client_id">
                    <div class="card h-100" style="border: none; box-shadow: none;">
                        <div class="card-header" style="border-bottom: 1px solid #E5E5E5;">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#edit-modal-home" role="tab" aria-selected="true">Clinic Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#edit-modal-profile" role="tab" aria-selected="false">Compressors</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#edit-modal-settings" role="tab" aria-selected="false">Filters</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#edit-modal-settings2" role="tab" aria-selected="false">Amalgam Separator</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#edit-modal-settings3" role="tab" aria-selected="false">Sterilizer</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body h-100" style="padding: 24px 32px;">
                            <div class="tab-content">
                                <div class="tab-pane p-3 active" id="edit-modal-home" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Office Name</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="office_name" id="edit_office_name" class="form-control my-input" placeholder="Enter clinic name" required>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Doctor's Name</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="doctor_name" id="edit_doctor_name" class="form-control my-input" placeholder="Enter doctor's name" required>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Address</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="address" id="edit_address" class="form-control my-input" placeholder="Enter street address" required>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Zip Code</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="zip_code" id="edit_zip_code" class="form-control my-input" placeholder="Enter zip code" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Office Number</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="office_number" id="edit_office_number" class="form-control my-input" placeholder="Enter phone number" required>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Last DOS</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="last_dos" id="edit_last_dos" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Suite</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="suite" id="edit_suite" class="form-control my-input" placeholder="Enter suite number">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">City</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="city" id="edit_city" class="form-control my-input" placeholder="Enter city name">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">State</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="state" id="edit_state" class="form-control my-input" placeholder="Enter state">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="edit-modal-profile" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="comp-a">
                                                <span>Compressor A</span>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Model</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="compressor_a_model" id="edit_compressor_a_model" class="form-control my-input" placeholder="Enter compressor model">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Serial Number</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="compressor_a_serial" id="edit_compressor_a_serial" class="form-control my-input" placeholder="Enter serial number">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">OEM Parts & Costs</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="compressor_a_oem" id="edit_compressor_a_oem" class="form-control my-input" placeholder="Enter OEM parts and costs">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="compressor_a_initial" id="edit_compressor_a_initial" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Last Maintenance Completed</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="compressor_a_last" id="edit_compressor_a_last" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="compressor_a_next" id="edit_compressor_a_next" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" name="compressor_a_days" id="edit_compressor_a_days" class="form-control my-input" min="1" placeholder="Enter days remaining">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="comp-b">
                                                <span>Compressor B</span>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Model</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="compressor_b_model" id="edit_compressor_b_model" class="form-control my-input" placeholder="Enter compressor model">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Serial Number</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="compressor_b_serial" id="edit_compressor_b_serial" class="form-control my-input" placeholder="Enter serial number">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">OEM Parts & Costs</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="compressor_b_oem" id="edit_compressor_b_oem" class="form-control my-input" placeholder="Enter OEM parts and costs">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="compressor_b_initial" id="edit_compressor_b_initial" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Last Maintenance Completed</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="compressor_b_last" id="edit_compressor_b_last" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="compressor_b_next" id="edit_compressor_b_next" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" name="compressor_b_days" id="edit_compressor_b_days" class="form-control my-input" min="1" placeholder="Enter days remaining">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="edit-modal-settings" role="tabpanel">
                                    <div class="par-b">
                                        <div class="filter-a">
                                            <span>Water Sediment Filter</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="water_filter_initial" id="edit_water_filter_initial" class="form-control my-input">
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="water_filter_next" id="edit_water_filter_next" class="form-control my-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="water_filter_days" id="edit_water_filter_days" class="form-control my-input" min="1" placeholder="Enter days remaining">
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Maintenance Completed</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select name="water_filter_completed" id="edit_water_filter_completed" class="form-control my-input">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Water Sediment Filter Maintenance</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select name="water_filter_maintenance" id="edit_water_filter_maintenance" class="form-control my-input">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="par-b">
                                        <div class="filter-a">
                                            <span>Silver Filter</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="silver_filter_initial" id="edit_silver_filter_initial" class="form-control my-input">
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="silver_filter_next" id="edit_silver_filter_next" class="form-control my-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="silver_filter_days" id="edit_silver_filter_days" class="form-control my-input" min="1" placeholder="Enter days remaining">
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Silver Filter Maintenance</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select name="silver_filter_maintenance" id="edit_silver_filter_maintenance" class="form-control my-input">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="par-b">
                                        <div class="filter-a">
                                            <span>Cavitron Filter</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="cavitron_filter_initial" id="edit_cavitron_filter_initial" class="form-control my-input">
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="cavitron_filter_next" id="edit_cavitron_filter_next" class="form-control my-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="cavitron_filter_days" id="edit_cavitron_filter_days" class="form-control my-input" min="1" placeholder="Enter days remaining">
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-lg-6">
                                                        <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Cavitron Filter Maintenance</h4>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select name="cavitron_filter_maintenance" id="edit_cavitron_filter_maintenance" class="form-control my-input">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="edit-modal-settings2" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Model</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="amalgam_model" id="edit_amalgam_model" class="form-control my-input" placeholder="Enter amalgam separator model">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Amalgam Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="amalgam_initial" id="edit_amalgam_initial" class="form-control my-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Amalgam Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="amalgam_next" id="edit_amalgam_next" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" name="amalgam_days" id="edit_amalgam_days" class="form-control my-input" min="1" placeholder="Enter days remaining">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Amalgam Separator Maintenance</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <select name="amalgam_maintenance" id="edit_amalgam_maintenance" class="form-control my-input">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="edit-modal-settings3" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Model</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="sterilizer_model" id="edit_sterilizer_model" class="form-control my-input" placeholder="Enter sterilizer model">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Initial Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="sterilizer_initial" id="edit_sterilizer_initial" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" name="sterilizer_days" id="edit_sterilizer_days" class="form-control my-input" min="1" placeholder="Enter days remaining">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Next Maintenance Day</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" name="sterilizer_next" id="edit_sterilizer_next" class="form-control my-input">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Days Remaining</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" name="sterilizer_days2" id="edit_sterilizer_days2" class="form-control my-input" min="1" placeholder="Enter days remaining">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title fw-bold" style="color:#45556C;font-size:17px">Sterilizer Maintenance</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <select name="sterilizer_maintenance" id="edit_sterilizer_maintenance" class="form-control my-input">
                                                        <option value="">Select</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #E5E5E5; padding: 20px 32px;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #E5E5E5; color: #000; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Cancel</button>
                <button type="submit" form="editClientForm" class="btn" style="background-color: #155DFC; color: #fff; border: none; border-radius: 8px; padding: 12px 24px; font-weight: 500;">Update Client</button>
            </div>
        </div>
    </div>
</div>

<?php /**PATH /home/u246429533/domains/gemdentalrepair.com/public_html/crm/resources/views/modals/edit_client.blade.php ENDPATH**/ ?>