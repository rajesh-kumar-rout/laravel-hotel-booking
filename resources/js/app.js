document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("td form").forEach(form => {
        form.addEventListener("submit", event => {
            event.preventDefault()
            if (confirm("Are you sure you want to delete ?")) {
                event.target.submit()
            }
        })
    })
})