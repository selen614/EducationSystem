//追加ボタン
document.getElementById('addBanner').addEventListener('click', function () {
    var container = document.querySelector('.form-group');
    var newBannerInput = document.createElement('input');
    newBannerInput.type = 'file';
    newBannerInput.name = 'banner[]';
    newBannerInput.classList.add('form-control');
    container.appendChild(newBannerInput);
});





