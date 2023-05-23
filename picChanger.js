document.addEventListener("DOMContentLoaded", function() {
    let button = document.querySelector("#buttonchange");

    button.addEventListener("click", function() {
        let picurl = document.querySelector("#input").value;
        document.querySelector("#pfpic").src = picurl;
    });
});
