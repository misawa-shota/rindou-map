const images = document.querySelectorAll('.clear_rindou_img');

images.forEach(function(image) {
    image.addEventListener('click', function() {
        if(!confirm('走行済みの林道から削除しますか？')) {
            return;
        }
        const deleteForm = image.closest('.delete_form');
        deleteForm.submit();
    });
});
