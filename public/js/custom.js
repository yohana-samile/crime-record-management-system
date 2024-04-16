$(document).ready(function () {
    $('#submit_crime_type').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        let url = "submit_crime_type";

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Crime Type Submitted Successfully");
                $('#submit_crime_type')[0].reset();
            },
            error: function () {
                swal.fire("error", "Something Went Wrong, Try Again");
                // console.log("Something Went Wrong, Try Again");
            }
        });
    });

    // Enable district field when region is selected
    $('#region').change(function() {
        var regionId = $(this).val();
        // console.log("Selected region Name: " + regionId);

        if (regionId) {
            $('#district').prop('disabled', false);
            $('#district').empty().append('<option selected hidden disabled>Fetching Districts...</option>');

            // Fetch districts based on selected region
            $.ajax({
                url: '/fetchdistricts/' + regionId,
                type: 'GET',
                success: function(data) {
                    // console.log(data); // Debugging line
                    $('#district').empty().append('<option selected hidden disabled>Choose District</option>');
                    $.each(data, function(index, district) {
                        $('#district').append('<option value="' + district.district + '">' + district.district + '</option>');
                    });
                }
            });
        } else {
            $('#district').prop('disabled', true);
        }
    });

    // Enable ward field when district is selected
    $('#district').change(function() {
        var districtId = $(this).val();
        if (districtId) {
            $('#ward').prop('disabled', false);
            $('#ward').empty().append('<option selected hidden disabled>Fetching Wards...</option>');

            // Fetch wards based on selected district
            $.ajax({
                url: '/fetchwards/' + districtId,
                type: 'GET',
                success: function(data) {
                    $('#ward').empty().append('<option selected hidden disabled>Choose Ward</option>');
                    $.each(data, function(key, value) {
                        $('#ward').append('<option value="' + value.ward + '">' + value.ward + '</option>');
                    });
                }
            });
        } else {
            $('#ward').prop('disabled', true);
        }
    });

    // Enable street field when ward is selected
    $('#ward').change(function() {
        var wardId = $(this).val();
        // console.log(wardId);
        if (wardId) {
            $('#street').prop('disabled', false);
            $('#street').empty().append('<option selected hidden disabled>Fetching Streets...</option>');

            // Fetch streets based on selected ward
            $.ajax({
                url: '/fetchstreets/' + wardId,
                type: 'GET',
                success: function(data) {
                    // console.log(data);
                    $('#street').empty().append('<option selected hidden disabled>Choose Street</option>');
                    $.each(data, function(index, street) {
                        $('#street').append('<option value="' + street.street + '">' + street.street + '</option>');
                    });
                }
            });
        } else {
            $('#street').prop('disabled', true);
        }
    });

    // report_new_crime_action
    $('#report_new_crime_action').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        let url = "report_new_crime_action";

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Crime Reported Successfully");
                $('#report_new_crime_action')[0].reset();
            },
            error: function(xhr, status, error) {
                swal.fire("error", "Something Went Wrong, Try Again");
                // console.log("XHR status: " + status);
                // console.log("Error message: " + error);
                // console.log("Server response: " + xhr.responseText);
            }

        });
    });


    //update_case_status
    $('#update_case_status').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        let url = "update_case_status_action";

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Case Status Updated Successfully").then((result) => {
                    if (result.isConfirmed) {
                        // window.location.reload();
                        window.location.href = "/case_reported"  ;
                    }
                });
                $('#update_case_status')[0].reset();
            },
            error: function(xhr, status, error) {
                swal.fire("error", "Something Went Wrong, Try Again");
            }

        });
    });

    // register_police_staff
    $('#register_police_staff').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        let url = "register_police_staff";

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Police Staff Registered Successfully").then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/user"  ;
                    }
                });
                $('#register_police_staff')[0].reset();
            },
            error: function(xhr, status, error) {
                swal.fire("error", "Something Went Wrong, Try Again");
            }
        });
    });


    $('#crime_report_action').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        let url = "crime_report_action";

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire("success", "Police Staff Registered Successfully, you can login to check case info").then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/login";
                    }
                });
                $('#crime_report_action')[0].reset();
            },
            error: function(xhr, status, error) {
                swal.fire("error", "Something Went Wrong, Try Again");
            }
        });
    });
});
