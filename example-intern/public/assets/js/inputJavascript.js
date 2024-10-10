document.addEventListener('DOMContentLoaded', function () {
    // Lấy tất cả các checkbox có name bắt đầu bằng "nameSizeee"
    document.querySelectorAll('input[name^="nameSizeee"]').forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                const productKey = this.name.replace('nameSizeee', '');
                document.querySelectorAll(`input[name="nameSizeee${productKey}"]`).forEach((otherCheckbox) => {
                    if (otherCheckbox !== this) {
                        otherCheckbox.checked = false;

                        document.querySelector(`label[for="${otherCheckbox.id}"]`).classList.remove('activess');
                    }
                });

                document.querySelector(`label[for="${this.id}"]`).classList.add('activess');
            }
        });
    });


    document.querySelectorAll('label[for^="select"]').forEach((label) => {
        label.addEventListener('click', function() {
            // Bỏ class 'activess' khỏi tất cả các label khác
            document.querySelectorAll('label[for^="select"]').forEach((otherLabel) => {
                otherLabel.classList.remove('activess');
            });

            this.classList.add('activess');
        });
    });
});
