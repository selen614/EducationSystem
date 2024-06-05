//追加ボタン
document.addEventListener('DOMContentLoaded', function() {
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

});



