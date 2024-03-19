document.getElementById('image').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;

    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById('imagePreview').src = fr.result;
            document.getElementById('imagePreview').style.display = 'block';
        }
        fr.readAsDataURL(files[0]);
    }
}

document.getElementById('productForm').addEventListener('submit', function (event) {
    var hasError = false;

    var price = document.getElementById('price').value;
    var priceError = document.getElementById('priceError');
    var sizeForms = document.querySelectorAll('#sizeForms input[type="number"]');

    priceError.style.display = 'none';

    if (price < 0) {
        priceError.style.display = 'block';
        hasError = true;
    }

    for (var i = 0; i < sizeForms.length; i++) {
        var quantityError = document.getElementById('errorLber[' + i + ']');
        var quantity = sizeForms[i].value;
        if (!isNaturalNumber(quantity)) {
            quantityError.style.display = 'block';
            hasError = true;
        }
    }
    function isNaturalNumber(n) {
        return n % 1 === 0 && n > 0;
    }

    if (!hasError) {
        return;
    } else {
        event.preventDefault();
    }
    // var form = event.target;

    // fetch(form.action, {
    //     method: form.method,
    //     body: new FormData(form)
    // })
    // .then(response => {
    //     if (response.ok) {
    //         document.getElementById('successMessage').style.display = 'block';
    //         // var confirmation = confirm('Bạn có muốn thêm sản phẩm khác không?');
    //         // if (!confirmation) {
    //         //     window.location.href = "{{ route('admin.dashboard') }}";
    //         // } else {
    //         //     form.reset();
    //         //     document.getElementById('imagePreview').style.display = 'none';
    //         // }
    //     } else {
    //         console.log('Lỗi server:', response.statusText);
    //         document.getElementById('failMessage').style.display = 'block';
    //     }
    // })
    // .catch(error => {
    //     console.error('Lỗi khi gửi dữ liệu form:', error);
    // });
});

function addSizeForm() {
    let value = 1;
    const sizeFormsContainer = document.getElementById('sizeForms');
    const sizeFormCount = sizeFormsContainer.querySelectorAll('.form-group').length + 1;
    const sizeFormHtml = `
                <div class="form-group" id="sizeForm${sizeFormCount}">
                    <label for="size${sizeFormCount}">Kích Cỡ:<span class="required">*</span></label>
                    <input type="text" name="sizes[${sizeFormCount}][size]" class="form-control" required>
                    <label for="quantity${sizeFormCount}">Số Lượng:<span class="required">*</span></label>
                    <input type="number" name="sizes[${sizeFormCount}][quantity]" class="form-control" required>
                    <span class="text-danger" id="errorLber[${value}]" style="display: none;">Số lượng không hợp lệ</span>
                    <button type="button" class="btn btn-danger" onclick="removeSizeForm(${sizeFormCount})">Xoá</button>
                </div>
            `;
    sizeFormsContainer.insertAdjacentHTML('beforeend', sizeFormHtml);
    value++
}

function removeSizeForm(sizeFormId) {
    const sizeForm = document.getElementById(`sizeForm${sizeFormId}`);
    if (sizeForm) {
        sizeForm.parentNode.removeChild(sizeForm);
    }
}
