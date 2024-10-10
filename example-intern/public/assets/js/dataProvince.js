$(document).ready(function() {
    var userId = "{{ $user->id }}"; // Lấy user id từ blade template

    // Listen for changes in the "province" select box
    $('#province').on('change', function() {
        var province_id = $(this).val();

        if (province_id && userId) {
            // Fetch the districts for the selected province using AJAX
            $.ajax({
                url: "dashboard/user/${userId}/address/",
                type: "GET",
                data: {
                    province_id: province_id,
                },
                success: function(data) {
                    console.log(data);
                    // Clear the current options in the "district" select box
                    $('#district').empty();

                    // Add the new options for the districts for the selected province
                    $.each(data, function(i, district) {
                        $('#district').append($('<option>', {
                            value: district.district_id,
                            text: district.name
                        }));
                    });

                    // Clear the options in the "wards" select box
                    $('#wards').empty();
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log('Error: ' + errorThrown);
                }
            });
            $('#wards').empty();
        } else {
            // If no province is selected, clear the options in the "district" and "wards" select boxes
            $('#district').empty();
            $('#wards').empty();
        }
    });

    // Listen for changes in the "district" select box
    $('#district').on('change', function() {
        var district_id = $(this).val();

        if (district_id) {
            // Fetch the wards for the selected district using AJAX
            $.ajax({
                url: "dashboard/user/${userId}/address",
                type: "GET",
                data: {
                    district_id: district_id
                },
                success: function(data) {
                    // Clear the current options in the "wards" select box
                    $('#wards').empty();
                    // Add the new options for the wards for the selected district
                    $.each(data, function(i, wards) {
                        $('#wards').append($('<option>', {
                            value: wards.id,
                            text: wards.name
                        }));
                    });
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log('Error: ' + errorThrown);
                }
            });
        } else {
            // If no district is selected, clear the options in the "wards" select box
            $('#wards').empty();
        }
    });
});
