document.addEventListener("DOMContentLoaded", () => {
    const forms = document.querySelectorAll("form");

    forms.forEach(form => {
        form.addEventListener("submit", event => {
            const inputs = form.querySelectorAll("input[required]");
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    alert(`${input.name} is required`);
                    input.focus();
                    isValid = false;
                }
            });

            if (!isValid) event.preventDefault();
        });
    });
});
