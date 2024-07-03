
document.addEventListener('DOMContentLoaded', function() {
    // バナー画像のプレビュー機能を追加
    document.querySelectorAll('.banner-input').forEach(function(input) {
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = input.closest('.banner-item').querySelector('.banner-preview');
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    });
//追加ボタン    
document.getElementById('addBanner').addEventListener('click', function() {
    var newBannerDiv = document.createElement('div');
    newBannerDiv.classList.add('form-group', 'banner-item');
    
    var fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.name = 'newBanner[]';
    fileInput.classList.add('form-control', 'banner-input');
    fileInput.addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img =document.createElement('img');
            img.src = e.target.result;
            img.style.maxWidth = '200px';
            img.classList.add('banner-preview');
            newBannerDiv.appendChild(img);
        };
        reader.readAsDataURL(event.target.files[0]);
    });
    
    var deleteButton = document.createElement('button');
        deleteButton.type = 'button';
        deleteButton.classList.add('btn', 'btn-danger', 'mt-2', 'deleteBanner');
        deleteButton.textContent = '削除';
        deleteButton.addEventListener('click', function() {
            newBannerDiv.remove();
    });

    newBannerDiv.appendChild(fileInput);
    newBannerDiv.appendChild(deleteButton);
    document.getElementById('newBanners').appendChild(newBannerDiv);
});


//削除ボタン
 
     document.querySelectorAll('.deleteBanner').forEach(button => {
         button.addEventListener('click', function (event) {
             const button = event.currentTarget;
             const bannerId = button.getAttribute('data-banner-id');
        
             if (bannerId && confirm('本当に削除しますか？')) {
                 fetch(`banner_update/${bannerId}`, {
                    method: 'POST',
                     
                     headers: {
                         "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content'),
                         
                    },
                 })
                 .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('削除に失敗しました');
                    }
                })
                 .catch(error => {
                     console.error('Error:', error);
                     alert('削除中にエラーが発生しました');
                 });
             }
         });
     });
     
 });

