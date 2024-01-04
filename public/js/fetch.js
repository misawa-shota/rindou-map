function prefectureSubmit() {
    let prefecture = document.getElementById('select_box').value;
    let param = {
        prefecture: prefecture
    };

    var postData = new FormData;
    postData.set('prefecture', document.getElementById('select_box').value);

    fetch('https://rindou-map-a6e1b467f031.herokuapp.com/posts/create/', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: postData
    })
    .then(res => {
        if(!res.ok) {
            alert('サーバーエラー');
        }
        return res.json();
    })
    .then(res => {
        const newSelect = document.createElement('select');
        newSelect.setAttribute('class', 'form-select');
        newSelect.setAttribute('name', 'rindou_id');
        newSelect.setAttribute('id', 'rindou_select');
        const newOption = document.createElement('option');
        newOption.setAttribute('selected', '');
        newOption.setAttribute('value', '');
        newOption.textContent = '林道名を選択して下さい';
        newSelect.appendChild(newOption);

        res.forEach(elm => {
            var option = document.createElement('option');
            option.setAttribute('value', elm['id']);
            option.textContent = elm['name'];

            newSelect.insertBefore(option, null);
        });

        const oldSelect = document.getElementById('rindou_select');
        const selectForm = document.getElementById('rindou_select_form');

        selectForm.replaceChild(newSelect, oldSelect);
    })
    .catch(err => {
        alert('通信失敗');
        alert(err.message);
    });
}
