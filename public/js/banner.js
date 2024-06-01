document.addEventListener("DOMContentLoaded", function() {
    // 削除ボタンのクリックイベント
    var deleteBannerButton = document.getElementById('deleteBanner');
    if (deleteBannerButton) {
        deleteBannerButton.addEventListener('click', function() {
            if (confirm('バナーを削除しますか？')) {
                deleteBanner();
            }
        });
    }
   
    // 追加ボタンのクリックイベント
    var addBannerButton = document.getElementById('addBanner');
    if (addBannerButton) {
        addBannerButton.addEventListener('click', function() {
            addBannerInput();
        });
    }
});






