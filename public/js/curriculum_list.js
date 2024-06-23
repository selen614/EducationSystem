document.addEventListener("DOMContentLoaded", function() {
    const gradeButtons = document.querySelectorAll('.button');
    const currentGradeSpan = document.getElementById('current-grade');
    const currentMonthSpan = document.getElementById('current-month');
    const classListContainer = document.getElementById('class-list');
    let currentGradeId = gradeButtons[0].getAttribute('data-grade-id'); // デフォルトの学年
    let currentDate = new Date(); // 現在の日付
    let currentYear = currentDate.getFullYear(); // 現在の年
    let currentMonth = currentDate.getMonth() + 1; // 現在の月


     // 初期表示時の年月の表示を更新
     updateMonthDisplay();


    gradeButtons.forEach(button => {
        button.addEventListener('click', () => {
            currentGradeId = button.getAttribute('data-grade-id');
            console.log(currentGradeId)
            currentGradeSpan.textContent = button.textContent;
            loadClassesForGrade(currentGradeId, currentMonth);
        });
    });

    document.getElementById('prev-month').addEventListener('click', () => {
        if (currentMonth > 1) {
            currentMonth--;
        } else {
            currentMonth = 12;
            currentYear--;
        }
        updateMonthDisplay(); //updateMonthDisplay関数を呼び出して月表示を更新。
        loadClassesForGrade(currentGradeId, currentMonth); //loadClassesForGrade関数を呼び出してクラスを再ロード
    });

    document.getElementById('next-month').addEventListener('click', () => {
        if (currentMonth < 12) {
            currentMonth++;
        } else {
            currentMonth = 1;
            currentYear++;
        }
        updateMonthDisplay();
        loadClassesForGrade(currentGradeId, currentMonth);
    });

    function updateMonthDisplay() {
        currentMonthSpan.textContent = `${currentYear}年${currentMonth}月`;
    }


    function loadClassesForGrade(gradeId, month) {
        fetch(`class_schedule?grade_id=${gradeId}&month=${month}`,{
            method: 'GET',
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
                classListContainer.innerHTML = '';
                if (data.length > 0) {
                    data.forEach(classItemData => {
                        const classItem = document.createElement('div');
                        classItem.classList.add('class-item');
                        classItem.innerHTML = `
                            <img src="${classItemData.thumbnail}" alt="授業サムネイル">
                            <div>${classItemData.title}</div>
                            <div>${new Date(classItemData.delivery_times[0].delivery_from).toLocaleString()}</div>
                        `;
                         // 配信画面遷移
                         classItem.addEventListener('click', () => {
                            const curriculumId = classItemData.id; 
                            window.location.href = `/user/delivery/${curriculumId}`; // 遷移先のURLを設定
                        });
                        classListContainer.appendChild(classItem);
                    });
                } else {
                    classListContainer.innerHTML = '<p>該当する授業はありません。</p>';
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
                classListContainer.innerHTML = '<p>データの取得に失敗しました。</p>';
            });
    }

    // 初期ロード
    loadClassesForGrade(currentGradeId, currentMonth);
});
