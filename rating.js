window.addEventListener('DOMContentLoaded', (event) => {
    let ratingStars = Array.from(document.getElementsByClassName("rating__star"));
    let ratingInput = document.getElementById("rating-input");
    let starCount = document.getElementById("star-count");

    // Sprawdzanie, czy ratingStars, ratingInput i starCount nie są undefined lub null
    if (ratingStars && ratingInput && starCount) {
        let currentRating = ratingInput.value;
        updateStars(ratingStars, currentRating);
        starCount.textContent = currentRating;

        ratingStars.forEach((star) => {
            star.addEventListener("click", function () {
                let value = this.getAttribute("data-value");
                ratingInput.value = value;
                updateStars(ratingStars, value);
                starCount.textContent = value;

                let form = document.getElementById('rating-form');
                // Sprawdzanie, czy form nie jest undefined lub null
                if (form) {
                    let formData = new FormData(form);

                    fetch(form.action, {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.text())
                        .then(data => {
                            console.log("Response from server:", data);
                            console.log("Type of data:", typeof data);
                            starCount.textContent = data;
                            updateStars(ratingStars, data);
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        });

        function updateStars(stars, value) {
            stars.forEach((star) => {
                star.textContent = parseInt(star.getAttribute("data-value")) <= value ? "★" : "☆";
            });
        }
    }
});
