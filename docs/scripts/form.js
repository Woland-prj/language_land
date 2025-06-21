async function sendListener(e) {
    e.preventDefault();
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const course = document.getElementById("course").value;

    console.log(name, email, course)
    if(!name || !email || !course || course === "-") {
        console.warn("name and email and course are required")
        return
    }

    const response = await fetch("/api/application.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            name: name,
            email: email,
            course: course
        })
    });

    const data = await response.json();
    if(!response.ok) {
        console.error("fetch error: ", data)
        return
    }
    console.log("fetch successful: ", data)
}

window.onload = () => {
    const applicationForm = document.getElementById("application-form");

    applicationForm.addEventListener("submit", sendListener);
}