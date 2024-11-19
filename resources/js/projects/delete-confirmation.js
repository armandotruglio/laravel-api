const deleteFormElements = document.querySelectorAll("form.project-destroyer");

deleteFormElements.forEach((formElement) => {
    formElement.addEventListener("submit", function (event) {
        event.preventDefault();

        const userChoice = window.confirm(`Are you sure you want to delete ${this.getAttribute("custom-data-name")}?`);

        if (userChoice === true) {
            this.submit();
        }
    });
});
