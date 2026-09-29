const courseForm = document.querySelector(".form-panel form");
 if (courseForm) {
    courseForm.addEventListener("submit", function (event) {
        const duration = document.getElementById("duration_hours");
        if (duration && parseInt(duration.value) <= 0) {
            event.preventDefault();
            alert("يجب أن يكون عدد الساعات راقمأ أكبر من صفر");
        }
    });
}0