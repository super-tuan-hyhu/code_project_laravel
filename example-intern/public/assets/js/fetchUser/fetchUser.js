document.querySelectorAll('#select-user-btn').forEach(button=>{
    button.addEventListener('click', function (){
        const id = this.getAttribute('data-id');
        fetch(`dashboard/counter/user/${id}`)
            .then(response => response.json())
            .then(data => {
                console.log(data); // Xem cấu trúc dữ liệu ở đây
                const user = data.user;

                document.getElementById('accepted').value = user.name;
                document.getElementById('idUserCounter').value = user.id;
                document.getElementById('emailInput').value = user.email;
                document.getElementById('zipcodeInput').value = user.zip;

                // check role users
                document.getElementById('roleInput').value = user.role == 1 ? "Super Admin" : "User";

                // Hiển thị địa chỉ mặc định
                const default_address = data.default_address;

                if (default_address) {
                    document.getElementById('cityInput').value = default_address.city;
                    document.getElementById('districtInput').value = default_address.district; // Thay đổi cho đúng thuộc tính
                    document.getElementById('wardsAddressInput').value = default_address.wards;
                    document.getElementById('specific_addressInput').value = default_address.specific_address;
                    document.getElementById('phoneInput').value = default_address.phone;
                } else {
                    document.getElementById('townCityInput').value = "Không có địa chỉ mặc định";
                }

                document.getElementById('customerType').textContent =  `Customer Type: ${user.name}`

            })
            .catch(error => console.error('Error:', error));

        alert('Đã chọn dữ liệu người dùng thành công!');
    });
});
