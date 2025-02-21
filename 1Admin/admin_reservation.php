<?php include('../inc/admin_sidebar.php')?>
<?php include('../inc/header.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amenities Cart System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .amenity-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }

        /* Shadow border for the available amenities */
        .amenity-tab-content {
            border: 2px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .amenity-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .amenity-price {
            font-weight: bold;
            color: #28a745;
            margin-bottom: 10px;
        }

        .amenity-description {
            margin-bottom: 15px;
        }

        .attendees-list {
            margin-bottom: 20px;
        }

        .attendee-item {
            margin-bottom: 5px;
        }

        .pax-input {
            width: 60px;
            margin-top: 5px;
        }

        .amenity-price-total {
            font-weight: bold;
            color: #28a745;
            margin-top: 10px;
        }

        .reserved-dates {
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Select Your Amenities</h2>
    <form action="process_reservation.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="user_name" class="form-control" required>
        </div>

        <!-- Attendees List Section -->
        <div class="mb-3 attendees-list">
            <label class="form-label">List of Attendees (Separate with commas):</label>
            <input type="text" name="attendees" class="form-control" placeholder="Enter names of attendees" required>
        </div>

        <!-- Amenities Tabs -->
        <h4>Available Amenities:</h4>
        <ul class="nav nav-tabs" id="amenityTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="functionhall-tab" data-bs-toggle="tab" href="#functionhall" role="tab" aria-controls="functionhall" aria-selected="true">Function Hall</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="swimming-tab" data-bs-toggle="tab" href="#swimming" role="tab" aria-controls="swimming" aria-selected="false">Swimming Pool</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tennis-tab" data-bs-toggle="tab" href="#tennis" role="tab" aria-controls="tennis" aria-selected="false">Tennis Court</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="basketball-tab" data-bs-toggle="tab" href="#basketball" role="tab" aria-controls="basketball" aria-selected="false">Basketball Court</a>
            </li>
        </ul>
        <div class="tab-content" id="amenityTabsContent">
            <div class="tab-pane fade show active" id="functionhall" role="tabpanel" aria-labelledby="functionhall-tab">
                    <div class="amenity-tab-content">
                    <div class="amenity-title">Function Hall</div>
                    <div class="amenity-price">$500 per event</div>
                        <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" name="check_in" class="form-control" required id="check_in_date">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Special Request</label>
                        <input type="text" name="special_request" class="form-control" required id="special_request">
                    </div>
                    <div class="amenity-price-total">Total: $<span class="functionhall_total">500</span></div>
                    <button type="button" class="btn btn-success mb-3" data-amenity="Function Hall" id="addAmenityButton" data-price="500" data-amenity-id="functionhall">Add Amenity</button>
                </div>
            </div>
            <div class="tab-pane fade" id="swimming" role="tabpanel" aria-labelledby="swimming-tab">
                <div class="amenity-tab-content">
                    <div class="amenity-title">Swimming Pool</div>
                    <div class="amenity-price">$50 per pax</div>
                    <label class="form-label">Number of Pax</label>
                    <input type="number" class="pax-input" name="swimming_pax" id="swimming_pax" placeholder="Pax" min="1" value="1">

                    <!-- Time Selection (Dropdown) -->
                    <div class="mb-3">
                        <label class="form-label">Select Time</label>
                        <select class="form-control" id="swimming_time">
                            <option value="12">8:00 AM - 4:00 PM</option>
                            <option value="13">4:00 PM - 12:00 PM (Night)</option>
                        </select>
                    </div>

                    <!-- Night Swim Notice -->
                    <div id="night_swim_notice" class="text-danger" style="display: none;"></div>

                    <div class="amenity-price-total">Total: $<span class="swimming_total">50</span></div>
                    <button type="button" class="btn btn-success mb-3 addAmenityButton" data-amenity="Swimming Pool" data-price="50" data-amenity-id="swimming">Add Amenity</button>
                </div>
            </div>

            <div class="tab-pane fade" id="tennis" role="tabpanel" aria-labelledby="tennis-tab">
                <div class="amenity-tab-content">
                    <div class="amenity-title">Tennis Court</div>
                    <div class="amenity-price">$150 per hour</div>
                    <input type="number" class="pax-input" name="tennis_pax" placeholder="How many hours" min="1" value="1">
                    <div class="amenity-price-total">Total: $<span class="tennis_total">150</span></div>
                    <button type="button" class="btn btn-success mb-3" data-amenity="Tennis Court" id="addAmenityButton" data-price="150" data-amenity-id="tennis">Add Amenity</button>
                </div>
            </div>
            <div class="tab-pane fade" id="basketball" role="tabpanel" aria-labelledby="basketball-tab">
                <div class="amenity-tab-content">
                    <div class="amenity-title">Basketball Court</div>
                    <div class="amenity-price">$100 per hour</div>
                    <input type="number" class="pax-input" name="basketball_pax" placeholder="How many hours" min="1" value="1">
                    <div class="amenity-price-total">Total: $<span class="basketball_total">100</span></div>
                    <button type="button" class="btn btn-success mb-3" data-amenity="Basketball Court" id="addAmenityButton" data-price="100" data-amenity-id="basketball">Add Amenity</button>
                </div>
            </div>
        </div>

        <!-- Selected Amenities Section -->
        <h4>Selected Amenities (Cart):</h4>
        <ul id="cart" class="list-group mb-3">
            <li class="list-group-item text-muted">No amenities added yet.</li>
        </ul>

        <input type="hidden" name="total_price" id="total_price_input">
        <input type="hidden" name="selected_amenities" id="selected_amenities_input">

        <div class="mb-3">
            <label class="form-label">Total Price: $<span id="total_price">0.00</span></label>
        </div>

        <!-- Payment Mode Section -->
        <div class="mb-3">
            <label class="form-label">Mode of Payment</label>
            <select class="form-control" name="payment_mode" required>
                <option value="Cash">Cash</option>
                <option value="Gcash">Gcash</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Payment Type</label><br>
            <input type="radio" id="full_payment" name="payment_type" value="Full Payment" checked>
            <label for="full_payment">Full Payment</label><br>
            <input type="radio" id="downpayment" name="payment_type" value="Down Payment">
            <label for="downpayment">Down Payment</label>
        </div>

        <div id="downpayment_section" style="display: none;">
            <div class="mb-3">
                <label class="form-label">Down Payment Amount</label>
                <input type="number" name="down_payment" class="form-control" placeholder="Enter down payment amount" min="0" step="any">
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Proof of Payment (Screenshot)</label>
                <input type="file" name="payment_proof" class="form-control" accept="image/*">
            </div>
        </div>

        <button type="button" class="btn btn-danger" id="clearCartButton">Clear Cart</button>
        <button type="submit" class="btn btn-primary">Reserve</button>
    </form>

    <!-- Reserved Dates Section -->
    <div class="reserved-dates">
        <h4>Reserved Dates:</h4>
        <p>Date: <span id="reserved_check_in">Not selected</span></p>
    </div>
</div>

<script>
    // Update reserved dates dynamically when the user selects them
    $('#check_in_date').on('change', function() {
        $('#reserved_check_in').text($(this).val());
    });

    // Update total price per amenity based on number of pax
    $('.pax-input').on('input', function() {
        var amenityId = $(this).closest('.tab-pane').attr('id');
        var pricePerPax = parseFloat($(`#${amenityId} .amenity-price`).text().replace(/[^\d.-]/g, ''));
        var pax = $(this).val();
        var total = pricePerPax * pax;

        $(`#${amenityId} .amenity-price-total span`).text(total.toFixed(2));
    });



    // Clear Cart Button functionality
    $('#clearCartButton').click(function() {
        $('#cart').empty();
        $('#cart').append('<li class="list-group-item text-muted">No amenities added yet.</li>');
        $('#selected_amenities_input').val('');
        $('#total_price').text('0.00');
        $('#total_price_input').val('');
    });
    
    //payment type
    $(document).ready(function () {
        $('input[name="payment_type"]').on('change', function () {
            if ($('#downpayment').is(':checked')) {
                $('#downpayment_section').show();
            } else {
                $('#downpayment_section').hide();
            }
        });
    });
    

   
   // Add Amenity Button functionality
   $('.addAmenityButton').click(function() {
        var selectedAmenity = $(this).data('amenity');
        var amenityId = $(this).data('amenity-id');
        var pricePerPax = parseFloat($(this).data('price'));
        var pax = $(`#${amenityId} .pax-input`).val();
        var totalPrice = pricePerPax * pax;

        // Check if it's swimming and include night swimming fee
        if (amenityId === "swimming") {
            var selectedTime = parseInt($('#swimming_time').val());
            var nightSwimmingFee = 0;

            if (selectedTime = 12 && selectedTime <= 13) {
                nightSwimmingFee = 100; // Night fee (6 PM - 10 PM)
            } else if (selectedTime >= 22) {
                nightSwimmingFee = 150; // Late night fee (10 PM - 12 AM)
            }

            totalPrice += nightSwimmingFee;
        }

        // Update cart
        $('#cart').append('<li class="list-group-item">' + selectedAmenity + ' (' + pax + ' pax) - $' + totalPrice.toFixed(2) + '</li>');
        $('#selected_amenities_input').val($('#selected_amenities_input').val() + selectedAmenity + ' (' + pax + ' pax), ');

        // Update total price
        var currentTotal = parseFloat($('#total_price').text());
        currentTotal += totalPrice;
        $('#total_price').text(currentTotal.toFixed(2));
        $('#total_price_input').val(currentTotal.toFixed(2));
    });




</script>



</body>
</html>
