$(document).ready(function() {
    var selectedValues = [];


    // Lấy tất cả các checkbox
    var checkboxes = document.querySelectorAll('.size input[type="checkbox"]');

    // Lặp qua từng checkbox và thêm sự kiện 'change'
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var value = this.value;
            // Kiểm tra xem checkbox đã được chọn hay bỏ chọn
            if (this.checked) {
                // Nếu được chọn, thêm giá trị vào mảng nếu chưa tồn tại
                if (!selectedValues.includes(value)) {
                    selectedValues.push(value);
                    $.ajax({
                        url: 'getDataBySize',
                        type: 'GET',
                        data: { sizeSelect : selectedValues},
                        success: function (response) {
                            console.log(response.resultArray);
                        },
                        error: function (e) {
                            console.log(e.message);
                        }
                    });
                }
            } else {
                // Nếu bị bỏ chọn, xóa giá trị khỏi mảng nếu tồn tại
                var index = selectedValues.indexOf(value);
                if (index !== -1) {
                    selectedValues.splice(index, 1);
                    $.ajax({
                        url: 'getDataBySize',
                        type: 'GET',
                        data: { sizeSelect : selectedValues},
                        success: function (response) {
                            console.log(response.resultArray);
                        },
                        error: function (e) {
                            console.log(e.message);
                        }
                    });
                }
            }

            // Hiển thị mảng giá trị đã chọn trong console để kiểm tra
            console.log(selectedValues);
        });
    });

});
