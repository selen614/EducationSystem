
document.addEventListener('DOMContentLoaded', function() {
    //const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
//追加ボタン    
document.getElementById('addBanner').addEventListener('click', function() {
    var newBannerDiv = document.createElement('div');
    newBannerDiv.classList.add('form-group');
    
    var fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.name = 'newBanner[]';
    fileInput.classList.add('form-control');
    fileInput.addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = document.createElement('img');
            img.src = e.target.result;
            img.style.maxWidth = '200px';
            newBannerDiv.appendChild(img);
        };
        reader.readAsDataURL(event.target.files[0]);
    });
    
    newBannerDiv.appendChild(fileInput);
    document.getElementById('newBanners').appendChild(newBannerDiv);
});


//削除ボタン
 
     document.querySelectorAll('.deleteBanner').forEach(button => {
         button.addEventListener('click', function (event) {
             const button = event.currentTarget;
             const bannerId = button.getAttribute('data-banner-id');
        
             if (bannerId && confirm('本当に削除しますか？')) {
                 fetch(`/admin/banner_edit/${bannerId}`, {
                     method: 'POST',
                     headers: {
                         "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content'),
                         'Content-Type': 'application/json',
                     },
                 })
                 .then(response => response.json())
                 .then(data => {
                     if (data.success) {
                         location.reload();
                     } else {
                         alert('削除に失敗しました');
                     }
                 })
                 .catch(error => console.error('Error:', error));
             }
         });
     });
 });

